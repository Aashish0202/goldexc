  @include('user5.common.header')


       @include('user5.common.sidebar')



         <?php
          $data_setting = DB::table('setting')->first();
          $user = Sentinel::check();  

           $deposit_option = DB::table('deposite_option')->where('symbol','=','USDT')->get();
           ?>



      


        <div class="main-container container">
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
                            <h5 class="title">Deposit USDT (BEP20)</h5>
                        </div>
                        <div class="card-body">
                            <div class="basic-form style-1">
                                <form method="post" action="{{url('/')}}/user/make_deposite_post" enctype="multipart/form-data">
                                   @csrf
                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Amount in Gram"  name="amount" id="amount"  onchange="return checkamount()"
                                        onkeypress="return /[0-9]/i.test(event.key)">
                                         <div id="amount_err" class="text-danger"></div>
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

                  <div class="row mb-3">
                    
                    <div class="col-sm-9">
                        @foreach($deposit_option as $options)
                       <div class="form-check">
                           
                        <input class="form-check-input" type="radio"  id="radio13" name="field" value="{{$options->symbol}}" id="{{$options->symbol}}" onclick='check_value(this)'>
                        <label class="form-check-label" for="flexRadioDefault1">{{$options->symbol}}</label>
                       
                       </div>       
                        @endforeach                        
                     
                    </div>
                   </div>
                      <div class="row mb-3">
                         
                               <div class="col-sm-9">
                              <img class="img-fluid" id='imagedest' style="height:150px;" "width:150px;" "align-items: : center;"><br>


                      <b>USDT Deposit Address : <br>
                      <span id="address" class=" text-center text-black"></span>  </b> 
                      <button type="button" id="copybtn" onclick="copyToClipboard('#address')" class="btn btn-primary btn-small">Copy</button>



         <!-- <p style="font-size:12px;"><b>USDT (TRC20) Deposit Address</b> : 
              <span id="p3"> TGoca7iHzHu55XY4uAMLaHLdND5gcVNPcs <i onclick="copyToClipboard('#p3')" class="fa fa-copy" style="color:red;    padding-left: 1%;"></i> </span> </p> -->     
                                  <p>Note:- Send Exact amount of USDT (BEP20)</p>                        
                                            </div>
                                            
                                        </div>

                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-at"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Amount To Pay in USDT"  name="amount_in_coin" id="amount_in_coin" readonly>
                                    </div>

                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Transaction Hash" name="utr" id="utr">
                                    </div>

                                     <div>
                                      <input type="file"name="image" id="file" onchange="return fileValidation()" >
                                    </div>




                                    <div class="col-md-4 input-group mt-3">
                                      <label class="mt-3">Transaction Screen Shot</label><br><br><br><br>     </div>

                                      

                                    <p id="error_msg" class="text-danger"></p>

                                     <div class="row">
                                            
                                            <div class="col-sm-9">
                                                @if($date1 >= $date2 && $date1 <= $date3)
                                                <input type="submit" class="btn btn-primary" id="submit" value="Deposite" onclick="return confirm('Do you really want to submit the form?');" />
                                                 @else     
                                                       <h3 class="text-danger  animate__animated  animate__flash 2s text-center" > Payment Deposit Time is :<br> {{$begin}} to {{$end}} Current Time is {{$current_time}} </h>           

                                                 @endif 
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



 </div>   
</body>


</html>


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
        function fileValidation() {

          
            var fileInput = 
                document.getElementById('file');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                // alert();

                $('#error_msg').text('Invalid file type');
                fileInput.value = '';
                return false;
            } 
            else 
            {
              
                // Image preview


                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML = 
                            '<img src="' + e.target.result
                            + '"/>';
                    };
                      
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

    </script>       

<script>
  $(document).ready(function() {
    $('input[type="file"]').imageuploadify();
  })
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
            alert("a");

      }

       if(payment_mode.value == "trx")
      {

        <?php  $data = DB::table('deposite_option')->where('symbol','=','trx')->first(); ?>
         image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";

          currency_convert(from_curr,mode,amount);


      }


       if(payment_mode.value == "USDT")
      {

         <?php  $data = DB::table('deposite_option')->where('symbol','=','USDT')->first(); ?>

          image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";
         //console.log(image_qr);
         document.getElementById('amount_in_coin').value = amount* {{$data_setting->currency}};   

      }



       if(payment_mode.value == "JAR")
      {

         <?php  $data = DB::table('deposite_option')->where('symbol','=','JAR')->first(); ?>

          image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";
         //console.log(image_qr);
          currency_convert(from_curr,mode,amount);

      }


      if(payment_mode.value == "DIGIGOLD")
      {

         <?php  $data = DB::table('deposite_option')->where('symbol','=','DIGIGOLD')->first(); ?>

          image_qr = "<?php echo $data->qr; ?>";
          address_det = "<?php echo $data->address; ?>";
         //console.log(image_qr);
          currency_convert(from_curr,mode,amount);

      }





       var image_path = "{{url('/')}}/public/qrcode/"+image_qr;
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
             
            
                
                document.getElementById('amount_in_coin').value = amount;   

              
            }
            });

}

 
</script>



<script>
  function gold_usdt(from,to,amount)
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
             
            
                
                document.getElementById('amount_in_coin').value = amount;   

              
            }
            });

}

 
</script>



<script type="text/javascript">  
function copyToClipboard(element) {

  alert('Deposit ID Copied');
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();


}

</script>
       
  

           
        
        <!-- main page content ends -->


     
        <!-- Page ends-->


         @include('user5.common.footer')