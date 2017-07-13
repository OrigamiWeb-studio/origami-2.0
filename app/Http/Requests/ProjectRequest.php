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
			'title'    => 'required|string|between:4,256',
			'client'   => 'required|integer',
			'category' => 'required|integer',
			'stage'    => 'required|integer',
			'stages'   => 'required|array',
			'cover'    => 'image',
			
			'main_image' => 'image',
			
			'stages.*'          => 'integer',
			'developers'        => 'required|array',
			'developers.*'      => 'integer',
			'link'              => 'string',
			'review'            => 'string',
			'description'       => 'string|between:4,4096',
			'short_description' => 'required|string|between:4,512'
		];
	}
}
