<!DOCTYPE html>
<html lang="en">

  <?php
          $data_setting = DB::table('setting')->first();
          // print_r($data_setting); die();     
   ?>
<head>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>{{$data_setting->site_name}}</title>
  <meta name="description" content="Doodle is a Dashboard & Admin Site Responsive Template by hencework." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Doodle Admin, Doodleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="hencework"/>
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  
  <!-- Morris Charts CSS -->
    <link href="{{url('/')}}/new_theme/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
  
  <!-- vector map CSS -->
  <link href="{{url('/')}}/new_theme/vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>
  
  <!-- Calendar CSS -->
  <link href="{{url('/')}}/new_theme/vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css"/>
    
  <!-- Data table CSS -->
  <link href="{{url('/')}}/new_theme/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
  
  <!-- Custom CSS -->
  <link href="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/css/style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


       @include('user4.common.sidebar')

       <?php    $user  = Sentinel::check();?>

<div class="page-wrapper">
            <div class="container-fluid pt-25">
          
        <!-- Row -->
        <div class="row">
          
          <div class="col-lg-9 col-xs-12">
            <div class="panel panel-default card-view pa-0">
              <div class="panel-wrapper collapse in">
                <div  class="panel-body pb-0">
                  <div  class="tab-struct custom-tab-1">
                   <!--  <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                      <li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>Profile</span></a></li>
                       <li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Edit Profile</span></a></li>
                      <li  role="presentation" class="next"><a aria-expanded="true"  data-toggle="tab" role="tab" id="follo_tab_8" href="#follo_8"><span>Edit Bank Details</span></a></li>

                      <li role="presentation" class=""><a  data-toggle="tab" id="photos_tab_8" role="tab" href="#photos_8" aria-expanded="false"><span>Change Password</span></a></li>
                      <li role="presentation" class=""><a  data-toggle="tab" id="earning_tab_8" role="tab" href="#earnings_8" aria-expanded="false"><span>Change Transaction PIN</span></a></li>
                    </ul> -->

                     <!-- <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                      <li class="active" role="presentation">
                        <a type="button" href="{{url('/')}}/change_profile/profile_8" aria-expanded="false"><span>Profile</span></a></li>
                    </ul> -->

                    <ul role="tablist" class="nav nav-tabs nav-tabs-responsive mb-3" id="myTabs_8">
                      <li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>Profile</span></a></li>
                    </ul>

                    <center>
                      <a type="button" data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false" class="btn btn-primary mt-5">
                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      <a type="button"  data-toggle="tab" id="follo_tab_8" role="tab" href="#follo_8" aria-expanded="false" class="btn btn-info mt-5">
                      <i class="fa fa-university" aria-hidden="true"></i></a>

                      <a type="button"  data-toggle="tab" id="photos_tab_8" role="tab" href="#photos_8" aria-expanded="false" class="btn btn-success mt-5">
                      <i class="fa fa-lock" aria-hidden="true"></i></a>

                       <a type="button"  data-toggle="tab" id="earning_tab_8" role="tab" href="#earnings_8" aria-expanded="false" class="btn btn-warning mt-5">
                      <i class="fa fa-key" aria-hidden="true"></i></a>
                    </center>

                      

                   
 
                     @if(count($errors)>0)

                    <div class="alert alert-danger">

                      <button class="close" type="button" data-dismiss="alert">x</button>
                      <ul>
                          @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>
                          
                          @endforeach
                      </ul>
                    </div>
                  @endif
              @include('user4.common.operation_status')
                    <div class="tab-content" id="myTabContent_8">
                      <div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
                         <div class="col-md-12 col-xs-12">
                              <div class="panel panel-default card-view  pa-0">
                              <div class="panel-wrapper collapse in">
                               <div class="panel-body  pa-0">
                        <div class="profile-box">
                          <div class="profile-cover-pic" style=" background-image: url({{url('/')}}/new_theme/doodle-demo/full-width-light/dist/web/1.jpg);  background-repeat: no-repeat;
  background-size: cover; width:100%;">
                           
                            <div class="profile-image-overlay"></div>
                          </div>
                          <form method="post" action="{{url('/')}}/user/change_profile_post">
                          <div class="profile-info text-center">
                            <div class="profile-img-wrap">

                                       @if($user->image)
                                        <img src="{{url('/')}}/public/image/{{$user->image}}" alt="" class="inline-block mb-10">
                                      @else
                                      <img class="inline-block mb-10" src="{{url('/')}}/new_theme/doodle-demo/img/mock1.jpg" alt="user"/>
                                      @endif
                              
                              
                            </div>  
                            <h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger">{{$user->email}}</h5>
                            <h6 class="block capitalize-font pb-20">{{$user->email1}}</h6>
                          </div>
                          </form>  
                          <div class="social-info">
                            <div class="row">
                              <div class="col-xs-6 text-center">
                                <span class="block head-font"><span class="">{{$user->mobile}}</span></span>
                                <span class="counts-text block">Mobile</span>
                              </div>
                              <div class="col-xs-6 text-center">
                                <span class="block head-font"><span class="">{{$user->city}}</span></span>
                                <span class="counts-text block">City</span>
                              </div>
                             
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
          </div>
                      </div>

                        <div  id="settings_8" class="tab-pane fade" role="tabpanel">
                        <!-- Row -->
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="">
                             
                              <div class="panel-wrapper collapse in">

                                <div class="panel-body pa-0">
                                  <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                      <form method="post" action="{{url('/')}}/user/change_profile_post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body overflow-hide">
                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputuname_01">Change Full Name</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="icon-user"></i></div>
                                              <input type="text" class="form-control"  name="first_name" id="first_name" class="form-control" value="{{$user->first_name}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_01">Address</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                             
                                                <textarea  class="form-control" name="address" id="address" class="form-control" >{{$data->address}}</textarea>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputContact_01">Contact number</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="icon-phone"></i></div>
                                              <input type="number" class="form-control" name="mobile" id="mobile" class="form-control" value="{{$user->mobile}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputuname_01">City</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                              <input type="text" class="form-control"  name="city" id="city" class="form-control" value="{{$user->city}}">
                                            </div>
                                          </div>

                                           <input type="hidden" name="id" value="{{$data->id}}">
                                          <style type="text/css">
                                            input[type=file]::file-selector-button {
                                              border: 2px solid #6c5ce7;
                                              padding: .2em .4em;
                                              border-radius: .2em;
                                              background-color: #a29bfe;
                                              transition: 1s;
                                            }
                                            
                                            input[type=file]::file-selector-button:hover {
                                                  background-color: #81ecec;
                                                  border: 2px solid #00cec9;
                                                }
                                           </style>

                                           <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputuname_01">Upload Your Profile</label>
                                            <div class="input-group">
                                              <input type="file" name="image" id="file" class="form-control-file" id="exampleFormControlFile1" onchange="return fileValidation()" value="{{$data->image}}">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-actions mt-10">      
                                          <button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
                                        </div>        
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div  id="follo_8" class="tab-pane fade" role="tabpanel">
                          <div class="row">
                          <div class="col-lg-12">
                            <div class="">
                             
                              <div class="panel-wrapper collapse in">

                                <div class="panel-body pa-0">
                                  <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                      <form method="post" action="{{url('/')}}/user/change_bank_details_post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body overflow-hide">
                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputuname_01"> Bank Account Holder Name</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="icon-user"></i></div>
                                              <input type="text" class="form-control" name="bank_acc_holder_name" id="bank_acc_holder_name" value="{{$user->bank_acc_holder_name}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_01">Bank Account Number</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-hand-o-right" aria-hidden="true"></i></div>
                                             
                                                 <input type="text" name="bank_acc_no" id="bank_acc_no" class="form-control" value="{{$data->bank_acc_no}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputContact_01">Bank IFSC</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-hand-o-right" aria-hidden="true"></i></div>
                                              <input type="number" class="form-control" name="bank_ifsc" id="bank_ifsc" value="{{$data->bank_ifsc}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputuname_01">Pan Number</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-hand-o-right" aria-hidden="true"></i></div>
                                              <input type="text" name="pan" id="pan" class="form-control" value="{{$data->pan}}">
                                            </div>
                                          </div>

                                           <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputuname_01">Adhar Number</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-hand-o-right" aria-hidden="true"></i></div>
                                              <input type="text" name="adhar" id="adhar" class="form-control" value="{{$data->adhar}}">
                                            </div>
                                          </div>

                                           <input type="hidden" name="id" value="{{$data->id}}">
                                          


                                        <div class="form-actions mt-10">      
                                          <button type="submit" class="btn btn-success mr-10 mb-30">Update</button>
                                        </div>   
                                        </div>     
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div  id="photos_8" class="tab-pane fade" role="tabpanel">
                        
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="">
                             
                              <div class="panel-wrapper collapse in">

                                <div class="panel-body pa-0">
                                  <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                      <form method="post" action="{{url('/')}}/user/change_password_post" enctype="multipart/form-data" onsubmit="return checkall()">
                                        @csrf
                                        <div class="form-body overflow-hide">
                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputuname_01"> Old Password</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                              <input type="text" class="form-control" name="old_password" id="old_password">
                                            </div>
                                            <p id="old_password_err" class="text-danger"></p>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_01">New Password</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-unlock" aria-hidden="true"></i></div>
                                             
                                                 <input type="text" name="new_password" id="new_password" class="form-control">
                                            </div>
                                            <p id="new_password_err" class="text-danger"></p>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputContact_01">Confirm Password</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                                              <input type="text" class="form-control" name="c_password" id="c_password">
                                            </div>
                                            <p id="c_password_err" class="text-danger"></p>
                                          </div>

                                           <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-actions mt-10">      
                                          <button type="submit" class="btn btn-success mr-10 mb-30">Update</button>
                                        </div>   
                                        </div>     
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                      </div>
                      <div  id="earnings_8" class="tab-pane fade" role="tabpanel">
                        <!-- Row -->
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="">
                             
                              <div class="panel-wrapper collapse in">

                                <div class="panel-body pa-0">
                                  <div class="col-sm-12 col-xs-12">
                                    <div class="form-wrap">
                                      <form method="post" action="{{url('/')}}/user/change_transaction_pin_post" enctype="multipart/form-data"  onsubmit="return checktpin()">
                                        @csrf
                                        <div class="form-body overflow-hide">
                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputuname_01"> Old Transaction Pin</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                              <input type="text" class="form-control" name="old_tpin" id="old_tpin">
                                            </div>
                                            <p id="old_tpin_err" class="text-danger"></p>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputEmail_01">New Transaction Pin</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-unlock" aria-hidden="true"></i></div>
                                             
                                                 <input type="text" name="new_tpin" id="new_tpin" class="form-control">
                                            </div>
                                            <p id="new_tpin_err" class="text-danger"></p>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label mb-10" for="exampleInputContact_01">Confirm Transaction Pin</label>
                                            <div class="input-group">
                                              <div class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                                              <input type="text" class="form-control" name="confirm_tpin" id="confirm_tpin">
                                            </div>
                                            <p id="confirm_tpin_err" class="text-danger"></p>
                                          </div>

                                           <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-actions mt-50">      
                                          <button type="submit" class="btn btn-success mr-10 mb-30">Update</button>
                                        </div>   
                                        </div>     
                                      </form>
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
            </div>
            
              
          </div>
           <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default card-view">
              <div class="panel-wrapper collapse in">
                <div class="panel-body">
                  <div class="calendar-wrap">
                    <div id="calendar_small" class="small-calendar"></div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <div class="panel panel-default card-view">
              <div class="panel-heading">
                <div class="pull-left">
                  <h6 class="panel-title txt-dark">{{$user->first_name}}</h6>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-wrapper collapse in">
                <div  class="panel-body row pa-0">
                  <!--Instagram-->
                  <ul class="instagram-lite"></ul>
                  <!--/Instagram-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Row -->
      
      
      </div>
      <!-- Footer -->
      <footer class="footer container-fluid pl-30 pr-30">
        <div class="row">
          <div class="col-sm-12">
            <p><?php echo date("Y")?> &copy; Soul USDT</p>
          </div>
        </div>
      </footer>
      <!-- /Footer -->
      
    </div>


<script>
  function checkall()
  {

   
      old_password_err.innerHTML="";
      new_password_err.innerHTML="";
      c_password.innerHTML="";

      if(old_password.value =="")
      { 
       // alert("a");
          old_password_err.innerHTML = "Please Enter Old Password";
          return false;
      }
      else if(new_password.value=="")
      {
          new_password_err.innerHTML = "Please Enter New Password";
          return false;
      }
      else if(c_password.value=="" ||  new_password.value!=c_password.value)
      {
          c_password.innerHTML = "Password Not Match";
          return false;
      }
  }
</script>

<script>
  function checktpin()
  {

   
      old_tpin_err.innerHTML="";
      new_tpin_err.innerHTML="";
      confirm_tpin.innerHTML="";

      if(old_tpin.value =="")
      { 
       // alert("a");
         old_tpin_err.innerHTML = "Please Enter Old Transaction Pin";
          return false;
      }
      else if(new_tpin.value=="")
      {
          new_tpin_err.innerHTML = "Please Enter New Transaction Pin";
          return false;
      }
      else if(confirm_tpin.value=="" ||  new_tpin.value!=confirm_tpin.value)
      {
          confirm_tpin.innerHTML = "Transaction Pin Not Match";
          return false;
      }
  }
</script>

    <script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                // alert();

                $('#error_msg').text('Invalid file type');
                fileInput.value = '';
                return false;
            } 
            else 
            {
              
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML = 
                            '<img src="' + e.target.result
                            + '"/>';
                    };
                      
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>
            
            <!-- jQuery -->
    <script src="{{url('/')}}/new_theme/vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('/')}}/new_theme/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
  <!-- Vector Maps JavaScript -->
    <script src="{{url('/')}}/new_theme/vendors/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{url('/')}}/new_theme/vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/vectormap-data.js"></script>
  
  <!-- Calender JavaScripts -->
  <script src="{{url('/')}}/new_theme/vendors/bower_components/moment/min/moment.min.js"></script>
  <script src="{{url('/')}}/new_theme/vendors/jquery-ui.min.js"></script>
  <script src="{{url('/')}}/new_theme/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/fullcalendar-data.js"></script>
  
  <!-- Counter Animation JavaScript -->
  <script src="{{url('/')}}/new_theme/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
  <script src="{{url('/')}}/new_theme/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
  
  <!-- Data table JavaScript -->
  <script src="{{url('/')}}/new_theme/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
  
  <!-- Slimscroll JavaScript -->
  <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/jquery.slimscroll.js"></script>
  
  <!-- Fancy Dropdown JS -->
  <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/dropdown-bootstrap-extended.js"></script>
  
  <!-- Sparkline JavaScript -->
  <script src="{{url('/')}}/new_theme/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
  
  <script src="{{url('/')}}/new_theme/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
  <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/skills-counter-data.js"></script>
  
  <!-- Morris Charts JavaScript -->
    <script src="{{url('/')}}/new_theme/vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="{{url('/')}}/new_theme/vendors/bower_components/morris.js/morris.min.js"></script>
    <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/morris-data.js"></script>
  
  <!-- Owl JavaScript -->
  <script src="{{url('/')}}/new_theme/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
  
  <!-- Switchery JavaScript -->
  <script src="{{url('/')}}/new_theme/vendors/bower_components/switchery/dist/switchery.min.js"></script>
  
  <!-- Data table JavaScript -->
  <script src="{{url('/')}}/new_theme/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    
  <!-- Gallery JavaScript -->
  <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/isotope.js"></script>

  <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/froogaloop2.min.js"></script>


  
  <!-- Init JavaScript -->
  <script src="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/js/init.js"></script>
 