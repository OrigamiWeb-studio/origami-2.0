<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
	use Notifiable;
	use EntrustUserTrait;
	protected $fillable = ['login', 'email', 'password'];
	protected $hidden = ['password', 'remember_token'];
}
