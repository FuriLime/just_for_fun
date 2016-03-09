<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('RolesTableSeeder');
        $this->call('AccountsTableSeeder');
//        $this->call('UsersTableSeeder');
//        $this->call('UserProfilesTableSeeder');
        $this->command->info('Admin User created with username admin@admin.com and password admin');

        Model::reguard();
    }
}
