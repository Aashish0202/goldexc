<!-- Header -->
    @include('admin.common.header')

    <!-- Sidebar -->
    @include('admin.common.sidebar')


     @yield('content')
              <style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
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
              <li class="breadcrumb-item active">Registration Setting</li>
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
          <div class="col-md-12 mt-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registration Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('/')}}/admin/resistration_setting_post" method="post" onsubmit="return checkall()">
                @csrf
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="name">Maximum Mobile Registration</label>
                    <input type="number" class="form-control" id="max_mobile_count" name="max_mobile_count" value="{{$data->max_mobile_count}}">
                    <div id="max_mobile_count_err" class="text-danger"></div>
                  </div>
                  <div class="form-group">
                    <label for="name">Maximum Email Registration</label>
                    <input type="number" class="form-control" id="max_email_count" name="max_email_count" value="{{$data->max_email_count}}">
                    <div id="max_email_count_err" class="text-danger"></div>
                  </div>

                   <div class="form-group">
                    <label for="name">Maximum Sponcer Id</label>
                    <input type="number" class="form-control" id="max_sponcer_count" name="max_sponcer_count" value="{{$data->max_sponcer_count}}">
                    <div id="max_email_count_err" class="text-danger"></div>
                  </div>
                   
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
<script type="text/javascript">
   
   function checkall()
  {
    max_mobile_count_err.innerHTML = "";
    max_email_count_err.innerHTML = "";
  
    
    if(max_mobile_count.value=="")
    {
       max_mobile_count_err.innerHTML = "Enter value for mobile count ";
      return false;
    }
   else if(max_email_count.value=="")
    {
       max_email_count_err.innerHTML = "Enter value for email count";
      return false;
    }
    
   
  }
 </script>
 	<!-- footer -->
    @include('admin.common.footer')