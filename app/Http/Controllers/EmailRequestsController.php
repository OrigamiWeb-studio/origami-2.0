<?php

namespace App\Http\Controllers;

use App\EmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailRequestsController extends Controller
{
	private function sendEmail($email_request)
	{

		//TODO send email

	}

	public function saveStartProjectRequest(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name'                 => 'required|string|between:2,255',
			'email'                => 'required|email',
			'project_details'      => 'required|string|between:4,2048',
			'g-recaptcha-response' => 'required|captcha',
		]);

		if ($validator->passes()) {
			$sp_request = new EmailRequest();

			$sp_request->name = $request['name'];
			$sp_request->type = 'Start project';
			$sp_request->user_id = auth()->user() ? auth()->user()->id : null;
			$sp_request->user_ip = $request->ip();
			$sp_request->company = isset($request['company']) ? $request['company'] : '';
			$sp_request->email = $request['email'];
			$sp_request->phone = isset($request['number']) ? $request['number'] : '';
			$sp_request->budget = $request['budget'];
			$sp_request->project_category_id = $request['project_type'];
			$sp_request->message = $request['project_details'];

			$sp_request->save();

			$this->sendEmail($sp_request);

			return response()->json(['success' => 'Your message has been successfully sent']);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}

	public function saveContactUsRequest(Request $request)
	{
//		$this->validate($request, [
//			'name'                 => 'required|string|between:2,255',
//			'email'                => 'required|email',
//			'project_details'      => 'required|string|between:4,2048',
//			'g-recaptcha-response' => 'required|captcha',
//		]);

		$validator = Validator::make($request->all(), [
			'name'                 => 'required|string|between:2,255',
			'email'                => 'required|email',
			'project_details'          => 'required|string|between:4,2048',
			'g-recaptcha-response' => 'required|captcha',
		]);

		if ($validator->passes()) {
		$sp_request = new EmailRequest();

		$sp_request->name = $request['name'];
		$sp_request->type = 'Contact us';
		$sp_request->user_id = auth()->user() ? auth()->user()->id : null;
		$sp_request->user_ip = $request->ip();
		$sp_request->email = $request['email'];
		$sp_request->phone = isset($request['number']) ? $request['number'] : null;
		$sp_request->message = $request['project_details'];

		$sp_request->save();

		$this->sendEmail($sp_request);

//		return redirect()->back()->with(['success' => 'Your message has been successfully sent']);
			return response()->json(['success' => 'Your message has been successfully sent']);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}
}
