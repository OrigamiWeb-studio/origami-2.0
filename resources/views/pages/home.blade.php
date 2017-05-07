@extends('layouts.app')

@section('content')

	@permission('project-create')
	<p>project-create</p>
	@endpermission

	@permission('project-edit')
	<p>project-edit</p>
	@endpermission

	@role('admin')
	<p>admin</p>
	@endrole

@stop