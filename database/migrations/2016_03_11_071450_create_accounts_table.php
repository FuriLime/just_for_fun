<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->required()->unique();

            $table->string('status')->nullable();               // account status
            $table->integer('account_type_id')->unsigned();     // account type
            $table->foreign('account_type_id')->references('id')->on('account_types');

            $table->string('name')->required()->unique(); // company name
            $table->string('slug')->required()->unique(); // slug for url

            $table->tinyInteger('stripe_active')->default(0);
            $table->string('stripe_id')->nullable();
            $table->string('stripe_subscription')->nullable();
            $table->string('stripe_plan', 100)->nullable();
            $table->string('last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('subscription_ends_at')->nullable();

            $table->timestamp('free_downloads_until')->nullable()->default(null);
            $table->timestamp('free_events_until')->nullable()->default(null);

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
        Schema::drop('accounts');
    }
}
