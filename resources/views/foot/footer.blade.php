<footer class="main_footer">
	<div class="container">
		<div class="pull-left">
			<nav class="main_nav">
				<ul>
					<li>
						<a href="{{ route('projects') }}">{{ __('Projects') }}</a>
					</li>
					<li>
						<a href="{{ route('about') }}">{{ __('About Us') }}</a>
					</li>
					<li>
						<a href="{{ route('contacts') }}">{{ __('Contacts') }}</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="pull-right">
			<div class="soc-icons">
				<ul>
					<li>
						<a href="https://vk.com/origamiwebstudio">
							<i class="fa fa-vk" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-dribbble" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-behance" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>


<div class="modal fade origami-modal origami-modal_wide" id="writetous-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog origami-modal__dialog origami-modal__dialog_wide" role="document">
		<div class="modal-content origami-modal__content">
			<div class="modal-header origami-modal__header">
				<button type="button" class="close origami-modal__close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
				<h4 class="modal-title origami-modal__title">Start a project</h4>
			</div>
			<div class="modal-body origami-modal__body">
				<form class="origami-form">
					<div class="row">
						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-name" class="origami-form__label">Name *</label>
								<input class="origami-form__input" type="text" name="name" id="writetous-name" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-company" class="origami-form__label">Company</label>
								<input class="origami-form__input origami-form__input_error" type="text" name="company" id="writetous-company" value="Origami studio">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-email" class="origami-form__label">Email *</label>
								<input class="origami-form__input" type="email" name="email" id="writetous-email" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-number" class="origami-form__label">Phone Number</label>
								<input class="origami-form__input" type="text" name="number" id="writetous-number">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-budget" class="origami-form__label">Budget *</label>
								<select class="origami-form__select" name="budget" id="writetous-budget" required>
									<option value="" class="placeholder">Select your budget range</option>
									<option value="$1">>$1</option>
									<option value=">$1-5">$1-5</option>
									<option value="<$5"><$5</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-type" class="origami-form__label">Project type *</label>
								<select class="origami-form__select" name="project-type" id="writetous-type">
									<option value="" class="placeholder">Select a type</option>
									<option value="type 1">type 1</option>
									<option value=">type 2">type 2</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group origami-form__form-group">
						<label for="writetous-description" class="origami-form__label">Description *</label>
						<textarea class="origami-form__input origami-form__input_textarea" name="description" id="writetous-description" rows="4" placeholder="Describe Your Project" required></textarea>
					</div>
					<div class="form-group origami-form__form-group">
						<input type="submit" class="btn btn-submit" value="Send request">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>