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
    protected $signature = 'db:remove';

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
        //
        $events = Event::whereTest('1')->get();
$data_now = date('Y-m-d H:i:s');
        foreach($events as $event){
//                DB::table('events')->where('created_at', '<', $data_now)->delete();
        }
        $this->info($events[0]['created_at']);
    }
}
