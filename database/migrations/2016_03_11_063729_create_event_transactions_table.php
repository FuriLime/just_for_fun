<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->index();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->integer('event_id')->unsigned()->nullable()->index();                   // for TRACKING -> event_id if triggered by event creation, NULL otherwise
            $table->foreign('event_id')->references('id')->on('events');                    // combines foreign key constraint but can also be NULL

            $table->integer('event_credit_id')->unsigned()->nullable()->index();            // for TRACKING -> event_credit_id if triggered by credit change, NULL otherwise
            $table->foreign('event_credit_id')->references('id')->on('event_credits');      // combines foreign key constraint but can also be NULL

            $table->string('transaction_trigger')->required();                              // Event ID, Subscription Renewal by cron etc.
            $table->integer('quantity')->required();                                        // example: -1 when creating a new event or +3 if getting new credits

            $table->integer('creating_user_id')->unsigned()->nullable();                    // for TRACKING -> user_id of user who creates the event
            $table->foreign('creating_user_id')->references('id')->on('users');             // combines foreign key constraint but can also be NULL
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
        Schema::drop('event_transactions');
    }
}
