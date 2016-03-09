<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_feature', function (Blueprint $table) {
            $table->integer('account_id')->required();
            $table->integer('feature_id')->required();

            $table->integer('credit_type')->unsigned();                // where does the account have this from (eg. Subscription, Bonus, Credit Package, etc.)
            $table->foreign('credit_type')->references('id')->on('credit_types');

            $table->timestamp('valid_until')->required();

            $table->primary(['account_id', 'feature_id']);
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
        Schema::drop('account_feature');
    }
}
