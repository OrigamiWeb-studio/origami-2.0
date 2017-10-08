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
						<span>{{ __('New project') }}</span>
					</li>
				</ul>
			</div>
		</div>
		<section class="s-project-add">
			<div class="container">
				<header>
					<h1>{{ __('Add a new project') }}</h1>
				</header>
				<div class="project-content" id="project-add">
					<form action="{{ route('project-add-submit') }}" method="post" enctype="multipart/form-data" class="origami-form project-add-form">
					{{ csrf_field() }}
						<div class="row">
							<aside class="col-md-3">
								<div class="block project-content__project-item project-item">
									<figure class="project-item__logo-wrapper">
										<img v-if="!logoUploaded" class="project-item__logo" src="{{ asset('images/no-logotype.png') }}" alt="No logotype">
										<img v-else class="project-item__logo" v-cloak :src="logoUrl" :alt="projectName">
									</figure>
									<div class="project-item__description" v-cloak>
										<span class="project-item__title" v-if="projectName.length > 1">@{{ projectName }}</span>
										<span class="project-item__title" v-else>{{ __('Project name') }}</span>
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
									<figure class="project-description__figure-block" :class="{'project-description__figure-block_error': !mainImageUploaded}">
										<img v-cloak v-if="!mainImageUploaded" class="project-description__main-image" src="{{ asset('images/no-logotype.png') }}" alt="No image">
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
									<div class="project-add-form__group">
										<div class="row">
											<div class="col-sm-6">
												<div class="project-add-form__sub-group">
													<label for="project_name" class="origami-form__label">{{ __('Project name') }}*</label>
													<input type="text" name="title" v-model="projectName" class="origami-form__input" id="project_name" value="{{ old('title') }}">
												</div>
											</div>
											<div class="col-sm-6">
												<label for="category" class="origami-form__label">{{ __('Category') }}*</label>
												<select name="category" id="category" class="origami-form__select">
													<option value="" class="placeholder">{{ __('Select a category') }}</option>
													@foreach($categories as $category)
														<option value="{{ $category->id }}">
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
										<label for="short_description" class="origami-form__label">{{ __('Summary') }}</label>
										<origami-textarea rows="5" name="short_description" id="short_description" maxlength="140" oldvalue="{{ old('short_description') }}">
											<template slot="symbolsLeft">
												{{ __('symbols left') }}
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
										<origami-textarea rows="5" name="description" id="description" maxlength="280" oldvalue="{{ old('description') }}">
											<template slot="symbolsLeft">
												{{ __('symbols left') }}
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
															<option value="{{ $stage->id }}">
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
												<label for="stage" class="origami-form__label">{{ __('Current stage') }}</label>
												<select name="stage" id="stage" class="origami-form__select">
													@foreach($stages as $stage)
														<option value="{{ $stage->id }}">
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
										<span class="project-add-form__max-size">{{ __('Max size') }} - <strong>5000Kb</strong></span>
										<div class="project-screens">
											{{--<project-images></project-images>--}}
											<div class="project-screens__item">
												<label class="project-screens__input-wrapper" :data-files="'Uploaded '+filesUploaded+' files'" :class="{'project-screens__input-wrapper_uploaded': filesUploaded}">
													<input multiple name="slider_images[]" type="file" @change="countFiles($event)" accept="image/jpeg,image/png,image/gif">
												</label>
											</div>
										</div>
									</div>
									@if($errors->has('slider_images'))
										<div class="project-add-form__group">
											<div class="alert alert_danger">
												{{ $errors->first('slider_images') }}
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
															<option value="{{ $developer->id }}">
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
												<label for="client" class="origami-form__label">{{ __('Client') }}</label>
												<select name="client" id="client" class="origami-form__select">
													<option value="0" selected>
														{{ __('Anonymous customer') }}
													</option>
													@foreach($clients as $client)
														<option value="{{ $client->id }}">
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
										<label for="client_review" class="origami-form__label">{{ __('Client review') }}</label>
										<origami-textarea rows="5" name="client_review" id="client_review" maxlength="280" oldvalue="{{ old('client_review') }}">
											<template slot="symbolsLeft">
												{{ __('symbols left') }}
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
													<input type="text" name="link" class="origami-form__input" id="link" value="{{ old('link') }}">
												</div>
											</div>
											<div class="col-sm-6">
												<label for="end-date" class="origami-form__label">{{ __('Date of completion') }}</label>
												<input type="text" class="origami-form__input origami-form__input_datepicker" id="end-date">
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
									<div class="project-add-form__group">
										<label class="custom_checkbutton">
											<input type="checkbox" name="visible" {{ old('visible') === 'on' ? 'checked' : '' }}>
											<span class="custom_mark"><i class="fa fa-times" aria-hidden="true"></i></span>
											<span>{{ __('Visible') }}</span>
										</label>
										<label class="custom_checkbutton">
											<input type="checkbox" name="us_choice" {{ old('us_choice') === 'on' ? 'checked' : '' }}>
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
										<button class="btn" type="submit">{{ __('Add a project') }}</button>
										<a href="#" class="btn">{{ __('Cancel') }}</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>

	</main>

	{{--<form action="{{ route('project-add-submit') }}" method="post" enctype="multipart/form-data">--}}
		{{--{{ csrf_field() }}--}}


		{{--<div class="form-group">--}}
			{{--<label for="title">{{ __('Title') }}</label>--}}

			{{--<input type="text" placeholder="{{ __('Title') }}" name="title" id="title"--}}
			       {{--value="{{ old('title') }}">--}}

			{{--@if($errors->has('title'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('title') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="client">{{ __('Client') }}</label>--}}

			{{--<select name="client" id="client">--}}
				{{--<option value="0" selected>--}}
					{{--{{ __('Anonymous customer') }}--}}
				{{--</option>--}}
				{{--@foreach($clients as $client)--}}
					{{--<option value="{{ $client->id }}">--}}
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
					{{--<option value="{{ $developer->id }}">--}}
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
					{{--<option value="{{ $category->id }}">--}}
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
					{{--<option value="{{ $stage->id }}">--}}
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
					{{--<option value="{{ $stage->id }}">--}}
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

			{{--<input type="text" placeholder="{{ __('Link') }}" name="link" id="link" value="{{ old('link') }}">--}}

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
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="visible">{{ __('Visible') }}</label>--}}

			{{--<input type="checkbox" name="visible" id="visible" {{ old('visible') === 'on' ? 'checked' : '' }}>--}}

			{{--@if($errors->has('visible'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('visible') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="us_choice">{{ __('Us choice') }}</label>--}}

			{{--<input type="checkbox" name="us_choice" id="us_choice" {{ old('us_choice') === 'on' ? 'checked' : '' }}>--}}

			{{--@if($errors->has('us_choice'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('us_choice') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="client_review">{{ __('Client review') }}</label>--}}

			{{--<textarea name="client_review" id="client_review">{{ old('client_review') }}</textarea>--}}

			{{--@if($errors->has('client_review'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('client_review') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="description">{{ __('Description') }}</label>--}}

			{{--<textarea name="description" id="description">{{ old('description') }}</textarea>--}}

			{{--@if($errors->has('description'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('description') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}


		{{--<div class="form-group">--}}
			{{--<label for="short_description">{{ __('Short description') }}</label>--}}

			{{--<textarea name="short_description" id="short_description">{{ old('short_description') }}</textarea>--}}

			{{--@if($errors->has('short_description'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('short_description') }}</p>--}}
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