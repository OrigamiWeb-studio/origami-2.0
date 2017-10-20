<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\ProjectCategory;
use App\ProjectStage;
use App\User;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
	public function index()
	{
		$data = [
			'title'   => __('Contact details of the studio of development web-sites'),
			'styles'  => config('resources.contacts.styles'),
			'scripts' => config('resources.contacts.scripts'),
		];
		
		return view('pages.contacts')->with($data);
	}
}