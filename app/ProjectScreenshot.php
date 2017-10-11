<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectScreenshot extends Model
{
	use SoftDeletes;

	protected $table = 'project_screenshots';
	protected $fillable = ['link'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	public function getLinkAttribute() {
		return file_exists(public_path($this->attributes['link'])) ? $this->attributes['link'] : '/images/image.svg';
	}
}
