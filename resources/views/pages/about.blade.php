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
						<a href="{{ route('about') }}">{{ __('About Us') }}</a>
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

				<div class="among-our-clients">
					<h3>{{ __('Among our clients') }}</h3>
					<ul>
						@foreach($projects as $project)
							@isset($project->cover)
								<li>
									<a href="{{ action('ProjectsController@singleProject', ['id' => $project->id]) }}">
										<img src="{{ asset($project->cover) }}" alt="@isset($project->title) {{ $project->title }} @endisset">
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