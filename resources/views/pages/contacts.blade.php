@extends('layouts.app')

@section('content')

	<main>

		<div class="contacts-head">
			<div class="breadcrumbs">
				<div class="container">
					<ul>
						<li>
							<a href="{{ route('home') }}">{{ __('Home') }}</a>
						</li>
						<li>
							<span>{{ __('Contacts') }}</span>
						</li>
					</ul>
				</div>
			</div>
			<header>
				<div class="container">
					<h1>{{ __('Contacts') }}</h1>
				</div>
			</header>
		</div>

		<section class="s-contacts">
			<div class="container">
				<header>
					<h2>{{ __('Get in touch') }}</h2>
				</header>
				<ul>
					<li>
						<div class="s-contacts__col">
							<h3>Email</h3>
						</div>
						<div class="s-contacts__col">
							<dl>
								<dt>{{ __('Support') }}</dt>
								<dd><a href="mailto:contact@origami.team">contact@origami.team</a></dd>
							</dl>
						</div>
					</li>
					<li>
						<div class="s-contacts__col">
							<h3>{{ __('Phones') }}</h3>
						</div>
						<div class="s-contacts__col">
							<dl>
								<dt>{{ __('Ukraine') }}</dt>
								<dd>+380 96 724 2823</dd>
								<dt>{{ __('Poland') }}</dt>
								<dd>+48 535 764 974</dd>
							</dl>
						</div>
					</li>
					<li>
						<div class="s-contacts__col">
							<h3>{{ __('Other') }}</h3>
						</div>
						<div class="s-contacts__col">
							<dl>
								{{--<dt>Skype</dt>--}}
								{{--<dd>origami.team</dd>--}}
								<dt>Telegram</dt>
								<dd><a target="_blank" href="https://t.me/origami_team">@origami_team</a></dd>
								{{--<dt>Viber</dt>--}}
								{{--<dd></dd>--}}
							</dl>
						</div>
					</li>
				</ul>
				<a href="#" class="brief-online" data-toggle="modal" data-target="#writetous-modal">{{ __('Brief online') }}</a>
			</div>
		</section>

		{{--<section class="s_contacts">--}}
			{{--<div class="container">--}}

				{{--<div class="our-contacts">--}}
					{{--<h2>{{ __('Contact us') }}</h2>--}}
					{{--<ul>--}}
						{{--<li>--}}
							{{--<strong>Skype</strong>--}}
							{{--<a href="#">origamiwebstudio</a>--}}
						{{--</li>--}}
						{{--<li>--}}
							{{--<strong>Email</strong>--}}
							{{--<a href="mailto:contact@origami.team">contact@origami.team</a>--}}
						{{--</li>--}}
						{{--<li>--}}
							{{--<strong>{{ __('Phone number') }}</strong>--}}
							{{--<span>+380 (96) 724 28 23</span>--}}
						{{--</li>--}}
					{{--</ul>--}}
					{{--<a href="#" class="btn btn-submit" data-toggle="modal" data-target="#contact-modal">{{ __('We will contact you') }}</a>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</section>--}}

	</main>

	<div class="modal fade origami-modal" id="contact-modal" tabindex="-1" role="dialog">
		<div class="modal-dialog origami-modal__dialog" role="document">
			<div class="modal-content origami-modal__content">
				<div class="modal-header origami-modal__header">
					<button type="button" class="close origami-modal__close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
					<h4 class="modal-title origami-modal__title">{{ __('Start a project') }}</h4>
				</div>
				<div class="modal-body origami-modal__body">

					<form class="origami-form s_contact__form" action="{{ route('save-contact-us-request') }}" method="get">
						{{ csrf_field() }}

						<div class="origami-form__form-group">
							<label for="contactform__name" class="origami-form__label">{{ __('Name') }} *</label>
							<input class="origami-form__input @if($errors->has('name')) origami-form__input_error @endif" id="contactform-name" type="text"
								   name="name" id="contactform__name" value="{{ old('name') }}" required>
						</div>

						<div class="origami-form__form-group">
							<label for="contactform__email" class="origami-form__label">Email *</label>
							<input class="origami-form__input @if($errors->has('email')) origami-form__input_error @endif" type="email"
								   name="email" id="contactform__email" value="{{ old('email') }}" required>
						</div>

						<div class="origami-form__form-group">
							<label for="contactform__phone" class="origami-form__label">{{ __('Phone number') }}</label>
							<input class="origami-form__input @if($errors->has('phone')) origami-form__input_error @endif" type="text"
								   name="phone" id="contactform__phone" value="{{ old('phone') }}">
						</div>

						<div class="origami-form__form-group">
							<label for="contactform__message" class="origami-form__label">{{ __('Project details') }} *</label>
							<textarea class="origami-form__input @if($errors->has('description')) origami-form__input_error @endif origami-form__input_textarea"
									  name="description" id="contactform__message" rows="4" required>{{ old('description') }}</textarea>
						</div>

						<div class="origami-form__form-group">
							{!! $captcha->display('captcha-contact-us') !!}
							@if($errors->has('g-recaptcha-response'))
								<p class="help-block text-danger">{{ $errors->first('g-recaptcha-response') }}</p>
							@endif
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
			</div>
		</div>
	</div>

@stop