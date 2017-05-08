<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectScreenshot extends Model
{
	protected $table = 'project_screenshots';
	protected $fillable = ['link'];
}
