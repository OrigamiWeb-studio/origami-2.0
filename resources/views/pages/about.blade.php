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
						<span>{{ __('About Us') }}</span>
					</li>
				</ul>
			</div>
		</div>

		<section class="s-about">
			<div class="container">

				<header>
					<h1>{{ __('About Us') }}</h1>
				</header>

				<div class="who-we-are s-about__who-we-are">
					<p class="who-we-are__paragraph">
						{{ __("static.about_us_text") }}
					</p>
				</div>

				@if(isset($stages) && count($stages) > 0)
					<div class="about-section development-stages s-about__development-stages">
						<h2 class="about-section__title">{{ __("Stages of development") }}</h2>
						<ul class="development-stages__list">

							@foreach($stages as $stage)
								<li class="development-stages__item">
									<h3 class="development-stages__name">{{ $stage->translateOrDefault(app()->getLocale())->title }}</h3>
									<p class="development-stages__description">{{ $stage->translateOrDefault(app()->getLocale())->description }}</p>
								</li>
							@endforeach

						</ul>
					</div>
				@endif

				@if(isset($projects) && count($projects) > 0)
					<div class="about-section our-clients">
						<h2 class="about-section__title">{{ __('Our clients') }}</h2>

						<ul id="ourclients-slider" class="list-unstyled cS-hidden our-clients__list">
							@foreach($projects as $project)
								@isset($project->cover)
									<li class="our-clients__item">
										<a class="our-clients__link" href="{{ route('project', ['slug' => $project->slug]) }}">
											<img class="our-clients__image" src="{{ asset($project->cover) }}" alt="@isset($project->title) {{ $project->title }} @endisset">
										</a>
									</li>
								@endisset
							@endforeach
						</ul>

					</div>
				@endif

			</div>
		</section>
	</main>

@stop