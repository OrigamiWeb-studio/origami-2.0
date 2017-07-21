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
						<span>{{ __('Projects') }}</span>
					</li>
				</ul>
			</div>
		</div>
		<section class="s_allprojects">
			<div class="container">
				<header>
					<div class="row">
						<div class="col-md-3 col-sm-4">
							<h1>{{ __('Projects') }}</h1>
						</div>
						<div class="col-md-6 col-sm-8">
							<div class="view_per_page">
								<span>{{ __('View per page') }}:</span>
								<ul class="pagination">
									<li>
										<a href="#">6</a>
									</li>
									<li class="active">
										<span>9</span>
									</li>
									<li>
										<a href="#">12</a>
									</li>
									<li>
										<a href="#">{{ __('All') }}</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-8">
							<div class="sort_by">
								<span>{{ __('Sort by') }}:</span>
								<select class="orderby" name="orderby" id="orderby">
									<option value="a-z">{{ __('A-Z') }}</option>
									<option value="z-a">{{ __('Z-A') }}</option>
								</select>
								<div v-bind:class="{opened: searchField}" class="search-wrapper">
									<input type="text" name="search" placeholder="{{ __('Search') }}" value="" v-model="search" required>
									<button type="submit" @click.prevent="searchField = !searchField" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
								</div>
							</div>
						</div>
					</div>
				</header>
				<div class="projects_content">
					<div class="row">
						<aside class="col-md-3 col-sm-4">
							<div class="block">
								<div class="sub_block">
									<h3>{{ __('Category') }}</h3>
									@foreach($categories as $category)
										<label class="custom_checkbutton">
											<input type="checkbox" name="website_category" v-model="filterData.categories" value="{{ $category->id }}">
											<span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
											<span>{{ $category->translateOrDefault(app()->getLocale())->title }}</span>
										</label>
									@endforeach
								</div>
								<div class="sub_block">
									<h3>{{ __('Year') }}</h3>
									@for($i = \Carbon\Carbon::now()->addYear()->year; $i >= 2016; $i--)
										<label class="custom_checkbutton">
											<input type="checkbox" name="finish_date" v-model="filterData.years" value="{{ $i }}">
											<span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
											<span>{{ $i }}</span>
										</label>
									@endfor
								</div>

								{{--Hide untill it will be works--}}

								{{--<div class="sub_block">--}}
									{{--<h3>{{ __('Price') }}</h3>--}}
									{{--<label class="range_input">--}}
										{{--<input type="range" value="30,80" multiple>--}}
										{{--<span class="pull-left">{{ __('Cheap') }}</span>--}}
										{{--<span class="pull-right">{{ __('Expencive') }}</span>--}}
									{{--</label>--}}
								{{--</div>--}}

								<div class="sub_block">
									<h3>{{ __('Components') }}</h3>
									@foreach($stages as $stage)
										<label class="custom_checkbutton">
											<input type="checkbox" name="components" v-model="filterData.components" value="{{ $stage->id }}">
											<span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
											<span>{{ $stage->translateOrDefault(app()->getLocale())->title }}</span>
										</label>
									@endforeach
								</div>
							</div>
						</aside>
						<div class="col-md-9 col-sm-8">
							<div class="projects">
								<template v-if="filtered">
									<div class="block project-item projects__project-item" v-for="project in filteredProjects">
										<a :href="'{{ url('/project') }}/' + project.id ">
											<figure class="project-item__logo-wrapper">
												<img  class="project-item__logo" :src='project.cover' :alt="project.title">
											</figure>
										</a>
										<div class="project-item__description">
											<a :href="'{{ url('/project') }}/' + project.id" class="project-item__title">@{{ project.title }}</a>
											<span class="project-item__category">#@{{ project.category_title }}</span>
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
								</template>
								<template v-if="!filtered">
									{{--@foreach($projects->sortByDesc('title') as $project)--}}
									@foreach($projects as $project)
										<div class="block project-item projects__project-item">
											<a href="{{ route('project', ['id' => $project->id]) }}">
												<figure class="project-item__logo-wrapper">
													<img class="project-item__logo" src="{{ asset($project->cover) }}" alt="{{ $project->title }}">
												</figure>
											</a>
											<div class="project-item__description">
												<a class="project-item__title" href="{{ route('project', ['id' => $project->id]) }}">{{ $project->translateOrDefault(app()->getLocale())->title }}</a>
												<span class="project-item__category">#{{ $project->category->translateOrDefault(app()->getLocale())->title }}</span>
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
									@endforeach
								</template>
							</div>
							{{--{!! $projects->links() !!}--}}
							<ul class="pagination">
								<li class="active">
									<span>1</span>
								</li>
								<li>
									<a href="#">2</a>
								</li>
								<li>
									<span>...</span>
								</li>
								<li>
									<a href="#">5</a>
								</li>
								<li>
									<a href="#">6</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@stop