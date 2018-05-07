<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_task', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('task_id')->unsigned();
            $table->integer('goal_id')->unsigned();

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('goal_id')->references('id')->on('goals');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goal_task');
    }
}
