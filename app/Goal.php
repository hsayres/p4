<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    public function tasks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $goals = self::orderBy('title')->get();

        $goalsForCheckboxes = [];

        foreach($goals as $goal){
            $goalsForCheckboxes[$goal->id] = $goal->title;
        }

        return $goalsForCheckboxes;
    }
}
