<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class create_levelroi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronJobs:create_levelroi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $url = 'https://demo/generate_roi_level_income';

      //  $url = "https://whatsautobot.in/wapp/api/send?apikey=b93a4fca550d46ca92d229e4783ccb7a&mobile=919890437811&msg=umesh";
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     $response = curl_exec ($ch);
     $err = curl_error($ch);  //if you need
     curl_close ($ch);

      $this->info('Successfully sent daily quote to everyone.');
    }
}
