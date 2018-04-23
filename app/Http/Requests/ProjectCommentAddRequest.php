<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCommentAddRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		if (auth()->guest()) {
			$rules['name'] = 'required|string|between:2,255';
			$rules['email']   = 'required|string|email|max:255';
//			$rules['g-recaptcha'] = '';
		}

		$rules['message'] = 'required|between:4,4096';

		return $rules;
	}
}
