<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class DeveloperLanguage extends Model
{
	use Translatable;
	
	public $table = 'developer_languages';
	public $translationModel = DeveloperLanguageTranslation::class;
	public $translatedAttributes = ['title'];
}
