@extends('layouts.app')

@section('content')
	<main>
		<div class="breadcrumbs">
			<div class="container">
				<ul>
					<li>
						<a href="{{ route('home') }}">{{ __('Home') }}</a>
					</li>
					<li>
						<a href="{{ route('projects') }}">{{ __('Projects') }}</a>
					</li>
					<li>
						<a href="{{ route('project', ['id' => $ticket->project->id]) }}">{{ $ticket->project->title }}</a>
					</li>
					<li>
						<a href="{{ route('project-tickets', ['project_id' => $ticket->project->id]) }}">{{ $ticket->title }}</a>
					</li>
				</ul>
			</div>
		</div>


	{{--TODO--}}


	</main>
@stop