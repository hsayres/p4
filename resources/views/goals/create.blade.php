@extends('layouts.master')

@section('content')
    <div class='container'>
        <h1>Create a new goal</h1>
        <form method='POST' action='/goals'>
            {{ csrf_field() }}

            <ul>
                <li><label>Title:
                        <input type='text' name='title' value='{{ old('title', $goal->title) }}'>
                        @include('modules.error-field', ['field' => 'title'])
                    </label> <span class='required'> *required </span></li>
                <li><label>Description:
                        <input type='text' name='description' value='{{ old('description', $goal->description) }}'>
                        @include('modules.error-field', ['field' => 'description'])
                    </label><span class='required'> *required </span></li>
                <li><h3> Existing tasks: </h3></li>

                @foreach($tasksForCheckboxes as $taskId => $taskTitle)
                    <li><input type='checkbox' name='tasks[]' value='{{ $taskId }}'>
                            {{ $taskTitle }}
                        </li>
                @endforeach
                <li><h3> New tasks: </h3></li>

                <li>
                    <input text='text' name='task1' value='{{ $task1 or old('task1') }}'>
                    @include('modules.error-field', ['field' => 'task1'])
                </li>
                <li>
                    <input text='text' name='task2' value='{{ $task or old('task') }}'>
                    @include('modules.error-field', ['field' => 'task2'])
                </li>
                <li>
                    <input text='text' name='task3' value='{{ $task3 or old('task3') }}'>
                    @include('modules.error-field', ['field' => 'task3'])
                </li>
            </ul>

            <input type='Submit' value='Add goal' class='btn btn-primary'>

        </form>
        <p>
            <a href='/goals'>Go back to all goals</a>
        </p>

    </div>
@endsection