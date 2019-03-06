@extends('layout')

@section('title')
Edit Project
@endsection



@section('content')


<h1 class="title">Edit Project</h1>

<form method="POST" action="/projects/{{$project->id}}" style="margin-bottom: 1em;">
	@method('PATCH')
	@csrf

	<div class="field">
		<label class="label" for="title">Label</label>
		<div class="control">
			<input name="title" class="input" type="text" placeholder="Title" value="{{ $project->title }}">
		</div>
		<p class="help">This is a help text</p>
	</div>
	<div class="field">
		<label class="label" for="title">Description</label>
		<div class="control">
			<textarea name="description" class="textarea"> {{ $project->description}} </textarea>
		</div>
	</div>
	<div class="control">
		<button class="button is-link">Update Project</button>
	</div>
</form>


<form method="POST" action="/projects/{{$project->id}}">
	@method('DELETE')
	@csrf
	<div class="control">
	  <button class="button is-light">Delete Project</button>
	</div>
</form>





@endsection

