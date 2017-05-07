<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'user' => Auth::user()
		];
		
		return view('pages.home', $data);
	}
}
