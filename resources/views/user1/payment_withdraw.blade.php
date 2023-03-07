
  <!-- Header -->
    @include('user1.common.header')

    <!-- Sidebar -->
    @include('user1.common.sidebar')


     @yield('content')
        <?php

              $data_setting = DB::table('setting')->first();
          ?>
          <?php

                    $sponcer_id      = $user->sponcer_id;
                    $userchild_count = DB::table('users')
                                          ->where('sponcer_id','=',$sponcer_id)
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
                                      <input type="number" class="form-control" name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['activation_wallet']}}" placeholder="Enter Wallet Balance">
                                       <div id="err_wallet_balance" class="text-danger"></div> 
                                    </div>
                                   </div>
                                   <div class="col-11">
                                     <div class="form-group col-md-12">
                                      <label for="transfer_amount">Amount To Withdraw</label>
                                      <input type="number" class="form-control" name="transfer_amount" id="transfer_amount" onchange="return checkamount()" placeholder="Amount To Withdraw">
                                       <div id="err_transfer_amount" class="text-danger" ></div> 
                                    </div>
                                  </div>

                                      <div class="form-group col-md-12">
                          
                                           <input type="radio" name="field" value="btc"  id="btc"  onclick='check_value(this)'>  BTC<br/> 
                                           <input type="radio" name="field" value="eth"  id="eth"  onclick='check_value(this);'> ETH<br/>
                                           <input type="radio" name="field" value="trx"  id="trx"  onclick='check_value(this);'> TRX<br/>
                                           <input type="radio" name="field" value="imps" id="imps" onclick='check_value(this);'> IMPS<br/>
                                           <input type="radio" name="field" value="usdt" id="usdt" onclick='check_value(this);'> USDT<br/>
                                            
                                           <!-- <img class="img-fluid" id='imagedest' style="height:150px;" "width:150px;" "align-items: : center;">
                                            <div id="address" class="text-black text-center"  ></div> -->
                                  
                                       
                                    <br>

                                      <div class="form-group col-md-6">
                                          <button  type="submit" class="btn btn-primary" style="width: 100%">Pay Online</button>
                                      </div>
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

                                          $begin = $data_setting->deposite_timing_from;
                                          $end   = $data_setting->deposite_timing_to;

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
                                              
                                                                  @if($data_setting->withdraw_count <= $userchild_count)                               

                                                                          <hr>
                                                                          <div class="form-group col-md-12">
                                                                            <button  type="submit" class="btn btn-primary " >Sumbit</button>
                                                                          </div>                        

                                                                                          

                                                                  @else                      
                                                                           <hr>
                                                                          <div class="form-group col-md-12">
                                                                          <h3 class="text-danger  animate__animated  animate__flash 2s text-center" >For Making withdrawal you need {{$data_setting->withdraw_count}} Direct Sponcer</h3>
                                                                          </div>                        

                                                                  @endif      

                                                      @else     

                                                        <hr>
                                                        <div class="form-group col-md-12">
                                                        <h3 class="text-danger  animate__animated  animate__flash 2s text-center" > Your Withdrwal is stop by administrator. Contact Online or Administartor </h3>
                                                        </div>      

                                                    @endif

                                       
                                          @else                     
                                           <hr>
                                          <div class="form-group col-md-12">
                                          <h3 class="text-danger  animate__animated  animate__flash 2s text-center" > Payment Withdraw Time is :<br> {{$begin}} to {{$end}} </h3>
                                          </div>
                                       
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

   
   //Multiple of Condition
      var multi_amt = <?php echo $data_setting->withdraw_multiple_off;?>;
    
      if(transfer_amount.value % multi_amt != 0)
       {
          err_transfer_amount.innerHTML = "Amount should be Multiple of "+multi_amt;
          document.getElementById('transfer_amount').value="";
          return false; 
       }

       var condition   = <?php echo $user->sponcer_id;?>;

       var child     = <?php echo $data_setting->withdraw_child_conn;?>;

       if(condition != child)
       {
          err_transfer_amount.innerHTML = "Your Child Condition Valid Number is: "+child;
          document.getElementById('transfer_amount').value="";
          return false; 
       }



      
    }

</script>

<script language='JavaScript' type='text/javascript'>

    function check_value(payment_mode)
    {

      image                    = document.getElementById('imagedest');
      address                  = document.getElementById('address');
      var image_qr             = "1627473900.png";
      var address_det          = "bank Details";
      var transfer_amount      = $('#transfer_amount').val();
      var mode                 = payment_mode.value.toUpperCase();
      
      if(payment_mode.value == "btc")
      {


        <?php  $data = DB::table('deposite_option')->where('symbol','=','btc')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
         address_det = "<?php echo $data->address; ?>";
         
         currency_convert("USD",mode,transfer_amount);
          
        

      }

      if(payment_mode.value == "eth")
      {

        <?php  $data = DB::table('deposite_option')->where('symbol','=','eth')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert("USD",mode,transfer_amount);

      }

       if(payment_mode.value == "imps")
      {
           <?php  $data = DB::table('deposite_option')->where('symbol','=','imps')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert("USD","INR",transfer_amount);

          //  document.getElementById('amount_in_coin').value = amount*75;   


      }

       if(payment_mode.value == "trx")
      {

        <?php  $data = DB::table('deposite_option')->where('symbol','=','trx')->first(); ?>
        image_qr = "<?php echo $data->qr; ?>";
        address_det = "<?php echo $data->address; ?>";

          currency_convert("USD",mode,transfer_amount);


      }


       if(payment_mode.value == "usdt")
      {

         <?php  $data = DB::table('deposite_option')->where('symbol','=','usdt')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
         address_det = "<?php echo $data->address; ?>";

          currency_convert("USD",mode,transfer_amount);

      }

        var image_path = "/swati/public/qrcode/"+image_qr;
        image.src = image_path;
     //   address.innerHTML=address_det;
    
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
             
                // alert('a');
                document.getElementById('amount_in_coin').value = response[to]*transfer_amount;            
              
            }
            });

  }

 
</script>

 
 
<script>

  function checkall()
  {  
     err_transfer_amount.innerHTML="";
     
     err_transfer_pin.innerHTML ="";

    if(transfer_amount.value=="")
    {
       err_transfer_amount.innerHTML ="Enter Amount";
       return false;
    }
    else if(tpin.value=="")
    {
       err_transfer_pin.innerHTML ="Enter Transaction PIN";
       return false;
    }

  }
</script>




  <!-- footer -->
   @include('user1.common.footer')
 
 