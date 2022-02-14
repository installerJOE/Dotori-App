<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Package;
use App\Models\SubscribedUser;
use App\Jobs\SettleDailyPayment;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    //  ->weekdays();
    //  ->runInBackground();
    // ->evenInMaintenanceMode()
    // ->dailyAt('13:00');
    protected function schedule(Schedule $schedule)
    {
        // check day of the week and validate payment 
        $timestamp = time();
        $day = date('l', $timestamp);
        if($day !== "Saturday" || $day !== "Sunday"){
            //get all subscribed users and their ranks and update their balance with the daily bonus
            $subscribers = SubscribedUser::all();
            $schedule->job(new SettleDailyPayment($subscribers))->dailyAt('23:45');
        }

        $schedule->command('queue:work')->hourly();
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
