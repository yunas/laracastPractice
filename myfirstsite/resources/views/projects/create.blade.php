@extends('layout')

@section('title')
Create Project
@endsection



@section('content')


<h1 class="title"> Create a New Project </h1>




<form method="POST" action="/projects">
	@csrf


	<div class="field">
		<label class="label">Project Title</label>
		<div class="control">
			<input class="input {{ $errors->has('title')? 'is-danger': ''}}" 
			name="title" 
			type="text" 
			placeholder="Please enter title here" 
			value="{{old('title')}}"
			required="true">
		</div>
	</div>


	<div class="field">
		<div class="control">
			<textarea name="description" class="textarea  {{ $errors->has('title')? 'is-danger': ''}}" type="text" placeholder="project description" required="true">{{old('description')}}</textarea>
		</div>
	</div>


	<div class="control">
		<button class="button is-link">Create Project</button>
	</div>


</form>

@include('errors')


@endsection
