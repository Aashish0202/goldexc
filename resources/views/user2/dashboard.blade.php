 	<!-- Header -->
    @include('user2.common.header')

    <!-- Sidebar -->
    @include('user2.common.sidebar')


     @yield('content')
<style>
.date {
  display: inline;
  font-size: 10px;
  margin-top: 0px;
  margin-bottom: 20px;

}

 #blink {
            font-size: 20px;
            font-weight: bold;
            color: red;
            transition: 0.5s;

        }
</style>



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
                  
           <div class="mb-1">
                <?php
                    $user = Sentinel::check();


                    $data = DB::table('transaction')
                                ->where('approval','=','completed')
                                ->where('reason','=','activate_package')
                                ->where('reciver','=',$user->email)
                                ->orderBy('id', 'DESC')
                                ->first();

                              
                           
                   
                ?>


                @if(!empty($data))

                <?php

                     $date = $data->date;

                     $changeDate = date('Y-m-d', strtotime('+7 days', strtotime($date)));

                ?>
                <script>
                    var changeDate = <?php echo "'".date('Y-m-d', strtotime('+7 days', strtotime($date)))."'";?>;

                 
                     //alert('changeDate');
                    // The data/time we want to countdown to
                  
                    var countDownDate = new Date(changeDate).getTime();
                   
                    // alert(countDownDate);
                        // Run myfunc every second
                    var myfunc = setInterval(function() {

                    var now = new Date().getTime();
                    var timeleft = countDownDate - now;
                        
                    // Calculating the days, hours, minutes and seconds left
                    var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
                        
                    // Result is output to the specific element
                    document.getElementById("days").innerHTML = days + "d "
                    document.getElementById("hours").innerHTML = hours + "h " 
                    document.getElementById("mins").innerHTML = minutes + "m " 
                    document.getElementById("secs").innerHTML = seconds + "s " 
                        
                    // Display the message when countdown is over
                    if (timeleft < 0) {
                        clearInterval(myfunc);
                        document.getElementById("days").innerHTML  = ""
                        document.getElementById("hours").innerHTML = "" 
                        document.getElementById("mins").innerHTML  = ""
                        document.getElementById("secs").innerHTML  = ""
                        document.getElementById("end").innerHTML   = "TIME UP!!";
                    }
                    }, 1000);
                </script>
                           
                           

                            <center><h6>Your Package Activate Date : {{$data->date}}</h6>
                                <h6>Your Package Expiry Date : {{$changeDate}}</h6></center>

                            <center><div class="blinking ml-2"   id="blink">
                                Your Remaining Activation Time is :<br>
                                 <p class="date ml-2"  id="days"  style="background-color: red; padding: 5px">  </p>
                                 <p class="date ml-2"  id="hours" style="background-color: red; padding: 5px">  </p>
                                 <p class="date ml-2"  id="mins"  style="background-color: red; padding: 5px">  </p>
                                 <p class="date ml-2"  id="secs"  style="background-color: red; padding: 5px">  </p>
                                 <p class="date ml-2" id="end"  style="background-color: red; padding: 4px">  </p>

                            </div></center>
           
                @endif

            </div>
          </div>    
         
              
            </div>
            <div class="row mb-4">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                           <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                            <div class="d-flex align-items-baseline dashboard-breadcrumb">
                               <!--  <p class="text-muted mb-0 mr-1 hover-cursor">App</p>
                                <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
                                <p class="text-muted mb-0 mr-1 hover-cursor">Dashboard</p>
                                <i class="mdi mdi-chevron-right mr-1 text-muted"></i>
                                <p class="text-muted mb-0 hover-cursor">Analytics</p> -->
                            </div>

                        </div>

                        <!-- <div class="d-flex">
                            <div class="btn-group mr-3">
                                <button type="button" class="btn btn-primary">02 Aug 2021</button>
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuSplitButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton1">
                                    <a class="dropdown-item" href="#">Sept 2021</a>
                                    <a class="dropdown-item" href="#">Oct 2021</a>
                                    <a class="dropdown-item" href="#">Nov 2021</a>
                                </div>
                            </div>
                            <button class="btn bg-white border d-none d-sm-block">Download Report</button>
                        </div> -->

                    </div>
                </div>
            </div>
         <div class="row" style="padding-left: 10px;">
                  <p class="text-white my-10 font-size-16">
                      Referal URL <strong class="text-warning"> <span id="p1">{{url('/')}}/resistration?sponcer_id={{$user->email}}</span> </strong>  <button class="btn-danger" onclick="copyToClipboard('#p1')"> <i class="fa fa-copy"></i> </button>
                    </p>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card primary_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Activation Wallet</p>
                                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$wallet_balance['activation_wallet']}}</h3>
                                <div class=""><i class="fa fa-money text-info"></i></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card success_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Income Wallet</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$wallet_balance['income_wallet']}}</h3>
                               <div class=""><i class="fa fa-money text-primary"></i></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card warning_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Total Deposite</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$wallet_balance['total_deposit']}}</h3>
                                <div class=""><i class="fa fa-dollar text-warning"></i></div>
                            </div>
                        </div>
                         </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card info_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Total Withdrawal</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$wallet_balance['withdraw_payment']}}</h3>
                                <div class=""><i class="fa fa-book text-success"></i></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
       
            <br>
              <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card primary_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Total level Roi</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$wallet_balance['level_roi']}}</h3>
                                <div class=""><i class="fa fa-check-circle text-info"></i></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card success_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Total Fund in</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$wallet_balance['fund_transfer_in']}}</h3>
                               <div class=""><i class="fa fa-bars text-primary"></i></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card warning_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Total Fund out</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$wallet_balance['fund_transfer_out']}}</h3>
                                <div class=""><i class="fa fa-arrow-down text-warning"></i></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card info_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Total Activation</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$wallet_balance['total_activation']}}</h3>
                                 <div class=""><i class="fa fa-barcode text-success"></i></div>
                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>  <br>
            <div class="row">
                 <div class="col-xl-3 col-md-6 col-lg-12 stretched_card">
                    <div class="card mb-mob-4 icon_card warning_card_bg">
                        <!-- Card body -->
                        <div class="card-body">
                            <p class="card-title mb-0 text-white">Roi Income</p>
                            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <h3 class="mb-0 text-white">{{$wallet_balance['roi_income']}}</h3>
                                <div class=""><i class="fa fa-arrow-down text-info"></i></div>
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

</body>

   <script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 1500);
    </script>

<script type="text/javascript">
  
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>
 	<!-- footer -->
    @include('user2.common.footer')

 