<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Event;
use DB;
use Storage;
use Illuminate\Http\Request;

class BackUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backupfiles:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup Site Content';

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

        //site content backup
        $zipper = new \Chumper\Zipper\Zipper;
        $files = glob(base_path().'/public/assets/*');
        $zipper->make(base_path().'/sitecontent.zip')->add($files);
        $filePath = '/ef-test-sitecontent/' . 'sitecontent';
        Storage::disk("S3_BUCKET_SITECONTENT")->put($filePath, file_get_contents('sitecontent.zip'));
        //end

       $this->info('done');
    }
}
