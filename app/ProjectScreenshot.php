<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectScreenshot extends Model
{
	protected $table = 'project_screenshots';
	protected $fillable = ['link'];

	public function getLinkAttribute() {
		return file_exists(public_path($this->attributes['link'])) ? $this->attributes['link'] : '/images/image.svg';
	}
}
