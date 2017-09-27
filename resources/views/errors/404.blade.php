@extends('layouts.app')

@section('content')
	<main class="error-page">
		<div class="error-page__block">
			<strong class="error-page__error-code">{{ __('Error') }} 404</strong>
			<h1 class="error-page__title">{{ __('Page is not found!') }}</h1>
			<p class="error-page__description">{{ __("The page doesn't exist. Probably the link that you've used was incorrect") }}</p>
			<div class="error-page__button-holder">
				<a href="#" class="btn">{{ __('Go back') }}</a>
				<a href="#" class="btn">{{ __('Go home') }}</a>
			</div>
		</div>
	</main>
@stop