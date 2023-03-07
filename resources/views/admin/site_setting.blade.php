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
                <h3 class="card-title">Site Setting</h3>
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
              <form action="{{url('/')}}/admin/site_setting_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                <div class="card-body">
                  <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" class="form-control" id="site_name" name="site_name" value="{{$data->site_name}}">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="description">Site Description</label>
                    <textarea class="form-control" id="site_desc" name="site_desc">{{$data->site_desc}}</textarea>
                  </div>
                  <div id="site_desc_err" class="text-danger"></div>
                </div>
              </div>

                 <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                    <label for="file">Site Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                       <input type="file" name="site_logo" id="site_logo" onchange="return fileValidation()">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <img style="background-color: grey; width:50%;" src="{{url('/')}}/public/site_logo/{{$data->site_logo}}">
                 </div>
               </div>
               <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="keywords">Site Meta Keywords</label>
                    <textarea class="form-control" id="site_meta_key" name="site_meta_key">{{$data->site_meta_key}}</textarea>
                   
                  </div>
                  <div id="site_meta_key_err" class="text-danger"></div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="marquee">Marquee</label>
                    <textarea class="form-control" id="marquee" name="marquee">{{$data->marquee}}</textarea>
                   <div id="marquee_err" class="text-danger"></div>
                  </div>
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

 