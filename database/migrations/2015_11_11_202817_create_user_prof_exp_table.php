<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfExpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_prof_exp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('company');
            $table->dateTime('startDate');
            $table->dateTime('toDate');
            $table->string('description');
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
        Schema::drop('user_prof_exp');
    }
}
