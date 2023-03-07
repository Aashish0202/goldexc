
  <!-- Header -->
    @include('user2.common.header')

    <!-- Sidebar -->
    @include('user2.common.sidebar')


     @yield('content')

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
                            <h4 class="card_title">Change Crypto Wallet</h4>
                             <!-- form start -->
                            @include('user1.common.operation_status')
                            <form action="{{url('/')}}/user/crypto_wallet_post" method="post" onsubmit="return checkall()">@csrf
			                <div class="card-body">
			                  <div class="form-group">
			                    <label for="btc_address">BTC Address</label>
			                    <input type="text" name="btc_address" id="btc_address" class="form-control" value="{{$data->btc_address}}">
			                     <div id="btc_address_err" class="text-danger"></div>
			                  </div>
			                  <div class="form-group">
                                <label for="tron_address">TRON Address</label>
                                <input type="text" name="tron_address" id="tron_address" class="form-control" value="{{$data->tron_address}}">
                                 <div id="tron_address_err" class="text-danger"></div>
                              </div>
                              <div class="form-group">
                                <label for="eth_address">ETH Address</label>
                                <input type="text" name="eth_address" id="eth_address" class="form-control" value="{{$data->eth_address}}">
                                 <div id="eth_address_err" class="text-danger"></div>
                              </div>
                              <div class="form-group">
                                <label for="trx_address">TRX Address</label>
                                <input type="text" name="trx_address" id="trx_address" class="form-control" value="{{$data->trx_address}}">
                                 <div id="trx_address_err" class="text-danger"></div>
                              </div>
                               <div class="form-group">
                                <label for="imps_address">IMPS Address</label>
                                <input type="text" name="imps_address" id="imps_address" class="form-control" value="{{$data->imps_address}}">
                                 <div id="imps_address_err" class="text-danger"></div>
                              </div>
                               <div class="form-group">
                                <label for="usdt_address">USDT Address</label>
                                <input type="text" name="usdt_address" id="usdt_address" class="form-control" value="{{$data->usdt_address}}">
                                 <div id="usdt_address_err" class="text-danger"></div>
                              </div>
			                
			                <!-- /.card-body -->
			                <input type="hidden" name="id" value="{{$data->id}}">
			                
			                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
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
  function checkall()
  {
      btc_address_err.innerHTML="";
      tron_address_err.innerHTML="";
     
      if(btc_address.value=="")
      {
          btc_address_err.innerHTML = "Please Enter BTC Address";
          return false;
      }
      else if(tron_address.value=="")
      {
           tron_address_err.innerHTML = "Please Enter Tron Address";
          return false;
      }
      
  }
</script>



  <!-- footer -->
   @include('user2.common.footer')
 
 