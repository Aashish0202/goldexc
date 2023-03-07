<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class SiteSettingController extends Controller
{ 
        public function usercheck()
       {
          $user = Sentinel::check();
           
            if($user->user_type == 'admin')
            {
                 $middelware = 'admin';
            }
           
        }  


      public function site_setting()
    {
         $usercheck = $this->usercheck();

          $data = DB::table('setting')
                      ->first();
        return view(''.$usercheck.'/admin/site_setting')
                        ->with(compact('data','usercheck'));
    }

    public function site_setting_post(Request $request)
    {
        
        $data['site_name']       = $request->input('site_name'); 
        $data['site_desc']       = $request->input('site_desc');
        
        $data['site_meta_key']   = $request->input('site_meta_key');
        $data['marquee']         = $request->input('marquee');


             if($request->has('site_logo')) {
              $file      = $request->file('site_logo');
              $extention = $file->getClientOriginalExtension();
              $filename  = time().'.'.$extention;
              $file->move(public_path('site_logo'),$filename);
              
              $data['site_logo']= $filename; 
             }
             
              
                $data = DB::table('setting')
                    ->update($data);
                
                   
            return redirect()->back();
               
               
    }


    public function qr_setting()
     {
        $usercheck = $this->usercheck();

        // $data = DB::table('deposite_option')
        //        ->first();
        return view(''.$usercheck.'/admin/qr_setting')->with(compact('data','usercheck'));
     }


      public function qr_setting_post(Request $request)
    {
        //  $usercheck = $this->usercheck();

        //   $data = DB::table('setting')
        //        ->first();
        // return view(''.$usercheck.'/admin/qr_setting_post')->with(compact('data','usercheck'));
    }

         public function change_frontpage()
    {
         $usercheck = $this->usercheck();

          $data = DB::table('setting')
               ->first();
        return view(''.$usercheck.'/admin/change_frontpage')->with(compact('data','usercheck'));
    }
   
    public function change_frontpage_post(Request $request)
    {
        
        $data['address']   = $request->input('address');
        $data['phone']     = $request->input('phone');
        $data['tagline']   = $request->input('tagline');
        $data['email']     = $request->input('email');

        $data['facebook']  = $request->input('facebook');
        $data['instagram'] = $request->input('instagram');
        $data['linkedin']  = $request->input('linkedin');
        $data['twitter']   = $request->input('twitter');

                    $data = DB::table('setting')
                    ->update($data);
                
                   
            return redirect()->back();
               
               
    }




 public function quiz_setting()
     {
        $usercheck = $this->usercheck();

        $data = DB::table('setting')
                 ->first();
        return view(''.$usercheck.'/admin/quiz_setting')->with(compact('data','usercheck'));
     }


      public function quiz_setting_post(Request $request)
    {
        //  $usercheck = $this->usercheck();

      $data['quiz_amount']   = $request->input('quiz_amount');

      //print($request->input('quiz_amount')); die();


         $data = DB::table('setting')
                    ->update($data);
                
                   
            return redirect()->back();

        
    }


     

}
