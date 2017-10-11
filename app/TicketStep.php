<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketStep extends Model
{
	use SoftDeletes;

	protected $table = 'ticket_steps';
	protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	public function developer()
	{
		return $this->hasOne(Developer::class, 'id', 'developer_id');
	}
	
	public function ticket()
	{
		return $this->hasOne(Ticket::class, 'id', 'ticket_id');
	}
	
	public function stage()
	{
		return $this->hasOne(ProjectStage::class, 'id', 'stage_id');
	}
}
