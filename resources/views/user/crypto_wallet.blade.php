<!-- Header -->
    @include('user.common.header')

    <!-- Sidebar -->
    @include('user.common.sidebar')


     @yield('content')

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
              <li class="breadcrumb-item active">Change Bank Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
                <h3 class="card-title">Crypto Wallets</h3>
              </div>
              <!-- /.card-header -->
            </div>
              @include('user.common.operation_status')

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
              <form action="{{url('/')}}/user/crypto_wallet_post" method="post" onsubmit="return checkall()">@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="btc_address">BTC Address</label>
                    <input type="text" name="btc_address" id="btc_address" class="form-control" value="{{$data->btc_address}}">
                     <div id="btc_address_err" class="text-danger"></div>
                  </div>
                  <div class="form-group">
                    <label for="tron_address">Tron Address</label>
                    <input type="text" name="tron_address" id="tron_address" class="form-control" value="{{$data->tron_address}}">
                     <div id="tron_address_err" class="text-danger"></div>
                  </div>
                
                    <!-- /.card-body -->
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="card-footer">
                      <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
     <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>
 
<script type="text/javascript">
   
   function checkall()
  {
    bank_acc_holder_name_err.innerHTML = "";
    bank_acc_no_err.innerHTML = "";
    bank_ifsc_err.innerHTML = "";

    if(bank_acc_holder_name.value=="")
    {
      bank_acc_holder_name_err.innerHTML = "Please Enter Your Bank Account Holder Name";
      return false;
    }
   else if(bank_acc_no.value=="")
    {
      bank_acc_no_err.innerHTML = "Please Enter Your Bank Account Number";
      return false;
    }
    else if(bank_ifsc.value=="")
    {
      bank_ifsc_err.innerHTML = "Please Enter Your Bank IFSC";
      return false;
    }
  }
 </script>




    <!-- footer -->
   @include('user1.common.footer')
 