<?php

use App\User;
use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = User::all();

    	foreach($users as $user)
    	{
	    	factory('App\UserProfile', 1)->create([           //every user has 1 profile attached to him
		        'user_id' => $user->id,
    		]);
    	}
    }
}
