<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTeacherIdToTermId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::table('class_schedulings', function(Blueprint $table)
        {
            $table->renameColumn('teacher_id','term_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_schedulings', function(Blueprint $table)
        {
            $table->renameColumn('term_id','teacher_id');
        });
    }
}
