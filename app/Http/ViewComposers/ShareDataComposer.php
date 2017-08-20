<?php

namespace App\Http\ViewComposers;

use App\ProjectCategory;
use Arcanedev\NoCaptcha\NoCaptcha;
use Illuminate\View\View;

class ShareDataComposer
{
	private $captcha = false;

	public function __construct()
	{
		$this->captcha = new NoCaptcha(
			env('NOCAPTCHA_SECRET'),
			env('NOCAPTCHA_SITEKEY'),
			app()->getLocale()
		);
	}

	public function compose(View $view)
	{
		$view->with([
			'project_categories' => ProjectCategory::get(),
			'captcha'            => $this->captcha,
		]);
	}
}