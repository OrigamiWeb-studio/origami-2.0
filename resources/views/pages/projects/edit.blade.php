@extends('layouts.app')

@section('content')
	<p>t</p><p>t</p><p>t</p><p>t</p><p>t</p>
	<form action="{{ route('project-edit-submit', ['id' => $project->id]) }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<p>
			<label for="">Title</label>
			<input type="text" name="title" placeholder="Title" value="{{ isset($project) ? $project->title : old('title') }}">
		</p>
		<p>
			<label for="">Client</label>
			<select name="client" id="client">
				@if(isset($project->client))
					<option value="{{ $project->client->id }}" selected>{{ $project->client->profile->name }}</option>
				@else
					<option disabled selected>Client</option>
				@endif
				@foreach($clients as $client)
					<option value="{{ $client->id }}">{{ $client->profile->name }}</option>
				@endforeach
			</select>
		</p>
		<p>
			<label for="">Developers</label>
			<select name="developers[]" id="developers" multiple>
				<option disabled {{ !isset($project) ? 'selected' : '' }}>Developers</option>
				@foreach($developers as $developer)
					<option
							value="{{ $developer->id }}" {{ $developer->id === old('developers[]') || isset($project) && $project->developers->contains('id', $developer->id) ? 'selected' : '' }}>
						{{ $developer->profile->name }}</option>
				@endforeach
			</select>
		</p>
		<p>
			<label for="">Category</label>
			<select name="category" id="category">
				<option disabled {{ !isset($project) ? 'selected' : '' }}>Category</option>
				@foreach($categories as $category)
					<option value="{{ $category->id }}" {{ isset($project) && $category->id === $project->category->id ? 'selected' : '' }}>
						{{ $category->translateOrDefault(app()->getLocale())->title }}</option>
				@endforeach
			</select>
		</p>
		<p>
			<label for="">Current stage</label>
			<select name="stage" id="stage">
				<option disabled {{ !isset($project) ? 'selected' : '' }}>Current stage</option>
				@foreach($stages as $stage)
					<option value="{{ $stage->id }}">{{ $stage->title }}</option>
				@endforeach
			</select>
		</p>
		{{--		{{ dd($project->stages, $stages, $project->stages->has($stages[1]->id)) }}--}}
		<p>
			<label for="">Stages</label>
			<select name="stages[]" id="stage" multiple>
				<option disabled {{ !isset($project) ? 'selected' : '' }}>Stages</option>
				@foreach($stages as $stage)
					<option
							value="{{ $stage->id }}" {{ $stage->id === old('stages[]') || isset($project) && $project->stages->contains('id', $stage->id) ? 'selected' : '' }}>
						{{ $stage->title }}</option>
				@endforeach
			</select>
		</p>
		<p>
			<label for="">Link</label>
			<input type="text" name="link" placeholder="Link" value="{{ isset($project) ? $project->link : old('link') }}">
		</p>
		<p>
			<label for="">Placeholder</label>
			<input type="file" name="cover" id="cover">
		</p>
		<p>
			<label for="">Main image</label>
			<input type="file" name="main_image" id="main_image">
		</p>
		<p>
			<input type="checkbox" name="visible" {{ old('visible') || isset($project) && $project->visible ? 'checked' : '' }}>Visible
			<input type="checkbox" name="us_choice" {{ old('us_choice') || isset($project) && $project->us_choice ? 'checked' : '' }}>Us choice
		</p>
		<p>
			<label for="">Client review</label>
			<textarea name="review" id="review" cols="50" rows="2"
			          placeholder="Client review">{{ isset($project) ? $project->client_review : old('review') }}</textarea>
		</p>
		<p>
			<label for="">Description</label>
			<textarea name="description" id="description" cols="50" rows="5"
			          placeholder="Description">{{ isset($project) ? $project->description : old('description') }}</textarea>
		</p>
		<p>
			<label for="">Short description</label>
			<textarea name="short_description" id="short_description" cols="50" rows="5"
			          placeholder="Short description">{{ isset($project) ? $project->short_description : old('short_description') }}</textarea>
		</p>
		{{--<p>--}}
			{{--<label for="">Closed at</label>--}}
			{{--<input type="datetime-local" name="closed_at" value="{{ isset($project) ? $project->closed_at : old('review') }}">--}}
		{{--</p>--}}
		<button type="submit">ADD/EDIT</button>
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</form>
@stop