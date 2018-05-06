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
           ['House chores', 'Chores I need to do around the house', 'Paint the walls', 0, 'Fix the heater', 1, 'Mop the floor', 0],
           ['Things to buy', 'A list of stuff I need to buy online or from various stores', 'Yellow paint for the walls', 0, 'Triple A batteries', 0, 'A carry-on suitcase', 0],
            ['Research topics', 'Random, interesting things I heard about that I want to research more', 'Object-relational mapping', 0, 'Black holes', 0, 'Cyrptocurrency security', 0],
        ];

        $count = count($tasklists);

        foreach ($tasklists as $key => $thisTasklist) {
            $tasklist = new Tasklist();

            $tasklist->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $tasklist->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $tasklist->title = $thisTasklist[0];
            $tasklist->description = $thisTasklist[1];
            $tasklist->task_1_title = $thisTasklist[2];
            $tasklist->task_1_status = $thisTasklist[3];
            $tasklist->task_2_title = $thisTasklist[4];
            $tasklist->task_2_status = $thisTasklist[5];
            $tasklist->task_3_title = $thisTasklist[6];
            $tasklist->task_3_status = $thisTasklist[7];

            $tasklist->save();
            $count--;
        }
    }
}
