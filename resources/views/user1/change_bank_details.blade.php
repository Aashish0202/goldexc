
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
                            <h4 class="card_title">Change Bank Details</h4>
                             <!-- form start -->
                            @include('user1.common.operation_status')
                             <form action="{{url('/')}}/user/change_bank_details_post" method="post" onsubmit="return checkall()">@csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="bank_acc_holder_name">Bank Account Holder Name</label>
                                  <input type="text" name="bank_acc_holder_name" id="bank_acc_holder_name" class="form-control" value="{{$data->bank_acc_holder_name}}">
                                   <div id="bank_acc_holder_name_err" class="text-danger"></div>
                                </div>
                                <div class="form-group">
                                  <label for="bank_acc_no">Bank Account Number</label>
                                  <input type="text" name="bank_acc_no" id="bank_acc_no" class="form-control" value="{{$data->bank_acc_no}}">
                                   <div id="bank_acc_no_err" class="text-danger"></div>
                                </div>
                                <div class="form-group">
                                  <label for="bank_ifsc">Bank IFSC</label>
                                  <input type="bank_ifsc" name="bank_ifsc" id="bank_ifsc" class="form-control" value="{{$data->bank_ifsc}}">
                                   <div id="bank_ifsc_err" class="text-danger"></div>
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
 
 