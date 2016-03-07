<?php


use App\User;
use App\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_roles = [
            ['name' => 'kai',       'roles' => ['admin']], // 'eventfellows_admin', 'eventfellows_service', 'account_owner']],
            ['name' => 'sergey',    'roles' => ['admin']], // 'account_owner']],
            ['name' => 'serghii',   'roles' => ['admin']], // 'account_assistant']],
        ];

        foreach($user_roles as $user_role) 
        {
            foreach($user_role['roles'] as $role)
            {
                $user = User::where('nick_name', $user_role['name'])->first();
                
                $role = Role::where('slug', $role)->first();

                $user->roles()->attach($role->id, ['account_id' => $user->accounts->random(1)->id]);
            }
        }
    }
}