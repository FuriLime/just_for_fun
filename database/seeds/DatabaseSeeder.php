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

        // Seeders that do NOT depend on another table being filled before
//        $this->call(CreditPackagesTableSeeder::class);      // no dependancy for table seeding
        $this->call(CreditTypesTableSeeder::class);         // no dependancy for table seeding
        $this->call(FeaturesTableSeeder::class);            // no dependancy for table seeding
        $this->call(PermissionsTableSeeder::class);         // no dependancy for table seeding // not needed in Phase 1 & 2
        $this->call(RolesTableSeeder::class);               // no dependancy for table seeding
        $this->call(UsersTableSeeder::class);               // no dependancy for table seeding
        

        // Seeders that DO depend on another table in the FIRST block or earlier already having data
        $this->call(AccountTypesTableSeeder::class);        // depends on table 'permissions' to already have data
        $this->call(PermissionRoleTableSeeder::class);      // depends on tables 'permissions' and 'roles' to already have data  // not needed in Phase 1 & 2
        $this->call(UserProfilesTableSeeder::class);        // depends on table 'users' to already have data

        // Seeders that DO depend on another table in the SECOND block or earlier already having data
        $this->call(AccountsTableSeeder::class);            // depends on tables 'account_types', 'users' and 'roles' to already have data
        $this->call(AccountProfilesTableSeeder::class);     // depends on table 'accounts' to already have data
        $this->call(AccountTextsTableSeeder::class);        // depends on table 'account_types' to already have data
        $this->call(EventsTableSeeder::class);              // depends on table 'accounts' to already have data


        // Seeders that DO depend on another table in the THIRD block or earlier already having data
        $this->call(AccountFeatureTableSeeder::class);      // depends on tables 'accounts', 'features' and 'credit_types' to already have data
        $this->call(AdminRolesTableSeeder::class);          // depends on tables 'accounts', 'users' and 'roles' to already have data
        $this->call(DownloadCreditsTableSeeder::class);     // depends on tables 'credit_types' and 'accounts' to already have data
        $this->call(EventCreditsTableSeeder::class);        // depends on tables 'credit_types' and 'accounts' to already have data
        $this->call(InvoiceTableSeeder::class);             // depends on table 'accounts' to already have data
        
        // Seeders that DO depend on another table in the FORTH block or earlier already having data
        $this->call(DownloadTransactionsTableSeeder::class);// depends on tables 'users', 'events' and 'download_credits' to already have data     

        Model::reguard();
    }
}
