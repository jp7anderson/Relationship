@extends('layouts.master')

@section('content')

<div class="col-md-3 col-md-offset-3">

<h1>Editar usuario</h1>

	
	{{ Form::model($users,array('route' => array('users.update', $users->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('username', 'Username: ') }}	
		{{ Form::text('username', $users->username, ['class' => 'form-control']) }}
		{{ $errors->first('username') }}
	</div>	

	<div class="form-group">
		{{ Form::label('email', 'Email: ') }}	
		{{ Form::text('email', $users->email, ['class' => 'form-control']) }}
		{{ $errors->first('email') }}
	</div>

	<div>{{ Form::submit('Edit User', ['class' => 'btn btn-primary']) }}</div>

	{{ Form::close() }}
	
</div>
@stop