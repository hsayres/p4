@extends('layouts.master')

@section('title')
    {{$tasklist->title}}
@endsection

@section('content')
    <h1>{{ $tasklist->title }}</h1>
    <h2>{{ $tasklist->description }}</h2>
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
    <p> <a href='/tasklists/{{$tasklist->id}}/edit'> Edit this task list </a></p>
    <p> <a href='/tasklists/{{$tasklist->id}}/delete'> Delete this task list </a></p>

@endsection