<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108260659-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-108260659-1');
</script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="description" content="{{ __('static.meta_description') }}">
<meta name="keywords" content="{{ __('static.meta_keywords') }}">

{{--TODO #1: зробити можливість динамічно додавати keywords--}}