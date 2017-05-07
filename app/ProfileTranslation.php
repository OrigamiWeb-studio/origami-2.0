<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileTranslation extends Model
{
	public $table = 'profile_translations';
	public $timestamps = false;
	public $fillable = ['first_name', 'last_name'];
}
