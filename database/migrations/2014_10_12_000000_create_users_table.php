<?php

use Illuminate\Support\Facades\Schema;
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
            $table->enum('title', array('Mr','Mrs','Miss','Ms','Dr'));
            $table->string('forename', 255);
            $table->string('surname', 255);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('dob', 10);
            $table->enum('gender', array('Male','Female','Not specified'));
            $table->string('town', 255);
            $table->string('county', 255)->nullable();
            $table->string('address_one', 255);
            $table->string('address_two', 255)->nullable();
            $table->string('country', 255);
            $table->string('post_code', 10);
            $table->string('from_date', 255);
            $table->string('until_date', 255);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
