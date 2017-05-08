<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperEducationTranslation extends Model
{
	public $table = 'dev_edu_trans';
	public $timestamps = false;
	public $fillable = ['title', 'location', 'profession'];
}
