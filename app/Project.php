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
	
	public function client()
	{
		return $this->hasOne(User::class, 'id', 'client_id');
	}
	
	public function developers()
	{
		return $this->belongsToMany(Developer::class, 'project_developer', 'developer_id', 'project_id');
	}
}
