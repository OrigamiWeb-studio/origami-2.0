<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
	use SoftDeletes;

	protected $table = 'tickets';
	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'closed_at'];
	
	public function project()
	{
		return $this->hasOne(Project::class, 'id', 'project_id');
	}
	
	public function stage()
	{
		return $this->hasOne(ProjectStage::class, 'id', 'current_stage_id');
	}
	
	public function developer()
	{
		return $this->hasOne(Developer::class, 'id', 'developer_id');
	}
	
	public function steps()
	{
		return $this->hasMany(TicketStep::class, 'ticket_id', 'id');
	}
	
	public function comments()
	{
		return $this->hasMany(TicketComment::class, 'ticket_id', 'id');
	}
}
