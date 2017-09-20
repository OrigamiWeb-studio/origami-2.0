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
						<a href="{{ route('project', ['id' => $project->id]) }}">{{ $project->title }}</a>
					</li>
					<li>
						<span>{{ __('Tickets') }}</span>
					</li>
				</ul>
			</div>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>{{ $project->title }} - список тікетів</h1>
					<ul>
						@foreach($tickets as $ticket)
							<li style="background: #EAEAEA; margin-bottom: 2px">
								<a href="{{ route('ticket', ['id' => $ticket->id]) }}">
									<span>{{ $ticket->title }}</span>
									@role('owner')
									<span>({{ $ticket->total_time }} min. = {{ $ticket->total_price }}$)</span>
									@endrole()
									<span> - {{ $ticket->developer->profile->name }}</span>
									<span> - {{ $ticket->stage->title }}</span>
									<span> - priority: {{ $ticket->priority }}</span>
									<span> - type: {{ $ticket->type == 1 ? 'bug' : 'new functionality' }}</span>
									<span> - status: {{ $ticket->status == 0 ? 'done' : 'process' }}</span>
									<span> - updated: {{ $ticket->updated_at }}</span>
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>


	</main>
@stop