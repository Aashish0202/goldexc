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
                <h3 class="card-title">Withdraw Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
         <form action="{{url('/')}}/admin/withdraw_setting_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()">@csrf
                <div class="card-body">
                 <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                      <label for="withdraw_time_from">Withdraw Timimg From:</label>
                      <input type="time" class="form-control" id="withdraw_time_from" name="withdraw_time_from" value="{{$data->withdraw_time_from}}">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="  withdraw_time_to">Withdraw Timimg To:</label>
                      <input type="time" class="form-control" id="withdraw_time_to" name="  withdraw_time_to" value="{{$data->withdraw_time_to}}">
                    </div>
                  </div>
                </div>
                   <div class="form-group">
                    <label for="minimum_amt">Minium Amount</label>
                    <input type="number" class="form-control" id="minimum_withdraw_amt" name="minimum_withdraw_amt" value="{{$data->minimum_withdraw_amt}}">
                    <div id="minimum_withdrow_amt_err" class="text-danger"></div>
                  </div>
                    <div class="form-group">
                    <label for="amount">Withdraw Mutiple off</label>
                    <input type="number" class="form-control" id="withdraw_multiple_off" name=" withdraw_multiple_off" value="{{$data->withdraw_multiple_off}}">
                    <div id="withdraw_multiple_off_err" class="text-danger"></div>
                  </div>
                    <div class="form-group">
                    <label for="condition">Withdraw Child Condition</label>
                    <input type="number" class="form-control" id="withdraw_child_conn" name="withdraw_child_conn" value="{{$data->withdraw_child_conn}}">
                    <div id="withdraw_child_conn_err" class="text-danger"></div>
                  </div>
                   <div class="form-group">
                    <label for="withdraw_count">Withdraw Count</label>
                    <input type="number" class="form-control" id="withdraw_count" name="withdraw_count" value="{{$data->withdraw_count}}">
                    <div id="withdraw_count_err" class="text-danger"></div>
                  </div>
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
    minimum_withdrow_amt_err.innerHTML = "";
    withdraw_multiple_off_err.innerHTML = "";
    withdraw_child_conn_err.innerHTML = "";
    withdraw_count_err.innerHTML = "";
    
    if(minimum_withdrow_amt.value=="")
    {
       minimum_withdrow_amt_err.innerHTML = "Enter Minimum withdraw amount";
      return false;
    }
   else if(withdraw_multiple_off.value=="")
    {
       withdraw_multiple_off_err.innerHTML = "Please enter amount";
      return false;
    }
    else if(withdraw_child_conn.value=="")
    {
      withdraw_child_conn_err.innerHTML = "Please enter child connection";
      return false;
    }
      else if(withdraw_count.value=="")
    {
      withdraw_count_err.innerHTML = "Please enter value for withdraw count";
      return false;
    }
   
  }
 </script>
    <!-- footer -->
    @include('admin.common.footer')

 