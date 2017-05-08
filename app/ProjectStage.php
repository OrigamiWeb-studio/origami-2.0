<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model
{
	use Translatable;
	
	public $table = 'project_stages';
	public $translationModel = ProjectStageTranslation::class;
	public $translatedAttributes = ['title'];
}
