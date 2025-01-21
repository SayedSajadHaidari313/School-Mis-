<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        // زمان‌بندی دستور برای اجرا روزانه
        $schedule->command('orders:send-expired-email')->everyMinute(); // هر دقیقه اجرا شود
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}
