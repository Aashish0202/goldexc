<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class ReportController extends Controller
{
     public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'user')
            {
                 $middelware = 'user';
            }
           
        }
        
  
   
     public function fund_transfer_report()
      {
        $user = Sentinel::check();

        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
             $reason = $_GET['reason'];
             $data = DB::table('transaction')
                        ->where('reciver','=',$user->email)
                        ->where('reason','=',$reason)
                        ->get();
        }

        else
        {
            $data = DB::table('transaction')
                    ->where('reciver','=',$user->email)
                    ->get();
        }

        return view(''.$themecheck1.'/report/fund_transfer_report')->with(compact('themecheck1','data'));

    }


     public function fund_transfer_report_out()
      {
        $user = Sentinel::check();

        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
             $reason = $_GET['reason'];
             $data = DB::table('transaction')
                        ->where('sender','=',$user->email)
                        ->where('reason','=',$reason)
                        ->get();
        }

        else
        {
            $data = DB::table('transaction')
                    ->where('sender','=',$user->email)
                    ->get();
        }

        return view(''.$themecheck1.'/report/fund_transfer_report')->with(compact('themecheck1','data'));

    }

    

        public function themecheck()
        {
          $theme1  = DB::table('setting')
                       ->first();

          $themecheck = $theme1->theme;
               
          return $themecheck;

        }
 
        public function direct_member()
        {
             $user = Sentinel::check();

            $themecheck1 = $this->themecheck();

            $data=DB::table('users')
                ->where('sponcer_id','=',$user->email)
                ->get();

                return view(''.$themecheck1.'/team/direct_member')->with(compact('themecheck1','data'));
        }

        public function sender_transaction()
      {
        $user = Sentinel::check();

        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
             $reason = $_GET['reason'];
             $data = DB::table('transaction')
                        ->where('sender','=',$user->email)
                        ->where('reason','=',$reason)
                        ->get();
        }

        else
        {
            $data = DB::table('transaction')
                    ->where('sender','=',$user->email)
                    ->get();
        }

        return view(''.$themecheck1.'/report/sender_transaction')->with(compact('themecheck1','data'));

    }


     public function receiver_transaction()
    {
        $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
            $reason = $_GET['reason'];
             $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->where('reason','=',$reason)
            ->get();
        }

        else
        {
           $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->get();
        }

  

     return view(''.$themecheck1.'/report/receiver_transaction')->with(compact('themecheck1','data'));
    
   }

     public function roi_daily_report()
    {
        $trans_id = $_GET['trans_id'];
       
        $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

       
           $data = DB::table('transaction')
            ->where('id','=',$trans_id)
            ->first();
       

  

     return view(''.$themecheck1.'/report/roi_daily_report')->with(compact('themecheck1','data'));
    
   }


    public function level_roi_daily()
    {
        $trans_id = $_GET['trans_id'];
       
        $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

       
           $data = DB::table('transaction')
            ->where('id','=',$trans_id)
            ->first();
       

  

     return view(''.$themecheck1.'/report/level_roi_daily')->with(compact('themecheck1','data'));
    
   }

    public function withdrwal_report()
    {
      $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
            $reason = $_GET['reason'];
             $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->where('reason','=',$reason)           
            ->get();
        }

        else
        {
           $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->get();
        }

  

     return view(''.$themecheck1.'/report/withdrwal_report')->with(compact('themecheck1','data'));
    
   }



   public function activation_package_deposite()
    {
      $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
            $reason = $_GET['reason'];
             $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->where('reason','=',$reason)
            ->get();
        }

        else
        {
           $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->get();
        }

  

     return view(''.$themecheck1.'/report/activation_package_deposite')->with(compact('themecheck1','data'));
    
   }

    public function deposite_report()
 {
        $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
            $reason = $_GET['reason'];
             $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->where('reason','=',$reason)
            ->get();
        }

        else
        {
           $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->get();
        }

  

     return view(''.$themecheck1.'/report/deposite_report')->with(compact('themecheck1','data'));
    
   }

    public function roi_income()
    {
        $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
            $reason = $_GET['reason'];
             $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->where('reason','=',$reason)
            ->get();
        }

        else
        {
           $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->get();
        }

  

     return view(''.$themecheck1.'/report/roi_income')->with(compact('themecheck1','data'));
    
   }


      public function income_table()
    {
        $user = Sentinel::check();

        $themecheck1 = $this->themecheck();

        $data = DB::table('income_table')->get();
/*
             DB::table('income_table')->insert([
                 ['level' => '8', 'member' => 4725, 'direct' => 13, 'income' => 8, 'days' => 10, 'total' => 800],
                 ['level' => '9', 'member' => 6925, 'direct' => 16, 'income' => 16, 'days' => 100, 'total' => 1600],
                 ['level' => '10', 'member' => 9925, 'direct' => 21, 'income' => 25, 'days' => 100, 'total' => 2500],
                 ['level' => '11', 'member' => 14125, 'direct' => 26, 'income' => 32, 'days' => 100, 'total' => 3200],
                 ['level' => '12', 'member' => 19125, 'direct' => 33, 'income' => 50, 'days' => 100, 'total' => 5000],

                 ['level' => '13', 'member' => 26325, 'direct' => 40, 'income' => 50, 'days' => 150, 'total' => 7500],

                 ['level' => '14', 'member' => 36325, 'direct' => 50, 'income' => 80, 'days' => 150, 'total' => 12500],

                 ['level' => '15', 'member' => 186325, 'direct' => 65, 'income' => 120, 'days' => 150, 'total' => 180000],

                 ['level' => '16', 'member' => 211325, 'direct' => 81, 'income' => 150, 'days' => 200, 'total' => 30000],

                 ['level' => '17', 'member' => 246325, 'direct' => 101, 'income' => 250, 'days' => 200, 'total' => 50000],

                 ['level' => '18', 'member' => 301325, 'direct' => 126, 'income' => 400, 'days' => 250, 'total' => 100000],

                 ['level' => '19', 'member' => 376325, 'direct' => 156, 'income' => 650, 'days' => 300, 'total' => 195000],

                 ['level' => '20', 'member' => 526325, 'direct' => 206, 'income' => 1050, 'days' => 350, 'total' => 367500],
                
      ]);
*/
       
        return view(''.$themecheck1.'/report/income_table')->with(compact('themecheck1','data'));

    }



  public function autopool_report()
    {
        $user = Sentinel::check();

        $themecheck1 = $this->themecheck();

        //$data = DB::table('income_table')->get();

       
        return view(''.$themecheck1.'/report/autopool_report')->with(compact('themecheck1'));

    }
        //new autopool report1
        
  public function autopool_report1()
  {
      $user = Sentinel::check();

      $themecheck1 = $this->themecheck();

      //$data = DB::table('income_table')->get();

     
      return view(''.$themecheck1.'/report/autopool_report1')->with(compact('themecheck1'));

  }




    public function team_booster_income(){

         $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

         return view(''.$themecheck1.'/report/team_booster_income')->with(compact('themecheck1'));

    }

    


    public function wallettoactivation()
    {
          $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
            $reason = $_GET['reason'];
             $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->where('reason','=',$reason)
            ->get();
        }

        else
        {
           $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->get();
        }

  

     return view(''.$themecheck1.'/report/wallettoactivation')->with(compact('themecheck1','data'));
    }



 public function selfroi_income()
    {
        $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
            $reason = $_GET['reason'];
             $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->where('reason','=',$reason)
            ->get();
        }

        else
        {
           $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->get();
        }

  

     return view(''.$themecheck1.'/report/selfroi_income')->with(compact('themecheck1','data'));
    
   }

   public function tbireport(){
   
         $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

        if(isset($_GET['reason']))
        {
            $reason = $_GET['reason'];
             $data = DB::table('transaction')   
            ->where('reciver','=',$user->email)        
             ->where('reason','=',$reason)
            ->get();
        }

        else
        {
           $data = DB::table('transaction')
            ->where('reciver','=',$user->email)
            ->get();
        }

  

     return view(''.$themecheck1.'/report/tbireport')->with(compact('themecheck1','data'));
    
   }


   

     public function rapid_fire(){

         $user = Sentinel::check();
        
        $themecheck1 = $this->themecheck();

        $rapidfire = DB::table('transaction')
                     ->where(function($query) use ($user){
                        $query->where('transaction.reciver', '=', $user->email);
                         $query->orWhere('transaction.sender','=',$user->email);
       
                        })
                     ->where('reason','=','RAPIDFIRE')
                     ->get();


        if(isset($_GET['amount']))
        {
            $rapidfire = DB::table('transaction')
                    ->where('amount','=',$_GET['amount'])
                     ->where(function($query) use ($user){
                        $query->where('transaction.reciver', '=', $user->email);
                         $query->orWhere('transaction.sender','=',$user->email);
       
                        })
                     ->where('reason','=','RAPIDFIRE')
                     ->get();

        }

         
                     


               $rapidfire1 =  DB::table('transaction')
                      ->where('reason','=','RAPIDFIRE')
                     

                      ->where([

        ['reciver', '=', $user->email],

        ['sender', '=', $user->email]

    ])
                         ->get();


         return view(''.$themecheck1.'/report/rapid_fire')->with(compact('themecheck1','rapidfire'));

    }
  
    public function getMemberCount($package_amount)
    {
         $user = Sentinel::check();

        
         
        $autopool_entries =  DB::table('autopool')->where('package_amount','=',$package_amount)->where('user_id','=',$user->email)->get();
        $autopool_trans  = [];
        foreach($autopool_entries as $items)
        {
          $temp_arr = [];
          $getPool = DB::table('transaction')->where('reason','=','pool')->where('percentage',$items->id)->get();
          $data_arr = [];
          $data_arr['transaction'] = $getPool;
          $data_arr['count'] = $items->count;
          $data_arr['upgrade'] = $items->upgrade;
          $data_arr['autopool_earning'] = $items->count * $items->amount;
          
           $temp_arr[$items->amount] = $data_arr;

           array_push($autopool_trans,$temp_arr);

        }


         

      return response()->json(['autopool_trans' =>  $autopool_trans]);

    }

    public function getPoolDetails()
    {
      $user = Sentinel::check();

      $getPool = DB::table('transaction')->where('reason','=','pool')->where('reciver',$user->email)->get();

      return response()->json(['getPool' => $getPool]);

    }

    public function getRoiDetails()
    {
      $user = Sentinel::check();

      $getRoiDetails = DB::table('transaction')->where('reason','=','roi')->where('reciver',$user->email)->get();

      return response()->json(['getRoiDetails' => $getRoiDetails]);

    }

}