
    <!-- Header -->
    @include('user.common.header')

    <!-- Sidebar -->
    @include('user.common.sidebar')


     @yield('content')

   
          <?php
              $data_setting = DB::table('setting')->first();
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
    
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Internal transfer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Internal transfer income to wallet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               @include('user.common.operation_status ')
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
              <form action="{{url('/')}}/user/internal_transfer_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                <div class="card-body">
                  <div class="form-group col-md-12">
                    <label for="wallet_balance">Wallet Balance</label>
                    <input type="text" class="form-control" name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['income_wallet']}}" placeholder="Enter Wallet Balance" readonly>
                     
                  </div>
                  <div class="form-group  col-md-12">
                    <label for="transfer_amount">Transfer Amount</label>
                    <input type="number" name="transfer_amount" id="transfer_amount" class="form-control" onchange="return checkamount()"placeholder="Enter Amount">
                    <div id="transfer_amount_err" class="text-danger"></div> 
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>

 <script type="text/javascript">
   function checkamount(){
   
   var amount_minimum = <?php echo $data_setting->minimum_deposite;?>;
 
    if(amount_minimum > transfer_amount.value)
    { 
      transfer_amount_err.innerHTML = "Amount should be greater then "+amount_minimum;
      return false;
    }
    else{
      transfer_amount_err.innerHTML = "";
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




    <!-- footer -->
   @include('user.common.footer')
 
 