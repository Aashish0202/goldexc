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
                            <h6 class="card_title">Package Activation</h6>
                             <!-- form start -->
                            @include('user.common.operation_status')
              
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
                             <form action="{{url('/')}}/user/make_deposite_inr_post" method="post" onsubmit="return checkall()">
                <div class="card-body">
                       @csrf
                  
                      
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
                    
                      
                        <div class="row">
                          <div class="form-group col-md-12">
                          <label for="amount_in_coin">Amount :</label>
                          <input type="text" class="form-control" name="qr_amount" id="qr_amount" placeholder="Enter Amount" onchange="return create()">
                          </div>
                          <div class="form-group col-md-12">
                            <h4 id="demo" style="color:#eb5050;"> </h4>
                           <img style="background-color: white;" id="impsqr"  width="100%" src=""></img> <br> <br>
                         </div>


                            <div class="form-group col-md-12">
                             <a id="imps_btn"  style="display:none">
                            <h1 class="btn btn-block btn-success" >Pay Online</h1></a>
                          </div>
                         </div>
                    
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


<script language="javascript" type="text/javascript">
    function create(){
      amount = document.getElementById('qr_amount').value;

   // alert(amount);
    var pn = "<?php echo $data_setting->vpa_name; ?>";
    var pa = "<?php echo $data_setting->vpa; ?>"
    var tn = "<?php echo $user->id; ?>"

    var amt = amount+".00";
    document.getElementById("demo").innerHTML = "You need to pay this amount in indian currency 👉 "  +amt +" ₹";


    var url = "https://upiqr.in/api/qr?name="+pn+"&vpa="+pa+"&amount="+amt+"&note="+tn;

    var image = document.getElementById("impsqr");
    image.src = url;



    var btn_url = "upi://pay?pn="+pn+"&pa="+pa+"&am="+amt+"&tn="+tn;



    var btn =  document.getElementById('imps_btn')

    btn.style.display = 'block';
    btn.href = btn_url;
   
    

    }
</script>


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
      
      if(payment_mode.value == "btc")
      {


        <?php  $data = DB::table('deposite_option')->where('symbol','=','btc')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
         address_det = "<?php echo $data->address; ?>";
         
         currency_convert("USD",mode,amount);
          
        

      }

      if(payment_mode.value == "eth")
      {

        <?php  $data = DB::table('deposite_option')->where('symbol','=','eth')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert("USD",mode,amount);

      }

       if(payment_mode.value == "imps")
      {
           <?php  $data = DB::table('deposite_option')->where('symbol','=','imps')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert("USD","INR",amount);

          //  document.getElementById('amount_in_coin').value = amount*75;   


      }

       if(payment_mode.value == "trx")
      {

        <?php  $data = DB::table('deposite_option')->where('symbol','=','trx')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert("USD",mode,amount);


      }


       if(payment_mode.value == "usdt")
      {

         <?php  $data = DB::table('deposite_option')->where('symbol','=','usdt')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert("USD",mode,amount);

      }

       var image_path = "/swati/public/qrcode/"+image_qr;
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

<script type="text/javascript">
   function checkall()

  { 
    amount_err.innerHTML = "";
    utr_err.innerHTML = "";
  
    if(amount.value=="")
    {
      amount_err.innerHTML = "Enter Amount ";
      return false;
    }
   else if(utr.value=="")
    {
      utr_err.innerHTML = "Insert Your Transaction Number";
      return false;
    }
   
  }
 </script>

    <!-- footer -->
    @include('user2.common.footer')