<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class QuizController extends Controller
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
        
    public function quiz()
    {
    	     $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);

       return view(''.$themecheck1.'/quiz/quiz')->with(compact('user','themecheck1','wallet_balance')); 
    }



        public function quiz_booking(Request $request)
    {
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);

           $this->validate($request,[
                                'question_amt' => 'required',
                                
                              
                                
                              ]);

           $id = $_GET['id'];

           $data['question_amt']  = $request->input('question_amt');
            $data['quation_id']   = $id;
            $data['user_name']    = $user->first_name;

            $data['user_id']      = $user->email;

            $quiz_amount = $request->input('question_amt');


            $quation_data = DB::table('quiz_details')
                            ->where('id', '=',$id)
                           ->first();
          $data['quation_date']  = $quation_data->date;

           $wallet_data = DB::table('wallet')->where('user_id','=',$user->email)->first();


           
            if($quiz_amount > $wallet_data->quiz_wallet){

               Session::flash('error', 'Amount is greated than your wallet Amount');      
              return redirect()->back();

            }

           // print_r($wallet_data->quiz_wallet); die();

           $today = date('Y-m-d');

          $this->createTransaction($user->email,'',$quiz_amount,"","quiz_booking","","","completed",$today,"completed","");

         

         
          $wallet_update_data = [];
          $wallet_update_data['quiz_wallet'] = $wallet_data->quiz_wallet - $quiz_amount;

          $this->wallet_updater($wallet_update_data,$wallet_data->user_id);





           $booking = DB::table('quiz_booking')
                    ->insert($data);

          // print_r($id); die();


             Session::flash('success', 'Booking Submited Successfully');   
             return redirect()->back();
    }


        public function quiz_start(Request $request)
    {
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);


          
           


       return view(''.$themecheck1.'/quiz/quiz_quation')->with(compact('user','themecheck1','wallet_balance')); 
    }


  public function quiz_quation()
    {
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);


            $id =$_GET['id']; 


             $again_submit = DB::table('quiz_result')
                          ->where('quation_id', '=',$id)
                           ->where('user_id', '=',$user->email)
                           ->first();

                 if(isset($again_submit)){

                   Session::flash('error', 'Time Out'); 
                    return redirect()->back();




                           }

           //print($id); die();

            $data['quation_id']  = $id;
            $data['user_name']  = $user->first_name;

            $data['user_id']  = $user->email;

            $data = DB::table('quiz_result')
                    ->insert($data);


       return view(''.$themecheck1.'/quiz/quiz_quation')->with(compact('user','themecheck1','wallet_balance')); 
    }




     public function quiz_post(Request $request)
    {

      

           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);

          $data['right_ans']  = $request->input('right_ans');

          $data['ans']   = $request->input('ans');

          $data['duration']    = $request->input('timer');

          $data['quation_id']    = $request->input('id');

           $ans =  $request->input('ans');
           $right_ans = $request->input('right_ans');
        
         $id =$_GET['id'];

        // print($_GET['id'] ); die();

        if($right_ans == $ans){

        $data['winner'] ="winner";

        }

        else{

           $data['winner'] ="looser";

        }
            
             

          // print($data['winner'] ); die();
         
         if($request->input('ans') ==""){
           Session::flash('error', 'Select Atleast one Option'); 
          return redirect()->back();
          }

       // print_r($request->input('id')); die();
        
           $data = DB::table('quiz_result')
                  ->where('quation_id', '=',$id)
                   ->where('user_id', '=',$user->email)
                    ->update($data);
         
           

          
           return view(''.$themecheck1.'/quiz/quiz')->with(compact('user','themecheck1','wallet_balance')); 
    }





        public function quiz_result(Request $request)
    {
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);



           $data = DB::table('quiz_result')
                   ->where('user_id', '=',$user->email)
                   ->orderby('id','desc')
                    ->get();



          
           


       return view(''.$themecheck1.'/quiz/quiz_result')->with(compact('user','themecheck1','wallet_balance','data')); 
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



     public function spinner()
    {
           $themecheck1 = $this->themecheck();

           $user = Sentinel::check();

           $WalletController = new WalletController;

           $wallet_balance = $WalletController->wallet($user->email);


          
           


       return view(''.$themecheck1.'/quiz/spinner')->with(compact('user','themecheck1','wallet_balance')); 
    }


 public function empty()
    {

 $user = Sentinel::check();


      $wallet1 =DB::table('wallet')->where('user_id', '=',$user->email)->get();


    //print_r("visite to this function"); die();


      $data['roi_income']        = 0;
      $data['direct_income']       = 0;
      $data['autopool_income']     = 0;
      $data['pool_upgrade']        = 0;
      $data['autopool_pending']    = 0;
      $data['quiz_income']       = 0;
      $data['quiz_level_income']   = 0;
      $data['level_income']        = 0;
      $data['wallet_balance']      = 0;
      $data['activation_wallet_balance']      = 0;

      $data['total_activation']    = 0;

      $data['total_deposit']       = 0;
      $data['total_withdrawal']    = 0;
      $data['total_withdrawal_p']  = 0;

      $data['total_fund_in']       = 0;
      $data['total_fund_out']      = 0;

      $data['quiz_played_amt']     = 0;
      $data['quiz_wallet']         = 0;

      
     $data = DB::table('wallet')->update($data);


     }
                   
        
    
}
