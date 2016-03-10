<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique()->index();           // $table->string('uuid');  // this was the wrong way round, field type must be uuid, too

            //account the event belongs to
            $table->integer('account_id')->unsigned()->index();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            // user who has initially created the event
            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')->references('id')->on('users');      // NO "onDelete('cascade')" as the event belongs to the account, not the user

            // user who has edited the event last
            $table->integer('editor_id')->unsigned()->nullable();
            $table->foreign('editor_id')->references('id')->on('users');      // NO "onDelete('cascade')" as the event belongs to the account, not the user

            $table->string('title')->required();
            $table->text('description')->nullable();
            $table->string('permanent_url')->required()->unique();    // this is the URL based on the UUID
            $table->string('readable_url')->required()->unique();     // this is a human-friendly readable URL based on the title of the event like /my-great-bbq-party-at-home

            // infos related to location of event
            $table->string('location')->nullable();         // MAYBE we should save Street, City, ... in separate files?
            $table->string('event_url')->nullable();        // only needed later     
            $table->string('lat')->nullable();              // latitude of address so we do not have to qurey the GeoId for every user request to show the map
            $table->string('lng')->nullable();              // longitude of address so we do not have to qurey the GeoId for every user request to show the map
                                                            // MAYBE more information needed here to store the map data to DB

            // infos related to timing of event
            $table->string('timezone')->required();
            $table->timestamp('start')->required();
            $table->timestamp('finish')->required();

            $table->string('type')->nullable();                                         // online, offline, etc
            $table->timestamp('test_until')->nullable()->default(null);                 // timestamp limits the visibility of the event to +2 days from now
            $table->timestamp('free_downloads_until')->nullable()->default(null);       // to grant free usage for a certain time on event level

            // more event columns to be added in future here
            // more event columns to be added in future here
            // more event columns to be added in future here
            // more event columns to be added in future here
            // more event columns to be added in future here
            // more event columns to be added in future here
            // more event columns to be added in future here

            $table->string('status')->default('Draft');

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
        Schema::drop('events');
    }
}
