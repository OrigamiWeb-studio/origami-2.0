<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	use Translatable;
	
	public $table = 'roles';
	public $translationModel = 'App\RoleTranslation';
	public $translatedAttributes = ['display_name', 'description'];
	
}
