 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php $data =  DB::table('setting')
               ->first(); ?>
   <a href="{{url('/')}}/admin/dashboard" class="brand-link">
      <img src="{{url('/')}}/public/site_logo/{{$data->site_logo}}" alt="AdminLTE Logo" style="width:100%;height: 155px;">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <?php $data = Sentinel::check(); ?> 
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('/')}}/public/image/{{$data->image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$data->first_name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

     <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">
            <a href="{{url('/')}}/admin/dashboard" class="nav-link active">
             <i class="nav-icon  fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>

            <li class="nav-item">
             <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-user"></i>

              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="{{url('/')}}/admin/view_user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   View User
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/view_user?type=active" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Active</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/view_user?type=inactive" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Inactive</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/view_user?type=block" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Block</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="{{url('/')}}/admin/view_user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
                </li>
                </ul>
              </li>
         </ul>
       </li>

           <li class="nav-item">
             <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-file-alt"></i>

              <p>
                Transaction
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="{{url('/')}}/admin/status_change" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Sort by status
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/status_change?type=completed" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Completed</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/status_change?type=pending" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pending</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/status_change?type=reject" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Rejeted</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="{{url('/')}}/admin/status_change" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Transaction</p>
                </a>
                </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="{{url('/')}}/admin/status_change" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                  Sort by Reason
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/sort_by_reason?type=deposit" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Deposit</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/sort_by_reason?type=activate_package" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Activate Package</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/sort_by_reason?type=fund_transfer" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Fund Transfer In</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/sort_by_reason?type=fund_transfer" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Fund Transfer Out</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/sort_by_reason?type=level" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Level</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/sort_by_reason?type=internal_transfer" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Internal Transfer</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/')}}/admin/sort_by_reason?type=withdraw_payment" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Withdraw Payment</p>
                    </a>
                  </li>
                    <!-- <li class="nav-item">
                    <a href="{{url('/')}}/admin/sort_by_reason?type=RAPIDFIRE" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>RAPID FIRE</p>
                    </a>
                  </li> -->




                  
                  
                  <li class="nav-item">
                  <a href="{{url('/')}}/admin/sort_by_reason" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Transaction</p>
                </a>
                </li>
                </ul>
              </li>
         </ul>
       </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Package
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/')}}/admin/view_package" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View package</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Request
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/')}}/admin/deposite_request" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deposite Request</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/')}}/admin/withdraw_request" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdraw Request</p>
                </a>
              </li>
            </ul>

            
          </li>


           <li class="nav-item menu-open">
            <a href="{{url('/')}}/admin/transfer_reward" class="nav-link active">
              <i class="nav-icon fas fa-toggle-on fa-pull-left fa-3x-alt"></i>
              <p>
               Reward Transfer                
              </p>
            </a>
           
          </li>


           <li class="nav-item menu-open">
            <a href="{{url('/')}}/admin/admin_password" class="nav-link active">
              <i class="nav-icon fas fa-toggle-on fa-pull-left fa-3x-alt"></i>
              <p>
              Change Password
                
              </p>
            </a>
           
          </li>

            <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
             <i class="nav-icon fas fa-user-cog"></i> 
              <p>
                 Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/')}}/admin/site_setting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Site Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/')}}/admin/withdraw_setting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdraw Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/')}}/admin/deposite_setting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deposite Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/')}}/admin/registration_setting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registration Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/')}}/admin/qr_setting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>QR Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/')}}/admin/payment_setting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/')}}/admin/change_frontpage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Front Page Setting</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item menu-open" style=" margin-bottom: 50%;">
            <a href="{{url('/')}}/logout" class="nav-link active">
             <i class="nav-icon  fas fa-sign-out-alt"></i>
              <p>
               Log Out
              </p>
            </a>
          </li>
     </ul>
       
      </nav>
      <!-- /.sidebar-menu -->
  </aside>

