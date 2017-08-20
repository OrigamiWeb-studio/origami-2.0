<?php

namespace App\Http\Controllers;

use App\Locale;

class LocalesController extends Controller
{
	public function setLocale($code)
	{
		$_locales = Locale::where('active', true)
			->orderBy('order')
			->get();

		if ($_locales->contains('code', $code))
			$locales['current'] = $_locales->where('code', '=', $code)->first()->toArray();
		else abort(404);

		$locales['list'] = $_locales->toArray();

		app()->setLocale($locales['current']['code']);
		session()->put('locales', $locales);

		if ($user = auth()->user()) {
			$user->language_code = $locales['current']['code'];
			$user->save();
		}

		return back();
	}
}
