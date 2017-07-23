<?php

namespace App\Http\Controllers;

use App\Http\Requests\StartProjectRequest;

class EmailRequestsController extends Controller
{
	public function saveStartProjectRequest(StartProjectRequest $request) {
		$sp_request = new \App\StartProjectRequest();
		
		$sp_request->name = $request['name'];
		$sp_request->user_id = auth()->user() ? auth()->user()->id : null;
		$sp_request->user_ip = $request->ip();
		$sp_request->company = isset($request['company']) ? $request['company'] : '';
		$sp_request->email = $request['email'];
		$sp_request->phone = isset($request['number']) ? $request['number'] : '';
		$sp_request->budget = $request['budget'];
		$sp_request->project_category_id = $request['project_type'];
		$sp_request->description = $request['description'];
		
		$sp_request->save();
		
		return redirect()->back()->with('success', 'Your message has been successfully sent');
	}
}
