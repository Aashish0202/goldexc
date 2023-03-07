  @include('user5.common.header')


       @include('user5.common.sidebar')



        <?php
          $data_setting = DB::table('setting')->first();
          $user = Sentinel::check();     
           ?>

   <!-- main page content -->
        <div class="main-container container">
            <!-- welcome user --><body>
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
                            <h5 class="title">Update Wallet</h5>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" onsubmit="return checkall()" action="{{url('/')}}/user/change_bank_details_post" enctype="multipart/form-data">
                                        @csrf
                                     <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fas fa-landmark"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Bank Account Number" name="bank_acc_no" id="bank_acc_no" class="form-control" value="{{$data->bank_acc_no}}">
                                    </div>
                                     <dir id="bank_acc_no_err" name="bank_acc_no_err"></dir>

                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-align-center"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Bank IFSC" name="bank_ifsc" id="bank_ifsc"  value="{{$data->bank_ifsc}}">
                                    </div>
                                     <dir id="bank_ifsc_err" name="bank_ifsc_err"></dir>
                            <!--
                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-clipboard"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Pan Number" name="pan" id="pan" class="form-control" value="{{$data->pan}}">
                                    </div>

                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                            <i class="fa fa-file"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Adhar Number" name="adhar" id="adhar" class="form-control" value="{{$data->adhar}}">
                                    </div> -->
                                    <input type="hidden" name="id" value="{{$data->id}}">

                                    <div class="mb-3 form-input">
                                        <label>BEP-20 USDT Address</label>
                                        <span class="input-icon">
                                            <i class="fa-solid fa-eye"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="BEP-20 USDT Address" name="usdt_address" id="usdt_address" value="{{$user->usdt_address}}">
                                    </div>


                                    <div class="mb-3 form-input">
                                        <label>DIGIGOLD  Number</label>
                                        <span class="input-icon">
                                            <i class="fa fa-file"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="DIGIGOLD Number" name="digigold" id="digigold" class="form-control" value="{{$data->digigold}}">
                                    </div> 


                                    <div class="mb-3 form-input">
                                        <label>JAR  Number</label>
                                        <span class="input-icon">
                                            <i class="fa fa-file"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Jar Number" name="jar" id="jar" class="form-control" value="{{$data->jar}}">
                                    </div> 
                                                                     
                                     <div class="col-sm-9">
                                <input type="submit" class="btn btn-primary px-4" id="submit" value="Save Changes" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>    
        </div>   
    </div>
    
   

    <!-- Theme Color Settings -->
    
    <!-- Theme Color Settings End -->
</div>

</div>
<!-- main page content ends -->


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



    
   <!-- Page ends-->

<script>

      function checkall()
      {         
            bank_ifsc_err.innerHTML="";
            bank_acc_no_err.innerHTML="";

          if(bank_acc_no.value=="")
          {
            bank_acc_no_err.innerHTML = "Please Enter Bank Account Number";
            return false;
          }
          else if(bank_ifsc.value=="")
          {
            bank_ifsc_err.innerHTML = "Please Enter bank IFSC ";
            return false;
          }

      }

</script>

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
</body>


</html>



         @include('user5.common.footer')


