<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperExperienceTranslation extends Model
{
	public $table = 'dev_exp_trans';
	public $timestamps = false;
	public $fillable = ['title', 'location', 'position', 'description'];
}
