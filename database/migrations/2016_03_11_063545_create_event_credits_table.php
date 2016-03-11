<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->integer('credit_type_id')->unsigned();
            $table->foreign('credit_type_id')->references('id')->on('credit_types');

            $table->timestamp('valid_until')->required();
            $table->string('quantity')->required()->default(0);
            $table->string('comment')->nullable();

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
        Schema::drop('event_credits');
    }
}
