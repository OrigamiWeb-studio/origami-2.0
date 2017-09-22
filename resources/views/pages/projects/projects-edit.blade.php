@extends('layouts.app')

@section('content')

	<form action="{{ route('project-edit-submit', ['id' => $project->id]) }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}


		<div class="form-group">
			<label for="title">{{ __('Title') }}</label>

			<input type="text" placeholder="{{ __('Title') }}" name="title" id="title"
			       value="{{ empty(old('title')) ? $project->title : old('title') }}">

			@if($errors->has('title'))
				<p class="help-block text-danger">{{ $errors->first('title') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="client">{{ __('Client') }}</label>

			<select name="client" id="client">
				<option value="0">
					{{ __('Anonymous customer') }}
				</option>
				@foreach($clients as $client)
					<option value="{{ $client->id }}" {{ $project->client_id === $client->id ? 'selected' : '' }}>
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
					<option value="{{ $developer->id }}" {{ $project->developers->contains('id', $developer->id) ? 'selected' : '' }}>
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
					<option value="{{ $category->id }}" {{ $project->category_id === $category->id ? 'selected' : '' }}>
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
					<option value="{{ $stage->id }}" {{ $project->current_stage_id === $stage->id ? 'selected' : '' }}>
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
					<option value="{{ $stage->id }}" {{ $project->stages->contains('id', $stage->id) ? 'selected' : '' }}>
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

			<input placeholder="{{ __('Link') }}" name="link" id="link" value="{{ empty(old('link')) ? $project->link : old('link') }}">

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

			@if($project->screenshots && count($project->screenshots) > 0)
				<ul style="margin: 50px 0;">
					@foreach($project->screenshots as $screenshot)
						<li style="position: relative; width: 150px; display: inline-block; margin: 0 0 30px 0">
							<img src="{{ asset($screenshot->link) }}" alt="#" style="width: 150px;">
							<a href="{{ route('project-screenshot-delete-submit', ['id' => $screenshot->id]) }}" style="position:absolute; bottom: -25px; left: 45%; color: red">[ X ]</a>
						</li>
					@endforeach
				</ul>
			@endif
			
		</div>


		<div class="form-group">
			<label for="visible">{{ __('Visible') }}</label>

			<input type="checkbox" name="visible" id="visible" {{ old('visible') === 'on' || $project->visible == true ? 'checked' : '' }}>

			@if($errors->has('visible'))
				<p class="help-block text-danger">{{ $errors->first('visible') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="us_choice">{{ __('Us choice') }}</label>

			<input type="checkbox" name="us_choice" id="us_choice" {{ old('us_choice') === 'on' || $project->us_choice == true ? 'checked' : '' }}>

			@if($errors->has('us_choice'))
				<p class="help-block text-danger">{{ $errors->first('us_choice') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="client_review">{{ __('Client review') }}</label>

			<textarea name="client_review" id="client_review">{{ empty(old('client_review'))
			? $project->client_review : old('client_review') }}</textarea>

			@if($errors->has('client_review'))
				<p class="help-block text-danger">{{ $errors->first('client_review') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="description">{{ __('Description') }}</label>

			<textarea name="description" id="description">{{ empty(old('description'))
			? $project->description : old('description') }}</textarea>

			@if($errors->has('description'))
				<p class="help-block text-danger">{{ $errors->first('description') }}</p>
			@endif
		</div>


		<div class="form-group">
			<label for="short_description">{{ __('Short description') }}</label>

			<textarea name="short_description" id="short_description">{{ empty(old('short_description'))
			? $project->short_description : old('short_description') }}</textarea>

			@if($errors->has('short_description'))
				<p class="help-block text-danger">{{ $errors->first('short_description') }}</p>
			@endif
		</div>


		{{--<div class="form-group">--}}
			{{--<label for="closed_at">{{ __('Closed at') }}</label>--}}

			{{--TODO datetime closed_at--}}

			{{--@if($errors->has('closed_at'))--}}
				{{--<p class="help-block text-danger">{{ $errors->first('closed_at') }}</p>--}}
			{{--@endif--}}
		{{--</div>--}}

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