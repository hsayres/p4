@extends('layouts.master')

@section('content')
    <div class='container'>
        <h1>Edit "{{$goal->title}}" goal</h1>
        <form method='POST' action='/goals/{{$goal->id}}'>
            {{ method_field('put') }}

            {{ csrf_field() }}

            <ul>
                <li><label>Title:
                        <input type='text' name='title' value='{{ old('title', $goal->title) }}'>
                        @include('modules.error-field', ['field' => 'title'])
                    </label><span class='required'> *required </span></li>
                <li><label>Description:
                        <input type='text' name='description' value='{{ old('description', $goal->description) }}'>
                        @include('modules.error-field', ['field' => 'description'])
                    </label><span class='required'> *required </span></li>

                <li><h3> Tasks: </h3></li>
                @foreach($tasksForCheckboxes as $taskId => $taskTitle)
                    <li><input
                            type='checkbox'
                            name='tasks[]'
                            value='{{ $taskId }}'
                            {{ (in_array($taskId, $tasks)) ? 'checked' : '' }}>
                        {{ $taskTitle }}
                    </li>
                @endforeach

                <li><label>Add a new task:
                        <input text='text' name='task1' value='{{ $task1 or old('task1') }}'>
                        @include('modules.error-field', ['field' => 'task1'])
                    </label></li>
            </ul>

            <input type='submit' value='Save edits' class='btn btn-primary'>

        </form>
    </div>


@endsection