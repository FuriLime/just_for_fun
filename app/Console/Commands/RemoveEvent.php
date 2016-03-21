<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events;
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
        $events = Events::whereCreateAt(date(('Y-m-d H:i')))->get();

        foreach($events as $event){
            if($event->test('1')){
                DB::table('events')->where('create_at', '=', '2016-03-18 14:29:42')->delete();
            }
        }
    }
}
