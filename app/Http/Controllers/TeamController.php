<?php

namespace App\Http\Controllers;

use App\Developer;
use Illuminate\Http\Request;

class TeamController extends Controller
{
	public function allDevelopers()
	{
		$data = [
			'developers' => Developer::get()
		];
		
		return view('pages.team.all')->with($data);
	}
	
	public function singleDeveloper($id)
	{
		$data = [
			'developer' => Developer::find($id)
		];
		
		return view('pages.team.single')->with($data);
	}
}
