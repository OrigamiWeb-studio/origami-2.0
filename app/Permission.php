<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	use Translatable;
	
	public $table = 'permissions';
	public $translationModel = PermissionTranslation::class;
	public $translatedAttributes = ['display_name', 'description'];
	
}
