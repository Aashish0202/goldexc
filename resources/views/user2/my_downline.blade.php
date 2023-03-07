   @include('user2.common.header')

    <!-- Sidebar -->
    @include('user2.common.sidebar')


     @yield('content')


   <body>

    <!--==================================*
               Main Content Section
    *====================================-->
    <div class="main-content page-content">

        <!--==================================*
                   Main Section
        *====================================-->
        <div class="main-content-inner">
            <div class="row">
                <!-- Textual inputs -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-8">
                                <h4 class="card_title">@if(isset($_GET['title'])){{$_GET['title']}}@endif Report</h4>
                            </div>
                            <div class="col-4">

                              
                            </div>
                           </div>
                             <!-- form start -->
                             <div style="overflow-x:auto;">

                                <table class="table table-bordered table-striped">
                       
                                  <tr>
                                      <th>User Name</th>
                                      <th>User ID</th>
                                      <th>Sponcer ID</th>
                                      <th>Status</th>
                                      <th>Level</th>
                                      
                                     
                                  </tr>
                             
                              
                                  @foreach($per_arr_data as $arr_data)

                                   <tr>
                                     <td>{{$arr_data['first_name']}}</td>
                                   
                                      <td>{{$arr_data['user_id']}}</td>
                                      <td>{{$arr_data['sponcer_id']}}</td>
                                      <td>{{$arr_data['is_active']}}</td>
                                      <td>{{$arr_data['level']}}</td>
                                     
                                   </tr>

                                  @endforeach

                                  
                        
                        
                                 </table>
                                  
                            </div>
                          
                            
                        </div>
                    </div>
                </div>
                <!-- Textual inputs -->
            </div>
           
        </div>
        <!--==================================*
                   End Main Section
        *====================================-->
    </div>
    <!--=================================*
           End Main Content Section
    *===================================-->

</body>
 
  
    @include('user2.common.footer')