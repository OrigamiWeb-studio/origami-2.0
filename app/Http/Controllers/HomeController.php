<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'projects' => Project::limit(5)->get()
		];
		
		return view('pages.home', $data);
	}
	
	public function sendForm(Request $request)
	{
		dd($request);
	}
}
