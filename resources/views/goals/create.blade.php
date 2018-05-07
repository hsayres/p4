@extends('layouts.master')

@section('content')

    <h1>Create a new goal</h1>
    <form method='POST' action='/goals'>
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


            @foreach($tasksForCheckboxes as $taskId => $taskTitle)
                <li><label><input type='checkbox' name='tasks[]' value='{{ $taskId }}'>
                {{ $taskTitle }}
                </label></li>
            @endforeach
            <li><label>Task
                    <input text='text' name = 'task1' value='{{ $task1 or old('task1') }}'>
                    @include('modules.error-field', ['field' => 'task1'])
                </label></li>
            <li><label>Task
                    <input text='text' name = 'task2' value='{{ $task or old('task') }}'>
                    @include('modules.error-field', ['field' => 'task2'])
                </label></li>
            <li><label>Task
                    <input text='text' name = 'task3' value='{{ $task3 or old('task3') }}'>
                    @include('modules.error-field', ['field' => 'task3'])
                </label></li>
        </ul>

        <input type='Submit' value='Add goal' class='btn btn-primary'>

    </form>


@endsection