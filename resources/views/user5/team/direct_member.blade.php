  @include('user5.common.header')


       @include('user5.common.sidebar')



        <?php
          $data_setting = DB::table('setting')->first();
          $user = Sentinel::check();     
           ?>

   <!-- main page content -->
        <div class="main-container container">


 <div class="page-wraper">
    
    <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row">
               
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            
                        </div>
                         <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                   
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                               <!--  <li class="breadcrumb-item active" aria-current="page">@if(isset($_GET['title'])){{$_GET['title']}}@endif Report</li> -->
                            </ol>
                        </nav>
                    </div>
                    
                </div>
                <!--end breadcrumb-->
               <center><h6 class="mb-0 text-uppercase">@if(isset($_GET['title'])){{$_GET['title']}}@endif Direct Member Report</h6>
                <hr/>   </center> 
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                  
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                               <!--  <li class="breadcrumb-item active" aria-current="page">@if(isset($_GET['title'])){{$_GET['title']}}@endif Report</li> -->
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                           
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
              <!--   <h6 class="mb-0 text-uppercase">@if(isset($_GET['title'])){{$_GET['title']}}@endif Report</h6>
                <hr/> -->
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                   <tr>
                                                      <th>NO</th>
                                                      <th>User_Id</th>
                                                      <th>User Name</th>
                                                      <th>Mobile</th>
                                                      <th>Activation</th>
                                                      <th>Date</th>
                                                      <th>Status</th>
                                 </tr>
                                </thead>
                                <tbody>
                                     <?php $i =0;?>
                              
                                  @foreach($data as $arr_data)
                                     <tr>
                                    <td>{{$i =$i+1}}</td>
                                    
                                      <td>{{$arr_data->email}}</td>
                                      

                                      <td>{{$arr_data->first_name}}</td>
                                      <td>{{$arr_data->mobile}}</td>
                                      <?php $total_activation = DB::table('transaction')->where('reason','=','activate_package')->where('reciver','=',$arr_data->email)->where('approval','=','completed')->SUM('amount'); 

                                      $activation = DB::table('transaction')->where('reason','=','activate_package')->where('reciver','=',$arr_data->email)->where('approval','=','completed')->first();
                                      ?>
                                      <td>{{$total_activation}} GRM</td>
                                      <td>@if(isset($activation)){{$activation->date}}@endif</td>
                                      <td>{{$arr_data->is_active}}</td>
                                   
                                   </tr>
                               @endforeach
                                </tbody>
                                <tfoot>
                                   
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
                
                
            </div>
        </div>
                    </div>
                </div>
            </div>    
        </div>   
    </div>
  
    <!-- Menubar -->
 
  <!-- Menubar -->

    <!-- Theme Color Settings -->
 
  <!-- Theme Color Settings End -->
</div>

<!--**********************************
    Scripts
***********************************-->

           
  </div>
        <!-- main page content ends -->



        <script src="{{url('/')}}/fimobile/assets/js/jquery.js"></script>
<script src="{{url('/')}}/fimobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/settings.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/custom.js"></script>
<script src="{{url('/')}}/fimobile/js/dz.carousel.js"></script><!-- Swiper -->
<script src="{{url('/')}}/fimobile/assets/vendor/imageuplodify/imageuploadify.min.js"></script>
<script src="{{url('/')}}/new_theme/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $('input[type="file"]').imageuploadify();
  })
</script>
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
 
</body>

<!-- Mirrored from jobie.dexignzone.com/mobile-app/xhtml/ui-input.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jul 2022 10:15:30 GMT -->
</html>


        <!-- Page ends-->


         @include('user5.common.footer')