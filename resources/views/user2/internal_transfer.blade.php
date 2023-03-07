
  <!-- Header -->
    @include('user2.common.header')

    <!-- Sidebar -->
    @include('user2.common.sidebar')


     @yield('content')
      <?php
          $data_setting = DB::table('setting')->first();
          // print_r($data_setting); die();     
      ?>
      <?php
          $data = DB::table('deposite_option')->first();
      ?>

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
                            <h6 class="card_title">Internal Transfer</h6>

                            @if(count($errors)>0)

                       <div class="alert alert-danger">

                         <button class="close" type="button" data-dismiss="alert">x</button>
                           <ul>
                          @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>
                          
                          @endforeach
                         </ul>
                        </div>
                          @endif
                            
                             <!-- form start -->
                            @include('user1.common.operation_status')
                              <form action="{{url('/')}}/user/internal_transfer_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                                <div class="card-body">
                                  <div class="form-group col-md-12">
                                    <label for="wallet_balance">Wallet Balance</label>
                                    <input type="text" class="form-control" name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['income_wallet']}}" placeholder="Enter Wallet Balance" readonly>
                                     
                                  </div>
                                  <div class="form-group col-md-12">
                                    <label for="transfer_amount">Transfer Amount</label>
                                    <input type="number" name="transfer_amount" id="transfer_amount" class="form-control" onchange="return checkamount()"placeholder="Enter Amount">
                                    <div id="transfer_amount_err" class="text-danger"></div> 
                                  </div>
                                
                                <!-- /.card-body -->
                                  <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
 
  <script type="text/javascript">
   function checkamount(){
   
   var amount_minimum = <?php echo $data_setting->minimum_deposite;?>;
 
    if(amount_minimum > transfer_amount.value)
    { 
      transfer_amount_err.innerHTML = "Amount should be greater then "+amount_minimum;
      return false;
    }
   }
   

 </script>
 
<script>
  
  function checkall()
  {
    transfer_amount_err.innerHTML = "";
    if(transfer_amount.value=="")
    {
      transfer_amount_err.innerHTML = "Please Enter Amount";
      return false;
    }
  }
</script>



<script type="text/javascript">
   function checkall()

  { 
    amount_err.innerHTML = "";
    utr_err.innerHTML = "";
  
    if(amount.value=="")
    {
      amount_err.innerHTML = "Enter Amount ";
      return false;
    }
   else if(utr.value=="")
    {
      utr_err.innerHTML = "Insert Your Transaction Number";
      return false;
    }
   
  }
 </script>



  <!-- footer -->
   @include('user2.common.footer')
 
 