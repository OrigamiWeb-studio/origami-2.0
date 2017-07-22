@if(count($project->comments) > 0)
	<div class="block project-content__block comments-block">
		<header class="comments-block__header">
			<h3 class="project-content__sub-title">
				{{ __('Comments') }} <span class="grey-title-text">({{ $project->comments->where('parent_id', '=', null)->count() }})</span>
			</h3>
			<ul class="comments-block__sorting">
				<li class="comments-block__sorting-item comments-block__sorting-item_active">
					<a class="comments-block__sorting-button" href="#">Newest</a>
				</li>
				<li class="comments-block__sorting-item">
					<a class="comments-block__sorting-button" href="#">Oldest</a>
				</li>
			</ul>
		</header>
		<ul class="comments-list">

			@foreach($project->comments->where('parent_id', '=', null) as $comment)
				<li class="comments-list__item">

					<header class="comments-list__header">
						<h4 class="comments-list__name">
							#{{ $comment->user_id === null ? __('Guest') : $comment->user->profile->name }}
							@role('admin')
							<a href="mailto:{{ $comment->email }}" class="grey-title-text">({{ $comment->email }})</a>
							@endrole()
						</h4>
						<span class="comments-list__date">Today, 22:55</span>
					</header>

					<p class="paragraph comments-list__paragraph">{{ $comment->message }}</p>

					<div class="comments-list__managment">
						<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Answer') }}">
						@role('admin')
						<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Edit') }}">
						<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Delete') }}">
						@endrole()
					</div>

				</li>

				@if(isset($comment->answers) && count($comment->answers) > 0)
					@foreach($comment->answers as $answer)

						<li class="comments-list__item comments-list__item_answer">
							<header class="comments-list__header">
								<h4 class="comments-list__name">
									#{{ $answer->user_id === null ? __('Guest') : $answer->user->profile->name }}
									@role('admin')
									<a href="mailto:{{ $answer->email }}" class="grey-title-text">({{ $answer->email }})</a>
									@endrole()
								</h4>
								<span class="comments-list__date">
												Today, 22:57
												</span>
							</header>
							<p class="paragraph comments-list__paragraph">{{ $answer->message }}</p>
							<div class="comments-list__managment">
								@role('admin')
								<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Edit') }}">
								<input type="submit" class="btn btn_transparent comments-list__btn" value="{{ __('Delete') }}">
								@endrole()
							</div>
						</li>

					@endforeach
				@endif

			@endforeach

		</ul>
		<div class="pagination-block">
			<ul class="pagination view-per-page__pagination">
				<li class="pagination__item">
					<span class="pagination__index pagination__index_active">1</span>
				</li>
				<li class="pagination__item">
					<a class="pagination__index" href="#">2</a>
				</li>
			</ul>
		</div>

		<div class="add-comment">
			<h3 class="project-content__sub-title add-comment__title">
				Add comment:
			</h3>
			<div class="row">
				<div class="col-md-6">
					<form class="origami-form">
						{{ csrf_field() }}
						<div class="form-group origami-form__form-group">
							<input class="origami-form__input" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}">
							@if($errors->has('name'))
								<p class="help-block text-danger">{{ $errors->first('name') }}</p>
							@endif
						</div>
						<div class="form-group origami-form__form-group">
							<input class="origami-form__input" type="email" placeholder="Email" name="email" value="{{ old('email') }}">
							@if($errors->has('email'))
								<p class="help-block text-danger">{{ $errors->first('email') }}</p>
							@endif
						</div>
						<div class="form-group origami-form__form-group">
							<input class="origami-form__input" type="text" placeholder="{{ __('Phone number') }}" name="phone" value="{{ old('phone') }}">
							@if($errors->has('phone'))
								<p class="help-block text-danger">{{ $errors->first('phone') }}</p>
							@endif
						</div>
						<div class="form-group origami-form__form-group">
							<textarea class="origami-form__input origami-form__input_textarea" name="message" rows="4" placeholder="Message"></textarea>
							@if($errors->has('message'))
								<p class="help-block text-danger">{{ $errors->first('message') }}</p>
							@endif
						</div>
						<div class="form-group origami-form__form-group">
							Капча
						</div>
						<div class="form-group origami-form__form-group">
							<input type="submit" class="btn btn-submit" value="Send request">
						</div>
					</form>
				</div>
				<div class="col-md-6"></div>
			</div>
		</div>

	</div>
@endif