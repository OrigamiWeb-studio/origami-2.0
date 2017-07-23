<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		$data = [
			'name'        => 'required|string|between:2,255',
			'email'       => 'required|email',
			'description' => 'required|string|between:4,2048'
		];
		
		return $data;
	}
}
