<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Event;
use DB;

class RemoveEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event_test:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove test events';

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
       DB::table('events')->where('test', '=', '1')->where(DB::raw('DATEDIFF(CURDATE(), STR_TO_DATE(`created_at`, \'%Y-%m-%d %k:%i:%s\'))'), '>=', '2')->delete();
       return 'GoGoGO';
    }
}
