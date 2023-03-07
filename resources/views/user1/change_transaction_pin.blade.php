
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
                            <h4 class="card_title">Change Transaction PIN</h4>
                             <!-- form start -->
                            @include('user.common.operation_status')
                            <form action="{{url('/')}}/user/change_transaction_pin_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="old_tpin">Old Transaction Pin</label>
                                  <input type="password" name="old_tpin" id="old_tpin" class="form-control" placeholder="Old Transaction Pin">
                                  <div id="old_tpin_err" class="text-danger"></div>
                                </div>
                                <div class="form-group">
                                  <label for="new_tpin">New Transaction Pin</label>
                                  <input type="password" name="new_tpin" id="new_tpin" class="form-control" placeholder="New Transaction Pin">
                                  <div id="new_tpin_err" class="text-danger"></div>
                                </div>
                                <div class="form-group">
                                  <label for="confirm_tpin">Confirm Transaction Pin</label>
                                  <input type="password" name="confirm_tpin" id="confirm_tpin" class="form-control" placeholder="Confirm Transaction Pin">
                                  <div id="confirm_tpin_err" class="text-danger"></div>
                                </div>

                                <input type="hidden" name="id" id="id" value="{{$data->id}}" class="form-control" placeholder="Confirm Password">
                              <!-- /.card-body -->

                             
                                <button type="submit" class="btn btn-primary">Submit</button>
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
      old_tpin_err.innerHTML="";
      new_tpin_err.innerHTML="";
      confirm_tpin_err.innerHTML="";

      if(old_tpin.value=="")
      {
          old_tpin_err.innerHTML = "Please Enter Old Transaction PIN";
          return false;
      }
      else if(new_tpin.value=="")
      {
           new_tpin_err.innerHTML = "Please Enter Old Transaction PIN";
          return false;
      }
      else if(confirm_tpin.value=="" || confirm_tpin.value!=new_tpin.value)
      {
          confirm_tpin_err.innerHTML = "PIN Not Match";
          return false;
      }
  }
</script>



  <!-- footer -->
   @include('user1.common.footer')
 
 