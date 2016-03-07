<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->required();
            $table->string('type')->required();     // only combination of 2 fields is unique, see at end of table definition
            $table->string('slug')->required();     // only combination of 2 fields is unique, see at end of table definition
            $table->text('message');
            $table->string('description')->nullable();

            $table->unique(['type', 'slug']);

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
        Schema::drop('permissions');
    }
}
