@if($projects->isNotEmpty())
	<section class="s_clients leaning_section">
		<div class="container">
			<h2>{{ __('Clients') }}</h2>
			<div class="reviews-slider-wrapper">
				<ul id="reviews-slider" class="reviews-slider list-unstyled cS-hidden">
					@foreach($projects->where('client_review', '!=', null) as $project)
						<li>
							<blockquote>{{ $project->client_review }}</blockquote>
							<strong>{{ $project->client->profile->first_name.' '.$project->client->profile->last_name }}</strong>
							<span>{{ $project->client->profile->about }}</span>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</section>
@endif