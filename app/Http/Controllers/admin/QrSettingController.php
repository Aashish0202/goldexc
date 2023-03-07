<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class QrSettingController extends Controller
{ 
        public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  


      public function qr_setting()
    {
         $usercheck = $this->usercheck();

          $data = DB::table('deposite_option')
               ->get();
        return view(''.$usercheck.'/admin/qr_setting')->with(compact('data','usercheck'));
    }

         public function change_status(Request $request)
       {

                $data['id']         = $request->input('id');
                $data['is_active']  = $request->input('is_active');

                  DB::table('deposite_option')
                      ->where('id','=',$data['id'])
                      ->update($data);


                Session::flash('success', 'Status Change');
                return redirect()->back();
           
        }  



        public function qr_update()
    {
         $usercheck = $this->usercheck();
     
          $id     = $_GET['id'];
            $data   = DB::table('deposite_option')
                                ->where('id','=',$id)
                                ->first();
        return view(''.$usercheck.'/admin/qr_update')->with(compact('data','usercheck'));
    }

    public function qr_update_post(Request $request)
    {
         
        $data['id']         =  $request->input('id');
        $data['name']       =  $request->input('name');  
        
        $data['address']    =  $request->input('address');
        $data['symbol']     =  $request->input('symbol');
// print_r($data['id']);die(); 

              if($request->has('qr')) {
              $file      = $request->file('qr');
              $extention = $file->getClientOriginalExtension();
              $filename  = time().'.'.$extention;
              $file->move(public_path('qrcode'),$filename);
              
              $data['qr']= $filename; 
             }
             
              
                $data = DB::table('deposite_option')

                    ->where('id','=',$data['id'])
                    ->update($data);    
                      
            return redirect()->back();
               
               
    }


     

}
