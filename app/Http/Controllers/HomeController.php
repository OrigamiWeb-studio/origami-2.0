<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'user' => Auth::user(),
			'developer' => Developer::find(1)
		];
		
		return view('pages.home', $data);
	}
}
