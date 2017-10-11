<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectComment extends Model
{
	use SoftDeletes;

	protected $table = 'project_comments';
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
	
	public function answers()
	{
		return $this->hasMany(ProjectComment::class, 'parent_id', 'id');
	}
}
