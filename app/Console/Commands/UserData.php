<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Event;
use DB;
use Storage;

class UserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'userdata:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'BackUp User Data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //user data backup
        $zipperUser = new \Chumper\Zipper\Zipper;
        $filesUser = glob(base_path().'/public/uploads/*');
        $zipperUser->make(base_path().'/userdata.zip')->add($filesUser);
        $filePathUser = '/ef-test-userdata/' . 'userdata';
        Storage::disk("S3_BUCKET_USERDATA")->put($filePathUser, file_get_contents('userdata.zip'));


        $this->info('done');
    }
}