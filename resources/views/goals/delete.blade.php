@extends('layouts.master')

@section('content')
    <div class='container'>
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete this goal?</p>

    <form method='POST' action='/goals/{{ $goal->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small submitbuttons'>
    </form>
    <p class='submitbuttons'>
        <a href='/goals/{{$goal->id}}'>No</a>
    </p>
    </div>
@endsection