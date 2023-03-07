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
                <h1>Package</h1>
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
                        <th>Package Name</th>
                        <th>Amount</th>
                        <th>Level Upto</th>
                        <th>Capping</th>
                        <th>Roi</th>
                        <th>Roi Days</th>
                      </tr>
                      </thead>
                      <tbody>
                       @foreach($data as $data)
                         <tr>
                          <td ><span><i class="icon fa fa-plus-circle button" > </i>{{$data->id}}</span></td>
                          
                          <td>{{$data->package_name}}</td>
                          <td>{{$data->amount}}</td>
                          <td>{{$data->level_upto}}</td>
                          <td>{{$data->capping}}</td>
                          <td>{{$data->roi}}</td>
                          <td>{{$data->roi}}</td>
                          
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

 