<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('bio')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('pic')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('timezone')->required();     // default timezone of user
            $table->text('about')->nullable();
            $table->string('image')->nullable();        // i.e. the name of user picture in file system/ path to user picture in file system
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_profiles');
    }
}
