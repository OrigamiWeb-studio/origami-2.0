<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	@include('head.meta')
	<title>{{ config('app.name', 'ORIGAMI STUDIO') }}</title>
	@include('head.styles')
</head>
<body>
@include('head.header')
test
@yield('content')

@include('foot.footer')
@include('foot.styles')
@include('foot.scripts')
</body>
</html>
