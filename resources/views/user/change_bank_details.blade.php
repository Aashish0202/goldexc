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
              <li class="breadcrumb-item active">Change Bank Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Bank Details</h3>
              </div>
              <!-- /.card-header -->

              @include('user.common.operation_status')

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
              <!-- form start -->
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
                <div class="card-footer">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
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
    bank_acc_holder_name_err.innerHTML = "";
    bank_acc_no_err.innerHTML = "";
    bank_ifsc_err.innerHTML = "";

    if(bank_acc_holder_name.value=="")
    {
      bank_acc_holder_name_err.innerHTML = "Please Enter Your Bank Account Holder Name";
      return false;
    }
   else if(bank_acc_no.value=="")
    {
      bank_acc_no_err.innerHTML = "Please Enter Your Bank Account Number";
      return false;
    }
    else if(bank_ifsc.value=="")
    {
      bank_ifsc_err.innerHTML = "Please Enter Your Bank IFSC";
      return false;
    }
  }
 </script>




    <!-- footer -->
   @include('user.common.footer')
 