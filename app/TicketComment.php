<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
	protected $table = 'ticket_comments';
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
}
