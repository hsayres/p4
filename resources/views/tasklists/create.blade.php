@extends('layouts.master')

@section('content')

    <h1>Create a new task list</h1>
    <form method='GET' action='/tasklists'>
        <ul>
            <li><label>Title
                    <input type='text' name='title' value='{{ $title or old('title') }}' >
                    <div class='required'> *required </div>
                    @include('modules.error-field', ['field' => 'title'])
                </label></li>
            <li><label>Description
                    <input type='text' name='description' value='{{ $description or old('description') }}' >
                    <div class='required'> *required </div>
                    @include('modules.error-field', ['field' => 'description'])
                </label></li>
            <li><label>Task #1
                    <input type='text' name='task1' value='{{ $task1 or old('task1') }}' >
                    <div class='required'> *required </div>
                    @include('modules.error-field', ['field' => 'task1'])
                </label></li>
            <li><label >Status
                    <select name='taks1Status' id='taks1Status' >
                        @foreach(config('app.statusLevels') as $task1Level => $task1Title)
                            <option value="{{ $task1Level }}"  @if( (Request::has('task1Level') && Request::input('task1Level') ==  $task1Level) or (Request::old('task1Level') == $task1Level))) selected='selected' @endif> {{ $task1Title }} </option>
                        @endforeach
                    </select>
                    @include('modules.error-field', ['field' => 'task1Level'])
                </label></li>
            <li><label>Task #2
                    <input type='text' name='task2' value='{{ $task2 or old('task2') }}' >
                    <div class='required'> *required </div>
                    @include('modules.error-field', ['field' => 'task2'])
                </label></li>
            <li><label >Status
                    <select name='task2Status' id='task2Status' >
                        @foreach(config('app.statusLevels') as $task2Level => $task2Title)
                            <option value="{{ $task2Level }}"  @if( (Request::has('task2Level') && Request::input('task2Level') ==  $task2Level) or (Request::old('task2Level') == $task2Level))) selected='selected' @endif> {{ $task2Title }} </option>
                        @endforeach
                    </select>
                    @include('modules.error-field', ['field' => 'task2Level'])
                </label></li>
            <li><label>Task #3
                    <input type='text' name='task2' value='{{ $task3 or old('task3') }}' >
                    <div class='required'> *required </div>
                    @include('modules.error-field', ['field' => 'task3'])
                </label></li>
            <li><label >Status
                    <select name='task3Status' id='task3Status' >
                        @foreach(config('app.statusLevels') as $task3Level => $task3Title)
                            <option value="{{ $task3Level }}"  @if( (Request::has('task3Level') && Request::input('task3Level') ==  $task3Level) or (Request::old('task3Level') == $task3Level))) selected='selected' @endif> {{ $task3Title }} </option>
                        @endforeach
                    </select>
                    @include('modules.error-field', ['field' => 'task2Level'])
                </label></li>
        </ul>
    </form>


@endsection