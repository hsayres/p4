@extends('layouts.master')

@section('content')

    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete this task list?</p>

    <form method='POST' action='/tasklists/{{$tasklist->id}}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes' class='btn btn-danger'>
    </form>

    <p>
        <a href='/tasklists/{{$tasklist->id}}'>No</a>
    </p>

@endsection