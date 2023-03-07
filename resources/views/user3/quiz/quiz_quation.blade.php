@include('user3.common.header')


       @include('user3.common.sidebar')




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




            

              ?>     

     


<body onload="start_time();">
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

               

              <div class="col col-lg-6 mx-auto" id="wait" style="display: none">
                   <div class="alert border-0 alert-dismissible fade show py-2">

                  <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-time'></i>
                    </div>
                    <div class="ms-5">
                      <h6 class="mb-0 text-white">Wait For Next Quation</h6>
                    </div>

                    @if(isset($Show_quation))

                    <div class="ms-5">
                     @if(isset($avalible))
                     
                    <button class="btn btn-light" class="button1"  id="button1">View Quation</button>
                    @else
                    
                     <button class="btn btn-light" class="button1" id="button1">View Quation</button>
                    @endif
                  </div>

                  @endif







                  </div>
                   
                </div>
              </div>
              

             


               @if(isset($Show_quation))

              <form method="post" action="{{url('/')}}/user/quiz_post?id={{$_GET['id']}}" id="form" style="display: block">
                           <center>  <h6 class="text-danger" id="button_err"></h6></center>
                              @csrf
                            <center>  <h4 class="mb-0">{{$Show_quation->quation}}</h4></center>
                           
                         <div class="row gy-3 mt-4">
                          
                              <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input" type="radio" name="ans"  id="ans" value="{{$Show_quation->option_1}}" aria-label="Checkbox for following text input" >
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="{{$Show_quation->option_1}}" onclick="showDiv()">
                                </div>
                                 
                                
                                 <input type="hidden" class="form-control" id="timer" name="timer">


                                 <input type="hidden" class="form-control" id="id" name="id" value="{{$Show_quation->id}}">
                           
                              <div class="input-group mb-3">
                                 <div class="input-group-text">
                                 <input class="form-check-input" type="radio" name="ans"  id="ans" value="{{$Show_quation->option_2}}" aria-label="Checkbox for following text input" onclick="showDiv()">
                                 </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="{{$Show_quation->option_2}}">
                              </div>

                              <div class="input-group mb-3">
                                    <div class="input-group-text">
                                  <input class="form-check-input" type="radio" name="ans"  id="ans" value="{{$Show_quation->option_3}}" aria-label="Checkbox for following text input" onclick="showDiv()">
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="{{$Show_quation->option_3}}">
                                </div>


                              <div class="input-group mb-3">
                                    <div class="input-group-text">
                                     <input class="form-check-input" type="radio" name="ans"  id="ans" value="{{$Show_quation->option_4}}" aria-label="Checkbox for following text input" onclick="showDiv()">
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="{{$Show_quation->option_4}}">
                                </div>
                           
                             <input type="hidden" id="right_ans" name="right_ans" value="{{$Show_quation->right_ans}}">
                           
                           
                        </div>
                        <hr/>
                        <div class="row gy-3">
                            <div class="col-md-2 text-end d-grid">
                                <button class="btn btn-light" class="button1" id="button1">Submit</button>
                            </div>
                        </div>

                    </form>




                    @endif
               



            </div>
        </div>
        </body>
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

      function start_time() {
        

     var startTime = Date.now();
var second = 1000;
var minute = second * 60;
var hour = minute * 60;
var container = document.getElementById('timer');


function stopTimer() {
    clearInterval(timer);
}

function pad(n){
  return ('00' + n).slice(-2);
}

var timer = setInterval(function(){
  var currentTime = Date.now();
  var difference = currentTime - startTime;

  var hours = pad((difference / hour) | 0);
  var minutes = pad(((difference % hour) / minute) | 0);
  var seconds = pad(((difference % minute) / second) | 0);

  container.value = hours + ':' + minutes + ':' + seconds;

  if(seconds == 15)
  {
    form.style.display ="none";
    clearInterval(timer);

    window.history.back()

  }
  

 

// This only represents time between renders. Actual time rendered is based
// on the elapsed time calculated above.

  //alert(container.value);
}, 250);


start_time1();
 form.style.display = 'block';



 wait.style.display = 'none';

}

      
      
    </script>



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
   
             @include('user3.common.footer')