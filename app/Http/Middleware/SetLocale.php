<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Locale;
use Closure;

class SetLocale
{
	public function handle($request, Closure $next)
	{
		$_locales = Locale::where('active', true)->orderBy('order')->get();
		$locale = session('locales.current.code');
		$locales['current'] = $_locales->first()->toArray();
		$locales['list'] = $_locales->toArray();
		
		$user = Auth::user() ? Auth::user() : false;
		
		if ($user && $_locales->contains('code', $user->language_code))
			$locales['current'] = $_locales->where('code', '=', $user->language_code)->first()->toArray();
		
		else {
			if ($_locales->contains('code', $locale))
				$locales['current'] = $_locales->where('code', '=', $locale)->first()->toArray();
			else
				$locales['current'] = $_locales->where('code', '=', \config('app.locale'))->first()->toArray();
		}
		
		app()->setLocale($locales['current']['code']);
		session()->put('locales', $locales);
		
		return $next($request);
	}
}
