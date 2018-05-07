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