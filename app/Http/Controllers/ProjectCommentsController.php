<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCommentAddRequest;
use App\Project;
use App\ProjectComment;
use Illuminate\Http\Request;

class ProjectCommentsController extends Controller
{
	#POST /projects/{slug}/comments/add
	public function addComment(ProjectCommentAddRequest $request) {

//		dd($request->all());

		$comment = new ProjectComment();
		$comment->project_id = $request['project_id'];

		if (isset($request['parent_id']))
			$comment->parent_id = $request['parent_id'];

		if (auth()->user()) {
			$comment->user_id = auth()->user()->id;
			$comment->name = auth()->user()->profile->name;
			$comment->email = auth()->user()->email;
		} elseif (auth()->guest()) {
			$comment->name = $request['name'];
			$comment->email = $request['email'];
		}

		$comment->user_ip = $request->ip();
		$comment->message = $request['message'];

		$comment->save();

		return redirect()->back();
	}

	#GET /projects/{slug}/comments
	public function projectComments($slug) {

		$project = Project::where('slug', '=', $slug)->first();

		if (!$project) return null;

		return $project->comments;

	}
}
