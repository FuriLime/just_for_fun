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
            //no 'user_id' on this table as this is a many-to-many relationship
            $table->string('status')->nullable();               // e.g. Active, Blocked, etc...
            $table->integer('account_type_id')->unsigned();     // i.e. account type
            $table->foreign('account_type_id')->references('id')->on('account_types');

            $table->string('name')->required()->unique(); // e.g. Acme Company Ltd.
            $table->string('slug')->required()->unique(); // e.g. acme-company

            // collumns needed for cashier - I believe these are the columns/ these come with the cashier migrations
            $table->tinyInteger('stripe_active')->default(0);
            $table->string('stripe_id')->nullable();
            $table->string('stripe_subscription')->nullable();
            $table->string('stripe_plan', 100)->nullable();
            $table->string('last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('subscription_ends_at')->nullable();

            // to grant free usage for a certain time on account level
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
