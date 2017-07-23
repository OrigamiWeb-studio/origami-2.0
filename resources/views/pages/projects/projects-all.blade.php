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
										<template v-if="pagination.per_page == 1">
											<span class="pagination__index pagination__index_active">1</span>
										</template>
										<template v-else>
											<a class="pagination__index" @click.prevent="filterData.paginate = 1" href="project?per_page=1">1</a>
										</template>
									</li>
									<li class="pagination__item">
										<template v-if="pagination.per_page == 2">
											<span class="pagination__index pagination__index_active">2</span>
										</template>
										<template v-else>
											<a class="pagination__index" @click.prevent="filterData.paginate = 2" href="project?per_page=2">2</a>
										</template>
									</li>
									<li class="pagination__item">
										<template v-if="pagination.per_page == 3">
											<span class="pagination__index pagination__index_active">3</span>
										</template>
										<template v-else>
											<a class="pagination__index" @click.prevent="filterData.paginate = 3" href="project?per_page=3">3</a>
										</template>
									</li>
									<li class="pagination__item">
										<template v-if="pagination.per_page == 100">
											<span class="pagination__index pagination__index_active">All</span>
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
								<div :class="{opened: searchField}" class="search-wrapper">
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

                            {{--<transition-group name="project" tag="div" class="projects">--}}
							<div class="projects">

                                <div class="block project-item projects__project-item" v-for="project in projects" v-bind:key="project">
                                    <a :href="'{{ url('/project') }}/' + project.id ">
                                        <figure class="project-item__logo-wrapper">
                                            <img  class="project-item__logo" :src='project.cover' :alt="project.title">
                                        </figure>
                                    </a>
                                    <div class="project-item__description">
                                        <a :href="'{{ url('/project') }}/' + project.id" class="project-item__title">@{{ project.title }}</a>
                                        <span class="project-item__category">#@{{ project.category_title }}</span>
                                    </div>
                                </div>

							</div>
                            {{--</transition-group>--}}

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




{{--<div class="projects">--}}
    {{--<div class="block project-item projects__project-item" v-for="project in projects">--}}
        {{--<a :href="'{{ url('/project') }}/' + project.id ">--}}
            {{--<figure class="project-item__logo-wrapper">--}}
                {{--<img  class="project-item__logo" :src='project.cover' :alt="project.title">--}}
            {{--</figure>--}}
        {{--</a>--}}
        {{--<div class="project-item__description">--}}
            {{--<a :href="'{{ url('/project') }}/' + project.id" class="project-item__title">@{{ project.title }}</a>--}}
            {{--<span class="project-item__category">#@{{ project.category_title }}</span>--}}
        {{--</div>--}}
        {{--<ul class="project-item__management-icons">--}}
            {{--<li class="project-item__management-item">--}}
                {{--<a class="project-item__management-icon" href="#">--}}
                    {{--<i class="fa fa-ticket" aria-hidden="true"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="project-item__management-item">--}}
                {{--<a class="project-item__management-icon" href="#">--}}
                    {{--<i class="fa fa-pencil" aria-hidden="true"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="project-item__management-item">--}}
                {{--<a class="project-item__management-icon" href="#">--}}
                    {{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
    {{--@foreach($projects->sortByDesc('title') as $project)--}}
    {{--@foreach($projects as $project)--}}
    {{--<div class="block project-item projects__project-item">--}}
    {{--<a href="{{ route('project', ['id' => $project->id]) }}">--}}
    {{--<figure class="project-item__logo-wrapper">--}}
    {{--<img class="project-item__logo" src="{{ asset($project->cover) }}" alt="{{ $project->title }}">--}}
    {{--</figure>--}}
    {{--</a>--}}
    {{--<div class="project-item__description">--}}
    {{--<a class="project-item__title" href="{{ route('project', ['id' => $project->id]) }}">{{ $project->translateOrDefault(app()->getLocale())->title }}</a>--}}
    {{--<span class="project-item__category">#{{ $project->category->translateOrDefault(app()->getLocale())->title }}</span>--}}
    {{--</div>--}}
    {{--<ul class="project-item__management-icons">--}}
    {{--<li class="project-item__management-item">--}}
    {{--<a class="project-item__management-icon" href="#">--}}
    {{--<i class="fa fa-ticket" aria-hidden="true"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--@role('admin')--}}
    {{--<li class="project-item__management-item">--}}
    {{--<a class="project-item__management-icon" href="#">--}}
    {{--<i class="fa fa-pencil" aria-hidden="true"></i>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li class="project-item__management-item">--}}
    {{--<form action="">--}}
    {{--{{ csrf_field() }}--}}
    {{--<button class="project-item__management-icon">--}}
    {{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}
    {{--</button>--}}
    {{--</form>--}}
    {{--</li>--}}
    {{--@endrole()--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--@endforeach--}}
{{--</div>--}}