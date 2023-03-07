              

              <?php
           $user = Sentinel::check();

                     $data_setting = DB::table('setting')->first();
                    
                    $Package   = DB::table('transaction')
                                ->where('reciver', '=', $user->email)
                                ->where('reason', '=', 'activate_package')
                                 ->SUM('amount');
           ?>       
<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="theme-color" content="#2196f3">
    <meta name="author" content="First Powerful Blockchain based ROI plan 100% Automatic System." /> 
    <meta name="keywords" content="First Powerful Blockchain based ROI plan 100% Automatic System." /> 
    <meta name="robots" content="First Powerful Blockchain based ROI plan 100% Automatic System." /> 
    <meta name="description" content="BITBNS"/>
    <meta property="og:title" content="BITBNS" />
    <meta property="og:description" content="BITBNS" />
    <meta property="og:image" content="social-image.png"/>
    <meta name="format-detection" content="telephone=no">
    
    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}" />
    
    <!-- Title -->
    <title>{{$data_setting->site_name}}</title>
    
    <!-- PWA Version -->
    <link rel="manifest" href="{{url('/')}}/manifest.json">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/new_theme/assets/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/new_theme/assets/vendor/swiper/swiper-bundle.min.css">
    




    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

</head>

 <header class="header transparent">
        <div class="main-bar">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">

                        <a href="javascript:void(0);" class="menu-toggler">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M16.0755 2H19.4615C20.8637 2 22 3.14585 22 4.55996V7.97452C22 9.38864 20.8637 10.5345 19.4615 10.5345H16.0755C14.6732 10.5345 13.537 9.38864 13.537 7.97452V4.55996C13.537 3.14585 14.6732 2 16.0755 2Z" fill="#a19fa8"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="#a19fa8"/>
                            </svg>
                        </a>
                    </div>
                            @if($user->is_active =='active')
                                                               
                             <center ><h6 class="user-name mb-0 text-success">
                                

                                <b ><i class='bx bxs-check-shield '></i> {{$user->is_active}}</b></h6></center>

                               @else

                               <h6 class="user-name mb-0 text-danger">

                                <center ><b> <i class='bx bxs-check-shield'></i> {{$user->is_active}}</b></h6></center>

                              @endif    
                    <div class="mid-content">
                    </div>
                   <div class="right-content">
                       
                           
                        <a href="javascript:void(0);" class="theme-btn">
                            <svg class="dark" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"   stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                            </svg> 
                        <svg class="light" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                        </a>
                    </div>
                     <div class="dz-media media-45 rounded-circle">
                <a href="#"><img src="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}" class="rounded-circle" alt="author-image"></a>                
            </div>
            <a href="{{url('/')}}/user/dashboard" class="nav-link active">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="#fff"></path>
                </svg>
            </a> 

                </div>

            </div>
        </div>
    </header>

 <!-- Banner -->
    <div class="banner-wrapper author-notification">
        <div class="container inner-wrapper">
            <div class="dz-info">
                <span>CHANGE LIFE WITH BIT BNS</span>
                <h4 style="font-family: monospace; " class="name mb-0">USER : {{$user->first_name}}</h4>
            </div>

            <?php 
            	

                $package = DB::table('transaction')->where('reciver','=',$user->email)->where('reason','=','activate_package')->SUM('amount');

                
                
                
               
                

            ?>
           		 
                 <center><h6 class="mb-1"><b>My Package</b></h6>

                                @if($Package > 0)
                                <p class="mb-0">{{$package}}TRX</p>
                                @else
                                <p class="mb-0">Package Not Active</p>
                                @endif

                </center>
        </div>
    </div>
    <!-- Banner End -->
    
    