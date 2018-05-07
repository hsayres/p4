<?php

use Illuminate\Database\Seeder;
use App\Tasklist;

class TasklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasklists = [
           ['House chores', 'Chores I need to do around the house'],
           ['Things to buy', 'A list of stuff I need to buy online or from various stores'],
            ['Research topics', 'Random, interesting things I heard about that I want to research more'],
        ];

        $count = count($tasklists);

        foreach ($tasklists as $key => $thisTasklist) {
            $tasklist = new Tasklist();

            $tasklist->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $tasklist->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $tasklist->title = $thisTasklist[0];
            $tasklist->description = $thisTasklist[1];

            $tasklist->save();
            $count--;
        }
    }
}
