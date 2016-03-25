<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\RemoveEvent::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('inspire')
//                 ->hourly();
        $schedule->command('event_test:remove')->everyMinute();

        $schedule->command('backup:run',['--only-files' => '','--suffix' => '_files'])
            ->weekly()->fridays()->at('08:00')
            ->description('My-project Files backup')
            ->sendOutputTo('storage/logs/backup.log')
            ->before(function(){
                Log::info('Commencing Files Backup');
            })
            ->after(function(){
                Log::info('My-project Files backup complete');
            });
    }


}
