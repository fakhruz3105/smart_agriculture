<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\WaterSchedule;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

/**
 * Class Kernel.
 */
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $water_schedules = WaterSchedule::where('executed',0)
            ->orderBy('execution', 'ASC')
            ->get()
            ->collect();

        foreach ($water_schedules as $schd) {
            if ($schd->execution < Carbon::now()->timestamp) {
                $schd->executed = true;
                $schd->save();
            } else {
                $carbon = Carbon::createFromTimestamp($schd->execution);
                $cron = $carbon->isoFormat('m H D M *');
                $schedule
                    ->command(sprintf('start:pump %u', $schd->id))
                    ->cron($cron)
                    ->withoutOverlapping();
            }
        }
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
