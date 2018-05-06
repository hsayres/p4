@extends('layouts.master')

@section('title')
    Welcome to {{config('app.name')}}
@endsection

@section('content')
    <h1>Welcome</h1>
    <p>
        Choose a feature above to get started.
    </p>
@endsection