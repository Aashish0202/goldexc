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
              <li class="breadcrumb-item active">Site Setting</li>
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
                <h3 class="card-title">Password Setting</h3>
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
              <form action="{{url('/')}}/admin/admin_password_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                <div class="card-body">
                  <div class="row">
                   <div class="col-md-6">
                    <div class="form-group">
                    <label for="marquee">Old Password</label>
                    <input class="form-control" id="old_password" name="old_password" />
                   <div id="marquee_err" class="text-danger"></div>
                  </div>
                </div>

                 <div class="col-md-6">
                    <div class="form-group">
                    <label for="marquee">New Password</label>
                    <input class="form-control" id="new_password" name="new_password" />
                   <div id="marquee_err" class="text-danger"></div>
                  </div>
                </div>



                 <div class="col-md-6">
                    <div class="form-group">
                    <label for="marquee">Confirm Password</label>
                    <input class="form-control" id="c_password" name="c_password" />
                   <div id="marquee_err" class="text-danger"></div>
                  </div>
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

 