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
					<div class="row">
						<aside class="col-md-3">
							<div class="block project-content__project-item project-item hidden-sm hidden-xs">

								<figure class="project-item__logo-wrapper">
									<img class="project-item__logo" src="" onerror="this.src='/images/dick.png'; this.className+='project-item__logo_error'; this.alt='error'" alt="">
								</figure>

								<div class="project-item__description">

									<span class="project-item__title">@{{ test }}</span>

									<span class="project-item__category">#categorys</span>

								</div>

								<ul class="project-item__management-icons">
									<li class="project-item__management-item">
										<form action="">
											{{ csrf_field() }}
											<button class="project-item__management-icon">
												<i class="fa fa-upload" aria-hidden="true"></i>
											</button>
										</form>
									</li>
								</ul>

							</div>
						</aside>
					</div>
				</div>
			</div>
		</section>

	</main>

	<form action="{{ route('project-add-submit') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}


		<div class="form-group">
			<label for="title">{{ __('Title') }}</label>

			<input type="text" placeholder="{{ __('Title') }}" name="title" id="title"
			       value="{{ old('title') }}">

			@if($errors->has('title'))
				<p class="help-block text-danger">{{ $errors->first('title') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="client">{{ __('Client') }}</label>

			<select name="client" id="client">
				<option value="0" selected>
					{{ __('Anonymous customer') }}
				</option>
				@foreach($clients as $client)
					<option value="{{ $client->id }}">
						{{ $client->profile->name }}
					</option>
				@endforeach
			</select>

			@if($errors->has('client'))
				<p class="help-block text-danger">{{ $errors->first('client') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="developers">{{ __('Developers') }}</label>

			<select name="developers[]" id="developers" multiple>
				@foreach($developers as $developer)
					<option value="{{ $developer->id }}">
						{{ $developer->profile->name }}
					</option>
				@endforeach
			</select>

			@if($errors->has('developers'))
				<p class="help-block text-danger">{{ $errors->first('developers') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="category">{{ __('Category') }}</label>

			<select name="category" id="category">
				@foreach($categories as $category)
					<option value="{{ $category->id }}">
						{{ $category->translateOrDefault(app()->getLocale())->title }}
					</option>
				@endforeach
			</select>

			@if($errors->has('category'))
				<p class="help-block text-danger">{{ $errors->first('category') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="stage">{{ __('Current stage') }}</label>

			<select name="stage" id="stage">
				@foreach($stages as $stage)
					<option value="{{ $stage->id }}">
						{{ $stage->translateOrDefault(app()->getLocale())->title }}
					</option>
				@endforeach
			</select>

			@if($errors->has('stage'))
				<p class="help-block text-danger">{{ $errors->first('stage') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="stages">{{ __('Stages') }}</label>

			<select name="stages[]" id="stages" multiple>
				@foreach($stages as $stage)
					<option value="{{ $stage->id }}">
						{{ $stage->translateOrDefault(app()->getLocale())->title }}
					</option>
				@endforeach
			</select>

			@if($errors->has('stages'))
				<p class="help-block text-danger">{{ $errors->first('stages') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="link">{{ __('Link') }}</label>

			<input type="text" placeholder="{{ __('Link') }}" name="link" id="link" value="{{ old('link') }}">

			@if($errors->has('link'))
				<p class="help-block text-danger">{{ $errors->first('link') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="cover">{{ __('Cover image') }}</label>

			<input type="file" name="cover" id="cover">

			@if($errors->has('cover'))
				<p class="help-block text-danger">{{ $errors->first('cover') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="main_image">{{ __('Main image') }}</label>

			<input type="file" name="main_image" id="main_image">

			@if($errors->has('main_image'))
				<p class="help-block text-danger">{{ $errors->first('main_image') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="slider_images">{{ __('Slider images (can attach more than one)') }}</label>

			<input type="file" name="slider_images[]" id="slider_images" multiple>

			@if($errors->has('slider_images'))
				<p class="help-block text-danger">{{ $errors->first('slider_images') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="visible">{{ __('Visible') }}</label>

			<input type="checkbox" name="visible" id="visible" {{ old('visible') === 'on' ? 'checked' : '' }}>

			@if($errors->has('visible'))
				<p class="help-block text-danger">{{ $errors->first('visible') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="us_choice">{{ __('Us choice') }}</label>

			<input type="checkbox" name="us_choice" id="us_choice" {{ old('us_choice') === 'on' ? 'checked' : '' }}>

			@if($errors->has('us_choice'))
				<p class="help-block text-danger">{{ $errors->first('us_choice') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="client_review">{{ __('Client review') }}</label>

			<textarea name="client_review" id="client_review">{{ old('client_review') }}</textarea>

			@if($errors->has('client_review'))
				<p class="help-block text-danger">{{ $errors->first('client_review') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="description">{{ __('Description') }}</label>

			<textarea name="description" id="description">{{ old('description') }}</textarea>

			@if($errors->has('description'))
				<p class="help-block text-danger">{{ $errors->first('description') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="short_description">{{ __('Short description') }}</label>

			<textarea name="short_description" id="short_description">{{ old('short_description') }}</textarea>

			@if($errors->has('short_description'))
				<p class="help-block text-danger">{{ $errors->first('short_description') }}</p>
			@endif
		</div>

		<button type="submit">EDIT</button>

		{{--@if (count($errors) > 0)--}}
			{{--<div class="alert alert-danger">--}}
				{{--<ul>--}}
					{{--@foreach ($errors->all() as $error)--}}
						{{--<li>{{ $error }}</li>--}}
					{{--@endforeach--}}
				{{--</ul>--}}
			{{--</div>--}}
		{{--@endif--}}

	</form>
@stop