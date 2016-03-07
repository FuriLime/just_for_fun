<?php

use Illuminate\Database\Seeder;

class DownloadTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // free transactions due to user downloads (e.g. logged in user or other reason for free download)
      factory('App\DownloadTransaction', 10)->create([
        'quantity' => 0,
        'download_credit_id' => null,
      ]);


      // paid transactions due to user downloads
      factory('App\DownloadTransaction', 30)->create([
        'quantity' => -1,
        'downloading_user_id' => null,
        'download_credit_id' => null,
      ]);
    }
}