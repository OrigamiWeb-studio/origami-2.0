<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	use Translatable;
	
	public $table = 'profiles';
	public $translationModel = ProfileTranslation::class;
	public $translatedAttributes = ['first_name', 'last_name', 'about'];
	
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
	
	public function developer()
	{
		return $this->hasOne(Developer::class, 'profile_id', 'id');
	}
	
	public function getNameAttribute()
	{
		return $this->first_name . ' ' . $this->last_name;
	}
}
