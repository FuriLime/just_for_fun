<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadTrasactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('download_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->index();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->integer('event_id')->unsigned()->nullable()->index();                        // for TRACKING -> event_id if triggered by event download, NULL otherwise
            $table->foreign('event_id')->references('id')->on('events');                         // combines foreign key constraint but can also be NULL

            $table->integer('download_credit_id')->unsigned()->nullable()->index();              // for TRACKING -> download_credit_id if triggered by credit change, NULL otherwise
            $table->foreign('download_credit_id')->references('id')->on('download_credits');     // combines foreign key constraint but can also be NULL

            $table->string('transaction_trigger')->required();              // Download, Subscription Renewal, Bonus Credits
            $table->integer('quantity')->required();                        // example -1 when downloading an event or +50 if gettting new credits from subscription renewal

            $table->integer('downloading_user_id')->unsigned()->nullable()->index();         // for TRACKING -> user_id if loggeg in, NULL if not detected
            $table->foreign('downloading_user_id')->references('id')->on('users');           // combines foreign key constraint but can also be NULL

            $table->string('calendartype')->nullable();                     // for TRACKING -> Outlook, Yahoo, Gmail ...
            $table->string('request_source')->nullable();                   // for TRACKING -> e.g. MyPersonalBLog.com/user34/post1 from referrer URL from where the link is embedded
            $table->string('request_source_full')->nullable();              // for TRACKING -> e.g. MyPersonalBLog.com from referrer URL from where the link is embedded
            $table->string('request_ip')->nullable();                       // for TRACKING -> IP address of downloading user browser
            $table->text('system-info')->nullable()->default(null);         // for TRACKING -> dump info about downloading system like browser, browserversion, operating system etc
            $table->string('campaign')->nullable();                         // for TRACKING -> Newsletter, Facebook -> showing through which channel this has been shared
            $table->string('category')->nullable();                         // for TRACKING -> Can be set by user later to seprate tracking
            $table->string('tags')->nullable();                             // for TRACKING -> Can be set by user later to seprate tracking
            // some more tracking dimensions to be added here later
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
        Schema::drop('download_transactions');
    }
}
