<?php

use App\Account;
use App\CreditType;
use App\DownloadCredit;
use Illuminate\Database\Seeder;

class DownloadCreditsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credit_types = CreditType::select('id')->get();
        $accounts = Account::select('id')->get();

        // to have a relative number of DB entries depending on accounts so there are accounts with 0 credit and others with multiple credits
        $number_of_downloadcredits_to_create = $accounts->count() * 1 - 5;  
        
        
        for ($i=1; $i <= $number_of_downloadcredits_to_create; $i++)
        {
            factory('App\DownloadCredit', 1)->create([
                'account_id' => $account_id = $accounts->random(1)->id,
                'credit_type_id' => $credit_types->random(1)->id,
                'quantity' => $quantity = random_int(2,10),
            ]);


            $download_credit_id = DownloadCredit::select('id')->max('id');
            // Recording above credits in the Download Transactions Table with matching data, too
            factory('App\DownloadTransaction', 1)->create([
                'quantity' => $quantity,
                'transaction_trigger' => 'Credit Activation',
                'download_credit_id' => $download_credit_id,
                'account_id' => $account_id,
                'downloading_user_id' => null,
                'event_id' => null,
            ]);
        }
    }
}
