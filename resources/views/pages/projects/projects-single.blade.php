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
						<span>{{ $project->title }}</span>
					</li>
				</ul>
			</div>
		</div>

		<section class="s_project">
			<div class="container">

				<header>
					<h1>{{ $project->title }} <span>({{ $project->created_at->year }})</span></h1>
				</header>

				<div class="project-content">
					<div class="row">

						<aside class="col-md-3">

							@isset($project->title)
								<div class="block project-content__project-item project-item hidden-sm hidden-xs">

									@isset($project->cover)
										<figure class="project-item__logo-wrapper">
											<img class="project-item__logo" src="{{ asset($project->cover) }}" alt="{{ $project->title }}">
										</figure>
									@endisset

									<div class="project-item__description">

										<span class="project-item__title">{{ $project->title }}</span>

										@isset($project->category->translateOrDefault(app()->getLocale())->title)
											<span class="project-item__category">#{{ $project->category->translateOrDefault(app()->getLocale())->title }}</span>
										@endisset

									</div>

									<ul class="project-item__management-icons">
										<li class="project-item__management-item">
											<a class="project-item__management-icon" href="#">
												<i class="fa fa-ticket" aria-hidden="true"></i>
											</a>
										</li>
										<li class="project-item__management-item">
											<a class="project-item__management-icon" href="#">
												<i class="fa fa-pencil" aria-hidden="true"></i>
											</a>
										</li>
										<li class="project-item__management-item">
											<a class="project-item__management-icon" href="#">
												<i class="fa fa-trash-o" aria-hidden="true"></i>
											</a>
										</li>
									</ul>

								</div>
							@endisset

							@isset($project->link)
								<a href="{{ $project->link }}" class="btn block block_btn">{{ __('Go to the site') }}</a>
							@endisset

						</aside>

						<div class="col-md-9">

							@if(session('success'))
								<div class="block project-content__block">
									<h3 class="project-content__sub-title">
										Success
									</h3>
									<p class="paragraph">{{ session('success') }}</p>
								</div>
							@endif

							<div class="block project-content__block project-description">

								@isset($project->main_image)
									<figure class="project-description__figure-block">
										<img class="project-description__main-image" src="{{ asset($project->main_image) }}"
										     alt="{{ $project->title }}">
									</figure>
								@endisset

								@if(isset($project->title) && isset($project->short_description))
									<div class="sub-block {{ isset($project->developers) && count($project->developers) > 0 ? 'sub-block_border-bottom' : '' }} ">
										<div class="row">

											<div class="col-sm-7">
												<h3 class="project-content__sub-title">
													{{ __('About project') }} {{ $project->title }}
												</h3>
												<p class="paragraph">
													{{ $project->short_description }}
												</p>
											</div>

											@isset($project->stages)
												<div class="col-sm-4 col-sm-offset-1">
													<h3 class="project-content__sub-title">{{ __('Project components') }}</h3>
													<ul class="tag-list">

														@php $iterator = 1 @endphp
														@foreach($project->stages->sortBy('id') as $stage)
															<li class="tag-list__item">{{ $iterator++ . '. ' . $stage->title }}</li>
														@endforeach

													</ul>
												</div>
											@endisset

										</div>
									</div>
								@endif

								@if(isset($project->developers) && count($project->developers) > 0)
									<div class="developers-team">
										<h3 class="project-content__sub-title">{{ __('Developers team') }}</h3>
										<ul class="developers-team__list">

											@foreach($project->developers as $developer)
												<li class="developers-team__item">
													<img src="{{ $developer->profile->photo }}" alt=""
													     class="developers-team__avatar">
													<div class="developers-team__information">
														<h4 class="developers-team__name">
															{{ $developer->profile->name }}
														</h4>
														@isset($developer->position)
															<span class="developers-team__position">#{{ $developer->position }}</span>
														@endisset
													</div>
												</li>
											@endforeach

										</ul>
									</div>
								@endif

							</div>

							@isset($project->description)
								<div class="block project-content__block">
									{{--<h3 class="project-content__sub-title">--}}
									{{--Some title--}}
									{{--</h3>--}}
									{{--<div class="sub-block sub-block_border-bottom" style="height: 500px">--}}
									{{--{{ $project->description }}--}}
									{{--</div>--}}
									<h3 class="project-content__sub-title">
										{{ __('Description') }}
									</h3>
									<p class="paragraph">{{ $project->description }}</p>
								</div>
							@endisset

							@if(isset($project->screenshots) && count($project->screenshots) > 0)
								<div class="block project-content__block">
									<h3 class="project-content__sub-title">
										Скриншоты
									</h3>
									@foreach($project->screenshots as $screenshot)
										<p class="paragraph">{{ asset($screenshot->link) }}</p>
									@endforeach
								</div>
							@endif

								<div class="block project-content__block">
									<h3 class="project-content__sub-title">
										Results of work
									</h3>
									<div class="sub-block sub-block_border-bottom">
										<div class="results-slider project-content__results-slider">
											<ul id="results-slider" class="results-slider__list list-unstyled cS-hidden">
												@foreach($project->screenshots as $screenshot)
													<li class="results-slider__item">
														<img class="results-slider__image" onerror="this.src='{{ asset('img/image.svg') }}';"  src="{{ $screenshot->link }}" alt="Some title">
													</li>
												@endforeach
											</ul>
										</div>
									</div>
									<h3 class="project-content__sub-title">
										Summation
									</h3>
									<p class="paragraph">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip extereas.
									</p>
								</div>

							@if(count($project->comments) > 0)
								<div class="block project-content__block">

									<h3 class="project-content__sub-title">
										{{ __('Comments') }} <span class="grey-title-text">({{ $project->comments->where('parent_id', '=', null)->count() }})</span>
									</h3>

									<ul class="comments-list">

										@foreach($project->comments->where('parent_id', '=', null) as $comment)
											<li class="comments-list__item">

												<header class="comments-list__header">
													<h4 class="comments-list__name">
														#{{ $comment->user_id === null ? __('Guest') : $comment->user->profile->name }}
														@role('admin')
														<a href="mailto:{{ $comment->email }}" class="grey-title-text">({{ $comment->email }})</a>
														@endrole()
													</h4>
													<span class="comments-list__date">Today, 22:55</span>
												</header>

												<p class="paragraph comments-list__paragraph">{{ $comment->message }}</p>

												<div class="comments-list__managment">
													<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Answer') }}">
													@role('admin')
													<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Edit') }}">
													<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Delete') }}">
													@endrole()
												</div>

											</li>

											@if(isset($comment->answers) && count($comment->answers) > 0)
												@foreach($comment->answers as $answer)

													<li class="comments-list__item comments-list__item_answer">
														<header class="comments-list__header">
															<h4 class="comments-list__name">
																#{{ $answer->user_id === null ? __('Guest') : $answer->user->profile->name }}
																@role('admin')
																<a href="mailto:{{ $answer->email }}" class="grey-title-text">({{ $answer->email }})</a>
																@endrole()
															</h4>
															<span class="comments-list__date">
												Today, 22:57
												</span>
														</header>
														<p class="paragraph comments-list__paragraph">{{ $answer->message }}</p>
														<div class="comments-list__managment">
															@role('admin')
															<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Edit') }}">
															<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Delete') }}">
															@endrole()
														</div>
													</li>

												@endforeach
											@endif

										@endforeach

									</ul>
								</div>
							@endif

						</div>

					</div>
				</div>
			</div>
		</section>

	</main>

@stop