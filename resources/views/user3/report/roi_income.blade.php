       @include('user3.common.header')


       @include('user3.common.sidebar')

       <?php
          $data_setting = DB::table('setting')->first();
          $user = Sentinel::check();     
           ?>

      <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Reports</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">@if(isset($_GET['title'])){{$_GET['title']}}@endif</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                           
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <h6 class="mb-0 text-uppercase">@if(isset($_GET['title'])){{$_GET['title']}}@endif</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                   <tr>
                                                      <th>NO</th>
                                                       <th>Sender</th>
                                                      
                                                      <th>Reciver</th>
                                                      <th>Reciver Name</th>

                                                      <th>Sponcer id</th>
                                                      <th>Package</th>
                                                      <th>ROI income of User</th>

                                                       <th>ROI income of Sponcer</th>

                                                      
                                                      <th>Approval</th>
                                                      <th>Date</th>
                                                      <th>Status</th>
                                                    </tr>
                                </thead>
                                <tbody>
                                     <?php $i =0;?>
                              
                                  @foreach($data as $arr_data)
                                     <tr>
                                       <td>{{$i =$i+1}}</td>
                                    
                                      <td>{{$arr_data->sender}}</td>
                                      <?php $data    = DB::table('users')
                                                      ->where('email','=',$arr_data->reciver)
                                                        ->first();?>

                                   
                                     
                                      <td>{{$arr_data->reciver}}</td>
                                      <td>{{$data->first_name}}</td>
                                      <td>{{$data->sponcer_id}}</td>
                                      <td>{{$arr_data->package}}</td>

                                       @if($arr_data->level == '1')<td>{{$arr_data->package * 0.03}}</td>

                                      @elseif($arr_data->level > '1')<td>{{$arr_data->package *0.03}}</td>

                                      @else 
                                      @endif

                                       @if($arr_data->level == '1')<td>{{$arr_data->package *0.03 *0.1}}</td>

                                      @elseif($arr_data->level > '1')<td>{{$arr_data->package *0.03 *0.02}}</td>

                                      @else 
                                      @endif

                                      <td>{{$arr_data->approval}}</td>
                                      <td>{{$arr_data->date}}</td>
                                      <td>{{$arr_data->status}}</td>
                                   
                                   </tr>
                               @endforeach
                                </tbody>
                                <tfoot>
                                                    <tr>
                                                      <th>NO</th>
                                                      <th>Sender</th>
                                                     
                                                      <th>Reciver</th>
                                                      <th>Reciver Name</th>
                                                      <th>Amount</th>
                                                      <th>Package</th>
                                                      <th>Approval</th>
                                                      <th>Date</th>
                                                      <th>Status</th>
                                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
        <footer class="footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
     <style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
  
   color: white;
   text-align: center;
}
</style>
   
    <!-- Bootstrap JS -->
    <script src="{{url('/')}}/new_theme/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="{{url('/')}}/new_theme/assets/js/jquery.min.js"></script>
    <script src="{{url('/')}}/new_theme/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="{{url('/')}}/new_theme/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="{{url('/')}}/new_theme/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="{{url('/')}}/new_theme/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/new_theme/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    
    
    <!-- <script>
        $(document).ready(function() {
            $('#example').DataTable(
              
              );
            $("div.dataTables_filter input").focus();
          } );
    </script> -->
    
    
    <script>
      
      $(document).ready(function() {
      $('#example').DataTable()
    });
      
    </script>
    
    
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );
         
            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>
    <!--app JS-->
    <script src="{{url('/')}}/new_theme/assets/js/app.js"></script>     
  
  </body>


</html>   