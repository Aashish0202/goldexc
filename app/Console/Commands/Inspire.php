<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class Inspire extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspire:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
     

      

        $url = 'https://whatsautobot.in/wapp/api/send?apikey=b93a4fca550d46ca92d229e4783ccb7a&mobile=919890437811&msg=umeshapi';

      //  $url="http://sms.ukvalley.com/api/sendhttp.php?authkey=24846Amlzi1RNa5ad1e135&mobiles=919890437811&message=Hello%20test&sender=ukvall&route=6";

     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     $response = curl_exec ($ch);
     $err = curl_error($ch);  //if you need
     curl_close ($ch);
    }
    
}
