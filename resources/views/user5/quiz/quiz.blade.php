@include('user3.common.header')


       @include('user3.common.sidebar')

<style type="text/css">


.form-popup-bg {
  position:absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  flex-direction: column;
  align-content: center;
  justify-content: center;
}
.form-popup-bg {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(94, 110, 141, 0.9);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  transition: opacity 0.3s 0s, visibility 0s 0.3s;
  overflow-y: auto;
  z-index: 10000;
}
.form-popup-bg.is-visible {
  opacity: 1;
  visibility: visible;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
  transition: opacity 0.3s 0s, visibility 0s 0s;
}
.form-container {
    background-color: #2d3638;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
    position:relative;
  padding: 40px;
  color: #fff;
}
.close-button {
  background:none;
  color: #fff;
  width: 40px;
  height: 40px;
  position: absolute;
  top: 0;
  right: 0;
  border: solid 1px #fff;
}

.form-popup-bg:before{
    content:'';
    background-color: #fff;
  opacity: .25;
  position:absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}


</style>


         <?php
            //set withdraw timimg
            date_default_timezone_set("Asia/Kolkata");
            $current_time = date("H:i");
            $today = date('Y-m-d');
            

         
            $quation  = DB::table('quiz_details')   
                        ->first();


           $Show_quation  = DB::table('quiz_details')
                            ->where('date','=', $today)
                            ->where( 'time' ,'<=' ,$current_time )
                            ->where( 'to_time' ,'>=' ,$current_time)
                            ->first();



                                                                  

         ?>



            <?php  

            if(isset($Show_quation)){

              $user = Sentinel::check();

                  $avalible  = DB::table('quiz_result')
                                  ->where('user_id','=', $user->email)
                                  ->where( 'quation_id' ,'=' ,$Show_quation->id )
                                  
                                  ->where( 'ans' ,'<>' ,"" )
                                  ->first(); 

                            



            }

              $today = date('Y-m-d');
            $schedule = DB::table('quiz_details')
                        ->where( 'date' ,'=' , $today)
                        ->orderby('time', 'asc')
                        ->get();




               if(isset($Show_quation)){

                        

              	$booking = DB::table('quiz_booking')
                             ->where('user_id','=', $user->email)
                             ->where( 'quation_date' ,'=' , $Show_quation->date)
                             ->where( 'quation_id' ,'=' ,$Show_quation->id ) 
               				->first();
               			
           }
           

               



              ?>     

     



    <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Quiz</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                              
                                <li class="breadcrumb-item active text-white font-weight-bold" aria-current="page"  id="timer1">  </li><br>
                
            
                            </ol>
                        </nav>
                    </div>
                   
                </div>

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

               
        <div class="row">
              <div class="col col-lg-6 mx-auto" id="wait">
                   <div class="alert border-0 alert-dismissible fade show py-2">

                  <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-time'></i>
                    </div>
                    <div class="ms-5">
                      <h6 class="mb-0 text-white">Wait For Next Quation</h6>


                    </div>

                    @if(isset($Show_quation))

                    @if($booking)

                    <div class="ms-5">
                    	
                     @if($avalible)

                     
                     
                    <a href="{{url('/')}}/user/quiz_quation?id={{$Show_quation->id}}" class="btn btn-light" class="button1"   id="button1" style="display: none">View Quation</a>
                    	
                    	

                    @else
                    
                     <a href="{{url('/')}}/user/quiz_quation?id={{$Show_quation->id}}" class="btn btn-light" class="button1"   id="button1">View Quation</a>
                   

                    @endif
                  </div>
                  @endif


                  @endif
                  </div>

                   
                </div>
              </div>


                    <div class="col-md-6">
                        <div class="card radius-10" style="background-color: rgb(255 48 131 / 39%);">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Quiz Wallet</p>
                                        <h4 class="my-1">{{$wallet_balance['quiz_wallet']}}</h4>
                                        <!-- <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>$34 Since last week</p> -->
                                    </div>
                                    <div class="widgets-icons ms-auto" style="width: 136px;  height: 0px;">
                                      <a type="button" class="btn btn-light" href="{{url('/')}}/user/quiz_deposite">Add Amount</a>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>

                  </div>

              
              


              <h4>Schedule</h4>
                   <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                   <tr>
                                        <th>NO</th>
                                         <th>Date</th>
                                         <th>Start Time</th>
                                         <th>End Time</th>
                                            <th>Quiz Amount</th>
                                         <th>Booking</th>

                                      </tr>
                                </thead>
                                <?php $i =0;?>


                                  @foreach($schedule as $data)
                                <tbody>
                                 
                                  <td>{{$i =$i+1}}</td>
                                  <td>{{$data->date}}</td> 
                                  <td>{{$data->time}}</td> 
                                  <td>{{$data->to_time}}</td> 
                                   <td>{{$data->amount}}</td>



                                  <?php 

                                   $booking_check =  DB::table('quiz_booking')
                                   				 ->where('quation_id', '=',  $data->id)
                                                 ->where('user_id', '=', $user->email)
                                                 ->first();


                                      $complete =DB::table('quiz_result')
                                      			 ->where('quation_id', '=',  $data->id)
                                      			  ->where( 'user_id' ,'=' ,$user->email )
                                                 ->first();

                                       
                                          
                                  ?>


                                   @if($data->to_time < $current_time)

                                    <td class="text-danger">  <b>Time out </b></td>

                                      @else

                                  @if(isset($booking_check))

                                  @if($complete)
                                   <td class="text-success"><b>Complete</b></td>
                                   @else
                                  <td class="text-warning">  <b>Booking </b></td>
                                    @endif

                                  @else

                                   <td><a type="submit"  id="btnOpenForm" class="btn btn-primary" href=""><i class='bx bx-plus'></i></a></td>
                                   <div class="form-popup-bg">
                                          <div class="form-container">
                                            <button id="btnCloseForm" class="close-button">X</button>
                                            <h3>Enter Amount For this Quation</h3>
                                           
                                            <form action="{{url('/')}}/user/quiz_booking?id={{$data->id}}" method="post">
                                               @csrf
                                              <div class="form-group">
                                                <label for="" class="fs-20">Amount</label>
                                                <input type="text" name="question_amt" id="question_amt" class="form-control" />
                                              </div>
                                              <br>
                                              <button type="submit" class="btn btn-primary" >Submit</button>
                                            </form>
                                          </div>
                                        </div>
                         @endif

                        @endif
                                  
                                </tbody>
                                   @endforeach
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
  
  <!-- <script type="text/javascript">
      

      window.addEventListener("load", function() {
  const clock = document.getElementById("time");
  let time = -1, intervalId;
  function incrementTime() {
    time++;
    clock.textContent =
      ("0" + Math.trunc(time / 60)).slice(-2) +
      ":" + ("0" + (time % 60)).slice(-2);
  }
  incrementTime();
  intervalId = setInterval(incrementTime, 1000);
});


  </script> -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>




        <script type="text/javascript">

      function start_time1() {
        

     var startTime = Date.now();
var second = 1000;
var minute = second * 60;
var hour = minute * 60;
var container1 = document.getElementById('timer1');


function stopTimer() {
    clearInterval(timer1);
}

function pad(n){
  return ('00' + n).slice(-2);
}

  var timer1 = setInterval(function(){
  var currentTime = Date.now();
  var difference = currentTime - startTime;

  var hours = pad((difference / hour) | 0);
  var minutes = pad(((difference % hour) / minute) | 0);
  var seconds = pad(((difference % minute) / second) | 0);

  

  container1.innerHTML = hours + ':' + minutes + ':' + seconds;

// This only represents time between renders. Actual time rendered is based
// on the elapsed time calculated above.

  //alert(container.value);
}, 250);

 form.style.display = 'block';



 wait.style.display = 'none';

}

      
      
    </script>

    <script type="text/javascript">
      
      function showDiv() {
   document.getElementById('button1').style.display = "block";
}
    </script>

    <script type="text/javascript">
      function closeForm() {
  $('.form-popup-bg').removeClass('is-visible');
}

$(document).ready(function($) {
  
  /* Contact Form Interactions */
  $('#btnOpenForm').on('click', function(event) {
    event.preventDefault();

    $('.form-popup-bg').addClass('is-visible');
  });
  
    //close popup when clicking x or off popup
  $('.form-popup-bg').on('click', function(event) {
    if ($(event.target).is('.form-popup-bg') || $(event.target).is('#btnCloseForm')) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });
  
  
  
  });

    </script>
   
             @include('user3.common.footer')