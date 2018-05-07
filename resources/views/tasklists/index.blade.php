@extends('layouts.master')

@section('content')

    <h1>All task lists</h1>
    @if(count($tasklists) > 0)
        <ul>
        @foreach($tasklists as $tasklist)
            <li><a href='/tasklists/{{$tasklist->id}}'>{{$tasklist->title}} </a> </li>
        @endforeach
        </ul>
    @endif
    <li><label>
        <input type='button' value='Add list' onclick="window.location.href='/tasklists/create'" class='btn-danger inputButton'>
    </label></li>

@endsection