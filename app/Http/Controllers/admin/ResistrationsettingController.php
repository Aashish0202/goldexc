<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class ResistrationsettingController extends Controller
{ 
         public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  

      public function registration_setting()
       {

        $usercheck = $this->usercheck();

          $data = DB::table('setting')
               ->first();
        return view(''.$usercheck.'/admin/registration_setting')->with(compact('data','usercheck')); 
           
        }


      public function resistration_setting_post(Request $request)
       {

            $data['max_mobile_count']    = $request->input('max_mobile_count');
            $data['max_sponcer_count']    = $request->input('max_sponcer_count');
            $data['max_email_count']    = $request->input('max_email_count');
           
           // print_r($request->input('max_sponcer_count')); die();
               $data =   DB::table('setting')
                                   
                                   ->update($data);

            Session::flash('success', 'Employee Update Successfully');
            return redirect()->back();
           
        }


     

}
