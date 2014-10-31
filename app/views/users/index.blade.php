@extends('layouts.master')

@section('content')

<div class="col-md-6 col-md-offset-2">

<h1>Users list</h1>

	<ol class="breadcrumb">
	  <li>{{ link_to('/', 'Tasks') }}</li>
	</ol>

@if(Session::has('success'))
<div class="alert-box success">
    <p>{{ Session::get('success') }}</p>
</div>
@endif

@foreach ($users as $user)
	<ul class="list-group">
		<li class="list-group-item">{{ link_to("users/{$user->username}", $user->username) }}  <p><button type="button" class="btn btn-default task-update-form" value="">{{ link_to("users/{$user->id}/edit", 'Editar', ['class' => 'fa fa-pencil-square-o']) }}</button></p>

			<p>{{ Form::open(array('method' => 'DELETE', 'route' =>
			array('users.destroy', $user->id))) }}
			{{ Form::submit('Delete', ['class' => 'btn btn-default task-update-form2']) }}
			{{ Form::close() }}</p>
		</li>
	</ul>	


@endforeach
</div>

<div class=".col-md-3 .col-md-offset-3">
	{{ link_to('users/create', 'Create New User', array('class' => 'btn btn-default user-create')) }}
</div>

@stop