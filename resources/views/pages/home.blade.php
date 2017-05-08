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
				{{ $education->title }} ({{ $education->location }}, {{ $education->profession }})</li>
		@endforeach
	</ul>

	<div>Experiences</div>
	<ul>
		@foreach($developer->experiences as $experience)
			<li>{{ $experience->date_from . '-' . $experience->date_to }} :
				{{ $experience->title }} ({{ $experience->location }}, {{ $experience->position }})</li>
		@endforeach
	</ul>
	<hr>
	<p>PROJECT: {{ $project->title }} ({{ $project->description }}) (Category: {{ $project->category->title }})</p>

	{{--	{{ \Illuminate\Support\Facades\Auth::user()->profile->phones[0] }}--}}

@stop