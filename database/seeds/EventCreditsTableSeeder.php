<?php

use App\Account;
use App\CreditType;
use App\EventCredit;
use Illuminate\Database\Seeder;

class EventCreditsTableSeeder extends Seeder
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
        $number_of_eventcredits_to_create = $accounts->count() * 1 - 5;  
        
        for ($i=1; $i <= $number_of_eventcredits_to_create; $i++)
        {
            factory('App\EventCredit', 1)->create([
                'account_id' => $account_id = $accounts->random(1)->id,
                'credit_type_id' => $credit_types->random(1)->id,
                'quantity' => $quantity = random_int(2,5),
            ]);


            // Recording above credits in the Event Transactions Table with matching data, too
            $event_credit_id = EventCredit::select('id')->max('id');
            factory('App\EventTransaction', 1)->create([
                'quantity' => $quantity,
                'transaction_trigger' => 'Credit Activation',
                'event_credit_id' => $event_credit_id,
                'account_id' => $account_id,
                'creating_user_id' => null,
                'event_id' => null,
            ]);
        }
    }
}
