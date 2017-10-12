<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectEditRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		$rules = [
			'cover'             => 'image|mimes:jpeg,bmp,png|max:1024',
			'main_image'        => 'image|mimes:jpeg,bmp,png|max:3072',
			'title'             => 'required|string|between:4,256',
			'category'          => 'required',
			'short_description' => 'required|string|between:4,512',
			'description'       => 'required|between:4,4096',
			'stages'            => 'required',
			'stage'             => 'required',
			'slider_images.*'   => 'image|mimes:jpeg,bmp,png|max:2048',
			'developers'        => 'required',
			'client'            => 'required',
			'client_review' 		=> 'string|between:4,512|nullable',
			'link'            	=> 'url|nullable',
			'closed_at'					=> 'required|date_format:d.m.Y',
		];
		
		return $rules;
	}
}
