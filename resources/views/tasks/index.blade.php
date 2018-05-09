@extends('layouts.master')

@section('content')
    <div class='container'>
        <h1>All tasks</h1>
        @if(count($tasks) > 0)
            <ul>
                @foreach($orderedTasks as $task=>$goals)
                    <li>"{{$task}}" is in {{($goals[0])}} goal(s):
                        <ol>
                            @foreach($goals[1] as $goal)
                                <li>{{$goal->title}}</li>
                                @endforeach
                                </ol>
                                </li>
                @endforeach
            </ul>
        @endif

    </div>
@endsection