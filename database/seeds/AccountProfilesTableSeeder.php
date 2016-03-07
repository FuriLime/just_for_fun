<?php

use App\User;
use App\Account;
use Illuminate\Database\Seeder;

class AccountProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$accounts = Account::all();

    	foreach($accounts as $account)			// every account has 1 profile attached to it
    	{
	    	factory('App\AccountProfile', 1)->create([
		        'account_id' => $account->id,
    		]);
    	}
    }
}
