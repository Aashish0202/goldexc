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
         Commands\CreateUser::class,
         Commands\create_levelincome::class,
         Commands\create_levelroi::class,
        
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {


        $schedule->command('cronJobs:create_levelincome')
                 //->everyMinute();
                  ->daily()->at('00:01');

         $schedule->command('cronJobs:create_levelroi')
                 //->everyMinute();
                  ->daily()->at('00:02');


      /*  $schedule->command('cronJobs:create_levelroi')
                // ->everyMinute();
                 ->daily()->at('23:58');*/



         
            
    }

    protected function commands()
{
       $this->load(__DIR__.'/Commands');
    require base_path('routes/console.php');
}
}
