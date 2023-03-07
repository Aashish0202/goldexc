<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;
use App\file;



class WalletController extends Controller
{
	  public function dashboard()
      {
    	 $usercheck = $this->usercheck();

         // echo "$usercheck"; 

    	 return view(''.$usercheck.'/user/dashboard')->with(compact('usercheck')); 
      }
    
       public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'user')
            {
                 $middelware = 'user';
            }
           
        }



        public function wallet_binary($user_id)
        {

           $roi_income        =  $this->roi_income($user_id, 'roi', 'completed');
           $level_roi_income        =  $this->direct_roi_income($user_id, 'level_roi', 'completed');

           $direct_income = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','direct')      
           ->where('approval','=','completed')    
           ->SUM('amount');


          $reward_direct_income = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','direct_reward')   
           ->where('approval','=','completed')       
           ->SUM('amount');


           $reward_utilization = DB::table('transaction')
           ->where('sender','=',$user_id)
           ->where('reason','=','reward_utilization')   
           ->where('approval','=','completed')       
           ->SUM('amount');


           $reward_recieved = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','reward_transfer')   
           ->where('approval','=','completed')       
           ->SUM('amount');


            $reward_sent = DB::table('transaction')
           ->where('sender','=',$user_id)
           ->where('reason','=','reward_transfer')   
           ->where('approval','=','completed')       
           ->SUM('amount');



           $reward_deduction = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','reward_deduction')     
           ->where('approval','=','completed')     
           ->SUM('amount');


           $total_deposit = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','deposit')     
           ->where('approval','=','completed')    
           ->SUM('amount');

           $total_activation = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','activate_package')     
           ->where('approval','=','completed')     
           ->SUM('amount');

           $total_activation_by_me = DB::table('transaction')
           ->where('sender','=',$user_id)
           ->where('reason','=','activate_package')     
           ->where('approval','=','completed')     
           ->SUM('amount');


           $team_business = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','level_roi')         
           ->SUM('package');


           $team_business_today = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','level_roi')  
           ->where('date','=',date('Y-m-d'))         
           ->SUM('package');


           

           


           $total_withdrawal = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('approval','=','completed')
           ->where('reason','=','withdraw_payment')         
           ->SUM('amount');

           $total_withdrawal_p = DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','withdraw_payment')     
           ->where('approval','=','pending')      
           ->SUM('amount');


           $total_income = $roi_income + $level_roi_income + $direct_income ;

           $total_income_ded = $total_income*0.95;

           $wallet_balance = $total_income_ded - $total_withdrawal - $total_withdrawal_p;

           $activation_wallet = $total_deposit - $total_activation_by_me + $reward_utilization;

           $reward_wallet = 0;

           $reward_wallet = $reward_direct_income - $reward_deduction -$reward_utilization + $reward_recieved -$reward_sent;


           $data['roi_income'] =  $roi_income;
           $data['level_roi_income'] =  $level_roi_income;
           $data['direct_income'] =  $direct_income;
           $data['reward_wallet'] =  $reward_wallet;
           $data['total_deposit'] =  $total_deposit;
           $data['total_activation'] =  $total_activation;
           $data['total_withdrawal'] =  $total_withdrawal;
           $data['total_withdrawal_p'] =  $total_withdrawal_p;
           $data['total_income'] =  $total_income;
           $data['total_income_ded'] =  $total_income_ded;
           $data['wallet_balance'] =  round($wallet_balance,6);
           $data['activation_wallet'] =  $activation_wallet;
           $data['reward_direct_income'] =  $reward_direct_income;
           $data['team_business'] =  $team_business;
           $data['team_business_today'] =  $team_business_today;

           
           $booster_status = $this->checkBooster($user_id);

           if($booster_status == true)
           {
               $data['booster_status'] =  "active";       


           }
           else
           {
               $data['booster_status'] =  "inactive";

           }
           


           return $data;


        }

        public function checkBooster($user_id)
        {
            $user = DB::table('users')->where('email','=',$user_id)->first();

            $self_active = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->where('approval','=','completed')
            ->where('reason','=','activate_package')
            ->first();

            if(isset($self_active))
            {
              $self_activation_date = $self_active->date;
             $booster_date = date("Y-m-d", strtotime('+ '.'1 days' , strtotime($self_activation_date)));

           //  print_r($self_active); die();

             $package = $self_active->package;

            

              $booster_count = DB::table('transaction')
              ->where('reason','=','level_roi')
              ->where('level','=','1')
              ->where('reciver','=',$user->email)
              ->where('date','<=',$booster_date)
              ->where('package','>=',$package)
              ->count();


              $booster_data = DB::table('transaction')
              ->where('reason','=','level_roi')
              ->where('level','=','1')
              ->where('reciver','=',$user->email)
              ->where('date','<=',$booster_date)
              ->get();

              foreach ($booster_data as $key => $value) {
                if($value->package >= $package)
                {
                  return true;
                }
                # code...
              }

              // echo $booster_date;
              // print_r($booster_data); die();


            // echo $booster_count; die();

              if($booster_count > 0)
              {
                return true;
              }
              else
              {
                return false;
              }

            }
            else
            {
              return false;
            }
        }

        public function wallet($user_id)
        {

           $pool = [];

          $ActivationController = new ActivationController;

          $total_team = $this->find_total_team_detail($user_id,$pool,0,0,0,$data=[]);

          $wallet_data_main = DB::table('wallet')->where('user_id','=',$user_id)->first();

        //  print_r($total_team); die(); 

        //  $total_team = $this->find_total_team($user_id,$pool,0,0,0);

         

          $sponcering_income = 0;
          $child_data = DB::table('users')->where('sponcer_id','=',$user_id)->get();

        

        foreach ($child_data as $key => $value) {
           
            $data_booster   = $ActivationController->direct_sponcer_income_calculate($value->email);

            

            $sponcering_income = $sponcering_income + $data_booster['sponcer_income'];


        }

          
          $total_deposit      = $wallet_data_main->total_deposit;
          
          $total_activation   = $wallet_data_main->total_activation;

          /*$fund_transfer_out  = $wallet_data_main->total_fund_out;*/

           

          $fund_transfer_out = DB::table('transaction')
                           ->where('reciver','=',$user_id)
                           ->where('reason','=','internal_transfer')
                           ->SUM('amount');

          $tbi_data= DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','activate_package_10')         
           ->SUM('package');


           $level_i= DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('approval','=','completed')
           ->where('reason','=','level')         
           ->SUM('amount');

           $direct_i= DB::table('transaction')
           ->where('reciver','=',$user_id)
            ->where('approval','=','completed')
           ->where('reason','=','direct')         
           ->SUM('amount');




           $club_income= DB::table('transaction')
           ->where('reciver','=',$user_id)
           ->where('reason','=','club_income')         
           ->SUM('amount');


            $rapidfire_income= DB::table('transaction')
                    ->where('reciver','=',$user_id)
                    ->where('reason','=','RAPIDFIRE')         
                    ->SUM('amount');



            $rapidfire_income_count= DB::table('two_leg')
           ->where('user_id','=',$user_id)
           ->where('count','=','2')
           ->where('amount','=','20')         
           ->count();

            $rapidfire_income= $rapidfire_income_count * 20;


            $rapidfire_income_count_50= DB::table('two_leg')
           ->where('user_id','=',$user_id)
           ->where('count','=','2')
           ->where('amount','=','50')         
           ->count();

            $rapidfire_income_50= $rapidfire_income_count_50 * 50;




           
            //print_r($rapidfire_income);die();       
          
          $fund_transfer_in   = $wallet_data_main->total_fund_in;

          $level_income       = $wallet_data_main->level_income;

          $direct_income      = $wallet_data_main->direct_income;

          $autopool_income    = $wallet_data_main->autopool_income;

          $sponcering_income    = $sponcering_income;
          

          $quiz_income        = $wallet_data_main->quiz_income;
          $quiz_level_income  = $wallet_data_main->quiz_level_income;

          

          $quiz_wallet        = $wallet_data_main->quiz_wallet;

          

          $withdraw_payment   = DB::table('transaction')
                           ->where('reciver','=',$user_id)
                           ->where('reason','=','withdraw_payment')
                           ->where('approval','<>','reject')
                           ->SUM('amount');

          $withdraw_payment_pending = DB::table('transaction')
                           ->where('reciver','=',$user_id)
                           ->where('reason','=','withdraw_payment')
                           ->where('approval','=','pending')
                           ->SUM('amount');;

        

          $roi_income        =  $this->roi_income($user_id, 'roi', 'completed');

          $level_roi_income        =  $this->level_roi_income($user_id, 'level', 'completed');

            //print_r($roi_income); die();

          $ActivationController = new ActivationController;

          $data_pool   = $ActivationController->set_time_and_create_autopool($user_id);
          $get_circle   = $ActivationController->get_circle($user_id);

         
          $deduction = $wallet_data_main->level_income;
          

          $total_withdrawal   = $withdraw_payment;

          $activation_wallet  =  $wallet_data_main->activation_wallet_balance;

          $income_fix_wallet  =  $sponcering_income+$data_pool['autopool_earning']+$get_circle+$level_i+$direct_i+$club_income+$rapidfire_income + $rapidfire_income_50;

          $income_fix_wallet1  =  $sponcering_income+$data_pool['autopool_income']+$get_circle+$level_i+$direct_i+$club_income+$rapidfire_income + $rapidfire_income_50;

          $auto_ded = ($data_pool['autopool_earning'] - $data_pool['autopool_income'])*0.20;

          $deduction = $income_fix_wallet*0.20;

          $surplus = $fund_transfer_out*0.20;

          $surplus1 = $tbi_data*0.20;

          $rapidfire_income_ded = ($rapidfire_income*0.20) + ($rapidfire_income_50*0.20);




           $income_wallet      =   $income_fix_wallet1 - $total_withdrawal -$tbi_data -$fund_transfer_out - ($total_withdrawal*0.2);

        $income_wallet1      =  ($income_fix_wallet1)- $total_withdrawal - $tbi_data - $deduction -$fund_transfer_out + $surplus + $surplus1 + $auto_ded;


          $income_wallet1      =   $income_wallet1;

          $tbi_data_sum=$tbi_data;

          //$one=$level_income;


          


          $reg_data = $this->day_data();


          $data['activation_wallet']        = $activation_wallet;
          $data['income_wallet']            = $income_wallet;
          $data['total_deposit']            = $total_deposit;
          $data['total_activation']         = $total_activation;
          $data['fund_transfer_out']        = $fund_transfer_out;
          $data['fund_transfer_in']         = $fund_transfer_in;
          $data['level_income']             = $level_i;

          $data['withdraw_payment']         = $total_withdrawal;

          $data['total_team_active']        = $total_team['active'];
          $data['total_team_inactive']      = $total_team['inactive'];
          $data['roi_income']               = $roi_income;
          $data['level_roi_income']         = $level_roi_income;

          $data['income_fix_wallet']        = $income_fix_wallet;
          
      
          $data['date_arr']                 = $reg_data['date_arr'];
          $data['reg_count_arr']            = $reg_data['reg_count_arr'];
          $data['color_arr']                = $reg_data['color_arr'];

          $data['direct_income']            = $direct_i;
          $data['autopool_income']          = $data_pool['autopool_earning_t'];
          $data['circle_income']            = $get_circle;
          $data['quiz_income']              = $quiz_income;
          $data['quiz_level_income']        = $quiz_level_income;

          $data['quiz_wallet']              = $quiz_wallet;
          $data['club_income']              = $club_income;
             
          $data['tbi_data_sum']              = $tbi_data_sum;

          $data['income_wallet1']            = $income_wallet1;
          $data['sponcering_income']            = $sponcering_income;

          $data['rapidfire_income'] =     $rapidfire_income;

          $data['rapidfire_income_50'] =     $rapidfire_income_50;




        //print_r($data); die();

          return $data;
          return $income_wallet1;

        }


         public function test_wallet()
        {

          $users = DB::table('users')->where('is_active','=','active')->get();

          foreach ($users as $key => $value) {
            // code...
            $wallet = $this->wallet($value->email);

            if($wallet['income_wallet1'] < 0)
            {
              echo $value->email; echo " "; echo $wallet['income_wallet1']; echo "<br>";
            }
          }

         

        }

        public function get_club_total()
        {
          echo date('D', strtotime($x)); 

        }



         public function sender_transaction($user_id,$reason,$approval)
         {

         $trans = DB::table('transaction')
          ->where('sender','=',$user_id)
          ->where('reason','=',$reason)
          ->where('approval','=',$approval)
          ->get();

        //  print_r($trans);

          $amount = 0;

          foreach ($trans as $key => $value) {
            
            $amount = $amount + $value->amount;

          }


          return $amount;
        }

        public function day_data()
        {
          $counter = 0;
          $date_arr = [];
          $reg_count_arr = [];
          $color_arr = [];
          $today = date('Y-m-d');
          $today = date('Y-m-d', strtotime($today. ' - '.(4*1).' days'));;
          for($i =0; $i<5; $i++)
          {
             $counter++;
             $date = date('Y-m-d', strtotime($today. ' + '.($counter*1).' days'));
             array_push($date_arr,$date);
             $count = DB::table('users')->where('joining_date','=',$date)->count();
            

             if($i== 0 || $reg_count_arr[$i-1] < $count)
             {
              array_push($color_arr, "green");
             }
             else
             {
              array_push($color_arr, "red");

             }

              array_push($reg_count_arr,$count);

          }

          $data['date_arr'] = $date_arr;
          $data['reg_count_arr'] = $reg_count_arr;
          $data['color_arr'] = $color_arr;

          return $data;

        }


        public function reciver_transaction($user_id,$reason,$approval)
        {

         $trans = DB::table('transaction')
          ->where('reciver','=',$user_id)
          ->where('reason','=',$reason)
          ->where('approval','=',$approval)
          ->get();

          //  print_r($trans);

          $amount = 0;

          foreach ($trans as $key => $value) {
            
            $amount = $amount + $value->amount;

          }


          return $amount;  
        }

         public function reciver_transaction_level($user_id,$reason,$approval,$level)
        {

        	if($level == 1)
        	{
        		$trans = DB::table('transaction')
          ->where('reciver','=',$user_id)
          ->where('reason','=',$reason)
          ->where('approval','=',$approval)
          ->where('level','=',$level)
          ->get();


        	}
        	else
        	{
        		$trans = DB::table('transaction')
          ->where('reciver','=',$user_id)
          ->where('reason','=',$reason)
          ->where('approval','=',$approval)
          ->where('level','<>',$level)
          ->get();

        	}

         
          //  print_r($trans);

          $amount = 0;

          foreach ($trans as $key => $value) {
            
            $amount = $amount + $value->amount;

          }


          return $amount;  
        }



        public function roi_income($user_id, $reason, $approval)
        {
          $trans = DB::table('transaction')
          ->where('reciver','=',$user_id)
          ->where('reason','=',$reason)
          ->where('approval','=',$approval)
          ->get();

        //  print_r($trans);


          $amount = 0;

          $booster_status = $this->checkBooster($user_id);



          foreach ($trans as $key => $value) {

              $act_date = $value->date;

              $now = date("Y-m-d");

             // print_r($now);

              $diff = round(abs(strtotime($act_date) - strtotime($now)) / (3600*24) ,0);

             if($diff >= 1)
             {
              $diff = $diff -1;
             }
             
             if($booster_status == true)
            {
                    $roi = $diff*(($value->amount)*(($value->percentage*2)/100));

            }

            else
            {
                    $roi = $diff*(($value->amount)*($value->percentage/100));

            }
              
            
             // $roi = $value->amount*1.8;

              
              

              if($roi > $value->amount*3)
              {
              	$roi = $value->amount*3;
                
              }

             

              


            
            $amount = $amount + $roi;



          }

          return $amount;

        }


         public function direct_roi_income($user_id, $reason, $approval)
        {
          $trans = DB::table('transaction')
          ->where('reciver','=',$user_id)
          ->where('reason','=',$reason)
          ->where('approval','=',$approval)
          ->get();

        //  print_r($trans);


          $amount = 0;

          foreach ($trans as $key => $value) {

              $act_date = $value->date;

              $now = date("Y-m-d");

             // print_r($now);

              $diff = round(abs(strtotime($act_date) - strtotime($now)) / (3600*24) ,0);

             if($diff >= 1)
             {
              $diff = $diff -1;
             }
             

              
            
              $roi = $diff*$value->amount;
             // $roi = $value->amount*1.8;

              
              

              if($roi > $value->package)
              {
                $roi = $value->package;
                
              }

             

              


            
            $amount = $amount + $roi;



          }

          return $amount;

        }



         public function level_roi_income($user_id, $reason, $approval)
        {
          $trans = DB::table('transaction')
          ->where('reciver','=',$user_id)
          ->where('reason','=',$reason)
          ->where('approval','=',$approval)
          ->get();

         // print_r($trans);

          $amount = 0;

          foreach ($trans as $key => $value) {

              $act_date = $value->date;

              $now = date("Y-m-d");

             // print_r($now);

              $diff = round(abs(strtotime($act_date) - strtotime($now)) / (3600*24) ,0);

              if($diff < 1)
             {
              $diff = 0;
             }
             
              
              if($value->level == 1)
              {
                $percentage = 10;
                $roi_p = $diff*($value->package)*0.03;

                  $roi = $roi_p * $percentage/100;

              if($roi > (($value->package)*0.03*6))
              {
                $roi = ($value->package)*0.03*6;
                
              }

              }
              else
              {
                $percentage = 2;
                $roi_p = $diff*($value->package)*0.03;
                $roi = $roi_p * $percentage/100;

              if($roi > ($value->package)*0.03*1.2)
              {
                $roi = ($value->package)*0.03*1.2;
                
              }
              }


            
             

              


            
            $amount = $amount + $roi;

            



          }

          
          return $amount;


        }




          public function single_leg_income($user_id)
        {
            $amount=0;
            $amount1=0;
            $amount2=0;
            $amount3=0;
            $amount4=0;
            $amount5=0;
            $amount6=0;
            $amount7=0;
            $amount8=0;
            $amount9=0;
            
            
           $user = \DB::table('users')->where('email','=',$user_id)->first();
            
        
         
          $single_leg_user = \DB::table('users')->where('email','=',$user->email)->first();
          
          if(!empty($single_leg_user))
          {
              
          
 
       
          
         $total_count = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->count();

          
          
          
          
          $total_child =  \DB::table('users')
          ->where('sponcer_id','=',$user->id)
          ->where('is_active','=',"active")
          ->count();
          
   
          $amount = 0;
          if($total_count >= 25 && $total_child>=1)
          {
              
          $total_user = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->skip(30)->take(1)->first();

            $amount1=0;
            $counter=0;
            $temp_amt = 0;
           
                    
                    
      

                     for($i =1; $i <= 40; $i++)
                    {
                  
                      $counter++;
                      if($total_user->activation_date==null)
                        {
                           break;
                        }
                      $date = date('Y-m-d H:i:s', strtotime($total_user->activation_date. ' + '.($counter*24).' hours'));
               
                      if(date('l', strtotime($date))=='abcday' || date('l', strtotime($date))=='abcday')
                        {
                          $i--;
                          continue;
                        }
                  
                      // $percentage = 0;
                  
                     if(strtotime($date)<strtotime(date('Y-m-d H:i:s')))
                      {
                     
                        $temp_amt = $temp_amt+ 0.5;
                        
                      }

                  }

                  $amount1 =$amount1 + $temp_amt;
                
           
          }
                   
                    
                  
                
        
          
        
          

          if ($total_count >= 75 && $total_child >= 2) 
          {
          //  $amount = "300";
            
            $total_user = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->first();

            $amount2 = 0;
            $counter=0;
          
                    
                    
                      for($i =1; $i <= 60; $i++)
                    {
                  
                      $counter++;
                      if($total_user->activation_date==null)
                        {
                           break;
                        }
                      $date = date('Y-m-d H:i:s', strtotime($total_user->activation_date. ' + '.($counter*24).' hours'));
               
                      if(date('l', strtotime($date))=='abcday' || date('l', strtotime($date))=='abcday')
                        {
                          $i--;
                          continue;
                        }
                  
                      // $percentage = 0;
                  
                     if(strtotime($date)<strtotime(date('Y-m-d H:i:s')))
                      {
                     
                        $temp_amt = $temp_amt+ 0.60;
                        
                      }

                  }

                  $amount2 =$amount2 + $temp_amt;
                
           
         
                    
                
          }

         if($total_count >= 225  && $total_child>=3) 
          {
           // $amount = "600";
             $total_user = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->first();

            $amount3 = 0;
            $counter=0;
          
                    
                    
                       for($i =1; $i <= 55; $i++)
                    {
                  
                      $counter++;
                      if($total_user->activation_date==null)
                        {
                           break;
                        }
                      $date = date('Y-m-d H:i:s', strtotime($total_user->activation_date. ' + '.($counter*24).' hours'));
               
                      if(date('l', strtotime($date))=='abcday' || date('l', strtotime($date))=='abcday')
                        {
                          $i--;
                          continue;
                        }
                  
                      // $percentage = 0;
                  
                     if(strtotime($date)<strtotime(date('Y-m-d H:i:s')))
                      {
                     
                        $temp_amt = $temp_amt+ 0.70;
                        
                      }

                  }

                  $amount3 =$amount3 + $temp_amt;
                
           
          }
                   
                    
                     
                    
              
          

           if ($total_count >= 525 && $total_child >= 4) 
          {
           // $amount = "1000";
               $total_user = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->first();

            $amount4 = 0;
            $counter=0;
          
                     for($i =1; $i <= 55; $i++)
                    {
                  
                      $counter++;
                      if($total_user->activation_date==null)
                        {
                           break;
                        }
                      $date = date('Y-m-d H:i:s', strtotime($total_user->activation_date. ' + '.($counter*24).' hours'));
               
                      if(date('l', strtotime($date))=='abcday' || date('l', strtotime($date))=='abcday')
                        {
                          $i--;
                          continue;
                        }
                  
                      // $percentage = 0;
                  
                     if(strtotime($date)<strtotime(date('Y-m-d H:i:s')))
                      {
                     
                        $temp_amt = $temp_amt+ 0.80;
                        
                      }

                  }

                  $amount4 =$amount4 + $temp_amt;
                
           
          }
                   
                    
                     
                    
                     
                    
                 
          
          
            if ($total_count >= 1025 && $total_child >= 6)
          {
           // $amount = "2000";
              $total_user = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->first();

            $amount5 = 0;
            $counter=0;
           
                    
                     for($i =1; $i <= 80; $i++)
                    {
                  
                      $counter++;
                      if($total_user->activation_date==null)
                        {
                           break;
                        }
                      $date = date('Y-m-d H:i:s', strtotime($total_user->activation_date. ' + '.($counter*24).' hours'));
               
                      if(date('l', strtotime($date))=='abcday' || date('l', strtotime($date))=='abcday')
                        {
                          $i--;
                          continue;
                        }
                  
                      // $percentage = 0;
                  
                     if(strtotime($date)<strtotime(date('Y-m-d H:i:s')))
                      {
                     
                        $temp_amt = $temp_amt+ 1;
                        
                      }

                  }

                  $amount5 =$amount5 + $temp_amt;
                    
                    
          }

           if ($total_count >= 1825 && $total_child>=8 )
          {
           // $amount = "3500";
              $total_user = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->first();

            $amount6 = 0;
            $counter=0;
            
                    
                   
                    for($i =1; $i <= 80; $i++)
                    {
                  
                      $counter++;
                      if($total_user->activation_date==null)
                        {
                           break;
                        }
                      $date = date('Y-m-d H:i:s', strtotime($total_user->activation_date. ' + '.($counter*24).' hours'));
               
                      if(date('l', strtotime($date))=='abcday' || date('l', strtotime($date))=='abcday')
                        {
                          $i--;
                          continue;
                        }
                  
                      // $percentage = 0;
                  
                     if(strtotime($date)<strtotime(date('Y-m-d H:i:s')))
                      {
                     
                        $temp_amt = $temp_amt+ 2;
                        
                      }

                  }

                  $amount6 =$amount6 + $temp_amt; 
                   
                    
                  
          }

          if ($total_count >= 3025 && $total_child>= 10) 
          {
           // $amount = "6000";
              $total_user = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->first();

            $amount7 = 0;
            $counter=0;
           
                    
                    
                     $percentage = 100;
                   
                    
                      $amount7 = $amount7+ (130 * $percentage/100);
                    
                 
          }

          if ($total_count >= 4725 && $total_child>=13) 
          {
           // $amount = "8000";
           
              $total_user = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->first();

            $amount8 = 0;
            $counter=0;
           
                    
                    
                     for($i =1; $i <= 90; $i++)
                    {
                  
                      $counter++;
                      if($total_user->activation_date==null)
                        {
                           break;
                        }
                      $date = date('Y-m-d H:i:s', strtotime($total_user->activation_date. ' + '.($counter*24).' hours'));
               
                      if(date('l', strtotime($date))=='abcday' || date('l', strtotime($date))=='abcday')
                        {
                          $i--;
                          continue;
                        }
                  
                      // $percentage = 0;
                  
                     if(strtotime($date)<strtotime(date('Y-m-d H:i:s')))
                      {
                     
                        $temp_amt = $temp_amt+ 4;
                        
                      }

                  }

                  $amount8 =$amount8 + $temp_amt;
                    
                 
          }
          
           if ($total_count >= 6925 && $total_child>=16) 
          {
           // $amount = "10500";
            $total_user = \DB::table('users')
          ->where('id','>',$user->id)
          ->where('is_active','=',"active")
          ->first();

            $amount9 = 0;
            $counter=0;
            
                    
                    
                     for($i =1; $i <= 100; $i++)
                    {
                  
                      $counter++;
                      if($total_user->activation_date==null)
                        {
                           break;
                        }
                      $date = date('Y-m-d H:i:s', strtotime($total_user->activation_date. ' + '.($counter*24).' hours'));
               
                      if(date('l', strtotime($date))=='abcday' || date('l', strtotime($date))=='abcday')
                        {
                          $i--;
                          continue;
                        }
                  
                      // $percentage = 0;
                  
                     if(strtotime($date)<strtotime(date('Y-m-d H:i:s')))
                      {
                     
                        $temp_amt = $temp_amt+ 8;
                        
                      }

                  }

                  $amount9 =$amount9 + $temp_amt;
                    
                
          }
          
          
          
          
          
         
          
          $amount = $amount1+$amount2+$amount3+$amount4+$amount5+$amount6+$amount7+$amount8+$amount9;
         
         
         }

          else
          {
              $total_count=0;
              $amount=0;
          }
         
        
          
        
          
          
         
          
          
          
          
         

          $arr_single_leg                         = [];
          $arr_single_leg['single_leg_team']      = $total_count;
          $arr_single_leg['single_leg_income']    = $amount;
          
          
          
          


          return $arr_single_leg;


        }




  public function find_total_team($user_id,$pool,$i,$in,$a)
    {

       $user_data = DB::table('users')->where(['email'=>$user_id])->first();

     
       $child_count =  DB::table('users')->where(['sponcer_id'=>$user_id])->count();
       $child_data =  DB::table('users')->where(['sponcer_id'=>$user_id])->get();


         foreach ($child_data as $key => $value) 
          {

              array_push($pool, $value->email);

              if($value->is_active == "active")
              {
                $a++;
              }

              else
              {
                $i++;
              }


          }


          if(empty($pool[$i]))
          {
              $downline['active'] = $a;
              $downline['inactive'] = $i;
              return $downline;
          }



      

         return $this->find_total_team($pool[$i],$pool,$i+1,$in,$a);


    }


      public function find_total_team_detail($user_id,$pool,$i,$in,$a,$data)
    {

       $user_data = DB::table('users')->where(['email'=>$user_id])->first();

     

       $child_count =  DB::table('users')->where(['sponcer_id'=>$user_id])->count();
       $child_data =  DB::table('users')->where(['sponcer_id'=>$user_id])->get();

     //  $data[$i] = 0;

         foreach ($child_data as $key => $value) 
          {

             // echo $value->email; echo "<br>";

              array_push($pool, $value->email);

              if($value->is_active == "active")
              {
                $a++;
              }

              else
              {
                $in++;
              }
              
              $arr_data = [];
              $arr_data['id'] = $value->id;
              $arr_data['first_name'] = $value->first_name;
              $arr_data['user_id'] = $value->email;
              $arr_data['sponcer_id'] = $value->sponcer_id;
              $arr_data['level'] = $i+1;
              $arr_data['is_active'] = $value->is_active;
              $arr_data['mobile'] = $value->mobile;
              $arr_data['date'] =  $value->created_at;

             
             
             array_push($data, $arr_data);
           
              

          }


          if(empty($pool[$i]))
          {
              $downline['active'] = $a;
              $downline['inactive'] = $in;
              $downline['data'] = $data;
              return $downline;
          }



      

         return $this->find_total_team_detail($pool[$i],$pool,$i+1,$in,$a,$data);


    }


    public function find_total_team_at_level($user_id,$level)
    {
        if($level >= 8)
        {
          $count = DB::table('transaction')->where('reciver','=',$user_id)->where('reason','=','royal_plan')->where('level','=',$level)->count();

        }
        
        else
        {
          $count = DB::table('transaction')->where('reciver','=',$user_id)->where('reason','=','level')->where('level','=',$level)->count();

        }

        return $count;
    }


        
        
}
