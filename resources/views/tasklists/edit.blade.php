@extends('layouts.master')

@section('content')

    <h1>Edit {{$tasklist->title}}</h1>
    <form method='POST' action='/tasklists/{{$tasklist->id}}'>
        {{ method_field('put') }}

        {{ csrf_field() }}

        <ul>
            <li><label>Title
                    <input type='text' name='title' value='{{ old('title', $tasklist->title) }}' >
                    @include('modules.error-field', ['field' => 'title'])
                </label></li>
            <li><label>Description
                    <input type='text' name='description' value='{{ old('description', $tasklist->description) }}' >
                    @include('modules.error-field', ['field' => 'description'])
                </label></li>
            <li><label>Task #1
                    <input type='text' name='task_1_title' value='{{old('task_1_title',  $tasklist->task_1_title) }}' >
                    @include('modules.error-field', ['field' => 'task_1_title'])
                </label></li>
            <li><label >Status
                    <select name='task_1_status' id='task_1_status' >
                        @foreach(config('app.statusLevels') as $task_1_status => $task_1_description)
                            <option value="{{ $task_1_status }}"  @if( (Request::has('task_1_status') && Request::input('task_1_status') ==  $task_1_status) or (Request::old('task_1_status', $tasklist->task_1_status) == $task_1_status))) selected='selected' @endif> {{ $task_1_description }} </option>
                        @endforeach
                    </select>
                    @include('modules.error-field', ['field' => 'task_1_status'])
                </label></li>
            <li><label>Task #2
                    <input type='text' name='task_2_title' value='{{ old('task_2_title', $tasklist->task_2_title) }}' >
                    @include('modules.error-field', ['field' => 'task_2_title'])
                </label></li>
            <li><label >Status
                    <select name='task_2_status' id='task_2_status' >
                        @foreach(config('app.statusLevels') as $task_2_status => $task_2_description)
                            <option value="{{ $task_2_status }}"  @if( (Request::has('task_2_status') && Request::input('task_2_status') ==  $task_2_status) or (Request::old('task_2_status', $tasklist->task_2_status) == $task_2_status))) selected='selected' @endif> {{ $task_2_description }} </option>
                        @endforeach
                    </select>
                    @include('modules.error-field', ['field' => 'task_2_status'])
                </label></li>
            <li><label>Task #3
                    <input type='text' name='task_3_title' value='{{ old('task_3_title', $tasklist->task_3_title) }}' >
                    @include('modules.error-field', ['field' => 'task_3_title'])
                </label></li>
            <li><label >Status
                    <select name='task_3_status' id='task_3_status' >
                        @foreach(config('app.statusLevels') as $task_3_status => $task_3_description)
                            <option value="{{ $task_3_status }}"  @if( (Request::has('task_3_status') && Request::input('task_3_status') ==  $task_3_status) or (Request::old('task_3_status', $tasklist->task_3_status) == $task_3_status))) selected='selected' @endif> {{ $task_3_description }} </option>
                        @endforeach
                    </select>
                    @include('modules.error-field', ['field' => 'task_3_status'])
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