<?php

namespace App\Providers;

use Arcanedev\NoCaptcha\NoCaptcha;
use App\ProjectCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$project_categories = ProjectCategory::get();
		$captcha = new NoCaptcha('6LecsgoUAAAAAETHKPedtB3WA_To0qtFLpOhhSRh', '6LecsgoUAAAAAPztnF6sF-q_59bsbA7SgcW3FvbW', app()->getLocale());
		$captcha->setLang('en');
		
		View::share('project_categories', $project_categories);
		View::share('captcha', $captcha);
	}
	
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
