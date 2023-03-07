<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class TransactionController extends Controller
{
     public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  
        
    public function status_change()
       {

        $usercheck = $this->usercheck();

        if(isset($_GET['type']))
        {
            $type = $_GET['type'];
            $data = DB::table('transaction')
                    ->where('approval','=',$type)
                    ->get();
        }
        else
        {
            $data = DB::table('transaction')
                    ->get();
        }
        
        return view(''.$usercheck.'/admin/status_change')->with(compact('data')); 
    } 

        public function status_change_data()
       {

           $usercheck = $this->usercheck();
           
           $data['approval'] = $_GET['approval'];

                   $data   = DB::table('transaction')
                                ->where('id','=',$_GET['id'])
                                ->update($data);
                Session::flash('success', 'Transaction Approval Change');
                return redirect()->back();
                return view(''.$usercheck.'/admin/status_change')->with(compact('data','usercheck'));
           
        }



//// For Reson change

         public function sort_by_reason()
       {

        $usercheck = $this->usercheck();

        if(isset($_GET['type']))
        {
            $type = $_GET['type'];
            $data = DB::table('transaction')
                    ->where('reason','=',$type)
                    ->get();
        }
        else
        {
            $data = DB::table('transaction')
                    ->get();
        }
        
        return view(''.$usercheck.'/admin/sort_by_reason')->with(compact('data')); 
    } 


     public function two_leg(){

      
        
         $usercheck = $this->usercheck();


            $rapidfire = DB::table('two_leg')
                                    ->where('amount','=','20')
                                    ->get();

            if(isset($_GET['amount']))
            {
                $rapidfire = DB::table('two_leg')
                                    ->where('amount','=',$_GET['amount'])
                                    ->get();

            }



          //$orgDate = "2020-05-15";  
         // $newDate = strtotime($rapidfire);  
          // echo "New date format is: ".$newDate. " (MM-DD-YYYY)";
           //print_r($newDate); die();
        return view(''.$usercheck.'/admin/two_leg')->with(compact('rapidfire'));

    }

}
