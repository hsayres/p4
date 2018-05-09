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
            ['Go to the gym', 'Eat healthy food', 'Go hiking in Marin', 'Go biking in Tahoe', 'Climb Machu Pichu', 'Meditate', 'Do yoga'];

        foreach ($tasks as $taskTitle){
            $task = new Task();
            $task->title = $taskTitle;

            $task->save();
        }
    }
}
