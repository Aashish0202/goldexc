<?php

namespace App\Http\Controllers\admin;
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
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  


      public function quiz()
    {
         $usercheck = $this->usercheck();

          $data = DB::table('quiz_details')
                    -> orderBy('id', 'desc')
                      ->get();
        return view(''.$usercheck.'/admin/quiz')->with(compact('data','usercheck'));
    }


    public function add_quiz()
    {
         $usercheck = $this->usercheck();

        return view(''.$usercheck.'/admin/add_quiz')->with(compact('usercheck'));
    }


     public function view_quiz_result()
    {
         $usercheck = $this->usercheck();


          $data = DB::table('quiz_details')
                    -> orderBy('id', 'desc')
                      ->get();

                    //  print_r($data); die();


        return view(''.$usercheck.'/admin/view_quiz_result')->with(compact('usercheck','data'));
    }

     public function quiz_result()
    {
         $usercheck = $this->usercheck();

          $id = $_GET['id'];

         // print_r($id); die();


          $data = DB::table('quiz_result')
                     ->Where('quation_id' ,'=',$id)
                     -> orderBy('duration', 'ASC')
                     ->get();

                 //  print_r($data); die();


        return view(''.$usercheck.'/admin/quiz_result')->with(compact('usercheck','data'));
    }


    

    public function quiz_delete()
    {
         $usercheck = $this->usercheck();

         $id = $_GET['id'];

         $data = DB::table('quiz_details')
                ->Where('id' ,'=',$id)
                ->delete();


         $data1 = DB::table('quiz_result')
                ->Where('quation_id' ,'=',$id)
                ->delete();




        // print_r($data); die();

            Session::flash('success', 'Quation deleted Successfully');      
            return redirect()->back();
    }

      public function winner()
      {
        
                $id = $_GET['id'];

                $data = DB::table('quiz_result')
                        ->Where('quation_id' ,'=',$id)
                        ->Where('winner' ,'=',"winner")
                        ->orderBy('duration','ASC')
                        
                        ->take(10)
                        ->get();

                     // print_r($data); die();
                          $q_amount  = DB::table('quiz_booking')
                                     ->Where('quation_id' ,'=',$id)

                                     ->SUM('question_amt');

                               
                            

                      
                      
                        $today = date('Y-m-d');

                       

                        $percentage = 20;
                        $quiz_amt = $q_amount/2;

                         // print_r($quiz_amt) ; die();

                        $first_amt = ($percentage / 100) *  $quiz_amt;

                          
                         $percentage1 = 10;

                        $second_amt = ($percentage1 / 100) *  $quiz_amt;

                    


                        $winner_income_data = [$first_amt,$second_amt,$second_amt,$second_amt,$second_amt,$second_amt,$second_amt,$second_amt,$second_amt,$second_amt];


                        foreach ($data as $key => $value) {

                            // get user id of winners


                            // now key == 0 -> winner 1

                            if($key == 0)
                            {

                                // create transaction 

                             $winning_amt = $quiz_amt*$winner_income_data[$key]/100;

                             

                             $this->createTransaction('',$value->user_id,$winning_amt,$value->id,"quiz_income",$key,'',"completed",$today,"completed","");

                            $wallet_data = DB::table('wallet')->where('user_id','=',$value->user_id)->first();
                            $wallet_update_data = [];
                            $wallet_update_data['quiz_income'] = $wallet_data->quiz_income + $winning_amt;
                            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $winning_amt;
                            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);




                                // self 



                            // { self and for loop to send money to upto 6 level level incoem code}

                            $level_parent = $value->user_id;
                            

                            $level_income_data = ['10','5','4','3','2','2','1','1','1','1'];

           for ($i=0; $i < 10; $i++) { 

            $key1 = $i+1;

          $parent = $this->get_direct_parent_at_position($level_parent,0,$key);

          $parent_status = $this->user_status($parent);

          $level_data =$level_income_data[$i];

         $check = $quiz_amt*$level_data/100;

        // print_r( $check); die();

          if($key1 ==  1)
          {

            if($parent_status ==  "active")
          {

            $this->createTransaction('',$value->user_id,$quiz_amt*$level_data/100,$value->id,"direct",$key1,$level_data,"completed",$today,"completed","");

            $wallet_data = DB::table('wallet')->where('user_id','=',$parent)->first();
            $wallet_update_data = [];
            $wallet_update_data['quiz_level_income'] = $wallet_data->direct_income + $quiz_amt*$level_data/100;
            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $quiz_amt*$level_data/100;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);
          }

          else
          {
            $this->createTransaction('',$parent,$quiz_amt*$level_data/100,$value->id,"level",$key1,$quiz_amt*$level_data/100,"failed",$today,"failed","");
          }

          }
          else
          {

            if($parent_status ==  "active")
          {
            $this->createTransaction('',$value->user_id,$quiz_amt*$level_data/100,$value->id,"level",$key1,$quiz_amt*$level_data/100,"completed",$today,"completed","");
            $wallet_data = DB::table('wallet')->where('user_id','=',$parent)->first();
            $wallet_update_data = [];
            $wallet_update_data['level_income'] = $wallet_data->level_income + $quiz_amt*$level_data/100;
            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $quiz_amt*$level_data/100;
            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);
          }

          else
          {
            $this->createTransaction('',$parent,$quiz_amt*$level_data/100,$value->id,"level",$key1,$quiz_amt*$level_data/100,"failed",$today,"failed","");
          }

          }



         }

          }

          else
          {

                            $winning_amt = $quiz_amt*$winner_income_data[$key]/100;

                             $this->createTransaction('',$value->user_id,$winning_amt,$value->id,"quiz_income",$key,'',"completed",$today,"completed","");

                            $wallet_data = DB::table('wallet')->where('user_id','=',$value->user_id)->first();
                            $wallet_update_data = [];
                            $wallet_update_data['quiz_income'] = $wallet_data->quiz_income + $winning_amt;
                            $wallet_update_data['wallet_balance'] = $wallet_data->wallet_balance + $winning_amt;
                            $this->wallet_updater($wallet_update_data,$wallet_data->user_id);

          }


                            // else winner 2 to 6

                            // { amount distribute to self only }


                  

             Session::flash('success', 'Winner Successfully');      
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



      public function add_quiz_post(Request $request)
    {
        
        $data['quation']         = $request->input('quation'); 
        $data['option_1']        = $request->input('option_1');
        $data['option_2']        = $request->input('option_2');
        $data['option_3']        = $request->input('option_3');
        $data['option_4']        = $request->input('option_4'); 
        $data['right_ans']       = $request->input('right_ans');
        
        $data['date']            = $request->input('date');
        $data['time']            = $request->input('time');

        $data['to_time']         = $request->input('to_time');

         $data['booking']         = $request->input('booking');

          $data['amount']         = $request->input('amount');



              
                $data = DB::table('quiz_details')
                    ->insert($data);
                
                   
             Session::flash('success', 'Quation Added Successfully');      
            return redirect()->back();
               
               
    }  

     public function quiz_edit()
    {
         $usercheck = $this->usercheck();

         $id = $_GET['id'];

         $data = DB::table('quiz_details')
                 ->where('id', '=', $id)
                ->first();




        return view(''.$usercheck.'/admin/quiz_edit')->with(compact('usercheck','data'));
    }


      public function quiz_edit_post(Request $request)
    {
        
        $data['quation']         = $request->input('quation'); 
        $data['option_1']        = $request->input('option_1');
        $data['option_2']        = $request->input('option_2');
        $data['option_3']        = $request->input('option_3');
        $data['option_4']        = $request->input('option_4'); 
        $data['right_ans']       = $request->input('right_ans');
        
        $data['date']            = $request->input('date');
        $data['time']            = $request->input('time');

        $data['to_time']         = $request->input('to_time');
        $data['booking']         = $request->input('booking');

         $data['amount']         = $request->input('amount');

        $id        = $request->input('id');

      //  print_r($request->input('id')); die();
              
                $data = DB::table('quiz_details')
                        ->Where('id' ,'=',$id)
                       ->update($data);
                
                   
             Session::flash('success', 'Quation Updated Successfully');      
            return redirect()->back();
               
               
    }  


      public function all_quiz()
    {
         $usercheck = $this->usercheck();

          $data = DB::table('quiz_result')
                    -> orderBy('id', 'desc')
                      ->get();
        return view(''.$usercheck.'/admin/all_quiz')->with(compact('data','usercheck'));
    }



        public function wallet_updater($wallet_update_data, $user_id)
    {

        DB::table('wallet')->where('user_id','=',$user_id)->update($wallet_update_data);

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


}
