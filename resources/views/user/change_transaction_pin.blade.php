
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
              <li class="breadcrumb-item active">Transaction Pin</li>
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
                <h3 class="card-title">Change Transaction Pin</h3>
              </div>
              @include('user.common.operation_status ')
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
              <form action="{{url('/')}}/user/change_transaction_pin_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="old_tpin">Old Transaction Pin</label>
                    <input type="password" name="old_tpin" id="old_tpin" class="form-control" placeholder="Old Transaction Pin">
                    <div id="old_err" class="text-danger"></div>
                  </div>
                  <div class="form-group">
                    <label for="new_tpin">New Transaction Pin</label>
                    <input type="password" name="new_tpin" id="new_tpin" class="form-control" placeholder="New Transaction Pin">
                    <div id="new_err" class="text-danger"></div>
                  </div>
                  <div class="form-group">
                    <label for="confirm_tpin">Confirm Transaction Pin</label>
                    <input type="password" name="confirm_tpin" id="confirm_tpin" class="form-control" placeholder="Confirm Transaction Pin">
                    <div id="confirm_err" class="text-danger"></div>
                  </div>

                  <input type="hidden" name="id" id="id" value="{{$data->id}}" class="form-control" placeholder="Confirm Password">
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
 <script type="text/javascript">
   
   function checkall()
  {
    old_err.innerHTML = "";
    new_err.innerHTML = "";
    confirm_err.innerHTML = "";
    if(old_tpin.value=="")
    {
      old_err.innerHTML = "Please Enter Your Old Transaction Pin";
      return false;
    }
   else if(new_tpin.value=="")
    {
      new_err.innerHTML = "Please Enter Your New Transaction Pin";
      return false;
    }
    else if(confirm_tpin.value=="" || new_tpin.value != confirm_tpin.value)
    {
      confirm_err.innerHTML = " Transaction Pin Not Match";
      return false;
    }
  }
 </script>
  




    <!-- footer -->
   @include('user.common.footer')
 
 