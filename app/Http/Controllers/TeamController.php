<?php

namespace App\Http\Controllers;

use App\Developer;
use Illuminate\Http\Request;

class TeamController extends Controller
{
	public function allDevelopers()
	{
		$data = [
			'developers' => Developer::get(),
		];

		return view('pages.developers.developers-all')->with($data);
	}

	public function singleDeveloper($surname)
	{
		$developer = Developer::whereHas('profile', function ($query) use ($surname) {
			$query->whereTranslation('last_name', ucfirst($surname));
		})->first();

		if (!$developer) abort(404);

		$data = [
			'developer' => $developer,
		];

		return view('pages.developers.developers-single')->with($data);
	}
}
