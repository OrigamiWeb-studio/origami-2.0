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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class ProjectsController extends Controller
{
	#GET /projects
	public function allProjects()
	{
		$data = [
			'title'      => __('Sites portfolio from the studio'),
			'styles'     => config('resources.projects.all.styles'),
			'scripts'    => config('resources.projects.all.scripts'),
			'categories' => ProjectCategory::get(),
			'stages'     => ProjectStage::get(),
		];

		return view('pages.projects.projects-all')->with($data);
	}

	#POST /projects
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

		if (auth()->guest() || !auth()->user()->hasRole('owner')){
			$projects = $projects->where('visible', true);
			$projects = $projects->translatedIn(app()->getLocale());
		}
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
				$projects = $projects->whereRaw("year(closed_at) in (" . implode(', ', array_fill(0, count($years), '?')) . ")", $years);
			} else
				$projects = $projects->whereYear('closed_at', $years);
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
		$projects = $projects->orderBy('created_at', 'desc');
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
				'total'         => $projects->total(),

			],
			'projects'   => [],
		];

		foreach ($projects as $project) {
			$data['projects'] [] = [
				'id'             => $project->id,
				'slug'           => $project->slug,
				'cover'          => $project->cover,
				'title'          => $project->translateOrDefault(app()->getLocale())->title,
				'category_title' => $project->category->translateOrDefault(app()->getLocale())->title,
				'visible'        => $project->visible,
			];
		}

		return $data;
	}

	#GET /projects/{slug}
	public function singleProject($slug)
	{
		$project = Project::query();
		$project = $project->where('slug', '=', $slug);

		if (auth()->guest() || !auth()->user()->hasRole('owner'))
			$project = $project->where('visible', true);

		$project = $project->first();

		if (!$project) abort(404);

		$data = [
			'title'   => $project->translateOrDefault(app()->getLocale())->title . ' - ' . __('Studio of development web-sites'),
			'styles'  => config('resources.projects.single.styles'),
			'scripts' => config('resources.projects.single.scripts'),
			'project' => $project,
		];

		return view('pages.projects.projects-single')->with($data);
	}

	#GET /projects/add
	public function addProjectView()
	{
		$data = [
			'title'      => __('Add a new project') . ' - ' . __('Studio of development web-sites'),
			'styles'     => config('resources.projects.add.styles'),
			'scripts'    => config('resources.projects.add.scripts'),
			'categories' => ProjectCategory::get(),
			'stages'     => ProjectStage::get(),
			'clients'    => User::where('is_developer', false)->get(),
			'developers' => Developer::get(),
		];

		return view('pages.projects.projects-add')->with($data);
	}

	#GET /projects/{slug}/edit
	public function editProjectView($slug)
	{
		$project = Project::where('slug', '=', $slug)->first();

		if (!$project) abort(404);

		$data = [
			'title'      => $project->translateOrDefault(app()->getLocale())->title . ': ' . __('Editing') . ' - ' . __('Studio of development web-sites'),
			'styles'     => config('resources.projects.edit.styles'),
			'scripts'    => config('resources.projects.edit.scripts'),
			'project'    => $project,
			'categories' => ProjectCategory::get(),
			'stages'     => ProjectStage::get(),
			'clients'    => User::where('is_developer', false)->get(),
			'developers' => Developer::get(),
		];

		return view('pages.projects.projects-edit')->with($data);
	}

	#POST /projects/{slug}/edit
	public function editProject(ProjectEditRequest $request, $slug)
	{
		$project = Project::where('slug', '=', $slug)->first();

		if (!$project) abort(404);

		$project->title = $request['title'];
		$project->client_id = $request['client'];
		$project->slug = $request['slug'];
		$project->category_id = $request['category'];
		$project->current_stage_id = $request['stage'];
		$project->link = $request['link'];
		$project->visible = $request['visible'] === 'on' ? true : false;
		$project->us_choice = $request['us_choice'] === 'on' ? true : false;
		$project->client_review = $request['client_review'];
		$project->description = $request['description'];
		$project->short_description = $request['short_description'];
		$project->last_edit_by = auth()->user() && auth()->user()->is_developer ? auth()->user()->profile->developer->id : null;
		$project->closed_at = Carbon::createFromFormat('d.m.Y H:i:s', $request['closed_at'] . ' 00:00:00');
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

		return redirect()->route('project', ['slug' => $project->slug]);
	}

	#POST /projects/add
	public function addProject(ProjectAddRequest $request)
	{
		$project = new Project();

		$project->title = $request['title'];
		$project->client_id = $request['client'];
		$project->slug = $request['slug'];
		$project->category_id = $request['category'];
		$project->current_stage_id = $request['stage'];
		$project->link = $request['link'];
		$project->visible = $request['visible'] === 'on' ? true : false;
		$project->us_choice = $request['us_choice'] === 'on' ? true : false;
		$project->client_review = $request['client_review'];
		$project->description = $request['description'];
		$project->short_description = $request['short_description'];
		$project->closed_at = Carbon::createFromFormat('d.m.Y H:i:s', $request['closed_at'] . ' 00:00:00');

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

		if (app()->getLocale() !== config('app.default_locale')) {
			$project->{'title:' . config('app.default_locale')} = $request['title'];
			$project->{'description:' . config('app.default_locale')} = $request['description'];
			$project->{'short_description:' . config('app.default_locale')} = $request['short_description'];
		}

		$project->save();

		$project->stages()->sync($request['stages']);
		$project->developers()->sync($request['developers']);

		if (Input::hasFile('slider_images')) {

			$images = Input::file('slider_images');
			$destination_path = public_path('uploads/projects/slider_images/');

			foreach ($images as $key => $image) {
				$file_path = 'uploads/projects/slider_images/'
					. $project->id
					. str_random(5)
					. time()
					. str_random(5)
					. '.' . $image->getClientOriginalExtension();
				$image->move($destination_path, $file_path);

				$screenshot = new ProjectScreenshot();
				$screenshot->order_ = $key;
				$screenshot->project_id = $project->id;
				$screenshot->link = $file_path;
				$screenshot->save();
			}

		}

		return redirect()->route('project', ['slug' => $project->slug]);
	}

	#GET /projects/{slug}/delete
	public function deleteProject($slug)
	{
		$project = Project::where('slug', '=', $slug)->first();

		if (!$project) abort(404);

		#Soft deleting
		$project->screenshots()->delete();
		$project->comments()->delete();
		$project->delete();

		#TODO force deleting: remove main_image, cover..., screenshots...

		return redirect()->route('projects');
	}

	#GET /projects/{project_id}/screenshots
	public function projectScreenshotsJson($id)
	{
		$project = Project::find($id);

		if (!$project) abort(404);

		$screenshots = [];

		foreach ($project->screenshots as $screenshot) {
			$screenshots [] = [
				'id'    => $screenshot->id,
				'order' => $screenshot->order_,
				'link'  => $screenshot->link,
			];
		}

		return $screenshots;
	}

	#GET /projects/{project_id}/screenshots/{id}/delete
	public function deleteScreenshot($project_id, $id)
	{
		$screenshot = ProjectScreenshot::find($id);

		if (!$screenshot) return ['status' => false];

//		File::delete(public_path($screenshot->link));

		$screenshot->delete();

		return ['status' => true];
	}
}
