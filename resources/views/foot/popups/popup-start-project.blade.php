<div class="modal fade origami-modal origami-modal_wide" id="writetous-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog origami-modal__dialog origami-modal__dialog_wide" role="document">
		<div class="modal-content origami-modal__content">
			<div class="modal-header origami-modal__header">
				<button type="button" class="close origami-modal__close" data-dismiss="modal" aria-label="Close">
					<i class="fa fa-times" aria-hidden="true"></i>
				</button>
				<h4 class="modal-title origami-modal__title">{{ __('Start a project') }}</h4>
			</div>
			<div class="modal-body origami-modal__body">
				{{--<form id="write-to-us-form" class="origami-form" action="{{ route('save-start-project-request') }}" method="post">				<form id="write-to-us-form" class="origami-form" @submit.prevent="sendForm" action="{{ route('save-start-project-request') }}" method="post">--}}
				<form id="write-to-us-form" class="origami-form" @submit.prevent="sendForm" action="{{ route('save-start-project-request') }}" method="post">

					<script>
						window.Laravel = <?php echo json_encode([
								'csrfToken' => csrf_token(),
						]); ?>
					</script>

					{{ csrf_field() }}

					<div class="row">

						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-name" class="origami-form__label">{{ __('Name') }} *</label>
								<input class="origami-form__input" name="name" id="writetous-name" v-model="formData.name">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-company" class="origami-form__label">{{ __('Company') }}</label>
								<input class="origami-form__input" name="company" v-model="formData.company" id="writetous-company">
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-email" class="origami-form__label">{{ __('Email') }} *</label>
								<input class="origami-form__input"
								       type="email" name="email" id="writetous-email" v-model="formData.email">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-number" class="origami-form__label">{{ __('Phone number') }}</label>
								<input class="origami-form__input" name="phone" v-model="formData.phone" id="writetous-number">
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-budget" class="origami-form__label">{{ __('Budget') }}</label>
								<select class="origami-form__select" v-model="formData.budget" name="budget" id="writetous-budget">
									<option value="" class="placeholder">{{ __('Select your budget range') }}</option>
									<option value="< $2500">&lt; $2500</option>
									<option value="$2500 - $5000">$2500 - $5000</option>
									<option value="$5000 - $10000">$5000 - $10000</option>
									<option value="> $10000">&gt; $10000</option>
								</select>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="origami-form__form-group">
								<label for="writetous-type" class="origami-form__label">{{ __('Project type') }}</label>
								<select class="origami-form__select" v-model="formData.project_type" name="project_type" id="writetous-type">
									<option value="" class="placeholder">{{ __('Select a type') }}</option>
									@if(isset($project_categories) && count($project_categories) > 0)
										@foreach($project_categories as $category)
											<option value="{{ $category->id }}">{{ $category->translateOrDefault(app()->getLocale())->title }}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>

					</div>
					<div class="origami-form__form-group">
						<label for="writetous-description" class="origami-form__label">{{ __('Description') }} *</label>
						<textarea class="origami-form__input origami-form__input_textarea"
						          name="project_details" id="writetous-description" rows="4"
						          placeholder="{{ __('Describe your project') }}" minlength="4" v-model="formData.project_details"></textarea>
					</div>



					<div class="origami-form__form-group" v-for="error in errors">
						<div class="alert alert_danger">
							@{{ error }}
						</div>
					</div>

					<div class="origami-form__form-group">
						{!! $captcha->display('captcha-start-project') !!}
					</div>

					<div class="origami-form__form-group">
						<input type="submit" class="btn btn-submit" value="{{ __('Send') }}">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>