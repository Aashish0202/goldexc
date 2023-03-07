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
              <div class="col-sm-6">
                <h1>Deposite Request</h1>
              </div>
<!--               <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">DataTables</li>
                </ol>
              </div> -->
            </div>
          </div><!-- /.container-fluid -->
        </section>
    @include('admin.common.operation_status ')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        
                      <tr>
                        <th>ID</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                        <th>Amount INR</th>
                        <th>Screen Sort</th>
                        <th>Payment Type</th>
                        <th>Reason</th>
                        <th>Date</th>
                        <th>Utr</th>
                        <th>Action</th>
                        
                      </tr>
                      </thead>
                      <tbody>
                         @foreach($data as $key=>$value) 
                      <tr>
                          
                          <td ><span><i class="icon fa fa-plus-circle button" > </i>{{$value->id}}</span></td>
                          <td>{{$value->reciver}}</td>
                          <td>{{$value->amount}}</td>
                          <td>{{$value->package}}</td>
                          <th><img  src="{{url('/')}}/public/screen_sort/{{$value->percentage}}" style="height:50px;"></td></th>
                          <td>{{$value->level}}</td>
                          <td>{{$value->reason}}</td>
                          <td>{{$value->date}}</td>
                          <td>{{$value->utr}}</td>
                          <td> 
                            <form>
                            <a class="btn btn-success" href="{{url('/')}}/public/screen_sort/{{$value->percentage}}">Show</a>
             <a class="btn btn-success" href="{{url('/')}}/admin/deposite_request_data?id={{$value->id}}&approval=completed" style="padding: 10px;" onclick="return confirm('Do you really want to submit the form?');">Received</a>
                              <a href="{{url('/')}}/admin/request_reject?id={{$value->id}}&approval=reject" class="btn btn-danger">     Reject</a>
                              </form>
                          </td>
                     </tr>
                      @endforeach
                      </tbody>                    
                  </table>
                   <div class="mt-3">
                    <!--  -->
                     </div> 
              </div>
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script type="text/javascript">
  function dubleclick() {
   // alert("a");
  $(document).ready(function () {
    $("#btn").on("click", function() {
        $(this).attr("disabled", "disabled");
        doWork(); //this method contains your logic
    });
});
}

function doWork() {
  //  alert("doing work");
    //actually this function will do something and when processing is done the button is enabled by removing the 'disabled' attribute
    //I use setTimeout so you can see the button can only be clicked once, and can't be clicked again while work is being done
    setTimeout('$("#btn").removeAttr("disabled")', 1500);
}
</script>
  <!-- footer -->
    @include('admin.common.footer')

 