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
			'projects' => Project::get(),
		];
		
		return view('pages.home', $data);
	}
}
