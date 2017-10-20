<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
	use Translatable, SoftDeletes;
	
	public $table = 'projects';
	public $translationModel = ProjectTranslation::class;
	public $translatedAttributes = ['title', 'description', 'short_description'];
	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'closed_at'];
	
	public function category()
	{
		return $this->hasOne(ProjectCategory::class, 'id', 'category_id');
	}
	
	public function client()
	{
		return $this->hasOne(User::class, 'id', 'client_id');
	}

	public function last_editor()
	{
		return $this->hasOne(Developer::class, 'id', 'last_edit_by');
	}
	
	public function developers()
	{
		return $this->belongsToMany(Developer::class, 'project_developer', 'project_id', 'developer_id');
	}
	
	public function stages()
	{
		return $this->belongsToMany(ProjectStage::class, 'project_stage', 'project_id', 'stage_id');
	}
	
	public function current_stage()
	{
		return $this->hasOne(ProjectStage::class, 'id', 'current_stage_id');
	}
	
	public function screenshots()
	{
		return $this->hasMany(ProjectScreenshot::class, 'project_id', 'id');
	}
	
	public function comments()
	{
		return $this->hasMany(ProjectComment::class, 'project_id', 'id');
	}
	
	public function tickets()
	{
		return $this->hasMany(Ticket::class, 'project_id', 'id');
	}
}
