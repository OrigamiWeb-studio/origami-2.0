<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleTranslation extends Model
{
	public $table = 'role_translations';
	public $timestamps = false;
	public $fillable = ['display_name', 'description'];
}
