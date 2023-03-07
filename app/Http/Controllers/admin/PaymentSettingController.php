<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class PaymentSettingController extends Controller
{ 
        public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  


      public function payment_setting()
    {
         $usercheck = $this->usercheck();

          $data = DB::table('setting')
                      ->first();
        return view(''.$usercheck.'/admin/payment_setting')->with(compact('data','usercheck'));
    }

    public function payment_setting_post(Request $request)
    {

         
        
            $data['uk18_key']    = $request->input('uk18_key');
            $data['vpa']         = $request->input('vpa');
            $data['vpa_name']    = $request->input('vpa_name');
            $data['currency']    = $request->input('currency');
        
            
               $data =   DB::table('setting')
                            ->update($data);

            Session::flash('success', 'Payment Setting Change Successfully');
            return redirect()->back();
               
    }


  


     

}
