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
							<div class="sort_by">
								{{--<span>{{ __('Sort by') }}:</span>--}}
								{{--<select class="orderby" name="orderby" id="orderby">--}}
									{{--<option value="a-z">{{ __('A-Z') }}</option>--}}
									{{--<option value="z-a">{{ __('Z-A') }}</option>--}}
								{{--</select>--}}
								<div v-bind:class="{opened: searchField}" class="search-wrapper">
									<input type="text" name="search" placeholder="{{ __('Search') }}" value="" v-model="filterData.search" required>
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
								{{--<vue-slider></vue-slider>--}}
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

                                <div class="block project-item projects__project-item" v-for="project in projects">
                                    <a v-bind:href="'{{ url('/project') }}/' + project.id ">
                                        <figure class="project-item__logo-wrapper">
                                            <img  class="project-item__logo" v-bind:src='project.cover' v-bind:alt="project.title">
                                        </figure>
                                    </a>
                                    <div class="project-item__description">
                                        <a v-bind:href="'{{ url('/project') }}/' + project.id" class="project-item__title">@{{ project.title }}</a>
                                        <span class="project-item__category">#@{{ project.category_title }}</span>
                                    </div>
                                </div>

							</div>

							<ul v-if="pagination.page_last>1" class="pagination projects_content__pagination">
                                <li class="pagination__item" v-for="(item, index) in pagination.page_last">
                                    <template v-if="pagination.page_current == (index+1)">
                                        <span class="pagination__index pagination__index_active">@{{ index+1 }}</span>
                                    </template>
                                    <template v-else>
                                        <a v-bind:href="'/projects?page='+(index+1)" @click.prevent="paginate((index+1))" class="pagination__index">@{{ index+1 }}</a>
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