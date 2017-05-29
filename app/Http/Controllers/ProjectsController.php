<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\ProjectCategory;
use App\ProjectStage;
use App\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
	public function allProjects($categories = null, $paginate = 1)
	{
		$projects = Project::query();
		
		#Фильтр по категориям
		if ($categories !== null)
			if (is_array($categories))
				$projects = $projects->whereIn('category_id', $categories);
			else
				$projects = $projects->where('category_id', '=', $categories);
			
		//here code
		
		
		
		
		
		#Пагинация
		if (is_integer($paginate))
			$projects = $projects->paginate($paginate);
		else
			$projects = $projects->paginate(6);
		
		
		
//		dd($projects);
		
		$data = [
			'styles' => [
				'libs/jcf/jcf.css',
				'css/projects-style.css'
			],
			'scripts' => [
				'libs/jcf/jcf.js',
				'libs/jcf/jcf.select.js',
				'libs/jcf/jcf.range.js'
			],
			'projects' => $projects,
			'categories' => ProjectCategory::get(),
			'stages' => ProjectStage::get()
		];
		
		return view('pages.projects.all')->with($data);
	}
	
	public function singleProject($id)
	{
		$data = [
			'project' => Project::find($id)
		];
		
		return view('pages.projects.single')->with($data);
	}
	
	public function addProjectView()
	{
		$data = [
			'categories' => ProjectCategory::get(),
			'stages' => ProjectStage::get(),
			'clients' => User::where('is_developer', false)->get()
		];

//		dd($data['clients']);
		
		return view('pages.projects.edit')->with($data);
	}
	
	public function editProjectView($id)
	{
		$data = [
			'project' => Project::find($id),
			'categories' => ProjectCategory::get(),
			'stages' => ProjectStage::get(),
			'clients' => User::where('is_developer', false)->get()
		];
		
		return view('pages.projects.edit')->with($data);
	}
	
	public function addProject(ProjectRequest $request)
	{
//		$project = Project::create([
//			'title'
//		]);
		
		
		dd($request->all());
	}
}
