@extends('layouts.app')

@section('content')

	<main>
		<section class="s_hero">
			<div class="container">
				<div class="site_title">
					<h1>Origami Web-Studio</h1>
					<p>{{ __('High-quality sites development for all devices types.') }}</p>
					<div id="app">
					</div>
				</div>
				<div class="scroll-down">
					<span class="scroll-down__button" v-scroll-to="'.s-projects'">{{ __('Scroll down') }} <i class="fa fa-angle-down scroll-down__arrow" aria-hidden="true"></i></span>
				</div>
			</div>
		</section>

		@if($projects->isNotEmpty())
			<section class="s-projects leaning_section">
				<div class="container">
					<h2 class="section-title">{{ __('Our projects') }}</h2>
					<div class="s-projects__slider">
						<ul id="projects-slider" class="list-unstyled cS-hidden">
							@foreach($projects as $project)
								<li class="s-projects__item">
									<a href="{{ route('project', ['id' => $project->id]) }}" class="s-projects__content">
										<img class="s-projects__image" src="{{ asset($project->cover) }}" alt="{{ $project->title }}">
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					<a href="{{ route('projects') }}">{{ __('All projects') }}</a>
				</div>
			</section>
		@endif

{{--		@include('pages.components.home-client-reviews')--}}

		@include('pages.components.home-contact-us')

	</main>
@stop