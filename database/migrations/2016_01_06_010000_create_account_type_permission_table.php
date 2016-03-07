<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTypePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_type_permission', function (Blueprint $table) {
            $table->integer('account_type_id')->unsigned();
            $table->integer('permission_id')->unsigned();

            $table->primary(['account_type_id', 'permission_id']);
            $table->engine = 'InnoDB';
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
        Schema::drop('account_type_permission');
    }
}
