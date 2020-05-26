<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForiggnRelationBetwwenUserTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->index()->nullable()->change();
        
            $table->foreign('user_id')->references('id')->on('users')->delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
            Schema::table('teachers', function (Blueprint $table)
            {
                $table->dropColumn('user_id');
            });
        }
    
}
