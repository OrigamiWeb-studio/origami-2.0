<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectComment extends Model
{
	protected $table = 'project_comments';
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
}
