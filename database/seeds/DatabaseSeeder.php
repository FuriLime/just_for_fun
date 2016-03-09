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
    public function run()           // the order of SEEDERS on this page DOES matter a lot
    {
        Model::unguard();

        $this->call('RolesTableSeeder');               // no dependancy for table seeding

        Model::reguard();
    }
}
