<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\ProjectCategory;
use App\ProjectStage;
use App\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
	public function index()
	{
		$data = [
			'styles' => [
				'css/about-style.css'
			],
			'projects' => Project::where('cover', '!=', null)->get()
		];
		
		return view('pages.about')->with($data);
	}
}