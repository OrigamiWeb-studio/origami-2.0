<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'projects' => Project::get(),
		];
		
		app()->setLocale('uk');
		return view('pages.home', $data);
	}
	
	public function sendForm(Request $request)
	{
		dd($request);
	}
}
