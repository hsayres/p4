<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasklist;
use App\Task;
use DB;

class TasklistController extends Controller
{
    /**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        $tasklists = Tasklist::orderBy('title')->get();

        return view('tasklists.index')->with([
            'tasklists' => $tasklists,
        ]);
    }

    public function show($id)
    {
        $tasklist = Tasklist::find($id);

        if(!$tasklist) {
            return redirect('/tasklists')->with(
                ['alert' => 'Task list '.$id.' not found']
            );
        }
        return view('tasklists.show')->with([
            'tasklist'=>$tasklist
        ]);
    }

    public function create(Request $request)
    {
        $tasksForCheckboxes = Task::getForCheckboxes();
        return view('tasklists.create')->with([
            'tasksForCheckboxes' =>$tasksForCheckboxes,
            'tasklist' => new Tasklist(),
            'tasks' => [],
        ]);
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->task;

        if (Task::where('title', 'like', $task->title)->first()){
            return redirect('/tasklists/create')->with(
                ['alert' => 'Task name '.$task->title.' already exists. Please select it instead of adding a new tag']
            );
        }

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $title = $request->title;

        $tasklist = new Tasklist();
        $tasklist->title = $request->title;
        $tasklist->description = $request->description;
        $tasklist->save();

        if (!empty($task)){
            $tasklist->tasks()->save($task);
        }
        $tasklist->tasks()->sync($request->input('tasks'));
        $newtask = Task::where('title', 'like', $task->title)->first();
        $tasklist->tasks()->sync($newtask);
        return redirect('/tasklists/create')->with([
            'alert' => 'Your list '.$title.' was added'
        ]);
    }


    public function edit($id)
    {
        $tasklist = Tasklist::find($id);
        $tasksForCheckboxes = Task::getForCheckboxes();
        if(!$tasklist) {
            return redirect('/tasklists')->with(
                ['alert' => 'Task list '.$id.' not found']
            );
        }
        return view('tasklists.edit')->with([
        'tasklist' => $tasklist,
        'tasksForCheckboxes' =>$tasksForCheckboxes,
        'tasks' => $tasklist->tasks()->pluck('tasks.id')->toArray(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $tasklist = Tasklist::find($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $tasklist->title = $request->title;
        $tasklist->description = $request->description;

        $tasklist->tasks()->sync($request->input('tasks'));
        $tasklist->save();

        return redirect('/tasklists/'.$id)->with([
            'alert' => 'Your edits were processed'
        ]);
    }

    public function delete($id)
    {
        $tasklist = Tasklist::find($id);

        if(!$tasklist){
            return redirect('/tasklists')->with('alert', 'Task list not found');
        }

        return view('tasklists.delete')->with([ 'tasklist' => $tasklist]);
    }

    public function destroy($id)
    {
        $tasklist = Tasklist::find($id);

        $tasklist->tasks()->detach();
        $tasklist->delete();

        return redirect('/tasklists')->with([
            'alert' => 'Task list was removed'
        ]);
    }


}
