<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		return [
			'title' => 'required|string|between:4,256',
			'client' => 'required',
			'category' => 'required',
			'stage' => 'required',
			'link' => 'string',
			'review' => 'string',
			'description' => 'required|string|between:4,1024'
		];
	}
}
