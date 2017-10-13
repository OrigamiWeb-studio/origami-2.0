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
						<a href="{{ route('project', ['id' => $project]) }}">{{ $project->translateOrDefault(app()->getLocale())->title }}</a>
					</li>
					<li>
						<span>{{ __('Editing a project') }}</span>
					</li>
				</ul>
			</div>
		</div>

		<section class="s-project-add">
			<div class="container">

				<header>
					<h1>{{ __('Editing a project') }}: {{ $project->translateOrDefault(app()->getLocale())->title }}</h1>
				</header>

				<script>
					window.projectId = {{ $project->id }};
				</script>

				<div class="project-content" id="project-edit">
					<div class="loader" v-if="loading">
						<div class="loader__inner"></div>
					</div>
					<form action="{{ route('project-edit-submit', ['id' => $project->id]) }}" method="post" enctype="multipart/form-data" class="origami-form project-add-form">
						{{ csrf_field() }}
						<div class="row">

							<aside class="col-md-3">
								<div class="block project-content__project-item project-item">
									<figure class="project-item__logo-wrapper">
										@if($project->cover)
											<img v-if="!logoUploaded" class="project-item__logo" src="{{ asset($project->cover) }}"
													 alt="{{ $project->translateOrDefault(app()->getLocale())->title }}">
										@else
											<img v-if="!logoUploaded" class="project-item__logo" src="{{ asset('images/no-logotype.png') }}" alt="No logotype">
										@endif
										<img v-else class="project-item__logo" v-cloak :src="logoUrl" :alt="projectName">
									</figure>
									<div class="project-item__description">
										<span class="project-item__title">{{ empty(old('title')) ? $project->title : old('title') }}</span>
										{{--<span class="project-item__category">#category</span>--}}
									</div>
									<ul class="management-icons">
										<li class="management-icons__item">
											<label for="cover" class="management-icons__icon">
												<input accept="image/jpeg,image/png,image/gif" @change="previewLogo($event)" type="file" id="cover" name="cover">
												<i class="fa fa-upload" aria-hidden="true"></i>
											</label>
										</li>
									</ul>
								</div>
							</aside>

							<div class="col-md-9">
								<div class="block project-content__block project-description">

									<figure class="project-description__figure-block" @if(!$project->main_image) :class="{'project-description__figure-block_error': !mainImageUploaded}" @endif >

										@if($project->main_image)
											<img v-cloak v-if="!mainImageUploaded" class="project-description__main-image" src="{{ asset($project->main_image) }}"
													 alt="{{ $project->translateOrDefault(app()->getLocale())->title }}">
										@else
											<img v-cloak v-if="!mainImageUploaded" class="project-description__main-image" src="{{ asset('images/no-logotype.png') }}" alt="No image">
										@endif
										<img v-else class="project-description__main-image" v-cloak :src="mainImageUrl" :alt="projectName">

										<ul class="management-icons">
											<li class="management-icons__item">
												<label for="main_image" class="management-icons__icon">
													<input @change="previewMainImage($event)" accept="image/jpeg,image/png,image/gif" type="file" id="main_image" name="main_image">
													<i class="fa fa-upload" aria-hidden="true"></i>
												</label>
											</li>
										</ul>

									</figure>

									@if($errors->has('cover'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('cover') }}
											</div>
										</div>
									@endif

									@if($errors->has('main_image'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('main_image') }}
											</div>
										</div>
									@endif

									<div class="project-add-form__group">
										<div class="row">

											<div class="col-sm-6">
												<div class="project-add-form__sub-group">
													<label for="project_name" class="origami-form__label">{{ __('Project name') }}*</label>
													<input type="text" name="title" class="origami-form__input" id="project_name" value="{{ empty(old('title')) ? $project->title : old('title') }}">
												</div>
											</div>

											<div class="col-sm-6">
												<label for="category" class="origami-form__label">{{ __('Category') }}*</label>
												<select name="category" id="category" class="origami-form__select">
													@foreach($categories as $category)
														<option value="{{ $category->id }}" {{ empty(old('category')) ? ($project->category_id === $category->id ? 'selected' : '') : (old('category') == $category->id ? 'selected' : '') }}>
															{{ $category->translateOrDefault(app()->getLocale())->title }}
														</option>
													@endforeach
												</select>
											</div>

										</div>
									</div>

									@if($errors->has('title'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('title') }}
											</div>
										</div>
									@endif

									@if($errors->has('category'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('category') }}
											</div>
										</div>
									@endif

									<div class="project-add-form__group">
										<label for="short_description" class="origami-form__label">{{ __('Short description') }}*</label>
										<origami-textarea rows="5" name="short_description" id="short_description" maxlength="512"
																			oldvalue="{{ empty(old('short_description')) ? $project->short_description : old('short_description') }}">
											<template slot="symbolsLeft">
												{{ __('Symbols left') }}:
											</template>
										</origami-textarea>
									</div>

									@if($errors->has('short_description'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('short_description') }}
											</div>
										</div>
									@endif

									<div class="project-add-form__group">
										<label for="description" class="origami-form__label">{{ __('Description') }}*</label>
										<origami-textarea rows="5" name="description" id="description" maxlength="4096"
																			oldvalue="{{ empty(old('description')) ? $project->description : old('description') }}">
											<template slot="symbolsLeft">
												{{ __('Symbols left') }}:
											</template>
										</origami-textarea>
									</div>

									@if($errors->has('description'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('description') }}
											</div>
										</div>
									@endif

									<div class="project-add-form__group">
										<div class="row">

											<div class="col-sm-6">
												<div class="project-add-form__sub-group">
													<label for="stages" class="origami-form__label">{{ __('Stages of development') }}*</label>
													<select name="stages[]" id="stages" multiple class="origami-form__select" size="4">
														@foreach($stages as $stage)
															<option value="{{ $stage->id }}" {{ empty(old('stages')) ? ($project->stages->contains('id', $stage->id) ? 'selected' : '') : (in_array($stage->id, old('stages')) ? 'selected' : '') }}>
																{{ $stage->translateOrDefault(app()->getLocale())->title }}
															</option>
														@endforeach
													</select>
													<div class="project-add-form__multiple-select-buttons">
														<span @click="selectAll('stages')">{{ __('Select All') }}</span>
														<span @click="deselectAll('stages')">{{ __('Deselect All') }}</span>
													</div>
												</div>
											</div>

											<div class="col-sm-6">
												<label for="stage" class="origami-form__label">{{ __('Current stage') }}*</label>
												<select name="stage" id="stage" class="origami-form__select">
													@foreach($stages as $stage)
														<option value="{{ $stage->id }}" {{ empty(old('stage')) ? ($project->current_stage_id === $stage->id ? 'selected' : '') : (old('stage') == $stage->id ? 'selected' : '') }}>
															{{ $stage->translateOrDefault(app()->getLocale())->title }}
														</option>
													@endforeach
												</select>
											</div>

										</div>
									</div>

									@if($errors->has('stages'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('stages') }}
											</div>
										</div>
									@endif

									@if($errors->has('stage'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('stage') }}
											</div>
										</div>
									@endif

									<div class="project-add-form__group">
										<label class="origami-form__label">{{ __('Images of the project') }}*</label>
										<span class="project-add-form__max-size">{{ __('Max file size') }} - <strong>2Mb</strong></span>
										<div class="project-screens" id="project-screens">
											{{--<project-images></project-images>--}}
											<div class="project-screens__item">
												<label class="project-screens__input-wrapper" :data-files="'Uploaded '+filesUploaded+' files'"
															 :class="{'project-screens__input-wrapper_uploaded': filesUploaded}">
													<input multiple name="slider_images[]" type="file" @change="countFiles($event)" accept="image/jpeg,image/png,image/gif">
												</label>
											</div>
											<div class="project-screens__item" v-for="(screenshot, index) in screenshots">
												<div class="project-screens__image-wrapper">
													<project-screenshot-delete v-cloak
																			   :delete-link="'/projects/{{ $project->id }}/screenshots/'+screenshot.id+'/delete'"
																			   v-on:deletescreen="deleteScreenshot(index)"
																			   v-on:loadon="loading = true"
																			   v-on:loadoff="loading = false">
														<template slot="title">{{ __('Are you sure?') }}</template>
														<template slot="confirm">{{ __('Confirm') }}</template>
														<template slot="cancel">{{ __('Cancel') }}</template>
													</project-screenshot-delete>
													<a class="project-screens__magnific-link" :data-source="this.window.location.origin+'/'+screenshot.link"
														 data-source-text="Source" :href="this.window.location.origin+'/'+screenshot.link">
														<img :src="this.window.location.origin+'/'+screenshot.link">
													</a>
												</div>
											</div>
										</div>
									</div>

									@if($errors->has('slider_images.*'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('slider_images.*') }}
											</div>
										</div>
									@endif

									<div class="project-add-form__group">
										<div class="row">

											<div class="col-sm-6">
												<div class="project-add-form__sub-group">
													<label for="developers" class="origami-form__label">{{ __('Developers') }}*</label>
													<select name="developers[]" id="developers" multiple class="origami-form__select" size="4">
														@foreach($developers as $developer)
															<option value="{{ $developer->id }}" {{ empty(old('developers')) ? ($project->developers->contains('id', $developer->id) ? 'selected' : '') : (in_array($developer->id, old('developers')) ? 'selected' : '') }}>
																{{ $developer->profile->name }}
															</option>
														@endforeach
													</select>
													<div class="project-add-form__multiple-select-buttons">
														<span @click="selectAll('developers')">{{ __('Select All') }}</span>
														<span @click="deselectAll('developers')">{{ __('Deselect All') }}</span>
													</div>
												</div>
											</div>

											<div class="col-sm-6">
												<label for="client" class="origami-form__label">{{ __('Client') }}*</label>
												<select name="client" id="client" class="origami-form__select">
													<option value="0" selected>
														{{ __('Anonymous customer') }}
													</option>
													@foreach($clients as $client)
														<option value="{{ $client->id }}" {{ $project->client_id === $client->id ? 'selected' : '' }}>
															{{ $client->profile->name }}
														</option>
													@endforeach
												</select>
											</div>

										</div>
									</div>

									@if($errors->has('developers'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('developers') }}
											</div>
										</div>
									@endif

									@if($errors->has('client'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('client') }}
											</div>
										</div>
									@endif

									<div class="project-add-form__group">
										<label for="client_review" class="origami-form__label">{{ __("Client's review") }}</label>
										<origami-textarea rows="5" name="client_review" id="client_review" maxlength="512"
																			oldvalue="{{ empty(old('client_review')) ? $project->client_review : old('client_review') }}">
											<template slot="symbolsLeft">
												{{ __('Symbols left') }}:
											</template>
										</origami-textarea>
									</div>

									@if($errors->has('client_review'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('client_review') }}
											</div>
										</div>
									@endif

									<div class="project-add-form__group">
										<div class="row">
											<div class="col-sm-6">
												<div class="project-add-form__sub-group">
													<label for="link" class="origami-form__label">{{ __('Link') }}</label>
													<input type="text" name="link" class="origami-form__input" id="link" value="{{ empty(old('link')) ? $project->link : old('link') }}"
																 placeholder="https://site.com">
												</div>
											</div>
											<div class="col-sm-6">
												<label for="end-date" class="origami-form__label">{{ __('Date of completion') }}*</label>
												<input type="text" class="origami-form__input origami-form__input_datepicker" id="end-date"
															 name="closed_at"
															 value="{{ empty(old('closed_at')) ? $project->closed_at->format('d.m.Y') : old('closed_at') }}">
											</div>
										</div>
									</div>

									@if($errors->has('link'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('link') }}
											</div>
										</div>
									@endif

									@if($errors->has('closed_at'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('closed_at') }}
											</div>
										</div>
									@endif

									<div class="project-add-form__group">
										<label class="custom_checkbutton">
											<input type="checkbox" name="visible" id="visible" {{ old('visible') === 'on' || $project->visible == true ? 'checked' : '' }}>
											<span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
											<span>{{ __('Visible') }}</span>
										</label>
										<label class="custom_checkbutton">
											<input type="checkbox" name="us_choice" {{ old('us_choice') === 'on' || $project->us_choice == true ? 'checked' : '' }}>
											<span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
											<span>{{ __('Add to homepage') }}</span>
										</label>
									</div>

									@if($errors->has('visible'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('visible') }}
											</div>
										</div>
									@endif

									@if($errors->has('us_choice'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('us_choice') }}
											</div>
										</div>
									@endif

									<div class="button-holder">
										<button class="btn" type="submit">{{ __('Edit the project') }}</button>

										@php $previous = \Illuminate\Support\Facades\URL::previous(); @endphp
										@if($previous !== url('/') && $previous !== \Illuminate\Support\Facades\Request::url())
											<a href="{{ $previous }}" class="btn">{{ __('Cancel') }}</a>
										@else
											<a href="{{ route('project', ['id' => $project]) }}" class="btn">{{ __('Cancel') }}</a>
										@endif
									</div>

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>

	</main>

	{{--<form action="{{ route('project-edit-submit', ['id' => $project->id]) }}" method="post" enctype="multipart/form-data">--}}
		{{--{{ csrf_field() }}--}}


		{{--<div class="form-group">--}}
			{{--<label for="title">{{ __('Title') }}</label>--}}

			{{--<input type="text" placeholder="{{ __('Title') }}" name="title" id="title"--}}
			       {{--value="{{ empty(old('title')) ? $project->title : old('title') }}">--}}

			{{--@if($errors->has('title'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('title') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="client">{{ __('Client') }}</label>--}}

			{{--<select name="client" id="client">--}}
				{{--<option value="0">--}}
					{{--{{ __('Anonymous customer') }}--}}
				{{--</option>--}}
				{{--@foreach($clients as $client)--}}
					{{--<option value="{{ $client->id }}" {{ $project->client_id === $client->id ? 'selected' : '' }}>--}}
						{{--{{ $client->profile->name }}--}}
					{{--</option>--}}
				{{--@endforeach--}}
			{{--</select>--}}

			{{--@if($errors->has('client'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('client') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="developers">{{ __('Developers') }}</label>--}}

			{{--<select name="developers[]" id="developers" multiple>--}}
				{{--@foreach($developers as $developer)--}}
					{{--<option value="{{ $developer->id }}" {{ $project->developers->contains('id', $developer->id) ? 'selected' : '' }}>--}}
						{{--{{ $developer->profile->name }}--}}
					{{--</option>--}}
				{{--@endforeach--}}
			{{--</select>--}}

			{{--@if($errors->has('developers'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('developers') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="category">{{ __('Category') }}</label>--}}

			{{--<select name="category" id="category">--}}
				{{--@foreach($categories as $category)--}}
					{{--<option value="{{ $category->id }}" {{ $project->category_id === $category->id ? 'selected' : '' }}>--}}
						{{--{{ $category->translateOrDefault(app()->getLocale())->title }}--}}
					{{--</option>--}}
				{{--@endforeach--}}
			{{--</select>--}}

			{{--@if($errors->has('category'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('category') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="stage">{{ __('Current stage') }}</label>--}}

			{{--<select name="stage" id="stage">--}}
				{{--@foreach($stages as $stage)--}}
					{{--<option value="{{ $stage->id }}" {{ $project->current_stage_id === $stage->id ? 'selected' : '' }}>--}}
						{{--{{ $stage->translateOrDefault(app()->getLocale())->title }}--}}
					{{--</option>--}}
				{{--@endforeach--}}
			{{--</select>--}}

			{{--@if($errors->has('stage'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('stage') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="stages">{{ __('Stages') }}</label>--}}

			{{--<select name="stages[]" id="stages" multiple>--}}
				{{--@foreach($stages as $stage)--}}
					{{--<option value="{{ $stage->id }}" {{ $project->stages->contains('id', $stage->id) ? 'selected' : '' }}>--}}
						{{--{{ $stage->translateOrDefault(app()->getLocale())->title }}--}}
					{{--</option>--}}
				{{--@endforeach--}}
			{{--</select>--}}

			{{--@if($errors->has('stages'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('stages') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="link">{{ __('Link') }}</label>--}}

			{{--<input placeholder="{{ __('Link') }}" name="link" id="link" value="{{ empty(old('link')) ? $project->link : old('link') }}">--}}

			{{--@if($errors->has('link'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('link') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="cover">{{ __('Cover image') }}</label>--}}

			{{--<input type="file" name="cover" id="cover">--}}

			{{--@if($errors->has('cover'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('cover') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="main_image">{{ __('Main image') }}</label>--}}

			{{--<input type="file" name="main_image" id="main_image">--}}

			{{--@if($errors->has('main_image'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('main_image') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="slider_images">{{ __('Slider images (can attach more than one)') }}</label>--}}

			{{--<input type="file" name="slider_images[]" id="slider_images" multiple>--}}

			{{--@if($errors->has('slider_images'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('slider_images') }}</p>--}}
			{{--@endif--}}

			{{--@if($project->screenshots && count($project->screenshots) > 0)--}}
				{{--<style>--}}
					{{--.test-screenshots {--}}
						{{--margin: 50px 0;--}}
					{{--}--}}
					{{--.test-screenshots li{--}}
						{{--position: relative;--}}
						{{--width: 150px;--}}
						{{--display: inline-block;--}}
						{{--margin: 0 0 30px 0--}}
					{{--}--}}
					{{--.test-screenshots li img{--}}
						{{--width: 150px;--}}
					{{--}--}}
					{{--.test-screenshots li a{--}}
						{{--position:absolute;--}}
						{{--bottom: -25px;--}}
						{{--left: 45%;--}}
						{{--color: red;--}}
					{{--}--}}
				{{--</style>--}}
				{{--<ul class="test-screenshots">--}}
					{{--@foreach($project->screenshots->sortBy('order_') as $screenshot)--}}
						{{--<li>--}}
							{{--<img src="{{ asset($screenshot->link) }}" alt="#">--}}
							{{--<a href="{{ route('project-screenshot-delete-submit', ['id' => $screenshot->id]) }}" style="">[ X ]</a>--}}
						{{--</li>--}}
					{{--@endforeach--}}
				{{--</ul>--}}
			{{--@endif--}}

		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="visible">{{ __('Visible') }}</label>--}}

			{{--<input type="checkbox" name="visible" id="visible" {{ old('visible') === 'on' || $project->visible == true ? 'checked' : '' }}>--}}

			{{--@if($errors->has('visible'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('visible') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="us_choice">{{ __('Us choice') }}</label>--}}

			{{--<input type="checkbox" name="us_choice" id="us_choice" {{ old('us_choice') === 'on' || $project->us_choice == true ? 'checked' : '' }}>--}}

			{{--@if($errors->has('us_choice'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('us_choice') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="client_review">{{ __('Client review') }}</label>--}}

			{{--<textarea name="client_review" id="client_review">{{ empty(old('client_review'))--}}
			{{--? $project->client_review : old('client_review') }}</textarea>--}}

			{{--@if($errors->has('client_review'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('client_review') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="description">{{ __('Description') }}</label>--}}

			{{--<textarea name="description" id="description">{{ empty(old('description'))--}}
			{{--? $project->description : old('description') }}</textarea>--}}

			{{--@if($errors->has('description'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('description') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="short_description">{{ __('Short description') }}</label>--}}

			{{--<textarea name="short_description" id="short_description">{{ empty(old('short_description'))--}}
			{{--? $project->short_description : old('short_description') }}</textarea>--}}

			{{--@if($errors->has('short_description'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('short_description') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="closed_at">{{ __('Closed at') }}</label>--}}

			{{--TODO datetime closed_at--}}

			{{--@if($errors->has('closed_at'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('closed_at') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}

		{{--<button type="submit">EDIT</button>--}}

		{{--@if (count($errors) > 0)--}}
			{{--<div class="alert alert-danger">--}}
				{{--<ul>--}}
					{{--@foreach ($errors->all() as $error)--}}
						{{--<li>{{ $error }}</li>--}}
					{{--@endforeach--}}
				{{--</ul>--}}
			{{--</div>--}}
		{{--@endif--}}

	{{--</form>--}}
@stop