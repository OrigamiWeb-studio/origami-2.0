<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
	use Translatable;
	
	public $table = 'project_categories';
	public $translationModel = ProjectCategoryTranslation::class;
	public $translatedAttributes = ['title'];
	
	public function projects()
	{
		return $this->hasMany(Project::class);
	}
}
