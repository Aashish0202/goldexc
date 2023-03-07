  @include('user5.common.header')


       @include('user5.common.sidebar')



       <?php
          $data_setting = DB::table('setting')->first();
          $user = Sentinel::check();     

         
 ?>
   <!-- main page content -->
        <div class="main-container container">
           <body>
<div class="page-wraper">
    
    <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row">
                <div class="ms-auto">
                         @if(count($errors)>0)

                    <div class="alert alert-danger">

                      <!-- <button class="close" type="button" data-dismiss="alert">x</button> -->
                      <ul>
                          @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>
                          
                          @endforeach
                      </ul>
                    </div>
                  @endif
                     @include('user4.common.operation_status')
                    </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Sell Gold</h5>
                            <h6 class="text-danger">5% Deduction</h6>
                            <p class="text-success">Credit within 3 hours</p>
                        </div>

                        <div class="card-body">
                            <div class="basic-form style-1">
                                <form method="post" action="{{url('/')}}/user/payment_withdraw_post" enctype="multipart/form-data">
                                        @csrf


                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class=" fa-dollar"></i>
                                        </span>
                                        <label>Balance to Sell</label>
                                        <input type="text" class="form-control"name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['wallet_balance']}}GRM" readonly class="text-danger"></p>
                                    </div>
                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-lock"></i>
                                        </span>
                                        <label>Enter Amount to Sell</label>
                                        <input type="text" class="form-control" name="transfer_amount" id="transfer_amount" onchange="return checkamount()" 
                                         placeholder="Amount to withdraw">
                                          <p id ="err_transfer_amount" class="font-weight-bold"></p>
                                    </div>

                                     <input type="hidden" name="payment_type" id="payment_type" value="IMPS">


                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-lock"></i>
                                        </span>
                                        <label>Amount in INR</label>
                                        <input type="text" class="form-control" name="amount_in_coin" id="amount_in_coin" 
                                         placeholder="Amount in INR" readonly="true">
                                         </p>
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
                                       <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Password"  name="tpin" id="tpin" ></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-success">The Amount of gold you sell will be credited to your Bank Account</p>
                                        @if($date1 >= $date2 && $date1 <= $date3)

                                        @if($user->bank_acc_no != '' || $user->bank_ifsc != '')
                                <input type="submit" class=" btn btn-primary px-4" id="submit" value="Withdraw" />
                                        @else
                                        <p class="text-danger">Please Update Bank Details In your Profile</p>
                                        @endif
                                        @else
                                        <p class="text-danger">Withdrawal Time is {{$begin}} To {{$end}}</p>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>   
    </div>
  
    <!-- Menubar -->
 
  <!-- Menubar -->

    <!-- Theme Color Settings -->
 
  <!-- Theme Color Settings End -->
</div>

<!--**********************************
    Scripts
***********************************-->
<script src="{{url('/')}}/fimobile/assets/js/jquery.js"></script>
<script src="{{url('/')}}/fimobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/settings.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/custom.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="{{url('/')}}/fimobile/assets/vendor/imageuplodify/imageuploadify.min.js"></script>
<script src="{{url('/')}}/fimobile/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $('input[type="file"]').imageuploadify();
  })
</script>
<script language='JavaScript' type='text/javascript'>

    function check_value(payment_mode)
    {

      image = document.getElementById('imagedest');
      address = document.getElementById('address');
      var image_qr = "1627473900.png";
      var address_det = "bank Details";
      var amount= $('#transfer_amount').val();
      var mode = payment_mode.value.toUpperCase();

      //alert(mode);

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

       if(payment_mode.value == "digigold")
      {
           <?php  $data = DB::table('deposite_option')->where('symbol','=','imps')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

       
         document.getElementById('amount_in_coin').value = amount;

             


      }

       if(payment_mode.value == "jar")
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
        err_transfer_amount.innerHTML = "Amount should be greater then "+amount_minimum+" GRM";

        document.getElementById('transfer_amount').value="0";
        return false;
      }
      else
      {
        err_transfer_amount.innerHTML = "";
      }

   
   //Multiple of Condition
      var multi_amt = <?php echo $data_setting->withdraw_multiple_off;?>;
    
      
      document.getElementById('amount_in_coin').value = transfer_amount.value * {{$data_setting->vpa_name}};
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

</body>

<!-- Mirrored from jobie.dexignzone.com/mobile-app/xhtml/ui-input.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jul 2022 10:15:30 GMT -->

        <!-- main page content ends -->


    
        <!-- Page ends-->


 @include('user5.common.footer')