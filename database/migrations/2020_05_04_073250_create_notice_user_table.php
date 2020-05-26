<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('notice_id')->unsigned()->index()->nullable();
            $table->foreign('notice_id')->references('id')->on('notice')->delete('cascade');
            $table->integer('read_by');
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
        Schema::dropIfExists('notice_user');
    }
}
