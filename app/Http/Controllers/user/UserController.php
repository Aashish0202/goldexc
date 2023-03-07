<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Sentinel;
use Session;
use Illuminate\Http\Request;
use App\file;
use Hash;

class UserController extends Controller
{
    public function usercheck()
    {
        $user = Sentinel::check();
           
        if($user->user_type == 'user')
        {
            $middelware = 'user';
        }
     //print_r($user);     
    }

    public function themecheck()
    {
      $theme1  = DB::table('setting')
                   ->first();

      $themecheck = $theme1->theme;
           
      return $themecheck;

    }

    public function dashboard()
    {
        $themecheck1 = $this->themecheck();

        // $usercheck   = $this->usercheck();

        $user        = Sentinel::check();

      //  print_r($user); die();
         $WalletController = new WalletController;

         $wallet_balance = $WalletController->wallet_binary($user->email);

         $transaction = DB::table('transaction')->where('reciver','=',$user->email)->orWhere('sender','=',$user->email)->limit(5)->get();



         $ActivationController = new ActivationController;



        
       

        return view(''.$themecheck1.'/dashboard')->with(compact('user','themecheck1','wallet_balance','transaction')); 
    }

    

    public function change_profile()
    { 
        $themecheck1 = $this->themecheck();
    	 
        $data = Sentinel::check();    

        return view(''.$themecheck1.'/change_profile')->with(compact('data','themecheck1'));
    }

    public function change_profile_post(Request $request)
    {
            $data['first_name']    = $request->first_name; 
            $data['address']       = $request->address;
             $data['mobile']       = $request->mobile;
              $data['city']       = $request->city;



               if($request->has('image')) 
              {
                $file      = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename  = time().'.'.$extention;
                
                
                $data['image'] = $filename;

               
              

               $allowed = array('jpeg', 'png', 'jpg');
                        $filename = $_FILES['image']['name'];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (!in_array($ext, $allowed)) {
                            Session::flash('error', 'invalid file ');
                           return redirect()->back(); 
                        }

                  $file->move(public_path('image'),$filename);
              //print_r($request->input('id'));die();

                  }

              

              $id      = $request->input('id');
              $data    = DB::table('users')
                             ->where('id','=',$id)
                            ->update($data);
              
             Session::flash('success', 'Profile Change Successfully');
             return redirect()->back();       
                   
           
    }

     public function view_profile()
    {
    	 $themecheck1 = $this->themecheck();

       $data = Sentinel::check(); 


       return view(''.$themecheck1.'/view_profile')->with(compact('data','themecheck1'));
    }

     public function change_password()
    {
    	 $themecheck1 = $this->themecheck();

       $data = Sentinel::check();  
       return view(''.$themecheck1.'/change_password')->with(compact('data','themecheck1'));
    }

    public function change_password_post(Request $request)
     {
        
        $data = Sentinel::check();  

       $data1 = $data->password;



         //  print_r($data1 ); die();

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

     public function change_transaction_pin()
    {
       $themecheck1 = $this->themecheck();

       $data = Sentinel::check();  
       return view(''.$themecheck1.'/change_transaction_pin')->with(compact('data','themecheck1'));
    }

    public function change_transaction_pin_post(Request $request)
    {

        $this->validate($request,[
                                'old_tpin'         => 'required',
                                'new_tpin'         => 'required',
                                'confirm_tpin'         => 'required',
                              ]);

        //die();





       $old_tpin    =   $request->input('old_tpin');
       $new_tpin    =   $request->input('new_tpin');
       $confirm_tpin    =   $request->input('confirm_tpin');



        if($new_tpin !=$confirm_tpin ){

          Session::flash('error', 'New Pin and Confirm Pin Not same');   
            return redirect()->back();

        }

       $data = Sentinel::check();  
        
        // $data = Sentinel::check();  




       if($data->tpin == $old_tpin)
        {
          $id=$request->input('id');
          $pin['tpin'] = $new_tpin; 
                DB::table('users')
                    ->where('id','=',$id)
                    ->update($pin);
                    Session::flash('success', 'Transaction Pin change successfully!');
                    return redirect()->back();
     
      
       }
       else {
            Session::flash('error', 'TPIN not match');   
            return redirect()->back();
     
       }
       
    }

     public function change_bank_details()
    {
    	  $themecheck1 = $this->themecheck();

       $data = Sentinel::check(); 

       return view(''.$themecheck1.'/change_bank_details')->with(compact('data','themecheck1'));
    }

    public function change_bank_details_post(Request $request)
    {

     /*  $data['bank_acc_holder_name'] = $request->bank_acc_holder_name;
      
       $data['pan']            = $request->pan;
       $data['adhar']            = $request->adhar;
*/
        $data['bank_acc_no']          = $request->bank_acc_no;
       $data['bank_ifsc']            = $request->bank_ifsc;
      $data['usdt_address']            = $request->usdt_address;
      $data['jar']            = $request->jar;
      $data['digigold']            = $request->digigold;


       //print_r($request->pan); die();

       $id=$request->input('id');
               $data = DB::table('users')
                    ->where('id','=',$id)
                    ->update($data); 


          Session::flash('success', 'Data Uploaded successfully!');       
           return redirect()->back();
    }

    
    public function crypto_wallet()
    {
       $themecheck1 = $this->themecheck();

       $data = Sentinel::check(); 

       return view(''.$themecheck1.'/crypto_wallet')->with(compact('data','themecheck1'));
    }

     public function crypto_wallet_post(Request $request)
    {

       $data['btc_address']       = $request->btc_address;
       $data['trx_address']      = $request->trx_address;
       $data['imps_address']      = $request->imps_address;
       $data['doge_address']      = $request->doge_address;
       $data['eth_address']      = $request->eth_address;
       $data['usdt_address']      = $request->usdt_address;

      

              $id       =   $request->input('id');
              $data     =   DB::table('users')
                              ->where('id','=',$id)
                              ->update($data); 


          Session::flash('success', 'Data Uploaded successfully!');       
           return redirect()->back();
    }

    public function my_downline()
    {

        $themecheck1 = $this->themecheck();

       $data = Sentinel::check(); 


       $user_data1 = DB::table('users')
                    ->where('sponcer_id','=',$data->email)
                    ->get();

                 //print_r($user_data1);

              $per_arr_data = [];


              foreach ($user_data1 as $level1) 
              {
                $arr_data = [];
                $arr_data['first_name'] =  $level1->first_name;
                $arr_data['user_id'] =  $level1->email;
                $arr_data['sponcer_id'] =  $level1->sponcer_id;     
                $arr_data['level'] =  "1";
                $arr_data['is_active'] =  $level1->is_active;
                $arr_data['mobile'] =  $level1->mobile; 

                
                array_push($per_arr_data, $arr_data);

                $user_data2 = DB::table('users')
                    ->where('sponcer_id','=',$level1->email)
                    ->get();


                    foreach($user_data2 as $level2)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level2->first_name;
                $arr_data['user_id'] =  $level2->email;
                $arr_data['sponcer_id'] =  $level2->sponcer_id;     
                $arr_data['level'] =  "2";
                $arr_data['is_active'] =  $level2->is_active;
                $arr_data['mobile'] =  $level2->mobile; 

                
                array_push($per_arr_data, $arr_data);


                $user_data3 = DB::table('users')
                    ->where('sponcer_id','=',$level2->email)
                    ->get();


                    foreach($user_data3 as $level3)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level3->first_name;
                $arr_data['user_id'] =  $level3->email;
                $arr_data['sponcer_id'] =  $level3->sponcer_id;     
                $arr_data['level'] =  "3";
                $arr_data['is_active'] =  $level3->is_active;
                $arr_data['mobile'] =  $level3->mobile; 

                
                array_push($per_arr_data, $arr_data);


                 $user_data4 = DB::table('users')
                    ->where('sponcer_id','=',$level3->email)
                    ->get();


                    foreach($user_data4 as $level4)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level4->first_name;
                $arr_data['user_id'] =  $level4->email;
                $arr_data['sponcer_id'] =  $level4->sponcer_id;     
                $arr_data['level'] =  "4";
                $arr_data['is_active'] =  $level4->is_active;
                $arr_data['mobile'] =  $level4->mobile; 

                
                array_push($per_arr_data, $arr_data);


                 $user_data5 = DB::table('users')
                    ->where('sponcer_id','=',$level4->email)
                    ->get();


                    foreach($user_data5 as $level5)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level5->first_name;
                $arr_data['user_id'] =  $level5->email;
                $arr_data['sponcer_id'] =  $level5->sponcer_id;     
                $arr_data['level'] =  "5";
                $arr_data['is_active'] =  $level5->is_active;
                $arr_data['mobile'] =  $level5->mobile; 

                
                array_push($per_arr_data, $arr_data);



                $user_data6 = DB::table('users')
                    ->where('sponcer_id','=',$level5->email)
                    ->get();


                    foreach($user_data6 as $level6)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level6->first_name;
                $arr_data['user_id'] =  $level6->email;
                $arr_data['sponcer_id'] =  $level6->sponcer_id;     
                $arr_data['level'] =  "6";
                $arr_data['is_active'] =  $level6->is_active;
                $arr_data['mobile'] =  $level6->mobile; 

                
                array_push($per_arr_data, $arr_data);



                 $user_data7 = DB::table('users')
                    ->where('sponcer_id','=',$level6->email)
                    ->get();


                    foreach($user_data7 as $level7)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level7->first_name;
                $arr_data['user_id'] =  $level7->email;
                $arr_data['sponcer_id'] =  $level7->sponcer_id;     
                $arr_data['level'] =  "7";
                $arr_data['is_active'] =  $level7->is_active;
                $arr_data['mobile'] =  $level7->mobile; 

                
                array_push($per_arr_data, $arr_data);


                 $user_data8 = DB::table('users')
                    ->where('sponcer_id','=',$level7->email)
                    ->get();


                    foreach($user_data8 as $level8)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level8->first_name;
                $arr_data['user_id'] =  $level8->email;
                $arr_data['sponcer_id'] =  $level8->sponcer_id;     
                $arr_data['level'] =  "8";
                $arr_data['is_active'] =  $level8->is_active;
                $arr_data['mobile'] =  $level8->mobile; 

                
                array_push($per_arr_data, $arr_data);


                $user_data9 = DB::table('users')
                    ->where('sponcer_id','=',$level8->email)
                    ->get();


                    foreach($user_data9 as $level9)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level9->first_name;
                $arr_data['user_id'] =  $level9->email;
                $arr_data['sponcer_id'] =  $level9->sponcer_id;     
                $arr_data['level'] =  "9";
                $arr_data['is_active'] =  $level9->is_active;
                $arr_data['mobile'] =  $level9->mobile; 

                
                array_push($per_arr_data, $arr_data);


                $user_data10 = DB::table('users')
                    ->where('sponcer_id','=',$level9->email)
                    ->get();


                    foreach($user_data10 as $level10)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level10->first_name;
                $arr_data['user_id'] =  $level10->email;
                $arr_data['sponcer_id'] =  $level10->sponcer_id;     
                $arr_data['level'] =  "10";
                $arr_data['is_active'] =  $level10->is_active;
                $arr_data['mobile'] =  $level10->mobile; 

                
                array_push($per_arr_data, $arr_data);

                

                 $user_data11 = DB::table('users')
                    ->where('sponcer_id','=',$level10->email)
                    ->get();


                    foreach($user_data11 as $level11)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level11->first_name;
                $arr_data['user_id'] =  $level11->email;
                $arr_data['sponcer_id'] =  $level11->sponcer_id;     
                $arr_data['level'] =  "11";
                $arr_data['is_active'] =  $level11->is_active;
                $arr_data['mobile'] =  $level11->mobile; 

                
                array_push($per_arr_data, $arr_data);

                $user_data12 = DB::table('users')
                    ->where('sponcer_id','=',$level11->email)
                    ->get();


                    foreach($user_data12 as $level12)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level12->first_name;
                $arr_data['user_id'] =  $level12->email;
                $arr_data['sponcer_id'] =  $level12->sponcer_id;     
                $arr_data['level'] =  "12";
                $arr_data['is_active'] =  $level12->is_active;
                $arr_data['mobile'] =  $level12->mobile; 

                
                array_push($per_arr_data, $arr_data);

                $user_data13 = DB::table('users')
                    ->where('sponcer_id','=',$level12->email)
                    ->get();


                    foreach($user_data13 as $level13)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level13->first_name;
                $arr_data['user_id'] =  $level13->email;
                $arr_data['sponcer_id'] =  $level13->sponcer_id;     
                $arr_data['level'] =  "13";
                $arr_data['is_active'] =  $level13->is_active;
                $arr_data['mobile'] =  $level13->mobile; 

                
                array_push($per_arr_data, $arr_data);


                $user_data14 = DB::table('users')
                    ->where('sponcer_id','=',$level13->email)
                    ->get();


                    foreach($user_data14 as $level14)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level14->first_name;
                $arr_data['user_id'] =  $level14->email;
                $arr_data['sponcer_id'] =  $level14->sponcer_id;     
                $arr_data['level'] =  "14";
                $arr_data['is_active'] =  $level14->is_active;
                $arr_data['mobile'] =  $level14->mobile; 

                
                array_push($per_arr_data, $arr_data);


                $user_data15 = DB::table('users')
                    ->where('sponcer_id','=',$level14->email)
                    ->get();


                    foreach($user_data15 as $level15)
                    {

                $arr_data = [];
                $arr_data['first_name'] =  $level15->first_name;
                $arr_data['user_id'] =  $level15->email;
                $arr_data['sponcer_id'] =  $level15->sponcer_id;     
                $arr_data['level'] =  "15";
                $arr_data['is_active'] =  $level15->is_active;
                $arr_data['mobile'] =  $level15->mobile; 

                
                array_push($per_arr_data, $arr_data);

                  



                    }


                    }


                    }


                    }


                    }


                    }



                    }



                    }



                    }



                    }



                    }

                }




            }


            }




                  
              }
              
              $per_arr_data = collect($per_arr_data)
                            ->sortBy('level')
                            ->toArray();


            
                

       return view(''.$themecheck1.'/team/my_downline')->with(compact('data','themecheck1','per_arr_data'));

    }


     public function tree_view()
    {
        $themecheck1 = $this->themecheck();

        $user = DB::table('users')->where('email','=',$_GET['user_id'])->first();

       $data = Sentinel::check(); 
       $WalletController = new WalletController;

        $wallet_balance   = $WalletController->wallet($user->email);

      return view(''.$themecheck1.'/team/tree_view')->with(compact('data','themecheck1','user','wallet_balance'));
    }


    public function autopool(){

       $themecheck1 = $this->themecheck();
       
        $data1 = Sentinel::check();    
         $ActivationController = new ActivationController;

        $data   = $ActivationController->set_time_and_create_autopool($data1->email);

        return view(''.$themecheck1.'/autopool')->with(compact('data1','data','themecheck1'));
    }

    public function directsponsorbonus()
    {
       $themecheck1 = $this->themecheck();
       
        $data1 = Sentinel::check();    

        $ActivationController = new ActivationController;

        $sponcering_income = 0;

       

        $child_data = DB::table('users')->where('sponcer_id','=',$data1->email)->get();

        $booster_data = [];

        foreach ($child_data as $key => $value) {
           $data_booster = [];
            $data_booster   = $ActivationController->direct_sponcer_income_calculate($value->email);

            array_push($booster_data,$data_booster);

            $sponcering_income = $sponcering_income + $data_booster['sponcer_income'];


        }

     

        return view(''.$themecheck1.'/directsponsorbonus')->with(compact('sponcering_income','booster_data','data1','themecheck1'));
    }

    
    
}
