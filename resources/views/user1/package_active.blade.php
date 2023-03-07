
  <!-- Header -->
    @include('user1.common.header')

    <!-- Sidebar -->
    @include('user1.common.sidebar')


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
                            <h6 class="card_title">Package Activation</h6>
                             <!-- form start -->
                            @include('user1.common.operation_status')
                             <form action="{{url('/')}}/user/package_active_post" method="post" onsubmit="return checkall()">
                           

                 {{ csrf_field() }}
                <div class="card-body">
            
                <div class="col-11">
                  <div class="form-group col-md-12">
                    <label for="package_name">User Id</label>
                   <!--  <?php
                        $data = DB::table('users')
                                  ->where('id','=',)
                                    ->get();
                    ?> -->
                    <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Enter User Name"  value="{{$user->email}}" onchange="useridcheck()">
                       <span style="color:green;" id="success_msg"></span>
                      <!--  <span style="color:red;" id="error_msg"></span> -->
                  </div>
                
                 </div>
                 <div class="col-11">
                   <div class="form-group col-md-12">
                    <label for="amount">Wallet Balance</label>
                    <input type="number" class="form-control" name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['activation_wallet']}}" placeholder="Enter Wallet Balance" readonly="true">
                    
                  </div>

                </div>

                   <div class="col-11">
                       <div class="form-group col-md-12">
                        <label for="amount">Select Package</label>
                        <?php  $package = DB::table('package')
                        ->orderby('id','asc')
                        ->get(); ?>
                        <select name="package" id="package" class="form-control">
                          <option value="">Select Package</option>
                          @foreach($package as $package)
                           
                            <option value="{{$package->amount}}">{{$package->amount}}</option>
                          @endforeach
                        </select>
                         <div id="package_err" class="text-danger"></div>
                      </div>
                               
                        <hr>
                        <div class="form-group col-md-12">
                        <button  type="submit" class="btn btn-primary ">Activate Package</button>
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
      bank_acc_holder_name_err.innerHTML="";
      bank_acc_no_err.innerHTML="";
      bank_ifsc_err.innerHTML="";

      if(bank_acc_holder_name.value=="")
      {
          bank_acc_holder_name_err.innerHTML = "Please Enter Bank Account Holder Name";
          return false;
      }
      else if(bank_acc_no.value=="")
      {
           bank_acc_no_err.innerHTML = "Please Enter Please Enter Bank Account No";
          return false;
      }
      else if(bank_ifsc.value=="")
      {
          bank_ifsc_err.innerHTML = "Please Enter Bank IFSC";
          return false;
      }
  }
</script>



  <!-- footer -->
   @include('user1.common.footer')
 
 