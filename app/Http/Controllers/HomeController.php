<?php

namespace App\Http\Controllers;

use App\Locale;
use App\Project;
use App\EmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'styles'   => config('resources.home.styles'),
			'scripts'  => config('resources.home.scripts'),
			'projects' => Project::get(),
		];
		
		return view('pages.home', $data);
	}
	
	public function setLocale($code)
	{
		$_locales = Locale::where('active', true)
			->orderBy('order')
			->get();

		if ($_locales->contains('code', $code))
			$locales['current'] = $_locales->where('code', '=', $code)->first()->toArray();
		else
			abort(404);
		
		$locales['list'] = $_locales->toArray();
		
		app()->setLocale($locales['current']['code']);
		session()->put('locales', $locales);
		
		if ($user = Auth::user()) {
			$user->language_code = $locales['current']['code'];
			$user->save();
		}
		
		return back();
	}
}
