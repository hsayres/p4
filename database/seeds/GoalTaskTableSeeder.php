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

            'Be happy' => ['Go hiking in Marin', 'Climb Machu Pichu', 'Meditate', 'Do yoga'],
            'Be healthy' => ['Go to the gym', 'Eat healthy food', 'Go hiking in Marin', 'Go biking in Tahoe', 'Climb Machu Pichu', 'Do yoga'],
            'Explore' => ['Go hiking in Marin', 'Go biking in Tahoe', 'Climb Machu Pichu']
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
