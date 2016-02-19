<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function(Blueprint $table)
        {
            $table->increments('id');
	    $table->string('uuid');
            $table->string('title');
	    $table->integer('type');
            $table->text('description');
            $table->string('location');
            $table->string('url');	   
            $table->string('timezone');
            $table->string('event_zone');
	    $table->timestamp('start');
	    $table->timestamp('finish');
	    $table->integer('active');
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
        Schema::drop('events');
    }
}
