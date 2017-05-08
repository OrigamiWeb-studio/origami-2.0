<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class DeveloperLanguage extends Model
{
	use Translatable;
	
	public $table = 'developer_languages';
	public $translationModel = 'App\DeveloperLanguageTranslation';
	public $translatedAttributes = ['title'];
}
