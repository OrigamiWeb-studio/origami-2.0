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
						<span>{{ __('Contacts') }}</span>
					</li>
				</ul>
			</div>
		</div>
		<section class="s_contacts">
			<div class="container">
				<header>
					<h1>{{ __('Contacts') }}</h1>
				</header>
				<div class="map-wrapper">
					<div id="map" class="map"></div>
					<address>
						<strong>{{ __('Origami Web Studio') }}</strong>
						<span>{{ __('2 Suvorova street, Kamianets-Podilskyi, Ukraine') }}</span>
					</address>
				</div>
				<div class="our-contacts">
					<h2>{{ __('Let\'s do this') }}</h2>
					<ul>
						<li>
							<strong>Skype</strong>
							<a href="#">origamiwebstudio</a>
						</li>
						<li>
							<strong>Email</strong>
							<a href="mailto:info@origami.team">info@origami.team</a>
						</li>
						<li>
							<strong>{{ __('Phone number') }}</strong>
							<span>+380 (96) 724 28 23</span>
						</li>
					</ul>
					<a href="#" class="btn btn-submit" data-toggle="modal" data-target="#contact-modal">{{ __('We will contact you') }}</a>
				</div>
		</section>
	</main>

	<div class="modal fade contact-modal" id="contact-modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
					<h4 class="modal-title">{{ __('Start a project') }}</h4>
				</div>
				<div class="modal-body">
					<form class="origami-form">
						<div class="form-group origami-form__form-group">
							<input class="origami-form__input" type="text" placeholder="{{ __('Name') }}" name="name" id="contact_name">
						</div>
						<div class="form-group origami-form__form-group">
							<input class="origami-form__input" type="email" placeholder="Email" name="email" id="contact_email">
						</div>
						<div class="form-group origami-form__form-group">
							<input class="origami-form__input" type="text" placeholder="{{ __('Phone number') }}" name="number" id="contact_number">
						</div>
						<div class="form-group origami-form__form-group">
							<textarea class="origami-form__input origami-form__input_textarea" name="details" id="contact_details" rows="4" placeholder="{{ __('Project details') }}"></textarea>
						</div>
						<div class="form-group origami-form__form-group">
							<input type="submit" class="btn btn-submit" value="{{ __('Send') }}">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@stop