@extends('layout')

@section('title')
Projects
@endsection



@section('content')


	<h1 class="title"> Projects </h1>

        <section class="hero">
            <div class="container">
              <h2 class="title">
              	<a href="/projects/create"> Create New Project  </a>
              </h2>
          </div>
        </section>
        <p >
    		
        </p>


  <ul>
    	
    	  
        @foreach ($projects as $project)
        <li>
        	<a href="/projects/{{$project->id}}"> {{  $project->title   }}  </a>
        </li>
			      


        @endforeach        

    </ul>



@endsection
