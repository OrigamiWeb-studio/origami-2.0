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
			'title'    => __('About Us'),
			'styles'   => config('resources.about.styles'),
			'scripts'  => config('resources.about.scripts'),
			'projects' => Project::where([['cover', '!=', null], ['visible', true]])->inRandomOrder()->get(),
			'stages'   => ProjectStage::get(),
		];

		return view('pages.about')->with($data);
	}
}