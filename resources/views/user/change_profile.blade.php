
 	<!-- Header -->
    @include('user.common.header')

    <!-- Sidebar -->
    @include('user.common.sidebar')


     @yield('content')

<body>
    
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary" >
              <div class="card-header">
                <h3 class="card-title">Change your profile here</h3>
              </div>
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
              @include('user.common.operation_status')
              <form method="post" action="{{url('/')}}/user/change_profile_post" class="form-horizontal" 
              style=" padding:20px; " enctype="multipart/form-data" onsubmit="return checkall()">
              @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Change Full Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{$data->first_name}}">
                  </div>
                  <div id="first_name_err" class="text-danger"></div>
                   <div class="form-group">
                    <label for="Address">Address</label>
                    
                     <textarea name="address" id="address" class="form-control" >{{$data->address}}
                    </textarea>
                  </div>
                  <div id="address_err" class="text-danger"></div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputFile">Upload Your Profile</label>
                          <div class="input-group">
                            <div class="custom-file">
                               <input type="file" name="image" id="file" class="form-control-file" id="exampleFormControlFile1" onchange="return fileValidation()" value="{{$data->image}}">
                               
                            </div>
                            <span style="color: green;" id="success_msg"></span>
                              <span style="color: red;" id="error_msg"></span>
                            <!-- <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                            </div> -->
                          </div>
                        </div>
                      </div>
                          <div class="col-md-6">

                          <img src="{{url('/')}}/public/image/{{$data->image}}" alt="user-avatar" class=" img-fluid" style="height:120px;width:120px">
                       
                          </div>
                        
                  </div>
                </div>
                  <div id="file_err" class="text-danger"></div>
              
                <!-- /.card-body -->
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="card-footer">
                  <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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
    first_name_err.innerHTML="";
     address_err.innerHTML="";
     

      if(first_name.value=="")
      {
          first_name_err.innerHTML = "Please Enter First Name";
          return false;
      }
      else if(address.value=="")
      {
          address_err.innerHTML = "Please Enter Address";
          return false;
      }
      
  }
</script>



 	<!-- footer -->
   @include('user.common.footer')
 
 