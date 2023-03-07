<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from rtsolutionz.com/vizzstudio/demo-falr/falr/dark-theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jul 2021 07:19:45 GMT -->
<head>
    
    <?php $site_data = DB::table('setting')->first(); ?>

    <!--=========================*
                Met Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$site_data->site_desc}}">

    <!--=========================*
              Page Title
    *===========================-->
    <title>{{$site_data->site_name}} : User Panel</title>

    <!--=========================*
                Favicon
    *===========================-->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/myadmin/assets/images/favicon.png">

    <!--=========================*
            Bootstrap Css
    *===========================-->
    <link rel="stylesheet" href="{{url('/')}}/myadmin/assets/css/bootstrap.min.css">

    <!--=========================*
              Custom CSS
    *===========================-->
    <link rel="stylesheet" href="{{url('/')}}/myadmin/assets/css/style.css">

    <!--=========================*
               Owl CSS
    *===========================-->
    <link href="{{url('/')}}/myadmin/assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('/')}}/myadmin/assets/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">

    <!--=========================*
            Font Awesome
    *===========================-->
    <link rel="stylesheet" href="{{url('/')}}/myadmin/assets/css/font-awesome.min.css">

    <!--=========================*
             Themify Icons
    *===========================-->
    <link rel="stylesheet" href="{{url('/')}}/myadmin/assets/css/themify-icons.css">

    <!--=========================*
               Ionicons
    *===========================-->
    <link href="{{url('/')}}/myadmin/assets/css/ionicons.min.css" rel="stylesheet"/>

    <!--=========================*
              EtLine Icons
    *===========================-->
    <link href="{{url('/')}}/myadmin/assets/css/et-line.css" rel="stylesheet"/>

    <!--=========================*
              Feather Icons
    *===========================-->
    <link href="{{url('/')}}/myadmin/assets/css/feather.css" rel="stylesheet"/>

    <!--=========================*
              Flag Icons
    *===========================-->
    <link href="{{url('/')}}/myadmin/assets/css/flag-icon.min.css" rel="stylesheet"/>

    <!--=========================*
              Modernizer
    *===========================-->
    <script src="{{url('/')}}/myadmin/assets/js/modernizr-2.8.3.min.js"></script>

    <!--=========================*
               Metis Menu
    *===========================-->
    <link rel="stylesheet" href="{{url('/')}}/myadmin/assets/css/metisMenu.css">

    <!--=========================*
               Slick Menu
    *===========================-->
    <link rel="stylesheet" href="{{url('/')}}/myadmin/assets/css/slicknav.min.css">
    
    <!--=========================*
              Flag Icons
    *===========================-->
    <link href="{{url('/')}}/myadmin/assets/css/flag-icon.min.css" rel="stylesheet"/>

    <!--=========================*
               AM Chart
    *===========================-->
    <link rel="stylesheet" href="{{url('/')}}/myadmin/assets/vendors/am-charts/css/am-charts.css" type="text/css" media="all" />

    <!--=========================*
               Morris Css
    *===========================-->
    <link rel="stylesheet" href="{{url('/')}}/myadmin/assets/vendors/charts/morris-bundle/morris.css">

    <!--=========================*
            Google Fonts
    *===========================-->

    <!-- Font USE: 'Roboto', sans-serif;-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>

<body class="darker">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--=========================*
         Page Container
*===========================-->
<div id="page-container">

    <!--==================================*
               Header Section
    *====================================-->
    <div class="header-area">

        <!--======================*
                   Logo
        *=========================-->
        <div class="header-area-left">
             <?php
               $logo = DB::table('setting')
              ->first();
             ?>
            <a href="index.html" class="logo">
                <span>
                    <img src="{{url('/')}}/public/site_logo/{{$logo->site_logo}}" alt="" height="18">
                </span>
                <i>
                    <img src="{{url('/')}}/public/site_logo/{{$logo->site_logo}}" alt="">
                </i>
            </a>
        </div>
        <!--======================*
                  End Logo
        *=========================-->

        <div class="row align-items-center header_right">
            <!--==================================*
                     Navigation and Search
            *====================================-->
            <div class="col-md-6 d_none_sm d-flex align-items-center">
                <div class="nav-btn button-menu-mobile pull-left">
                    <button class="open-left waves-effect">
                        <i class="fa fa-reorder"></i>
                    </button>
                </div>
                <div class="search-box pull-left mt-2" style="background:none">
                    <form action="#">
                        <i class="fa fa-search"></i>
                        <input type="text" name="search" placeholder="Search..." required="">
                    </form>
                </div>
            </div>
            <!--==================================*
                     End Navigation and Search
            *====================================-->
            <!--==================================*
                     Notification Section
            *====================================-->

            <div class="col-md-6 col-sm-12">
                <ul class="notification-area pull-right">
                    <li class="mobile_menu_btn">
                        <span class="nav-btn pull-left d_none_lg">

                            <button class="open-left waves-effect">
                                <i class="fa fa-reorder"></i>
                            </button>
                        </span>
                    </li>
                       
                    <li id="full-view" class="d_none_sm"><i class="fa fa-arrows-alt"></i></li>
                    <li id="full-view-exit" class="d_none_sm"><i class="fa fa-arrows-alt"></i></li>
                            <li class="user-dropdown">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                           $data = Sentinel::check(); 
                                   ?>
                                <img src="{{url('/')}}/public/image/{{$data->image}}" alt="" class="img-fluid">
                            </button>
                            <div class="dropdown-menu dropdown_user" aria-labelledby="dropdownMenuButton" >
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="user_img mb-3">
                                        <img src="{{url('/')}}/public/image/{{$data->image}}" alt="User Image">
                                    </div>
                                    <div class="user_bio text-center">
                                        <p class="name font-weight-bold mb-0">{{$data->first_name}}</p>
                                        <p class="email text-muted mb-3"><a class="pl-3 pr-3" href="{{url('/')}}/myadmin/monica%40jhon.co.html">{{$data->email}}</a></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{url('/')}}/user/view_profile"><i class="fa fa-user"></i> Profile</a>
                                <span role="separator" class="divider"></span>
                                <a class="dropdown-item" href="{{url('/')}}/logout"><i class="fa fa-sign-out"></i>Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!--==================================*
                     End Notification Section
            *====================================-->
        </div>

    </div>
    <!--==================================*
               End Header Section
    *====================================-->