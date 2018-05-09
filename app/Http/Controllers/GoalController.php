<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;
use App\Task;
use DB;

class GoalController extends Controller
{
    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        $goals = Goal::orderBy('title')->get();

        return view('goals.index')->with([
            'goals' => $goals,
        ]);
    }

    public function show($id)
    {
        $goal = Goal::find($id);
        $tasksForCheckboxes = Task::getForCheckboxes();

        if (!$goal) {
            return redirect('/goals')->with(
                ['alert' => 'Goal ' . $id . ' not found']
            );
        }

        return view('goals.show')->with([
            'goal' => $goal,
            'tasksForCheckboxes' => $tasksForCheckboxes,
            'tasks' => $goal->tasks()->pluck('tasks.id')->toArray()
        ]);
    }

    public function create(Request $request)
    {
        $tasksForCheckboxes = Task::getForCheckboxes();

        return view('goals.create')->with([
            'tasksForCheckboxes' => $tasksForCheckboxes,
            'goal' => new Goal(),
            'tasks' => [],
        ]);
    }

    public function store(Request $request)
    {
        $tasks = [$request->task1, $request->task2, $request->task3];

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $title = $request->title;

        $goal = new Goal();
        $goal->title = $title;
        $goal->description = $request->description;
        $goal->save();

        $goal->tasks()->sync($request->input('tasks'));

        foreach ($tasks as $thisTask) {
            if (!empty($thisTask)) {
                $task = new Task();
                $task->title = $thisTask;
                $goal->tasks()->save($task);
                $newtask = Task::where('title', 'like', $task->title)->first();
                $goal->tasks()->sync($newtask);
            }
        }

        return redirect('/goals/create')->with([
            'alert' => 'Your goal ' . $title . ' was added'
        ]);
    }

    public function edit($id)
    {
        $goal = Goal::find($id);
        $tasksForCheckboxes = Task::getForCheckboxes();
        if (!$goal) {
            return redirect('/goals')->with(
                ['alert' => 'Goal ' . $id . ' not found']
            );
        }

        return view('goals.edit')->with([
            'goal' => $goal,
            'tasksForCheckboxes' => $tasksForCheckboxes,
            'tasks' => $goal->tasks()->pluck('tasks.id')->toArray(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $goal = Goal::find($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $goal->title = $request->title;
        $goal->description = $request->description;

        $goal->tasks()->sync($request->input('tasks'));
        $goal->save();

        $task = new Task();
        $task->title = $request->task1;
        if (!empty($task->title)) {
            $goal->tasks()->save($task);
            $newtask = Task::where('title', 'like', $task->title)->first();
            $goal->tasks()->sync($newtask);
        }

        return redirect('/goals/' . $id)->with([
            'alert' => 'Your edits were processed'
        ]);
    }

    public function delete($id)
    {
        $goal = Goal::find($id);

        if (!$goal) {
            return redirect('/goals')->with('alert', 'Goal not found');
        }

        return view('goals.delete')->with(['goal' => $goal]);
    }

    public function destroy($id)
    {
        $goal = Goal::find($id);
        $goal->tasks()->detach();
        $goal->delete();

        return redirect('/goals')->with([
            'alert' => 'Goal was removed'
        ]);
    }

}
