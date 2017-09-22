<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Origami Team - {{ $request->type }} email</title>
</head>
<body>
{{ $request->type }} email.<br>
<p><strong>Name: </strong>{{ $request->name }} ({{ $request->user_ip }})</p>
<p><strong>Email: </strong>{{ $request->email }}</p>
@if($request->phone)
	<p><strong>Phone: </strong>{{ $request->phone }}</p>
@endif
@if($request->message)
	<p><strong>Message: </strong>{{ $request->message }}</p>
@endif
@if($request->type === "Start project")
	@if($request->company)
		<p><strong>Company: </strong>{{ $request->company }}</p>
	@endif
	@if($request->budget)
		<p><strong>Budget: </strong>{{ $request->budget }}</p>
	@endif
@endif
</body>
</html>