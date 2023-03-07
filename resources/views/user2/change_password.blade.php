
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
                        <h4>Change Password</h4>
                        @include('user.common.operation_status')
                        <form method="post" action="{{url('/')}}/user/change_password_post" class="form-horizontal" 
                        style=" padding:20px; " onsubmit="return checkall()">
                        @csrf

                          <div class="card-body">
                            <div class="form-group">
                              <label for="old_password">Old Password</label>
                              <input type="text" name="old_password" id="old_password" class="form-control" >
                            </div>

                             <div class="form-group">
                              <label for="new_password">New Password</label>
                              <input type="text" name="new_password" id="new_password" class="form-control">
                            </div>

                             <div class="form-group">
                              <label for="c_password">Confirm Password</label>
                              <input type="text" name="c_password" id="c_password" class="form-control">
                            </div>
                       
                          </div>
                      
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
  function checkall()
  {
      old_password_err.innerHTML="";
      new_password_err.innerHTML="";
      c_password.innerHTML="";

      if(old_password.value=="")
      {
          old_password_err.innerHTML = "Please Enter Old Password";
          return false;
      }
      else if(new_password.value=="")
      {
          new_password_err.innerHTML = "Please Enter New Password";
          return false;
      }
      else if(c_password.value=="" || new_password.value!=c_password.value)
      {
          c_password.innerHTML = "Password Not Match";
          return false;
      }
  }
</script>



  <!-- footer -->
   @include('user2.common.footer')
 
 