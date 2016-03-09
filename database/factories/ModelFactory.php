<?php

use App\User;
use App\Event;
use App\Account;
use App\Invoice;
use App\CreditType;
use App\EventCredit;
use App\AccountType;
use Ramsey\Uuid\Uuid;
use App\DownloadCredit;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


//$factory->define(App\Account::class, function (Faker\Generator $faker) {
//    $status_array = ['Active', 'Active', 'Active', 'Active', 'Blocked']; // multiple entries to have higher likelyhood for some entries
//    $account_types = AccountType::select('id')->get();
//
//    return [
//        'name' => $faker->company . random_int(1, 99),      // contains a random number to avoid duplicated during seeder run
//        'slug' => $faker->slug,
//        'status' => $status_array[array_rand($status_array)],
//        'account_type_id' => $account_types->random(1)->id,
//
//        'stripe_active' => 0,               //can be changed when stripe setup is complete
//        'stripe_id' => null,                //can be changed when stripe setup is complete
//        'stripe_subscription' => null,      //can be changed when stripe setup is complete
//        'stripe_plan' => null,              //can be changed when stripe setup is complete
//        'last_four' => null,                //can be changed when stripe setup is complete
//        'trial_ends_at' => null,            //can be changed when stripe setup is complete
//        'subscription_ends_at' => null,     //can be changed when stripe setup is complete
//
//        'free_downloads_until' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = '+2 months'),
//        'free_events_until' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = '+2 months'),
//    ];
//});


//$factory->define(App\AccountProfile::class, function (Faker\Generator $faker) {
//    return [
//        'timezone' => $faker->timezone,
//        'about' => $faker->paragraph,
//    ];
//});


//$factory->define(App\AccountText::class, function (Faker\Generator $faker) {
//    return [
//        'text' => $faker->sentence(11),
//    ];
//});


//$factory->define(App\AccountType::class, function (Faker\Generator $faker) {
//    return [
//        // all comes from manual settings
//    ];
//});
//
//
//$factory->define(App\CreditPackage::class, function (Faker\Generator $faker) {
//    return [
//        // empty as everything gets set manually in respective Table Seeder
//    ];
//});
//
//
//$factory->define(App\CreditType::class, function (Faker\Generator $faker) {
//    return [
//        // all comes from manual settings
//    ];
//});
//
//
//$factory->define(App\DownloadCredit::class, function (Faker\Generator $faker) {
//    return [
//        'valid_until' => $faker->dateTimeBetween($startDate = '-5 weeks', $endDate = '+16 months'),
//        'comment' => $faker->sentence(6),
//        'created_at' => $faker->dateTimeBetween($startDate = '-15 weeks', $endDate = '-5 weeks'),
//    ];
//});
//
//
//$factory->define(App\DownloadTransaction::class, function (Faker\Generator $faker) {
//    $calendartype_array = array_column(\Config::get('global_variable.calendartypes'), 'name');
//    // $test_array = [null, null, null, $faker->dateTimeBetween($startDate = '-2 months', $endDate = '+3 days')]; // multiple entries to have higher likelyhood for some entries
//    // $free_downloads_array = [null, null, null, $faker->dateTimeBetween($startDate = '-4 weeks', $endDate = '+2 days')]; // multiple entries to have higher likelyhood for some entries
//    // $accounts = Account::select('id')->get();
//    $users = User::select('id')->get();
//    $events = Event::select('id')->get();
//    $download_credits = DownloadCredit::select('id')->get();
//
//
//    return [                // Download credit id does not go to right account id so far.
//
//        // only exaclty one of following two fields has a value, other must be NULL!!!
//        'event_id' => $event_id = $events->random(1)->id,                                       // overwritten in TableSeeder File in cases where it should be null
//        'download_credit_id' => $download_credits->random(1)->id,         // overwritten in TableSeeder File in cases where it should be null
//        'transaction_trigger' => 'Event Download',                                              // handled in TableSeeder File
//
//        'account_id' => Event::whereId($event_id)->first()->account_id,     // handled in TableSeeder File
//        'downloading_user_id' => $user_id = $users->random(1)->id,                // handled in TableSeeder File
//
//        'calendartype' => $calendartype_array[array_rand($calendartype_array)],
//        'request_source' => $url = 'http://www.' . $faker->domainName,
//        'request_source_full' => $url . '/' . $faker->slug,
//        'request_ip' => $faker->ipv4,
//        'system-info' => $faker->userAgent,
//        'campaign' => 'to be filled later',
//        'category' => 'to be filled later',
//        'tags' => 'to be filled later',
//
//        'created_at' => $faker->dateTimeBetween($startDate = '-15 weeks', $endDate = 'now'),
//        'comment' => $faker->sentence(5),
//    ];
//});
//
//
//$factory->define(App\Event::class, function (Faker\Generator $faker) {
//    $status_array = ['Draft', 'Published', 'Published', 'Published']; // multiple entries to have higher likelyhood for some entries
//    $test_array = [null, null, null, $faker->dateTimeBetween($startDate = '-2 months', $endDate = '+3 days')]; // multiple entries to have higher likelyhood for some entries
//    $free_downloads_array = [null, null, null, $faker->dateTimeBetween($startDate = '-4 weeks', $endDate = '+2 days')]; // multiple entries to have higher likelyhood for some entries
//    $accounts = Account::select('id')->get();
//
//    return [
//        'account_id' => 7,//$account = $accounts->random(1)->id,
//        'author_id' => 7,       //should be random for every created item
//        'editor_id' => 7,       //should be random for every created item
//
//        'title' => $faker->sentence(6),
//        'description' => $faker->paragraph,
//        'location' => $faker->address,
//        'lat' => $faker->latitude($min = -60, $max = 60),
//        'lng' => $faker->longitude($min = -180, $max = 180) ,
//
//        'permanent_url' => '/' . (string)Uuid::uuid4() . ' - should be UUID of event',
//        'readable_url' => '/' . $faker->slug,
//
//        'event_url' => 'may later be entered by user for online events',
//
//        'timezone' => $faker->timezone,
//        'start' => $start = $faker->dateTimeBetween($startDate = '-2 months', $endDate = '+16 months'),
//        'finish' => $start, //has to be changed to later time
//
//        'type' => '',
//        'test_until' => $test_array[array_rand($test_array)],
//        // event collumns to be added in future here
//
//        'free_downloads_until' => $free_downloads_array[array_rand($free_downloads_array)],
//
//        'status' => $status_array[array_rand($status_array)],
//    ];
//});
//
//
//$factory->define(App\EventCredit::class, function (Faker\Generator $faker) {
//    $credit_types = CreditType::select('id')->get();;
//    $accounts = Account::select('id')->get();
//
//    return [
//        'account_id' => $accounts->random(1)->id,
//        'credit_type_id' => $credit_types->random(1)->id,
//        'valid_until' => $faker->dateTimeBetween($startDate = '-5 weeks', $endDate = '+16 months'),
//        'quantity' => random_int(0,6),
//        'comment' => $faker->sentence(6),
//        'created_at' => $faker->dateTimeBetween($startDate = '-15 weeks', $endDate = '-5 weeks'),
//    ];
//});
//
//$factory->define(App\EventTransaction::class, function (Faker\Generator $faker) {
//    return [
//        'comment' => $faker->sentence(8),
//        'created_at' => $faker->dateTimeBetween($startDate = '-15 weeks', $endDate = 'now'),
//        // everything else is triggered during event creation or during event credit creation
//    ];
//});
//
//
//$factory->define(App\Feature::class, function (Faker\Generator $faker) {
//    return [
//        // empty as everything gets set manually in respective Table Seeder
//    ];
//});
//
//
//$factory->define(App\Invoice::class, function (Faker\Generator $faker) {
//    //Calulating a random invoice number with a two digit checksum - has to be changed in real life, just for table seeding
//    $invoice6digits = str_pad(Invoice::select('id')->max('id') + 1, 6, '0', STR_PAD_LEFT);
//    $invoice_number = date('ym') . '-' . substr($invoice6digits, 0, 3) .'-' . substr($invoice6digits, 3, 3) . '-' . random_int(10, 99);
//
//    $accounts = Account::where('account_type_id', '<>', 1)->select('id')->get(); //only accounts that do not have the free plan
//    $account = $accounts->random(1); // to use same random account for name and id below
//
//    return [
//        'invoice_number' => $invoice_number,
//        'invoice_date' => $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now'),
//        'storage_url' => strtolower('/' . $invoice_number . '_' . 'Invoice_EventFellows.pdf'),
//
//        'invoice_type' => 'Invoice',
//        'country_code' => $faker->countryCode,
//        'account_id' => $account->id,
//        'amount' => random_int(7, 150) * 100,                                                       // prices stored in cents / stripe also does it this way
//        'payment_provider_reference' => 'in_' . substr(md5(random_int(1000, 10000000)),0 ,24),      // just a random invoice numer in stripe format
//    ];
//});
//
//
//$factory->define(App\Permission::class, function (Faker\Generator $faker) {
//    return [
//        // empty as everything gets set manually in respective Table Seeder
//    ];
//});
//
//
//$factory->define(App\Role::class, function (Faker\Generator $faker) {
//    return [
//        // empty as everything gets set manually in respective Table Seeder
//    ];
//});


$factory->define(App\User::class, function (Faker\Generator $faker) {
    $status_array = ['activated', 'activated', 'activated', 'blocked', 'waiting for verification'];

    return [
        // 'id' => \Uuid::generate(4),  // this is not needed if the Trait for UUID is used in model
        'nick_name' => $faker->userName,
        'first_name' => $firstname = $faker->firstname,
        'last_name' => $lastname = $faker->lastname,
        'email' => $firstname . '.' . $lastname . '@' . $faker->safeEmailDomain,
        'password' => bcrypt(str_random(10)),
        'login_count' => random_int(0, 100),
        'isActive' => random_int(0, 1),
        'status' => $status_array[array_rand($status_array)],
        'last_login' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
    ];
});


$factory->define(App\UserProfile::class, function (Faker\Generator $faker) {
    return [
        'timezone' => $faker->timezone,
        'about' => $faker->paragraph,
    ];
});
