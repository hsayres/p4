@extends('layouts.master')

@section('title')
    Welcome to {{config('app.name')}}
@endsection

@section('content')
    <div class='container'>
        <h1>Welcome</h1>
        <p>
            Choose a feature above to get started.
        </p>
        <p>
        "Goal Tracker" allows you to create goals. Goals are made up of tasks. You can create, edit, and delete goals.
        </p>

        <p>
        Some tasks actually help you accomplish multiple goals, and thus should be higher priority. For example, practing yoga regularly can make me both mentally and phyiscally healthy-- two separate goals. You can look at your list of tasks (the components that make up all your goals) and see them prioritized by how many goals they help you meet. Get more bang for your buck by tackling the tasks first that get you towards the highest number of your goals!
        </p>
    </div>
@endsection