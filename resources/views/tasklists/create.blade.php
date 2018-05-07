@extends('layouts.master')

@section('content')

    <h1>Create a new task list</h1>
    <form method='POST' action='/tasklists'>
        {{ csrf_field() }}

        <ul>
            <li><label>Title
                    <input type='text' name='title' value='{{ $title or old('title') }}' >
                    @include('modules.error-field', ['field' => 'title'])
                </label></li>
            <li><label>Description
                    <input type='text' name='description' value='{{ $description or old('description') }}' >
                    @include('modules.error-field', ['field' => 'description'])
                </label></li>

            <li><label>Task
                    <input text='text' name = 'task' value='{{ $task or old('task') }}'>
                    @include('modules.error-field', ['field' => 'description'])
            </label></li>
            @foreach($tasksForCheckboxes as $taskId => $taskTitle)
                <li><label><input type='checkbox' name='tasks[]' value='{{ $taskId }}'>
                {{ $taskTitle }}
                </label></li>
            @endforeach

        </ul>

        <input type='Submit' value='Add goal' class='btn btn-primary'>

    </form>


@endsection