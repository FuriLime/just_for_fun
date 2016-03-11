<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->required()->unique();
            $table->string('slug')->required()->unique();
            $table->string('default_valid_until')->nullable()->default('1 month');
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
        Schema::drop('credit_types');
    }
}
