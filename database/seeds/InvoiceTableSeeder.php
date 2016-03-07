<?php

use App\Account;
use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // to have a relative number of DB entries depending on accounts so there are accounts with 0 invoices and others with multiple invoices
        $accounts = Account::where('account_type_id', '<>', 1)->select('id')->get(); //only accounts that do not have the free plan
        $number_of_invoices_to_create = $accounts->count() * 3;  

        for ($i=1; $i <= $number_of_invoices_to_create; $i++)
        {
            factory('App\Invoice', 1)->create();
		}
    }
}
