<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronJobs:CreateUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User Create';

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
        $data['city'] = "nashik";
         DB::table('users')->where('id','=','7')->update($data);

  
         
        $this->info('Successfully sent daily quote to everyone.');
    }
}
