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
           ['Be happy', 'Practice ways to improve my mental health'],
           ['Be healthy', 'Practice ways to improve my physical health'],
            ['Explore', 'Find new places to adventure'],
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
