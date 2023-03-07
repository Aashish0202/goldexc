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
                <h3 class="card-title">Payment Setting</h3>
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
              <form action="{{url('/')}}/admin/payment_setting_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                <div class="card-body">
                  <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Secret Key</label>
                    <input type="text" class="form-control" id="uk18_key" name="uk18_key" value="{{$data->uk18_key}}">
                  </div>
                  <div id="uk18_key_err" class="text-danger"></div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">VPA</label>
                    <input type="text" class="form-control" id="vpa" name="vpa" value="{{$data->vpa}}">
                  </div>
                  <div id="vpa_err" class="text-danger"></div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">VPA Name</label>
                    <input type="text" class="form-control" id="vpa_name" name="vpa_name" value="{{$data->vpa_name}}">
                  </div>
                  <div id="vpa_name_err" class="text-danger"></div>
                </div>
                   <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Currency</label>
                    <input type="text" class="form-control" id="currency" name="currency" value="{{$data->currency}}">
                  </div>
                  <div id="currency_err" class="text-danger"></div>
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

 


    <!-- footer -->
    @include('admin.common.footer')

 