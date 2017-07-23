<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailRequest extends Model
{
	protected $table = 'email_requests';
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
	
	public function project_category()
	{
		return $this->hasOne(ProjectCategory::class, 'id', 'project_category_id');
	}
}
