<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('gender');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->date('dob');
            $table->Integer('user_id');
            $table->Integer('class_id');
            $table->tinyInteger('status');
            $table->softDeletes();
            $table->date('date_registered');


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
        Schema::dropIfExists('admissions');
    }
}
