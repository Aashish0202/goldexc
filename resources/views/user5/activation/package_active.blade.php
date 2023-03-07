  @include('user5.common.header')


       @include('user5.common.sidebar')


        <?php
          $data_setting = DB::table('setting')
          ->first();
          
          $user = Sentinel::check();  

           $deposit_option = DB::table('deposite_option')
           ->where('is_active','=','yes')
           ->get();
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
             
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Package Activate</h5>
                        </div>
                        <div class="card-body">
                            <div class="basic-form style-1">
                                 <form method="post" action="{{url('/')}}/user/package_active_post" enctype="multipart/form-data">
                                   @csrf
                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-user"></i>
                                        </span>
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" placeholder="User Id*" name="user_id" id="user_id" value="{{$user->email}}" onchange="registercheck()">
                                        <button onclick="registercheck()" class="btn btn-primary mt-4" type="button">Check User ID</button>
                                        <div id="amount_err" class="text-danger"></div>
                                       
                                    </div>
                                     <p class="mt-4">User Name:- 
                                  <span style="color: green;" id="success_msg_sponcer">{{$user->first_name}}</span></p>  
                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-key"></i>
                                        </span>
                                        <label>Gold Locker balance</label>
                                        <input  type="text" class="form-control" placeholder="Wallet Balance"name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['activation_wallet']}} GRM" readonly>
                                    </div>

                                    <div>
                                        <label>Reward Wallet Balance</label>
                                          <input  type="text" class="form-control" placeholder="reward_wallet"name="rw" id="ew" value="{{$wallet_balance['reward_wallet']}} GRM" readonly>
                                    </div>

                                  <div class="row mb-3">
                                           <div class="col-sm-12">
                                              <h6 class="mb-0">Package </h6>
                                      <?php  
                                      $package_all = DB::table('package')
                                                    ->get();

                                             


                                                   ?>
                                          </div>
                                      <div class="col-sm-12">
                                        <input  type="text" class="form-control" placeholder="Enter package Amount"name="package" id="package" min="1" max="500000">
                                      </div>
                                    
                                  </div>

                                  <div class="form-check">
                                        <input class="custom-control-input" type="checkbox" value="1" name="reward_wallet" id="reward_wallet" onclick="utilization()">
                                        <label class="form-check-label" for="flexCheckDefault">
                                        Use Reward Wallet Balance
                                        </label>
                                  </div>

                                  <div>
                                      Reward Wallet Balance will be used upto 10%
                                  </div>

                                  <div>
                                     <span style="color: blue;" id="reward_calculation"></span></p>  

                                  </div>

                                         <div class="col-sm-12">
                                                
                                                <input type="submit" class="btn btn-primary px-4" id="submit" onclick="return confirm('Please confirm to activate package');" value="Activate Package" />
                                                 
                                            </div>

                                  
                                </form>
                            </div>
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

<!--**********************************
    Scripts
***********************************-->
<script src="{{url('/')}}/fimobile/assets/js/jquery.js"></script>
<script src="{{url('/')}}/fimobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/settings.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/custom.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="{{url('/')}}/fimobile/assets/vendor/imageuplodify/imageuploadify.min.js"></script>
<script src="{{url('/')}}/fimobile/vendor/swiper/swiper-bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $('input[type="file"]').imageuploadify();
  })
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
     function sweet(title,text,icon,confirmButtonText)
    {
       Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: confirmButtonText
    })

    }
 
   

  </script>
<script>
  function registercheck()
    {
           var user_id = $('#user_id').val();
               //alert(user_id);
              $.ajax({
              url: "{{url('/')}}/package_user_check",
              type: 'GET',
              data:
              {
                _method     : 'GET',
                user_id     : user_id,
              },
            success: function(response)
            {
              var response = JSON.parse(response);
              
              if(response.status == 'success')
              {

                 sweet('User Name/ID is available','User Name/ ID is correct for '+response.name,'success','OKay.. Go Ahead');
                 //alert(response.name);
                $('#success_msg_sponcer').text(response.name+" ✅");
               
              }
              else if(response.status == 'error')
              {
                // alert("Sponcer ID is Invalid");
                 sweet('User ID/User Name is InCorrect','User ID is wrong','error','Enter Correct');
                $('#success_msg').text('');
                document.getElementById('sponcer_id').value="";
              }
            
              
            }
            });

      
    }
</script>


    <script>
  function utilization()
    {
           var reward_balance = {{$wallet_balance['reward_wallet']}};
           var package_amount = $('#package').val();
             var checkBox = document.getElementById("reward_wallet");

             if(checkBox.checked == true)
           {

           if(reward_balance <= 0)
           {
            alert('Reward Balance is 0');
            return false;
           }

           var utilization = 0;
           var wallet_utilization = 0;

           if(reward_balance >= (package_amount*10/100))
           {

                utilization = package_amount*(10/100);
                wallet_utilization = package_amount*(90/100)

           }
           else
           {
                utilization = reward_balance;
                wallet_utilization = package_amount - reward_balance;
           }

           



           $('#reward_calculation').text("Wallet Utilization:"+wallet_utilization+" GRM | Reward Utilization:"+utilization+" GRM");

           }

           else
           {
            $('#reward_calculation').text("");


           }


              

      
    }
</script>



   </div>
</body>

<!-- Mirrored from jobie.dexignzone.com/mobile-app/xhtml/ui-input.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jul 2022 10:15:30 GMT -->
</html>    
          
     
        <!-- main page content ends -->


     
        <!-- Page ends-->
  

         @include('user5.common.footer')