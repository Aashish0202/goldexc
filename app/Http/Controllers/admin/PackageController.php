<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class PackageController extends Controller
{
     public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  
        
  public function view_package(Request $request)
       {

        

        $usercheck = $this->usercheck();

       
            $data = DB::table('package')
                    ->get();
        return view(''.$usercheck.'/admin/view_package')->with(compact('data','usercheck'));
           
        }

        


     

}
