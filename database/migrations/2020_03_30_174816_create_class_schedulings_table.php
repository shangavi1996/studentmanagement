<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSchedulingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedulings', function (Blueprint $table) {
            $table->bigIncrements('class_scheduling_id');
            $table->bigInteger('course_id');
            $table->bigInteger('level_id');
            $table->bigInteger('shift_id');
            $table->bigInteger('classroom_id');
            $table->bigInteger('batch_id');
            $table->bigInteger('day_id');
            $table->bigInteger('time_id');
            $table->bigInteger('teacher_id');
            $table->time('starttime');
            $table->time('endtime');
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_schedulings');
    }
}
