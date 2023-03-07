
		<?php
          $data_setting = DB::table('setting')->first();

              
         ?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- BootStrap Link -->
    <link rel="stylesheet" href="{{url('/')}}/frontend3/assets/css/bootstrap.min.css">

    <!-- Icon Link -->
    <link rel="stylesheet" href="{{url('/')}}/frontend3/assets/css/all.min.css">
    <link rel="stylesheet" href="{{url('/')}}/frontend3/assets/css/line-awesome.min.css">

    <!-- Plugings Link -->
    <link rel="stylesheet" href="{{url('/')}}/frontend3/assets/css/animate.css">
    <link rel="stylesheet" href="{{url('/')}}/frontend3/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('/')}}/frontend3/assets/css/nice-select.css">
    <link rel="stylesheet" href="{{url('/')}}/frontend3/assets/css/odometer.css">
    <link rel="stylesheet" href="{{url('/')}}/frontend3/assets/css/slick.css">

    <!-- Custom Link -->
    <link rel="stylesheet" href="{{url('/')}}/frontend3/assets/css/main.css">
    <link rel="shortcut icon" href="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}" type="image/x-icon">

    <title>{{$data_setting->site_name}}</title>

</head>
<body>
    <!-- preloader -->
   <!--  <div class="loader-bg">
        <div class="loader-p"></div>
    </div> -->

    <div class="overlay"></div>

    <!-- Header Section Starts Here -->
    <header class="header">
        <div class="header-bottom">
            <div class="container">
                <div class="header-area">
                    <div class="logo">
                        <a href="#">
                            <img src="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}"  alt="logo">
                        </a>
                    </div>
                    <div class="header-trigger d-block d-lg-none">
                        <span></span>
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li>
                           <a href="#income">Types of Income</a>
                        </li>
                        
                       <!--  <li>
                            <a href="#0">Pages</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="user-dashboard.html">User Dashboard</a>
                                </li>
                                <li>
                                    <a href="investor.html">Investor</a>
                                </li>
                                <li>
                                    <a href="affiliate.html">Affiliate</a>
                                </li>
                                <li>
                                    <a href="mission-vision.html">Mission & Vision</a>
                                </li>
                                <li>
                                    <a href="privacy-policy.html">Privacy & Policy</a>
                                </li>
                                <li>
                                    <a href="terms-of-service.html">Terms Of Service</a>
                                </li>
                                <li>
                                    <a href="refund-policy.html">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="faq.html">Faq</a>
                                </li>
                                <li>
                                    <a href="404.html">404</a>
                                </li>
                                <li>
                                    <a href="#0">Account</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="login.html">Log In</a>
                                        </li>
                                        <li>
                                            <a href="sign-up.html">Sign Up</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#0">Blog</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="blog.html">Blog</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">Blog Details</a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                         <li>
                           <a href="{{url('/')}}/login" class="cmn--btn">Login</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/resistration" class="cmn--btn">Registration</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section Ends Here -->


    <!-- Banner Section Starts Here -->
    <section class="banner-section bg_img" style="background: url({{url('/')}}/frontend3/assets/images/banner/bg.png) center bottom;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  d-none d-lg-block">
                    <div class="banner-thumb">
                        <img src="{{url('/')}}/frontend3/assets/images/banner/thumb.png" alt="banner">
                        <div class="shapes ">
                            <div class="shape2">
                                <img src="{{url('/')}}/frontend3/assets/images/banner/shape1.png" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="banner-content">
                        <h1 class="text--base" >Welcome <span class="banner-title">To </span><span> {{$data_setting->site_name}}</span></h1>
                        <span class="subtitle">Make the People money Productive and Financially strong by Introducing smart concept for every Individuals to succees in your Mission </span>
                        <div class="button-group d-flex flex-wrap align-items-center">
                            <a href="{{url('/')}}/login" class="cmn--btn btn--secondary">Login</a>
                           
                            <a href="{{url('/')}}/resistration" class="cmn--btn btn--secondary">Registration</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section Ends Here -->


    <!-- How it Works Section Starts Here -->
    <section class="how-work padding-top padding-bottom">
        <div class="container">
            <div class="row justif-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="how-work-left-content">
                       <div class="section-header wow fadeInUp">
                            <span class="subtitle">How to Do It</span>
                            <h2 class="title"> easy 3 step to Start</h2>
                            <p>Send and receive with absolute freedom and control. No minimums, maximums, or extra fees.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row align-items-center gy-4">
                        <div class="col-md-6 col-sm-6">
                            <div class="row gy-4">
                                <div class="col-12 wow fadeInUp" data-wow-delay=".2s">
                                    <div class="how-work-item">
                                        <div class="how-work-item-thumb theme-one">
                                            <i class="las la-atlas"></i>
                                        </div>
                                        <div class="how-work-item-content">
                                            <h4 class="title"><a href="#">Quick Registration</a></h4>
                                            <!-- <p>Consectetuer ante fringilla amet nunc ut at duis anteultricies.</p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="how-work-item gradient-two">
                                        <div class="how-work-item-thumb theme-two">
                                            <i class="las la-hand-holding-usd"></i>
                                        </div>
                                        <div class="how-work-item-content">
                                            <h4 class="title"><a href="#">Make An Deposit </a></h4>
                                           <!--  <p>Consectetuer ante fringilla amet nunc ut at duis anteultricies.</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                            <div class="how-work-item gradient-four">
                                <div class="how-work-item-thumb theme-four">
                                    <i class="las la-wallet"></i>
                                </div>
                                <div class="how-work-item-content">
                                    <h4 class="title"><a href="#">Get Your Profit</a></h4>
                                   <!--  <p>Consectetuer ante fringilla amet nunc ut at duis anteultricies.</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How it Works Section Ends Here -->


    <!-- Sponsor Section Starts Here -->
    <!-- <div class="sponsor-section wow fadeInUp">
        <div class="container">
            <div class="sponsor-slider">
                <div class="single-slide">
                    <div class="brand-item">
                        <img src="{{url('/')}}/frontend3/assets/images/sponsor/item1.png" alt="">
                    </div>
                </div>
                <div class="single-slide">
                    <div class="brand-item">
                        <img src="{{url('/')}}/frontend3/assets/images/sponsor/item2.png" alt="">
                    </div>
                </div>
                <div class="single-slide">
                    <div class="brand-item">
                        <img src="{{url('/')}}/frontend3/assets/images/sponsor/item3.png" alt="">
                    </div>
                </div>
                <div class="single-slide">
                    <div class="brand-item">
                        <img src="{{url('/')}}/frontend3/assets/images/sponsor/item4.png" alt="">
                    </div>
                </div>
                <div class="single-slide">
                    <div class="brand-item">
                        <img src="{{url('/')}}/frontend3/assets/images/sponsor/item5.png" alt="">
                    </div>
                </div>
                <div class="single-slide">
                    <div class="brand-item">
                        <img src="{{url('/')}}/frontend3/assets/images/sponsor/item6.png" alt="">
                    </div>
                </div>
                <div class="single-slide">
                    <div class="brand-item">
                        <img src="{{url('/')}}/frontend3/assets/images/sponsor/item2.png" alt="">
                    </div>
                </div>
                <div class="single-slide">
                    <div class="brand-item">
                        <img src="{{url('/')}}/frontend3/assets/images/sponsor/item4.png" alt="">
                    </div>
                </div>
                <div class="single-slide">
                    <div class="brand-item">
                        <img src="{{url('/')}}/frontend3/assets/images/sponsor/item1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Sponsor Section Ends Here -->
  <!-- Payment Gateway Section Starts Here -->
    <section class="payment-gateway padding-bottom">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-5">
                    <div class="section-header">
                        <h2 class="title  wow fadeInUp" style="color: #2e6391;" data-wow-delay=".5s">Announcement-I</h2>
                        <h6 class="wow fadeInUp" data-wow-delay=".6s">
                            1) First Powerful solana based Autopool plan 100%         Automatic System.<br><br>
                            2) GrowF Token Launching Soon
                        </h7>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight">
                    <div class="payment-gateway-slider">
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/ic1.png" alt="gateway">
                                <span class="coin-name">SOLANA</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/ic3.png" alt="gateway">
                                <span class="coin-name">Bitcoin</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/ic4.png" alt="gateway">
                                <span class="coin-name">GrowF</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/ic2.png" alt="gateway">
                                <span class="coin-name">USDT</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/ic5.png" alt="gateway">
                                <span class="coin-name">TRX</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Payment Gateway Section Ends Here -->

<!-- <div class="col-md-12">
   <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="section-header text-center">
                        <span class="subtitle wow fadeInUp">Announcement</span>
                        <h2 class="title wow fadeInUp" data-wow-delay=".4s">first powerful solana based Autopool plan 100% Automatic System</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            

                        </p>
                    </div>
                </div>

                  <div class="col-md-6">
                      
                       <img src="{{url('/')}}/frontend3/assets/images/feature/gr.png" alt="feature" style=" width:90%;     margin-left: 7%;">
                  </div>
            </div>
</div> -->
    <!-- Feature Section STarts Here -->
    <section class="feature-section padding-top " id="about" >
        <div class="container">
            <div class="row align-items-center gy-5 ">
                <div class="col-lg-6 col-md-10 wow fadeInLeft d-none d-lg-block" >
                    <div class="feature-thumb">
                        <img src="{{url('/')}}/frontend3/assets/images/feature/thumb.png" alt="feature">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight ">
                    <div class="feature-content">
                        <div class="section-header">
                            <span class="subtitle">awesome features</span>
                            <h2 class="title">{{$data_setting->site_name}}</h2>
                            <p> 
                                GrowFire is a Solana Base project that aims to bring together various organizations and individuals.
                            </p>
                        </div>
                        <h3 class="title-two">Types Of Income</h3>
                       
                        <ul class="feature-info-list">
                            <li>Direct Income</li>
                            <li>Team Booster Income</li>
                             <li>Level Income</li>
                            <li>Auto Pool Income</li>
                            <li>Direct Sponsor Bonus Income</li>
                            <li>Club Income</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section Ends Here -->


    <!-- Plan Section Starts Here -->
    <section class="plan-section padding-top" id="income">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-header text-center">
                        <span class="subtitle wow fadeInUp">choose your plan</span>
                        <h2 class="title wow fadeInUp" data-wow-delay=".4s">best Crowdfunding platform for your profit</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            Crowdfunding is the use of small amounts of capital from a large number of individuals to finance a new business venture. Depending on the type of crowdfunding, investors either donate money altruistically or get rewards such as equity in the company that raised the money.

                        </p>
                    </div>
                </div>
            </div>
           <center><h4 class="">BRONZE</h4></center> 
            <div class="plan-wrapper row g-4 mt-2">
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".1s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $14
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $28
                                </li>
                            </ul>
                        </div>
                        
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".2s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $14
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $56
                                </li>
                            </ul>
                        </div>
                        
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                 <center><h4 class="mt-5">GRAND BRONZE</h4></center> 
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".3s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $30
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $60
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".4s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income :$30
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $120
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <center><h4 class="mt-5">SILVER</h4></center>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".2s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $60
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $120
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                 <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".4s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $60.00
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $240
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                 <center><h4 class="mt-5">GRAND SILVER</h4></center>
                 <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".3s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $120
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $240
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>

                    </div>
                </div>
                 <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".2s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $120
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $480
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <center><h4 class="mt-5">GOLD</h4></center>
                 <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".1s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $240
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $480
                                </li>
                            </ul>
                        </div>
                        
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".2s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $240
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $960	
                                </li>
                            </ul>
                        </div>
                        
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                 <center><h4 class="mt-5">GRAND GOLD</h4></center>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".3s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $480
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $960
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".4s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $480
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $1920
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <center><h4 class="mt-5">PLATINUM</h4></center>
                 <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".1s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $960
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $1920
                                </li>
                            </ul>
                        </div>
                        
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".2s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $960
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $3840
                                </li>
                            </ul>
                        </div>
                        
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                 <center><h4 class="mt-5">GRAND PLATINUM</h4></center>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".3s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $1920
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $3840
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".4s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $1920
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $7680
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>

                 <center><h4 class="mt-5">DIAMOND</h4></center>
                 <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".1s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $3840
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $7680
                                </li>
                            </ul>
                        </div>
                        
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".2s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $3840
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $15360
                                </li>
                            </ul>
                        </div>
                        
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <center><h4 class="mt-5">GRAND DIAMOND</h4></center>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".3s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $7680
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $15360
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".4s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $7680
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $30720	
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>

                 <center><h4 class="mt-5">ACE</h4></center>
                 <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".1s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $15360	
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $30720	
                                </li>
                            </ul>
                        </div>
                        
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".2s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                        <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $15360
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $61440
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                 <center><h4 class="mt-5">GRAND ACE</h4></center>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".3s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 1</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">02 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $30720
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $61440
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <div class="plan-item wow fadeIn" data-wow-delay=".4s">
                        <div class="plan-inner-part">
                            <h2 class="plan-interest-percent">Level 2</h2>
                        </div>
                         <div class="plan-inner-part">
                            <h2 class="plan-invest-time">04 <sub>TEAM</sub></h2>
                        </div>
                        <div class="plan-inner-part">
                            <ul class="plan-invest-limit">
                                <li>
                                    <i class="fas fa-check"></i>
                                    Income : $30720
                                </li>
                                <li>
                                    <i class="fas fa-check"></i>
                                    Total : $122880
                                </li>
                            </ul>
                        </div>
                       
                        <div class="plan-inner-part">
                            <a href="{{url('/')}}/resistration" class="cmn--btn-2">Deposit  now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="button text-center wow slideIn pb-4">
                <a href="#" class="cmn--btn">Discover More</a>
            </div>
        </div>
    </section>
    <!-- Plan Section Ends Here -->


    <!-- Counter Section Starts Here -->
    <section class="counter-section padding-top">
        <div class="container">
            <div class="row justif-content-center gy-5">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-wrapper">
                        <div class="counter-item">
                            <div class="counter-inner">
                                <h2 class="counter-sign">$ </h2>
                                <span class="odometer title" data-odometer-final="557"></span>
                                <h2 class="counter-sign">K</h2>
                            </div>
                        </div>
                        <span class="info">Invested in Doller</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-wrapper">
                        <div class="counter-item">
                            <div class="counter-inner">
                                <span class="odometer title" data-odometer-final="254"></span>
                                <h2 class="counter-sign">K</h2>
                            </div>
                        </div>
                        <span class="info">Registrated Members</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-wrapper">
                        <div class="counter-item">
                            <div class="counter-inner">
                                <span class="odometer title" data-odometer-final="774"></span>
                                <h2 class="counter-sign">K</h2>
                            </div>
                        </div>
                        <span class="info">Average Investment</span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-wrapper">
                        <div class="counter-item">
                            <div class="counter-inner">
                                <span class="odometer title" data-odometer-final="7740"></span>
                                <h2 class="counter-sign">K</h2>
                            </div>
                        </div>
                        <span class="info">Total Investment Plan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section Ends Here -->


    <!-- Why Choose Us Section Starts Here -->
    <section class="choose-us-three padding-top padding-bottom overflow-hidden">
        <div class="container">
            <div class="row gy-5">
                <div class="col-xl-6 col-lg-5 d-none d-lg-block wow slideInLeft">
                    <div class="choose-us-thumb">
                        <img src="{{url('/')}}/frontend3/assets/images/choose-us/thumb.png" alt="choose-us">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="choose-us-right-content">
                        <div class="section-header">
                            <span class="subtitle wow fadeInUp">WHY CHOOSE US</span>
                            <h2 class="title wow fadeInUp" data-wow-delay=".5s">Why You Should Stay With Us</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">
                                Securing digital assets doesn't have to be difficult
                            </p>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{url('/')}}/frontend3/assets/images/choose-us/lock.png" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">High Security</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{url('/')}}/frontend3/assets/images/choose-us/live-chat.png" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">Live Chat</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{url('/')}}/frontend3/assets/images/choose-us/business-ico.png" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">Free Transection</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{url('/')}}/frontend3/assets/images/choose-us/user.png" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">Supper Dashboard</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{url('/')}}/frontend3/assets/images/choose-us/lock.png" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">Support 24/7</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{url('/')}}/frontend3/assets/images/choose-us/lock2.png" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">High-availability</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Section Ends Here -->


    <!-- Testimonial Section Starts Here -->
   <!--  <section class="testimonial-seciton pb-180">
        <div class="container">
            <div class="row gy-4 align-items-center justify-content-center">
                <div class="col-lg-5 d-none d-lg-block  wow slideInLeft">
                    <div class="testimonial-thumb">
                        <img src="{{url('/')}}/frontend3/assets/images/testimonial/thumb2.png" alt="testimonial">
                    </div>
                </div>
                <div class="col-lg-7 col-md-10">
                    <div class="testimonial-content">
                        <div class="section-header text-center">
                            <span class="subtitle wow fadeInUp">our happly client</span>
                            <h2 class="title wow fadeInUp" data-wow-delay=".5s">Discover Our Happy 
                                Client Feedback</h2>
                        </div>
                        <div class="testimonial-slider-wrapper">
                           <div class="testimonial-img">
                                <div class="testimonial-img-slider">
                                    <div class="img-item">
                                        <img src="{{url('/')}}/frontend3/assets/images/testimonial/item1.png" alt="testimonial">
                                    </div>
                                    <div class="img-item">
                                        <img src="{{url('/')}}/frontend3/assets/images/testimonial/item1.png" alt="testimonial">
                                    </div>
                                    <div class="img-item">
                                        <img src="{{url('/')}}/frontend3/assets/images/testimonial/item1.png" alt="testimonial">
                                    </div>
                                </div>
                           </div>
                            <div class="testimonial-slider">
                                <div class="content-item">
                                    <div class="quote-icon">
                                        <i class="las la-quote-left"></i>
                                    </div>
                                    <div class="content-inner">
                                        <p>
                                        Pipsum dolor sit, amet  adipisicing elit. Molestiae similique facere quia! Eligendi, eveniet aut impedit deleniti autem obcaecati ni
                                        </p>
                                        <h5 class="name">Robindronath Chondro</h5>
                                        <span class="designation">Businessman</span>
                                    </div>
                                </div>
                                <div class="content-item">
                                    <div class="quote-icon">
                                        <i class="las la-quote-left"></i>
                                    </div>
                                    <div class="content-inner">
                                        <p>
                                            Mattis vestibulum elit omnis metuseu urna at facilisi loborntum turpis velsed molestie varius purus rhoncus 
                                        </p>
                                        <h5 class="name">Jubayer Al Somser</h5>
                                        <span class="designation">Developer</span>
                                    </div>
                                </div>
                                <div class="content-item">
                                    <div class="quote-icon">
                                        <i class="las la-quote-left"></i>
                                    </div>
                                    <div class="content-inner">
                                        <p>
                                            Kikit Mattis vestibulum elit omnis metuseu urna at facilisi loborntum turpis velsed molestie varius purus rhoncus  incidunt ipsam soluta rem ipsum.
                                        </p>
                                        <h5 class="name">Raihan Rafuj</h5>
                                        <span class="designation">Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Testimonial Section Ends Here -->


    <!-- Help Section Starts Here -->
    <section class="help-section  overflow-hidden">
        <div class="container">
            <div class="row align-items-center gy-5 flex-column-reverse flex-lg-row">
                <div class="col-lg-6">
                    <div class="help-content">
                        <div class="section-header">
                            <span class="subtitle wow fadeInUp">we are ready for your help</span>
                            <h2 class="title wow fadeInUp" data-wow-delay=".5s">How We Can Help You?</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">
                                We Are Available 24*7
                            </p>
                        </div>
                        <div class="faq-tab-menu nav-tabs nav border-0 row g-4 justify-content-center">
                            <div class="col-6 col-sm-4 col-md-4 col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay=".2s">
                                <a href="#investor" class="item active" data-bs-toggle="tab">
                                    <div class="thumb">
                                        <img src="{{url('/')}}/frontend3/assets/images/help/trading.png" alt="">
                                    </div>
                                    <h5>Become an investor</h5>
                                </a>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay=".3s">
                                <a href="#privacy" class="item" data-bs-toggle="tab">
                                    <div class="thumb">
                                        <img src="{{url('/')}}/frontend3/assets/images/help/password.png" alt="">
                                    </div>
                                    <h5>our company privacy</h5>
                                </a>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay=".4s">
                                <a href="#account" class="item" data-bs-toggle="tab">
                                    <div class="thumb">
                                        <img src="{{url('/')}}/frontend3/assets/images/help/support.png" alt="">
                                    </div>
                                    <h5>how setting account</h5>
                                </a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane show fade active" id="investor">
                                <div class="faq-wrapper">
                                    <div class="faq-item wow fadeInUp" data-wow-delay=".3s">
                                        <div class="faq-title">
                                            <h5 class="title">TOTAL HOW MANY POOL</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Total 12 pool INCOME 24 Months 266196$
                                            </p>
                                        </div>
                                    </div>
                                    <div class="faq-item open active wow fadeInUp" data-wow-delay=".4s">
                                        <div class="faq-title">
                                            <h5 class="title">TOTAL SPONSER BONUSE</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Total sponser bonus In 24 month 40955$ 
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane show fade" id="privacy">
                                <div class="faq-wrapper">
                                    <div class="faq-item wow fadeInUp" data-wow-delay=".3s">
                                        <div class="faq-title">
                                            <h5 class="title">TOTAL HOW MANY POOL</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Total 12 pool INCOME 24 Months 266196$
                                            </p>
                                        </div>
                                    </div>
                                    <div class="faq-item open active wow fadeInUp" data-wow-delay=".4s">
                                        <div class="faq-title">
                                            <h5 class="title">TOTAL SPONSER BONUSE</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Total sponser bonus In 24 month 40955$ 
                                            </p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block wow fadeInRight">
                    <div class="help-thumb ">
                        <img src="{{url('/')}}/frontend3/assets/images/help/thumb.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Help Section Ends Here -->


    <!-- Affiliate Section Starts Here -->
    <section class="affiliate-section padding-top padding-bottom overflow-hidden">
        <div class="container">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-5 d-lg-block d-none wow fadeInLeft">
                    <div class="affiliate-thumb">
                        <img src="{{url('/')}}/frontend3/assets/images/affiliate/thumb.png" alt="affiliate">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="affiliate-content">
                        <div class="section-header">
                            <span class="subtitle  fadeInUp">Affiliate program</span>
                            <h2 class="title  fadeInUp" data--delay=".5s">Make Money By Affiliate </h2>
                        </div>
                        <div class="affilate-tab-menu row g-4">
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 tab-item  fadeInUp" data--delay=".3s" >
                                <div class="affiliate-tab-item">
                                    <div class="item-inner">
                                        <h3 class="percentage">35%</h3>
                                        <span class="serial">1st</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 tab-item  fadeInUp" data--delay=".4s" >
                                <div class="affiliate-tab-item">
                                    <div class="item-inner">
                                        <h3 class="percentage">05%</h3>
                                        <span class="serial">2nd</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 tab-item  fadeInUp" data--delay=".5s" >
                                <div class="affiliate-tab-item">
                                    <div class="item-inner">
                                        <h3 class="percentage">05%</h3>
                                        <span class="serial">3rd</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="affiliate-item-content">
                            <h4 class="title">What is Affiliate Marketing ?</h4>
                            <p> <a href="https://www.ukvalley.in"> Affiliate marketing </a> is the process of making money online every time a customer purchases a product based on your recommendation. This is an online sales tactic that allows you – ‘the affiliate’ – to earn a commission and helps the product owner increase sales. At the same time, it makes it possible for affiliates to earn money on product sales without creating products of their own.</p>
                            <a href="#" class="cmn--btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape">
            <img src="{{url('/')}}/frontend3/assets/images/affiliate/bg-map.png" alt="affiliate">
        </div>
    </section>
    <!-- Affiliate Section Ends Here -->


    <!-- Blog Section Start Here -->
  <!--   <section class="blog-section padding-bottom overflow-hidden">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-7">
                    <div class="section-header text-center">
                        <span class="subtitle wow fadeInUp">Hyip investment blog post</span>
                        <h2 class="title wow fadeInUp" data-wow-delay=".5s">Best Comunity Platform 
                            for investment</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            Praesent nibh aut vivamusad quis in tortor aenean ligula non lacinia quisque. Purus nunc tellus ac nulla praesent quis porttitor sit arcu congue auctor ut amet. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gy-4">
                <div class="col-lg-4 col-md-6 col-sm-10 wow slideInUp" data-wow-delay=".3s">
                    <div class="post-item">
                        <div class="post-thumb">
                            <a href="blog-details.html">
                                <img src="{{url('/')}}/frontend3/assets/images/blog/item1.png" alt="blog">
                            </a>
                        </div>
                        <div class="post-content">
                            <h4 class="post-title">
                                <a href="blog-details.html">Auctor gravida vestibulu</a>
                            </h4>
                            <ul class="meta-post">
                                <li>
                                    <a href="#0">
                                        <i class="las la-tag"></i>
                                        Investment
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="las la-calendar-check"></i>
                                        09 May 2020
                                    </a>
                                </li>
                            </ul>
                            <p>Phasellus nulla inceptos. vivamumnaametn quisque tortor. Integer lacu ornare cum.an ante nec situspendisse.</p>
                            <a href="blog-details.html" class="read-more-button">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 wow slideInUp" data-wow-delay=".4s">
                    <div class="post-item">
                        <div class="post-thumb">
                            <a href="blog-details.html">
                                <img src="{{url('/')}}/frontend3/assets/images/blog/item2.png" alt="blog">
                            </a>
                        </div>
                        <div class="post-content">
                            <h4 class="post-title">
                                <a href="blog-details.html">Auctor gravida vestibulu</a>
                            </h4>
                            <ul class="meta-post">
                                <li>
                                    <a href="#0">
                                        <i class="las la-tag"></i>
                                        Investment
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="las la-calendar-check"></i>
                                        09 May 2020
                                    </a>
                                </li>
                            </ul>
                            <p>Phasellus nulla inceptos. vivamumnaametn quisque tortor. Integer lacu ornare cum.an ante nec situspendisse.</p>
                            <a href="blog-details.html" class="read-more-button">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 wow slideInUp" data-wow-delay=".5s">
                    <div class="post-item">
                        <div class="post-thumb">
                            <a href="blog-details.html">
                                <img src="{{url('/')}}/frontend3/assets/images/blog/item3.png" alt="blog">
                            </a>
                        </div>
                        <div class="post-content">
                            <h4 class="post-title">
                                <a href="blog-details.html">Auctor gravida vestibulu</a>
                            </h4>
                            <ul class="meta-post">
                                <li>
                                    <a href="#0">
                                        <i class="las la-tag"></i>
                                        Investment
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="las la-calendar-check"></i>
                                        09 May 2020
                                    </a>
                                </li>
                            </ul>
                            <p>Phasellus nulla inceptos. vivamumnaametn quisque tortor. Integer lacu ornare cum.an ante nec situspendisse.</p>
                            <a href="blog-details.html" class="read-more-button">Read More...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Blog Section Ends Here -->


    <!-- Payment Gateway Section Starts Here -->
    <!-- <section class="payment-gateway padding-bottom">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-5">
                    <div class="section-header">
                        <h2 class="title wow fadeInUp" data-wow-delay=".5s">Choose Yor Payment 
                            Gateway</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            Risus et ut arcu sem nulla. Sit lacus lorem, sed turpis erat rhoncus nibh. Lacinia mauris vel, nibh sociis praesent aliquam proin, sit ut nec ultrices, odio lacus
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight">
                    <div class="payment-gateway-slider">
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/icon1.png" alt="gateway">
                                <span class="coin-name">Bitcoin</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/icon2.png" alt="gateway">
                                <span class="coin-name">Bitcoin</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/icon3.png" alt="gateway">
                                <span class="coin-name">Ethereum</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/icon4.png" alt="gateway">
                                <span class="coin-name">Ripple</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{url('/')}}/frontend3/assets/images/gateway/icon2.png" alt="gateway">
                                <span class="coin-name">Ethereum</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Payment Gateway Section Ends Here -->


    <!-- Profit Calculation Section Starts Here -->
   <!--  <section class="profit-calculation wow slideInUp overflow-hidden">
        <div class="container">
            <div class="profit-calculation-wrapper">
                <h3 class="title">Calculate How Much You Profit</h3>
                <form class="profit-form">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="form--group">
                                <select>
                                    <option value="plan01">Select the Plan</option>
                                    <option value="plan01">Business Plan</option>
                                    <option value="plan01">Professional Plan</option>
                                    <option value="plan01">Individual Plan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form--group">
                                <select>
                                    <option value="plan01">Select the Currency</option>
                                    <option value="plan01">Bitcoin</option>
                                    <option value="plan01">Ethereum</option>
                                    <option value="plan01">Ripple</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form--group">
                                <input type="text" class="form--control" placeholder="Enter the Ammount" required>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="profit-title-wrapper d-flex justify-content-between my-5 mb-3">
                    <h5 class="daily-profit text--secondary">Daily Profit - <span class="ammount">0.1200</span>BTC</h5>
                    <h5 class="daily-profit theme-four">Total Profit - <span class="ammount">24.1200</span>BTC</h5>
                </div>
                <div class="invest-range-area">
                    <div class="main-amount">
                        <input type="text" class="calculator-invest" id="btc-amount" readonly>
                    </div>
                    <div class="invest-amount" data-min="01 BTC" data-max="10000 BTC">
                        <div id="btc-range" class="invest-range-slider"></div>
                    </div>
                    <button type="submit" class="custom-button px-0">Invest now</button>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Profit Calculation Section Ends Here -->

    
    <!-- Footer Section Starts Here -->
   <section class="footer-section bg_img" id="contact" style="background: url({{url('/')}}/frontend3/assets/images/footer/bg.png) no-repeat center top;">
        <div class="container">
            <div class="row gy-5">
                <div class=" col-xl-4 col-lg-5 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="widget-title">Know About Us</h3>
                        <p>www.growfire.life</p>
                        <ul class="social-icons">
                           <!--  <li>
                                <a href="#0">
                                    <i class="lab la-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="lab la-twitter"></i>
                                </a>
                            </li> -->
                            <li>
                                <a href="https://youtube.com/channel/UCpfAC7nFYTr8J1K2T9MIwJw">
                                    <i class="lab la-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://t.me/GrowFireLife">
                                    <i class="lab la-telegram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-4 col-lg-4 col-md-4 col-sm-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">Company</h4>
                        <ul class="footer-links">
                            <li>
                                <a href="#">
                                    
                                <i class="las la-angle-double-right"></i>Home</a>
                            </li>
                            <li>
                                <a href="#about">
                                    
                                <i class="las la-angle-double-right"></i>About Us</a>
                            </li>
                            <li>
                                <a href="#income">
                                    
                                <i class="las la-angle-double-right"></i>Types of Income</a>
                            </li>
                            <li>
                                <a href="">
                                    
                                <i class="las la-angle-double-right"></i>Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
               
                <div class=" col-xl-4 col-lg-4 col-sm-6 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title">Contact Information</h4>
                        <ul class="contact-info">
                            <li>
                               <!--  India -->
                            </li>
                            <li>
                                growfirelife@gmail.com
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="text-center text-white pt-4 p-sm-5 pb-0">Copyright &copy; 2022. All Rights Reserved</p>
            </div>
        </div>
    </section>
    <!-- Footer Section Ends Here -->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62f0abaf37898912e961caf5/1g9u1t9n2';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

    <a href="#0" class="scrollToTop active"><i class="las la-chevron-up"></i></a>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{url('/')}}/frontend3/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('/')}}/frontend3/assets/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/frontend3/assets/js/jquery.ui.js"></script>
    <script src="{{url('/')}}/frontend3/assets/js/slick.min.js"></script>
    <script src="{{url('/')}}/frontend3/assets/js/wow.min.js"></script>
    <script src="{{url('/')}}/frontend3/assets/js/magnific-popup.min.js"></script>
    <script src="{{url('/')}}/frontend3/assets/js/odometer.min.js"></script>
    <script src="{{url('/')}}/frontend3/assets/js/viewport.jquery.js"></script>
    <script src="{{url('/')}}/frontend3/assets/js/nice-select.js"></script>
    <script src="{{url('/')}}/frontend3/assets/js/main.js"></script>
</body>


</html>