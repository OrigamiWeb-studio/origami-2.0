<?php

namespace App\Http\Controllers;

use App\Locale;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function index()
	{
		$data = [
			'projects' => Project::get(),
		];
		
		return view('pages.home', $data);
	}
	
	public function sendForm(Request $request)
	{
		dd($request);
	}
	
	public function setLocale($code)
	{
		$_locales = Locale::where('active', true)->orderBy('order')->get();
		
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
