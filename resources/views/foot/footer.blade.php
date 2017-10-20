<footer class="main-footer">
	<div class="container">
		<div class="pull-left">
			<nav class="main-nav">
				<ul>
					<li><a href="{{ route('projects') }}">{{ __('Projects') }}</a></li>
					<li><a href="{{ route('about') }}">{{ __('About Us') }}</a></li>
					<li><a href="{{ route('contacts') }}">{{ __('Contacts') }}</a></li>
				</ul>
			</nav>
		</div>
		<div class="pull-right">
			<div class="soc-icons">
				<ul>
					<li>
						<a target="_blank" rel="nofollow" href="https://www.instagram.com/origami.team/">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a target="_blank" rel="nofollow" href="https://vk.com/origamiwebstudio">
							<i class="fa fa-vk" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a target="_blank" rel="nofollow" href="https://www.facebook.com/groups/746999255478272">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>

@include('foot.popups.popup-start-project')