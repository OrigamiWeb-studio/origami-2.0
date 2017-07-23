@extends('layouts.app')

@section('content')

	<main>

		<section class="s_hero">
			<div class="container">
				<div class="site_title">
					<h1>Origami Web-Studio</h1>
					<p>{{ __('We develop a websites of any complexity.') }}</p>
				</div>
				<div class="scroll-down">
					<a href="#" v-scroll-to="'.s_projects'">{{ __('Scroll down') }} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
				</div>
			</div>
		</section>

		@if($projects->isNotEmpty())
			<section class="s_projects leaning_section">
				<div class="container">
					<h2>{{ __('Our projects') }}</h2>
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
					<a href="{{ route('projects') }}">{{ __('All projects') }}</a>
				</div>
			</section>
		@endif

		@if($projects->isNotEmpty())
			<section class="s_clients leaning_section">
				<div class="container">
					<h2>{{ __('Clients') }}</h2>
					<div class="reviews-slider-wrapper">
						<ul id="reviews-slider" class="reviews-slider list-unstyled cS-hidden">
							@foreach($projects->where('client_review', '!=', null) as $project)
								<li>
									<blockquote>{{ $project->client_review }}</blockquote>
									<strong>{{ $project->client->profile->first_name.' '.$project->client->profile->last_name }}</strong>
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

				<h2>{{ __('Write to Us') }}</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>

				<form class="origami-form s_contact__form" action="{{ route('save-contact-us-request') }}" method="get">
					{{ csrf_field() }}

					<div class="origami-form__form-group">
						<label for="homeform__name" class="origami-form__label">{{ __('Name') }} *</label>
						<input class="origami-form__input @if($errors->has('name')) origami-form__input_error @endif" id="homeform-name" type="text"
						       name="name" id="homeform__name" value="{{ old('name') }}" required>
					</div>

					<div class="origami-form__form-group">
						<label for="homeform__email" class="origami-form__label">Email *</label>
						<input class="origami-form__input @if($errors->has('email')) origami-form__input_error @endif" type="email"
						       name="email" id="homeform__email" value="{{ old('email') }}" required>
					</div>

					<div class="origami-form__form-group">
						<label for="homeform__phone" class="origami-form__label">{{ __('Phone number') }}</label>
						<input class="origami-form__input @if($errors->has('phone')) origami-form__input_error @endif" type="text"
						       name="phone" id="homeform__phone" value="{{ old('phone') }}">
					</div>

					<div class="origami-form__form-group">
						<label for="homeform__message" class="origami-form__label">{{ __('Project details') }} *</label>
						<textarea class="origami-form__input @if($errors->has('description')) origami-form__input_error @endif origami-form__input_textarea"
						          name="description" id="homeform__message" rows="4" required>{{ old('description') }}</textarea>
					</div>


					@if($errors->has('name'))
						<div class="origami-form__form-group">
							<div class="alert alert_danger">
								{{ $errors->first('name') }}
							</div>
						</div>
					@endif

					@if($errors->has('email'))
						<div class="origami-form__form-group">
							<div class="alert alert_danger">
								{{ $errors->first('email') }}
							</div>
						</div>
					@endif

					@if($errors->has('phone'))
						<div class="origami-form__form-group">
							<div class="alert alert_danger">
								{{ $errors->first('phone') }}
							</div>
						</div>
					@endif

					@if($errors->has('description'))
						<div class="origami-form__form-group">
							<div class="alert alert_danger">
								{{ $errors->first('description') }}
							</div>
						</div>
					@endif

					<div class="origami-form__form-group">
						<input type="submit" class="btn btn-submit" value="{{ __('Send') }}">
					</div>
				</form>

			</div>
		</section>

	</main>
@stop