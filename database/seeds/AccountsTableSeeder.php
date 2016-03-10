<?php

use App\User;
use App\Role;
use App\Account;
use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->shuffle();

        $user_role = Role::whereSlug('account_owner')->first();

        foreach($users as $user)
        {
            $account = factory('App\Account', 1)->create();                             // account created for each user
            $account->users()->attach($user->id, ['role_id' => $user_role->id]);        // user attached to his account with the role of "account_owner"
        }
    }
}
