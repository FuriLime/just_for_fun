<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_channels', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('channel_image');
            $table->string('channel_name');
            $table->text('channel_description');
            $table->string('channel_tags');
            $table->string('channel_url');
            $table->string('permanent_url');
            $table->string('status');
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
        Schema::drop('event_channels');
    }
}
