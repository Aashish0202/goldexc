<?php
namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use URL;
use Carbon\Carbon;
use Mail;
use Session;
use Sentinel;
use Validator;
use PDF;
use DB;
use App\Models\UserModel;
use App\Models\CitiesModel;
use App\Models\CountriesModel;
use App\Models\TransactionModel;
use App\Models\EmailTemplateModel;
 
 

class Uk18Controller extends Controller
{
   
     public function iniate_transfer($amount,$ifsc,$bank_account_no,$user_full_name)
      {

       $data_setting =  DB::table('setting')->first();

        $headers[] = "Authorization:".$data_setting->uk18_key; 
        
    
        $amount = round($amount);
        
        $data=array(
  
        "amount"=> $amount,
        "payment_type"=> "IMPS",
        "ifsc_code"=> $ifsc,
        "bank_account_no"=> $bank_account_no,
        "user_name"=> $user_full_name,
        

        );
        
        $url = 'https://uk18.in/api/bank_transfer_api';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);
        $response=json_decode($response_json, true);

        return $response;
        
}





         public function webhook(Request $request)
          {
    
              //  $this->send_otp("test","9890437811");
              
            $data = json_decode(file_get_contents('php://input'), true);

            
           $id=  \DB::table('upi_transaction')->insertGetId($data);


           $upi_trans = \DB::table('upi_transaction')->where('id','=',$id)->first();


             if(isset($upi_trans))
             {
                 $user_data = DB::table('users')->where('id','=',$upi_trans->payer_note)->first();
                 $today = date('Y-m-d');

                 $data_setting =  DB::table('setting')->first();

                 if($data_setting->currency == "usd")
                 {
                  $amt_usd = $upi_trans->amount/75;
                 }
                 else
                 {
                  $amt_usd = $upi_trans->amount;
                 }

                 $this->createTransaction("",$user_data->email,$amt_usd,$upi_trans->amount,"deposit","","","completed",$today,"",$upi_trans->bank_ref_num);
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


}
