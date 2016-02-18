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
            $table->string('first_name')->nullable();
	    $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
 	    $table->boolean('isActivate')->default(false);
	    $table->text('bio')->nullable();
	    $table->string('gender')->nullable();
	    $table->date('dob')->nullable();
            $table->string('pic')->nullable();
	    $table->string('typeacc')->nullable();
	    $table->string('country')->nullable();
	    $table->string('state')->nullable();
	    $table->string('city')->nullable();
	    $table->string('address')->nullable();
	    $table->string('timezone')->nullable();
	    $table->timestamp('last_login')->nullable();
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
        Schema::drop('users');
    }
}
