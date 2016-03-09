<?php

use App\Role;
use Carbon\Carbon;
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_permissions = [
            ['slug' => 'eventfellows_admin',      	    'type' => 'canSee',                'permission' => 'seeAllEvents'],
            ['slug' => 'eventfellows_admin',         	'type' => 'canUse',                'permission' => 'seeAllEvents'],
            ['slug' => 'eventfellows_admin',      	    'type' => 'canSee',                'permission' => 'seeAllUsers'],
            ['slug' => 'eventfellows_admin',         	'type' => 'canUse',                'permission' => 'seeAllUsers'],
            ['slug' => 'eventfellows_admin',      	    'type' => 'canSee',                'permission' => 'seeAllCredits'],
            ['slug' => 'eventfellows_admin',         	'type' => 'canUse',                'permission' => 'seeAllCredits'],
            ['slug' => 'eventfellows_admin',      	    'type' => 'canSee',                'permission' => 'publishEvent'],
            ['slug' => 'eventfellows_admin',      	    'type' => 'canUse',                'permission' => 'publishEvent'],
            ['slug' => 'eventfellows_admin',      	    'type' => 'canSee',                'permission' => 'createEvent'],
            ['slug' => 'eventfellows_admin',      	    'type' => 'canUse',                'permission' => 'createEvent'],
            ['slug' => 'eventfellows_admin',      	    'type' => 'canSee',                'permission' => 'cancelAccount'],
            ['slug' => 'eventfellows_admin',      	    'type' => 'canUse',                'permission' => 'cancelAccount'],
            ['slug' => 'account_owner',		      	    'type' => 'canSee',                'permission' => 'publishEvent'],
            ['slug' => 'account_owner',		      	    'type' => 'canUse',                'permission' => 'publishEvent'],
            ['slug' => 'account_owner',		      	    'type' => 'canSee',                'permission' => 'createEvent'],
            ['slug' => 'account_owner',		      	    'type' => 'canUse',                'permission' => 'createEvent'],
            ['slug' => 'account_owner',		      	    'type' => 'canSee',                'permission' => 'cancelAccount'],
            ['slug' => 'account_owner',		      	    'type' => 'canUse',                'permission' => 'cancelAccount'],
        ];

        foreach($role_permissions as $permission) 
        {
            $role_id = Role::where('slug', $permission['slug'])->first()->id;
            
            $permission_id = Permission::where('type', $permission['type'])->where('slug', $permission['permission'])->first()->id;

            \DB::table('permission_role')->insert([['role_id' => $role_id, 'permission_id' => $permission_id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]]);
        }
    }
}
