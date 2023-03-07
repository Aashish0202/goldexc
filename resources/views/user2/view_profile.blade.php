
  <!-- Header -->
    @include('user2.common.header')

    <!-- Sidebar -->
    @include('user2.common.sidebar')


     @yield('content')

     <?php $data_setting = DB::table('setting')->first(); ?>

  <!--==================================*
               Main Content Section
    *====================================-->
    <div class="main-content page-content">

        <!--==================================*
                   Main Section
        *====================================-->
        <div class="main-content-inner">
            <div class="profile_page">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cover-profile">
                            <div class="profile-bg-img" style="background: url('{{url('/')}}/myadmin/assets/images/lock-bg.jpg') no-repeat;">
                                <div class="card-block user-info">
                                    <div class="col-md-12">
                                        <div class="media-left">
                                            <a href="#" class="profile-image">
                                            @if($data->image)
                                                <img class="user-img img-radius" src="{{url('/')}}/public/image/{{$data->image}}" alt="user-img" style="height:150px; width:150px;">
                                            @else
                                                <img src="{{url('/')}}/public/profile_image/user2.jpg" alt="user-avatar" class="img-circle img-fluid" style="height:150px;width:150px; object-position: center" >
                                            @endif
                                                <h2>{{$data->email}}</h2>
                                            </a>
                                        </div>
                                        <div class="media-body row">
                                            <div class="col-lg-12">
                                                <div class="user-title">
                                                   
                                                  
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <div class="tab-header card mb-4">
                            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#personal" role="tab" aria-expanded="true">Personal Info</a>
                                    <div class="slide"></div>
                                </li>
                             
                            </ul>
                        </div> -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal" role="tabpanel" aria-expanded="true">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card_title mb-0">About Me</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="view-info">
                                            <div class="general-info">
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table m-0">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">About:</th>
                                                                    <td> Member of {{$data_setting->site_name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Address</th>
                                                                    <td>{{$data->address}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Phone </th>
                                                                    <td>{{$data->mobile}}</td>
                                                                </tr>
                                                                
                                                                </tbody>
                                                            </table>
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
        <!--==================================*
                   End Main Section
        *====================================-->
    </div>
    <!--=================================*
           End Main Content Section
    *===================================-->
  <!-- /.content-wrapper -->
 



  <!-- footer -->
    @include('user2.common.footer')

 