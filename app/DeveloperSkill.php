<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class DeveloperSkill extends Model
{
	use Translatable;
	
	public $table = 'developer_skills';
	public $translationModel = DeveloperSkillTranslation::class;
	public $translatedAttributes = ['title'];
}
