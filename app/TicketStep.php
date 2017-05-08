<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketStep extends Model
{
	protected $table = 'ticket_steps';
	
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
