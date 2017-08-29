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
		<section class="s_about">
			<div class="container">
				<header>
					<h1>{{ __('About Us') }}</h1>
				</header>
				<div class="who-we-are-wrapper">

					<h2>{{ __('Who we are?') }}</h2>

					<div class="who-we-are-text">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum voluptatibus, recusandae eius molestias. Accusamus iste nesciunt,
							libero! Inventore alias delectus, tempora doloribus, ab cum saepe. Rerum modi sapiente asperiores optio.Lorem ipsum dolor sit amet,
							consectetur adipisicing elit. Laborum voluptatibus, recusandae eius molestias. Accusamus iste nesciunt, libero! Inventore alias
							delectus, tempora doloribus, ab cum saepe. Rerum modi sapiente asperiores optio.Lorem ipsum dolor sit amet, consectetur adipisicing
							elit. Laborum voluptatibus, recusandae eius molestias. Accusamus iste nesciunt, libero! Inventore alias delectus, tempora doloribus, ab
							cum saepe. Rerum modi sapiente asperiores optio.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum voluptatibus, recusandae eius molestias. Accusamus iste nesciunt,
							libero! Inventore alias delectus, tempora doloribus, ab cum saepe. Rerum modi sapiente asperiores optio.Lorem ipsum dolor sit amet,
							consectetur adipisicing elit. Laborum voluptatibus, recusandae eius molestias. Accusamus iste nesciunt, libero! Inventore alias
							delectus, tempora doloribus, ab cum saepe. Rerum modi sapiente asperiores optio.Lorem ipsum dolor sit amet, consectetur adipisicing
							elit. Laborum voluptatibus, recusandae eius molestias. Accusamus iste nesciunt, libero! Inventore alias delectus, tempora doloribus, ab
							cum saepe. Rerum modi sapiente asperiores optio.</p>
					</div>
				</div>

				{{--<div class="development-stages">--}}
					{{--<h2 class="development-stages__title">Stages of Development</h2>--}}
					{{--<ul class="development-stages__list">--}}
						{{--<li class="development-stages__item">--}}
							{{----}}
						{{--</li>--}}
					{{--</ul>--}}
				{{--</div>--}}

				<div class="our-clients">
					<h3 class="our-clients__title">{{ __('Our clients') }}</h3>
					<ul id="ourclients-slider" class="list-unstyled cS-hidden our-clients__list">
						@foreach($projects as $project)
							@isset($project->cover)
								<li class="our-clients__item">
									<a class="our-clients__link" href="{{ action('ProjectsController@singleProject', ['id' => $project->id]) }}">
										<img class="our-clients__image" src="{{ asset($project->cover) }}" alt="@isset($project->title) {{ $project->title }} @endisset">
									</a>
								</li>
							@endisset
						@endforeach
					</ul>
				</div>

			</div>
		</section>
	</main>

@stop