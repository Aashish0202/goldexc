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
                <h1>Level Transaction</h1>
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
                        <th>Reson</th>
                        <th>Level</th>
                        <th>Percentage</th>
                        <th>Approval</th>
                        <th>Transaction<br>Created by</th>
                        <th>Date</th>
                       
                      </tr>
                      </thead>
                      <tbody>
                                                <tr>
                          <td>10</td>
                          <td>ff</td>
                          <td>ff</td>
                          <td>1000</td>
                          <td>1000</td>
                          <td>activate_package</td>
                          <td></td>
                          <td></td>
                          <td>completed</td>
                          <td></td>
                          <td>2021-07-12</td>
                         
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