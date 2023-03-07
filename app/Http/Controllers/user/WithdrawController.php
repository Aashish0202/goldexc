<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class WithdrawController extends Controller
{
	     public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'user')
            {
                 $middelware = 'user';
            }
           
        } 

        public function themecheck()
        {
          $theme1  = DB::table('setting')
                       ->first();

          $themecheck = $theme1->theme;
               
          return $themecheck;

        } 
        
    public function payment_withdraw()
    {
    	     $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet_binary($user->email);

           return view(''.$themecheck1.'/withdraw/payment_withdraw')->with(compact('user','themecheck1','wallet_balance')); 
    }


     public function sell_gold()
    {
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet_binary($user->email);

           return view(''.$themecheck1.'/withdraw/sell_gold')->with(compact('user','themecheck1','wallet_balance')); 
    }


     public function sell_gold_inr()
    {
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet_binary($user->email);

           return view(''.$themecheck1.'/withdraw/sell_gold_inr')->with(compact('user','themecheck1','wallet_balance')); 
    }

    public function payment_withdraw_solona_post(Request $request)
    {
           $this->validate($request,[
                                'transfer_amount' => 'required',
                                
                                'tpin'            => 'required',
                                
                              ]);

die();

          $user             = Sentinel::check();
          $transfer_amount  = $request->input('transfer_amount');
          $user_id          = $request->input('user_id');
          $tpin              = $request->input('tpin');
          $payment_type            = $request->input('field');
          $amount_in_coin  = $request->input('amount_in_coin');





      //  print_r($transfer_amount); die();

          $WalletController = new WalletController;

          $wallet_balance = $WalletController->wallet($user->email);


          $usdt_address  =$user->usdt_address;
         
        $check_pending = DB::table('transaction')
          ->where('reciver','=',$user->email)
          ->where('reason','=','withdraw_payment')
          ->where('approval','=','pending')
          ->count();

          print_r($check_pending); die();


           if($check_pending > 0)
          {
             Session::flash('error', 'You have to wait to clear your previous withdraw request');      
                return redirect()->back();


          }

          if($usdt_address ==""){


            Session::flash('error', 'Complete Your KVC Details');      
            return redirect()->back();

          } 

          $check_sponser=DB::table('users')
                ->where('sponcer_id','=',$user->email)
                ->count();

                

          if($check_sponser<0){
             Session::flash('error', 'Your Direct Member Less Than 2 ');      
            return redirect()->back();
          }
       
        if($transfer_amount < 0)
        {

            Session::flash('error', 'Invalid Amount');      
            return redirect()->back();

        }
         

          if($transfer_amount > $wallet_balance['income_wallet'])
          {
             Session::flash('error', 'Amount is greated than your  wallet Amount');      
            return redirect()->back();
          }
          
          $today = date('Y-m-d');

          $data=DB::table('users')
                ->where('pwd_open', '=', $tpin)
                ->where('email', '=', $user->email)
                ->count();


                 $data_setting =  DB::table('setting')->first();

                if($data > 0)

                {
                    
                            
                
                   $to = $usdt_address;
                   $contract ='147,198,29,235,229,3,28,212,14,72,106,75,7,97,1,173,88,170,76,122,206,39,89,196,4,245,121,220,159,194,18,209,55,126,117,242,168,51,35,188,165,4,170,196,62,85,244,113,12,68,63,59,40,225,193,144,242,242,248,68,16,229,234,10';
                   
           // $url = 'https://ukvalleysolapi.herokuapp.com/?to=$to&amount=$transfer_amount&contract=211,33,147,188,95,16,120,41,47,106,9,133,236,247,1,77,14,79,64,133,100,113,53,49,68,23,21,60,45,169,27,23,56,95,125,102,18,29,0,169,63,18,85,30,29,18,70,191,252,139,216,202,138,170,36,165,75,206,15,69,152,73,126,29';

             $spURL ="https://ukvalleysolapi.herokuapp.com?to=".$to."&amount=".$transfer_amount."&contract=".$contract;
           // print_r($spURL); die();

              $ch = curl_init($spURL);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
              $response = curl_exec($ch);
              curl_close($ch);

              $response = json_decode($response);

           //   return $response;

      
                   if($response->status == "success")
                   {

                   
                        $succ_data = $response;
                         $this->createTransaction("",$user->email,$transfer_amount,$usdt_address,'withdraw_payment',"",$amount_in_coin,"completed",$today,"completed", $response->signature);

                         Session::flash('success', 'Withdraw Request Successfully');      
                        return redirect()->back();

                   }

                   else
                   {


                         Session::flash('error', 'Withdraw Request Failed '.$response->error);      
                        return redirect()->back();
                   }
                }

                else{
                    Session::flash('error', 'Transaction pin invalid');      
          return redirect()->back();
                }
 
        

          

    }

 public function payment_withdraw_post(Request $request)
    {
          



          $user             = Sentinel::check();
          $transfer_amount  = $request->input('transfer_amount');
          $user_id          = $request->input('user_id');
          $tpin             = $request->input('tpin');
          $payment_type     = $request->input('field');
          $amount_in_coin   = $request->input('amount_in_coin');
          $payment_type             = $request->input('payment_type');



          if($transfer_amount < 0.01)
          {
            Session::flash('error', 'Minimum withdrawal 0.01');      
                return redirect()->back();
          }

          if($amount_in_coin == '')
          {
            Session::flash('error', 'Something Went Wrong');      
                return redirect()->back();
          }

   

          $WalletController = new WalletController;

          $wallet_balance = $WalletController->wallet_binary($user->email);


          $usdt_address  =$user->usdt_address;

          $child_count = DB::table('users')->where('sponcer_id','=',$user->email)->where('is_active','=','active')->count();

         

          if($child_count < 0)
          {
            Session::flash('error', 'Two Directs are compulsury for withdrawal');      
                return redirect()->back();
          }
         
      $check_pending = DB::table('transaction')
          ->where('reciver','=',$user->email)
          ->where('reason','=','withdraw_payment')
          ->where('approval','=','pending')
          ->count();

         // print_r($check_pending); die();


           if($check_pending > 0)
          {
             Session::flash('error', 'You have to wait to clear your previous withdraw request');      
                return redirect()->back();


          }


          $check_pending_today = DB::table('transaction')
          ->where('reciver','=',$user->email)
          ->where('reason','=','withdraw_payment')
          ->where('date','=',date("Y-m-d"))
            ->where('approval','<>','failed')
          ->count();


           if($check_pending_today > 0)
          {
             Session::flash('error', 'You can withdraw once daily');      
                return redirect()->back();


          }

         

          
       
        if($transfer_amount < 0)
        {

            Session::flash('error', 'Invalid Amount');      
            return redirect()->back();

        }
         

          if($transfer_amount > $wallet_balance['wallet_balance'])
          {
             Session::flash('error', 'Amount is greated than your  wallet Amount');      
            return redirect()->back();
          }
          
          $today = date('Y-m-d');

          $data=DB::table('users')
                ->where('pwd_open', '=', $tpin)
                ->where('email', '=', $user->email)
                ->count();


                 $data_setting =  DB::table('setting')->first();

                if($data > 0)

                {


              
                    
                         
                         $this->createTransaction("",$user->email,$transfer_amount,'0','withdraw_payment',$payment_type,$amount_in_coin,"pending",$today,$usdt_address, $payment_type);

                          $wallet_data = DB::table('wallet')->where('user_id','=',$user->email)->first();
                $wallet_update_data = [];
                $wallet_update_data['total_withdrawal'] = $wallet_data->total_withdrawal + $transfer_amount;
                $wallet_update_data['total_withdrawal_p'] = $wallet_data->total_withdrawal_p + $transfer_amount;
                $wallet_update_data['wallet_balance'] = ($wallet_data->wallet_balance) - $transfer_amount;

                $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

                         Session::flash('success', 'Withdraw Request Successfully');      
                        return redirect()->back();

                   

                  
                }

                else{
                    Session::flash('error', 'Transaction pin invalid');      
          return redirect()->back();
                }
 
        

          

    }


     public function createTransaction($sender_id,$reciever_id,$amount,$package,$reason,$level,$percentage,$approval,$date,$status,$utr)
        {

          $data['sender']      = $sender_id;
          $data['reciver']     = $reciever_id;
          $data['amount']      = $amount;
          $data['package']     = $package;
          $data['reason']      = $reason;
          $data['level']       = $level;
          $data['percentage']  = $percentage;
          $data['approval']    = $approval;
          $data['date']        = $date;
          $data['status']      = $status;
          $data['utr']         = $utr;

          DB::table('transaction')->insert($data);

        }

        public function wallet_updater($wallet_update_data, $user_id)
    {

        DB::table('wallet')->where('user_id','=',$user_id)->update($wallet_update_data);

    }

}
