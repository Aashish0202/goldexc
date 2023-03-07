 	<!-- Header -->
    @include('admin.common.header')

    <!-- Sidebar -->
    @include('admin.common.sidebar')


     @yield('content')



 <?php $user= Sentinel::check(); ?>
@if($user->email == "uk")
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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

<section class="content" >
      <div class="container-fluid">
        <?php $data     =   DB::table('users')
                              ->count();
                                ?>

           <div class="row">
           <div class="col-md-3 col-sm-6 col-12">
             <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">{{$data}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
           </div>
             <?php $data1     =   DB::table('users')
                              ->where('is_active', '=', 'active')
                              
                              ->count();
             ?>
             <div class="col-md-3 col-sm-6 col-12">
             <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-toggle-on"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Active</span>
                <span class="info-box-number">{{$data1}}</span>
              </div>
             
            </div>
            
           </div>

            <?php $data2     =   DB::table('users')
                              ->where('is_active', '=', 'inactive')
                              
                              ->count();
                                ?>
           <div class="col-md-3 col-sm-6 col-12">
             <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-toggle-off"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Inactive</span>
                <span class="info-box-number">{{$data2}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
           </div>
                       <?php $data3     =   DB::table('users')
                              ->where('is_active', '=', 'block')
                              
                              ->count();
                                ?>
            <div class="col-md-3 col-sm-6 col-12">
             <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-times-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Block</span>
                <span class="info-box-number">{{$data3}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
           </div>
           </div><hr>


      <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Deposit</span>
                <span class="info-box-number">{{$wallet_balance['total_deposit']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
                  <?php 

                      

                     $income_of_activate= DB::table('transaction')
                        ->where('reason','=','activate_package')
                        ->where('amount','=','30')  
                        ->SUM('package'); 

                      
                    //  echo $total_income;    
                ?>
     

    

           <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fa fa-reply"></i></span>

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
             <span class="info-box-icon bg-info"><i class="fa fa-toggle-on"></i></span>


              <div class="info-box-content">
                <span class="info-box-text">Total Fund in</span>
                <span class="info-box-number">{{$wallet_balance['fund_transfer_in']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <?php $total_activation_sum = DB::table('wallet')
                        ->SUM('total_activation'); ?>
               <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Activation</span>
                <span class="info-box-number">{{$total_activation_sum}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-credit-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Withdraw</span>
                <span class="info-box-number">{{$wallet_balance['total_withdrawal_c']}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          

        </div>

   


        
  </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
    
 	<!-- footer -->
 	
 	
 	@else
 	
 	<?php $set_w = DB::table('walls')->first(); ?>
 	
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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

<section class="content" >
      <div class="container-fluid">
        <?php $data     =   DB::table('users')
                              ->count();
                                ?>

           <div class="row">
           <div class="col-md-3 col-sm-6 col-12">
             <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fa fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">{{$data - $set_w->total_user}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
           </div>
             <?php $data1     =   DB::table('users')
                              ->where('is_active', '=', 'active')
                              
                              ->count();
             ?>
             <div class="col-md-3 col-sm-6 col-12">
             <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-toggle-on"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Active</span>
                <span class="info-box-number">{{$data1 - $set_w->total_active}}</span>
              </div>
             
            </div>
            
           </div>

            <?php $data2     =   DB::table('users')
                              ->where('is_active', '=', 'inactive')
                              
                              ->count();
                                ?>
           <div class="col-md-3 col-sm-6 col-12">
             <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-toggle-off"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Inactive</span>
                <span class="info-box-number">{{$data2 - $set_w->total_inactive}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
           </div>
                       <?php $data3     =   DB::table('users')
                              ->where('is_active', '=', 'block')
                              
                              ->count();
                                ?>
            <div class="col-md-3 col-sm-6 col-12">
             <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-times-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Block</span>
                <span class="info-box-number">{{$data3 - $set_w->total_block}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
           </div>
           </div><hr>


      <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Deposit</span>
                <span class="info-box-number">{{$wallet_balance['total_deposit'] - $set_w->total_deposit}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

            <?php 

                      

                     $income_of_activate= DB::table('transaction')
                        ->where('reason','=','activate_package')
                        ->where('amount','=','30')  
                        ->SUM('package'); 

                      
                    //  echo $total_income;    
                ?>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
               <span class="info-box-icon bg-info"><i class="fa-regular fa fa-award"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">30$ Activation</span>
                <span class="info-box-number">{{$income_of_activate - $set_w->main_package}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


    

           <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fa fa-reply"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Fund out</span>
                <span class="info-box-number">{{$wallet_balance['fund_transfer_out'] - $set_w->total_fund_out}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

           <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
             <span class="info-box-icon bg-info"><i class="fa fa-toggle-on"></i></span>


              <div class="info-box-content">
                <span class="info-box-text">Total Fund in</span>
                <span class="info-box-number">{{$wallet_balance['fund_transfer_in'] - $set_w->total_fund_in}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <?php $total_activation_sum = DB::table('wallet')
                        ->SUM('total_activation'); ?>
               <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Activation</span>
                <span class="info-box-number">{{$total_activation_sum - $set_w->total_activation}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-credit-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Withdraw</span>
                <span class="info-box-number">{{$wallet_balance['total_withdrawal_c'] - $set_w->total_withdrawal}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-copy"></i></span>
                <?php 

                     $income_fix_wallet = DB::table('wallet')
                        ->SUM('total_activation');  

                     $rapidfire_income= DB::table('transaction')
                        ->where('reason','=','activate_package_20')         
                        ->SUM('package'); 

                      $total_income=$income_fix_wallet+$rapidfire_income;
                    //  echo $total_income;    
                ?>
              <div class="info-box-content">
                <span class="info-box-text">Total Income</span>
                <span class="info-box-number">{{$wallet_balance['total_fixed_income'] - $set_w->total_income}}</span>
              </div>
              <!-- /.info-box-content -->


            </div>


            <!-- /.info-box --> 
          </div>

            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa-regular fa fa-award"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Club Bonus/Achiever</span>
                <span class="info-box-number">{{$transaction_data}}$ | {{$club_ach_count}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

        <div class="col-md-3 col-sm-6 col-12">
            <a href="{{url('/')}}/admin/dashboard_2" style="color:black; text-decoration: none;  background-color: none;">
            <div class="info-box">
              <span class="info-box-icon bg-gray"><i class="fa-regular fa fa-calculator"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Balance</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


            <div class="col-md-3 col-sm-6 col-12">
     <a href="{{url('/')}}/admin/pakage_20" style="color:black; text-decoration: none;  background-color: none;">
            <div class="info-box">
              <span class="info-box-icon bg-warning">
                <i class="fa fa-copy"></i></span>
                <?php  $income_tbi_wallet = DB::table('transaction')
                         ->where('reason','=','activate_package_20')
                         ->SUM('package');  
                ?>
              <div class="info-box-content">
                <span class="info-box-text">20$ Report</span>
                <span class="info-box-number">{{$income_tbi_wallet - $set_w->report20}}</span>
              </div>
              <!-- /.info-box-content -->


            </div>
          </a>

            <!-- /.info-box -->
          </div>



           <div class="col-md-3 col-sm-6 col-12">
     <a href="{{url('/')}}/admin/pakage_20" style="color:black; text-decoration: none;  background-color: none;">
            <div class="info-box">
              <span class="info-box-icon bg-warning">
                <i class="fa fa-copy"></i></span>
                <?php  $income_tbi_wallet1 = DB::table('transaction')
                         ->where('reason','=','activate_package_50')
                         ->SUM('package');  
                ?>
              <div class="info-box-content">
                <span class="info-box-text">50$ Report</span>
                <span class="info-box-number">{{$income_tbi_wallet1}}</span>
              </div>
              <!-- /.info-box-content -->


            </div>
          </a>

            <!-- /.info-box -->
          </div>





<div class="col-md-3 col-sm-6 col-12">
     <a href="{{url('/')}}/admin/tbi_report" style="color:black; text-decoration: none;  background-color: none;">
            <div class="info-box">
              <span class="info-box-icon bg-info">
                <i class="fa fa-credit-card"></i></span>
                <?php  $income_tbi_wallet = DB::table('transaction')
                         ->where('reason','=','activate_package_10')
                         ->SUM('package');  
                ?>
              <div class="info-box-content">
                <span class="info-box-text">TBI Report</span>
                <span class="info-box-number">{{$wallet_balance['tbi_amount'] - $set_w->tbi}}</span>
              </div>
              <!-- /.info-box-content -->


            </div>
          </a>

            <!-- /.info-box -->
          </div>



        </div>

   


        
  </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
    
 	<!-- footer -->
 	
 	@endif
 	
    @include('admin.common.footer')

 