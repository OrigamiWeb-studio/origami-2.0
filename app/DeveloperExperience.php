<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class DeveloperExperience extends Model
{
	use Translatable;
	
	public $table = 'developer_experiences';
	public $translationModel = 'App\DeveloperExperienceTranslation';
	public $translatedAttributes = ['title', 'location', 'position', 'description'];
}
