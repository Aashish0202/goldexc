<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\user\WalletController;


class ActivationController extends Controller
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

    public function package_active()
    {
                  
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet_binary($user->email);

           return view(''.$themecheck1.'/activation/package_active')->with(compact('user','themecheck1','wallet_balance')); 
    	
    }

    public function package_active_post(Request $request)
    {
        $this->validate($request,[
                                'package'        => 'required',
                                'user_id'        => 'required',
                                'wallet_balance' => 'required',
                              ]);

          $user    = Sentinel::check();
          $package = $request->input('package');


         

         

        //print_r($package); die();
          $user_id = $request->input('user_id');

          $WalletController = new WalletController;
          $wallet_balance = $WalletController->wallet_binary($user->email);

          $wallet_data_main = DB::table('wallet')->where('user_id','=',$user->email)->first();

          $transaction_check = DB::table('transaction')
                           ->where('package','=', $package)
                           ->where('reason','=','activate_package')
                           ->where('reciver','=',$user_id)
                           ->count();

                              //print_r($transaction_check);die();

              if($package < 34){
                  Session::flash('error','Package Must be greater than 34');      
                      return redirect()->back();
                  }
                      
                  if($package > 500000){
                  Session::flash('error','Package Must be Smaller than 500000');      
                      return redirect()->back();
                  }


               

           

          if(($package) > $wallet_balance['activation_wallet'])
          {
             Session::flash('error', 'Amount is greater than your Activation wallet Amount');      
              return redirect()->back();
          }


          $user_id_check = DB::table('users')->where('email','=',$user_id)->count();

          if($user_id_check == 0)
          {
            Session::flash('error','User Id you enterd is wrong');      
            return redirect()->back();
          }
          

          
             
              $today = date('Y-m-d');

            

            $sponsor_count=  DB::table('users')->where('sponcer_id','=',$user->email)->where('is_active','=','active')->count();
            $package_data = DB::table('package')->where('amount','=',$package)->first();


                     
          $this->createTransaction($user->email,$user_id,$package,$package,"activate_package",$package_data->id,"","completed",$today,"Package Activation","");

          

          $wallet_data = DB::table('wallet')->where('user_id','=',$user->email)->first();

         
          $wallet_update_data = [];
          $wallet_update_data['total_activation'] = $wallet_data->total_activation + $package;
          $wallet_update_data['activation_wallet_balance'] = $wallet_data->activation_wallet_balance - $package;
          $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          
          // if ROI is added in plan

          // function createTransaction($sender_id,$reciever_id,$amount,$package,$reason,$level,$percentage,$approval,$date,$status,$utr)

         $autopool_package = DB::table('autopool_package')->where('package','=',$package)->where('flow','=','1')->first();

          $this->autopool_one($user_id,$autopool_package->id);


         if($package_data->roi_active == "yes")
         {
            $now = date('Y-m-d');

             $this->createTransaction("",$user_id,$package,$package,"roi",$package_data->roi_days,$package_data->roi,"completed",$now,"Daily Gold Yeild","");
         }


         $daily_roi = $package*($package_data->roi/100);
        
         // level income

         $level_parent = $user_id;
         
         
         for ($i=0; $i < $package_data->level_upto; $i++) { 

            $key = $i+1;

          $parent = $this->get_direct_parent_at_position($level_parent,0,$key);

          $parent_status = $this->user_status($parent);

          $level_data = DB::table('level_income')->where('level','=',$key)->first();

          if($key ==  1)
          {
             if($parent_status ==  "active")
          {

            $package_name = $package_data->package_code;

           

            $this->createTransaction($user_id,$parent,$level_data->$package_name,$package,"direct",$key,$level_data->$package_name,"completed",$today,"completed","");

            $wallet_data = DB::table('wallet')
                        ->where('user_id','=',$parent)
                        ->first();

            $wallet_update_data = [];
            $wallet_update_data['direct_income'] = $wallet_data->direct_income + $level_data->$package_name;

            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $level_data->$package_name;

            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);
          }

          else
          {
            $this->createTransaction($user_id,$parent,$package*($level_data->$package_name),$package,"level",$key,$level_data->$package_name,"failed",$today,"failed","");
          }

          }
          
          else
          {

            if($parent_status ==  "active")
          {
           
            $this->createTransaction($user_id,$parent,$daily_roi*($level_data->$package_name),$package,"level",$key,$level_data->$package_name,"completed",$today,"completed","");

            $wallet_data = DB::table('wallet')
                  ->where('user_id','=',$parent)
                  ->first();

            $wallet_update_data = [];
            $wallet_update_data['level_income'] = $wallet_data->level_income + $level_data->$package_name;

            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $level_data->$package_name;

            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);
          }

          else
          {
            $this->createTransaction($user_id,$parent,$daily_roi*($level_data->{$level_data->$package_name}),$package,"level",$key,$level_data->{$level_data->$package_name},"failed",$today,"failed","");
          }

          }


         }


       





         /*
        $level_parent = $user_id;
         
         for ($i=0; $i < $package_data->level_upto; $i++) { 

            $key = $i+1;

          $parent = $this->get_direct_parent_at_position($level_parent,0,$key);

          $parent_status = $this->user_status($parent);

          $level_data = DB::table('level_income')->where('level','=',$key)->first();

          if($key ==  1)
          {
             if($parent_status ==  "active")
          {

            $sponsor_count_parent =  DB::table('users')->where('sponcer_id','=',$parent)->where('is_active','=','active')->count();

          
            $this->createTransaction($user_id,$parent,$package*($level_data->percentage/100),$package,"direct",$key,$level_data->percentage,"completed",$today,"Direct Referral Gold","");

            $this->createTransaction($user_id,$parent,$package*($level_data->percentage/100),$package,"direct_reward",$key,$level_data->percentage,"completed",$today,"Direct Referral Reward","");

            if($sponsor_count_parent >= 0)
            {
              $this->createTransaction($user_id,$parent,$daily_roi*(20/100),$package,"level_roi",$key,"20","completed",$today,"Level Gold Yeild","");
            }
            else
            {
              $this->createTransaction($user_id,$parent,$daily_roi*(20/100),$package,"level_roi",$key,"20","failed",$today,"Level Gold Yeild","");
            }


            

            $wallet_data = DB::table('wallet')
                        ->where('user_id','=',$parent)
                        ->first();

            $wallet_update_data = [];
            $wallet_update_data['direct_income'] = $wallet_data->direct_income + $level_data->percentage;

            $wallet_update_data['reward_wallet'] = $wallet_data->reward_wallet + $level_data->percentage;

            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $level_data->percentage;

            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);
          }

          else
          {
            $this->createTransaction($user_id,$parent,$package*($level_data->percentage/100),$package,"direct",$key,$level_data->percentage,"failed",$today,"Direct Referral Gold","");

            $this->createTransaction($user_id,$parent,$daily_roi*(20/100),$package,"level_roi",$key,"20","failed",$today,"Level Gold Yeild","");
          }

          }
          
          else
          {

            if($parent_status ==  "active")
          {

             $sponsor_count_parent =  DB::table('users')->where('sponcer_id','=',$parent)->where('is_active','=','active')->count();

            if($sponsor_count_parent >= 2 && $key <= 5 && $key >= 2)
            {
           
            $this->createTransaction($user_id,$parent,$daily_roi*($level_data->percentage/100),$package,"level_roi",$key,$level_data->percentage,"completed",$today,"Level Gold Yeild","");
            }
           

            elseif($sponsor_count_parent >= 4 && $key <= 10 && $key >= 6)
            {
              $this->createTransaction($user_id,$parent,$daily_roi*($level_data->percentage/100),$package,"level_roi",$key,$level_data->percentage,"completed",$today,"Level Gold Yeild","");

            }
            

            elseif($sponsor_count_parent >= 6 && $key <= 15 && $key >= 11)
            {
              $this->createTransaction($user_id,$parent,$daily_roi*($level_data->percentage/100),$package,"level_roi",$key,$level_data->percentage,"completed",$today,"Level Gold Yeild","");
              
            }
           

            elseif($sponsor_count_parent >= 10 && $key <= 20 && $key >= 16)
            {
              $this->createTransaction($user_id,$parent,$daily_roi*($level_data->percentage/100),$package,"level_roi",$key,$level_data->percentage,"completed",$today,"Level Gold Yeild","");
              
            }

            else
            {
              $this->createTransaction($user_id,$parent,$daily_roi*($level_data->percentage/100),$package,"level_roi",$key,$level_data->percentage,"failed",$today,"Level Gold Yeild","");

            }

           



            
          }

          else
          {
          $this->createTransaction($user_id,$parent,$daily_roi*($level_data->percentage/100),$package,"level_roi",$key,$level_data->percentage,"failed",$today,"Level Gold Yeild","");

          }

          }


         }
         */

         $data['is_active']  = "active";

          DB::table('users')
                ->where('email','=',$user_id)
                ->update($data);


        


     

    $msg = "Congratulations Mr "  .$user_id. " your package ".$package."GRM successfully activated";

      Session::flash('success',$msg);      
            return redirect()->back();
         
         

    }

 public function TBI_active()
    {
                  
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);

           return view(''.$themecheck1.'/activation/TBI_active')->with(compact('user','themecheck1','wallet_balance')); 
      
    }

     public function TBI_active_post(Request $request)
    {
        $this->validate($request,[
                                'package'        => 'required',
                                'user_id'        => 'required',
                                'wallet_balance' => 'required',
                              ]);

          $user    = Sentinel::check();
          $package = $request->input('package');

        //  print_r($package); die();
          if($package != 10)
          {
            Session::flash('error', 'Amount is Wrong');      
                      return redirect()->back();
          }

          $user_id = $request->input('user_id');

          $WalletController = new WalletController;
          $wallet_balance = $WalletController->wallet($user->email);

          $wallet_data_main = DB::table('wallet')
                  ->where('user_id','=',$user->email)
                  ->first();

          $transaction_check = DB::table('transaction')
                           ->where('package','=', $package)
                           ->where('reason','=','activate_package')
                           ->where('reciver','=',$user_id)
                           ->count();

                              //print_r($transaction_check);die();

              if($transaction_check != 0){

                Session::flash('error', 'Package Allready Active');      
                      return redirect()->back();
                  }
                              
          //print_r($wallet_balance['income_wallet']); die();
          if($package > $wallet_balance['income_wallet'])
          {
             Session::flash('error', 'Amount is greater than your Activation wallet Amount');      
             return redirect()->back();
          }


          $user_id_check = DB::table('users')
          ->where('email','=',$user_id)
          ->count();

          if($user_id_check == 0)
          {
            Session::flash('error', 'User Id you enterd is wrong');      
            return redirect()->back();


          }
          

           if($package!=10){

             
              $today = date('Y-m-d');


                     
          $this->createTransaction($user->email,$user_id,$package,$package,"activate_package","","","completed",$today,"completed","");

          $wallet_data = DB::table('wallet')
          ->where('user_id','=',$user->email)
          ->first();

         
          $wallet_update_data = [];
          $wallet_update_data['total_activation'] = $wallet_data->total_activation + $package;
          $wallet_update_data['activation_wallet_balance'] = $wallet_data->activation_wallet_balance - $package;
          $this->wallet_updater($wallet_update_data,$wallet_data->user_id);



         
          
          
          // if ROI is added in plan

          // function createTransaction($sender_id,$reciever_id,$amount,$package,$reason,$level,$percentage,$approval,$date,$status,$utr)

         $package_data =  DB::table('package')->first();

         $autopool_package =  DB::table('autopool_package')->where('package','=',$package)->where('flow','=','1')->first();


        


         if($package_data->roi_active == "yes")
         {
            $now = date('Y-m-d');

             $this->createTransaction("",$user_id,$package,$package,"roi",$package_data->roi_days,$package_data->roi,"completed",$now,"completed","");
         }


        
         // level income


        $level_parent = $user_id;
         
         for ($i=0; $i < $package_data->level_upto; $i++) { 

            $key = $i+1;

        $parent = $this->get_direct_parent_at_position($level_parent,0,$key);

          $parent_status = $this->user_status($parent);

          $level_data = DB::table('level_income')->where('level','=',$key)->first();

          if($key ==  1)
          {

            if($parent_status ==  "active")
          {

             

            $this->createTransaction($user_id,$parent,$level_data->percentage,$package,"direct",$key,$level_data->percentage,"completed",$today,"completed","");

            $wallet_data = DB::table('wallet')
                        ->where('user_id','=',$parent)
                        ->first();

            $wallet_update_data = [];
            $wallet_update_data['direct_income'] = $wallet_data->direct_income + $level_data->percentage;

            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $level_data->percentage;

            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);
          }

          else
          {
            $this->createTransaction($user_id,$parent,$level_data->percentage,$package,"level",$key,$level_data->percentage,"failed",$today,"failed","");
          }

          }
          
          else
          {

            if($parent_status ==  "active")
          {
           
            $this->createTransaction($user_id,$parent,$level_data->percentage,$package,"level",$key,$level_data->percentage,"completed",$today,"completed","");

            $wallet_data = DB::table('wallet')
                  ->where('user_id','=',$parent)
                  ->first();

            $wallet_update_data = [];
            $wallet_update_data['level_income'] = $wallet_data->level_income + $level_data->percentage;

            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $level_data->percentage;

            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);
          }

          else
          {
            $this->createTransaction($user_id,$parent,$level_data->percentage,$package,"level",$key,$level_data->percentage,"failed",$today,"failed","");
          }

          }


         }


     }
        else
         {
              $transaction_check = DB::table('transaction')
                           ->where('package','=', $package)
                           ->where('reason','=','activate_package_10')
                           ->where('reciver','=',$user_id)
                           ->count();

                              //print_r($transaction_check);die();

              if($transaction_check != 0){

                Session::flash('error', 'Package Allready Active');      
                      return redirect()->back();
                  }

                    $today = date('Y-m-d');

          $this->createTransaction($user->email,$user_id,$package,$package,"activate_package_10","","","completed",$today,"completed","");

          $wallet_data = DB::table('wallet')
          ->where('user_id','=',$user->email)
          ->first();

         
          $wallet_update_data = [];
          $wallet_update_data['total_activation'] = $wallet_data->total_activation + $package;
          $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance - $package;
          $this->wallet_updater($wallet_update_data,$wallet_data->user_id);


          $data['is_active_10']  = "active";

          DB::table('users')
                ->where('email','=',$user_id)
                ->update($data);


         }


            //createTransaction($sender_id,$reciever_id,$amount,$package,$reason,$level,$percentage,$approval,$date,$status,$utr)

          $data['is_active']  = "active";

          DB::table('users')
                ->where('email','=',$user_id)
                ->update($data);

            $msg = "Congratulations Mr "  .$user_id. " your package ".$package."$ successfully activated";

      Session::flash('success',$msg);      
            return redirect()->back();
         
         

    }


     public function quiz_deposite()
    {
                  
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);

           return view(''.$themecheck1.'/activation/quiz_deposite')->with(compact('user','themecheck1','wallet_balance')); 
      
    }


  public function quiz_deposite_post(Request $request)
    {

         $this->validate($request,[
                                'amount'=> 'required',
                              ]);


          $user             = Sentinel::check();
          $amount           = $request->input('amount');
         

          $today = date('Y-m-d');



          $wallet_data = DB::table('wallet')->where('user_id','=',$user->email)->first();

          if($amount > $wallet_data->wallet_balance){

             Session::flash('error','Amount is greater than your wallet Balance');      
             return redirect()->back();

          }

        // print_r($wallet_data); die();
            
                 $this->createTransaction("",$user->email,$amount,"","quiz_deposit","","","completed",$today,'completed',"Quiz deposit");
                 

                  $wallet_update_data = [];
                  $wallet_update_data['quiz_wallet'] = $wallet_data->quiz_wallet + $amount;
                  $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance - $amount;

                  $this->wallet_updater($wallet_update_data,$wallet_data->user_id);


                  Session::flash('success', 'Fund Deposite Request Created Successfully');      
                  return redirect()->back();
            
}




    public function autopool_one($user_id,$package_id)
    {

     $autopool_package = DB::table('autopool_package')->where('id','=',$package_id)->first();

      $three_leg_parent = DB::table('autopool')
         ->where('count','<',$autopool_package->pool_count)
         ->where('amount','=',$autopool_package->package_amount)
         ->where('package_id','=',$package_id)
         ->first();

        $amount_to = $autopool_package->package_amount;

        $random_user_id = "SCU".rand( 1000000 , 9999999 );

        $init_three_leg['user_id'] = $user_id;
        $init_three_leg['self_id'] = $random_user_id;
        $init_three_leg['count']   = '0';
        $init_three_leg['sponcer'] = $three_leg_parent->user_id;
        $init_three_leg['sponcer_self'] = $three_leg_parent->self_id;
        $init_three_leg['amount'] = $three_leg_parent->amount;
        $init_three_leg['package_id'] = $package_id;
        $init_three_leg['package_amount'] = $autopool_package->package;

        DB::table('autopool')->insert($init_three_leg);

        $three_leg_parent_count = $three_leg_parent->count;
        $three_leg_update['count'] =$three_leg_parent_count+1;

        DB::table('autopool')
               ->where('id','=',$three_leg_parent->id)
               ->update($three_leg_update);


         $three_leg_parent = DB::table('autopool')
               ->where('id','=',$three_leg_parent->id)
               ->first();

        $today = date('Y-m-d');


       
   

        if($three_leg_parent != null)
        {
        $this->createTransaction($user_id,$three_leg_parent->user_id,$amount_to,$autopool_package->package,"pool",1,$three_leg_parent->id,"pending",$today,$autopool_package->flow,$package_id);

            $wallet_data = DB::table('wallet')->where('user_id','=',$three_leg_parent->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);


      

        if($three_leg_parent->count == $autopool_package->pool_count)
        {
         

            $wallet_data = DB::table('wallet')->where('user_id','=',$three_leg_parent->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_income'] = $wallet_data->autopool_income + $autopool_package->self;
            $wallet_update_data['pool_upgrade'] = $wallet_data->autopool_income + $autopool_package->upgrade;
            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $autopool_package->self;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

            $trasn_updater = [];
            $trasn_updater['approval'] = "completed";
            
           $transup = DB::table('transaction')->where('percentage','=',$three_leg_parent->id)->get();

           foreach ($transup as $key => $value) {
            DB::table('transaction')->where('id','=',$value->id)->update($trasn_updater);
            # code...
           }



          

           return $this->autopool_one($three_leg_parent->user_id,$autopool_package->next_package);


          // upgrade deduction
            
          }

        }
    }

    public function autopool_two($user_id,$package_amount)
    {
      $three_leg_parent = DB::table('autopool')
      ->where('count','<','3')
      ->where('amount','=',$package_amount)
      ->first();

        $amount_to = $package_amount/4;

        $random_user_id = "NSM".rand( 1000000 , 9999999 );

        $init_three_leg['user_id'] = $user_id;
        $init_three_leg['self_id'] = $random_user_id;
        $init_three_leg['count']   = '0';
        $init_three_leg['sponcer'] = $three_leg_parent->user_id;
        $init_three_leg['sponcer_self'] = $three_leg_parent->self_id;
        $init_three_leg['amount'] = $three_leg_parent->amount;

        DB::table('autopool')->insert($init_three_leg);

        $three_leg_parent_count = $three_leg_parent->count;
        $three_leg_update['count'] =$three_leg_parent_count+1;

        DB::table('autopool')
      ->where('id','=',$three_leg_parent->id)
      ->update($three_leg_update);

        $today = date('Y-m-d');


        $level_1 = $this->get_direct_parent_at_position_autopool($random_user_id,0,1,'autopool',$package_amount);
       
        $level_1_user = $this->fetch_user_info("autopool",$level_1);
        if($level_1_user != null)
        {
        $this->createTransaction($user_id,$level_1_user->user_id,$amount_to,$package_amount,"pool",1,"","pending",$today,'pending','');
        $this->autopool_updater($level_1,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_1_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

        }


        $level_2 = $this->get_direct_parent_at_position_autopool($random_user_id,0,2,'autopool',$package_amount);
        $level_2_user = $this->fetch_user_info("autopool",$level_2);

         if($level_2_user != null)
        {
        $this->createTransaction($user_id,$level_2_user->user_id,$amount_to,$package_amount,"pool",2,"","pending",$today,'pending','');
        $this->autopool_updater($level_2,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_2_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

        }

        $level_3 = $this->get_direct_parent_at_position_autopool($random_user_id,0,3,'autopool',$package_amount);
        $level_3_user = $this->fetch_user_info("autopool",$level_3);

        if($level_3_user != null)
        {

        $this->createTransaction($user_id,$level_3_user->user_id,$amount_to,$package_amount,"pool",3,"","pending",$today,'pending','');
        $this->autopool_updater($level_3,1,$amount_to,0);

          $wallet_data = DB::table('wallet')->where('user_id','=',$level_3_user->user_id)->first();
          $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          }

        $level_4 = $this->get_direct_parent_at_position_autopool($random_user_id,0,4,'autopool',$package_amount);
        $level_4_user = $this->fetch_user_info("autopool",$level_4);

        if($level_4_user != null)
        {
        $this->createTransaction($user_id,$level_4_user->user_id,$amount_to,$package_amount,"pool",4,"","pending",$today,'pending','');
        $this->autopool_updater($level_4,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_4_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);


        $level_4_user = $this->fetch_user_info("autopool",$level_4);

        if($level_4_user->trans_count == 120)
        {
          $this->autopool_three($level_4_user->$user_id,2000);
           $wallet_data = DB::table('wallet')->where('user_id','=',$level_4_user->user_id)->first();
           $wallet_update_data = [];
            $wallet_update_data['autopool_income'] = $wallet_data->autopool_income + 12000;
            $wallet_update_data['pool_upgrade'] = $wallet_data->autopool_income + 4000;
            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + 8000;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          // upgrade deduction
            
        }
      }
    }

    public function autopool_three($user_id,$package_amount)
    {
      $three_leg_parent = DB::table('autopool')
      ->where('count','<','3')
      ->where('amount','=',$package_amount)
      ->first();

        $amount_to = $package_amount/4;

        $random_user_id = "NSM".rand( 1000000 , 9999999 );

        $init_three_leg['user_id'] = $user_id;
        $init_three_leg['self_id'] = $random_user_id;
        $init_three_leg['count']   = '0';
        $init_three_leg['sponcer'] = $three_leg_parent->user_id;
        $init_three_leg['sponcer_self'] = $three_leg_parent->self_id;
        $init_three_leg['amount'] = $three_leg_parent->amount;

        DB::table('autopool')->insert($init_three_leg);

        $three_leg_parent_count = $three_leg_parent->count;
        $three_leg_update['count'] =$three_leg_parent_count+1;

        DB::table('autopool')
      ->where('id','=',$three_leg_parent->id)
      ->update($three_leg_update);

        $today = date('Y-m-d');


        $level_1 = $this->get_direct_parent_at_position_autopool($random_user_id,0,1,'autopool',$package_amount);
       
        $level_1_user = $this->fetch_user_info("autopool",$level_1);
        if($level_1_user != null)
        {
        $this->createTransaction($user_id,$level_1_user->user_id,$amount_to,$package_amount,"pool",1,"","pending",$today,'pending','');
        $this->autopool_updater($level_1,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_1_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

        }


        $level_2 = $this->get_direct_parent_at_position_autopool($random_user_id,0,2,'autopool',$package_amount);
        $level_2_user = $this->fetch_user_info("autopool",$level_2);

         if($level_2_user != null)
        {
        $this->createTransaction($user_id,$level_2_user->user_id,$amount_to,$package_amount,"pool",2,"","pending",$today,'pending','');
        $this->autopool_updater($level_2,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_2_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

        }

        $level_3 = $this->get_direct_parent_at_position_autopool($random_user_id,0,3,'autopool',$package_amount);
        $level_3_user = $this->fetch_user_info("autopool",$level_3);

        if($level_3_user != null)
        {

        $this->createTransaction($user_id,$level_3_user->user_id,$amount_to,$package_amount,"pool",3,"","pending",$today,'pending','');
        $this->autopool_updater($level_3,1,$amount_to,0);

          $wallet_data = DB::table('wallet')->where('user_id','=',$level_3_user->user_id)->first();
          $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          }

        $level_4 = $this->get_direct_parent_at_position_autopool($random_user_id,0,4,'autopool',$package_amount);
        $level_4_user = $this->fetch_user_info("autopool",$level_4);

        if($level_4_user != null)
        {
        $this->createTransaction($user_id,$level_4_user->user_id,$amount_to,$package_amount,"pool",4,"","pending",$today,'pending','');
        $this->autopool_updater($level_4,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_4_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);


        $level_4_user = $this->fetch_user_info("autopool",$level_4);

        if($level_4_user->trans_count == 120)
        {
          $this->autopool_four($level_4_user->$user_id,8000);
          $wallet_data = DB::table('wallet')->where('user_id','=',$level_4_user->user_id)->first();
          $wallet_update_data = [];
            $wallet_update_data['autopool_income'] = $wallet_data->autopool_income + 60000;
            $wallet_update_data['pool_upgrade'] = $wallet_data->autopool_income + 20000;
            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + 40000;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          // upgrade deduction
            
        }
      }
    }

    public function autopool_four($user_id,$package_amount)
    {
      $three_leg_parent = DB::table('autopool')
      ->where('count','<','3')
      ->where('amount','=',$package_amount)
      ->first();

        $amount_to = $package_amount/4;

        $random_user_id = "NSM".rand( 1000000 , 9999999 );

        $init_three_leg['user_id'] = $user_id;
        $init_three_leg['self_id'] = $random_user_id;
        $init_three_leg['count']   = '0';
        $init_three_leg['sponcer'] = $three_leg_parent->user_id;
        $init_three_leg['sponcer_self'] = $three_leg_parent->self_id;
        $init_three_leg['amount'] = $three_leg_parent->amount;

        DB::table('autopool')->insert($init_three_leg);

        $three_leg_parent_count = $three_leg_parent->count;
        $three_leg_update['count'] =$three_leg_parent_count+1;

        DB::table('autopool')
      ->where('id','=',$three_leg_parent->id)
      ->update($three_leg_update);

        $today = date('Y-m-d');


        $level_1 = $this->get_direct_parent_at_position_autopool($random_user_id,0,1,'autopool',$package_amount);
       
        $level_1_user = $this->fetch_user_info("autopool",$level_1);
        if($level_1_user != null)
        {
        $this->createTransaction($user_id,$level_1_user->user_id,$amount_to,$package_amount,"pool",1,"","pending",$today,'pending','');
        $this->autopool_updater($level_1,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_1_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

        }


        $level_2 = $this->get_direct_parent_at_position_autopool($random_user_id,0,2,'autopool',$package_amount);
        $level_2_user = $this->fetch_user_info("autopool",$level_2);

         if($level_2_user != null)
        {
        $this->createTransaction($user_id,$level_2_user->user_id,$amount_to,$package_amount,"pool",2,"","pending",$today,'pending','');
        $this->autopool_updater($level_2,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_2_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

        }

        $level_3 = $this->get_direct_parent_at_position_autopool($random_user_id,0,3,'autopool',$package_amount);
        $level_3_user = $this->fetch_user_info("autopool",$level_3);

        if($level_3_user != null)
        {

        $this->createTransaction($user_id,$level_3_user->user_id,$amount_to,$package_amount,"pool",3,"","pending",$today,'pending','');
        $this->autopool_updater($level_3,1,$amount_to,0);

          $wallet_data = DB::table('wallet')->where('user_id','=',$level_3_user->user_id)->first();
          $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          }

        $level_4 = $this->get_direct_parent_at_position_autopool($random_user_id,0,4,'autopool',$package_amount);
        $level_4_user = $this->fetch_user_info("autopool",$level_4);

        if($level_4_user != null)
        {
        $this->createTransaction($user_id,$level_4_user->user_id,$amount_to,$package_amount,"pool",4,"","pending",$today,'pending','');
        $this->autopool_updater($level_4,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_4_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);


        $level_4_user = $this->fetch_user_info("autopool",$level_4);

        if($level_4_user->trans_count == 120)
        {
          $this->autopool_five($level_4_user->$user_id,40000); 

          $wallet_data = DB::table('wallet')->where('user_id','=',$level_4_user->user_id)->first();
          $wallet_update_data = [];
            $wallet_update_data['autopool_income'] = $wallet_data->autopool_income + 240000;
            $wallet_update_data['pool_upgrade'] = $wallet_data->autopool_income + 80000;
            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + 160000;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          // upgrade deduction
            
        }
      }
    }

    public function autopool_five($user_id,$package_amount)
    {
      $three_leg_parent = DB::table('autopool')
      ->where('count','<','3')
      ->where('amount','=',$package_amount)
      ->first();

        $amount_to = $package_amount/4;

        $random_user_id = "NSM".rand( 1000000 , 9999999 );

        $init_three_leg['user_id'] = $user_id;
        $init_three_leg['self_id'] = $random_user_id;
        $init_three_leg['count']   = '0';
        $init_three_leg['sponcer'] = $three_leg_parent->user_id;
        $init_three_leg['sponcer_self'] = $three_leg_parent->self_id;
        $init_three_leg['amount'] = $three_leg_parent->amount;

        DB::table('autopool')->insert($init_three_leg);

        $three_leg_parent_count = $three_leg_parent->count;
        $three_leg_update['count'] =$three_leg_parent_count+1;

        DB::table('autopool')
      ->where('id','=',$three_leg_parent->id)
      ->update($three_leg_update);

        $today = date('Y-m-d');


        $level_1 = $this->get_direct_parent_at_position_autopool($random_user_id,0,1,'autopool',$package_amount);
       
        $level_1_user = $this->fetch_user_info("autopool",$level_1);
        if($level_1_user != null)
        {
        $this->createTransaction($user_id,$level_1_user->user_id,$amount_to,$package_amount,"pool",1,"","pending",$today,'pending','');
        $this->autopool_updater($level_1,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_1_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

        }


        $level_2 = $this->get_direct_parent_at_position_autopool($random_user_id,0,2,'autopool',$package_amount);
        $level_2_user = $this->fetch_user_info("autopool",$level_2);

         if($level_2_user != null)
        {
        $this->createTransaction($user_id,$level_2_user->user_id,$amount_to,$package_amount,"pool",2,"","pending",$today,'pending','');
        $this->autopool_updater($level_2,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_2_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

        }

        $level_3 = $this->get_direct_parent_at_position_autopool($random_user_id,0,3,'autopool',$package_amount);
        $level_3_user = $this->fetch_user_info("autopool",$level_3);

        if($level_3_user != null)
        {

        $this->createTransaction($user_id,$level_3_user->user_id,$amount_to,$package_amount,"pool",3,"","pending",$today,'pending','');
        $this->autopool_updater($level_3,1,$amount_to,0);

          $wallet_data = DB::table('wallet')->where('user_id','=',$level_3_user->user_id)->first();
          $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          }

        $level_4 = $this->get_direct_parent_at_position_autopool($random_user_id,0,4,'autopool',$package_amount);
        $level_4_user = $this->fetch_user_info("autopool",$level_4);

        if($level_4_user != null)
        {
        $this->createTransaction($user_id,$level_4_user->user_id,$amount_to,$package_amount,"pool",4,"","pending",$today,'pending','');
        $this->autopool_updater($level_4,1,$amount_to,0);

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_4_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_pending'] = $wallet_data->autopool_pending + $amount_to;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);


        $level_4_user = $this->fetch_user_info("autopool",$level_4);

             if($level_4_user->trans_count == 120)
        {
          

            $wallet_data = DB::table('wallet')->where('user_id','=',$level_4_user->user_id)->first();
            $wallet_update_data = [];
            $wallet_update_data['autopool_income'] = $wallet_data->autopool_income + 1200000;
            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + 1200000;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          // upgrade deduction
            
        }
      }



    }



     public function make_deposite()
    
    {

       $themecheck1 = $this->themecheck();

       $user = Sentinel::check();


        return view(''.$themecheck1.'/activation/make_deposite')->with(compact('user','themecheck1')); 
    	 }
       

    public function make_deposite_solona_post(Request $request)
    {
      die();
         $this->validate($request,[
                                'amount'        => 'required',
                                'utr'           => 'required',
                              ]);


          $user             = Sentinel::check();
          $amount           = $request->input('amount');
          $amount_in_coin   = $request->input('amount_in_coin');
          $user_id          = $request->input('user_id');
          $utr              = $request->input('utr');
          $payment_type     = $request->input('field');
          $str=rand();
          $txn_Id   =md5($str);
            $random_hex = bin2hex(random_bytes(18));
        
         $reciever_id ='4jdGRTXYckVuQDCWk8Xbkwcan7iLREUR5QGVSHQ1HEDX';
          $update_link = urlencode("https://growfire.life/api/solana_getway");
          $redirect_link =urlencode("https://growfire.life/user/dashboard");


          $today = date('Y-m-d');
           
              if($request->has('image')) 
              {
                $file      = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename  = time().'.'.$extention;
                $file->move(public_path('screen_sort'),$filename);
                
                $data['image'] = $filename;
              }
               
              else{

                 $filename ="no file";

              }

            $data =DB::table('transaction')
                   ->where('utr','=',$utr)
                   ->count() >0;       
           
            if($data == $utr)
            {

                 Session::flash('error', 'This transaction number is already exists');      
                return redirect()->back();

            }

            else{
               /* public function createTransaction($sender_id,$reciever_id,$amount,$package,$reason,$level,$percentage,$approval,$date,$status,$utr)*/

               $spURL ="http://sol.uk18.in/payment_gateway/".$amount."/".$random_hex."/".$update_link."/".$reciever_id."/".$redirect_link;

                 return redirect()->to($spURL);








                $this->createTransaction("",$user->email,$amount,$amount_in_coin,"deposit",$payment_type,$filename,"pending",$today,'pending',$random_hex);
                


                    Session::flash('success', 'Fund Deposite Request Created Successfully');      
                    return redirect()->back();
            }

           
          
          
         
    }


    public function make_deposite_post(Request $request)
    {

         $this->validate($request,[
                                'amount'        => 'required',
                                'utr'           => 'required',
                              ]);


          $user             = Sentinel::check();
          $amount           = $request->input('amount');
          $amount_in_coin   = $request->input('amount_in_coin');
          $user_id          = $request->input('user_id');
          $utr              = $request->input('utr');
          $payment_type     = $request->input('field');

          //print_r($id);die();

          if($amount < 1)
          {
             Session::flash('error', 'Amount Should be greater than 1 GRM');      
                return redirect()->back();


          }


          $check_pending = DB::table('transaction')
          ->where('reciver','=',$user->email)
          ->where('reason','=','deposit')
          ->where('approval','=','pending')
          ->count();


           if($check_pending > 0)
          {
             Session::flash('error', 'You have to wait to clear your previous deposit request');      
                return redirect()->back();


          }
                  

        if($request->has('image')) 
              {
                $file      = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename  = time().'.'.$extention;
                
                
                /*$data['percentage'] = $filename;*/

              }
              else{
                 Session::flash('error', 'screen shot must be neddeed');      
                return redirect()->back();

              }

                    $allowed = array('jpeg', 'png', 'jpg');
                        $filename = $_FILES['image']['name'];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (!in_array($ext, $allowed)) {
                            Session::flash('error', 'invalide file ');
                           return redirect()->back(); 
                        }

                    $file->move(public_path('screen_sort'),$filename);
/*
               $id      = $request->input('id');
              $data    = DB::table('transaction')
                             ->where('id','=',$id)
                            ->update($data);*/
           



          $today = date('Y-m-d');
           
  

            $data =DB::table('transaction')
                   ->where('utr','=',$utr)
                   ->count() >0;       
           
            if($data == $utr)
            {

                 Session::flash('error', 'This transaction number is already exists');      
                return redirect()->back();

            }

            else{
                $this->createTransaction("",$user->email,$amount,$amount_in_coin,"deposit",$payment_type,$filename,"pending",$today,'pending',$utr);
                


                    Session::flash('success', 'Gold Deposite Request Created Successfully');      
                    return redirect()->back();
            }

           
          
          
         
    }



    public function getway($amount,$user_id,$reciever_id,$update_link)

    {


     // print_r($update_link); die();

       return redirect()->route($update_link);


    }


    public function solana_getway(){

     $status= $_GET['status'];


     if($status =="true")
     {
              $utr= $_GET['utr'];
              $trx_hash= $_GET['trx_hash'];

              $up_data['approval'] = 'completed';
              $up_data['trx_hash'] = $trx_hash;
              DB::table('transaction')->where('transaction_hash','=',$utr)->update($up_data);

     }

     else{
          $utr= $_GET['utr'];
            $up_data['approval'] = 'failed';
              DB::table('transaction')->where('transaction_hash','=',$utr)->update($up_data);


     }

    }



     public function make_deposite_inr()
    {

       $themecheck1 = $this->themecheck();

       $user = Sentinel::check();

       return view(''.$themecheck1.'/activation/make_deposite_inr')->with(compact('user','themecheck1')); 
    }

     public function fund_transfer_user()
    {
     
           $themecheck1 = $this->themecheck();
           
           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);

          // print_r($wallet_balance); die();

            return view(''.$themecheck1.'/activation/fund_transfer_user')->with(compact('user','themecheck1','wallet_balance')); 
    }

    public function fund_transfer_user_post(Request $request)
    {

        $this->validate($request,[

                                'transfer_amount'   => 'required',
                               
                                'transfer_to'       => 'required',

                                  'tpin'            => 'required',

                              ]);
          $user             = Sentinel::check();
          $transfer_amount  = $request->input('transfer_amount');
          $user_id          = $request->input('user_id');
          $transfer_to      = $request->input('transfer_to');
          $tpin             = $request->input('tpin');



          $WalletController = new WalletController;

          $wallet_balance = $WalletController->wallet($user->email);
             
          $user = Sentinel::check();

          if ($user->tpin != $request->input('tpin'))
           {
              Session::flash('error', 'TPin Not Same');      
               return redirect()->back();
          }

          if($transfer_amount < 0)
          {
               Session::flash('error', 'Invalid Amount');      
               return redirect()->back();
          }

          if($transfer_amount > $wallet_balance['activation_wallet'])
          {
               Session::flash('error', 'Amount is greated than your Activation wallet Amount');      
               return redirect()->back();
          }

           $data_setting = DB::table('setting')->first();
          $amt_min = $data_setting->minimum_deposite;

          if($transfer_amount < $amt_min){

               Session::flash('error', 'Amount should be greater then 20$');      
               return redirect()->back();
          }

          $today = date('Y-m-d');


         if($user->email != $transfer_to )
         {
           $transfer_to_data = DB::table('users')
                        ->where('email','=',$transfer_to)
                        ->first();

           if(isset($transfer_to_data))
           {
            $this->createTransaction($user->email,$transfer_to,$transfer_amount,"",'fund_transfer',"","","completed",$today,"completed","");

                // fund transfer sender deduct
                $wallet_data = DB::table('wallet')->where('user_id','=',$user->email)->first();
                $wallet_update_data = [];
                $wallet_update_data['activation_wallet_balance'] = $wallet_data->activation_wallet_balance - $transfer_amount;
                $wallet_update_data['total_fund_out'] = $wallet_data->total_fund_out + $transfer_amount;
                $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

                // fund transfer reciver add
                $wallet_data = DB::table('wallet')->where('user_id','=',$transfer_to)->first();
                $wallet_update_data = [];
                $wallet_update_data['activation_wallet_balance'] = $wallet_data->activation_wallet_balance + $transfer_amount;
                $wallet_update_data['total_fund_in'] = $wallet_data->total_fund_in + $transfer_amount;
                $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

     
            Session::flash('success', 'Fund Transfer Request Created Successfully');      
            return redirect()->back();
            } 

            else
            {
                Session::flash('error', 'User Id Does Not Exist');      
                return redirect()->back();
            } 
        }
        else
        {
            Session::flash('error', 'Can not able to transfer yourself');      
            return redirect()->back();
        }
          

    }

     public function internal_transfer()
    {
    	
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);

            return view(''.$themecheck1.'/activation/internal_transfer')->with(compact('user','themecheck1','wallet_balance')); 
    }

    public function internal_transfer_post(Request $request)
    {
         $this->validate($request,[
                                'transfer_amount'        => 'required',
                                
                              ]);

//print_r($request->input('transfer_amount')); die();

          $user             = Sentinel::check();
          $transfer_amount  = $request->input('transfer_amount');

           $childs = DB::table('users')->where('sponcer_id','=',$user->email)->where('is_active','=','active')->count();

          if($childs < 2)
          {
          	Session::flash('error', 'Minimum Two Directs Necessary');      
               return redirect()->back();
          }
         
          

          $WalletController = new WalletController;

          $wallet_balance = $WalletController->wallet($user->email);

       
          if($transfer_amount > $wallet_balance['income_wallet'])
          {
             Session::flash('error', 'Amount is greated than your Activation wallet Amount');      
            return redirect()->back();
          }

            $data_setting = DB::table('setting')->first();
          $amt_min = $data_setting->minimum_deposite;

          if($transfer_amount < $amt_min){

               Session::flash('error', 'Amount should be greater then 20$');      
               return redirect()->back();
          }


          $check_sponser=DB::table('users')
                ->where('sponcer_id','=',$user->email)
                ->count();

                

          if($check_sponser<2){
             Session::flash('error', 'Your Direct Member Less Than 2 ');      
            return redirect()->back();
          }

          
          $today = date('Y-m-d');
 
          $this->createTransaction($user->email,$user->email,$transfer_amount,"",'internal_transfer',"","","completed",$today,"completed","");

                $wallet_data = DB::table('wallet')->where('user_id','=',$user->email)->first();
                $wallet_update_data = [];
                $wallet_update_data['activation_wallet_balance'] = $wallet_data->activation_wallet_balance + $transfer_amount;
                $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance - $transfer_amount;
                $this->wallet_updater($wallet_update_data,$wallet_data->user_id);
     
           Session::flash('success', 'Fund Transfer Request Created Successfully');      
          return redirect()->back();  

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

         public function get_direct_parent_at_position($user_id,$position,$at_position)
          {
            $self = \DB::table('users')
            ->where(['email'=>$user_id])
            ->first();
            
            if(empty($self))
            {
                return "false";
            }
         
                $parent = $self->sponcer_id;
                $position = $position+1;
                
                if($position == $at_position)
                {
                    return $parent;
                }
                return $this->get_direct_parent_at_position($parent,$position,$at_position); 
          }

          public function user_status($user_id)
          {
             $user = \DB::table('users')->where(['email'=>$user_id])->first();
             
             if(empty($user))
             {
                 return "not_exist";
             }
             
             if($user->is_active=="active")
             {
                 return "active";
             }
             elseif($user->is_active=="inactive")
             {
                 return "inactive";
             }
             else
             {
                 return "block";
             }
        }





          public function generate_roi_income()
            {
              $today = date('Y-m-d');
              $ten_day = date ('Y-m-d', strtotime ('-10 day'));
              $roi_income_trans = \DB::table('transaction')
              ->whereBetween('date',[$ten_day,$today])
              ->where('reason','=','roi')
              ->get();

              foreach($roi_income_trans  as $value)
              {

                  $reciever = \DB::table('users')->where('email','=',$value->reciver)->first();

                  if(isset($reciever))
                  {



                  $get_last_update =    DB::table('transaction')
                                ->where('approval','=','completed')
                                ->where('reason','=','activate_package')
                                ->where('reciver','=',$reciever->email)
                                ->orderBy('id', 'DESC')
                                ->first();

                    if(isset($get_last_update)) 
                      {
                         $date = $get_last_update->date;

                      }
                      else
                      {
                         $date = "2020-08-07";
                      }
                     $changeDate = date('Y-m-d', strtotime('+7 days', strtotime($date)));
                     $today = date('Y-m-d');

               //   print_r($reciever);

                 if(isset($reciever))
                {

                      if($reciever->is_active == "active" && $changeDate > $today)
                      {
                         
                         // function createTransaction($sender_id,$reciever_id,$amount,$package,$reason,$level,$percentage,$approval,$date,$status,$utr)

                          $this->createTransaction("",$reciever->email,$value->amount,$value->package,'roi_income',"",$value->percentage,"completed",$today,"completed","");
             
                      }
                            

                      else
                      {
                          $this->createTransaction("",$reciever->email,$value->amount,$value->package,'roi_income',"",$value->percentage,"failed",$today,"failed","");
                      }

                  }
                }

              }

            }




          public function generate_roi_level_income()
            {
              $today = date('Y-m-d');
              $ten_day = date ('Y-m-d', strtotime ('-10 day'));
              $roi_income_trans = \DB::table('transaction')
              ->whereBetween('date',[$ten_day,$today])
              ->where('reason','=','level')
              ->get();

              foreach($roi_income_trans  as $value)
              {

                  $reciever = \DB::table('users')->where('email','=',$value->reciver)->first();

               //   print_r($reciever);


                 if(isset($reciever))
                {

                    $get_last_update =    DB::table('transaction')
                                ->where('approval','=','completed')
                                ->where('reason','=','activate_package')
                                ->where('reciver','=',$reciever->email)
                                ->orderBy('id', 'DESC')
                                ->first();
                      if(isset($get_last_update)) 
                      {
                         $date = $get_last_update->date;

                      }
                      else
                      {
                         $date = "2020-08-07";
                      }      
                    
                     $changeDate = date('Y-m-d', strtotime('+7 days', strtotime($date)));
                     $today = date('Y-m-d');

                      if($reciever->is_active == "active" && $changeDate > $today)
                      {

                        $rec_direct = \DB::table('users')
                        ->where('sponcer_id','=',$value->reciver)
                        ->where('is_active','=','active')
                        ->count();

                        $get_last_update_sender =    DB::table('transaction')
                                ->where('approval','=','completed')
                                ->where('reason','=','activate_package')
                                ->where('reciver','=',$value->sender)
                                ->orderBy('id', 'DESC')
                                ->first();
                      if(isset($get_last_update_sender)) 
                      {
                         $date = $get_last_update_sender->date;

                      }
                      else
                      {
                         $date = "2020-08-07";
                      }      
                    
                     $changeDate = date('Y-m-d', strtotime('+7 days', strtotime($date)));
                     $today = date('Y-m-d');

                         
                         // function createTransaction($sender_id,$reciever_id,$amount,$package,$reason,$level,$percentage,$approval,$date,$status,$utr)

                     if($changeDate > $today)
                     {




                        if($value->level == 1 && $rec_direct >= 1)
                        {

                             $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");

                        }

                        elseif($value->level == 2 && $rec_direct >= 2)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }

                        elseif($value->level == 3 && $rec_direct >= 4)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }

                        elseif($value->level == 4 && $rec_direct >= 5)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }

                        elseif($value->level == 5 && $rec_direct >= 8)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }

                        elseif($value->level == 6 && $rec_direct >= 8)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }

                        elseif($value->level == 7 && $rec_direct >= 8)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }

                        elseif($value->level == 8 && $rec_direct >= 9)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }


                        elseif($value->level == 9 && $rec_direct >= 10)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }

                        elseif($value->level == 10 && $rec_direct >= 11)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }

                        elseif($value->level == 11 && $rec_direct >= 12)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }
                        
                        elseif($value->level == 12 && $rec_direct >= 13)
                        {
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"completed",$today,"completed","");


                        }                              

                        else
                        {
                             $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"failed",$today,"failed","");

                        }


                        }


                        else{
                            $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"failed",$today,"failed","");

                        }             
                      }
                            

                      else
                      {
                          $this->createTransaction($value->sender,$reciever->email,$value->percentage,$value->package,'level_roi',"",$value->percentage,"failed",$today,"failed","");
                      }
                }

              }

            }



             public function day_roi_generate()
        {
          $yesterday = date('Y-m-d',strtotime("-1 days"));
          $today = date('Y-m-d');

          $yesterday_joining = DB::table('transaction')->where('reason','=','activate_package')->where('date','=',$yesterday)->get();
          $total_amount = 0;
          foreach ($yesterday_joining as $key => $value) {
                
            $total_amount = $total_amount + 50;
          }


          

          $user_count = DB::table('users')->where('is_active','=','active')->count();

          $users = DB::table('users')->where('is_active','=','active')->get();

          $amount_dist = $total_amount/$user_count;

          $this->createTransaction('system_000','system_001','50',$amount_dist,'self_roi',$total_amount,'',"completed",$today,"completed","");

          foreach ($users as $key => $value) {
                
                $wallet_data = DB::table('wallet')->where('user_id','=',$value->email)->first();
                $wallet_update_data = [];
                $wallet_update_data['roi_income'] = $wallet_data->roi_income + $amount_dist;
                $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $amount_dist;
                $this->wallet_updater($wallet_update_data,$wallet_data->user_id);
              

          }


          
        }



             public function get_direct_parent_at_position_autopool($user_id,$position,$at_position,$table,$package_id)
          {
            $self = \DB::table($table)
            ->where(['self_id'=>$user_id])
            ->where('package_id','=',$package_id)
            ->first();
            
            if(empty($self))
            {
                return "false";
            }
         
                $parent = $self->sponcer_self;
                $position = $position+1;
                
                if($position == $at_position)
                {
                    return $parent;
                }
                return $this->get_direct_parent_at_position_autopool($parent,$position,$at_position,$table,$package_id); 
          }

           public function fetch_user_info($tablename,$self_id)
    {
        $leg_info = DB::table($tablename)->where('self_id','=',$self_id)->first();
        return $leg_info;
    }



    public function autopool_updater($self_id,$trans_count,$amount_earn,$upgrade)
    {
        $autopool_data = DB::table('autopool')
        ->where('self_id','=',$self_id)
        ->first();


        $data['trans_count'] = $autopool_data->trans_count + $trans_count;
        $data['amount_earn'] = $autopool_data->amount_earn + $amount_earn;
        $data['upgrade'] = $autopool_data->upgrade + $upgrade;

        DB::table('autopool')
        ->where('self_id','=',$self_id)
        ->update($data);


    }


    public function wallet_updater($wallet_update_data, $user_id)
    {

        DB::table('wallet')->where('user_id','=',$user_id)->update($wallet_update_data);

    }


    public function get_circle($email)
    {
      $user = DB::table('users')->where('email','=',$email)->first();

      $childs = DB::table('users')->where('sponcer_id','=',$user->email)->where('is_active_10','=','active')->get();

      $circle_count = 0;

      foreach ($childs as $key => $value) {

          $child_2 = DB::table('users')->where('sponcer_id','=',$value->email)->where('is_active_10','=','active')->count();

          if($child_2 >= 2)
          {
            $circle_count ++;
          }

      }

      $team_booster =0;

      if($circle_count >= 2)
      {
        $res= $circle_count/2;
         $res1 = round($res-0.5);

        $team_booster = $res1*50;
      }

      return $team_booster;

    }


    public function set_time_and_create_autopool($email)
    {
        $activation = DB::table('transaction')->where('reason','=','activate_package')->where('reciver','=',$email)->first();

        $today = date('Y-m-d');
        $my_child = DB::table('users')->where('sponcer_id','=',$email)->where('is_active','=','active')->count();

        if(isset($activation))
        {
        	 $activation_date = $activation->created_at;
        }
        else
        {
        	$activation_date = date('2030-11-11');
        }


        $sponcer_income = 0;
        

        $bronze_50_time = date("Y-m-d", strtotime($activation_date ." +15 day"));
        $bronze_100_time = date("Y-m-d", strtotime($activation_date ." +30 day"));

        $grand_bronze_50_time = date("Y-m-d", strtotime($activation_date ." +45 day"));
        $grand_bronze_100_time = date("Y-m-d", strtotime($activation_date ." +60 day"));

        $silver_50_time = date("Y-m-d", strtotime($activation_date ." +75 day"));
        $silver_100_time = date("Y-m-d", strtotime($activation_date ." +90 day"));


        $grand_silver_50_time = date("Y-m-d", strtotime($activation_date ." +105 day"));
        $grand_silver_100_time = date("Y-m-d", strtotime($activation_date ." +120 day"));

        $gold_50_time = date("Y-m-d", strtotime($activation_date ." +135 day"));
        $gold_100_time = date("Y-m-d", strtotime($activation_date ." +150 day"));

        $grand_gold_50_time = date("Y-m-d", strtotime($activation_date ." +165 day"));
        $grand_gold_100_time = date("Y-m-d", strtotime($activation_date ." +180 day"));

        $platinum_50_time = date("Y-m-d", strtotime($activation_date ." +225 day"));
        $platinum_100_time = date("Y-m-d", strtotime($activation_date ." +270 day"));


        $grand_platinum_50_time = date("Y-m-d", strtotime($activation_date ." +315 day"));
        $grand_platinum_100_time = date("Y-m-d", strtotime($activation_date ." +360 day"));

        $diamond_50_time = date("Y-m-d", strtotime($activation_date ." +405 day"));
        $diamond_100_time = date("Y-m-d", strtotime($activation_date ." +450 day"));


        $grand_diamond_50_time = date("Y-m-d", strtotime($activation_date ." +495 day"));
        $grand_diamond_100_time = date("Y-m-d", strtotime($activation_date ." +540 day"));




        $bronze = [];

        $bronze['is_active'] = 'no';

        $today = date('Y-m-d');

      //  echo $today;

        // initializer
        // bronze

              $bronze['is_active'] = 'active';
              $bronze['amount1'] = '0';
              $bronze['amount2'] = '0';
              $bronze['people1'] = '0';
              $bronze['people2'] = '0';
              $bronze['next_upgrade'] = '0';
              $bronze['net_self'] = '0';
              $bronze['total'] = '0';
              $bronze['date_50'] = $bronze_50_time;
              $bronze['date_100'] = $bronze_100_time;

              // grand bronze

              $grand_bronze['is_active'] = 'no';
              $grand_bronze['amount1'] = '0';
              $grand_bronze['amount2'] = '0';
              $grand_bronze['people1'] = '0';
              $grand_bronze['people2'] = '0';
              $grand_bronze['next_upgrade'] = '0';
              $grand_bronze['net_self'] = '0';
              $grand_bronze['total'] = '0';
              $grand_bronze['date_50'] = $grand_bronze_50_time;
              $grand_bronze['date_100'] = $grand_bronze_100_time;


              // silver

              $silver['is_active'] = 'no';
              $silver['amount1'] = '0';
              $silver['amount2'] = '0';
              $silver['people1'] = '0';
              $silver['people2'] = '0';
              $silver['next_upgrade'] = '0';
              $silver['net_self'] = '0';
              $silver['total'] = '0';
              $silver['date_50'] = $silver_50_time;
              $silver['date_100'] = $silver_100_time;



              //  grand silver

              $grand_silver['is_active'] = 'no';
              $grand_silver['amount1'] = '0';
              $grand_silver['amount2'] = '0';
              $grand_silver['people1'] = '0';
              $grand_silver['people2'] = '0';
              $grand_silver['next_upgrade'] = '0';
              $grand_silver['net_self'] = '0';
              $grand_silver['total'] = '0';
              $grand_silver['date_50'] = $grand_silver_50_time;
              $grand_silver['date_100'] = $grand_silver_100_time;

              // gold

              $gold['is_active'] = 'no';
              $gold['amount1'] = '0';
              $gold['amount2'] = '0';
              $gold['people1'] = '0';
              $gold['people2'] = '0';
              $gold['next_upgrade'] = '0';
              $gold['net_self'] = '0';
              $gold['total'] = '0';
              $gold['date_50'] = $gold_50_time;
              $gold['date_100'] = $gold_100_time;

              //  grand gold

              $grand_gold['is_active'] = 'no';
              $grand_gold['amount1'] = '0';
              $grand_gold['amount2'] = '0';
              $grand_gold['people1'] = '0';
              $grand_gold['people2'] = '0';
              $grand_gold['next_upgrade'] = '0';
              $grand_gold['net_self'] = '0';
              $grand_gold['total'] = '0';
              $grand_gold['date_50'] = $grand_gold_50_time;
              $grand_gold['date_100'] = $grand_gold_100_time; 

             // platinum

              $platinum['is_active'] = 'no';
              $platinum['amount1'] = '0';
              $platinum['amount2'] = '0';
              $platinum['people1'] = '0';
              $platinum['people2'] = '0';
              $platinum['next_upgrade'] = '0';
              $platinum['net_self'] = '0';
              $platinum['total'] = '0';
              $platinum['date_50'] = $platinum_50_time;
              $platinum['date_100'] = $platinum_100_time; 

              //  grand platinum

              $grand_platinum['is_active'] = 'no';
              $grand_platinum['amount1'] = '0';
              $grand_platinum['amount2'] = '0';
              $grand_platinum['people1'] = '0';
              $grand_platinum['people2'] = '0';
              $grand_platinum['next_upgrade'] = '0';
              $grand_platinum['net_self'] = '0';
              $grand_platinum['total'] = '0';
              $grand_platinum['date_50'] = $grand_platinum_50_time;
              $grand_platinum['date_100'] = $grand_platinum_100_time;

               // diamond

              $diamond['is_active'] = 'no';
              $diamond['amount1'] = '0';
              $diamond['amount2'] = '0';
              $diamond['people1'] = '0';
              $diamond['people2'] = '0';
              $diamond['next_upgrade'] = '0';
              $diamond['net_self'] = '0';
              $diamond['total'] = '0';
              $diamond['date_50'] = $diamond_50_time;
              $diamond['date_100'] = $diamond_100_time;
              //  grand diamond

              $grand_diamond['is_active'] = 'no';
              $grand_diamond['amount1'] = '0';
              $grand_diamond['amount2'] = '0';
              $grand_diamond['people1'] = '0';
              $grand_diamond['people2'] = '0';
              $grand_diamond['next_upgrade'] = '0';
              $grand_diamond['net_self'] = '0';
              $grand_diamond['total'] = '0';
              $grand_diamond['date_50'] = $diamond_50_time;
              $grand_diamond['date_100'] = $diamond_100_time;

              

        if($today >= $bronze_50_time)
        {
              $bronze['is_active'] = 'yes';
              $bronze['amount1'] = '28';
              $bronze['people1'] = '2';
        }


        if($today >= $bronze_100_time)
        {
              $bronze['amount2'] = '56';
              $bronze['total'] = '84';
              $bronze['people2'] = '4';
              $bronze['next_upgrade'] = '30';
              $bronze['net_self'] = '54';

              // grand bronze initialize

              $grand_bronze['is_active'] = 'yes';
              
        }

        // grand bronze

        if($today >= $grand_bronze_50_time)
        {
              $grand_bronze['is_active'] = 'yes';
              $grand_bronze['amount1'] = '60';
              $grand_bronze['people1'] = '2';
        }


        if($today >= $grand_bronze_100_time && $my_child >= 6)
        {
              $grand_bronze['amount2'] = '120';
              $grand_bronze['total'] = '180';
              $grand_bronze['people2'] = '4';
              $grand_bronze['next_upgrade'] = '60';
              $grand_bronze['net_self'] = '100';


              // silver initialize

              $silver['is_active'] = 'yes';
              
        }


        //silver income


        if($today >= $silver_50_time && $my_child >= 10)
        {
              $silver['is_active'] = 'yes';
              $silver['amount1'] = '120';
              $silver['people1'] = '2';
              
        }


        if($today >= $silver_100_time  )
        {
              $silver['amount2'] = '240';
              $silver['total'] = '360';
              $silver['people2'] = '4';
              $silver['next_upgrade'] = '200';
              $silver['net_self'] = '120';
              
              $sponcer_income = '40';

              // silver initialize

              $grand_silver['is_active'] = 'yes';
              
        }


        // grand silver

        if($today >= $grand_silver_50_time && $my_child >= 14)
        {
              $grand_silver['is_active'] = 'yes';
              $grand_silver['amount1'] = '240';
              $grand_silver['people1'] = '2';
        }


        if($today >= $grand_silver_100_time )
        {
              $grand_silver['amount2'] = '480';
              $grand_silver['total'] = '720';
              $grand_silver['people2'] = '4';
              $grand_silver['next_upgrade'] = '240';
              $grand_silver['net_self'] = '400';
              $sponcer_income = '120';

              // grand silver initialize

              $gold['is_active'] = 'yes';
        
        }

      // gold

        if($today >= $gold_50_time && $my_child >= 18)
        {
              $gold['is_active'] = 'yes';
              $gold['amount1'] = '480';
              $gold['people1'] = '2';
              
        }


        if($today >= $gold_100_time)
        {
              $gold['amount2'] = '960';
              $gold['total'] = '1440';
              $gold['people2'] = '4';
              $gold['next_upgrade'] = '480';
              $gold['net_self'] = '800';
              $sponcer_income = '280';

              // grand gold initialize

              $grandgold['is_active'] = 'yes';
            
        }
     // grand gold

        if($today >= $grand_gold_50_time && $my_child >= 22)
        {
              $gold['is_active'] = 'yes';
              $gold['amount1'] = '960';
              $gold['people1'] = '2';
        }


        if($today >= $grand_gold_100_time)
        {
              $grandgold['amount2'] = '1920';
              $grandgold['total'] = '2880';
              $grandgold['people2'] = '4';
              $grandgold['next_upgrade'] = '960';
              $grandgold['net_self'] = '1600';
              $sponcer_income = '600';

              // Platinum initialize

              $platinum['is_active'] = 'yes';
            
             
        }
        // platinum

        if($today >= $platinum_50_time && $my_child >= 26)
        {
              $platinum['is_active'] = 'yes';
              $platinum['amount1'] = '1920';
              $platinum['people1'] = '2';
        }


        if($today >= $platinum_100_time)
        {
              $platinum['amount2'] = '3840';
              $platinum['total'] = '5760';
              $platinum['people2'] = '4';
              $platinum['next_upgrade'] = '1920';
              $platinum['net_self'] = '3200';
              $sponcer_income = '1240';

              // grand Platinum initialize

              $grandplatinum['is_active'] = 'yes';
            
        }
// grand platinum

        if($today >= $grand_platinum_50_time && $my_child >= 30)
        {
              $grandplatinum['is_active'] = 'yes';
              $grandplatinum['amount1'] = '3840';
              $grandplatinum['people1'] = '2';
        }


        if($today >= $platinum_100_time)
        {
              $grandplatinum['amount2'] = '7680';
              $grandplatinum['total'] = '11520';
              $grandplatinum['people2'] = '6';
              $grandplatinum['next_upgrade'] = '3840';
              $grandplatinum['net_self'] = '6400';

              $sponcer_income = '2320';
              // diamond

              $diamond['is_active'] = 'yes';
              
        }


        $data = [];
        $data['bronze'] = $bronze;
        $data['grand_bronze'] = $grand_bronze;
        $data['gold'] = $gold;
        $data['grand_gold'] = $grand_gold;
        $data['silver'] = $silver;
        $data['grand_silver'] = $grand_silver;
        $data['platinum'] = $platinum;
        $data['grand_platinum'] = $grand_platinum;
        $data['diamond'] = $diamond;
        $data['grand_diamond'] = $grand_diamond;
        $data['sponcer_income'] = $sponcer_income;
        $data['autopool_income'] = $bronze['net_self'] + $grand_bronze['net_self'] + $gold['net_self'] +$grand_gold['net_self'] +$silver['net_self'] +$grand_silver['net_self'] +$platinum['net_self'] +$grand_platinum['net_self'] +$diamond['net_self'] +$grand_diamond['net_self'];

        $data['autopool_earning'] = $bronze['total'] + $grand_bronze['total'] + $gold['total'] +$grand_gold['total'] +$silver['total'] +$grand_silver['total'] +$platinum['total'] +$grand_platinum['total'] +$diamond['total'] +$grand_diamond['total'];

        $data['autopool_earning_t'] = $bronze['amount1'] + $bronze['amount2'] + $grand_bronze['amount1']+ $grand_bronze['amount2'] + $gold['amount1'] + $gold['amount2'] +$grand_gold['amount1'] +$grand_gold['amount2'] +$silver['amount1']+$silver['amount2'] +$grand_silver['amount1']+$grand_silver['amount2'] +$platinum['amount1']+$platinum['amount2'] +$grand_platinum['amount1'] +$grand_platinum['amount2'] +$diamond['amount1'] +$diamond['amount2'] +$grand_diamond['amount1'] +$grand_diamond['amount2'];

        return $data;

    }


    public function rapid_fire($package_amount,$user_id)
    {
         // two leg matrix calculation
        $date = date('Y-m-d');
          $to_pay = $this->two_leg_auto($package_amount,$user_id);
          if($to_pay != null)
          {


            $this->createTransaction($user_id,$to_pay->user_id,$package_amount,$package_amount,'RAPIDFIRE',1,'','completed',$date,'completed','');


          }
          else
          {
            

            $this->createTransaction($user_id,'uk',$package_amount,$package_amount,'RAPIDFIRE',1,'','completed',$date,'completed','');
          }
            
        
    }


    public function two_leg_auto($package_amount,$user_id)
    {

        // create two leg matrix here
        $two_leg_parent_find = DB::table('two_leg')->where('count','<','2')->where('amount','=',$package_amount)->first();

        $two_leg_parent_id = $this->fetch_rapid_exact(($two_leg_parent_find->id-1),$package_amount);

        $two_leg_parent = DB::table('two_leg')->where('id','=',$two_leg_parent_id)->first();


        if(empty($two_leg_parent))
        {
            $two_leg_parent = $two_leg_parent_find;
        }


        $random_user_id = "GROW".rand( 1000000 , 9999999 );

        $init_two_leg['user_id'] = $user_id;
        $init_two_leg['self_id'] = $random_user_id;
        $init_two_leg['count']   = '0';
        $init_two_leg['sponcer'] = $two_leg_parent->self_id;
        $init_two_leg['sponcer_self'] = $two_leg_parent->user_id;
        $init_two_leg['amount'] = $two_leg_parent->amount;

        DB::table('two_leg')->insert($init_two_leg);


         //update three leg sponcer

        $increase_count = [];

        $increase_count['count'] = $two_leg_parent->count + 1;

        DB::table('two_leg')->where('id','=',$two_leg_parent->id)->update($increase_count);
           


            if($two_leg_parent->place_one == null)
        {
             $update_data['place_one'] = $random_user_id;
             DB::table('two_leg')->where('self_id','=',$two_leg_parent->self_id)->update($update_data);
             return $two_leg_parent;
             
        }

            elseif($two_leg_parent->place_two == null)
        {
             $update_data['place_two'] = $random_user_id;
             DB::table('two_leg')->where('self_id','=',$two_leg_parent->self_id)->update($update_data);
             return $this->two_leg_auto($package_amount,$two_leg_parent->user_id);

             
        }


    }

    public function fetch_rapid_exact($id,$amount)
    {
        

        $rapid_details = DB::table('two_leg')
        ->where('id','>',$id)
        ->where('count','<',2)
        ->where('amount','=',$amount)
        ->first();

        $id = $rapid_details->id;

        $r_count = DB::table('two_leg')
        ->where('user_id','=',$rapid_details->user_id)
        ->where('amount','=',$rapid_details->amount)
        ->where('count','=',2)
        ->orderBy('id', 'DESC')
        ->count();

        if($rapid_details->user_id == "REAL")
            {
                return $rapid_details->id;
            }
            else
            {
                return $this->fetch_rapid_exact(($id),$amount);
            }

        if($r_count >= 1)
        {

            if($rapid_details->user_id == "REAL")
            {
                return $rapid_details->id;
            }
            else
            {
                return $this->fetch_rapid_exact(($id),$amount);
            }

            

             $r_user = DB::table('users')->where('email','=',$rapid_details->user_id)->first();


             $r_child_count = DB::table('users')->where('sponcer_id','=',$r_user->email)->count();
             if($r_child_count >= 20)
             {
                $child_act_count=0;
                $r_child_data = DB::table('users')->where('sponcer_id','=',$r_user->email)->get();
                foreach ($r_child_data as $key => $value) {
                        
                        $child_trans_c = DB::table('transaction')->where('sender','=',$value->email)->where('reason','=','activate_package')->where('package','=',$amount)->count();

                        if($child_trans_c > 0)
                        {
                            $child_act_count++;
                        }
                }


                if($child_act_count >= 20)
                {
                    return $rapid_details->id;
                }
                else
                {
                    return $this->fetch_rapid_exact(($id),$amount);
                }
             }
             else
             {
                return $this->fetch_rapid_exact(($id),$amount);
             }

             

        }
        else
        {
            return $rapid_details->id;
        }
    }

    public function test_db()
    {
        // $exitCode = Artisan::call('cache:clear');
        // $exitCode = Artisan::call('config:clear');
    //  $databaseName = DB::connection()->getDatabaseName();


    //dd($databaseName);

        $this->two_leg_auto('10',$_GET['user_id']);

        $data['amount'] = 0;
        //DB::table('products')->insert($data);
    }









     public function direct_sponcer_income_calculate($email)
    {
        $activation = DB::table('transaction')->where('reason','=','activate_package')->where('reciver','=',$email)->first();


        $today = date('Y-m-d');
        $my_child = DB::table('users')->where('sponcer_id','=',$email)->where('is_active','=','active')->count();

        if(isset($activation))
        {
           $activation_date = $activation->created_at;
        }
        else
        {
          $activation_date = date('2030-11-11');
        }


        $sponcer_income = 0;
        

        $bronze_50_time = date("Y-m-d H:i:s", strtotime($activation_date ." +15 day"));
        $bronze_100_time = date("Y-m-d", strtotime($activation_date ." +30 day"));

        $grand_bronze_50_time = date("Y-m-d", strtotime($activation_date ." +45 day"));
        $grand_bronze_100_time = date("Y-m-d", strtotime($activation_date ." +60 day"));

        $silver_50_time = date("Y-m-d", strtotime($activation_date ." +75 day"));
        $silver_100_time = date("Y-m-d", strtotime($activation_date ." +90 day"));


        $grand_silver_50_time = date("Y-m-d", strtotime($activation_date ." +105 day"));
        $grand_silver_100_time = date("Y-m-d", strtotime($activation_date ." +120 day"));

        $gold_50_time = date("Y-m-d", strtotime($activation_date ." +135 day"));
        $gold_100_time = date("Y-m-d", strtotime($activation_date ." +150 day"));

        $grand_gold_50_time = date("Y-m-d", strtotime($activation_date ." +165 day"));
        $grand_gold_100_time = date("Y-m-d", strtotime($activation_date ." +180 day"));

        $platinum_50_time = date("Y-m-d", strtotime($activation_date ." +225 day"));
        $platinum_100_time = date("Y-m-d", strtotime($activation_date ." +270 day"));


        $grand_platinum_50_time = date("Y-m-d", strtotime($activation_date ." +315 day"));
        $grand_platinum_100_time = date("Y-m-d", strtotime($activation_date ." +360 day"));

        $diamond_50_time = date("Y-m-d", strtotime($activation_date ." +405 day"));
        $diamond_100_time = date("Y-m-d", strtotime($activation_date ." +450 day"));


        $grand_diamond_50_time = date("Y-m-d", strtotime($activation_date ." +495 day"));
        $grand_diamond_100_time = date("Y-m-d", strtotime($activation_date ." +540 day"));




        $bronze = [];

        $bronze['is_active'] = 'no';

        $today = date('Y-m-d H:i:s');

        // initializer
        // bronze

              $bronze['is_active'] = 'yes';
              $bronze['amount1'] = '0';
              $bronze['amount2'] = '0';
              $bronze['people1'] = '0';
              $bronze['people2'] = '0';
              $bronze['next_upgrade'] = '0';
              $bronze['net_self'] = '0';
              $bronze['total'] = '0';
              $bronze['date_50'] = $bronze_50_time;
              $bronze['date_100'] = $bronze_100_time;

              // grand bronze

              $grand_bronze['is_active'] = 'no';
              $grand_bronze['amount1'] = '0';
              $grand_bronze['amount2'] = '0';
              $grand_bronze['people1'] = '0';
              $grand_bronze['people2'] = '0';
              $grand_bronze['next_upgrade'] = '0';
              $grand_bronze['net_self'] = '0';
              $grand_bronze['total'] = '0';
              $grand_bronze['date_50'] = $grand_bronze_50_time;
              $grand_bronze['date_100'] = $grand_bronze_100_time;


              // silver

              $silver['is_active'] = 'no';
              $silver['amount1'] = '0';
              $silver['amount2'] = '0';
              $silver['people1'] = '0';
              $silver['people2'] = '0';
              $silver['next_upgrade'] = '0';
              $silver['net_self'] = '0';
              $silver['total'] = '0';
              $silver['date_50'] = $silver_50_time;
              $silver['date_100'] = $silver_100_time;



              //  grand silver

              $grand_silver['is_active'] = 'no';
              $grand_silver['amount1'] = '0';
              $grand_silver['amount2'] = '0';
              $grand_silver['people1'] = '0';
              $grand_silver['people2'] = '0';
              $grand_silver['next_upgrade'] = '0';
              $grand_silver['net_self'] = '0';
              $grand_silver['total'] = '0';
              $grand_silver['date_50'] = $grand_silver_50_time;
              $grand_silver['date_100'] = $grand_silver_100_time;

              // gold

              $gold['is_active'] = 'no';
              $gold['amount1'] = '0';
              $gold['amount2'] = '0';
              $gold['people1'] = '0';
              $gold['people2'] = '0';
              $gold['next_upgrade'] = '0';
              $gold['net_self'] = '0';
              $gold['total'] = '0';
              $gold['date_50'] = $gold_50_time;
              $gold['date_100'] = $gold_100_time;

              //  grand gold

              $grand_gold['is_active'] = 'no';
              $grand_gold['amount1'] = '0';
              $grand_gold['amount2'] = '0';
              $grand_gold['people1'] = '0';
              $grand_gold['people2'] = '0';
              $grand_gold['next_upgrade'] = '0';
              $grand_gold['net_self'] = '0';
              $grand_gold['total'] = '0';
              $grand_gold['date_50'] = $grand_gold_50_time;
              $grand_gold['date_100'] = $grand_gold_100_time; 

             // platinum

              $platinum['is_active'] = 'no';
              $platinum['amount1'] = '0';
              $platinum['amount2'] = '0';
              $platinum['people1'] = '0';
              $platinum['people2'] = '0';
              $platinum['next_upgrade'] = '0';
              $platinum['net_self'] = '0';
              $platinum['total'] = '0';
              $platinum['date_50'] = $platinum_50_time;
              $platinum['date_100'] = $platinum_100_time; 

              //  grand platinum

              $grand_platinum['is_active'] = 'no';
              $grand_platinum['amount1'] = '0';
              $grand_platinum['amount2'] = '0';
              $grand_platinum['people1'] = '0';
              $grand_platinum['people2'] = '0';
              $grand_platinum['next_upgrade'] = '0';
              $grand_platinum['net_self'] = '0';
              $grand_platinum['total'] = '0';
              $grand_platinum['date_50'] = $grand_platinum_50_time;
              $grand_platinum['date_100'] = $grand_platinum_100_time;

               // diamond

              $diamond['is_active'] = 'no';
              $diamond['amount1'] = '0';
              $diamond['amount2'] = '0';
              $diamond['people1'] = '0';
              $diamond['people2'] = '0';
              $diamond['next_upgrade'] = '0';
              $diamond['net_self'] = '0';
              $diamond['total'] = '0';
              $diamond['date_50'] = $diamond_50_time;
              $diamond['date_100'] = $diamond_100_time;
              //  grand diamond

              $grand_diamond['is_active'] = 'no';
              $grand_diamond['amount1'] = '0';
              $grand_diamond['amount2'] = '0';
              $grand_diamond['people1'] = '0';
              $grand_diamond['people2'] = '0';
              $grand_diamond['next_upgrade'] = '0';
              $grand_diamond['net_self'] = '0';
              $grand_diamond['total'] = '0';
              $grand_diamond['date_50'] = $diamond_50_time;
              $grand_diamond['date_100'] = $diamond_100_time;


        if($today >= $bronze_50_time)
        {
              $bronze['is_active'] = 'yes';
              $bronze['amount1'] = '28';
              $bronze['people1'] = '2';
        }


        if($today >= $bronze_100_time)
        {
              $bronze['amount2'] = '56';
              $bronze['total'] = '84';
              $bronze['people2'] = '4';
              $bronze['next_upgrade'] = '30';
              $bronze['net_self'] = '54';

              // grand bronze initialize

              $grand_bronze['is_active'] = 'yes';
              
        }

        // grand bronze

        if($today >= $grand_bronze_50_time)
        {
              $grand_bronze['is_active'] = 'yes';
              $grand_bronze['amount1'] = '60';
              $grand_bronze['people1'] = '2';
        }


        if($today >= $grand_bronze_100_time && $my_child >= 4)
        {
              $grand_bronze['amount2'] = '120';
              $grand_bronze['total'] = '180';
              $grand_bronze['people2'] = '4';
              $grand_bronze['next_upgrade'] = '30';
              $grand_bronze['net_self'] = '54';
              $sponcer_income = '20';

              // silver initialize

              $silver['is_active'] = 'yes';
              
        }


        //silver income


        if($today >= $silver_50_time)
        {
              $silver['is_active'] = 'yes';
              $silver['amount1'] = '120';
              $silver['people1'] = '2';
              
        }


        if($today >= $silver_100_time && $my_child >= 4)
        {
              $silver['amount2'] = '240';
              $silver['total'] = '360';
              $silver['people2'] = '4';
              $silver['next_upgrade'] = '200';
              $silver['net_self'] = '120';
              
              $sponcer_income = '40';

              // silver initialize

              $grand_silver['is_active'] = 'yes';
              
        }


        // grand silver

        if($today >= $grand_silver_50_time)
        {
              $grand_silver['is_active'] = 'yes';
              $grand_silver['amount1'] = '240';
              $grand_silver['people1'] = '2';
        }


        if($today >= $grand_silver_100_time)
        {
              $grand_silver['amount2'] = '480';
              $grand_silver['total'] = '720';
              $grand_silver['people2'] = '4';
              $grand_silver['next_upgrade'] = '240';
              $grand_silver['net_self'] = '400';
              $sponcer_income = '120';

              // grand silver initialize

              $gold['is_active'] = 'yes';
        
        }

      // gold

        if($today >= $gold_50_time)
        {
              $gold['is_active'] = 'yes';
              $gold['amount1'] = '480';
              $gold['people1'] = '2';
              
        }


        if($today >= $gold_100_time)
        {
              $gold['amount2'] = '960';
              $gold['total'] = '1440';
              $gold['people2'] = '4';
              $gold['next_upgrade'] = '480';
              $gold['net_self'] = '800';
              $sponcer_income = '280';

              // grand gold initialize

              $grandgold['is_active'] = 'yes';
            
        }
     // grand gold

        if($today >= $grand_gold_50_time)
        {
              $gold['is_active'] = 'yes';
              $gold['amount1'] = '960';
              $gold['people1'] = '2';
        }


        if($today >= $grand_gold_100_time)
        {
              $grandgold['amount2'] = '1920';
              $grandgold['total'] = '2880';
              $grandgold['people2'] = '4';
              $grandgold['next_upgrade'] = '960';
              $grandgold['net_self'] = '1600';
              $sponcer_income = '600';

              // Platinum initialize

              $platinum['is_active'] = 'yes';
            
             
        }
        // platinum

        if($today >= $platinum_50_time)
        {
              $platinum['is_active'] = 'yes';
              $platinum['amount1'] = '1920';
              $platinum['people1'] = '2';
        }


        if($today >= $platinum_100_time)
        {
              $platinum['amount2'] = '3840';
              $platinum['total'] = '5760';
              $platinum['people2'] = '4';
              $platinum['next_upgrade'] = '1920';
              $platinum['net_self'] = '3200';
              $sponcer_income = '1240';

              // grand Platinum initialize

              $grandplatinum['is_active'] = 'yes';
            
        }
// grand platinum

        if($today >= $grand_platinum_50_time)
        {
              $grandplatinum['is_active'] = 'yes';
              $grandplatinum['amount1'] = '3840';
              $grandplatinum['people1'] = '2';
        }


        if($today >= $platinum_100_time)
        {
              $grandplatinum['amount2'] = '7680';
              $grandplatinum['total'] = '11520';
              $grandplatinum['people2'] = '6';
              $grandplatinum['next_upgrade'] = '3840';
              $grandplatinum['net_self'] = '6400';

              $sponcer_income = '2320';
              // diamond

              $diamond['is_active'] = 'yes';
              
        }

                $active = "";

                if($bronze['is_active'] == "yes")
                {
                  $active = "Bronze";
                }

                if($grand_bronze['is_active'] == "yes")
                {
                  $active = "Grand Bronze";
                }

                 if($silver['is_active'] == "yes")
                {
                  $active = "Silver";
                }
                

                if($grand_silver['is_active'] == "yes")
                {
                  $active = "Grand Silver";
                }

                 if($gold['is_active'] == "yes")
                {
                  $active = "Gold";
                }

                  if($grand_gold['is_active'] == "yes")
                {
                  $active = "Grand gold";
                }

                 if($diamond['is_active'] == "yes")
                {
                  $active = "Diamond";
                }



                if($grand_diamond['is_active'] == "yes")
                {
                  $active = "Grand Diamond";
                }

               

              
               
                
               
                


        $data = [];
        
        $data['sponcer_income'] = $sponcer_income;
        $data['package'] = $active;
        $data['user_id'] = $email;
        $data['bronze'] = $email;
        

        return $data;

    }


     public function getBV($user_id,$package)
      {


         $trans = \DB::table('transaction')
         ->where(['reciver'=>$user_id])
         ->where(['reason'=>"activate_package"])
         ->where(['approval'=>"completed"])
         ->get();

         $amount = 0;

         foreach ($trans as $key => $value) {
           # code...

          $amount =$amount+$value->amount;
         }



         return $amount;


      }


       public function is_active($user_id)
      {
       $user= \DB::table('users')->where(['email'=>$user_id])->first();

       if(isset($user))
       {

        if($user->is_active=='active')
        {
          return 1;
        }

        else
        {
          return 0;
        }
      }
      else
      {
        return 0;
      }
      }


       public function getLeftBusiness($user_id,$package)
      {
          
        $user=  \DB::table('users')->where(['email'=>$user_id])->first();

        if ($user->_left!=null) {
          $left = \DB::table('users')->where(['email'=>$user->_left])->first();
          $first_left_bv = $this->getBV($left->email,$package);
          $user_array1 = [];
          $user_array = [];
          $amount=0;
          $temp_amt =0;
         $a= $this->get_all_child($left->email,$user_array,0,$package);
         
        if(isset($a))
          {
            foreach ($a as $key => $value) {
              $temp_amt = $temp_amt+$value['self_bv'];
              
            }
            $amount = $first_left_bv+$temp_amt;
          }
          else
          {
            $amount=$first_left_bv;
          }

         return $amount;
        }

        else
        {
          return $amount=0;

        }
      

      }



        public function getRightBusiness($user_id,$package)
       {
          
        $user=  \DB::table('users')->where(['email'=>$user_id])->first();



        if ($user->_right!=null) {
          $right = \DB::table('users')->where(['email'=>$user->_right])->first();
          $first_right_bv = $this->getBV($right->email,$package);
          $user_array1 = [];
          $user_array = [];
          $amount=0;
          $temp_amt = 0;
          $a= $this->get_all_child($right->email,$user_array,0,$package);

         // print_r($a);
         if(isset($a))
          {
            foreach ($a as $key => $value) {
              $temp_amt= $temp_amt + $value['self_bv'];
            }
            $amount = $first_right_bv+$temp_amt;
          }
          else
          {
            $amount=$first_right_bv;
          }

         return $amount;
        }

        else
        {
          return $amount=0;

        }

      }


    public function tester()
    {
    	
    	$user = DB::table('users')->where('id','<>','1')->orderBy('id','desc')->get();

      foreach ($user as $key => $value) {
        $this->binary_income($value->binary_sponcer,$value->email,$value->my_side,'0');
        # code...
      }

    
    }

     


     public function binary_income($binary_sponcer, $user_id, $side, $package_amt)
   {

         
    
          $total_count_cond         = 1;
          $temp_side                = $side;
          $temp_binary_sponcer      = $binary_sponcer;
          $temp_package_amt         = $package_amt;


          // find binary sponcer and check its right left bv... if matched then give matching income

              while ($total_count_cond>0)
              {
                
                $user   = \DB::table('users')->where('email','=',$temp_binary_sponcer)->first();

                $user_sponcer   = \DB::table('users')
                ->where('is_active','=','active')
                ->where('sponcer_id','=',$temp_binary_sponcer)
                ->count();


               

                $today  = date('Y-m-d');
                $amount = 0;

               
              
                  
              

                  //check user has binary sponcer or not 

                      if(isset($user))
                      {

                        //get all the details of user 

                            


                             


                             $self_left_right = $this->getSelfLeftRightCount($user->email);

                             

                          
                             if(($self_left_right['self_left']>=1 && $self_left_right['self_right']>=1))
                                    {
                              //check users left count and right count here ratio is 1:1 we can set it to 2:1 and 1:2 also


                                       $left_count     = $this->getLeftCount($user->email,$package_amt);

                                       $right_count    = $this->getRightCount($user->email,$package_amt);



                                     if((($left_count>=1 && $right_count>=1) || ($left_count>=1 && $right_count>=1)))
                                    {

                                      //check on which side transaction is being happening

                                      $capping = \DB::table('package')->where('amount','=',$package_amt)->first();

                                      $left_business  = $this->getLeftBusiness($user->email,$package_amt);

                                      

                                      $right_business = $this->getRightBusiness($user->email,$package_amt);



                                      $tem_left_b = $left_business;
                                      $tem_right_b = $right_business;
                                      
                                         


                                      // left and right business 1:2 2:1 ratio
                                      if((($tem_left_b>=10 && $tem_right_b>=10) || ($tem_left_b>=10 && $tem_right_b>=10)))
                                      {
                                      

                                      $user_temp = DB::table('users')->where('email','=',$temp_binary_sponcer)->first();


                                      $left_power = 0;
                                      $right_power = 0;

                                      


                                   

                                        //check if right side business is greater than left side then matching will be same as left side business

                                          if(($left_business)<=($right_business))

                                        {


                                            

                                        

                                    
                                        $activity_reason = ["matching_entry","flush_entry",'gold_deduction'];
                                        
                                        $total_matching = \DB::table('transaction')
                                        ->where('reciver','=',$temp_binary_sponcer)
                                        ->whereIn('reason',$activity_reason)
                                        ->SUM('amount');


                                        $matching_entry_to_add = ($left_business*0.08) - $total_matching;


                                        $my_today_matching = \DB::table('transaction')
                                        ->where('reciver','=',$user->email)
                                        ->where('date','=',date('Y-m-d'))
                                        ->whereIn('reason',$activity_reason)
                                        ->SUM('amount');


                                        $my_total_package = \DB::table('transaction')
                                        ->where('reciver','=',$user->email)
                                       ->where('reason','=','activate_package')
                                        ->SUM('amount');

                                        $matching_income_final = $matching_entry_to_add;

                                        $flush_income_final = 0;

                                        if($my_total_package < ($matching_entry_to_add + $my_today_matching))
                                        {
                                          $matching_income_final = $my_total_package - $my_today_matching;
                                          $matching_reason = "matching_entry";

                                          if($matching_income_final > 0)
                                          {
                                              $flush_income_final = $matching_entry_to_add - $matching_income_final;
                                          }
                                          else
                                          {
                                              $flush_income_final = $matching_entry_to_add;

                                          }
                                       
                                        
                                         

                                        }


                                          if($matching_income_final > 0)
                                          {


                                          $matching_reason = "matching_entry";
                                         
                                         $arr_transaction1                      = [];
                                         $arr_transaction1['reciver']           = $user->email;
                                         $arr_transaction1['sender']            = $user_id;
                                         $arr_transaction1['amount']            = $matching_income_final;
                                         $arr_transaction1['reason']            = $matching_reason;
                                         $arr_transaction1['date']              = date('Y-m-d');
                                         $arr_transaction1['approval']          = 'pending';
                                         $arr_transaction1['package']           = $temp_package_amt;
                                         $arr_transaction1['left_business']     = $left_business;
                                         $arr_transaction1['right_business']    = $right_business;
                                        




                                          \DB::table('transaction')->insert($arr_transaction1);

                                          $my_parent = DB::table('users')->where('email','=',$user->sponcer_id)->first();

                                            if(isset($my_parent))
                                            {
                                               $my_parents_child_count = DB::table('users')->where('sponcer_id','=',$my_parent->email)->where('is_active','=','active')->count();
                                                $referral_binary_perc = 0;
                                                if($my_parents_child_count >= 3)
                                                {
                                                  $referral_binary_perc = 10;
                                                }
                                                if($my_parents_child_count >= 5)
                                                {
                                                    $referral_binary_perc = 20;
                                                }

                                                if($referral_binary_perc > 0)
                                                {
                                                  $arr_transaction1                      = [];
                                                  $arr_transaction1['reciver']           = $my_parent->email;
                                                  $arr_transaction1['sender']            = $user->email;
                                                  $arr_transaction1['amount']            = $matching_income_final*($referral_binary_perc/100);
                                                  $arr_transaction1['reason']            = 'referral_binary';
                                                  $arr_transaction1['date']              = date('Y-m-d');
                                                  $arr_transaction1['approval']          = 'pending';
                                                  $arr_transaction1['package']           = $temp_package_amt;
                                                 
                                                


                                                  \DB::table('transaction')->insert($arr_transaction1);
                                                }


                                            }

                                          }

                                          if($flush_income_final > 0)
                                          {

                                         $matching_reason = "flush_entry";
                                         $arr_transaction1                    = [];
                                         $arr_transaction1['reciver']      = $user->email;
                                         $arr_transaction1['sender']        = $user_id;
                                         $arr_transaction1['amount']          = $flush_income_final;
                                         $arr_transaction1['reason']            = 'flush_entry';
                                         $arr_transaction1['date']            = date('Y-m-d');
                                         $arr_transaction1['approval']        = 'pending';
                                         $arr_transaction1['package']        = $temp_package_amt;
                                          $arr_transaction1['left_business']     = $left_business;
                                         $arr_transaction1['right_business']     = $right_business;
                                        
                                          \DB::table('transaction')->insert($arr_transaction1);


                                          }


                                        }  

                                                   

                                                       
                                        // check condition of right side greater than left side
                                        elseif(($right_business-$right_power)<=($left_business-$left_power))
                                        {

                          

                                       $activity_reason = ["matching_entry","flush_entry","gold_deduction"];
                                          
                                        $total_matching = \DB::table('transaction')
                                        ->where('reciver','=',$user->email)
                                        ->whereIn('reason',$activity_reason)
                                        ->SUM('amount');


                                        //  echo $right_business; echo $right_power; echo $package_amt; echo $total_count; die();


                                     $matching_entry_to_add = ($right_business*0.08) - $total_matching;

                                     
                                     $my_today_matching = \DB::table('transaction')
                                        ->where('reciver','=',$user->email)
                                        ->where('date','=',date('Y-m-d'))
                                        ->whereIn('reason',$activity_reason)
                                        ->SUM('amount');


                                        $my_total_package = \DB::table('transaction')
                                        ->where('reciver','=',$temp_binary_sponcer)
                                        ->where('reason','=','activate_package')
                                        ->SUM('amount');

                                        $matching_income_final = $matching_entry_to_add;

                                        $flush_income_final = 0;

                                        if($my_total_package < ($matching_entry_to_add + $my_today_matching))
                                        {
                                          $matching_income_final = $my_total_package - $my_today_matching;
                                          $matching_reason = "matching_entry";

                                          if($matching_income_final > 0)
                                          {
                                            echo  $flush_income_final = $matching_entry_to_add - $matching_income_final;
                                          }
                                          else
                                          {
                                            echo  $flush_income_final = $matching_entry_to_add;

                                          }
                                       
                                        
                                         

                                        }


                                          if($matching_income_final > 0)
                                          {
                                            $matching_reason = "matching_entry";

                                         $arr_transaction1                      = [];
                                         $arr_transaction1['reciver']           = $user->email;
                                         $arr_transaction1['sender']            = $user_id;
                                         $arr_transaction1['amount']            = $matching_income_final;
                                         $arr_transaction1['reason']            = $matching_reason;
                                         $arr_transaction1['date']              = date('Y-m-d');
                                         $arr_transaction1['approval']          = 'pending';
                                         $arr_transaction1['package']           = $temp_package_amt;
                                         $arr_transaction1['left_business']     = $left_business;
                                         $arr_transaction1['right_business']    = $right_business;
                                       


                                          \DB::table('transaction')->insert($arr_transaction1);


                                          $my_parent = DB::table('users')->where('email','=',$user->sponcer_id)->first();

                                            if(isset($my_parent))
                                            {
                                               $my_parents_child_count = DB::table('users')->where('sponcer_id','=',$my_parent->email)->where('is_active','=','active')->count();
                                                $referral_binary_perc = 0;
                                                if($my_parents_child_count >= 3)
                                                {
                                                  $referral_binary_perc = 10;
                                                }
                                                if($my_parents_child_count >= 5)
                                                {
                                                    $referral_binary_perc = 20;
                                                }

                                                if($referral_binary_perc > 0)
                                                {
                                                  $arr_transaction1                      = [];
                                                  $arr_transaction1['reciver']           = $my_parent->email;
                                                  $arr_transaction1['sender']            = $user->email;
                                                  $arr_transaction1['amount']            = $matching_income_final*($referral_binary_perc/100);
                                                  $arr_transaction1['reason']            = 'referral_binary';
                                                  $arr_transaction1['date']              = date('Y-m-d');
                                                  $arr_transaction1['approval']          = 'pending';
                                                  $arr_transaction1['package']           = $temp_package_amt;
                                                 
                                                


                                                  \DB::table('transaction')->insert($arr_transaction1);
                                                }


                                            }

                                          }

                                          if($flush_income_final > 0)
                                          {

                                         $matching_reason = "flush_entry";
                                         $arr_transaction1                    = [];
                                         $arr_transaction1['reciver']      = $user->email;
                                         $arr_transaction1['sender']        = $user_id;
                                         $arr_transaction1['amount']          = $flush_income_final;
                                         $arr_transaction1['reason']            = 'flush_entry';
                                         $arr_transaction1['date']            = date('Y-m-d');
                                         $arr_transaction1['approval']        = 'pending';
                                         $arr_transaction1['package']        = $temp_package_amt;
                                          $arr_transaction1['left_business']     = $left_business;
                                         $arr_transaction1['right_business']     = $right_business;
                                       
                                          \DB::table('transaction')->insert($arr_transaction1);


                                          }


                                        

                                                

                                    }  // right entry code ends here

                                } // 2:1 1:2 on business
                                 

                             }  // checking 2:1 1:2 condition ends here

                           }


                      
                                  

                        }  // end of binary sponcer available check
                        if(isset($user->binary_sponcer))
                        {
                           $temp_binary_sponcer = $user->binary_sponcer;
  
                        }
                        else
                        {
                            $temp_binary_sponcer = "";
                        }
                        
                        // if hits to admin then stop process

              if($temp_binary_sponcer=="")
                {
                  $total_count_cond=0;
                }  // end binary process 

          } // end of while loop

      } //end of function





        public function getSelfLeftRightCount($user_id)
      {
          
        $user=  \DB::table('users')->where(['email'=>$user_id])->first();

        $self_left_count  = 0;
        $self_right_count = 0;

        $child_data = \DB::table('users')->where(['sponcer_id'=>$user_id])->get();

        foreach ($child_data as $key => $value) 
        {
          
          if ($value->my_side == "_left" && $value->is_active == "active") 
          {
            $self_left_count = $self_left_count + 1;
           
          }

          if ($value->my_side == "_right" && $value->is_active == "active") 
          {
            $self_right_count = $self_right_count + 1;
          }

        }

        $arr_count               = [];
        $arr_count['self_left']  = $self_left_count;
        $arr_count['self_right'] = $self_right_count;


        return $arr_count;
      

      }


      public function getLeftCount($user_id,$package)
      {
          
        $user=  \DB::table('users')->where(['email'=>$user_id])->first();

        if ($user->_left!=null) {
          $left = \DB::table('users')->where(['email'=>$user->_left])->first();

         

           $left->email;
          $user_array1 = [];
          $user_array = [];

          $count1=0;
          
           if($left->is_active=='active')
          {
            $count=1;
          }

          else
          {
            $count=0;
          }

          $temp_count =0;

         $a= $this->get_all_child_count($left->email,$user_array,0,$package);

        // print_r($a); die();
        if(isset($a))
          {
            foreach ($a as $key => $value) {
              $temp_count = $temp_count+$value['is_active'];
              
            }
            $amount = $count+$temp_count;
          }
          

         return $amount;
        }

        else
        {
          return $amount=0;

        }
      

      }

      public  function check_position($email,$position)
   {

    $user= \DB::table('users')->where('email','=',$email)->first();

    if ($user->{$position}!=null) 
    {
      
      $user = \DB::table('users')->where('email','=',$user->{$position})->first();
    
      return $this->check_position($user->email,$position);
    
    }

    else
    {

  
      $available_at= $user->email;

      return $available_at;
  
      }

   }





     

         public function getRightCount($user_id,$package)
       {
          
        $user=  \DB::table('users')->where(['email'=>$user_id])->first();

        if ($user->_right!=null) {
          $right = \DB::table('users')->where(['email'=>$user->_right])->first();
         $right->email;
          $user_array1 = [];
          $user_array = [];
           $temp_count =0;

          if($right->is_active=='active')
          {
            $count=1;
          }

          else
          {
            $count=0;
          }
          
         $a= $this->get_all_child_count($right->email,$user_array,0,$package);
         if(isset($a))
          {
            foreach ($a as $key => $value) {
              $temp_count = $temp_count+$value['is_active'];
              
            }
            $amount = $count+$temp_count;
          }
          

         return $amount;
        }

        else
        {
          return $amount=0;

        }

      }

        public function get_all_child_count($user_id, array $user_array,  $count,$package)
      {
    
        $get_left_right_data = \DB::table('users')->where(['email'=>$user_id])->first();

        if($get_left_right_data->is_active=='active')
        {

          $count= $count+1;
        }

        
        if ($get_left_right_data->_left!=null) {

        $left = $get_left_right_data->_left;
         
        $temp_arr =[];
        $temp_arr['user_id']   =  $left;
        $temp_arr['side']   =     "left";
        $temp_arr['self_bv']   = $this->getBV($left,$package);
        $temp_arr['is_active']   = $this->is_active($left);

        array_push($user_array, $temp_arr);

       $user_array= $this->get_all_child_count($left,$user_array,$count,$package);


        
        }

        if ($get_left_right_data->_right!=null) 
        {
        $right = $get_left_right_data->_right;
         
        $temp_arr =[];
        $temp_arr['user_id']   =  $right;
        $temp_arr['side']   =     "right";
         $temp_arr['self_bv']   = $this->getBV($right,$package);
         $temp_arr['is_active']   = $this->is_active($right);
        
       array_push($user_array, $temp_arr);
    
      $user_array= $this->get_all_child_count($right,$user_array,$count,$package);

       
       }

      
       

       return $user_array;

      }

      public function get_all_child($user_id, array $user_array,  $count, $package)
      {
    
        $get_left_right_data = \DB::table('users')->where(['email'=>$user_id])->first();

        if($get_left_right_data->is_active=='active')
        {
          $count++;
        }

        
        if ($get_left_right_data->_left!=null) {

        $left = $get_left_right_data->_left;
         
        $temp_arr =[];
        $temp_arr['user_id']   =  $left;
        $temp_arr['side']   =     "left";
         $temp_arr['self_bv']   = $this->getBV($left,$package);

        array_push($user_array, $temp_arr);

       $user_array= $this->get_all_child($left,$user_array,$count,$package);


        
        }

        if ($get_left_right_data->_right!=null) 
        {
        $right = $get_left_right_data->_right;
         
        $temp_arr =[];
        $temp_arr['user_id']   =  $right;
        $temp_arr['side']   =     "right";
         $temp_arr['self_bv']   = $this->getBV($right,$package);
        
       array_push($user_array, $temp_arr);
    
      $user_array= $this->get_all_child($right,$user_array,$count,$package);

       
       }


       

       return $user_array;

      }


       public function get_session_time()
      {
            $current = date('Y-m-d');
            $today = date('H');
            $session = 0;
            if($today >= 3)
            {
                $session = "1";
                $start_time = date('Y-m-d H:i:s',strtotime($current)+ (3600*3));
                $end_time = date('Y-m-d H:i:s',strtotime($current)+ (3600*9) - 1);

            }
            if($today >= 9)
            {
                $session = "2";
                $start_time = date('Y-m-d H:i:s',strtotime($current)+ (3600*9));
                $end_time = date('Y-m-d H:i:s',strtotime($current)+ (3600*15) - 1);

            }
            if($today >= 15)
            {
                $session = "3";
                $start_time = date('Y-m-d H:i:s',strtotime($current)+ (3600*15));
                $end_time = date('Y-m-d H:i:s',strtotime($current)+ (3600*21) -1);


            }
            if($today >= 21)
            {
                $session = "4";
                $start_time = date('Y-m-d H:i:s',strtotime($current)+ (3600*21));
                $end_time = date('Y-m-d H:i:s',strtotime($current)+ (3600*27) -1);


            }

            $data = [];
            $data['start_time'] = $start_time;
            $data['end_time'] = $end_time;
            $data['sess'] = $session;

            return $data;
            

      }


      public function transfer_reward()
      {

         $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet_binary($user->email);

           return view(''.$themecheck1.'/activation/reward_transfer')->with(compact('user','themecheck1','wallet_balance')); 

      }


      public function transfer_reward_post(Request $request)
      {
          $user = Sentinel::check();

          $amount = $request->amount;
          $user_id = $request->user_id;

          $user_rec = DB::table('users')->where('email','=',$user_id)->first();

          if(isset($user_rec))
          {

            $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet_binary($user->email);

           if($wallet_balance['reward_wallet'] >= $amount)
           {
               $this->createTransaction($user->email,$user_id,$amount,'','reward_transfer','','','completed',date('Y-m-d'),'Reward','');

                Session::flash('success', 'Reward Successfully Transfered');   
                return redirect()->back()->with(['success' =>  'Reward Successfully Transfered']);

           }


          }


          Session::flash('error', 'Something Went Wrong');   
            return redirect()->back()->with(['error' =>  'Soething Went Wrong']);
      }


}
