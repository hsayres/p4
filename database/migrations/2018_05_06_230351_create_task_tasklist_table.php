<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTasklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_tasklist', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('task_id')->unsigned();
            $table->integer('tasklist_id')->unsigned();

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('tasklist_id')->references('id')->on('tasklists');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_tasklist');
    }
}
