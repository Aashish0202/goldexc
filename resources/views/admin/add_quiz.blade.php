 	<!-- Header -->
    @include('admin.common.header')

    <!-- Sidebar -->
    @include('admin.common.sidebar')


     @yield('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 ml-5">
            <!-- <h1>Change Password</h1> -->
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quiz Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content ml-5" >
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->

          <div class="col-md-8 mt-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quiz Setting</h3>
              </div>

              @include('admin.common.operation_status')
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
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('/')}}/admin/add_quiz_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                 <a href="{{url('/')}}/admin/quiz" class="btn btn-danger float-right mb-5 mt-3">BACK</a>
                <div class="card-body">
                  <div class="row">
                 <div class="col-md-12">
                  <div class="form-group">
                    <label for="name">Quation</label>
                    <input type="text" class="form-control" id="quation" name="quation" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Option 1</label>
                    <input type="text" class="form-control" id="option_1" name="option_1" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Option 2</label>
                    <input type="text" class="form-control" id="option_2" name="option_2" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Option 3</label>
                    <input type="text" class="form-control" id="option_3" name="option_3" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Option 4</label>
                    <input type="text" class="form-control" id="option_4" name="option_4" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="name"> Right  Answer</label>
                    <input type="text" class="form-control" id="right_ans" name="right_ans" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
                

                 <div class="col-md-12">
                  <div class="form-group">
                    <label for="name">Show Date </label>
                    <input type="date" class="form-control" id="date" name="date" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
                

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Show Time </label>
                    <input type="time" class="form-control" id="time" name="time" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">end Time </label>
                    <input type="time" class="form-control" id="to_time" name="to_time" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
                

                  <div class="col-md-12">
                  <div class="form-group">
                    <label for="name"> Only Booking</label>
                    <input type="text" class="form-control" id="booking" name="booking" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
                
                  <div class="col-md-12">
                  <div class="form-group">
                    <label for="name">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
              
                  
             
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         

       
          
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>

 
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
<script type="text/javascript">
   
   function checkall()
  {
    site_name_err.innerHTML = "";
    site_desc_err.innerHTML = "";
    site_meta_key_err.innerHTML = "";
    marquee_err.innerHTML = "";
    
    if(site_name.value=="")
    {
       site_name_err.innerHTML = "Enter Amount ";
      return false;
    }
   else if(site_desc.value=="")
    {
      site_desc_err.innerHTML = "Please Insert Your Site Discription";
      return false;
    }
    else if(site_meta_key.value=="")
    {
      site_meta_key_err.innerHTML = "Please Insert Your Meta Keywords";
      return false;
    }
      else if(marquee.value=="")
    {
      marquee_err.innerHTML = "Insert Your Marquee";
      return false;
    }
   
  }
 </script>
    <!-- footer -->
    @include('admin.common.footer')

 