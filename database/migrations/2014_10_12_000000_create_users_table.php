<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('user_type_id')->unsigned();
            $table->string('job_title', 100)->nullable();
            $table->string('user_description', 250)->nullable();
            $table->integer('recommendations');
            $table->string('image_url', 500);
            $table->double('balance',10,3);

            //rating freelancer πεδία
            $table->integer('rate_quality_of_work')->default(0);
            $table->integer('rate_communication')->default(0);
            $table->integer('rate_worked_again')->default(0);
            $table->integer('rate_consistent')->default(0);


            //rating εργοδότη πεδία
            $table->integer('emp_rate_payment_validity')->default(0);
            $table->integer('emp_rate_communication')->default(0);
            $table->integer('emp_rate_worked_again')->default(0);
            $table->integer('emp_rate_consistent')->default(0);


            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function ($table) {

            $table->foreign('user_type_id')->references('id')->on('users_type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
