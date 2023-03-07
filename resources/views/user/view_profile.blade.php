
 	<!-- Header -->
    @include('user.common.header')

    <!-- Sidebar -->
    @include('user.common.sidebar')


     @yield('content')

<?php
  
       $user = DB::table('setting')
                  ->first();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Identicard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Identicard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  <b style="color:blue;"> User Id   :</b>{{$data->email}}  
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    
                    <div class="col-7">
                      <h2 class="lead"><b></b></h2>
                      <p class="text-muted text-sm" ><b style="color:blue;">About   :</b>{{$user->site_name}}   </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building" style="color:blue;">:</i></span>    {{$data->address}}</li><br>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone" style="color:blue;">:</i></span>    {{$data->mobile}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                       @if($data->image)
                      <img src="{{url('/')}}/public/image/{{$data->image}}" alt="user-avatar" class="img-circle img-fluid" style="height:150px;width:150px; object-position: center" >
                      @else
                      <img src="{{url('/')}}/public/profile_image/user2.jpg" alt="user-avatar" class="img-circle img-fluid" style="height:150px;width:150px; object-position: center" >
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 



 	<!-- footer -->
    @include('user.common.footer')

 