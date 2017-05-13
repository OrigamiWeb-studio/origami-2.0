@extends('layouts.app')

@section('content')

	<main>

		<section class="s_hero leaning_section">
			<div class="container">
				<div class="site_title">
					<h1>Origami Web-Studio</h1>
					<p>We develop a websites of any complexity. Lorem ipsum.</p>
				</div>
				<a href="#" class="scroll-down">Scroll down <i class="fa fa-angle-down" aria-hidden="true"></i></a>
			</div>
		</section>

		@if($projects->isNotEmpty())
			<section class="s_projects">
				<div class="container">
					<h2>Our projects</h2>
					<div class="projects-slider-wrapper">
						<ul id="projects-slider" class="projects-slider list-unstyled cS-hidden">
							@foreach($projects as $project)
								<li>
									<a href="{{ route('project', ['id' => $project->id]) }}" class="slide-content">
										<img src="{{ asset($project->cover) }}" alt="{{ $project->title }}">
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					<a href="{{ route('projects') }}">All projects</a>
				</div>
			</section>
		@endif

		@if($projects->isNotEmpty())
			<section class="s_clients leaning_section">
				<div class="container">
					<h2>Clients</h2>
					<div class="reviews-slider-wrapper">
						<ul id="reviews-slider" class="reviews-slider list-unstyled cS-hidden">
							@foreach($projects->where('client_review', '!=', null) as $project)
								<li>
									<blockquote>{{ $project->client_review }}</blockquote>
									<strong>{{ $project->client->profile->first_name.' '.$project->client->profile->last_name }}</strong>,
									<span>{{ $project->client->profile->about }}</span>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</section>
		@endif

		<section class="s_contact leaning_section">
			<div class="container">
				<h2>Write to us</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
				<form action="{{ route('home-send-form') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" placeholder="Name" name="name" id="contact_name" value="{{ old('name') }}">
					</div>
					<div class="form-group">
						<input type="email" placeholder="Email" name="email" id="contact_email" value="{{ old('email') }}">
					</div>
					<div class="form-group">
						<input type="text" placeholder="Phone number" name="phone" id="contact_number" value="{{ old('phone') }}">
					</div>
					<div class="form-group">
						<textarea placeholder="Project details" name="message" id="contact_details" rows="4">{{ old('message') }}</textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn-submit" value="Send request">
					</div>
				</form>
			</div>
		</section>

	</main>
@stop