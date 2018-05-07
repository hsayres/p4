@extends('layouts.master')

@section('content')

    <h1>Edit {{$goal->title}}</h1>
    <form method='POST' action='/goals/{{$goal->id}}'>
        {{ method_field('put') }}

        {{ csrf_field() }}

        <ul>
            <li><label>Title
                    <input type='text' name='title' value='{{ old('title', $goal->title) }}' >
                    @include('modules.error-field', ['field' => 'title'])
                </label></li>
            <li><label>Description
                    <input type='text' name='description' value='{{ old('description', $goal->description) }}' >
                    @include('modules.error-field', ['field' => 'description'])
                </label></li>

            <li><label>Task
                    <input text='text' name = 'task1' value='{{ $task1 or old('task1') }}'>
                    @include('modules.error-field', ['field' => 'task1'])
                </label></li>
            @foreach($tasksForCheckboxes as $taskId => $taskTitle)
                <li><label><input
                type='checkbox'
                name='tasks[]'
                value='{{ $taskId }}'
                {{ (in_array($taskId, $tasks)) ? 'checked' : '' }}>
                        {{ $taskTitle }}
                    </label></li>
            @endforeach
        </ul>

        <input type='submit' value='Save edits' class='btn btn-primary'>

    </form>


@endsection