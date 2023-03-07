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
              <li class="breadcrumb-item active">QR Setting</li>
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
                <h3 class="card-title">QR Setting</h3>
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
              <form action="{{url('/')}}/admin/qr_update_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                <div class="card-body">
                  <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name1" name="name" value="{{$data->name}}">
                  </div>
                  <div id="name_err" class="text-danger"></div>
                </div>
                 <div class="col-md-6">
                   <div class="form-group">
                    <label for="address">QR Code Address</label>
                   <input type="text" class="form-control" id="address" name="address" value="{{$data->address}}">
                  </div>
                  <div id="address_err" class="text-danger"></div>
                </div>
              </div>

                 <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                    <label for="file">QR Code</label>
                    <div class="input-group">
                      <div class="custom-file">
                       <input type="file" name="qr" id="qr">
                      </div>
                    <div class="col-md-6">
                       <img class="img-fluid" style="background-color: grey;" src="{{url('/')}}/public/qrcode/{{$data->qr}}" style="width:100px;height:100px;">
                    </div>
                    </div>
                    
                  </div>
                </div>
               
              </div>
                  <div class="form-group">
                    <label for="symbol">Symbol</label>
                     <input type="text" class="form-control" id="symbol" name="symbol" value="{{$data->symbol}}">
                  </div>
                  <div id="symbol_err" class="text-danger"></div>
                 <input type="hidden" name="id" id="id" value="{{$data->id}}">
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
    <!-- footer -->
    <script type="text/javascript">
   
   function checkall()
  {
    name_err.innerHTML = "";
    address_err.innerHTML = "";
    symbol_err.innerHTML = "";
    
    if(name1.value=="")
    {
       name_err.innerHTML = "Enter Your QR code name ";
      return false;
    }
   else if(address.value=="")
    {
      address_err.innerHTML = "Enter your QR address";
      return false;
    }
    else if(symbol.value=="")
    {
      symbol_err.innerHTML = "Enter QR symbol";
      return false;
    }
  }
 </script>
    @include('admin.common.footer')

 