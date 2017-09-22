<?php

namespace App\Http\Controllers;

use App\Project;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'styles'   => config('resources.home.styles'),
			'scripts'  => config('resources.home.scripts'),
			'projects' => Project::where('visible', true)->get(),
		];
		
		return view('pages.home', $data);
	}
}
