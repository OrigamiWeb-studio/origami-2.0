@extends('layouts.app')

@section('content')

	{{--@permission('project-create')--}}
	{{--<p>project-create</p>--}}
	{{--@endpermission--}}

	{{--@permission('project-edit')--}}
	{{--<p>project-edit</p>--}}
	{{--@endpermission--}}

	{{--@role('admin')--}}
	{{--<p>admin</p>--}}
	{{--@endrole--}}

	<p>USER: {{ $user->profile->first_name . ' ' . $user->profile->last_name . ' ' . ($user->active ? 'activated' : 'not activated') }},
		{{ $user->profile->sex ? 'male' : 'female' }}</p>

	<div>Phones</div>
	<ul>
		@foreach($user->profile->phones as $phone)
			<li>{{ $phone->value }}</li>
		@endforeach
	</ul>

	<div>Emails</div>
	<ul>
		@foreach($user->profile->emails as $email)
			<li>{{ $email->value }}</li>
		@endforeach
	</ul>

	<div>Socials</div>
	<ul>
		@foreach($user->profile->socials as $social)
			<li>{{ $social->value }}</li>
		@endforeach
	</ul>
	<hr>
	<p>DEVELOPER: {{ $developer->profile->first_name . ' ' . $developer->profile->last_name . ' '
		. ($developer->profile->user->active ? 'activated' : 'not activated') }}</p>

	<div>Languages</div>
	<ul>
		@foreach($developer->languages as $language)
			<li>{{ $language->value }} - {{ $language->translateOrDefault('uk')->title }}</li>
		@endforeach
	</ul>

	<div>Skills</div>
	<ul>
		@foreach($developer->skills as $skill)
			<li>{{ $skill->translateOrDefault('uk')->title }}</li>
		@endforeach
	</ul>

	<div>Educations</div>
	<ul>
		@foreach($developer->educations as $education)
			<li>{{ $education->date_from . '-' . $education->date_to }} :
				{{ $education->title }} ({{ $education->location }}, {{ $education->profession }})
			</li>
		@endforeach
	</ul>

	<div>Experiences</div>
	<ul>
		@foreach($developer->experiences as $experience)
			<li>{{ $experience->date_from . '-' . $experience->date_to }} :
				{{ $experience->title }} ({{ $experience->location }}, {{ $experience->position }})
			</li>
		@endforeach
	</ul>
	<hr>
	<p>PROJECT: {{ $project->title }} ({{ $project->description }}) (Category: {{ $project->category->title }})</p>
	<div>Stages</div>
	<ul>
		@foreach($project->stages as $stage)
			<li>
				@if($stage->id === $project->current_stage->id)
					<b>{{ $stage->title }}</b>
				@else
					<span>{{ $stage->title }}</span>
				@endif
			</li>
		@endforeach
	</ul>
	<div>Screenshots</div>
	<ul>
		@foreach($project->screenshots as $screenshot)
			<li>
				<span>{{ $screenshot->link }}</span>
			</li>
		@endforeach
	</ul>
	<div>Comments</div>
	<ul>
		@foreach($project->comments as $comment)
			<li>
				<span>{{ $comment->message }} &copy; {{ $comment->user->profile->first_name . ' ' . $comment->user->profile->last_name }}</span>
				@if($comment->user->isDeveloper())
					<span>developer kurwa!</span>
				@endif
			</li>
		@endforeach
	</ul>
	<p>Client: {{ $project->client->profile->first_name }}</p>
	<div>Developers</div>
	<ul>
		@foreach($project->developers as $developer)
			<li>
				<span>{{ $developer->profile->first_name . ' ' . $developer->profile->last_name }}</span>
				@if($developer->projects->isNotEmpty())
					<ul>
						@foreach($developer->projects as $item)
							<li>{{ $item->title }} ({{ $item->category->title }})</li>
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach
	</ul>
	<hr>
	<div>Tickets</div>
	<ul>
		@foreach($project->tickets as $ticket)
			<li>
				<span>{{ $ticket->title }}</span>
				(<span>client: {{ $ticket->project->client->profile->first_name }}</span>)
				(<span>stage: {{ $ticket->stage->title }}</span>)
				(<span>developer: {{ $ticket->developer->profile->last_name }}</span>)
				@if($ticket->steps->isNotEmpty())
					<ul>
						<li>STEPS</li>
						@foreach($ticket->steps as $step)
							<li>{{ $step->time }} minutes - {{ $step->developer->profile->first_name }} : {{ $step->comment }}</li>
						@endforeach
					</ul>
				@endif
				@if($ticket->comments->isNotEmpty())
					<ul>
						<li>COMMENTS</li>
						@foreach($ticket->comments as $comment)
							<li>{{ $comment->comment }} ({{ $comment->user->profile->first_name . ' ' . $comment->user->profile->last_name }})</li>
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach
	</ul>

	{{--	{{ \Illuminate\Support\Facades\Auth::user()->profile->phones[0] }}--}}

@stop