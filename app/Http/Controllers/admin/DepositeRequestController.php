<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\user\WalletController;


class DepositeRequestController extends Controller
{
   
      public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }   


    public function deposite_request()
    {
         
         $usercheck = $this->usercheck();
         
         $data  = DB::table('transaction')
                  ->where('reason','=','deposit')
                  ->where('approval','=','pending')
                  ->get();


         return view(''.$usercheck.'/admin/deposite_request')->with(compact('data','usercheck')); 
        
      
    }

        public function quiz_deposit_request()
    {
         
         $usercheck = $this->usercheck();
         
         $data  = DB::table('transaction')
                  ->where('reason','=','quiz_deposit')
                  ->where('approval','=','pending')
                  ->get();


         return view(''.$usercheck.'/admin/quiz_deposit_request')->with(compact('data','usercheck')); 
        
      
    }

      

        public function deposite_request_data()
       {

           $usercheck = $this->usercheck();
           
           $data['approval'] = $_GET['approval'];

           

                    DB::table('transaction')
                                ->where('id','=',$_GET['id'])
                                ->update($data);

                    $data = DB::table('transaction')
                                ->where('id','=',$_GET['id'])
                                ->first();

                $wallet_data = DB::table('wallet')->where('user_id','=',$data->reciver)->first();
                $wallet_update_data = [];
                $wallet_update_data['activation_wallet_balance'] = $wallet_data->activation_wallet_balance + $data->amount;
                $wallet_update_data['total_deposit'] = $wallet_data->total_deposit + $data->amount;
                $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

                Session::flash('success', 'Satus Change Successfully');
               
               return redirect()->back();
                
           
        }


         public function wallet_updater($wallet_update_data, $user_id)
    {

        DB::table('wallet')->where('user_id','=',$user_id)->update($wallet_update_data);

    }


        public function withdraw_request()
        {
         
         $usercheck = $this->usercheck();
         
         $data  = DB::table('transaction')
                  ->where('reason','=','withdraw_payment')
                  ->where('approval','=','pending')
                  ->get();


         return view(''.$usercheck.'/admin/withdraw_request')->with(compact('data','usercheck')); 
        
      
        }

      

        public function withdraw_request_data()
        {

           $usercheck = $this->usercheck();
           
           $data['approval'] = $_GET['approval'];

                   $data   = DB::table('transaction')
                                ->where('id','=',$_GET['id'])
                                ->update($data);



                                $data1   = DB::table('transaction')
                                ->where('id','=',$_GET['id'])
                                ->first();

                $wallet_data = DB::table('wallet')->where('user_id','=',$data1->reciver)->first();
                $wallet_update_data = [];
                $wallet_update_data['total_withdrawal_p'] = $wallet_data->total_withdrawal_p - $data1->amount;
                $this->wallet_updater($wallet_update_data,$wallet_data->user_id);



                Session::flash('success', 'Satus Change Successfully');
               
               return redirect()->back();
                
           
         }



           public function request_reject()
        {
         
         $usercheck = $this->usercheck();
         
         
           
           $data['approval'] = $_GET['approval'];

           
            

                   $trn=DB::table('transaction')
                                 ->where('id','=',$_GET['id'])
                                 ->first();

                   $data1 = DB::table('transaction')
                                ->where('id','=',$_GET['id'])
                                ->update($data);

                 

         Session::flash('success', 'Request Rejected Successfully');
               
               return redirect()->back();
        
      
        }



           public function withdraw_request_reject()
        {
         
         $usercheck = $this->usercheck();
         
         
           
           $data['approval'] = $_GET['approval'];

          print_r($_GET['approval']); 

          $data1   = DB::table('transaction')
                                ->where('id','=',$_GET['id'])
                                ->first();

         
                   $data   = DB::table('transaction')
                                ->where('id','=',$_GET['id'])
                                ->update($data);
            

                 $data1   = DB::table('transaction')
                                ->where('id','=',$_GET['id'])
                                ->first();

                       //print_r($data1); die();          

                $wallet_data = DB::table('wallet')->where('user_id','=',$data1->reciver)->first();

                $wallet_update_data = [];

                $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $data1->amount;
                $wallet_update_data['total_withdrawal_p'] = $wallet_data->total_withdrawal_p - $data1->amount;
                

                $this->wallet_updater($wallet_update_data,$wallet_data->user_id);


         Session::flash('error', 'Request Rejected Successfully');
               
               return redirect()->back();
        
      
        }




}