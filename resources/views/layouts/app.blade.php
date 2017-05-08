<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	@include('head.meta')
	<title>{{ config('app.name', 'ORIGAMI STUDIO') }}</title>
	@include('head.styles')
</head>
<body>
<div id="app">
	@include('head.header')
	@yield('content')
</div>
@include('foot.styles')
@include('foot.scripts')
</body>
</html>
