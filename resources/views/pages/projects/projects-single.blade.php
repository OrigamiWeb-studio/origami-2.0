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
						<a href="{{ route('projects') }}">{{ __('Projects') }}</a>
					</li>
					<li>
						<span>{{ $project->translateOrDefault(app()->getLocale())->title }}</span>
					</li>
				</ul>
			</div>
		</div>

		<section class="s_project">
			<div class="container">

				<header>
					<h1>{{ $project->translateOrDefault(app()->getLocale())->title }} <span>({{ $project->created_at->year }})</span></h1>
				</header>

				<div class="project-content">
					<div class="row">

						<aside class="col-md-3">

							@isset($project->translateOrDefault(app()->getLocale())->title)
								<div class="block project-content__project-item project-item hidden-sm hidden-xs">

									@isset($project->cover)
										<figure class="project-item__logo-wrapper">
											<img class="project-item__logo" src="{{ asset($project->cover) }}" alt="{{ $project->translateOrDefault(app()->getLocale())->title }}">
										</figure>
									@endisset

									<div class="project-item__description">

										<span class="project-item__title">{{ $project->translateOrDefault(app()->getLocale())->title }}</span>

										@isset($project->category->translateOrDefault(app()->getLocale())->title)
											<span class="project-item__category">#{{ $project->category->translateOrDefault(app()->getLocale())->title }}</span>
										@endisset

									</div>

									<ul class="project-item__management-icons">
										@role('owner')
											<li class="project-item__management-item">
												<a class="project-item__management-icon" href="{{ route('project-tickets', ['project_id' => $project->id]) }}">
													<i class="fa fa-ticket" aria-hidden="true"></i>
												</a>
											</li>
											<li class="project-item__management-item">
												<a class="project-item__management-icon" href="{{ route('project-edit', ['id' => $project->id]) }}">
													<i class="fa fa-pencil" aria-hidden="true"></i>
												</a>
											</li>
											<li class="project-item__management-item">
												<form action="{{ route('project-delete-submit', ['id' => $project->id]) }}">
													{{ csrf_field() }}
													<button class="project-item__management-icon">
														<i class="fa fa-trash-o" aria-hidden="true"></i>
													</button>
												</form>
											</li>
										@endrole()
									</ul>

								</div>
							@endisset

							@isset($project->link)
								<a href="{{ $project->link }}" class="btn block block_btn project-content__project-item">{{ __('Go to the site') }}</a>
							@endisset

						</aside>

						<div class="col-md-9">

							{{--@if(session('success'))--}}
							{{--<div class="block project-content__block">--}}
							{{--<h3 class="project-content__sub-title">--}}
							{{--Success--}}
							{{--</h3>--}}
							{{--<p class="paragraph">{{ session('success') }}</p>--}}
							{{--</div>--}}
							{{--@endif--}}

							<div class="block project-content__block project-description">

								@isset($project->main_image)
									<figure class="project-description__figure-block">
										<img class="project-description__main-image" src="{{ asset($project->main_image) }}"
										     alt="{{ $project->translateOrDefault(app()->getLocale())->title }}">
									</figure>
								@endisset

								@if(isset($project->title) && isset($project->short_description))
									<div class="sub-block {{--{{ isset($project->developers) && count($project->developers) > 0 ? 'sub-block_border-bottom' : '' }} --}}">
										<div class="row">

											<div class="col-sm-7">
												<h3 class="project-content__sub-title">
													{{ __('About project') }} {{ $project->translateOrDefault(app()->getLocale())->title }}
												</h3>
												<p class="paragraph">
													{{ $project->translateOrDefault(app()->getLocale())->short_description }}
												</p>
											</div>

											@isset($project->stages)
												<div class="col-sm-4 col-sm-offset-1">
													<h3 class="project-content__sub-title">{{ __('Stages of development') }}</h3>
													<ul class="tag-list">

														@php $iterator = 1; @endphp
														@foreach($project->stages->sortBy('order') as $stage)
															<li class="tag-list__item">
																<span title="{{ $stage->translateOrDefault(app()->getLocale())->description }}">
																	{{ $iterator++ . '. ' . $stage->translateOrDefault(app()->getLocale())->title }}</span>
															</li>
														@endforeach

													</ul>
												</div>
											@endisset

										</div>
									</div>
								@endif

{{--								@include('pages.projects.components.project-developers')--}}

							</div>

							@if(isset($project->description) || (isset($project->screenshots) && count($project->screenshots) > 0))
								<div class="block project-content__block">

									@if(isset($project->screenshots) && count($project->screenshots) > 0)
										<h3 class="project-content__sub-title">
											{{ __('Results of work') }}
										</h3>

										<div class="sub-block {{ isset($project->description) ? 'sub-block_border-bottom' : '' }}">
											<div class="results-slider project-content__results-slider">
												<ul id="results-slider" class="results-slider__list list-unstyled cS-hidden">
													@foreach($project->screenshots->sortBy('order_') as $screenshot)
														<li class="results-slider__item">
															<a href="{{ asset($screenshot->link) }}">
																<img class="results-slider__image"
																	 src="{{ asset($screenshot->link) }}"
																	 onerror="this.src='{{ asset('/images/image.svg') }}';"
																	 alt="{{ isset($project->title) ? $project->title : __('Project') }} {{ __('screenshots') }}">
															</a>
														</li>
													@endforeach
												</ul>
											</div>
										</div>
									@endif

									@isset($project->description)
										<h3 class="project-content__sub-title">
											{{ __('Summation') }}
										</h3>

										<p class="paragraph">{{ $project->translateOrDefault(app()->getLocale())->description }}</p>
									@endisset

								</div>
							@endif

{{--							@include('pages.projects.components.project-comments')--}}

						</div>

					</div>
				</div>
			</div>
		</section>

	</main>

@stop