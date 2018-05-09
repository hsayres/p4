@extends('layouts.master')

@section('title')
    {{$goal->title}}
@endsection

@section('content')
    <div class="container">
        <h1>View "{{ $goal->title }}" goal</h1>


        <ul>
            <li>
                <h3>Description:</h3>
            </li>
            <li>
                {{ $goal->description }}
            </li>
            <li>
                <h3>Tasks:</h3>
            </li>
            @foreach($tasksForCheckboxes as $taskId => $taskTitle)
                @if(in_array($taskId, $tasks))
                    <li>
                        {{ $taskTitle }}
                    </li>
                @endif
            @endforeach
        </ul>

        <input type='button'
               value='Edit this goal'
               onclick="window.location.href='/goals/{{$goal->id}}/edit'"
               class='btn-primary inputButton'>
        <input type='button'
               value='Delete this goal'
               onclick="window.location.href='/goals/{{$goal->id}}/delete'"
               class='btn-danger inputButton'>

        <p>
            <a href='/goals'>Go back to all goals</a>
        </p>
    </div>
@endsection