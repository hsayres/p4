@extends('layouts.master')

@section('title')
    {{$tasklist->title}}
@endsection

@section('content')
    <h1>{{ $tasklist->title }}</h1>
    <p> <a href='/tasklists/{{$tasklist->id}}/delete'> Delete this task list </a></p>

@endsection