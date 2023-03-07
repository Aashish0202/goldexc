<!-- Header -->
    @include('user.common.header')

    <!-- Sidebar -->
    @include('user.common.sidebar')


     @yield('content')


     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Deposite History</h1>
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
  <div id="op_status">
     

    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6"></div>
          <div class="col-6">
      <!--   <a href="http://localhost/laravel/MLM/admin/create_package" class="btn btn-primary mb-2 float-right" >Create Package</a> -->
      </div>
      </div>
        <div class="row">
          <div class="col-12">

            <div class="card">

              <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>User Id</th>
                        <th>Deposite Amount</th>
                        <th>Payment Mode</th>
                        <th>Status</th>
                       
                        <th> Edit</th>
                        <th> View</th>
                        <th> Delete</th>
                      </tr>
                      </thead>
                      <tbody>
                       
                      <tr>
                          <td></td>
                           <td></td>
                            <td></td>
                             <td></td>
                              <td></td>
                               <td></td>

                        
                          <td><a href="#" class="btn btn-warning">Edit</td>
                          <td><a href="#" class="btn btn-info">View</td>
                          <td><a href="#" class="btn btn-danger">Delete</td>
                                     
                      </tr>
                    
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
    <!-- footer -->
    @include('user.common.footer')