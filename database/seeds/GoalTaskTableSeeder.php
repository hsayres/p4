<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Goal;

class GoalTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goals = [

            'House chores' => ['Paint the walls'],
            'Things to buy' => ['Buy yellow paint for the walls'],
            'Research topics' => ['Buy yellow paint for the walls', 'Learn object-relational mapping']
        ];

        foreach ($goals as $title => $tasks) {
            $goal = Goal::where('title', 'like', $title)->first();


            foreach ($tasks as $taskName){
                $task = Task::where('title', 'like', $taskName)->first();

                $goal->tasks()->save($task);
            }
        }
    }
}
