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
                            <h5 class="title">Transfer Reward Wallet</h5>
                        </div>
                        <div class="card-body">
                            <div class="basic-form style-1">
                                 <form action="{{url('/')}}/user/transfer_reward_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                <div class="card-body">
                  <div class="row">


                     <div class="col-md-6">
                    <div class="form-group">
                    <label for="marquee">Reward Wallet Balance</label>
                    <input class="form-control"  value="{{$wallet_balance['reward_wallet']}} GRM" readonly />
                   <div id="marquee_err" class="text-danger"></div>
                  </div>
                </div>
                   

                     <div class="col-md-6">
                    <div class="form-group">
                    <label for="marquee">Enter User ID</label>
                    <input class="form-control" onchange="registercheck()" id="user_id" name="user_id" />
                   <div id="marquee_err" class="text-success" id="user_id"></div>
                  </div>
                </div>


                   <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="marquee">Enter Amount</label>
                    <input class="form-control" id="amount" name="amount" />
                   <div id="marquee_err" class="text-danger"></div>
                  </div>
                </div>

                



            
                                 

                
                  
             
                <!-- /.card-body -->

                <div class="card-footer mt-2">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Transfer</button>
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
                $('#user_id').text(response.name+" ✅");
               
              }
              else if(response.status == 'error')
              {
                // alert("Sponcer ID is Invalid");
                 sweet('User ID/User Name is InCorrect','User ID is wrong','error','Enter Correct');
                $('#success_msg').text('');
                document.getElementById('user_id').value="";
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

           



           $('#reward_calculation').text("Wallet Utilization:"+wallet_utilization+" | Reward Utilization:"+utilization);

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