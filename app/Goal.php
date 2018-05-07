<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    public function tasks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

}
