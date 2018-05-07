<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasklist;
use App\Task;

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
            'tasksForCheckboxes' =>$tasksForCheckboxes[0],
            'tasksStatusesForCheckboxes'=>$tasksForCheckboxes[1],
            'tasklist' => new Tasklist(),
            'tasks' => [],
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $title = $request->title;

        $tasklist = new Tasklist();
        $tasklist->title = $request->title;
        $tasklist->description = $request->description;
        $tasklist->save();

        $tasklist->tasks()->sync($request->input('tasks'));

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
        'tasksForCheckboxes' =>$tasksForCheckboxes[0],
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
