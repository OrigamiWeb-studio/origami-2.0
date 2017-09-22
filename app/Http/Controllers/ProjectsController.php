<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Http\Requests\ProjectAddRequest;
use App\Http\Requests\ProjectEditRequest;
use App\Project;
use App\ProjectCategory;
use App\ProjectScreenshot;
use App\ProjectStage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class ProjectsController extends Controller
{
	public function allProjects()
	{
		$data = [
			'styles'     => config('resources.projects.all.styles'),
			'scripts'    => config('resources.projects.all.scripts'),
			'projects'   => Project::paginate(6),
			'categories' => ProjectCategory::get(),
			'stages'     => ProjectStage::get()
		];
		
		return view('pages.projects.projects-all')->with($data);
	}
	
	public function allProjectsJson(Request $request)
	{
		$categories = $request['categories'] ? $request['categories'] : null;
		$years = $request['years'] ? $request['years'] : null;
		$stages = $request['components'] ? $request['components'] : null;
		$order = in_array($request['order'], ['asc', 'desc']) ? $request['order'] : 'asc';
		$prices = $request['prices'] ? $request['prices'] : null;
		$search = $request['search'] ? $request['search'] : null;
		$paginate = $request['paginate'] ? $request['paginate'] : null;
		
		$projects = Project::query();
		$projects = $projects->where('visible', true);
//		$projects = $projects->join('project_translations', 'projects.id', '=', 'project_translations.project_id');
		
		#Фильтр по категориям
		if ($categories !== null) {
			if (is_array($categories))
				$projects = $projects->whereIn('category_id', $categories);
			else
				$projects = $projects->where('category_id', '=', $categories);
		}
		
		#Фильтр по годам
		if ($years !== null) {
			if (is_array($years)) {
				$projects = $projects->whereRaw("year(created_at) in (" . implode(', ', array_fill(0, count($years), '?')) . ")", $years);
			} else
				$projects = $projects->whereYear('created_at', $years);
		}
		
		#Фильтр по компонентам
		if ($stages !== null) {
			if (is_array($stages))
				$projects = $projects->whereHas('stages', function ($q) use ($stages) {
					$q->whereIn('stage_id', $stages);
				});
			else
				$projects = $projects->whereHas('stages', function ($q) use ($stages) {
					$q->where('stage_id', '=', $stages);
				});
		}
		
		#Фильтр по ценам
		$max_project_price = Project::max('total_price');
		if (is_array($prices) && count($prices) === 2) {
			if ($prices[0] >= 0 && $prices[0] < 100 && $prices[1] > 0 && $prices[1] <= 100) {
				$projects = $projects->whereBetween('total_price', [$prices[0] * ($max_project_price / 100), $prices[1] * ($max_project_price / 100)]);
			}
		}
		
		#Поиск по названию и описанию
		if ($search !== null) {
			$projects = $projects->whereHas('translations', function ($q) use ($search) {
				$q->where('locale', '=', app()->getLocale())
					->where('title', 'like', '%' . $search . '%');
//					->orWhere('description', 'like', '%' . $search . '%');
			});
		}

//		$projects = $projects->where('project_translations.locale', '=', app()->getLocale());
		$projects = $projects->select([
			'projects.*',
//			'project_translations.title',
//			'project_translations.description'
		]);
//		$projects = $projects->groupBy('project_translations.id');
//		$projects = $projects->orderBy('project_translations.title', $order);
//		$projects = $projects->with('translations');
		
		#Пагинация
		
//		return $paginate;
		
		if ($paginate !== null && in_array($paginate, [1, 2, 3, 6, 9, 12])) {
			$projects = $projects->paginate($paginate);
		} else $projects = $projects->paginate(100);

//		return $projects;
		
		$data = [
			'pagination' => [
				'item_first'    => $projects->firstItem(),
				'item_last'     => $projects->lastItem(),
				'page_last'     => $projects->lastPage(),
				'page_current'  => $projects->currentPage(),
				'page_next_url' => $projects->nextPageUrl(),
				'page_prev_url' => $projects->previousPageUrl(),
				'per_page'      => $projects->perPage(),
				'total'         => $projects->total()
			
			],
			'projects'   => []
		];
		
		foreach ($projects as $project) {
			$data['projects'] [] = [
				'id'             => $project->id,
				'cover'          => $project->cover,
				'title'          => $project->translateOrDefault(app()->getLocale())->title,
				'category_title' => $project->category->translateOrDefault(app()->getLocale())->title
			];
		}

//		return $data;
//
//		$data = [
//			'styles'     => [
//				'libs/jcf/jcf.css',
//				'css/projects-style.css'
//			],
//			'scripts'    => [
//				'libs/jcf/jcf.js',
//				'libs/jcf/jcf.select.js',
//				'libs/jcf/jcf.range.js'
//			],
//			'projects'   => $projects,
//			'categories' => ProjectCategory::get(),
//			'stages'     => ProjectStage::get()
//		];
		
		return $data;
	}
	
	public function singleProject($id)
	{
		$project = Project::where([
			['id', '=', $id],
			['visible', true]
		])->first();

		if (!$project) abort(404);
		
		$data = [
			'styles'  => config('resources.projects.single.styles'),
			'scripts' => config('resources.projects.single.scripts'),
			'project' => $project
		];

//		dd($data['styles']);
		
		return view('pages.projects.projects-single')->with($data);
	}
	
	public function addProjectView()
	{
		$data = [
      'styles'     => config('resources.projects.add.styles'),
      'scripts'    => config('resources.projects.add.scripts'),
			'categories' => ProjectCategory::get(),
			'stages'     => ProjectStage::get(),
			'clients'    => User::where('is_developer', false)->get(),
			'developers' => Developer::get()
		];
		
		return view('pages.projects.projects-add')->with($data);
	}
	
	public function editProjectView($id)
	{
		$data = [
			'project'    => Project::find($id),
			'categories' => ProjectCategory::get(),
			'stages'     => ProjectStage::get(),
			'clients'    => User::where('is_developer', false)->get(),
			'developers' => Developer::get()
		];
		
		return view('pages.projects.projects-edit')->with($data);
	}
	
	public function editProject(ProjectEditRequest $request, $project_id)
	{
		$project = Project::find($project_id);
		
		$project->title = $request['title'];
		$project->client_id = $request['client'];
		$project->category_id = $request['category'];
		$project->current_stage_id = $request['stage'];
		$project->link = $request['link'];
		$project->visible = $request['visible'] === 'on' ? true : false;
		$project->us_choice = $request['us_choice'] === 'on' ? true : false;
		$project->client_review = $request['client_review'];
		$project->description = $request['description'];
		$project->short_description = $request['short_description'];
		$project->stages()->sync($request['stages']);
		$project->developers()->sync($request['developers']);
		
		if (Input::hasFile('cover')) {
			if ($project->cover)
				File::delete(public_path($project->cover));
			
			$image = Input::file('cover');
			$destination_path = public_path('uploads/projects/placeholders/');
			$file_path = 'uploads/projects/placeholders/' . str_random(5) . time() . str_random(5) . '.' . $image->getClientOriginalExtension();
			$image->move($destination_path, $file_path);
			$project->cover = $file_path;
		}
		
		if (Input::hasFile('main_image')) {
			if ($project->main_image)
				File::delete(public_path($project->main_image));
			
			$image = Input::file('main_image');
			$destination_path = public_path('uploads/projects/main_images/');
			$file_path = 'uploads/projects/main_images/' . str_random(5) . time() . str_random(5) . '.' . $image->getClientOriginalExtension();
			$image->move($destination_path, $file_path);
			$project->main_image = $file_path;
		}
		
		if (Input::hasFile('slider_images')) {
			
			$images = Input::file('slider_images');
			$destination_path = public_path('uploads/projects/slider_images/');
			
			foreach ($images as $image) {
				$file_path = 'uploads/projects/slider_images/'
					. $project->id
					. str_random(5)
					. time()
					. str_random(5)
					. '.' . $image->getClientOriginalExtension();
				$image->move($destination_path, $file_path);
				
				$screenshot = new ProjectScreenshot();
				$screenshot->project_id = $project->id;
				$screenshot->link = $file_path;
				$screenshot->save();
			}
			
		}
		
		$project->save();
		
		return redirect()
			->action('ProjectsController@singleProject', ['id' => $project_id]);
	}
	
	public function addProject(ProjectAddRequest $request)
	{
		$project = new Project();
		
		$project->title = $request['title'];
		$project->client_id = $request['client'];
		$project->category_id = $request['category'];
		$project->current_stage_id = $request['stage'];
		$project->link = $request['link'];
		$project->visible = $request['visible'] === 'on' ? true : false;
		$project->us_choice = $request['us_choice'] === 'on' ? true : false;
		$project->client_review = $request['client_review'];
		$project->description = $request['description'];
		$project->short_description = $request['short_description'];
		
		if (Input::hasFile('cover')) {
			if ($project->cover)
				File::delete(public_path($project->cover));
			
			$image = Input::file('cover');
			$destination_path = public_path('uploads/projects/placeholders/');
			$file_path = 'uploads/projects/placeholders/' . str_random(5) . time() . str_random(5) . '.' . $image->getClientOriginalExtension();
			$image->move($destination_path, $file_path);
			$project->cover = $file_path;
		}
		
		if (Input::hasFile('main_image')) {
			if ($project->main_image)
				File::delete(public_path($project->main_image));
			
			$image = Input::file('main_image');
			$destination_path = public_path('uploads/projects/main_images/');
			$file_path = 'uploads/projects/main_images/' . str_random(5) . time() . str_random(5) . '.' . $image->getClientOriginalExtension();
			$image->move($destination_path, $file_path);
			$project->main_image = $file_path;
		}
		
		$project->save();
		
		$project->stages()->sync($request['stages']);
		$project->developers()->sync($request['developers']);
		
		if (Input::hasFile('slider_images')) {
			
			$images = Input::file('slider_images');
			$destination_path = public_path('uploads/projects/slider_images/');
			
			foreach ($images as $image) {
				$file_path = 'uploads/projects/slider_images/'
					. $project->id
					. str_random(5)
					. time()
					. str_random(5)
					. '.' . $image->getClientOriginalExtension();
				$image->move($destination_path, $file_path);
				
				$screenshot = new ProjectScreenshot();
				$screenshot->project_id = $project->id;
				$screenshot->link = $file_path;
				$screenshot->save();
			}
			
		}
		
		return redirect()
			->action('ProjectsController@singleProject', ['id' => $project->id]);
	}
	
	public function deleteProject($id)
	{
		Project::where('id', '=', $id)->delete();
		
		return redirect()
			->action('ProjectsController@allProjects');
	}

	public function deleteScreenshot($id){
		$screenshot = ProjectScreenshot::find($id);

		if (!$screenshot) return redirect()->back();

		File::delete(public_path($screenshot->link));

		$screenshot->delete();

		return redirect()->back();
	}
}
