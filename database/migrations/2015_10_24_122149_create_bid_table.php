<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->integer('project_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->float('amount_per_hour')->nullable();
            $table->float('amount')->nullable();
            $table->integer('hours')->nullable();
            $table->integer('days')->nullable();
            $table->string('description', 700);
            $table->primary(array('project_id', 'user_id'));
            $table->foreign('project_id')->references('id')->on('project');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('bids');
    }
}
