@extends('layouts.master')

@section('content')
	
	<div class="container col-md-6">
		<h1>All Tasks</h1>

		<ol class="breadcrumb">
		  <li>{{ link_to('/users', 'All Users') }}</li>
		   <li>{{ link_to('/users/create', 'Create new User') }}</li>
		</ol>

		
		<ul class="list-group">
			@foreach($tasks as $task)	
				<li class="list-group-item {{ $task->completed ? 'completed' : '' }}">
					<a href="/{{ $task->user->username }}/tasks"><img src="{{ gravatar_url($task->user->email) }}" alt="{{ $task->user->username }}"></a>		
					<?php //{{ $task->title }} ?>
					{{ link_to_task($task) }}

					{{ Form::model($task,['class' => 'task-update-form', 'method' => 'PATCH', 'route' => ['tasks.update', $task->id]]) }}
						{{ Form::checkbox('completed') }}
						{{ Form::submit('Update')}}
					{{ Form::close() }}
				</li>	
			@endforeach
		</ul>	
	</div>

	@if (isset($users))
	<divs clas="container col-md-6">	
		<h3>Add New Task</h3>
		@include('tasks/partials/_form')
	</div>	
	@endif

@stop