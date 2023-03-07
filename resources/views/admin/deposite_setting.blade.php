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
              <li class="breadcrumb-item active">General Form</li>
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
                <h3 class="card-title">Deposite Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @include('user2.common.operation_status')
              <form action="{{url('/')}}/admin/deposite_setting_post" method="post" onsubmit="return checkall()">
                @csrf
                <div class="card-body">
                 <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="deposite">Deposite Time From</label>
                    <input type="time" class="form-control" id="deposite_timing_from" name=" deposite_timing_from" value="{{$data->deposite_timing_from}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="deposite">Deposite Time To</label>
                    <input type="time" class="form-control" id="deposite_timing_to" name="  deposite_timing_to" value="{{$data->deposite_timing_to}}">
                  </div>
                </div>
              </div>
                   <div class="form-group">
                    <label for="mdeposite">Minimum Deposite</label>
                    <input type="number" class="form-control" id="minimum_deposite" name="minimum_deposite" value="{{$data->minimum_deposite}}">
                    <div id="minimum_deposite_err" class="text-danger"></div>
                  </div>
                   <div class="form-group">
                    <label for="depositeoff">Deposite Mutiple Off</label>
                    <input type="number" class="form-control" id="deposite_multiple_off" name="deposite_multiple_off" value="{{$data->deposite_multiple_off}}">
                    <div id="deposite_multiple_off_err" class="text-danger"></div>
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
    minimum_deposite_err.innerHTML = "";
    deposite_multiple_off_err.innerHTML = "";
  
    
    if(minimum_deposite.value=="")
    {
       minimum_deposite_err.innerHTML = "Please enter minimum deposite amount ";
      return false;
    }
   else if(depoite_multiple_off.value=="")
    {
       depoite_multiple_off_err.innerHTML = "Please enter amount";
      return false;
    }
    
   
  }
 </script>
 	<!-- footer -->
    @include('admin.common.footer')