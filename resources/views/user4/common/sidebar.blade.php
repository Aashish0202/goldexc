<body>
    <!-- Preloader -->
   <!--  <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div> -->
    <!-- /Preloader -->

      <?php
          $data_setting = DB::table('setting')->first();
          // print_r($data_setting); die();     
           ?>
    <div class="wrapper theme-1-active pimary-color-red">
 <!-- Top Menu Items -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="mobile-only-brand pull-left">
                <div class="nav-header pull-left">
                    <div class="logo-wrap">
                        <a href="index.toast">
                            <img class="brand-img" src="{{url('/')}}/new_theme/doodle-demo/img/logo.png" alt="brand"/>
                            <span class="brand-text" style="font-size: 15px;">{{$data_setting->site_name}}</span>
                        </a>
                    </div>
                </div>  
                <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
                <!--  -->

                <?php
                      $user = Sentinel::check();
                ?>

            </div>
            <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                <ul class="nav navbar-right top-nav pull-right">
                    <li class="dropdown auth-drp">
                        <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown">

                            @if($user->image)
                                    <img src="{{url('/')}}/public/image/{{$user->image}}" alt="user_auth" class="user-auth-img img-circle"/>
                                @else
                                      <img src="{{url('/')}}/new_theme/doodle-demo/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/>
                                @endif
                           

                            <span class="user-online-status"></span></a>
                        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <li>
                                <a href="{{url('/')}}/user/change_profile"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                            </li>
                            <!-- <li>
                                <a href="#"><i class="zmdi zmdi-card"></i><span>my balance</span></a>
                            </li>
                            <li>
                                <a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
                            </li> -->
                            <li class="divider"></li>
                            <li class="sub-menu show-on-hover">
                                <a href="#" class="dropdown-toggle pr-0 level-2-drp">
                                     @if($user->is_active == 'active')
                                    <i class="zmdi zmdi-double-check text-success"></i>{{$user->is_active}}</a>
                                    @else

                                    <i class="zmdi zmdi-check text-danger"></i>{{$user->is_active}}</a>
                                     @endif

                                     
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>  
        </nav>
        <!-- /Top Menu Items -->


<!-- Left Sidebar Menu -->
        <div class="fixed-sidebar-left">
            <ul class="nav navbar-nav side-nav nicescroll-bar">
                <li class="navigation-header">
                    <span>Main</span> 
                    <i class="zmdi zmdi-more"></i>
                </li>
               <!--  <li>
                    <a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="dashboard_dr" class="collapse collapse-level-1">
                        <li>
                            <a class="active-page" href="index-2.html">Analytical</a>
                        </li>
                        <li>
                            <a  href="index2.html">Demographic</a>
                        </li>
                        <li>
                            <a href="index3.html">Project</a>
                        </li>
                        <li>
                            <a href="profile.html">profile</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                <a class="active" href="{{url('/')}}/user/dashboard" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
              </li>

               
<!-- 
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">E-Commerce</span></div><div class="pull-right"><span class="label label-success">hot</span></div><div class="clearfix"></div></a>
                    <ul id="ecom_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="e-commerce.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="product.html">Products</a>
                        </li>
                        <li>
                            <a href="product-detail.html">Product Detail</a>
                        </li>
                        <li>
                            <a href="add-products.html">Add Product</a>
                        </li>
                        <li>
                            <a href="product-orders.html">Orders</a>
                        </li>
                        <li>
                            <a href="product-cart.html">Cart</a>
                        </li>
                        <li>
                            <a href="product-checkout.html">Checkout</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Apps </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="app_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="chats.html">chats</a>
                        </li>
                        <li>
                            <a href="calendar.html">calendar</a>
                        </li>
                        <li>
                            <a href="weather.html">weather</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#email_dr">Email<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                            <ul id="email_dr" class="collapse collapse-level-2">
                                <li>
                                    <a href="inbox.html">inbox</a>
                                </li>
                                <li>
                                    <a href="inbox-detail.html">detail email</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Contacts<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                            <ul id="contact_dr" class="collapse collapse-level-2">
                                <li>
                                    <a href="contact-list.html">list</a>
                                </li>
                                <li>
                                    <a href="contact-card.html">cards</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="file-manager.html">File Manager</a>
                        </li>
                        <li>
                            <a href="todo-tasklist.html">To Do/Tasklist</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="widgets.html"><div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">widgets</span></div><div class="pull-right"><span class="label label-warning">8</span></div><div class="clearfix"></div></a>
                </li> -->
                <li><hr class="light-grey-hr mb-10"/></li>



                <li class="navigation-header">
                    <span>User</span> 
                    <i class="zmdi zmdi-more"></i>
                </li>

                <li>
               <!--  <a  href="{{url('/')}}/user/change_profile" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">Profile</span></div><div class="pull-right"></div><div class="clearfix"></div></a> -->

                   <a href="{{url('/')}}/user/change_profile" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">profile</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>

              </li>



                <!-- <li>

                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">profile</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="panels-wells.html">Panels & Wells</a>
                        </li>
                        <li>
                            <a href="modals.html">Modals</a>
                        </li>
                        <li>
                            <a href="sweetalert.html">Sweet Alerts</a>
                        </li>
                        <li>
                            <a href="notifications.html">notifications</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="accordion-toggle.html">Accordion / Toggles</a>
                        </li>
                        <li>
                            <a href="tabs.html">Tabs</a>
                        </li>
                        <li>
                            <a href="progressbars.html">Progress bars</a>
                        </li>
                        <li>
                            <a href="skills-counter.html">Skills & Counters</a>
                        </li>
                        <li>
                            <a href="pricing.html">Pricing Tables</a>
                        </li>
                        <li>
                            <a href="nestable.html">Nestables</a>
                        </li>
                        <li>
                            <a href="dorpdown.html">Dropdowns</a>
                        </li>
                        <li>
                            <a href="bootstrap-treeview.html">Tree View</a>
                        </li>
                        <li>
                            <a href="carousel.html">Carousel</a>
                        </li>
                        <li>
                            <a href="range-slider.html">Range Slider</a>
                        </li>
                        <li>
                            <a href="grid-styles.html">Grid</a>
                        </li>
                        <li>
                            <a href="bootstrap-ui.html">Bootstrap UI</a>
                        </li>
                    </ul>
                </li> -->
               <!--  <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr"><div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Forms</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="form_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="form-element.html">Basic Forms</a>
                        </li>
                        <li>
                            <a href="form-layout.html">form Layout</a>
                        </li>
                        <li>
                            <a href="form-advanced.html">Form Advanced</a>
                        </li>
                        <li>
                            <a href="form-mask.html">Form Mask</a>
                        </li>
                        <li>
                            <a href="form-picker.html">Form Picker</a>
                        </li>
                        <li>
                            <a href="form-validation.html">form Validation</a>
                        </li>
                        <li>
                            <a href="form-wizard.html">Form Wizard</a>
                        </li>
                        <li>
                            <a href="form-x-editable.html">X-Editable</a>
                        </li>
                        <li>
                            <a href="cropperjs.html">Cropperjs</a>
                        </li>
                        <li>
                            <a href="form-file-upload.html">File Upload</a>
                        </li>
                        <li>
                            <a href="dropzone.html">Dropzone</a>
                        </li>
                        <li>
                            <a href="bootstrap-wysihtml5.html">Bootstrap Wysihtml5</a>
                        </li>
                        <li>
                            <a href="tinymce-wysihtml5.html">Tinymce Wysihtml5</a>
                        </li>
                        <li>
                            <a href="summernote-wysihtml5.html">summernote</a>
                        </li>
                        <li>
                            <a href="typeahead-js.html">typeahead</a>
                        </li>
                    </ul>
                </li> -->
               <!--  <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr"><div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text">Charts </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="chart_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="flot-chart.html">Flot Chart</a>
                        </li>
                        <li>
                            <a href="morris-chart.html">Morris Chart</a>
                        </li>
                        <li>
                            <a href="chart.js.html">chartjs</a>
                        </li>
                        <li>
                            <a href="chartist.html">chartist</a>
                        </li>
                        <li>
                            <a href="easy-pie-chart.html">Easy Pie Chart</a>
                        </li>
                        <li>
                            <a href="sparkline.html">Sparkline</a>
                        </li>
                        <li>
                            <a href="peity-chart.html">Peity Chart</a>
                        </li>
                    </ul>
                </li> -->
               <!--  <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#table_dr"><div class="pull-left"><i class="zmdi zmdi-format-size mr-20"></i><span class="right-nav-text">Tables</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="table_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="basic-table.html">Basic Table</a>
                        </li>
                        <li>
                            <a href="bootstrap-table.html">Bootstrap Table</a>
                        </li>
                        <li>
                            <a href="data-table.html">Data Table</a>
                        </li>
                        <li>
                            <a  href="export-table.html"><span class="pull-right"><span class="label label-danger">New</span></span>Export Table</a>
                        </li>
                        <li>
                            <a  href="responsive-data-table.html"><span class="pull-right"><span class="label label-danger">New</span></span>RSPV DataTable</a>
                        </li>
                        <li>
                            <a href="responsive-table.html">Responsive Table</a>
                        </li>
                        <li>
                            <a href="editable-table.html">Editable Table</a>
                        </li>
                        <li>
                            <a href="foo-table.html">Foo Table</a>
                        </li>
                        <li>
                            <a href="jsgrid-table.html">Jsgrid Table</a>
                        </li>
                    </ul>
                </li> -->
               <!--  <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#icon_dr"><div class="pull-left"><i class="zmdi zmdi-iridescent mr-20"></i><span class="right-nav-text">Icons</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="icon_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="fontawesome.html">Fontawesome</a>
                        </li>
                        <li>
                            <a href="themify.html">Themify</a>
                        </li>
                        <li>
                            <a href="linea-icon.html">Linea</a>
                        </li>
                        <li>
                            <a href="simple-line-icons.html">Simple Line</a>
                        </li>
                        <li>
                            <a href="pe-icon-7.html">Pe-icon-7</a>
                        </li>
                        <li>
                            <a href="glyphicons.html">Glyphicons</a>
                        </li>
                    </ul>
                </li> -->
               <!--  <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#maps_dr"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">maps</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="maps_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="vector-map.html">Vector Map</a>
                        </li>
                        <li>
                            <a href="google-map.html">Google Map</a>
                        </li>
                    </ul>
                </li> -->
                <li><hr class="light-grey-hr mb-10"/></li>
                <li class="navigation-header">
                    <span>Activation</span> 
                    <i class="zmdi zmdi-more"></i>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">Activation</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
                        <li>
                            <a href="{{url('/')}}/user/make_deposite">Make Deposite</a>
                        </li>
                         <!-- <li>
                            <a href="{{url('/')}}/user/make_deposite_inr">Make Deposite INR</a>
                        </li> -->
                         <li>
                            <a href="{{url('/')}}/user/package_active">Package Activate</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/user/fund_transfer_user">Fund Transfer</a>
                        </li>

                         <li><a href="{{url('/')}}/user/internal_transfer"> Internal Transfer</a></li>
                    
                    </ul>
                </li>


                <li><hr class="light-grey-hr mb-10"/></li>
                <li class="navigation-header">
                    <span>Team</span> 
                    <i class="zmdi zmdi-more"></i>
                </li>
                

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#maps_dr"><div class="pull-left"><i class="zmdi zmdi-map mr-20"></i><span class="right-nav-text">My Team</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="maps_dr" class="collapse collapse-level-1">
                        <li>
                            <a href="{{url('/')}}/user/downline?title=My Downline">Downline</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}/user/tree_view?user_id={{$user->email}}">Genealogy</a>
                        </li>
                    </ul>
                </li>

                 <li><hr class="light-grey-hr mb-10"/></li>
                <li class="navigation-header">
                    <span>Withdraw</span> 
                    <i class="zmdi zmdi-more"></i>
                </li>


                <li>
                    <a href="{{url('/')}}/user/payment_withdraw"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Payment Withdraw</span></div><div class="clearfix"></div></a>
                </li>

                <li><hr class="light-grey-hr mb-10"/></li>
                <li class="navigation-header">
                    <span>Reports</span> 
                    <i class="zmdi zmdi-more"></i>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1"><div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span class="right-nav-text">Report</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                    <ul id="dropdown_dr_lv1" class="collapse collapse-level-1">

                      <li><a href="{{url('/')}}/user/sender_transaction?reason=deposit&title=Deposit">Deposite</a></li>

                      <li><a href="{{url('/')}}/user/sender_transaction?reason=activate_package&title=Activate Package">Activate Package</a></li>

                      <li><a href="{{url('/')}}/user/receiver_transaction?reason=fund_transfer&title=Fund Transfer">Fund Transfer</a></li>

                      <li><a href="{{url('/')}}/user/receiver_transaction?reason=internal_transfer&title=Internal Transfer">Internal Transfer</a></li>
                            
                      <li><a href="{{url('/')}}/user/receiver_transaction?reason=withdraw_payment&title=Withdrawal Report">Withdraw Payment</a></li>


                      <li><a href="{{url('/')}}/user/receiver_transaction?reason=level&title=Level Income Report">Level Income Report</a></li>

                       <li><a href="{{url('/')}}/user/roi_income?title=Daily Trade Income&reason=roi">Trade Income Report</a></li>
                        
                    </ul>
                </li>



                 <li><hr class="light-grey-hr mb-10"/></li>
                <li class="navigation-header">
                    <span>Logout</span> 
                    <i class="zmdi zmdi-more"></i>
                </li>

                 <li>
                    <a href="{{url('/')}}/logout"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Logout</span></div><div class="clearfix"></div></a>
                </li>

                
            </ul>
        </div>
        <!-- /Left Sidebar Menu -->

               <!-- Right Sidebar Menu -->
        <div class="fixed-sidebar-right">
            <ul class="right-sidebar">
                <li>
                    <div  class="tab-struct custom-tab-1">
                        <ul role="tablist" class="nav nav-tabs" id="right_sidebar_tab">
                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="chat_tab_btn" href="#chat_tab">chat</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="messages_tab_btn" role="tab" href="#messages_tab" aria-expanded="false">messages</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="todo_tab_btn" role="tab" href="#todo_tab" aria-expanded="false">todo</a></li>
                        </ul>
                        <div class="tab-content" id="right_sidebar_content">
                            <div  id="chat_tab" class="tab-pane fade active in" role="tabpanel">
                                <div class="chat-cmplt-wrap">
                                    <div class="chat-box-wrap">
                                        <div class="add-friend">
                                            <a href="javascript:void(0)" class="inline-block txt-grey">
                                                <i class="zmdi zmdi-more"></i>
                                            </a>    
                                            <span class="inline-block txt-dark">users</span>
                                            <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                        <form role="search" class="chat-search pl-15 pr-15 pb-15">
                                            <div class="input-group">
                                                <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
                                                <span class="input-group-btn">
                                                <button type="button" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                        <div id="chat_list_scroll">
                                            <div class="nicescroll-bar">
                                                <ul class="chat-list-wrap">
                                                    <li class="chat-list">
                                                        <div class="chat-body">
                                                            <a  href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="../img/user.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Clay Masse</span>
                                                                        <span class="time block truncate txt-grey">No one saves us but ourselves.</span>
                                                                    </div>
                                                                    <div class="status away"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a  href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="../img/user1.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Evie Ono</span>
                                                                        <span class="time block truncate txt-grey">Unity is strength</span>
                                                                    </div>
                                                                    <div class="status offline"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a  href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="../img/user2.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Madalyn Rascon</span>
                                                                        <span class="time block truncate txt-grey">Respect yourself if you would have others respect you.</span>
                                                                    </div>
                                                                    <div class="status online"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a  href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="../img/user3.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Mitsuko Heid</span>
                                                                        <span class="time block truncate txt-grey">I’m thankful.</span>
                                                                    </div>
                                                                    <div class="status online"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a  href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="../img/user.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Ezequiel Merideth</span>
                                                                        <span class="time block truncate txt-grey">Patience is bitter.</span>
                                                                    </div>
                                                                    <div class="status offline"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a  href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="../img/user1.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Jonnie Metoyer</span>
                                                                        <span class="time block truncate txt-grey">Genius is eternal patience.</span>
                                                                    </div>
                                                                    <div class="status online"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a  href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="../img/user2.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Angelic Lauver</span>
                                                                        <span class="time block truncate txt-grey">Every burden is a blessing.</span>
                                                                    </div>
                                                                    <div class="status away"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a  href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="../img/user3.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Priscila Shy</span>
                                                                        <span class="time block truncate txt-grey">Wise to resolve, and patient to perform.</span>
                                                                    </div>
                                                                    <div class="status online"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                            <a  href="javascript:void(0)">
                                                                <div class="chat-data">
                                                                    <img class="user-img img-circle"  src="../img/user4.png" alt="user"/>
                                                                    <div class="user-data">
                                                                        <span class="name block capitalize-font">Linda Stack</span>
                                                                        <span class="time block truncate txt-grey">Our patience will achieve more than our force.</span>
                                                                    </div>
                                                                    <div class="status away"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent-chat-box-wrap">
                                        <div class="recent-chat-wrap">
                                            <div class="panel-heading ma-0">
                                                <div class="goto-back">
                                                    <a  id="goto_back" href="javascript:void(0)" class="inline-block txt-grey">
                                                        <i class="zmdi zmdi-chevron-left"></i>
                                                    </a>    
                                                    <span class="inline-block txt-dark">ryan</span>
                                                    <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-more"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body pa-0">
                                                    <div class="chat-content">
                                                        <ul class="nicescroll-bar pt-20">
                                                            <li class="friend">
                                                                <div class="friend-msg-wrap">
                                                                    <img class="user-img img-circle block pull-left"  src="../img/user.png" alt="user"/>
                                                                    <div class="msg pull-left">
                                                                        <p>Hello Jason, how are you, it's been a long time since we last met?</p>
                                                                        <div class="msg-per-detail text-right">
                                                                            <span class="msg-time txt-grey">2:30 PM</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>  
                                                            </li>
                                                            <li class="self mb-10">
                                                                <div class="self-msg-wrap">
                                                                    <div class="msg block pull-right"> Oh, hi Sarah I'm have got a new job now and is going great.
                                                                        <div class="msg-per-detail text-right">
                                                                            <span class="msg-time txt-grey">2:31 pm</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>  
                                                            </li>
                                                            <li class="self">
                                                                <div class="self-msg-wrap">
                                                                    <div class="msg block pull-right">  How about you?
                                                                        <div class="msg-per-detail text-right">
                                                                            <span class="msg-time txt-grey">2:31 pm</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>  
                                                            </li>
                                                            <li class="friend">
                                                                <div class="friend-msg-wrap">
                                                                    <img class="user-img img-circle block pull-left"  src="../img/user.png" alt="user"/>
                                                                    <div class="msg pull-left"> 
                                                                        <p>Not too bad.</p>
                                                                        <div class="msg-per-detail  text-right">
                                                                            <span class="msg-time txt-grey">2:35 pm</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>  
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="text" id="input_msg_send" name="send-msg" class="input-msg-send form-control" placeholder="Type something">
                                                        <div class="input-group-btn emojis">
                                                            <div class="dropup">
                                                                <button type="button" class="btn  btn-default  dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-mood"></i></button>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li><a href="javascript:void(0)">Action</a></li>
                                                                    <li><a href="javascript:void(0)">Another action</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="javascript:void(0)">Separated link</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="input-group-btn attachment">
                                                            <div class="fileupload btn  btn-default"><i class="zmdi zmdi-attachment-alt"></i>
                                                                <input type="file" class="upload">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <div id="messages_tab" class="tab-pane fade" role="tabpanel">
                                <div class="message-box-wrap">
                                    <div class="msg-search">
                                        <a href="javascript:void(0)" class="inline-block txt-grey">
                                            <i class="zmdi zmdi-more"></i>
                                        </a>    
                                        <span class="inline-block txt-dark">messages</span>
                                        <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-search"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="set-height-wrap">
                                        <div class="streamline message-box nicescroll-bar">
                                            <a href="javascript:void(0)">
                                                <div class="sl-item unread-message">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="../img/user.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Clay Masse</span>
                                                        <span class="inline-block font-11  pull-right message-time">12:28 AM</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Themeforest message sent via your envato market profile</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsu messm quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="../img/user1.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Evie Ono</span>
                                                        <span class="inline-block font-11  pull-right message-time">1 Feb</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Pogody theme support</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="../img/user2.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Madalyn Rascon</span>
                                                        <span class="inline-block font-11  pull-right message-time">31 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Congratulations from design nominees</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item unread-message">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="../img/user3.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Ezequiel Merideth</span>
                                                        <span class="inline-block font-11  pull-right message-time">29 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Themeforest item support message</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item unread-message">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="../img/user4.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Jonnie Metoyer</span>
                                                        <span class="inline-block font-11  pull-right message-time">27 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Help with beavis contact form</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="{{url('/')}}/new_theme/doodle-demo/img/user.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Priscila Shy</span>
                                                        <span class="inline-block font-11  pull-right message-time">19 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject">Your uploaded theme is been selected</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <div class="sl-item">
                                                    <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                        <img class="img-responsive img-circle" src="{{url('/')}}/new_theme/doodle-demo/img/user1.png" alt="avatar"/>
                                                    </div>
                                                    <div class="sl-content">
                                                        <span class="inline-block capitalize-font   pull-left message-per">Linda Stack</span>
                                                        <span class="inline-block font-11  pull-right message-time">13 Jan</span>
                                                        <div class="clearfix"></div>
                                                        <span class=" truncate message-subject"> A new rating has been received</span>
                                                        <p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div  id="todo_tab" class="tab-pane fade" role="tabpanel">
                                <div class="todo-box-wrap">
                                    <div class="add-todo">
                                        <a href="javascript:void(0)" class="inline-block txt-grey">
                                            <i class="zmdi zmdi-more"></i>
                                        </a>    
                                        <span class="inline-block txt-dark">todo list</span>
                                        <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="set-height-wrap">
                                        <!-- Todo-List -->
                                        <ul class="todo-list nicescroll-bar">
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-default">
                                                    <input type="checkbox" id="checkbox01"/>
                                                    <label for="checkbox01">Record The First Episode</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-pink">
                                                    <input type="checkbox" id="checkbox02"/>
                                                    <label for="checkbox02">Prepare The Conference Schedule</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-warning">
                                                    <input type="checkbox" id="checkbox03" checked/>
                                                    <label for="checkbox03">Decide The Live Discussion Time</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-success">
                                                    <input type="checkbox" id="checkbox04" checked/>
                                                    <label for="checkbox04">Prepare For The Next Project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-danger">
                                                    <input type="checkbox" id="checkbox05" checked/>
                                                    <label for="checkbox05">Finish Up AngularJs Tutorial</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                            <li class="todo-item">
                                                <div class="checkbox checkbox-purple">
                                                    <input type="checkbox" id="checkbox06" checked/>
                                                    <label for="checkbox06">Finish Infinity Project</label>
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="light-grey-hr"/>
                                            </li>
                                        </ul>
                                        <!-- /Todo-List -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /Right Sidebar Menu -->
        
        <!-- Right Setting Menu -->
        <div class="setting-panel">
            <ul class="right-sidebar nicescroll-bar pa-0">
                <li class="layout-switcher-wrap">
                    <ul>
                        <li>
                            <span class="layout-title">Scrollable sidebar</span>
                            <span class="layout-switcher">
                                <input type="checkbox" id="switch_3" class="js-switch"  data-color="#ea6c41" data-secondary-color="#878787" data-size="small"/>
                            </span> 
                            <h6 class="mt-30 mb-15">Theme colors</h6>
                            <ul class="theme-option-wrap">
                                <li id="theme-1" class="active-theme"><i class="zmdi zmdi-check"></i></li>
                                <li id="theme-2"><i class="zmdi zmdi-check"></i></li>
                                <li id="theme-3"><i class="zmdi zmdi-check"></i></li>
                                <li id="theme-4"><i class="zmdi zmdi-check"></i></li>
                                <li id="theme-5"><i class="zmdi zmdi-check"></i></li>
                                <li id="theme-6"><i class="zmdi zmdi-check"></i></li>
                            </ul>
                            <h6 class="mt-30 mb-15">Primary colors</h6>
                            <div class="radio mb-5">
                                <input type="radio" name="radio-primary-color" id="pimary-color-red" checked value="pimary-color-red">
                                <label for="pimary-color-red"> Red </label>
                            </div>
                            <div class="radio mb-5">
                                <input type="radio" name="radio-primary-color" id="pimary-color-blue" value="pimary-color-blue">
                                <label for="pimary-color-blue"> Blue </label>
                            </div>
                            <div class="radio mb-5">
                                <input type="radio" name="radio-primary-color" id="pimary-color-green" value="pimary-color-green">
                                <label for="pimary-color-green"> Green </label>
                            </div>
                            <div class="radio mb-5">
                                <input type="radio" name="radio-primary-color" id="pimary-color-yellow" value="pimary-color-yellow">
                                <label for="pimary-color-yellow"> Yellow </label>
                            </div>
                            <div class="radio mb-5">
                                <input type="radio" name="radio-primary-color" id="pimary-color-pink" value="pimary-color-pink">
                                <label for="pimary-color-pink"> Pink </label>
                            </div>
                            <div class="radio mb-5">
                                <input type="radio" name="radio-primary-color" id="pimary-color-orange" value="pimary-color-orange">
                                <label for="pimary-color-orange"> Orange </label>
                            </div>
                            <div class="radio mb-5">
                                <input type="radio" name="radio-primary-color" id="pimary-color-gold" value="pimary-color-gold">
                                <label for="pimary-color-gold"> Gold </label>
                            </div>
                            <div class="radio mb-35">
                                <input type="radio" name="radio-primary-color" id="pimary-color-silver" value="pimary-color-silver">
                                <label for="pimary-color-silver"> Silver </label>
                            </div>
                            <button id="reset_setting" class="btn  btn-info btn-xs btn-outline btn-rounded mb-10">reset</button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button id="setting_panel_btn" class="btn btn-success btn-circle setting-panel-btn shadow-2dp"><i class="zmdi zmdi-settings"></i></button>
        <!-- /Right Setting Menu -->
        
        <!-- Right Sidebar Backdrop -->
        <div class="right-sidebar-backdrop"></div>
        <!-- /Right Sidebar Backdrop -->