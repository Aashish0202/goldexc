<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php
      $logo = DB::table('setting')
              ->first();
    ?>
    <a href="{{url('/')}}/user/dashboard" class="brand-link">
      <img src="{{url('/')}}/public/site_logo/{{$logo->site_logo}}" alt="AdminLTE Logo" class="img-fluid" >
      <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    </a>
     <?php $data = Sentinel::check(); ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if($data->image)
          <img src="{{url('/')}}/public/image/{{$data->image}}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{url('/')}}/public/profile_image/user2.jpg" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$data->email}}</a>
        </div>
      </div>
 <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
  <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item menu-open">
            <a href="{{url('/')}}/user/dashboard" class="nav-link active">
             <i class="nav-icon  fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-user-alt"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/')}}/user/change_profile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Profile</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="{{url('/')}}/user/view_profile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Identicard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/')}}/user/change_password" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Password</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/')}}/user/change_transaction_pin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Transaction Pin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/')}}/user/change_bank_details" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Bank Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/')}}/user/crypto_wallet" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update CRYPTO Wallet</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-toggle-on fa-pull-left fa-3x-alt"></i>
              <p>
                Activation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                 <a href="{{url('/')}}/user/make_deposite" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Make Deposite</p>
                </a>
              </li>
               <li class="nav-item">
                 <a href="{{url('/')}}/user/make_deposite_inr" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Make Deposite INR</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/')}}/user/package_active" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Package Activate</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/')}}/user/fund_transfer_user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Transfer</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/')}}/user/internal_transfer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Internal Transfer</p>
                </a>
              </li>
            
            </ul>
          </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                Withdraw
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/')}}/user/payment_withdraw" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Withdraw</p>
                </a>
              </li>
                         
              
            </ul>
          </li>

            <li class="nav-item">
             <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-file-alt"></i>

              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   Transaction Report
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/')}}/user/sender_transaction?reason=deposit&title=Deposit Fund" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Deposit</p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="{{url('/')}}/user/sender_transaction?reason=activate_package&title=Activate Package" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Activate Package</p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="{{url('/')}}/user/receiver_transaction?reason=fund_transfer&title=Fund Transfer" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Fund Transfer</p>
                    </a>
                  </li>
                   <li class="nav-item">
                      <a href="{{url('/')}}/user/receiver_transaction?reason=level&title=Level Income" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Level</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/')}}/user/receiver_transaction?reason=internal_transfer&title=Internal Transfer" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Internal Transfer</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/')}}/user/receiver_transaction?reason=withdraw_payment&title=Withdrawal Report" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Withdraw Payment</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
         
       
      </nav>
      <!-- /.sidebar-menu -->
  </div>
    <!-- /.sidebar -->
  </aside>