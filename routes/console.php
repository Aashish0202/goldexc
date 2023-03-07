<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('level_income', function () {



    $url = 'https://qubitrade.in/generate_level_income';

     //   $url="https://whatsautobot.in/wapp/api/send?apikey=b93a4fca550d46ca92d229e4783ccb7a&mobile=9890437811&msg=umesh";

    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://qubitrade.in/generate_level_income");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$curled=curl_exec($ch);
curl_close($ch);
print_r($curled);



})->purpose('Display an inspiring quote');


Artisan::command('roi_income', function () {



    $url = 'https://qubitrade.in/generate_roi_income';

     //   $url="https://whatsautobot.in/wapp/api/send?apikey=b93a4fca550d46ca92d229e4783ccb7a&mobile=9890437811&msg=umesh";

    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://qubitrade.in/generate_roi_income");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$curled=curl_exec($ch);
curl_close($ch);
print_r($curled);



})->purpose('Display an inspiring quote');
