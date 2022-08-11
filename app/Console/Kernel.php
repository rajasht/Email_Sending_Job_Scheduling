<?php

namespace App\Console;

use App\Jobs\SendBirthdayWishJob;
use App\Models\Customer;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $customer = Customer::inRandomOrder()->first();
        $schedule->job(new SendBirthdayWishJob($customer))->everyMinute();
        $schedule->command("queue:work --stop-when-empty")->everyMinute();
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
