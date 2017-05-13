<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
	use Translatable;
	
	public $table = 'developers';
	public $translationModel = DeveloperTranslation::class;
	public $translatedAttributes = ['interests', 'location'];
	
	public function profile()
	{
		return $this->hasOne(Profile::class, 'id', 'profile_id');
	}
	
	public function languages()
	{
		return $this->hasMany(DeveloperLanguage::class);
	}
	
	public function skills()
	{
		return $this->hasMany(DeveloperSkill::class);
	}
	
	public function educations()
	{
		return $this->hasMany(DeveloperEducation::class);
	}
	
	public function experiences()
	{
		return $this->hasMany(DeveloperExperience::class);
	}
	
	public function projects()
	{
		return $this->belongsToMany(Project::class, 'project_developer', 'developer_id', 'project_id');
	}
}
