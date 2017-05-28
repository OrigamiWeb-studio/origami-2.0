@extends('layouts.app')

@section('content')
	<p>t</p><p>t</p><p>t</p><p>t</p><p>t</p>
	<form action="{{ route('project-add-submit') }}" method="post">
		{{ csrf_field() }}
		<p>
			<input type="text" name="title" placeholder="Title" value="{{ isset($project) ? $project->title : old('title') }}">
		</p>
		<p>
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
			<select name="category" id="category">
				<option disabled {{ !isset($project) ? 'selected' : '' }}>Category</option>
				@foreach($categories as $category)
					<option value="{{ $category->id }}" {{ isset($project) && $category->id === $project->category->id ? 'selected' : '' }}>
						{{ $category->title }}</option>
				@endforeach
			</select>
		</p>
		<p>
			<select name="stage" id="stage">
				<option disabled {{ !isset($project) ? 'selected' : '' }}>Current stage</option>
				@foreach($stages as $stage)
					<option value="{{ $stage->id }}">{{ $stage->title }}</option>
				@endforeach
			</select>
		</p>
		{{--		{{ dd($project->stages, $stages, $project->stages->has($stages[1]->id)) }}--}}
		<p>
			<select name="stages[]" id="stage" multiple>
				<option disabled {{ !isset($project) ? 'selected' : '' }}>Stages</option>
				@foreach($stages as $stage)
					<option value="{{ $stage->id }}" {{ $stage->id === old('stages[]') || isset($project) && $project->stages->contains('id', $stage->id) ? 'selected' : '' }}>
						{{ $stage->title }}</option>
				@endforeach
			</select>
		</p>
		<p>
			<input type="text" name="link" placeholder="Link" value="{{ isset($project) ? $project->link : old('link') }}">
		</p>
		<p>
			<input type="file" name="cover">
		</p>
		<p>
			<input type="checkbox" name="visible" {{ old('visible') || isset($project) && $project->visible ? 'checked' : '' }}>Visible
			<input type="checkbox" name="us_choice" {{ old('visible') || isset($project) && $project->us_choice ? 'checked' : '' }}>Us choice
		</p>
		<p>
			<textarea name="review" id="review" cols="50" rows="2"
			          placeholder="Client review">{{ isset($project) ? $project->client_review : old('review') }}</textarea>
		</p>
		<p>
			<textarea name="description" id="description" cols="50" rows="5"
			          placeholder="Description">{{ isset($project) ? $project->description : old('description') }}</textarea>
		</p>
		<button type="submit">ADD</button>
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