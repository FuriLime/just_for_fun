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
        \App\Console\Commands\RemoveEvent::class,
        \App\Console\Commands\BackUp::class,
        \App\Console\Commands\UserData::class,
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

        //remove test events oldest then 2 days
        $schedule->command('event_test:remove')
            ->description('Remove old events')
            ->everyMinute()->when(function () {
                return "Remove Done";
            });

        //backup every day at 3:00
       $schedule->command('backup:run')->dailyAt('03:00')->when(function () {
            return "DOneDDDDD";
        });
//
//        $schedule->command('backupfiles:run')->weekly()->mondays()->at('03:00')->when(function () {
//            return "DOneDDDDD";
//        });
//
//        $schedule->command('userdata:run')->weekly()->mondays()->at('03:00')->when(function () {
//            return "DOneDDDDD";
//        });

    }

}
