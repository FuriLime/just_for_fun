<?php

use App\Event;
use App\Account;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = Account::select('id')->get();

        // to have a relative number of events depending on accounts so there are accounts with 0 events and others with multiple events
        $number_of_events_to_create = $accounts->count() * 2;  
        

        for ($i=1; $i <= $number_of_events_to_create; $i++)
        {
            $random_account = $accounts->random(1);
        
            factory('App\Event', 1)->create([
                'account_id' => $account_id = $random_account->id,
                'author_id' => $random_account->users->random(1)->id,
                'editor_id' => $random_account->users->random(1)->id,
            ]);

            // Recording above event in the Event Transactions Table with matching data, too
            $event_id = Event::select('id')->max('id');
            factory('App\EventTransaction', 1)->create([
                'quantity' => -1,
                'transaction_trigger' => 'Event Creation',
                'event_credit_id' => null,
                'account_id' => $account_id,
                'creating_user_id' => $random_account->users->random(1)->id,
                'event_id' => $event_id,
            ]);
        }
        
    }
}
