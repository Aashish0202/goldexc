       @include('user5.common.header')


       @include('user5.common.sidebar')

       <?php
          $data_setting = DB::table('setting')->first();
          $user = Sentinel::check();     


          function decimal_notation($float) {
        $parts = explode('E', $float);

        if(count($parts) === 2){
            $exp = abs(end($parts)) + strlen($parts[0]);
            $decimal = number_format($float, $exp);
            return rtrim($decimal, '.0');
        }
        else{
            return $float;
        }
    }


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
                                                     
                                                      <th>Sender</th>
                                                      
                                                      <th>Reciver</th>

                                                      <th>Level</th>

                                                      <th>Package</th>

                                                      <th>Daily Gold Yeild</th>

                                                      <th>Total Earning</th>

                                                      <th>Day</th>
                                                      
                                                      <th>Approval</th>


                                                      <th>Date</th>


                                                      <th>Type</th>

                                                    </tr>
                                </thead>
                                <tbody>
                                     <?php $i =0;

                                       $self_active = DB::table('transaction')
                                        ->where('reciver','=',$data->reciver)
                                        ->where('approval','=','completed')
                                        ->where('reason','=','activate_package')
                                        ->first();    

                                         $self_activation_date = $data->date;

                                        $booster_date = date("Y-m-d", strtotime('+ '.'2 days' , strtotime($self_activation_date)));

                                        $starter_date = $booster_date;

                                        $total_earning = 0;

                                        $days = 0;
                                     ?>
                              
                                    @for($i=0; $i<=400; $i++)

                                    <?php

                                    


                                        $days= $days+1;



                                        

                                     ?>

                                     @if(date("Y-m-d") >= $booster_date && date("Y-m-d") >= $starter_date )

                                     <tr>
                                       <td>{{$i = $i+1}}</td>
                                   




                                  
                                    <td>{{$data->sender}}</td>
                                     
                                      <td>{{$data->reciver}}</td>

                                      <td>{{$data->level}}</td>

                                      <td>{{$data->package}} GRM</td>


                                      
                                    
                                      <?php 

                                      $multiplyer =1;

                                      $self_active = DB::table('transaction')
                                        ->where('reciver','=',$data->reciver)
                                        ->where('approval','=','completed')
                                        ->where('reason','=','activate_package')
                                        ->first();                          

                                        if(isset($self_active))
                                        {
                                          $self_activation_date = $self_active->date;
                                         $booster_date = date("Y-m-d", strtotime('+ '.'1 days' , strtotime($self_activation_date)));                            

                                          $booster_count = DB::table('transaction')
                                          ->where('reason','=','level_roi')
                                          ->where('level','=','1')
                                          ->where('reciver','=',$data->reciver)
                                          ->where('date','<',$booster_date)
                                          ->where('package','>=',$self_active->package)
                                          ->count();

                                          if($booster_count > 0)
                                          {
                                            $multiplyer = 2;
                                          }

                                      }


                                      $total_earning = $total_earning + ($data->amount);


                                      ?>


                                    <td>{{decimal_notation($data->amount)}} GRM </td> 

                                    <td>{{decimal_notation($total_earning)}} GRM</td> 
                                    

                                





                                    
                                    <td>{{($days)}}</td> 
                                   
                                    
                                      <td>@if($data->approval == "completed") Qualified @else Unqualified @endif</td>
                                      <td>{{$starter_date}}</td>
                                      <td>{{$data->status}}</td>

                                      <?php   $starter_date = date("Y-m-d", strtotime('+ '.'1 days' , strtotime($starter_date)));
 ?>
                                   
                                   </tr>
                                   @endif
                               @endfor
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
