<?php

use Illuminate\Database\Seeder;
use App\Goal;

class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goals = [
           ['House chores', 'Chores I need to do around the house'],
           ['Things to buy', 'A list of stuff I need to buy online or from various stores'],
            ['Research topics', 'Random, interesting things I heard about that I want to research more'],
        ];

        $count = count($goals);

        foreach ($goals as $key => $thisGoal) {
            $goal = new Goal();

            $goal->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $goal->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $goal->title = $thisGoal[0];
            $goal->description = $thisGoal[1];

            $goal->save();
            $count--;
        }
    }
}
