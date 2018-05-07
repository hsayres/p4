<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Tasklist;

class TaskTasklistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasklists = [

            'House chores' => ['Paint the walls'],
            'Things to buy' => ['Buy yellow paint for the walls'],
            'Research topics' => ['Buy yellow paint for the walls', 'Learn object-relational mapping']
        ];

        foreach ($tasklists as $title => $tasks) {
            $tasklist = Tasklist::where('title', 'like', $title)->first();


            foreach ($tasks as $taskName){
                $task = Task::where('title', 'like', $taskName)->first();

                $tasklist->tasks()->save($task);
            }
        }
    }
}
