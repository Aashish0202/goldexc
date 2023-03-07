<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\BroadcastController; 
use App\Http\Controllers\admin\forgotController;
use Sentinel;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;  
class AuthController extends Controller

{


    public function resistration()
    {
        return view('Auth/resistration');
    } 

    public function resistration_post(Request $request)
    {
            $set = DB::table('setting')
                    ->first();
                    
                   // print_r($request->input('mobile')); die();

            $emailcount = DB::table('users')
                            ->where('email1', '=', $request->input('email1'))
                            ->count();

            $e = $set->max_email_count;

            if($emailcount > $set->max_email_count)
            {    
            
                 Session::flash('error', 'Email ID Used for only '.$e.' Time ');                    
                return redirect()->back();
            }


            $mobilecount = DB::table('users')
                            ->where('mobile', '=', $request->input('mobile'))
                            ->count();
            
            $m = $set->max_mobile_count;

            if($mobilecount > $set->max_mobile_count)
            {
                Session::flash('error', 'Mobile Number Used for only '.$m.' Time');      
                return redirect()->back();
            }

            $s = $set->max_sponcer_count;

            $sponcercount = DB::table('users')
                            ->where('sponcer_id', '=', $request->input('sponcer_id'))
                            ->count();


                //print_r($sponcercount); die();
            

            if($sponcercount > $set->max_sponcer_count)
            {
                Session::flash('error', 'sponcer ID used Only '.$s.' Time');      
                return redirect()->back();
            }



            $selfcount = DB::table('users')
                            ->where('email', '=', $request->input('user_id'))
                            ->count();


                //print_r($sponcercount); die();
            

            if($selfcount > 0)
            {
                Session::flash('error', 'User ID Alredy Present');      
                return redirect()->back();
            }

     if (strrpos($request->input('user_id'), ' ') !== false){
   

     Session::flash('error', 'Space found in User ID Please enter User Id Without space.');    
       return redirect()->back();
}

            $this->validate($request,[
                              'first_name'    => 'required',
                              'user_id'       => 'required',
                              'password'      => 'required',
                              'sponcer_id'    => 'required',
                              'email1'        => 'required|email',
                              'mobile'        => 'required',
                              ]);

             
            
    
             $user_status = Sentinel::registerandActivate
              ([


                'email'         =>$request->input('user_id'),
                'first_name'    =>$request->input('first_name'),
                'password'      =>$request->input('password'),
                

              ]);



              // print_r($request->input('user_id')); die();
     
 
        if(isset($user_status->id) && !empty($user_status->id))
        {
            $data['sponcer_id']  = $request->input('sponcer_id');
            $data['email1']      = $request->input('email1');
            $data['is_active']   = 'inactive';
            $data['mobile']      = $request->input('mobile');
            $t_pin = rand(1,100000);
            $data['tpin']        = $t_pin;
            $data['joining_date']        = date('Y-m-d');
            $data['jar']        = $request->input('jar');
            $data['usdt_address']        = $request->input('usdt');
            $data['digigold']        = $request->input('digigold');
            $data['pwd_open']        = $request->input('password');



           
            DB::table('users')->where(['id'=>$user_status->id])->update($data);
        }

        


          

          $walletdata['user_id'] = $request->input('user_id');
          
           DB::table('wallet')
                ->insert($walletdata);

                

          $site_data = DB::table('setting')
                      ->first();


         $BroadcastController = new BroadcastController;

         $content = "Thanks for new Registration. Your User ID is ".$request->input('user_id')." Password is ".$request->input('password')."";

         

         $BroadcastController->mail("Registration Successfully","User Registration Successfully",$request->input('email1'),$request->input('first_name'),$site_data->email,$site_data->site_name,$content);

        

       Session::flash('success', $content);    
        return redirect('login');



    }

    public function login()
    {

        return view('Auth/login');
    }

    public function login_post(Request $request)
    {

         $this->validate($request,[
                                'email'      => 'required',
                                'password'   => 'required', 
                              ]);
            
        $credentials = [
          'email'    => $request->input('email'),
          'password' => $request->input('password'),
        ];

        

            //  $login = Sentinel::authenticate($credentials);

            if($request->remember)
            {

                $login =Sentinel::authenticateAndRemember($credentials);

            }

        else{
            $login =Sentinel::authenticate($credentials);
        }

            if($login)
            {
                    $user_data = DB::table('users')
                                    ->where('email','=',$request->input('email'))
                                    ->first();
                        if($user_data->user_type == 'admin')
                        {
                        //  echo "hello"; die();
                            return redirect('admin/dashboard');
                        }
                        else if($user_data->user_type == 'user')
                        {
                            //echo "hello"; die();
                            return redirect('user/dashboard');
                        }
                //return redirect('dashboard');
            }
            else
            {
                Session::flash('error', 'User Id Or Password Invalid');      
                return redirect()->back();
            }
        }
        
    
    
        public function logout(Request $request) 
        {
            Sentinel::logout();

            return redirect('login');
            
        }
            //return view('Master/dashboard');



        public function check()
        {
            $sponcer_id = $_GET['sponcer_id'];

            $sponcer_data = DB::table('users')->where('email','=',$sponcer_id)->first();

            if(isset($sponcer_data))
            {
                $data['status'] = "success";
                $data['name'] = $sponcer_data->first_name;

                $json_data = json_encode($data);

                echo $json_data;
            }
            else
            {

                $data['status'] = "error";
                

                $json_data = json_encode($data);

                echo $json_data;

            }
        }

        public function usercheck()
        {
            $user_id = $_GET['user_id'];

            $user_data = DB::table('users')->where('email','=',$user_id)->first();

            if(isset($user_data))
            {

                $data['status'] = "error";
                

                $json_data = json_encode($data);

                echo $json_data;
                // $data['status'] = "success";
                // $data['name'] = $user_data->first_name;

                // $json_data = json_encode($data);

                // echo $json_data;
            }

            else
            {

                $data['status'] = "no";
                

                $json_data = json_encode($data);

                echo $json_data;

            }
            // else
            // {

                

            // }
        }

        public function useridcheck()
          {
            $user_id = $_GET['user_id'];

            $user_data = DB::table('users')->where('email','=',$user_id)->first();

            if(isset($user_data))
            {
              $data['status'] = "success";
              
              $data['name']   = $user_data->first_name;

              $json_data = json_encode($data);

              echo $json_data;
        }
            else
            {

              $data['status'] = "error";
              
              $json_data = json_encode($data);

              echo $json_data;

            }
          }


           public function usertrascheck()
          {
            $transfer_to = $_GET['transfer_to'];

            $user_data = DB::table('users')->where('email','=',$transfer_to)->first();

            if(isset($user_data))
            {
              $data['status'] = "success";
              
              $data['name']   = $user_data->first_name;

              $json_data = json_encode($data);

              echo $json_data;
        }
            else
            {

              $data['status'] = "error";
              
              $json_data = json_encode($data);

              echo $json_data;

            }
          }


           public function registercheck()
          {
            $sponcer_id = $_GET['sponcer_id'];

            $user_data = DB::table('users')->where('email','=',$sponcer_id)->first();

            if(isset($user_data))
            {
              $data['status'] = "success";
              
              $data['name']   = $user_data->first_name;

              $json_data = json_encode($data);

              echo $json_data;
        }
            else
            {

              $data['status'] = "error";
              
              $json_data = json_encode($data);

              echo $json_data;

            }
          }

          public function package_user_check(){

             $user_id = $_GET['user_id'];

            $user_data1 = DB::table('users')->where('email','=',$user_id)->first();

            if(isset($user_data1))
            {
              $data['status'] = "success";
              
              $data['name']   = $user_data1->first_name;

              $json_data = json_encode($data);

              echo $json_data;
        }
            else
            {

              $data['status'] = "error";
              
              $json_data = json_encode($data);

              echo $json_data;

            }

          }

            public function forgot_password()
          
         {
              return view('Auth/forgot_password');
          }


          public function forgot_password_post(Request $request)

         {
          
             $user= DB::table('users')->where('email', '=', $request->email)->first();

          // print_r($user); die();

             if(is_null($user)){
               return redirect()->back()->with(['error' =>  'Email not exits']);
             }
             
            else{

              $data = Sentinel::findById($user->id);
             //print_r($data); die();
              $password = rand(1,10000000);

              $new_credentials = [];
              $new_credentials['password'] = password_hash($password, PASSWORD_DEFAULT);
              $new_credentials['pwd_open'] = $password;


              DB::table('users')->where('email', '=', $request->email)->update($new_credentials);   


              //print_r($password); die();

              $BroadcastController = new BroadcastController;

              $content = "Hello ,You are receiving this email because we received a password reset request for your account Your user ID " .$user->email." Password is ".$password." and  TPIN  ".$user->tpin."";


                $site_data = DB::table('setting')
                      ->first();


         

              $BroadcastController->mail("Password Sent Successfully","Password Sent Successfully",$user->email1,$user->first_name,$site_data->email,$site_data->site_name,$content);














/*
              $data = DB::table('users')->where('email', '=', $request->email)->first();

              $data1 = $data->password;*/

             //print_r($data1 ); die();

              return redirect()->back()->with(['success' =>  'Please Check your email']);
            }
             
          }


           public function resetpassword()
         {
              return view('Auth/resetpassword');
          }


         
                public  function check_position($email,$position)
              {           

                $user= \DB::table('users')->where('email','=',$email)->first();           

                if($user->{$position}!=null) 
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


        
    }