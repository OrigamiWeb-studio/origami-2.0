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
		<section class="s-allprojects">
			<div class="container">
				<header>
					<div class="row">
						<div class="col-md-3 col-sm-4">
							<h1>{{ __('Projects') }}</h1>
						</div>
						<div class="col-md-6 col-sm-8">
							<div class="view-per-page">
								<span>{{ __('View per page') }}:</span>
								<ul class="pagination view-per-page__pagination">
									<li class="pagination__item">
										<template v-if="pagination.per_page == 6">
											<span class="pagination__index pagination__index_active">6</span>
										</template>
										<template v-else>
											<a class="pagination__index" @click.prevent="filterData.paginate = 6" href="project?per_page=6">6</a>
										</template>
									</li>
									<li class="pagination__item">
										<template v-if="pagination.per_page == 9">
											<span class="pagination__index pagination__index_active">9</span>
										</template>
										<template v-else>
											<a class="pagination__index" @click.prevent="filterData.paginate = 9" href="project?per_page=9">9</a>
										</template>
									</li>
									<li class="pagination__item">
										<template v-if="pagination.per_page == 12">
											<span class="pagination__index pagination__index_active">12</span>
										</template>
										<template v-else>
											<a class="pagination__index" @click.prevent="filterData.paginate = 12" href="project?per_page=12">12</a>
										</template>
									</li>
									<li class="pagination__item">
										<template v-if="pagination.per_page == 100">
											<span class="pagination__index pagination__index_active">{{ __('All') }}</span>
										</template>
										<template v-else>
											<a class="pagination__index" @click.prevent="filterData.paginate = ''" href="project?per_page=All">{{ __('All') }}</a>
										</template>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-sm-8">
							<div class="sort-by">
								{{--<span>{{ __('Sort by') }}:</span>--}}
								{{--<select class="orderby" name="orderby" id="orderby">--}}
								{{--<option value="a-z">{{ __('A-Z') }}</option>--}}
								{{--<option value="z-a">{{ __('Z-A') }}</option>--}}
								{{--</select>--}}
								<div :class="{opened: searchField}" class="search-wrapper">
									<input type="text" name="search" placeholder="{{ __('Search') }}" value="" v-model="searchText" required>
									<button type="submit" @click.prevent="searchField = !searchField" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
								</div>
								@role('owner')
								<a href="{{ route('project-add') }}" class="btn sort-by__add-project">{{ __('Add a project') }}</a>
								@endrole()
							</div>
						</div>
					</div>
				</header>
				<div class="projects_content">
					<div class="row">
						<aside class="col-md-3 col-sm-4">
							<button class="btn s-allprojects__filter-button" @click.prevent="mobileFilters = !mobileFilters">Filters</button>
							<div class="block s-allprojects__filters" style="display: none" v-show="mobileFilters">
								<div class="s-allprojects__filters-content">
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
									{{--<vue-slider></vue-slider>--}}
									{{--<div class="sub_block">--}}
									{{--<h3>{{ __('Price') }}</h3>--}}
									{{--<label class="range_input">--}}
									{{--<input type="range" value="30,80" multiple>--}}
									{{--<span class="pull-left">{{ __('Cheap') }}</span>--}}
									{{--<span class="pull-right">{{ __('Expensive') }}</span>--}}
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
								<div class="mobile-filters-buttons">
									<button class="btn" @click.prevent="mobileFilters = false">{{ __('Confirm') }} (@{{ projects.length }})</button>
									<button class="btn" @click.prevent="clearFilters()">{{ __('Clear') }}</button>
								</div>
							</div>
						</aside>
						<div class="col-md-9 col-sm-8">

							<div class="loader" v-if="loading">
								<div class="loader__inner"></div>
							</div>

							<div class="projects" v-cloak>
								<span class="projects__not-found v-cloak--hidden" v-if="notFound">{{ __('There is no results for your request') }}</span>
								<div class="v-cloak--hidden block project-item projects__project-item" v-for="project in projects" :class="{'projects__project-item_invisible': !project.visible}">
									<div class="project-item__content">
										<a class="project-item__logo-wrapper" :href="'{{ url('/projects') }}/' + project.id ">
											<img class="project-item__logo" :src='project.cover' :alt="project.title">
										</a>
										<div class="project-item__description">
											<a :href="'{{ url('/projects') }}/' + project.id" class="project-item__title">@{{ project.title }}</a>
											<span class="project-item__category">#@{{ project.category_title }}</span>
										</div>
									</div>
									@role('owner')
										<manage-project v-cloak
														:tickets-link="this.window.location.origin+'/projects/'+project.id+'/tickets'"
														:edit-link="this.window.location.origin+'/projects/'+project.id+'/edit'"
														:delete-link="this.window.location.origin+'/projects/'+project.id+'/delete'">
											<template slot="title">{{ __('Are you sure?') }}</template>
											{{ __('Project') }} "@{{ project.title }}" {{ __('will be deleted. Are you sure that you want to delete it at all?') }}
											<template slot="token">{{ csrf_field() }}</template>
											<template slot="confirm">{{ __('Confirm') }}</template>
											<template slot="cancel">{{ __('Cancel') }}</template>
										</manage-project>
									@endrole()
								</div>
							</div>

							<ul v-if="pagination.page_last>1" class="pagination projects_content__pagination">
								<li class="pagination__item" v-for="(item, index) in pagination.page_last">
									<template v-if="pagination.page_current == (index+1)">
										<span class="pagination__index pagination__index_active">@{{ index+1 }}</span>
									</template>
									<template v-else>
										<a :href="'/projects?page='+(index+1)" @click.prevent="paginate((index+1))" class="pagination__index">@{{ index+1 }}</a>
									</template>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@stop