<!-- Header -->
    @include('user2.common.header')

    <!-- Sidebar -->
    @include('user2.common.sidebar')


     @yield('content')


     <?php
          $data_setting = DB::table('setting')->first();
          // print_r($data_setting); die();     
      ?>
      <?php
          $data = DB::table('deposite_option')->first();
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
 <!--==================================*
               Main Content Section
    *====================================-->
    <div class="main-content page-content">

        <!--==================================*
                   Main Section
        *====================================-->
        <div class="main-content-inner">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
             <!--  <div class="col-sm-6" style="margin-left:20%";>
                <h1>User Edit</h1>

              </div> -->
<!--               <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">DataTables</li>
                </ol>
              </div> -->
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section>
          
          <div class="row">
            <div class="col-10">
               
              </div>
          </div>
        </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <!-- left column -->
          <div class="col-md-8 mt-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Deposite Money</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <div id="op_status">
     

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
              @include('user2.common.operation_status')
              <form action="{{url('/')}}/user/make_deposite_post" method="post" onsubmit="return checkall()">
                <div class="card-body">
                       @csrf
                  
                        <div class="form-group col-md-12">
                          <label for="amount">Amount : </label>
                          <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount " onchange="return checkamount()">
                          <div id="amount_err" class="text-danger"></div>
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
                        </div>
              
                      <div class="form-group col-md-12">
                      
                         <?php $deposit_option = DB::table('deposite_option')->where('is_active','=','yes')->get(); ?>
                                            @foreach($deposit_option as $options)
                                           
                                            <input type="radio" name="field" value="{{$options->symbol}}" id="{{$options->symbol}}" onclick='check_value(this)'>   {{$options->symbol}} <br/> 
                                         
                                            @endforeach
                          
                          <img class="img-fluid" id='imagedest' style="height:150px;" "width:150px;" "align-items: : center;">
                          <div id="address" class="text-black text-center"  ></div> 
                      </div>
                     
                      <br>

                    
                   
                     <div class="form-group col-md-12">
                      <label for="amount_in_coin">Amount (Coin) :</label>
                        <input type="text" class="form-control" name="amount_in_coin" id="amount_in_coin" placeholder="Enter Amount (INR)">
                       <div id="" class="text-danger" ></div> 
                     </div>

                      <div class="form-group col-md-12">
                        <label for="utr">Transaction Number :</label>
                          <input type="text" class="form-control" name="utr" id="utr" placeholder="Enter New Transaction Number">
                         <div id="utr_err" class="text-danger" ></div> 
                      </div>


                   
                                      
                         @if($date1 >= $date2 && $date1 <= $date3)

                                <hr>
                                <div class="form-group col-md-12">
                                 <button type="submit" class="btn btn-primary " >Deposite</button>
                                </div>    

                           @else                      
                                <hr>
                                <div class="form-group col-md-12">
                                <h3 class="text-danger  animate__animated  animate__flash 2s text-center" > Payment Deposit Time is :<br> {{$begin}} to {{$end}} Current Time is {{$current_time}} </h3>
                                </div>                        

                        @endif                        


                  </div>
              </form>
      
          </div>
          </div>
        </div>
    </div>
  </section>
</div>
</div>
    <!-- /.content -->
  </div>
  <script type="text/javascript">

   function checkamount()
   {
    
    var amount_minimum = <?php echo $data_setting->minimum_deposite; ?>;
  
    if(amount_minimum > amount.value)
    {
      amount_err.innerHTML = "Amount should greater then "+amount_minimum;
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

    <!-- footer -->
    @include('user2.common.footer')