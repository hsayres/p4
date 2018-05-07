<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            ['Paint the walls', 0],
            ['Buy yellow paint for the walls', 0],
            ['Learn object-relational mapping', 1],
        ];

        foreach ($tasks as $key => $thisTask) {
            $task = new Task();
            $task->title = $thisTask[0];
            $task->status = $thisTask[1];

            $task->save();
        }
    }
}
