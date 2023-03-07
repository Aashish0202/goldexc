
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
                <!-- Textual inputs -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                                  <h4>Change Profile</h4>
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
                                      @if($data->image)
                                        <img src="{{url('/')}}/public/image/{{$data->image}}" alt="" class="img-fluid" style="height:120px; width:120px">
                                      @else
                                        <img src="{{url('/')}}/public/profile_image/user2.jpg"  alt="user-avatar" class=" img-fluid" style="height:120px;width:120px">
                                      @endif
                                    </div>
                                  
                            </div>
                          </div>
                            <div id="file_err" class="text-danger"></div>
                        
                          <!-- /.card-body -->
                          <input type="hidden" name="id" value="{{$data->id}}">
                          
                            <button type="submit" name="submit" id="submit" class="btn btn-secondary">Submit</button>
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

  <!-- footer -->
   @include('user2.common.footer')
 
 