<section class="s-contact leaning_section">
	<div class="container">

		<h2 class="section-title">{{ __('Write to Us') }}</h2>
		<p>{{__('If you have questions or you want to do an order please send the form below. We will contact you soon.')}}</p>

		<form class="origami-form s-contact__form" id="contact-form" @submit.prevent="sendForm" action="{{ route('save-contact-us-request') }}" method="post">
			{{ csrf_field() }}
			<div class="origami-form__form-group">
				<label for="homeform__name" class="origami-form__label">{{ __('Name') }} *</label>
				<input class="origami-form__input s-contact__input" id="homeform__name"
				       name="name" v-model="formData.name">
			</div>

			<div class="origami-form__form-group">
				<label for="homeform__email" class="origami-form__label">Email *</label>
				<input class="origami-form__input s-contact__input" type="email"
				       name="email" id="homeform__email" v-model="formData.email">
			</div>

			<div class="origami-form__form-group">
				<label for="homeform__phone" class="origami-form__label">{{ __('Phone number') }}</label>
				<input class="origami-form__input s-contact__input"
				       name="phone" id="homeform__phone" v-model="formData.phone">
			</div>

			<div class="origami-form__form-group">
				<label for="homeform__message" class="origami-form__label">{{ __('Project details') }} *</label>
				<textarea class="origami-form__input s-contact__input origami-form__input_textarea"
				          name="description" id="homeform__message" rows="4" v-model="formData.project_details"></textarea>
			</div>

			<div class="origami-form__form-group" v-for="error in errors">
				<div class="alert alert_danger">
					@{{ error }}
				</div>
			</div>

			<div class="origami-form__form-group" v-if="success !== ''">
				<div class="alert alert_success">
					@{{ success }}
				</div>
			</div>

			<div class="origami-form__form-group">
				{!! $captcha->display('captcha-contact-us') !!}
			</div>

			<div class="origami-form__form-group">
				<input type="submit" class="btn btn-submit" value="{{ __('Send') }}">
			</div>
		</form>

	</div>
</section>