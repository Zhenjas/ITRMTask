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
            $table->string('forename');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('dob', 10);
            $table->enum('gender', array('Male','Female','Not specified'));
            $table->string('town');
            $table->string('county')->nullable();
            $table->string('address_one');
            $table->string('address_two')->nullable();
            $table->string('country');
            $table->string('post_code', 10);
            $table->string('from_date');
            $table->string('until_date');
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
