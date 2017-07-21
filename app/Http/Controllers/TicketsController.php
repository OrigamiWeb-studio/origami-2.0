<?php

namespace App\Http\Controllers;

use App\Project;
use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
	public function projectTickets($project_id) {
		$data = [
			'project' => Project::find($project_id),
			'tickets' => Ticket::where('project_id', '=', $project_id)->get()
		];
		
		return view('pages.tickets.tickets-all')->with($data);
	}
	
	public function singleTicket($id) {
		$data = [
			'ticket' => Ticket::find($id)
		];
		
		return view('pages.tickets.tickets-single')->with($data);
	}
}