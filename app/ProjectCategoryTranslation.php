<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategoryTranslation extends Model
{
	public $table = 'project_cat_trans';
	public $timestamps = false;
	public $fillable = ['title'];
}
