<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 30);
            $table->string('description', 500);

            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->double('price_per_hour',10,3)->nullable();
            $table->integer('project_budget')->nullable()->unsigned();
            $table->integer('project_duration')->nullable()->unsigned();
            $table->integer('project_type')->unsigned();
            $table->string('filepath', 200);
            $table->integer('status_id')->unsigned();
            $table->integer('freelancer_id')->unsigned()->nullable();

            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('freelancer_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('skill_categories');
            $table->foreign('project_type')->references('id')->on('project_type');
            $table->foreign('project_duration')->references('id')->on('project_duration');
            $table->foreign('project_budget')->references('id')->on('project_budget');
            $table->foreign('status_id')->references('id')->on('project_status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project');
    }
}
