@extends('layouts.app')

@section('content')
	<main class="error-page">
		<div class="error-page__block">
			@role('owner')
			<strong class="error-page__error-code">{{ __('Error') }} #404</strong>
			@endrole()
			<h1 class="error-page__title">{{ __('error-pages.404_title') }}</h1>
			<p class="error-page__description">{{ __("error-pages.404_description") }}</p>
			<div class="error-page__button-holder">
				@if(\Illuminate\Support\Facades\URL::previous() !== url('/'))
					<a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn">{{ __('Go back') }}</a>
				@endif
				<a href="/" class="btn">{{ __('Go home') }}</a>
			</div>
		</div>
	</main>
@stop