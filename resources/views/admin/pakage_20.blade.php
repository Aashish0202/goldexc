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
                <h1>Transaction</h1>
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
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Amount</th>
                        <th>Package</th>
                        <th>Reason</th>
                        <th>Date</th>
                        <th>Approval</th>
                      </tr>
                      </thead>
                      <tbody>
                         @foreach($data as $key=>$value) 
                      <tr>
                          <td><span><i class="icon fa fa-plus-circle button" > </i>{{$key + 1}}</span></td>
                          <td>{{$value->sender}}</td>
                          <td>{{$value->reciver}}</td>
                          <td>{{$value->amount}}</td>
                          <td>{{$value->package}}</td>
                          <td>{{$value->reason}}</td>
                          <td>{{$value->date}}</td>
                           <td>
                          <div class="btn-group">
                          <button type="button"  class="btn @if($value->approval == 'completed') btn-success @elseif($value->approval == 'pending') btn-warning @else btn-danger @endif dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{$value->approval}}
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('/')}}/admin/status_change_data?id={{$value->id}}&approval=completed">Completed</a>
                              <a class="dropdown-item" href="{{url('/')}}/admin/status_change_data?id={{$value->id}}&approval=pending">Pending</a>
                              <a class="dropdown-item" href="{{url('/')}}/admin/status_change_data?id={{$value->id}}&approval=failed">Failed</a>
                            </div>
                          </div>
                        </td>
                     </tr>
                      @endforeach
                      </tbody>
                    
                  </table>
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

  <!-- footer -->
    @include('admin.common.footer')

 