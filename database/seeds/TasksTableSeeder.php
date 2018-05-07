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
        $tasks =
            ['Paint the walls', 'Buy yellow paint for the walls', 'Learn object-relational mapping'];

        foreach ($tasks as $taskTitle){
            $task = new Task();
            $task->title = $taskTitle;

            $task->save();
        }
    }
}
