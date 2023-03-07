@include('user4.common.header')


@include('user4.common.sidebar')

 <?php

              $data_setting = DB::table('setting')->first();
          ?>
          <?php

                    $sponcer_id      = $user->sponcer_id;
                    $userchild_count = DB::table('users')
                                          ->where('sponcer_id','=',$sponcer_id)
                                          ->count();
  
              ?>         

 
<!-- Main Content -->
      <div class="page-wrapper">
        <div class="container-fluid">
          
          <!-- Title -->
          <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">Withdraw</h5>
            </div>
          
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="index-2.html">Dashboard</a></li>
              
                <li class="active"><span>Payment Withdraw</span></li>
              </ol>
            </div>
            <!-- /Breadcrumb -->
          
          </div>
          <!-- /Title -->
          
         
            
          <!-- Row -->
          <div class="row">
         
            <div class="col-md-6">
              <div class="panel panel-default card-view">
                <div class="panel-heading">
                  <div class="pull-left">
                    <h6 class="panel-title txt-dark">Payment Withdraw</h6>
                  </div>
                  <div class="clearfix"></div>
                </div>

                @if(count($errors)>0)

                       <div class="alert alert-danger">

                           <button class="close" type="button" data-dismiss="alert">x</button>
                              <ul>
                                 @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>
                                      
                                  @endforeach
                              </ul>
                       </div>
                  @endif
                  @include('user4.common.operation_status')
                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-wrap">
                          <form class="form-horizontal" action="{{url('/')}}/user/payment_withdraw_post" method="post" onsubmit="return checkall()">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputuname_4" class="col-sm-3 control-label">Wallet Balance</label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                  <input type="text" class="form-control" name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['income_wallet']}}" readonly>
                                  <div class="input-group-addon"><i class="icon-user"></i></div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail_4" class="col-sm-3 control-label">Amount To Withdraw</label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                  <input type="text" class="form-control" name="transfer_amount" id="transfer_amount" onchange="return checkamount()" placeholder="Amount To Withdraw">
                                  <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputweb_41" class="col-sm-3 control-label"></label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                   <input type="radio" name="field" value="imps" id="imps" onclick='check_value(this);' @if(empty($user->bank_ifsc)) disabled  @endif> IMPS : {{$user->bank_acc_no}} <br/>
                                 
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputpwd_5" class="col-sm-3 control-label">Amount (INR) :</label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                  <input type="text" class="form-control" name="amount_in_coin" id="amount_in_coin" placeholder="Enter Amount (INR)" readonly>
                                  <div class="input-group-addon"><i class="icon-lock"></i></div>
                                </div>
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

                            <div class="form-group">
                              <label for="exampleInputpwd_5" class="col-sm-3 control-label">Trnsaction PIN </label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                  <input type="text" class="form-control" name="tpin" id="tpin" placeholder="Enter Transfer PIN">
                                  <div class="input-group-addon"><i class="icon-lock"></i></div>
                                </div>
                              </div>
                            </div>

                            <div class="form-group mb-0">
                              <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-info ">Withdraw</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>

          </div> 
          <!-- /Row -->
          
        
        </div>


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
        
       
       
            
 @include('user4.common.footer')