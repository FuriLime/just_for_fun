<?php

use App\Account;
use App\Feature;
use App\CreditType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AccountFeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = Account::select('id')->get();

        foreach ($accounts as $account)
        {
            $features = Feature::select('id')->get()->random(random_int(2, 5));             // each account gets between 2 and 5 features attached

            foreach ($features as $feature)
            {
                $credit_type = CreditType::select('id')->get();

                $account->features()->attach($feature->id, ['credit_type' => $credit_type->random(1)->id, 'valid_until' => Carbon::now()->addDay(2)]);
            }
        };
    }
}
