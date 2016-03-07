<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory('App\User', 1)->create([
            'nick_name' => 'kai',
	        'email' => 'kai@twofy.de' ,
	        'password' => bcrypt('test12'),
    	]);

        factory('App\User', 1)->create([
            'nick_name' => 'sergey',
            'email' => 'sergey@twofy.com',
            'password' => bcrypt('test12'),
        ]);

        factory('App\User', 1)->create([
	        'nick_name' => 'serghii',
	        'email' => 'serhii@twofy.com',
	        'password' => bcrypt('test12'),
    	]);

		factory('App\User', 18)->create();


        // users to activate
        $users_to_activate = User::select('id')->get(); // all users are activated
        
        foreach($users_to_activate as $user_to_activate)
        {
            $user = Sentinel::findById($user_to_activate->id);
            $activation = Activation::create($user);
            Activation::complete($user, $activation->code);
        }
    }
}
