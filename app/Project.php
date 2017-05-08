<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	use Translatable;
	
	public $table = 'projects';
	public $translationModel = ProjectTranslation::class;
	public $translatedAttributes = ['title', 'description'];
	
	public function category()
	{
		return $this->hasOne(ProjectCategory::class, 'id', 'category_id');
	}
}
