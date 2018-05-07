<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    public function goals()
    {
        return $this->belongsToMany('App\Goal')->withTimestamps();
    }


    public static function getForCheckboxes()
    {
        $tasks = self::orderBy('title')->get();

        $tasksForCheckboxes = [];

        foreach($tasks as $task){
            $tasksForCheckboxes[$task->id] = $task->title;
        }

        return $tasksForCheckboxes;
    }
}
