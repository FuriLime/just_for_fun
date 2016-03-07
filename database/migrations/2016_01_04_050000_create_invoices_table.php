<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts');

            $table->string('country_code')->required();                         // 2-digit country code, will be detected during payment process
            $table->string('invoice_number')->required()->unique();             // invoice in specific format that is legally required (e.g. yymm-NNN-NNN-CC) -> where yymm is Year/Month, N is ID on this table as 6 digits, CC is checksum after modulo 11 method (ask Kai about it)

            $table->timestamp('invoice_date')->required();                      // date that is printed on the invoice in format 2016-07-25
            
            // path to where the pdf is stored / or better just sub-path of /invoices/{account_uuid}/{invoice_number_name.pdf}
            $table->string('storage_url')->required();                          
            
            $table->string('invoice_type')->nullable();                         // invoice or refund
            $table->string('payment_provider_reference')->required()->unique(); // stripe invoice id
            $table->integer('amount')->required();
            $table->integer('tax_rate')->required();                            // will be detected during payment process
            $table->integer('b2b_b2c')->required();                             // will be detected during payment process
            $table->integer('taxamo_id');                                       // will be detected during payment process
            // here will be more fields from payment process be required

            $table->string('currency_code')->required()->default('EUR');

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
        Schema::drop('invoices');
    }
}
