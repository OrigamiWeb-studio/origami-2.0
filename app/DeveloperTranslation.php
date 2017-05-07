<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperTranslation extends Model
{
	public $table = 'developer_translations';
	public $timestamps = false;
	public $fillable = ['about', 'interests', 'location'];
}
