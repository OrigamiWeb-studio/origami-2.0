<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Permission;
use App\Project;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'user' => User::find(1),
			'current_user' => User::find(2),
			'developer' => Developer::find(1),
			'project' => Project::find(1)
		];
		
		return view('pages.home', $data);
	}
}
