
  <!-- Header -->
    @include('user1.common.header')

    <!-- Sidebar -->
    @include('user1.common.sidebar')


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
                                      <th>Sender</th>
                                      <th>Amount</th>
                                      <th>Package</th>
                                      <th>Approval</th>
                                      <th>Transaction<br>Created by</th>
                                      <th>Date</th>
                                      <th>Status</th>
                                  </tr>
                             
                              
                                  @foreach($data as $arr_data)

                                   <tr>
                                    
                                      <td>{{$arr_data->sender}}</td>
                                      <td>{{$arr_data->amount}}</td>
                                      <td>{{$arr_data->package}}</td>
                                      <td>{{$arr_data->approval}}</td>
                                      <td>{{$arr_data->sender}}</td>
                                      <td>{{$arr_data->date}}</td>
                                      <td>{{$arr_data->status}}</td>
                                   
                                   </tr>

                                  @endforeach

                                  
                        
                        
                                 </table>
                                 <div class="mt-3">
                                    {{$data->links("pagination::bootstrap-4")}}
                                 </div> 
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
 


  <!-- footer -->
   @include('user1.common.footer')
 
 