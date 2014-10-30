<div class="col-md-6">
{{ Form::open(['url' => '/tasks', 'class' => 'form']) }}

	<div class="form-group">
		{{ Form::label('title', 'Title: ') }}
		{{ Form::text('title', null, ['class' => 'form-control']) }}
		{{ $errors->first('title', '<span class=error>:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('body', 'Body: ') }}
		{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		{{ $errors->first('body', '<span class=error>:message</span>') }}
	</div>

	<div class="form-group">
		{{ Form::label('assign', 'Assign To: ') }}
		{{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
	</div>	

	<div class="form-group">
		{{ Form::submit('Create Task', ['class' => 'btn btn-primary']) }}
	</div>

{{ Form::close() }}
</div>