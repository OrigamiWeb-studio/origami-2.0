
<header class="main_header">
	<div class="container">
		<div class="pull-left">
			<div class="logo-wrapper">
				<a href="{{ route('home') }}">
					<svg version="1.1"
							 xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 200 200" width="75px" height="75px">
						<polygon style="fill:#3F3F3F;" points="180.328,94.989 159.496,74.924 149.914,93.529 "/>
						<polygon style="fill:#636363;" points="159.434,75.047 114.877,91.385 128.244,136.683 "/>
						<polygon style="fill:#919090;" points="60.834,34.222 106.133,61.327 83.112,105.141 "/>
						<polygon style="fill:#444343;" points="19.34,159.513 38.277,149.488 27.509,137.235 "/>
						<polygon style="fill:#706E6E;" points="51.181,165.058 27.447,137.235 63.777,141.474 "/>
						<polygon style="fill:#444343;" points="106.115,61.312 128.321,136.56 51.148,165.058 "/>
					</svg>
				</a>
			</div>
			<nav class="main_nav">
				<ul>
					<li>
						<a href="{{ route('projects') }}">Projects</a>
					</li>
					<li>
						<a href="#">About Us</a>
					</li>
					<li>
						<a href="#">Contacts</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="pull-right">
			<div class="lang-dropdown dropdown">
				<a href="#" data-toggle="dropdown">
					English
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="#">Polski</a>
					</li>
					<li>
						<a href="#">Русский</a>
					</li>
					<li>
						<a href="#">Українська</a>
					</li>
				</ul>
			</div>
			<a href="#" class="btn">
				<span>Write to Us</span>
			</a>
		</div>
	</div>
</header>



{{--<nav class="navbar navbar-default navbar-static-top">--}}
	{{--<div class="container">--}}
		{{--<div class="navbar-header">--}}

			{{--<!-- Collapsed Hamburger -->--}}
			{{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
				{{--<span class="sr-only">Toggle Navigation</span>--}}
				{{--<span class="icon-bar"></span>--}}
				{{--<span class="icon-bar"></span>--}}
				{{--<span class="icon-bar"></span>--}}
			{{--</button>--}}

			{{--<!-- Branding Image -->--}}
			{{--<a class="navbar-brand" href="{{ url('/') }}">--}}
				{{--{{ config('app.name', 'Laravel') }}--}}
			{{--</a>--}}
		{{--</div>--}}

		{{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
			{{--<!-- Left Side Of Navbar -->--}}
			{{--<ul class="nav navbar-nav">--}}
				{{--&nbsp;<li><a href="{{ action('ProjectsController@allProjects') }}">Projects</a></li>--}}
				{{--<li><a href="{{ action('TeamController@allDevelopers') }}">Team</a></li>--}}
{{--				<li><a href="{{ action('ContactsController@index') }}">Contacts</a></li>--}}
			{{--</ul>--}}

			{{--<!-- Right Side Of Navbar -->--}}
			{{--<ul class="nav navbar-nav navbar-right">--}}
				{{--<!-- Authentication Links -->--}}
				{{--@if (Auth::guest())--}}
					{{--<li><a href="{{ route('login') }}">Login</a></li>--}}
					{{--<li><a href="{{ route('register') }}">Register</a></li>--}}
				{{--@else--}}
					{{--<li class="dropdown">--}}
						{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
							{{--{{ Auth::user()->login }} <span class="caret"></span>--}}
						{{--</a>--}}

						{{--<ul class="dropdown-menu" role="menu">--}}
							{{--<li>--}}
								{{--<a href="{{ route('logout') }}"--}}
									 {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
									{{--Logout--}}
								{{--</a>--}}

								{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
									{{--{{ csrf_field() }}--}}
								{{--</form>--}}
							{{--</li>--}}
						{{--</ul>--}}
					{{--</li>--}}
				{{--@endif--}}
			{{--</ul>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</nav>--}}