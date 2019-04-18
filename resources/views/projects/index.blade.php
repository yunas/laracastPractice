@extends('layout')

@section('title')
Projects
@endsection



@section('content')

    @if (session('message'))
        <p> {{ session('message','No message found') }} </p>
    @endif


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
