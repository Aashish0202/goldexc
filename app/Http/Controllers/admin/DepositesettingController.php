<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class DepositesettingController extends Controller
{ 
         public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  

      public function deposite_setting()
       {

        $usercheck = $this->usercheck();

          $data = DB::table('setting')
               ->first();
        return view(''.$usercheck.'/admin/deposite_setting')->with(compact('data','usercheck')); 
           
        }


      public function deposite_setting_post(Request $request)
       {

            $data['deposite_timing_from']    = $request->input('deposite_timing_from');
            $data['deposite_timing_to']      = $request->input('deposite_timing_to');
            $data['deposite_multiple_off']   = $request->input('deposite_multiple_off');
            $data['minimum_deposite']        = $request->input('minimum_deposite');
            
               $data =   DB::table('setting')
                                   
                                   ->update($data);

            Session::flash('success', 'Employee Update Successfully');
            return redirect()->back();
           
        }


     

}
