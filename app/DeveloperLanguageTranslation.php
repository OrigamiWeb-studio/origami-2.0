<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperLanguageTranslation extends Model
{
	public $table = 'dev_lang_trans';
	public $timestamps = false;
	public $fillable = ['title'];
}
