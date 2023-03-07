<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class WithdrawSettingController extends Controller
{ 
         public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  

      public function withdraw_setting()
       {

        $usercheck = $this->usercheck();

          $data = DB::table('setting')
               ->first();
        return view(''.$usercheck.'/admin/withdraw_setting')->with(compact('data','usercheck')); 
           
        }


      public function withdraw_setting_post(Request $request)
       {

            $data['withdraw_time_from']    = $request->input('withdraw_time_from');


            // print_r($request->input('withdraw_time_from')); die();

            $data['withdraw_time_to']      = $request->input('withdraw_time_to');
            $data['minimum_withdraw_amt']  = $request->input('minimum_withdraw_amt');
            $data['withdraw_multiple_off'] = $request->input('withdraw_multiple_off');
            $data['withdraw_child_conn']   = $request->input('withdraw_child_conn');
            $data['withdraw_count']        = $request->input('withdraw_count');
            
               $data =   DB::table('setting')
                                   
                                   ->update($data);

            Session::flash('success', 'Employee Update Successfully');
            return redirect()->back();
           
        }


     

}
