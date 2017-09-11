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
					<p class="who-we-are__paragraph">Origami Web-Studio — професійна команда перфекціоністів, яка спеціалізується на розробці веб-сайтів будь-якої складності. Головний принцип нашої роботи — індивідуальний підхід та якісна розробка на основі найсучасніших технологій. Ми проводимо безкоштовні консультації стосовно проекту, пропонуємо варіанти індивідально під потреби замовника. Весь процес розробки наших веб-сайтів складається з 7-ти кроків: аналіз розробки, прототипування, розробка дизайну, розробка шаблону, розробка функціональності, SEO та підтримка веб-сайту.</p>
				</div>

				<div class="about-section development-stages s-about__development-stages">
					<h2 class="about-section__title">Stages of Development</h2>
					<ul class="development-stages__list">
						<li class="development-stages__item">
							<h3 class="development-stages__name">Аналіз бізнесу</h3>
							<p class="development-stages__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						</li>
						<li class="development-stages__item">
							<h3 class="development-stages__name">Прототипування</h3>
							<p class="development-stages__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						</li>
						<li class="development-stages__item">
							<h3 class="development-stages__name">Розробка дизайну</h3>
							<p class="development-stages__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						</li>
						<li class="development-stages__item">
							<h3 class="development-stages__name">Розробка шаблону</h3>
							<p class="development-stages__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						</li>
						<li class="development-stages__item">
							<h3 class="development-stages__name">Розробка функціональності</h3>
							<p class="development-stages__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						</li>
						<li class="development-stages__item">
							<h3 class="development-stages__name">SEO</h3>
							<p class="development-stages__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						</li>
						<li class="development-stages__item">
							<h3 class="development-stages__name">Пітримка веб-сайту</h3>
							<p class="development-stages__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
						</li>
					</ul>
				</div>

				<div class="about-section our-clients">
					<h2 class="about-section__title">{{ __('Our clients') }}</h2>
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