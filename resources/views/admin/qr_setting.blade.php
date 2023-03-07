  @include('admin.common.header ')
  <!-- Main Sidebar Container -->
 
      @include('admin.common.sidebar ')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>User</h1>
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
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                   @include('admin.common.operation_status')
                      <thead>
                      <tr>
                       
                        <th>ID</th>
                        <th>Name</th>
                        <th>QR code</th>
                        <th>Address</th>
                        <th>Symbol</th>
                        <th>Is Active</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                  
                      <tbody>
                        
                        @foreach($data as $key=>$value) 
                      <tr>
                        <td ><span><i  class="icon fa fa-plus-circle button" > </i>{{$value->id}}</span></td>
                          
                          <td>{{$value->name}}</td>
                          <td>{{$value->qr}}</td>
                          <td>{{$value->address}}</td>
                          <td>{{$value->symbol}}</td>

                        <td>
                          <div class="btn-group">
                          <button type="button"  class="btn @if($value->is_active == 'yes') btn-success @elseif($value->is_active == 'no') btn-danger @else btn-danger @endif dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{$value->is_active}}
                          </button>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('/')}}/admin/change_status?id={{$value->id}}&is_active=yes">Yes</a>
                              <a class="dropdown-item" href="{{url('/')}}/admin/change_status?id={{$value->id}}&is_active=no">No</a>
                            </div>
                          </div>
                         
                          
                        </td>
                        <td><a href="{{url('/')}}/admin/qr_update?id={{$value->id}}" class="btn btn-warning">Update</td>

                         
                          
                         </td>
                      </tr>
                      @endforeach
                      
                      </tbody>
       
                  </table>
                     <div class="mt-3">
                     
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
    
     $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


   $('#example2').DataTable( {
       "responsive": true,
       "ordering": true,
       "info": true,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            'csv','pdf'
        ]
    } );


  });
  </script>
  @include('admin.common.footer')
