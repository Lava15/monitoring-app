<?php

namespace App\Console;

use App\Console\Commands\CheckSites;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        CheckSites::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('check:sites')->everyFiveMinutes();
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
