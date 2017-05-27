<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperSkillTranslation extends Model
{
	public $table = 'developer_skill_translations';
	public $timestamps = false;
	public $fillable = ['title'];
}
