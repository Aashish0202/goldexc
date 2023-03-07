
     
       <?php
          $data_setting = DB::table('setting')->first();
            $user = Sentinel::check();     
         ?>







  <!doctype html>
  <html lang="en" class="h-100">


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 06:00:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>FiMobile V2.0 - Mobile HTML template</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{url('/')}}/fimobile/assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="{{url('/')}}/fimobile/assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="{{url('/')}}/fimobile/assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

    <!-- style css for this template -->
    <link href="{{url('/')}}/fimobile/assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100 dark-bg" data-page="signin">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap loader-cube-animate mx-auto">
                    <img src="{{url('/')}}/fimobile/assets/img/logo.png" alt="Logo">
                </div>
                <p class="mt-4">It's time for track budget<br><strong>Please wait...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Begin page content -->
    <main class="container-fluid h-100">
        <div class="row h-100 overflow-auto">
            <div class="col-12 text-center mb-auto px-0">
                <header class="header">
                    <div class="row">
                        <div class="col-auto">
                            <a href="forgot-password.html" target="_self" class="btn btn-light btn-44"><i
                                    class="bi bi-arrow-left"></i></a>
                        </div>
                        <div class="col">
                            <div class="logo-small">
                                <img src="{{url('/')}}/fimobile/assets/img/logo.png" alt="">
                                <h5>FiMobile</h5>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="#" target="_self" class="btn btn-light btn-44 invisible"></a>
                        </div>
                    </div>
                </header>
            </div>

            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                <h1 class="mb-4 text-color-theme">Reset Password</h1>






                 <div class="ms-auto">
                         @if(count($errors)>0)

                    <div class="alert alert-danger">

                      <!-- <button class="close" type="button" data-dismiss="alert">x</button> -->
                      <ul>
                          @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>
                          
                          @endforeach
                      </ul>
                    </div>
                     @endif
                     @include('user5.common.operation_status')
                    </div>



                <p class="text-muted mb-4">Please create unique password for your account which contains at-least 1
                    capital latter & 1 special character sign</p>

                <div class="form-group form-floating is-valid mb-3">
                    <input type="password" class="form-control" value="1546828" id="newpass" placeholder="New Password">
                    <label class="form-control-label" for="newpass">New Password</label>
                </div>

                <div class="form-group form-floating is-invalid mb-3">
                    <input type="password" class="form-control " id="password" placeholder="Confirm New Password">
                    <label class="form-control-label" for="password">Confirm New Password</label>
                    <button type="button" class="btn btn-link text-danger tooltip-btn" data-bs-toggle="tooltip"
                        data-bs-placement="left" title="Enter valid Password" id="passworderror">
                        <i class="bi bi-info-circle"></i>
                    </button>
                </div>
                <a href="thankyou.html" target="_self" class="btn btn-lg btn-default w-100 shadow">Update</a>
            </div>
            <div class="col-12 text-center mt-auto">
                <div class="row justify-content-center footer-info">
                    <div class="col-auto">

                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Required jquery and libraries -->
    <script src="{{url('/')}}/fimobile/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('/')}}/fimobile/assets/js/popper.min.js"></script>
    <script src="{{url('/')}}/fimobile/assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- cookie js -->
    <script src="{{url('/')}}/fimobile/assets/js/jquery.cookie.js"></script>

    <!-- Customized jquery file  -->
    <script src="{{url('/')}}/fimobile/assets/js/main.js"></script>
    <script src="{{url('/')}}/fimobile/assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src=" {{url('/')}}/fimobile/assets/js/pwa-services.js"></script>

    <!-- page level custom script -->
    <script src=" {{url('/')}}/fimobile/assets/js/app.js"></script>

</body>


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 06:00:32 GMT -->



</html>























<!-- <!DOCTYPE html>
<html lang="en">


<head>
    
   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
  <meta name="theme-color" content="#2196f3">
  <meta name="author" content="DexignZone" /> 
    <meta name="keywords" content="" /> 
    <meta name="robots" content="" /> 
  <meta name="description" content=""/>
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:image" content="social-image.png"/>
  <meta name="format-detection" content="telephone=no">
    
  
  <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}" />
 
  <title>{{$data_setting->site_name}}</title>
    
 
    <link rel="stylesheet" href="{{url('/')}}/fimobile/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/fimobile/assets/css/style.css">
    
  
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Racing+Sans+One&amp;display=swap" rel="stylesheet">

</head>   
<body>
<div class="page-wraper">
    
   
    
    <div class="page-content">
    
        
        <div class="banner-wrapper shape-1">
            <div class="container inner-wrapper">
                <h2 class="dz-title">Forgot Password?</h2>
              
            </div>
        </div>
        
         <div class="ms-auto">
                         @if(count($errors)>0)

                    <div class="alert alert-danger">

                     
                      <ul>
                          @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>
                          
                          @endforeach
                      </ul>
                    </div>
                     @endif
                     @include('user5.common.operation_status')
                    </div>
        <div class="container">
      <div class="account-area">
        <form onsubmit="return checkall()" action="{{url('/')}}/forgot_password_post" method="post">
                         {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" placeholder="Enter Your User_Id"id="email" name="email" class="form-control">
                    </div>
                    
                     <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary btn-lg">Send</button> <a href="{{url('/')}}/login" class="btn btn-primary btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
            </div>
                  
                </form>
      </div>
    </div>
    </div>
   

    <footer class="footer fixed">
        <div class="container">
            <a href="index.html" class="btn btn-primary light btn-rounded text-primary d-block">Login</a>
        </div>
    </footer>
    
</div>





<script src="{{url('/')}}/fimobile/assets/js/jquery.js"></script>
<script src="{{url('/')}}/fimobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/settings.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/custom.js"></script>
</body>

</html> -->