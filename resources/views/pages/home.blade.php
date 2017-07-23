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

					<div class="form-group origami-form__form-group">
						<input class="origami-form__input" type="text" placeholder="{{ __('Name') }}"
						       name="name" id="contact_name" value="{{ old('name') }}">
						@if($errors->has('name'))
							<p class="help-block text-danger">{{ $errors->first('name') }}</p>
						@endif
					</div>

					<div class="form-group origami-form__form-group">
						<input class="origami-form__input" type="email" placeholder="Email"
						       name="email" id="contact_email" value="{{ old('email') }}">
						@if($errors->has('email'))
							<p class="help-block text-danger">{{ $errors->first('email') }}</p>
						@endif
					</div>

					<div class="form-group origami-form__form-group">
						<input class="origami-form__input" type="text" placeholder="{{ __('Phone number') }}"
						       name="phone" id="contact_number" value="{{ old('phone') }}">
						@if($errors->has('phone'))
							<p class="help-block text-danger">{{ $errors->first('phone') }}</p>
						@endif
					</div>

					<div class="form-group origami-form__form-group">
						<textarea class="origami-form__input origami-form__input_textarea" placeholder="{{ __('Project details') }}"
						          name="description" id="contact_details" rows="4">{{ old('description') }}</textarea>
						@if($errors->has('description'))
							<p class="help-block text-danger">{{ $errors->first('description') }}</p>
						@endif
					</div>

					<div class="form-group origami-form__form-group">
						<input type="submit" class="btn btn-submit" value="{{ __('Send') }}">
					</div>
				</form>

			</div>
		</section>

	</main>
@stop