<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
                    // These are the only roles we need for phase 1 and 2
                    ['name' => 'Admin',                         'slug' => 'admin',            'description' => 'An Admin user has full access to the whole page'],
                    ['name' => 'Account Owner',                 'slug' => 'account_owner',    'description' => 'User owns the account'],
                    ['name' => 'User',                          'slug' => 'user',             'description' => 'With a User Role a person can use the website login area.'],

                    // These might be additional roles that get relevant later
                    ['name' => 'EventFellows Admin',            'slug' => 'eventfellows_admin',             'description' => 'not needed in phase 1 and 2'],
                    ['name' => 'EventFellows Service Team',     'slug' => 'eventfellows_service',           'description' => 'not needed in phase 1 and 2'],

                    ['name' => 'Account Manager',               'slug' => 'account_manager',                'description' => 'not needed in phase 1 and 2'],
                    ['name' => 'Account Member',                'slug' => 'account_member',                 'description' => 'not needed in phase 1 and 2'],
                    ['name' => 'Account Assistant',             'slug' => 'account_assistant',              'description' => 'not needed in phase 1 and 2'],
                    ['name' => 'Account Billing Manager',       'slug' => 'account_billing_manager',        'description' => 'not needed in phase 1 and 2'],

                    ['name' => 'Team Owner',                    'slug' => 'team_owner',                     'description' => 'not needed in phase 1 and 2'],
                    ['name' => 'Team Manager',                  'slug' => 'team_manager',                   'description' => 'not needed in phase 1 and 2'],
                    ['name' => 'Team Member',                   'slug' => 'team_member',                    'description' => 'not needed in phase 1 and 2'],
                    ['name' => 'Team Assistant',                'slug' => 'team_assistant',                 'description' => 'not needed in phase 1 and 2'],

                    ['name' => 'Event Manager',                 'slug' => 'event_manager',                  'description' => 'not needed in phase 1 and 2'],
                    ['name' => 'Event Assistant',               'slug' => 'event_assistant',                'description' => 'not needed in phase 1 and 2'],
                ];

        foreach($roles as $role)
        {
            factory('App\Role', 1)->create(['slug' => $role['slug'], 'name' => $role['name'], 'description' => $role['description']]);
        }
    }
}
