@extends('layout')

@section('title')
Project Detail
@endsection



@section('content')


<h1 class="title"> Edit Project </h1>



<div class="content">
	<p>Title : {{$project->title}}</p>
	<p>Description: {{$project->description}}</p>
	<p>Author: {{$project->owner_id}}</p>
	<a href="/projects/{{$project->id}}/edit"> Edit </a>

</div>

@if ($project->tasks->count())
<div class="box">
	<label class="label">Tasks:</label>

	@foreach ($project->tasks as $task)

	<form method="POST" action="/tasks/{{$task->id}}">
		@method('PATCH')
		@csrf

		<label class="checkbox  {{ $task->completed ? 'is-complete': ''}} " for="completed">
			<input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked': ''}}>
			{{$task->description}}
		</label>	
	</form>


	
	@endforeach

</div>
@endif

<div class="box">

	<form method="POST" action="/projects/{{$project->id}}/tasks">
		@csrf

		<div class="field">
		  <label class="label">New Task</label>
		  <div class="control">
		    <input name="description" class="input {{ $errors->has('description')? 'is-danger': ''}}" type="text" placeholder="Add task description here" required="true">
		  </div>
		</div>

		@can('update',$project)
			<div>  <p> yes it can update the project </p> </div>
		@endcan
			
		<div class="control">
		  <button class="button is-link">Add</button>
		</div>
	</form>	
	@include('errors')
</div>






@endsection