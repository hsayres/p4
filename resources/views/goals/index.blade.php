@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>All goals</h1>


        @if(count($goals) > 0)
            <ul>
                @foreach($goals as $goal)
                    <li><a href='/goals/{{$goal->id}}'>{{$goal->title}} </a></li>
                @endforeach
            </ul>
        @endif
        <label>
            <input type='button'
                   value='Add goal'
                   onclick="window.location.href='/goals/create'"
                   class='btn-danger inputButton'>
        </label>
    </div>
@endsection