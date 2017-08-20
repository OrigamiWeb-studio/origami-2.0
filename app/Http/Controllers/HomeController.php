<?php

namespace App\Http\Controllers;

use App\Locale;
use App\Project;
use App\EmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
