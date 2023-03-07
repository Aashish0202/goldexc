
  <!-- Header -->
    @include('user2.common.header')

    <!-- Sidebar -->
    @include('user2.common.sidebar')


     @yield('content')
        <?php

              $data_setting = DB::table('setting')->first();
          ?>
          <?php

                    $sponcer_id      = $user->email;
                    $userchild_count = DB::table('users')
                                          ->where('sponcer_id','=',$sponcer_id)
                                          ->count();



                                          $today = date('Y-m-d');


                $userchild_count =        DB::table('transaction')
                                          ->where('reason','=','withdraw_payment')
                                          ->where('date','=',$today)
                                          ->where('reciver','=',$user->email)
                                          ->count();

              ?>           

       <style>
    
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                              -webkit-appearance: none;
                              -moz-appearance: none;
                              appearance: none;
                              margin: 0; 
            }
      </style>
<body>

    <!--==================================*
               Main Content Section
    *====================================-->
    <div class="main-content page-content">

        <!--==================================*
                   Main Section
        *====================================-->
        <div class="main-content-inner">
            <div class="row">
                <!-- Textual inputs -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card_title">Payment Withdraw</h6>
                            
                             <!-- form start -->
                            @include('user1.common.operation_status')
                             <form action="{{url('/')}}/user/payment_withdraw_post" method="post" onsubmit="return checkall()">
                                   @csrf
                                  <div class="card-body">
                              
                                  <div class="col-11">
                                    <div class="form-group col-md-12">
                                      <label for="wallet_balance">Wallet Balance</label>
                                      <input type="number" class="form-control" name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['income_wallet']}}" placeholder="Enter Wallet Balance" readonly>
                                       <div id="err_wallet_balance" class="text-danger"></div> 
                                    </div>
                                   </div>
                                  

                                   <div class="col-11">
                                     <div class="form-group col-md-12">
                                      <label for="transfer_amount">Amount To Withdraw</label>
                                   


                                      <select class="form-control" name="transfer_amount" id="transfer_amount" onchange="return checkamount()">
                                          <option value="100">100</option>
                                           <option value="200">200</option>
                                            <option value="500">500</option>
                                             <option value="1000">1000</option>
                                             <option value="15000">15000</option>

                                      </select>


                                       <div id="err_transfer_amount" class="text-danger" ></div> 
                                    </div>
                                  </div>

                                      <div class="form-group col-md-12">
                          
                                    <input type="radio" class="" name="field" value="btc"  id="btc" onclick='check_value(this);' @if(empty($user->btc_address)) disabled  @endif> BTC : {{$user->btc_address}}<br/>
                                    
                                    <input type="radio"  name="field" value="eth"  id="eth"  onclick='check_value(this);' @if(empty($user->eth_address)) disabled  @endif> ETH : {{$user->eth_address}} <br/>
                                     <input type="radio" name="field" value="trx"  id="trx"  onclick='check_value(this);' @if(empty($user->trx_address)) disabled  @endif> TRX : {{$user->trx_address}} <br/>

                                    <!-- <input type="radio" name="field" value="imps" id="imps" onclick='check_value(this);' @if(empty($user->bank_ifsc)) disabled  @endif> IMPS : {{$user->bank_acc_no}} <br/> -->

                                     <input type="radio" name="field" value="usdt" id="usdt" onclick='check_value(this);' @if(empty($user->usdt_address)) disabled  @endif> USDT : {{$user->usdt_address}} <br/>
                                            
                                    <br>

                                      
                                  </div>
                                  <div class="col-11">
                                  <div class="form-group col-md-12">
                                    <label for="amount_in_coin">Amount (INR) :</label>
                                      <input type="text" class="form-control" name="amount_in_coin" id="amount_in_coin" placeholder="Enter Amount (INR)" readonly>
                                     <div id="" class="text-danger"></div> 
                                   </div>
                                 </div>
                               
                                    <?php
                                          //set withdraw timimg
                                          date_default_timezone_set("Asia/Kolkata");
                                          $current_time = date("H:i");

                                          $begin = $data_setting->withdraw_time_from;
                                          $end   = $data_setting->withdraw_time_to;

                                          $date1 = DateTime::createFromFormat('H:i', $current_time);
                                          $date2 = DateTime::createFromFormat('H:i', $begin);
                                          $date3 = DateTime::createFromFormat('H:i', $end);                                                      
                    
                                      ?>
                                     <div class="col-11">
                                     <div class="form-group col-md-12">
                                      
                                            <label for="amount">Trnsaction PIN:</label>
                                      <input type="text" class="form-control" name="tpin" id="tpin" placeholder="Enter Transfer PIN">
                                       <div id="err_transfer_pin" class="text-danger" ></div> 
                                    </div>
                                  </div>

                            @if($date1 >= $date2 && $date1 <= $date3)

                            @if($user->withdraw_status == 'on')



                        
                            <hr>
                            <div class="form-group col-md-12">
                            <button  type="submit" id="submit" class="btn btn-primary " >Sumbit</button>
                             </div>    

                                 @else     

                                  <hr>
                               <div class="form-group col-md-12">
                                 <h3 class="text-danger  animate__animated  animate__flash 2s text-center" > Your Withdrwal is stop by administrator. Contact Online or Administartor </h3>
                                 </div>      

                                  @endif

                                       
                                          @else                     
                                           <hr>
                                          
                                          <div class="form-group col-md-12">
                                          <h3 class="text-danger  animate__animated  animate__flash 2s text-center" > Payment Withdraw Time is :<br> {{$begin}} to {{$end}}  </h3>
                                          </div>
                                       
                                          @endif


                                 <!--  Time up function   --> 

                                    <?php
                                     $user = Sentinel::check();


                                     $data = DB::table('transaction')
                                        ->where('approval','=','completed')
                                        ->where('reason','=','activate_package')
                                        ->where('reciver','=',$user->email)
                                        ->orderBy('id', 'DESC')
                                        ->first();

                                       

                                      
                           
                   
                ?>   
                                 
                                  @if(!empty($data))

                <?php

                     $date = $data->date;

                     $changeDate = date('Y-m-d', strtotime('+7 days', strtotime($date)));

                ?>
                <script>
                    var changeDate = <?php echo "'".date('Y-m-d', strtotime('+7 days', strtotime($date)))."'";?>;

                 
                     //alert('changeDate');
                    // The data/time we want to countdown to
                  
                    var countDownDate = new Date(changeDate).getTime();
                   
                    // alert(countDownDate);
                        // Run myfunc every second
                    var myfunc = setInterval(function() {

                    var now = new Date().getTime();
                    var timeleft = countDownDate - now;
                        
                    // Calculating the days, hours, minutes and seconds left
                    var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
                        
                    // Result is output to the specific element
                   
                        
                    // Display the message when countdown is over
                    if (timeleft < 0) {
                        clearInterval(myfunc);
                        document.getElementById('submit').style.visibility = 'hidden';
                    }
                    }, 1000);
                </script>      
           
                @endif   

                                        

                                   


                                 </div>
                              </form>
                            
                        </div>
                    </div>
                </div>
                <!-- Textual inputs -->
            </div>
           
        </div>
        <!--==================================*
                   End Main Section
        *====================================-->
    </div>
    <!--=================================*
           End Main Content Section
    *===================================-->

</body>




 <script language='JavaScript' type='text/javascript'>

    function check_value(payment_mode)
    {

      image = document.getElementById('imagedest');
      address = document.getElementById('address');
      var image_qr = "1627473900.png";
      var address_det = "bank Details";
      var amount= $('#transfer_amount').val();
      var mode = payment_mode.value.toUpperCase();

      // alert(mode);

      var from_curr = <?php echo '"'.$data_setting->currency.'"'; ?>;
      var from_curr = from_curr.toUpperCase();
      if(payment_mode.value == "btc")
      {


        <?php  $data = DB::table('deposite_option')->where('symbol','=','btc')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
         address_det = "<?php echo $data->address; ?>";
         
         currency_convert(from_curr,mode,amount);
          
        

      }

      if(payment_mode.value == "eth")
      {

        <?php  $data = DB::table('deposite_option')->where('symbol','=','eth')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert(from_curr,mode,amount);

      }

       if(payment_mode.value == "imps")
      {
           <?php  $data = DB::table('deposite_option')->where('symbol','=','imps')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

       
         document.getElementById('amount_in_coin').value = amount;

             


      }

       if(payment_mode.value == "trx")
      {

        <?php  $data = DB::table('deposite_option')->where('symbol','=','trx')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert(from_curr,mode,amount);


      }


       if(payment_mode.value == "usdt")
      {

         <?php  $data = DB::table('deposite_option')->where('symbol','=','usdt')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert(from_curr,mode,amount);

      }

     




      
    }

</script>

 <script>

   function checkamount()
   {

      // alert('a');
     
     var amount_minimum = <?php echo $data_setting->minimum_withdraw_amt; ?>;
   
      if(amount_minimum > transfer_amount.value)
      { 
        err_transfer_amount.innerHTML = "Amount should be greater then "+amount_minimum;

        document.getElementById('transfer_amount').value="";
        return false;
      }
      else
      {
        err_transfer_amount.innerHTML = "";
      }

   
   //Multiple of Condition
      var multi_amt = <?php echo $data_setting->withdraw_multiple_off;?>;
    
      if(transfer_amount.value % multi_amt != 0)
       {
          err_transfer_amount.innerHTML = "Amount should be Multiple of "+multi_amt;
          document.getElementById('transfer_amount').value="";
          return false; 
       }
       else
       {
         err_transfer_amount.innerHTML = "";
       }




     



      
    }

</script>


<!-- convert to INR amount -->
<script>
  function currency_convert(from,to,transfer_amount)
  {

  $.ajax({
              url: "{{'https://min-api.cryptocompare.com/data/price'}}",
              type: 'GET',
              data: {
                _method:'GET',
                fsym   :from,
                tsyms  :to
               
               
               
              },
             
            success: function(response)
            {
             
                 //alert(transfer_amount);
                document.getElementById('amount_in_coin').value = response[to]*transfer_amount;            
              
            }
            });

  }

 
</script>
  <!-- footer -->
   @include('user2.common.footer')
 
 