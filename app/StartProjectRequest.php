<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartProjectRequest extends Model
{
	protected $table = 'start_project_requests';
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
}
