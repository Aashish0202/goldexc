<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;


use Sentinel;
use Session;
use Illuminate\Http\Request;
use DB;
use Mail;


class BroadcastController extends Controller
{ 
      
      public function mail($title,$subject,$reciever_email,$reciever_name,$sender_email,$sender_name,$message_content)
    {

         $data['title']             = $title;
         $data['subject']           = $subject;
         $data['reciever_email']    = $reciever_email;
         $data['reciever_name']     = $reciever_name;
         $data['sender_email']      = $sender_email;
         $data['sender_name']       = $sender_name;
         $data['message_content']   = $message_content;
         $data['site_name']   = "";
         $data['site_url']   = "https://www.growfire.life/login";
         $data['site_desc']   = "";

            //print_r($sender_email); die();

    
          
         Mail::send('mail/mail_tamplete',['data' => $data], function($message) use ($data) {
 
            $message->to($data['reciever_email'], $data['reciever_name'])
 
                 ->subject($data['subject']);
                $message->from($data['sender_email'] ,$data['sender_name'] );
        });
 
        
     
    }


    function test_mail()
    {

        $this->mail("New Mail Testing","subject of my Mail","growfirelife@gmail.com","Umesh Jain","info@rkworldtrade.online","Grow Fire","This is message content for test mail");


    }
      


     

}
