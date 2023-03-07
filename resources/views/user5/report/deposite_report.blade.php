       @include('user5.common.header')


       @include('user5.common.sidebar')

       <?php
          $data_setting = DB::table('setting')->first();
          $user = Sentinel::check();     
           ?>

    
   
     
        
 
  <!-- main page content -->
        <div class="main-container container">


          <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row">
                   <div class="ms-auto">
                         @if(count($errors)>0)

                    <div class="alert alert-danger">

                      <!-- <button class="close" type="button" data-dismiss="alert">x</button> -->
                      <ul>
                          @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>
                          
                          @endforeach
                      </ul>
                    </div>
                  @endif
                     @include('user4.common.operation_status')
                    </div>


                <!--end breadcrumb-->
               <center><h6 class="mb-0 text-uppercase">@if(isset($_GET['title'])){{$_GET['title']}}@endif </h6></center> 
                <hr/>
             <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                   <tr>
                                                      <th>NO</th>
                                                       <th>Reciver</th>
                                                      <!-- <th>Reciver</th> -->
                                                      <!--  <th>Reciver Name</th> -->

                                                      <th>Amount</th>
                                                     <!--  <th>Package</th> -->
                                                      <th>Status</th>
                                                      <th>Date</th>
                                                     <!--  <th>Status</th> -->
                                                    </tr>
                                </thead>
                                <tbody>
                                     <?php $i =0;?>
                              
                                  @foreach($data as $arr_data)
                                     <tr>
                                    <td>{{$i =$i+1}}</td>
                                    
                                      <td>{{$arr_data->reciver}}</td>

                                    <!--   <td>{{$arr_data->reciver}}</td> -->
                                      <?php $data    = DB::table('users')
                                                      ->where('email','=',$arr_data->reciver)
                                                        ->first();?>

                                     <!--  <td>{{$data->first_name}}</td> -->
                                      <td>{{$arr_data->amount}}GRM</td>
                                   <!--    <td>{{$arr_data->package}}$</td> -->
                                      <td>{{$arr_data->approval}}</td>
                                      
                                      <td>{{$arr_data->date}}</td>
                                     <!--  <td>{{$arr_data->status}}</td> -->
                                   
                                   </tr>
                               @endforeach
                                </tbody>
                                <tfoot>
                                   <!--  <tr>
                                                      <th>NO</th>
                                                      <th>Sender</th>
                                                     
                                                       <th>Reciver</th> 
                                                      <th>Reciver Name</th>
                                                      <th>Amount</th>
                                                       <th>Package</th>
                                                      <th>Approval</th>
                                                      <th>Date</th>
                                                      <th>Status</th>
                                                    </tr> -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
                
            </div>    
        </div>   
    </div>
  
    <!-- Menubar -->
  <!-- Menubar -->

    <!-- Theme Color Settings -->
 
  <!-- Theme Color Settings End -->
</div>


    
         </main>
        <!-- Page ends-->

 

       @include('user5.common.footer')
