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
                    <div class="breadcrumb-title pe-3">Structure</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Autopool Income</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                           
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
               <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Autopool Income (Silver)</h6>
            <hr/>
            <div class="card">
              <div class="card-body">
                <table class="table mb-0">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Count</th>
                      <th scope="col">Pool Income</th>
                      <th scope="col">Credit</th>
                       <th scope="col">Credit Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <th scope="row">1</th>
                      <td>1</td>
                      <td>150</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">2</th>
                      <td>1</td>
                      <td>450</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">3</th>
                      <td>1</td>
                      <td>1350</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">4</th>
                      <td>1</td>
                      <td>4050</td>
                      <td>0</td>
                       <td></td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td></td>
                      <td colspan="1">Upgrade Amount</td>
                      <td>0</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <h6 class="mb-0 text-uppercase">Autopool Income (Gold)</h6>
            <hr/>
            <div class="card">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Count</th>
                      <th scope="col">Pool Income</th>
                      <th scope="col">Credit</th>
                       <th scope="col">Credit Date</th>
                    </tr>
                  </thead>
                   <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>1</td>
                      <td>3000</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">2</th>
                      <td>1</td>
                      <td>9000</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">3</th>
                      <td>1</td>
                      <td>27000</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">4</th>
                      <td>1</td>
                      <td>81000</td>
                      <td>0</td>
                       <td></td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td></td>
                      <td colspan="1">Upgrade Amount</td>
                      <td>0</td>
                      <td></td>
                    </tr>
                  </tbody>
                  
                </table>
              </div>
            </div>
            <h6 class="mb-0 text-uppercase">Autopool Income ( Star Gold)</h6>
            <hr/>
            <div class="card">
              <div class="card-body">
                 <table class="table mb-0">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Count</th>
                      <th scope="col">Pool Income</th>
                      <th scope="col">Credit</th>
                       <th scope="col">Credit Date</th>
                    </tr>
                  </thead>
                   <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>1</td>
                      <td>60000</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">2</th>
                      <td>1</td>
                      <td>180000</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">3</th>
                      <td>1</td>
                      <td>540000</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">4</th>
                      <td>1</td>
                      <td>1620000</td>
                      <td>0</td>
                       <td></td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td></td>
                      <td colspan="1">Upgrade Amount</td>
                      <td>0</td>
                      <td></td>
                    </tr>
                  </tbody>
                  
                </table>
              </div>
            </div>
            <h6 class="mb-0 text-uppercase">Autopool Income (Emerald)</h6>
            <hr/>
            <div class="card">
              <div class="card-body">
               <table class="table mb-0">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Count</th>
                      <th scope="col">Pool Income</th>
                      <th scope="col">Credit</th>
                       <th scope="col">Credit Date</th>
                    </tr>
                  </thead>
                   <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>1</td>
                      <td>6</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">2</th>
                      <td>1</td>
                      <td>18</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">3</th>
                      <td>1</td>
                      <td>54</td>
                      <td>0</td>
                       <td></td>
                    </tr>

                    <tr>
                      <th scope="row">4</th>
                      <td>1</td>
                      <td>1.62</td>
                      <td>0</td>
                       <td></td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td></td>
                      <td colspan="1">Upgrade Amount</td>
                      <td>0</td>
                      <td></td>
                    </tr>
                  </tbody>
                  
                </table>
              </div>
            </div>
          
            
          
            
          </div>
        </div>
                
                
            </div>
        </div>
        <footer class="footer">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>
    </div>
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
    <!--end wrapper-->
   
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