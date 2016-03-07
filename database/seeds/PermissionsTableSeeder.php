<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$permissions = [
	        ['slug' => 'changePermissions', 			'name' => 'Change Permission', 			'message' => 'Message for Change Permission',	'description' => 'to be filled out'],
	        ['slug' => 'seeAllEvents', 					'name' => 'See all Events', 			'message' => 'Message for See all Events',	'description' => 'to be filled out'],
	        ['slug' => 'seeAllUsers', 					'name' => 'See all Users',				'message' => 'Message for See all Users',	'description' => 'to be filled out'],
	        ['slug' => 'seeAllCredits', 				'name' => 'See all Credits',			'message' => 'Message for See all Credit',	'description' => 'to be filled out'],
			['slug' => 'seeAllSubscriptions', 			'name' => 'See all Subscriptions', 		'message' => 'Message for See all Subscription',	'description' => 'to be filled out'],
    		['slug' => 'inviteTeamMembers',				'name' => 'Invite Team Members',		'message' => 'Message for Invite Team Membe',	'description' => 'to be filled out'],
    		['slug' => 'cancelAccount',					'name' => 'Cancel Account',				'message' => 'Message for Cancel Account',	'description' => 'to be filled out'],
    		['slug' => 'createEvent',					'name' => 'Create Event',				'message' => 'Message for Create Event',	'description' => 'to be filled out'],
    		['slug' => 'publishEvent',					'name' => 'Publish Event',				'message' => 'Message for Publish Event',	'description' => 'to be filled out'],
    		// and many more
    	];

    	$permission_types = ['canUse', 'canSee'];

    	foreach($permissions as $permission)
    	{
    		foreach($permission_types as $type)
    		{
        		factory('App\Permission', 1)->create(['type' => $type, 'slug' => $permission['slug'], 'name' => $permission['name'], 'message' => $permission['message'], 'description' => $permission['description']]);
    		}
    	}
    }
}
