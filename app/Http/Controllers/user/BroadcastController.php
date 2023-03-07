<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;


class BroadcastController extends Controller
{ 
      
      public function mail($title,$subject,$reciever_email,$reciever_name,$sender_email,$sender_name,$message_content)
    {
         $data['title'] = $title;
         $data['subject'] = $subject;
         $data['reciever_email'] = $reciever_email;
         $data['reciever_name'] = $reciever_name;
         $data['sender_email'] = $sender_email;
         $data['sender_name'] = $sender_name;
         $data['message_content'] = $message_content;

         $data = DB::table('setting')
                ->get();

         

        
         Mail::send('c_mail',['data' => $data], function($message) use ($data) {
 
            $message->to($data['reciever_email'], $data['reciever_name'])
 
                    ->subject($data['subject']);
                    $message->from($data['sender_email'],$data['sender_name']);
        });
 
        
     
    }
      


     

}
