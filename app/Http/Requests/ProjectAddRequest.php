<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectAddRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		$rules = [
			'title'             => 'required|string|between:4,256',
			'client'            => 'required',
			'category'          => 'required',
			'stage'             => 'required',
			'stages'            => 'required',
			'slider_images.*'   => 'image|mimes:jpeg,bmp,png|max:2000',
			'cover'             => 'image',
			'main_image'        => 'image',
			'developers'        => 'required',
			'description'       => 'required|between:4,4096',
			'short_description' => 'required|string|between:4,512'
		];
		
		return $rules;
	}
}
