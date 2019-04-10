@extends('layout')

@section('title')
Projects
@endsection



@section('content')


	<h1 class="title"> Projects List </h1>

  

  <ul>
    	
    	  
        @foreach ($projects as $project)
        <li>
        	<a href="/projects/{{$project->id}}"> {{  $project->title   }}  </a>
        </li>
			      


        @endforeach        

    </ul>
    <br/>
    <a class="button is-link" href="/projects/create">Create New Project</a>

@endsection
