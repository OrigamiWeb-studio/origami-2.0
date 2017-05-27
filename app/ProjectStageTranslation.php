<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStageTranslation extends Model
{
	public $table = 'project_stages_trans';
	public $timestamps = false;
	public $fillable = ['title'];
}
