<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Sentinel;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\user\WalletController;
use Hash;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\user\ActivationController;


class UserController extends Controller
{
        public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }

        public function club_give()
        {
           $start_date = $_GET['start_date'];
           $end_date   = $_GET['end_date'];
           $amount     = $_GET['amount'];

           $total_data = DB::table('transaction')
                  ->where('reason','=','activate_package')
                  ->whereBetween('date',[$start_date, $end_date])
                  ->count();



           $today = date('Y-m-d');


           $club_ach_count = 0;
            $all_user = DB::table('users')->where('is_active','=','active')->get();

            foreach ($all_user as $key => $value) {

              $temp_child_count = 0;
              $child = DB::table('users')->where('sponcer_id','=',$value->email)->where('is_active','=','active')->get();

              foreach ($child as $child) {
                $child_data = DB::table('transaction')
                  ->where('reason','=','activate_package')
                  ->where('reciver','=',$child->email)
                  ->whereBetween('date',[$start_date, $end_date])
                  ->count();



                  if($child_data >= 1)
                  {
                     $temp_child_count = $temp_child_count + 1;

                  }

                  
              }

              if($temp_child_count >= 2)
              {
                 $club_ach_count++;
                echo $club_ach_count; echo " ";  echo $value->email; echo " "; echo $temp_child_count; echo "<br>"; 
                 $this->createTransaction('',$value->email,$amount,'',"club_income","","","completed",$today,"completed","");


              }


              
             

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


    public function dashboard()
    {
        $usercheck = $this->usercheck();

       


        $DashboardController = new DashboardController;

        $wallet_balance   = $DashboardController->wallet();

        $total_withdrawal_sum = DB::table('wallet')->SUM('total_withdrawal');


       // print_r($total_withdrawal_sum); die();

          $start_date="";
          $end_date="";
        
        $current_date = date('d');
       if($current_date <= 10 && $current_date >= 1)
       {
          $start_time = strtotime(''.date('m').'/1/'.date('Y').'');
          $start_date = date('Y-m-d',$start_time);
          
          $end_time = strtotime(''.date('m').'/10/'.date('Y').'');
          $end_date = date('Y-m-d',$end_time);
       }
                                        
        
        if($current_date <= 20 && $current_date >= 11)
        {
          // $start_time = strtotime('11/'.date('m').'/'.date('Y').'');
           $start_time = strtotime(''.date('m').'/11/'.date('Y').'');
          $start_date = date('Y-m-d',$start_time);
          
          $end_time = strtotime(''.date('m').'/20/'.date('Y').'');
          $end_date = date('Y-m-d',$end_time);
        }
                                      

         if($current_date <= 31 && $current_date >= 21)
        {
          $start_time = strtotime(''.date('m').'/21/'.date('Y').'');
          $start_date = date('Y-m-d',$start_time);
          
          $end_time = strtotime(''.date('m').'/31/'.date('Y').'');
          $end_date = date('Y-m-d',$end_time);
        }

         





        

         
           
            $transaction_data1 = DB::table('transaction')
                  ->where('reason','=','activate_package')
                  ->whereBetween('date',[$start_date, $end_date])
                  ->count();

              //    print_r($transaction_data1); die();

            $transaction_data= $transaction_data1*1;


            $club_ach_count = 0;
            $all_user = DB::table('users')->where('is_active','=','active')->get();

            foreach ($all_user as $key => $value) {

              $temp_child_count = 0;
              $child = DB::table('users')->where('sponcer_id','=',$value->email)->where('is_active','=','active')->get();

              foreach ($child as $child) {
                $child_data = DB::table('transaction')
                  ->where('reason','=','activate_package')
                  ->where('reciver','=',$child->email)
                  ->whereBetween('date',[$start_date, $end_date])
                  ->count();


                  if($child_data >= 1)
                  {
                     $temp_child_count = $temp_child_count + 1;

                  }

                  
              }

              if($temp_child_count >= 2)
              {
                 $club_ach_count++;

              }


              
             

            }



        return view(''.$usercheck.'/admin/dashboard')->with(compact('usercheck','wallet_balance','transaction_data','club_ach_count')); 
    }

     public function dashboard_2()
       {
       $usercheck = $this->usercheck();




        $user_id = DB::table('wallet')->get();




        $sum = 0;
              foreach($user_id as $key=>$value)
              {


                 $WalletController = new WalletController;
                 $wallet_balance = $WalletController->wallet($value->user_id);

                 
                
                 $sum+= $wallet_balance['income_wallet'];
              }
              echo $sum;
        
      
    

      

      return view(''.$usercheck.'/admin/dashboard_2')->with(compact('usercheck','sum')); 
       }

    public function view_user()
       {

        $usercheck = $this->usercheck();

        if(isset($_GET['type']))
        {
            $type = $_GET['type'];
            $data = DB::table('users')
                    ->where('is_active','=',$type)
                    ->where('user_type','<>','admin')
                    ->get();
        }
        else
        {
            $data = DB::table('users')
                    ->where('user_type','<>','admin')
                    
                    ->get();
        }
        
        return view(''.$usercheck.'/admin/view_user')->with(compact('data')); 
    } 


        public function is_active_status(Request $request)
            {

                $data['id']         = $request->input('id');
                $data['is_active']  = $request->input('is_active');

                  DB::table('users')
                      ->where('id','=',$data['id'])
                      ->update($data);


                Session::flash('success', 'User Activated Successfully');
                return redirect()->back();

            }

        
     public function user_edit()
       {

          

            $usercheck = $this->usercheck();
            $id     = $_GET['id'];
            $data   = DB::table('users')
                                ->where('id','=',$id)
                                ->first();
         

            return view(''.$usercheck.'/admin/user_edit')->with(compact('data','usercheck'));
    
           
        }

        public function user_edit_post(Request $request)
        {
        //  print_r($request->input()); die();
            
            
            $data['email']                = $request->input('email');
            // $data['password']          = $request->input('password');
            $data['permissions']          = $request->input('permissions');
            $data['first_name']           = $request->input('first_name');
            $data['mobile']               = $request->input('mobile');
            $data['email1']               = $request->input('email1');
            $data['sponcer_id']           = $request->input('sponcer_id');
            $data['btc_address']          = $request->input('btc_address');
            $data['tron_address']         = $request->input('tron_address');
            $data['pan']                  = $request->input('pan');
            $data['adhar']                = $request->input('adhar');
            $data['bank_acc_no']          = $request->input('bank_acc_no');
            $data['bank_ifsc']            = $request->input('bank_ifsc');
            $data['bank_acc_holder_name'] = $request->input('bank_acc_holder_name');
            $data['city']                 = $request->input('city');
            $data['state']                = $request->input('state');
            $data['country']              = $request->input('country');
            $data['address']              = $request->input('address');
            $data['dob']                  = $request->input('dob');
            $data['is_active']            = $request->input('is_active');
            
              $id                           = $request->input('id');
               $data =   DB::table('users')
                                   ->where('id','=',$id)
                                   ->update($data);

            Session::flash('success', 'Employee Update Successfully');
            return redirect()->back();

     }

        public function view_details()
       {
            $usercheck = $this->usercheck();


            $id     = $_GET['id'];
            $data   = DB::table('users')
                                ->where('id','=',$id)
                                ->first();

            $WalletController = new WalletController;

            $wallet_balance   = $WalletController->wallet($data->email);                   
               $direct_income1 = DB::table('transaction')->where('level','=',1)->where('reciver','=',$data->email)->get();

              // print_r($direct_income1);  die();
  
            return view(''.$usercheck.'/admin/view_details')->with(compact('data','usercheck','wallet_balance'));
    
           
        }

        public function set_password()
       {

          $usercheck = $this->usercheck();
          return view(''.$usercheck.'/admin/set_password')->with(compact('usercheck')); 
           
        }

        public function set_password_post(Request $request)
       {

       
        $usercheck = $this->usercheck();
         return view(''.$usercheck.'/admin/set_password_post')->with(compact('usercheck')); 
           
        }

        public function stop_withdraw(Request $request)
       {

                $data['id']         = $request->input('id');
                $data['withdraw_status']  = $request->input('withdraw_status');

                  DB::table('users')
                      ->where('id','=',$data['id'])
                      ->update($data);


                Session::flash('success', 'Status Change');
                return redirect()->back();
           
        }

        

        public function login_as()
       {

           $user1 = $_GET['id'];


           $user = Sentinel::findById($user1);

           Sentinel::login($user);

           return redirect('user/dashboard'); 
           
        }

        public function count_clube_income()
          {
            $current_date = date('d');
       if($current_date < 10 && $current_date > 1)
       {
          $start_time = strtotime(''.date('m').'/1/'.date('Y').'');
          $start_date = date('Y-m-d',$start_time);
          
          $end_time = strtotime(''.date('m').'/10/'.date('Y').'');
          $end_date = date('Y-m-d',$end_time);
       }
                                        
                                      

        if($current_date < 20 && $current_date > 11)
        {
          // $start_time = strtotime('11/'.date('m').'/'.date('Y').'');
           $start_time = strtotime(''.date('m').'/11/'.date('Y').'');
          $start_date = date('Y-m-d',$start_time);
          
          $end_time = strtotime(''.date('m').'/20/'.date('Y').'');
          $end_date = date('Y-m-d',$end_time);
        }
                                      

         if($current_date < 30 && $current_date > 21)
        {
          $start_time = strtotime(''.date('m').'/21/'.date('Y').'');
          $start_date = date('Y-m-d',$start_time);
          
          $end_time = strtotime(''.date('m').'/31/'.date('Y').'');
          $end_date = date('Y-m-d',$end_time);
        }

         

  
         
           
            $transaction_data = DB::table('transaction')
                  ->where('reason','=','activate_package')
                  ->whereBetween('date',[$start_date, $end_date])
                  ->count();

            //print_r($transaction_data); die();
                 
    
         

          }


           public function admin_password()
       {

          $usercheck = $this->usercheck();
          return view(''.$usercheck.'/admin/admin_password')->with(compact('usercheck')); 
           
        }




          
        public function admin_password_post(Request $request)
       {
        $data = Sentinel::check();  

        $data1 = $data->password;



          // print_r($data1); die();

       if(Hash::check($request->old_password,$data->password))

        {

          $pwd_open =$request->new_password;
             $data['pwd_open'] = $pwd_open ;
          
            $data->update(['password' => bcrypt($request->new_password)], ['pwd_open' => $pwd_open]);
            return redirect()->back()->with(['success' =>  'password update successfully ']);
      
       }
       else {
            Session::flash('error', 'Password not match');   
            return redirect()->back()->with(['error' =>  'Old password does not match']);
     
       }
       
       
           
        }

        public function tbi_report(){
           $usercheck = $this->usercheck();


          $data = DB::table('transaction')
                           ->where('reason','=','activate_package_10')
                           ->get();



           return view(''.$usercheck.'/admin/tbi_report')
                        ->with(compact('usercheck','data')); 
        }


 public function pakage_20(){
           $usercheck = $this->usercheck();


          $data = DB::table('transaction')
                            ->where('reason','=','activate_package_20')
                            ->orderBy('id', 'desc')   
                            ->get();



           return view(''.$usercheck.'/admin/pakage_20')
                        ->with(compact('usercheck','data')); 
        }



        public function transfer_reward()
        {
           $usercheck = $this->usercheck();
           return view(''.$usercheck.'/admin/transfer_reward')
                        ->with(compact('usercheck')); 
        }


        public function transfer_reward_post(Request $request)
        {
            $user_id = $request->input('user_id');
            $amount = $request->input('amount');


            $this->createTransaction('GOLDEXCHANGE',$user_id,$amount,'','reward_transfer','','','completed',date('Y-m-d'),'Reward','');


            Session::flash('success', 'Reward Successfully Transfered');   
            return redirect()->back()->with(['success' =>  'Reward Successfully Transfered']);
     
        }

        

}
