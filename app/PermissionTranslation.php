<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionTranslation extends Model
{
	public $table = 'permission_translations';
	public $timestamps = false;
	public $fillable = ['display_name', 'description'];
}
