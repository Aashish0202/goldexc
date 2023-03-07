       @include('user3.common.header')


       @include('user3.common.sidebar')

       <?php
          $data_setting = DB::table('setting')->first();
          $user = Sentinel::check();  

           $deposit_option = DB::table('deposite_option')->where('is_active','=','yes')->get();
           ?>

       <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
                    <div class="breadcrumb-title pe-3">Activation</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Quiz Deposite</li>
                            </ol>
                        </nav>
                    </div>

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
                    
                   
                </div>
                <!--end breadcrumb-->
                <div class="container">
                    <div class="main-body mt-5">
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="card">
                                    <form method="post" action="{{url('/')}}/user/quiz_deposite_post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Amount</h6>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control"  name="amount" id="amount"  onchange="return checkamount()"><br>
                                                  <div id="amount_err" class="text-danger"></div>
                                            </div>
                                          
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                               
                                                <input type="submit" class="btn btn-light px-4" id="submit" value="Deposite" />
                                                     
                                            </div>
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

      <script type="text/javascript">

   function checkamount()
   {
    
    var amount_minimum = 50;
  
    if(amount_minimum > amount.value)
    {
      amount_err.innerHTML = "Minimum amount should be "+amount_minimum;
      document.getElementById('amount').value="";
      return false;
    }
    else 
    {
      amount_err.innerHTML = "";
    }


     //Multiple of Condition
      var multi_amt = <?php echo $data_setting->deposite_multiple_off;?>;
    
      if(amount.value % multi_amt != 0)
       {
          amount_err.innerHTML = "Amount should be Multiple of "+multi_amt;
          document.getElementById('amount').value="";
          return false; 
       }

   } 
   
</script>

<script language='JavaScript' type='text/javascript'>

    function check_value(payment_mode)
    {



      image = document.getElementById('imagedest');
      address = document.getElementById('address');
      var image_qr = "1627473900.png";
      var address_det = "bank Details";
      var amount= $('#amount').val();
      var mode = payment_mode.value.toUpperCase();

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

          

            document.getElementById('amount_in_coin').value = amount*75;   


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

       var image_path = "/public/qrcode/"+image_qr;
        image.src = image_path;
        address.innerHTML=address_det;




      
    }

</script>



<!-- convert to INR amount -->
<script>
  function currency_convert(from,to,amount)
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
             
            
                
                document.getElementById('amount_in_coin').value = response[to]*amount;   

                     
              
            }
            });

}

 
</script>

         
  
      @include('user3.common.footer')