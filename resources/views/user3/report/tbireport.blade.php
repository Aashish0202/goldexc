       @include('user3.common.header')


       @include('user3.common.sidebar')

       <?php
          $data_setting = DB::table('setting')->first();
          $user = Sentinel::check();     
           ?>

<body>
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
             <!--   <center><h6 class="mb-0 text-uppercase">@if(isset($_GET['title'])){{$_GET['title']}}@endif Report</h6>
                <hr/>   </center>  -->
                 <center><h3>TBI Report</h3></center>
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
                                                <!--  <th>Sender</th> -->
                                                     <th>Sender Name</th>
                                                      <th>User</th>
                                              <!--   <th>Amount</th> -->
                                                      <th>Package</th>
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
                                    
                                   <!--    <td>{{$arr_data->sender}}</td> -->
                                      <?php $data    = DB::table('users')
                                                      ->where('email','=',$arr_data->sender)
                                                        ->first();?>

                                      <td>{{$data->first_name}}</td>
                                     
                                      <td>{{$arr_data->reciver}}</td>
                                <!-- <td>{{$arr_data->amount}}$</td> -->
                                      <td>{{$arr_data->package}}$</td>
                                      <td>{{$arr_data->approval}}</td>
                                      
                                      <td>{{$arr_data->date}}</td>
                                      <td>{{$arr_data->status}}</td>
                                   
                                   </tr>
                               @endforeach
                                </tbody>
                                <tfoot>
                                    <!-- <tr>
                                                      <th>NO</th>
                                                      <th>Sender</th>
                                                     
                                                      <th>Reciver</th>
                                                       <th>Sender Name</th>
                                                      <th>Amount</th>
                                                      <th>Package</th>
                                                      <th>Approval</th>
                                                      <th>Date</th>
                                                      <th>Status</th>
                                                    </tr> -->
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
 <div class="menubar-area">
    <div class="toolbar-inner menubar-nav">
      <a href="{{url('/')}}/user/dashboard" class="nav-link active">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="#130F26"/>
        </svg>
      </a>
      <a href="{{url('/')}}/user/make_deposite" class="nav-link">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M11.776 21.8374C9.49294 20.4273 7.37064 18.7645 5.44791 16.8796C4.09052 15.5338 3.05388 13.8905 2.41718 12.0753C1.27955 8.53523 2.60383 4.48948 6.30113 3.2884C8.25264 2.67553 10.3751 3.05175 12.0071 4.29983V4.29983C13.6397 3.05315 15.7614 2.67705 17.713 3.2884C21.4103 4.48948 22.7435 8.53523 21.6058 12.0753C20.9743 13.8888 19.9438 15.5319 18.5929 16.8796C16.6684 18.7625 14.5463 20.4251 12.2648 21.8374L12.016 22L11.776 21.8374Z" fill="#a19fa8"/>
                    <path d="M12.0109 22L11.776 21.8374C9.49013 20.4274 7.36487 18.7647 5.43902 16.8796C4.0752 15.5356 3.03238 13.8922 2.39052 12.0753C1.26177 8.53523 2.58605 4.48948 6.28335 3.2884C8.23486 2.67553 10.3853 3.05204 12.0109 4.31057V22Z" fill="#a19fa8"/>
                    <path d="M18.2304 9.99922V9.99922C18.0296 9.98629 17.8425 9.8859 17.7131 9.72157C17.5836 9.55723 17.5232 9.3434 17.5459 9.13016V9.13016C17.5677 8.4278 17.168 7.78851 16.5517 7.53977C16.1609 7.43309 15.9243 7.00987 16.022 6.59249C16.1148 6.18182 16.4993 5.92647 16.8858 6.0189C16.9346 6.027 16.9816 6.04468 17.0244 6.07105C18.2601 6.54658 19.0601 7.82641 18.9965 9.22576C18.9944 9.43785 18.9117 9.63998 18.7673 9.78581C18.6229 9.93164 18.4291 10.0087 18.2304 9.99922Z" fill="#a19fa8"/>
                </svg>
      </a>
      <a href="{{url('/')}}/user/receiver_transaction?reason=level&title=Level Income Report" class="nav-link">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M22 15.9403C22 18.7303 19.76 20.9903 16.97 21.0003H16.96H7.05C4.27 21.0003 2 18.7503 2 15.9603V15.9503C2 15.9503 2.006 11.5243 2.014 9.2983C2.015 8.8803 2.495 8.6463 2.822 8.9063C5.198 10.7913 9.447 14.2283 9.5 14.2733C10.21 14.8423 11.11 15.1633 12.03 15.1633C12.95 15.1633 13.85 14.8423 14.56 14.2623C14.613 14.2273 18.767 10.8933 21.179 8.9773C21.507 8.7163 21.989 8.9503 21.99 9.3673C22 11.5763 22 15.9403 22 15.9403Z" fill="#a19fa8"/>
                    <path d="M21.4761 5.67369C20.6101 4.04169 18.9061 2.99969 17.0301 2.99969H7.05013C5.17413 2.99969 3.47013 4.04169 2.60413 5.67369C2.41013 6.03869 2.50213 6.4937 2.82513 6.75169L10.2501 12.6907C10.7701 13.1107 11.4001 13.3197 12.0301 13.3197C12.0341 13.3197 12.0371 13.3197 12.0401 13.3197C12.0431 13.3197 12.0471 13.3197 12.0501 13.3197C12.6801 13.3197 13.3101 13.1107 13.8301 12.6907L21.2551 6.75169C21.5781 6.4937 21.6701 6.03869 21.4761 5.67369Z" fill="#a19fa8"/>
                </svg>
      </a>
      <a href="javascript:void(0);" class="menu-toggler">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M16.0755 2H19.4615C20.8637 2 22 3.14585 22 4.55996V7.97452C22 9.38864 20.8637 10.5345 19.4615 10.5345H16.0755C14.6732 10.5345 13.537 9.38864 13.537 7.97452V4.55996C13.537 3.14585 14.6732 2 16.0755 2Z" fill="#a19fa8"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="#a19fa8"/>
                </svg>
      </a>
    </div>
  </div>
  <!-- Menubar -->

    <!-- Theme Color Settings -->
 
  <!-- Theme Color Settings End -->
</div>

<!--**********************************
    Scripts
***********************************-->
<script src="{{url('/')}}/new_theme/assets/js/jquery.js"></script>
<script src="{{url('/')}}/new_theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/new_theme/assets/js/settings.js"></script>
<script src="{{url('/')}}/new_theme/assets/js/custom.js"></script>
<script src="{{url('/')}}/new_theme/assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="{{url('/')}}/new_theme/assets/vendor/imageuplodify/imageuploadify.min.js"></script>
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