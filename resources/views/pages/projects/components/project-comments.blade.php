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
				<div class="col-sm-6 col-sm-push-6">
					<h4 class="project-content__sub-title add-comment__rules-title">Rules for comments</h4>
					<p class="add-comment__rules">The comment will be published in case if it corresponds with rules below:</p>
					<ol class="add-comment__rules-list">
						<li class="add-comment__rules-item">Don't use inappropriate language and offencive words. This includes using obscenities as well as being just plain mean.</li>
						<li class="add-comment__rules-item">Dissalow posting comments that doen't have any point</li>
						<li class="add-comment__rules-item">Minimal length of comment is 150 symbols</li>
						<li class="add-comment__rules-item">Dissalow using capslock for whole comment</li>
						<li class="add-comment__rules-item">Dissalow providing links/trackbacks to obscene or inappropriate content.</li>
					</ol>
				</div>
				<div class="col-sm-6 col-sm-pull-6">
					<form class="origami-form">
						{{ csrf_field() }}
						<div class="form-group origami-form__form-group">
							<label for="comment-form__name" class="origami-form__label">Name *</label>
							<input class="origami-form__input" type="text" name="name" value="{{ old('name') }}" id="comment-form__name" required>
							@if($errors->has('name'))
								<p class="help-block text-danger">{{ $errors->first('name') }}</p>
							@endif
						</div>
						<div class="form-group origami-form__form-group">
							<label for="comment-form__name" class="origami-form__label">Email *</label>
							<input class="origami-form__input" type="email" name="email" value="{{ old('email') }}" id="comment-form__email" required>
							@if($errors->has('email'))
								<p class="help-block text-danger">{{ $errors->first('email') }}</p>
							@endif
						</div>
						<div class="form-group origami-form__form-group">
							<label for="comment-form__name" class="origami-form__label">Phone number</label>
							<input class="origami-form__input" type="text" name="phone" value="{{ old('phone') }}" id="comment-form__phone">
							@if($errors->has('phone'))
								<p class="help-block text-danger">{{ $errors->first('phone') }}</p>
							@endif
						</div>
						<div class="form-group origami-form__form-group">
							<label for="comment-form__name" class="origami-form__label">Message *</label>
							<textarea class="origami-form__input origami-form__input_textarea" name="message" rows="4" id="comment-form__message" required></textarea>
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
			</div>
		</div>

	</div>
@endif