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
        'App\Console\Commands\CheckMaturityCommand',
        'App\Console\Commands\CheckCommitmentCommand',
        'App\Console\Commands\BlockUserCommand',
        'App\Console\Commands\CheckWithdrawalCommand',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('check:maturity')->hourly();
//        $schedule->command('check:commitment')->hourly();
//        $schedule->command('block:user')->everyThirtyMinutes();
//        $schedule->command('check:withdrawal')->everyThirtyMinutes();


        $schedule->command('check:maturity')->everyMinute()->withoutOverlapping();
        $schedule->command('check:commitment')->everyMinute()->withoutOverlapping();
        $schedule->command('block:user')->everyMinute()->withoutOverlapping();
        $schedule->command('check:withdrawal')->everyMinute()->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
