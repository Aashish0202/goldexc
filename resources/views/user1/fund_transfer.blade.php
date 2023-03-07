
  <!-- Header -->
    @include('user1.common.header')

    <!-- Sidebar -->
    @include('user1.common.sidebar')


     @yield('content')
       <style>
    
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
                      -webkit-appearance: none;
                      -moz-appearance: none;
                      appearance: none;
                      margin: 0; 
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
                <!-- Textual inputs -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card_title">Package Activation</h6>
                             <!-- form start -->
                            @include('user1.common.operation_status')
                            <form action="{{url('/')}}/user/fund_transfer_user" method="post" onsubmit="return checkall()">
                             
                            <div class="card-body">
                        
                            <div class="col-11">
                              <div class="form-group col-md-12">
                                <label for="package_name">Wallet Balance</label>
                                <input type="text" class="form-control" name="wallet_balance" id="wallet_balance" placeholder="Enter Wallet Balance">
                                 <div id="err_user_id" class="text-danger"></div> 
                              </div>
                             </div>
                             <div class="col-11">
                               <div class="form-group col-md-12">
                                <label for="amount">Transfer Amount</label>
                                <input type="number" class="form-control" name="transfer_amount" id="transfer_amount" placeholder="Enter Transfer Amount">
                                 <div id="err_transfer_amount" class="text-danger" ></div> 
                              </div>
                               <div class="col-11">
                               <div class="form-group col-md-12">
                                <label for="amount">Transfer To</label>
                                <input type="text" class="form-control" name="transfer_to" id="transfer_to" placeholder="Enter Transfer To">
                                 <div id="err_transfer_to" class="text-danger" ></div> 
                              </div>
                          
                                
                                <hr>
                                <div class="form-group col-md-12">
                                <button  type="submit" class="btn btn-primary ">Sumbit</button>
                              </div>

                           </div>
                         </form>
                            
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
 

<script>
  function checkall()
  {
      bank_acc_holder_name_err.innerHTML="";
      bank_acc_no_err.innerHTML="";
      bank_ifsc_err.innerHTML="";

      if(bank_acc_holder_name.value=="")
      {
          bank_acc_holder_name_err.innerHTML = "Please Enter Bank Account Holder Name";
          return false;
      }
      else if(bank_acc_no.value=="")
      {
           bank_acc_no_err.innerHTML = "Please Enter Please Enter Bank Account No";
          return false;
      }
      else if(bank_ifsc.value=="")
      {
          bank_ifsc_err.innerHTML = "Please Enter Bank IFSC";
          return false;
      }
  }
</script>



  <!-- footer -->
   @include('user1.common.footer')
 
 