<?php

use App\Permission;
use App\AccountType;
use Illuminate\Database\Seeder;

class AccountTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$account_types = [
	        ['slug' => 'free', 				'name' => 'Free', 				'event_credits' => 3,      'download_credits' => 50,       'description_length' => 500],
	        ['slug' => 'lite', 				'name' => 'Lite', 				'event_credits' => 5,      'download_credits' => 100,      'description_length' => 500],
	        ['slug' => 'standard',		 	'name' => 'Standard', 			'event_credits' => 10,     'download_credits' => 200,      'description_length' => 500],
	        ['slug' => 'professional', 		'name' => 'Professional',		'event_credits' => 20,     'download_credits' => 500,      'description_length' => 500],

	        ['slug' => 'startup', 			'name' => 'Startup',			'event_credits' => 10,      'download_credits' => 50,      'description_length' => 500],
	        ['slug' => 'sme', 				'name' => 'SME',				'event_credits' => 20,      'download_credits' => 50,      'description_length' => 500],
	        ['slug' => 'mid_size', 			'name' => 'Mid Size',			'event_credits' => 45,      'download_credits' => 50,      'description_length' => 500],
            ['slug' => 'enterprise',        'name' => 'Enterprise',         'event_credits' => 100,     'download_credits' => 50,      'description_length' => 500],
	        
            ['slug' => 'agency', 		    'name' => 'Agency',			    'event_credits' => 20,      'download_credits' => 50,      'description_length' => 500],
    	];

    	foreach($account_types as $account_type)
    	{
    		factory('App\AccountType', 1)->create([
                'name' => $account_type['name'],
                'slug' => $account_type['slug'],
                'event_credits' => $account_type['event_credits'],
                'download_credits' => $account_type['download_credits'],
    			'description_length' => $account_type['description_length'],
    		]);


            $current_account_type = AccountType::select('id')->orderBy('id', 'dec')->first();
            $permissions = Permission::select('id')->get()->random(random_int(2, 5));             // each account type gets between 2 and 5 permissions attached

            foreach ($permissions as $permission)
            {
                $current_account_type->permissions()->attach($permission->id);
            };


    	}
    }
}
