@extends('layouts.app')

@section('content')
	<p>{{ $project->title }}</p>
	<p>{{ $project->category->title }}</p>
	<p>{{ $project->stages[0]->title }}</p>
	<p>{{ $project->stages[0]->curator->profile->first_name }}</p>
	<p>{{ $project->screenshots[0]->link }}</p>
	<p>{{ $project->comments[0]->message }}</p>
	<p>{{ $project->comments[1]->user->profile->first_name }}</p>
	<p>{{ $project->tickets[0]->title }}</p>
	<p>{{ $project->tickets[0]->steps[0]->comment }}</p>
	<p>{{ $project->tickets[0]->steps[0]->developer->profile->first_name }}</p>
	<p>{{ $project->tickets[0]->steps[0]->developer->profile->emails[0]->value }}</p>
	<p>{{ $project->tickets[0]->comments[0]->message }}</p>
	<p>{{ $project->tickets[0]->comments[0]->user->profile->photo }}</p>
	<p>{{ $project->tickets[0]->stage->title }}</p>
	<p>{{ $project->tickets[0]->project->client->profile->first_name }}</p>
	<p>{{ $project->tickets[0]->steps[0]->developer->about }}</p>
	<p>{{ $project->tickets[0]->steps[0]->developer->skills[0]->title }}</p>
	<p>{{ $project->tickets[0]->steps[0]->developer->languages[0]->title }}</p>
@stop