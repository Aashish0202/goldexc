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
                <h1>Quations</h1>
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
                        <th>Sr. No</th>
                        <th>Quation </th>
                        <th>Action</th>
                      </tr>
                      </thead>
                  
                      <tbody>
                        
                        
                          @foreach($data as $key=>$value)
                        
                      <tr>
                       <td>{{$key+1}}</td>
                       <td>{{$value->quation}}</td>
                       <td><a href="{{url('/')}}/admin/quiz_result?id={{$value->id}}" class="btn btn-info"><i class="fa fa-eye"></i></a></td>

                     


                     

                         
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




  
  @include('admin.common.footer')
