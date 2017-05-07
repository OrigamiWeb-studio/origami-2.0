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

	<p>{{ $user->profile->first_name . ' ' . $user->profile->last_name . ' ' . ($user->active ? 'activated' : 'not activated') }}</p>
	<p>{{ $user->profile->sex ? 'male' : 'female' }}</p>

	<ul>
		@foreach($user->profile->phones as $phone)
			<li>{{ $phone->value }}</li>
		@endforeach
	</ul>

	<ul>
		@foreach($user->profile->emails as $email)
			<li>{{ $email->value }}</li>
		@endforeach
	</ul>

	<ul>
		@foreach($user->profile->socials as $social)
			<li>{{ $social->value }}</li>
		@endforeach
	</ul>

{{--	{{ \Illuminate\Support\Facades\Auth::user()->profile->phones[0] }}--}}

@stop