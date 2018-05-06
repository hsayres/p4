<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasklistController extends Controller
{
    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        $tasklists = ['Task list 1', 'Task list 2', 'Task list 3'];

        return view('tasklists.index')->with([
            'tasklists' => $tasklists,
        ]);
    }

    public function create(Request $request)
    {
        return view('tasklists.create');
    }

}
