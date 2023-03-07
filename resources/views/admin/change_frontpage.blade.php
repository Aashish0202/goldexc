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
              <form action="{{url('/')}}/admin/change_frontpage_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
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
                    <label for="name">Site Tagline</label>
                    <input type="text" class="form-control" id="tagline" name="tagline" value="{{$data->tagline}}">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="description">Site Address</label>
                    <textarea class="form-control" id="address" name="address">{{$data->address}}</textarea>
                  </div>
                  <div id="site_desc_err" class="text-danger"></div>
                </div>
              </div>
                 <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Phone no</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$data->phone}}">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="description">Email</label>
                   <input type="text" class="form-control" id="email" name="email" value="{{$data->email}}">
                  </div>
                  <div id="site_desc_err" class="text-danger"></div>
                </div>
              </div>
              <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{$data->facebook}}">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="description">Instagram</label>
                   <input type="text" class="form-control" id="instagram" name="instagram" value="{{$data->instagram}}">
                  </div>
                  <div id="site_desc_err" class="text-danger"></div>
                </div>
              </div>
              <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Linkedin</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{$data->linkedin}}">
                  </div>
                  <div id="site_name_err" class="text-danger"></div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="description">Twitter</label>
                   <input type="text" class="form-control" id="twitter" name="twitter" value="{{$data->twitter}}">
                  </div>
                  <div id="site_desc_err" class="text-danger"></div>
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

 