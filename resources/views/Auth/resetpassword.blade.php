
<!DOCTYPE html>
<html lang="en">
<?php $data =  DB::table('setting')
               ->first(); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/admin-lte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><img src="{{url('/')}}/public/site_logo/{{$data->site_logo}}" alt="AdminLTE Logo" style="width:100%"></a>
    </div>
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Reset password</b></a>
    </div>
    <div class="card-body">
      
        @include('user.common.operation_status ')
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
      <form onsubmit="return checkall()" action="{{url('/')}}/resetpassword_post" method="post">
         {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" id="password" name="password" class="form-control" placeholder="Enter new password here">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-key"></span>
            </div>
          </div>
         
        </div>
         <div id="err_email" class="text-danger"></div>
        

        <div class="input-group mb-3">
          <input type="text" id="c_password" name="c_password" class="form-control" placeholder="Enter confirm Password here">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-key"></span>
            </div>
          </div>
         
        </div>
         <div id="err_email" class="text-danger"></div>
        
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/bower_components/admin-lte/dist/js/adminlte.min.js"></script>

</body>
</html>
