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
//			'projects' => Project::where('client_review', '<>', null)->get()
		];
		
//		dd($data['reviews']);
		
		return view('pages.home', $data);
	}
	
	public function sendForm(Request $request)
	{
		dd($request);
	}
}
