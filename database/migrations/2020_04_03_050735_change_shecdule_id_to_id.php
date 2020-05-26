<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeShecduleIdToId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_schedulings', function(Blueprint $table)
        {
            $table->renameColumn('class_scheduling_id', 'id');
        });;
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
            $table->renameColumn('id', 'class_scheduling_id');
        });
    }
}
