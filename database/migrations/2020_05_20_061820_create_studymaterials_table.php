<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudymaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studymaterials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('level');
            $table->string('filename');
            $table->string('subject');
            $table->bigInteger('teacher_id')->unsigned()->index()->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers')->delete('cascade');
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
        Schema::dropIfExists('studymaterials');
    }
}
