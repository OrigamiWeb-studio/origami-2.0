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
		$rules = [
			'title'             => 'required|string|between:4,256',
			'client'            => 'required|integer',
			'category'          => 'required|integer',
			'stage'             => 'required|integer',
			'stages'            => 'required|array',
			'stages.*'          => 'integer',
			'slider_images'     => 'array',
			'slider_images.*'   => 'image|mimes:jpeg,bmp,png|max:2000',
			'cover'             => 'image',
			'main_image'        => 'image',
			'developers'        => 'required|array',
			'developers.*'      => 'integer',
			'link'              => 'string',
			'review'            => 'string',
			'description'       => 'string|between:4,4096',
			'short_description' => 'required|string|between:4,512'
		];
		
		return $rules;
	}
}
