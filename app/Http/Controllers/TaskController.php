<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;
use App\Task;
use DB;

class TaskController extends Controller
{
    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy('title')->get();

        $orderedTasks = array();

        foreach ($tasks as $task){
            $orderedTasks[$task->title] = [count($task->goals), ($task->goals)];
        }
        arsort($orderedTasks);
        return view('tasks.index')->with([
            'tasks' => $tasks,
            'orderedTasks'=>$orderedTasks,
        ]);
    }


}
