<header class="main-header">
	<div class="container">
		<div class="logo">
			<a href="{{ route('home') }}">
				<img class="logo__image" src="{{ asset('/images/logo.svg') }}" alt="Origami Web-Studio logo">
			</a>
		</div>

		<transition name="header_menu_appearing">
			<div class="header_menu" v-show="headerActive" transition="appearing" style="display: none">
				<nav class="main-nav">
					<ul>

						<li style="transition-delay: 0ms, 0ms, 0ms"
						    class="{{ \Illuminate\Support\Facades\Request::is('projects') ? 'active' : '' }}">
							<a href="{{ route('projects') }}">{{ __('Projects') }}</a>
						</li>

						<li style="transition-delay: 150ms, 150ms, 0ms"
						    class="{{ \Illuminate\Support\Facades\Request::is('about') ? 'active' : '' }}">
							<a href="{{ route('about') }}">{{ __('About Us') }}</a>
						</li>

						<li style="transition-delay: 300ms, 300ms, 0ms"
						    class="{{ \Illuminate\Support\Facades\Request::is('contacts') ? 'active' : '' }}">
							<a href="{{ route('contacts') }}">{{ __('Contacts') }}</a>
						</li>

						@if(Auth::user())
							<li style="transition-delay: 450ms, 450ms, 0ms">
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						@endif
					</ul>
				</nav>
			</div>
		</transition>
		<div class="pull-right">
			<div class="lang-dropdown">
				<a class="lang-dropdown__current-lang" href="#" @click.prevent="langDropdown = !langDropdown">
					{{ session('locales.current.name') }}
					<span class="caret lang-dropdown__caret"></span>
				</a>
				<ul class="lang-dropdown__menu" style="display: none" v-show="langDropdown">
					@foreach(session('locales.list') as $locale)
						@continue($locale['id'] === session('locales.current.id'))
						<li class="lang-dropdown__item">
							<a class="lang-dropdown__item-link" href="{{ route('set-locale', ['code' => $locale['code']]) }}">{{ $locale['name'] }}</a>
						</li>
					@endforeach
				</ul>
			</div>
			<a href="#" class="btn main-header__button" data-toggle="modal" data-target="#writetous-modal">{{ __('Write to Us') }}</a>
			<div class="burger-menu" :class="{opened: headerActive}" @click="mobileMenu()">
				<div class="burger"></div>
			</div>
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