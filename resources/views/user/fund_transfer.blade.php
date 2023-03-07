
    <!-- Header -->
    @include('user.common.header')

    <!-- Sidebar -->
    @include('user.common.sidebar')


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
              <li class="breadcrumb-item active">Fund Transfer</li>
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
            <div class="card card-primary" style="width: 60%;margin: auto;">
              <div class="card-header">
                <h3 class="card-title">Fund Transfer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{url('/')}}/user/fund_transfer_user_post" method="post" onsubmit="return checkall()">
                 
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
 





    <!-- footer -->
   @include('user.common.footer')
 
 