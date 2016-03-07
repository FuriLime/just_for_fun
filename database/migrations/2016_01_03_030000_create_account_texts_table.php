<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('locale')->required();
            $table->string('text_fragment')->required();
            $table->integer('account_type_id')->unsigned();
            $table->foreign('account_type_id')->references('id')->on('account_types');

            $table->unique(['locale', 'text_fragment', 'account_type_id']);
            $table->longtext('text')->nullable();           // can also contain html code
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
        Schema::drop('account_texts');
    }
}
