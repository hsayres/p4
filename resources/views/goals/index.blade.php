@extends('layouts.master')

@section('content')

    <h1>All goals</h1>
    @if(count($goals) > 0)
        <ul>
        @foreach($goals as $goal)
            <li><a href='/goals/{{$goal->id}}'>{{$goal->title}} </a> </li>
        @endforeach
        </ul>
    @endif
    <li><label>
        <input type='button' value='Add list' onclick="window.location.href='/goals/create'" class='btn-danger inputButton'>
    </label></li>

@endsection