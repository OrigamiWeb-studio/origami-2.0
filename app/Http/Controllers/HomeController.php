<?php

namespace App\Http\Controllers;

use App\Project;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'project' => Project::find(1)
		];
		
		return view('pages.home', $data);
	}
}
