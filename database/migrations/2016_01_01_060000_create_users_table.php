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
            $table->uuid('uuid')->required()->unique();
            $table->string('email')->required()->unique();
            $table->string('nick_name')->nullable(); // e.g. John123
            $table->string('first_name')->nullable(); // e.g. John
            $table->string('last_name')->nullable(); // e.g. Doe
            $table->string('twit_nick')->nullable(); //need for auth from twitter
            $table->string('password');
            $table->boolean('verified')->default(false);
            $table->string('status')->default('Waiting for verificaiton'); // e.g. activated, blocked, waiting for verification, etc...

            $table->integer('login_count')->unsigned()->default(0);         // counts the number of logins since registration of account
            $table->timestamp('last_login')->nullable()->default(null);                    // records the last time the user was logged in UTC time

            $table->engine = 'InnoDB';
            $table->softDeletes();
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
