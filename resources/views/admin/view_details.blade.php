  @include('admin.common.header ')

  <!-- Main Sidebar Container -->
 
 
      @include('admin.common.sidebar ')

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
             <!--  <div class="col-sm-6" style="margin-left:20%";>
                <h1>User Edit</h1>

              </div> -->
<!--               <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">DataTables</li>
                </ol>
              </div> -->
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section>
          
          <div class="row">
            <div class="col-10">
               
              </div>
          </div>
        </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <!-- left column -->
          <div class="col-md-12 mt-2" >
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View User Details</h3>
                 <a href="{{url('/')}}/admin/view_user"  class="btn btn-warning float-right my-4 ">View Users</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form action="{{url('/')}}/user_view" method="post" >
                 {{ csrf_field() }}
                <div class="card-body">
                 <center><h3 style="background-color: #ddd;">Personal Details</h3></center> <br>
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="email">User Id : </label> {{$data->email}}
                   
                  
                  </div>
                  <div class="form-group col-md-6">
                    <label for="city">City : </label> {{$data->city}}
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="first_name" >Full Name : </label> {{$data->first_name}}
                  
                  </div>
                
                   <div class="form-group col-md-6">
                    <label for="mobile">Mobile : </label> {{$data->mobile}}
                    
                  </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                    <label for="email1">Email1 : </label> {{$data->email1}}
                   
                  </div>
                  <div class="form-group col-md-6">
                    <label for="sponcer_id">Sponcer Id : </label> {{$data->sponcer_id}}
                   
                  </div>
                </div>

                <div class="row">
                 <div class="form-group col-md-6">
                    <label for="state">State : </label>  {{$data->state}}
                   
                  </div>
                   <div class="form-group col-md-6">
                    <label for="country">Country : </label> {{$data->country}}
                    
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="address">Address</label>  {{$data->address}}
                    
                  </div>
                  
                   
                   <div class="form-group col-md-6">
                    <label for="dob">Date Of Birth : </label>  {{$data->dob}}
                   
                  </div>
                   </div>
                <center><h3 style="background-color: #ddd;">KVC Details</h3></center><br>
              
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="pan">Pan Number : </label> {{$data->pan}}
                   
                  </div>
                   <div class="form-group col-md-6">
                    <label for="adhar">Aadhar Number : </label> {{$data->adhar}}
                   
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="bank_acc_no">Bank Account Number : </label> {{$data->adhar}}
                   
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_ifsc">Bank IFSC : </label> {{$data->adhar}}
                
                  </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                    <label for="bank_acc_holder_name">Bank Account Holder Name : </label> {{$data->bank_acc_holder_name}}
                  
                  </div>
                </div>
                 <center><h3 style="background-color: #ddd;">Crypto Wallet Details</h3></center><br>
                <div class="row">
                   <div class="form-group col-md-6">
                    <label for="btc_address">BTC Address : </label> {{$data->btc_address}}
                    
                  </div>
                   <div class="form-group col-md-6">
                    <label for="tron_address">TRON Address : </label> {{$data->tron_address}}
                   
                  </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                    <label for="btc_address">TRX Address : </label>
                    
                  </div>
                   <div class="form-group col-md-6">
                    <label for="tron_address">ETH Address : </label>
                   
                  </div>
                </div>
                 <div class="row">
                   <div class="form-group col-md-6">
                    <label for="btc_address">USDT Address : </label>
                    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="btc_address">IMPS Address : </label> 
                  </div>
                </div>
                <center><h3 style="background-color: #ddd;">Permissions</h3></center><br>
                   <div class="row">
                   <div class="form-group col-md-6" >
                    <label for="is_active" >Is Active : </label>  {{$data->is_active}}
                   
               
                  </div>
                 <div class="form-group col-md-6" >
                    <label for="user_type" >User Type : </label> {{$data->user_type}}
                    
                  </div>
                </div>

              
              </form>
            </div>
        </div>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



    <section class="content" >
      <div class="container-fluid">
       


            <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Activation Wallet</span>
                <span class="info-box-number">{{$wallet_balance['activation_wallet']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Income Wallet</span>
                <span class="info-box-number">{{$wallet_balance['income_wallet']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Deposit</span>
                <span class="info-box-number">{{$wallet_balance['total_deposit']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Withdrawal</span>
                <span class="info-box-number">{{$wallet_balance['withdraw_payment']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->




           <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-toggle-on"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Fund in</span>
                <span class="info-box-number">{{$wallet_balance['fund_transfer_in']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


           <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-box"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Fund out</span>
                <span class="info-box-number">{{$wallet_balance['fund_transfer_out']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

               <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-minus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Activation</span>
                <span class="info-box-number">{{$wallet_balance['total_activation']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Roi Income</span>
                <span class="info-box-number">{{$wallet_balance['activation_wallet']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Level Roi Income</span>
                <span class="info-box-number">{{$wallet_balance['income_wallet']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

           <?php $direct_income1 = DB::table('transaction')->where('level','=',1)->where('reciver','=',$data->email)->SUM('percentage');?>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Direct Income</span>
                <span class="info-box-number">{{$direct_income1}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


        

        </div>

  </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>



  </div>

 @include('admin.common.footer')