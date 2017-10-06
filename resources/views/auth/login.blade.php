@extends('layouts.app')

@section('content')
	<main class="login-page">
		<section class="s-login">
			<h1 class="s-login__title">{{ __('Sign In') }}</h1>
			<form class="origami-form" role="form" method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}
				<div class="origami-form__form-group">
					<label for="email" class="origami-form__label">E-Mail</label>
					<input name="email" id="email" type="email" class="origami-form__input" value="{{ old('email') }}" required autofocus>
				</div>
				<div class="origami-form__form-group">
					<label for="password" class="origami-form__label">{{ __('Password') }}</label>
					<input name="password" id="password" type="password" class="origami-form__input" required>
				</div>
				<div class="origami-form__form-group">
					<label class="custom_checkbutton">
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
						<span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
						<span>{{ __('Remember me') }}</span>
					</label>
				</div>

				@if ($errors->has('email'))
					<div class="origami-form__form-group" v-for="error in errors">
						<div class="alert alert_danger">
							{{ $errors->first('email') }}
						</div>
					</div>
				@endif

				@if ($errors->has('password'))
					<div class="origami-form__form-group" v-for="error in errors">
						<div class="alert alert_danger">
							{{ $errors->first('email') }}
						</div>
					</div>
				@endif

				<div class="origami-form__form-group">
					<button class="btn" type="submit">{{ __('Sign In') }}</button>
					{{--<a class="btn s-login__forgot-password" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>--}}
				</div>
			</form>
		</section>
	</main>
@endsection

{{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}