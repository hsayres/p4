@extends('layouts.master')

@section('title')
    {{$goal->title}}
@endsection

@section('content')
    <h1>{{ $goal->title }}</h1>
    <h2>{{ $goal->description }}</h2>
    <p>
    <ul>
    @foreach($tasksForCheckboxes as $taskId => $taskTitle)
        @if(in_array($taskId, $tasks))
            <li>
                <label> {{ $taskTitle }} </label>
            </li>
        @endif
    @endforeach
    </ul>
    </p>
    <p> <a href='/goals/{{$goal->id}}/edit'> Edit this task list </a></p>
    <p> <a href='/goals/{{$goal->id}}/delete'> Delete this task list </a></p>

@endsection