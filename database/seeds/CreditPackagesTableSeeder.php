<?php

use Illuminate\Database\Seeder;

class CreditPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credit_packages = [
            ['name' => '100 Credits',     'slug' => '100downloads',   'event_credits' => 0,   'download_credits' => 100,        'description' => 'Credits are valid for 12 months'],
            ['name' => '250 Credits',     'slug' => '250downloads',   'event_credits' => 0,   'download_credits' => 250,        'description' => 'Credits are valid for 12 months'],
            ['name' => '1000 Credits',     'slug' => '1000downloads',   'event_credits' => 0,   'download_credits' => 1000,     'description' => 'Credits are valid for 12 months'],

        ];

    	foreach($credit_packages as $credit_package)
    	{
    		factory('App\CreditPackage', 1)->create([
                'name' => $credit_package['name'],
                'slug' => $credit_package['slug'],
                'event_credits' => $credit_package['event_credits'],
                'download_credits' => $credit_package['download_credits'],
    			'description' => $credit_package['description'],
    		]);
    	}
    }
}
