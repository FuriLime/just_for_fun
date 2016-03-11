<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->required()->unique();
            $table->string('slug')->required()->unique();
            $table->integer('event_credits')->unsigned()->default(0);
            $table->integer('download_credits')->unsigned()->default(0);
            $table->string('description')->nullable();

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
        Schema::drop('credit_packages');
    }
}
