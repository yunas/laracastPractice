@extends('layout')

@section('content')
    <h1> My {{ $foo }} website </h1>


    <ul>

        @foreach ($tasks as $task)
            <li> {{  $task   }} </li>
        @endforeach        

    </ul>


@endsection
