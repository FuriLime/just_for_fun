<?php

use App\AccountType;
use Illuminate\Database\Seeder;

class AccountTextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $account_types = AccountType::select('id')->get();
	    $locale_array = ['en_US', 'de_DE', 'es_ES', 'ru_RU'];
	    $text_fragment_array = ['marketing.slogan.above.descriptions', 'marketing.slogan.below.descriptions', 'something.else'];


		foreach($text_fragment_array as $text_fragment)
		{
			foreach($account_types as $account_type)
			{
				foreach($locale_array as $locale)
			    {
					factory('App\AccountText', 1)->create([
						'locale' => $locale,
						'account_type_id' => $account_type->id,
						'text_fragment' => $text_fragment,
					]);
			    }
			}
		}
	}
}
