<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'Admin' => \App\Http\Middleware\Admin::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('backup:run',['--only-files' => '','--suffix' => '_files'])
            ->weekly()->mondays()->at('03:00')
            ->description('My-project Files backup')
            ->sendOutputTo('storage/logs/backup.log')
            ->emailOutputTo('sergey.ch.gmail.com')
            ->before(function(){
                Log::info('Commencing Files Backup');
            })
            ->after(function(){
                Log::info('My-project Files backup complete');
            });

        $schedule->command('backup:run',['--only-db' => '','--suffix' => '_db'])
            ->twiceDaily(2,14)
            ->description('My-project Database backup')
            ->sendOutputTo('storage/logs/backup.log')
            ->emailOutputTo('sergey.ch.gmail.com')
            ->before(function(){
                Log::info('Commencing Database backup');
            })
            ->after(function(){
                Log::info('My-project Database backup complete');
            });
    }
}
