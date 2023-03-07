<!DOCTYPE html>
<html lang="en">

<?php
          $data_setting = DB::table('setting')->first();
          // print_r($data_setting); die();     
           ?><head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>{{$data_setting->site_name}}</title>
    <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
    <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
    <meta name="author" content="hencework"/>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <!-- Data table CSS -->
    <link href="{{url('/')}}/new_theme/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    
    <!-- Custom CSS -->
    <link href="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <div class="wrapper theme-1-active pimary-color-red">
        
         @include('user4.common.sidebar')
 
        
      
        
        
        <button id="setting_panel_btn" class="btn btn-success btn-circle setting-panel-btn shadow-2dp"><i class="zmdi zmdi-settings"></i></button>
        <!-- /Right Setting Menu -->
        
        <!-- Right Sidebar Backdrop -->
        <div class="right-sidebar-backdrop"></div>
        <!-- /Right Sidebar Backdrop -->
            
        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                      <h5 class="txt-dark">Report</h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <ol class="breadcrumb">
                        <li><a href="index-2.html">Dashboard</a></li>
                        
                        <li class="active"><span>@if(isset($_GET['title'])){{$_GET['title']}}@endif Report</span></li>
                      </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->
                
                <!-- Row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default card-view">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">@if(isset($_GET['title'])){{$_GET['title']}}@endif Report</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table id="datable_1" class="table table-hover display  pb-30" >
                                                <thead>
                                                    <tr>
                                                         <th>NO</th>
                                                          <th>Sender</th>
                                                          <th>Reciver</th>
                                                          <th>Amount</th>
                                                          <th>Package</th>
                                                          <th>Approval</th>
                                                          
                                                          <th>Date</th>
                                                          <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                         <th>NO</th>
                                                          <th>Sender</th>
                                                          <th>Reciver</th>
                                                          <th>Amount</th>
                                                          <th>Package</th>
                                                          <th>Approval</th>
                                                          
                                                          <th>Date</th>
                                                          <th>Status</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                     <?php $i =0;?>
                              
                                  @foreach($data as $arr_data)
                                
                                   <tr>
                                    <td>{{$i =$i+1}}</td>
                                    
                                      <td>{{$arr_data->sender}}</td>
                                      <td>{{$arr_data->reciver}}</td>
                                      <td>{{$arr_data->amount}}</td>
                                      <td>{{$arr_data->package}}</td>
                                      <td>{{$arr_data->approval}}</td>
                                      
                                      <td>{{$arr_data->date}}</td>
                                      <td>{{$arr_data->status}}</td>
                                   
                                   </tr>
                                

                                  @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <!-- /Row -->
                
              
            </div>
        
            
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
    
    <!-- JavaScript -->
    
    <!-- jQuery -->
    <script src="{{url('/')}}/new_theme/vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('/')}}/new_theme/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Data table JavaScript -->
    <script src="{{url('/')}}/new_theme/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/dataTables-data.js"></script>
    
    <!-- Slimscroll JavaScript -->
    <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/jquery.slimscroll.js"></script>
    
    <!-- Owl JavaScript -->
    <script src="{{url('/')}}/new_theme/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
    
    <!-- Switchery JavaScript -->
    <script src="{{url('/')}}/new_theme/vendors/bower_components/switchery/dist/switchery.min.js"></script>
    
    <!-- Fancy Dropdown JS -->
    <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/dropdown-bootstrap-extended.js"></script>
    
    <!-- Init JavaScript -->
    <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/init.js"></script>
    
    
</body>


<!-- Mirrored from hencework.com/theme/doodle-demo/full-width-light/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Jan 2022 11:19:14 GMT -->
</html>
