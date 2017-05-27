<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
	public $table = 'project_translations';
	public $timestamps = false;
	public $fillable = ['title', 'description'];
}
