<?php

namespace App\Http\Controllers;

use App\Project;
use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
	#GET /projects/{project_slug}/tickets
	public function projectTickets($project_slug) {
		$project = Project::where('slug', '=', $project_slug)->first();

		$data = [
			'project' => $project,
			'tickets' => Ticket::where('project_id', '=', $project->id)->get()
		];
		
		return view('pages.tickets.tickets-all')->with($data);
	}

	#GET /projects/{project_id}/tickets/{id}
	public function singleTicket($id) {
		$data = [
			'ticket' => Ticket::find($id)
		];
		
		return view('pages.tickets.tickets-single')->with($data);
	}
}
