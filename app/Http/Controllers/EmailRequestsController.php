<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartProjectRequest;

class EmailRequestsController extends Controller
{
	public function saveStartProjectRequest(StartProjectRequest $request) {
		
		$spr = new \App\StartProjectRequest();
		
		dd($spr);
		
	}
}
