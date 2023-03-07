                   <?php

           $user = Sentinel::check();

                     $data_setting = DB::table('setting')->first();


                    
                    ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 06:00:10 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$data_setting->site_desc}}">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>{{$data_setting->site_name}}</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{url('/')}}/fimobile/assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="{{url('/')}}/fimobile/assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="{{url('/')}}/fimobile/assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js">




    <!-- swiper carousel css -->
    <link rel="stylesheet" href="{{url('/')}}/fimobile/assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css">

    <!-- style css for this template -->
    <link href="{{url('/')}}/fimobile/assets/css/style.css" rel="stylesheet" id="style">
    <link href="{{url('/')}}/fimobile/assets/css/style1.css" rel="stylesheet" id="style">


    

</head>
    
    