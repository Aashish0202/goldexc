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
    
    <!-- Data table CSS -->
    <link href="{{url('/')}}/new_theme/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    
    <link href="{{url('/')}}/new_theme/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
        
    <!-- Custom CSS -->
    <link href="{{url('/')}}/new_theme/doodle-demo/full-width-light/dist/css/style.css" rel="stylesheet" type="text/css">
</head>