@extends('layouts.master')

@section('content')

<div class="col-md-6 col-md-offset-3">

	<h1>Create new</h1>

	<ol class="breadcrumb">
	  <li>{{ link_to('/', 'Tasks') }}</li>
	  <li>{{ link_to('/users', 'Users') }}</li>
	</ol>


	{{ Form::open(['route' => 'users.store']) }}

		<div class="form-group">
			{{ Form::label('username', 'Username: ') }}
			{{ Form::text('username', null,['class' => 'form-control']) }}
			{{ $errors->first('username', '<span class=error>:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email: ') }}
			{{ Form::text('email', null, ['class' => 'form-control']) }}
			{{ $errors->first('email', '<span class=error>:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password: ') }}
			{{ Form::password('password',['class' => 'form-control']) }}
			{{ $errors->first('password', '<span class=error>:message</span>') }}
		</div>

		<div class="form-group">
			{{ Form::submit('Create User', ['class' => 'btn btn-primary']) }}
		</div>

	{{ Form::close() }}
</div>	
@stop