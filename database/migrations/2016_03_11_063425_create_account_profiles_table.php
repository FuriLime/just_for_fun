<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->string('timezone')->required();     //->default('UTC'); // default timezone of account
            $table->text('about')->nullable();
            $table->string('image')->nullable(); // e.g. a company logo
            $table->string('homepage')->nullable(); // e.g. a www.acme.com

            $table->timestamps();
            $table->engine = 'InnoDB';

            // relationship needed to accounts as one-to-one
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('account_profiles');
    }
}
