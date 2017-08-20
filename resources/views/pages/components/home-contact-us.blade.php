<section class="s_contact leaning_section">
	<div class="container">

		<h2>{{ __('Write to Us') }}</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>

		<form class="origami-form s_contact__form" action="{{ route('save-contact-us-request') }}" method="get">
			{{ csrf_field() }}

			<div class="origami-form__form-group">
				<label for="homeform__name" class="origami-form__label">{{ __('Name') }} *</label>
				<input class="origami-form__input @if($errors->has('name')) origami-form__input_error @endif" id="homeform__name"
				       name="name" value="{{ old('name') }}" required>
			</div>

			<div class="origami-form__form-group">
				<label for="homeform__email" class="origami-form__label">Email *</label>
				<input class="origami-form__input @if($errors->has('email')) origami-form__input_error @endif" type="email"
				       name="email" id="homeform__email" value="{{ old('email') }}" required>
			</div>

			<div class="origami-form__form-group">
				<label for="homeform__phone" class="origami-form__label">{{ __('Phone number') }}</label>
				<input class="origami-form__input @if($errors->has('phone')) origami-form__input_error @endif"
				       name="phone" id="homeform__phone" value="{{ old('phone') }}">
			</div>

			<div class="origami-form__form-group">
				<label for="homeform__message" class="origami-form__label">{{ __('Project details') }} *</label>
				<textarea class="origami-form__input @if($errors->has('project_details')) origami-form__input_error @endif origami-form__input_textarea"
				          name="description" id="homeform__message" rows="4" required>{{ old('project_details') }}</textarea>
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

			@if($errors->has('project_details'))
				<div class="origami-form__form-group">
					<div class="alert alert_danger">
						{{ $errors->first('project_details') }}
					</div>
				</div>
			@endif

			@if($errors->has('g-recaptcha-response'))
				<div class="origami-form__form-group">
					<div class="alert alert_danger">
						{{ $errors->first('g-recaptcha-response') }}
					</div>
				</div>
			@endif

			<div class="origami-form__form-group">
				{!! $captcha->display('captcha-contact-us') !!}
			</div>

			<div class="origami-form__form-group">
				<input type="submit" class="btn btn-submit" value="{{ __('Send') }}">
			</div>
		</form>

	</div>
</section>