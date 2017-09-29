@extends('layouts.app')

@section('content')
	@php $previous = \Illuminate\Support\Facades\URL::previous(); @endphp

	<main class="error-page">
		<div class="error-page__block">

			@role('owner')
				<strong class="error-page__error-code">{{ __('Error') }} 403</strong>
			@endrole()

			<h1 class="error-page__title">{{ __('error-pages.403_title') }}</h1>

			<p class="error-page__description">{{ __("error-pages.403_description") }}</p>

			<div class="error-page__button-holder">
				@if( $previous !== url('/') && $previous !== \Illuminate\Support\Facades\Request::url())
					<a href="{{ $previous }}" class="btn">{{ __('Go back') }}</a>
				@endif
				@if(!Auth::user())
					<a href="{{ route('login') }}" class="btn">{{ __('Sign In') }}</a>
				@endif
				<a href="/" class="btn">{{ __('Go home') }}</a>
			</div>

		</div>
	</main>
@stop