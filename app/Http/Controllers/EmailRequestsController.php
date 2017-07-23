<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;

class EmailRequestsController extends Controller
{
	public function saveStartProjectRequest(EmailRequest $request) {
		$sp_request = new \App\EmailRequest();
		
		$sp_request->name = $request['name'];
		$sp_request->type = 'Start project';
		$sp_request->user_id = auth()->user() ? auth()->user()->id : null;
		$sp_request->user_ip = $request->ip();
		$sp_request->company = isset($request['company']) ? $request['company'] : '';
		$sp_request->email = $request['email'];
		$sp_request->phone = isset($request['number']) ? $request['number'] : '';
		$sp_request->budget = $request['budget'];
		$sp_request->project_category_id = $request['project_type'];
		$sp_request->message = $request['description'];
		
		$sp_request->save();
		
		return redirect()->back()->with('success', 'Your message has been successfully sent');
	}
	
	public function saveContactUsRequest(EmailRequest $request) {
		$sp_request = new \App\EmailRequest();
		
		$sp_request->name = $request['name'];
		$sp_request->type = 'Contact us';
		$sp_request->user_id = auth()->user() ? auth()->user()->id : null;
		$sp_request->user_ip = $request->ip();
		$sp_request->email = $request['email'];
		$sp_request->phone = isset($request['number']) ? $request['number'] : null;
		$sp_request->message = $request['description'];
		
		$sp_request->save();
		
		return redirect()->back()->with('success', 'Your message has been successfully sent');
	}
}
