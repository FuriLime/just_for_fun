<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = [
            ['name' => 'Clean event URLs',  		'slug' => 'clean_event_url',		'description' => 'Event pages can be reached with the human readable URL'],
            ['name' => 'Use own logo',		       	'slug' => 'own_logo',				'description' => 'Account can have their own event in the header on event page'],
            ['name' => 'Customize colors',		    'slug' => 'custom_colors',			'description' => 'Account can have their own colors for the event page'],
            ['name' => 'Redirect after event',		'slug' => 'after_event_redirect',	'description' => 'Account can set a redirect where users are redirected to after the event'],
            ['name' => 'Password access EventPage',	'slug' => 'eventpage_password',		'description' => 'Account can set a password for the eventpage'],
        ];

        foreach($features as $feature)
        {
            factory('App\Feature', 1)->create(['name' => $feature['name'], 'slug' => $feature['slug'], 'description' => $feature['description']]);
        }
    }
}
