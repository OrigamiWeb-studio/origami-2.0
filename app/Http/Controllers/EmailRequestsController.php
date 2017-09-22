<?php

namespace App\Http\Controllers;

use App\EmailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EmailRequestsController extends Controller
{
	private function sendEmail($email_request)
	{
		foreach (config('app.notification_emails') as $email) {
			Mail::send('emails.start-project', ['request' => $email_request], function ($message) use ($email, $email_request) {
				$message->from('contact@origami.team', 'Origami Team');
				$message->to($email)->subject($email_request->type . ' email');
			});
		}
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
			$e_request = new EmailRequest();

			$e_request->name = $request['name'];
			$e_request->type = 'Start project';
			$e_request->user_id = auth()->user() ? auth()->user()->id : null;
			$e_request->user_ip = $request->ip();
			$e_request->company = isset($request['company']) ? $request['company'] : '';
			$e_request->email = $request['email'];
			$e_request->phone = isset($request['phone']) ? $request['phone'] : '';
			$e_request->budget = $request['budget'];
			$e_request->project_category_id = $request['project_type'];
			$e_request->message = $request['project_details'];

			$e_request->save();

			$this->sendEmail($e_request);

			return response()->json(['success' => 'Your message has been successfully sent']);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}

	public function saveContactUsRequest(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name'                 => 'required|string|between:2,255',
			'email'                => 'required|email',
			'project_details'      => 'required|string|between:4,2048',
			'g-recaptcha-response' => 'required|captcha',
		]);

		if ($validator->passes()) {
			$e_request = new EmailRequest();

			$e_request->name = $request['name'];
			$e_request->type = 'Contact us';
			$e_request->user_id = auth()->user() ? auth()->user()->id : null;
			$e_request->user_ip = $request->ip();
			$e_request->email = $request['email'];
			$e_request->phone = isset($request['phone']) ? $request['phone'] : null;
			$e_request->message = $request['project_details'];

			$e_request->save();

			$this->sendEmail($e_request);

			return response()->json([
				'success' => 'Your message has been successfully sent',
				'token'   => csrf_token(),
			]);
		}

		return response()->json(['error' => $validator->errors()->all()]);
	}
}
