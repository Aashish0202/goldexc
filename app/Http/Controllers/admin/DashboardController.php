<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class DashboardController extends Controller
{ 
         public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  


        public function calculate_amount($reason,$approval)
        {

            $trans = DB::table('transaction')
         
          ->where('reason','=',$reason)
          ->where('approval','=',$approval)
          ->get();

         

          $amount = 0;

          foreach ($trans as $key => $value) {
            
            $amount = $amount + $value->amount;

               }


            return $amount;
          }

        


          public function wallet()
        {


          $total_deposit_sum = DB::table('wallet')->SUM('total_deposit');

          $total_activation_sum = DB::table('wallet')->SUM('total_activation');

          $fund_transfer_out_sum = DB::table('wallet')->SUM('total_fund_out');

          $fund_transfer_in_sum = DB::table('wallet')->SUM('total_fund_in');

          $fund_transfer_in_sum = DB::table('wallet')->SUM('total_fund_in');

          $level_income_sum = DB::table('wallet')->SUM('level_income');

          $direct_income_sum = DB::table('wallet')->SUM('direct_income');

          $autopool_income_sum = DB::table('wallet')->SUM('autopool_income');
         
          $quiz_income_sum  = DB::table('wallet')->SUM('quiz_wallet');

          $quiz_level_income_sum = DB::table('wallet')->SUM('quiz_level_income');
 
          $total_withdrawal_sum = DB::table('wallet')->SUM('total_withdrawal');

          $total_withdrawal_p_sum = DB::table('wallet')->SUM('total_withdrawal_p');

          $roi_income_sum = DB::table('wallet')->SUM('roi_income');

          $wallet_to_transfer = DB::table('transaction')
                          
                           ->where('reason','=','internal_transfer')
                           ->SUM('amount');



        $level_roi_income = $this->level_roi_income('level', 'completed');

       $tbi_amount_sum = DB::table('transaction')
                           ->where('reason','=','activate_package_10')
                           ->SUM('package');
       // print_r($tbi_amount); die();


          $total_deposit      = $total_deposit_sum;
          
          $total_activation   = $total_activation_sum;

          $fund_transfer_out  =   $fund_transfer_out_sum;

          $fund_transfer_in = $fund_transfer_in_sum;

          $total_level_income = $level_income_sum;

          $direct_income = $direct_income_sum;

          $autopool_income = $autopool_income_sum;

          $quiz_income = $quiz_income_sum;

          
         
          $quiz_level_income = $quiz_level_income_sum;

          $total_withdrawal =$total_withdrawal_sum;



          $total_withdrawal_p =$total_withdrawal_p_sum;
          
          $roi_income = $roi_income_sum;

          $tbi_amount = $tbi_amount_sum;
           
          $level_roi_income1 = $level_roi_income;

         
         $total_withdrawal_c=$total_withdrawal+$total_withdrawal_p+$wallet_to_transfer+$tbi_amount;

        $total_fixed_income=$autopool_income_sum+$level_income_sum+$direct_income_sum;

         
         
      

         

          
          $data['total_deposit']                 = $total_deposit;
          $data['total_activation']              = $total_activation;
          $data['fund_transfer_out']             = $fund_transfer_out;

          $data['fund_transfer_in']              = $fund_transfer_in;
          
          $data['total_level_income']            = $total_level_income;
          $data['total_withdrawal']              = $total_withdrawal;

           $data['total_withdrawal_p']           = $total_withdrawal_p;

           $data['roi_income']                    = $roi_income;

           $data['direct_income']                = $direct_income;
           $data['autopool_income']              = $autopool_income;
           $data['quiz_income']                  = $quiz_income;
           $data['quiz_level_income']            = $quiz_level_income;


            $data['level_roi_income']            = $level_roi_income1;
            $data['total_withdrawal_c']          =$total_withdrawal_c;

            $data['total_fixed_income']         =$total_fixed_income; 

            $data['tbi_amount'] = $tbi_amount;

          // print_r($data);

          return $data;


          

        }

      


         public function level_roi_income($reason, $approval)
        {
          $trans = DB::table('transaction')
         
          ->where('reason','=',$reason)
          ->where('approval','=',$approval)
          ->get();

         // print_r($trans);

          $amount = 0;

          foreach ($trans as $key => $value) {

              $act_date = $value->created_at;

              $now = date("Y-m-d H:i:s");

             // print_r($now);

              $diff = round(abs(strtotime($act_date) - strtotime($now)) / 3600 ,2);

              
              if($value->level == 1)
              {
                $percentage = 10;
                $roi_p = $diff*($value->package/24)*0.03;

                  $roi = $roi_p * $percentage/100;

              if($roi > (($value->package)*0.03*6))
              {
                $roi = ($value->package)*0.03*6;
                
              }

              }
              else
              {
                $percentage = 2;
                $roi_p = $diff*($value->package/24)*0.03;
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
     

}
