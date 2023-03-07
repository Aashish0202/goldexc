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

                <h6 class="mb-0 text-uppercase">@if(isset($_GET['title'])){{$_GET['title']}}@endif</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                   <tr>
                                                      <th>NO</th>
                                                      @if($_GET['reason'] == "level_roi")
                                                       <th>Sender</th>
                                                       @endif
                                                      
                                                      <th>Reciver</th>

                                                      <th>Package</th>

                                                       <th>Daily Gold Yeild</th>
                                                       @if($_GET['reason'] == "roi")
                                                       <th>Days</th>
                                                       @else
                                                       <th>Level</th>
                                                       @endif
                                                      
                                                      <th>Approval</th>
                                                      <th>Date</th>
                                                      <th>Type</th>
                                                      <th>Action</th>
                                                    </tr>
                                </thead>
                                <tbody>
                                     <?php $i =0;?>
                              
                                  @foreach($data as $arr_data)
                                     <tr>
                                       <td>{{$i =$i+1}}</td>
                                    @if($_GET['reason'] == "level_roi")
                                      <td>{{$arr_data->sender}}</td>
                                      @endif

                                      <?php $data    = DB::table('users')
                                                      ->where('email','=',$arr_data->reciver)
                                                        ->first();?>

                                   
                                     
                                      <td>{{$arr_data->reciver}}</td>
                                      <td>{{$arr_data->package}} GRM</td>
                                      @if($_GET['reason'] == "roi")
                                      <?php 

                                      $multiplyer =1;

                                      $self_active = DB::table('transaction')
                                        ->where('reciver','=',$arr_data->reciver)
                                        ->where('approval','=','completed')
                                        ->where('reason','=','activate_package')
                                        ->first();                          

                                        if(isset($self_active))
                                        {
                                          $self_activation_date = $self_active->date;
                                         $booster_date = date("Y-m-d", strtotime('+ '.'1 days' , strtotime($self_activation_date)));                            

                                          $booster_data = DB::table('transaction')
                                          ->where('reason','=','level_roi')
                                          ->where('level','=','1')
                                          ->where('reciver','=',$arr_data->reciver)
                                          ->where('date','<',$booster_date)
                                          ->get();

                                          foreach ($booster_data as $key => $value) {
                                            // code...
                                            if($value->package >= $self_active->package)
                                            {
                                              $multiplyer = 2;
                                            }
                                          }

                                        

                                      }


                                      ?>
                                    <td>{{($arr_data->amount*(($arr_data->percentage*$multiplyer)/100))}} GRM  @if($multiplyer > 0) BOOSTER @endif</td> 
                                    @else
                                    <td>{{$arr_data->amount}} GRM</td> 
                                    @endif   

                                    @if($_GET['reason'] == "roi")
                                    <td>{{($arr_data->level/$multiplyer)}}</td> 
                                    @else
                                      <td>{{$arr_data->level}}</td> 
                                    @endif
                                       
                                    @if($_GET['reason'] == "level_roi")
                                      <td>@if($arr_data->approval == "completed") Qualified @else Unqualified @endif</td>
                                    @else
                                      <td>{{$arr_data->approval}}</td>

                                    @endif  
                                      <td>{{$arr_data->date}}</td>
                                      <td>{{$arr_data->status}}</td>


                                      @if($_GET['reason'] == "level_roi")
                                       <td>
                                     <a href="https://goldexchange.store/user/level_roi_daily?reason=roi&trans_id={{$arr_data->id}}">  
                                     
                                       <button class="btn btn-primary">History</button>   </a> </td>
                                      @else
                                      <td>
                                        <a href="https://goldexchange.store/user/roi_daily_report?reason=roi&trans_id={{$arr_data->id}}"> <button class="btn btn-primary">History</button> </a> </td>
                                      @endif
                                   
                                   </tr>
                               @endforeach
                                </tbody>
                                <tfoot>
                                                    
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
