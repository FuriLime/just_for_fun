<?php

use Illuminate\Database\Seeder;

class CreditTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$credit_types = [
	        ['slug' => 'subscription', 		'name' => 'Subscription', 					'description' => 'to be filled out'],
	        ['slug' => 'credit_package', 	'name' => 'Credit Package', 				'description' => 'to be filled out'],
	        ['slug' => 'referral',		 	'name' => 'Refer-a-Friend', 				'description' => 'to be filled out'],
	        ['slug' => 'improvement', 		'name' => 'Helping EventFellows improve',	'description' => 'to be filled out'],
	        ['slug' => 'service_team', 		'name' => 'Service Team',		 			'description' => 'to be filled out'],
	        ['slug' => 'bonus', 			'name' => 'Bonus',				 			'description' => 'to be filled out'],
	        ['slug' => 'special', 			'name' => 'Special',			 			'description' => 'to be filled out'],
    	];

    	foreach($credit_types as $credit_type)
    	{
    		factory('App\CreditType', 1)->create([
    			'slug' => $credit_type['slug'],
                'name' => $credit_type['name'],
    			'description' => $credit_type['description']
    		]);
    	}
    }
}
