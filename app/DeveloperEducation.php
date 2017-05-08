<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class DeveloperEducation extends Model
{
	use Translatable;
	
	public $table = 'developer_educations';
	public $translationModel = 'App\DeveloperEducationTranslation';
	public $translatedAttributes = ['title', 'location', 'profession'];
}
