<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
	public function allProjects()
	{
		$data = [
            'styles'   => [
                'libs/jcf/jcf.css',
                'css/projects-style.css'
            ],
            'scripts'  => [
                'libs/jcf/jcf.js',
                'libs/jcf/jcf.select.js',
                'libs/jcf/jcf.range.js'
            ],
			'projects' => Project::get()
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
}
