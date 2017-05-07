<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	use Translatable;
	
	public $table = 'profiles';
	public $translationModel = 'App\ProfileTranslation';
	public $translatedAttributes = ['first_name', 'last_name'];
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
	
	public function phones()
	{
		return $this->hasMany(ProfilePhone::class);
	}
	
	public function emails()
	{
		return $this->hasMany(ProfileEmail::class);
	}
	
	public function socials()
	{
		return $this->hasMany(ProfileSocial::class);
	}
}
