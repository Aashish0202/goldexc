	




  	    <?php

          $data_setting = DB::table('setting')->first();

         ?>



    <!-- ***************************************************8-->


   <!doctype html>
    <html lang="en" class="h-100">


     <!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 06:00:25 GMT -->
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>{{$data_setting->site_name}}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

   
    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

    <!-- style css for this template -->
    <link href="{{url('/')}}/fimobile/assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="signin">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap loader-cube-animate mx-auto">
                    <img src="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}" alt="Logo">



                    <title>{{$data_setting->site_name}}</title>



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
                        <div class="col-auto"></div>
                        <div class="col">
                            <div class="logo-small">
                                <img src="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}" alt="">
                                <h5>Gold Exchange</h5>
                            </div>
                        </div>
                        <div class="col-auto"></div>
                    </div>
                </header>
            </div>
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                <h1 class="mb-4 text-color-theme">Sign in</h1>




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
                     @include('user4.common.operation_status')
                    </div>




                 <form class="was-validated needs-validation"   onsubmit="return checkall()" action="{{url('/')}}/login_post" method="post"  novalidate>




                   {{ csrf_field() }}


                   


                    <div class="form-group form-floating mb-3 is-valid">
                        <input type="text" class="form-control"  id="email" placeholder="Username" name="email">
                        <label class="form-control-label" for="username">Username</label>
                    </div>


                    <div class="form-group form-floating is-invalid mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <label class="form-control-label" for="password">Password</label>
                        
                        <button type="button" class="text-danger tooltip-btn" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Enter valid Password" id="passworderror">
                            <i class="bi bi-info-circle"></i>
                        </button>
                    </div>










                    <!-- <p class="mb-3 text-center">
                        <a href="forgot-password.html" class="">
                            Forgot your password?
                        </a>
                    </p>


                    <button type="button" class="btn btn-lg btn-default w-100 mb-4 shadow"
                        onclick="window.location.replace('index.html');">
                        Sign in
                    </button>



                   -->




                  <a href="{{url('/')}}/forgot_password" class="btn-link d-block text-center">Forgot your password?</a>


                    
                 <div class="input-group">
                <button type="submit" class="btn mt-2 btn-primary w-100 btn-rounded">Login</button>

               </div>


          



                </form>
                <p class="mb-2 text-muted">Don't have account?</p>
                <a href="{{url('/')}}/resistration" target="_self" class="">
                    Sign up <i class="bi bi-arrow-right"></i>
                </a>

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
    <script src="{{url('/')}}/fimobile/assets/js/pwa-services.js"></script>

    <!-- page level custom script -->
    <script src="{{url('/')}}/fimobile/assets/js/app.js"></script>







<script src="{{url('/')}}/fimobile/assets/js/jquery.js"></script>
<script src="{{url('/')}}/fimobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/settings.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/custom.js"></script>

<script>

      function checkall()
      {

          if(email.value=="")
          {
            err_email.innerHTML = "Please Enter Email";
            return false;
          }
          else if(password.value=="")
          {
            err_password.innerHTML = "Please Enter Password";
            return false;
          }

      }

</script>


  <script src="{{url('/')}}/fimobile/assets/js/jquery.min.js"></script>

  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bx-hide");
          $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bx-hide");
          $('#show_hide_password i').addClass("bx-show");
        }
      });
    });
  </script>

  <script>
  $(".switcher-btn").on("click", function() {
  $(".switcher-wrapper").toggleClass("switcher-toggled")
  }), $(".close-switcher").on("click", function() {
    $(".switcher-wrapper").removeClass("switcher-toggled")
  }),
  </script>


  </body>


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 06:00:25 GMT -->
</html>
