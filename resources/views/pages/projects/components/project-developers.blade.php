@if(isset($project->developers) && count($project->developers) > 0)
	<div class="developers-team">
		<h3 class="project-content__sub-title">{{ __('Developers team') }}</h3>
		<ul class="developers-team__list">

			@foreach($project->developers as $developer)
				<li class="developers-team__item">
					<img src="{{ $developer->profile->photo }}" alt=""
					     class="developers-team__avatar">
					<div class="developers-team__information">
						<h4 class="developers-team__name">
							{{ $developer->profile->name }}
						</h4>
						@isset($developer->position)
							<span class="developers-team__position">#{{ $developer->position }}</span>
						@endisset
					</div>
				</li>
			@endforeach

		</ul>
	</div>
@endif