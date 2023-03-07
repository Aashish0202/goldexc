              <?php

                      $user = Sentinel::check();

                     $data_setting = DB::table('setting')->first();

                     use \App\Http\Controllers\user\WalletController;


                      $WalletController = new WalletController;

                      $wallet_balance = $WalletController->wallet_binary($user->email);
                    
                    ?>

     

                    <script src="//code.tidio.co/qgxqhmvhbfyvnqezt8wnbwtpj6lsi6nf.js" async></script>
   


       <body class="body-scroll" data-page="index">

        <!-- loader section -->
        <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap loader-cube-animate mx-auto">
                    <img src="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}" alt="Logo">
                </div>
                <p class="mt-4">It's time for exchange Gold<br><strong>Please wait...</strong></p>
            </div>
        </div>
    </div>



    <!-- loader section ends -->



    <!-- Sidebar main menu -->
    <div class="sidebar-wrap  sidebar-pushcontent">
        <!-- Add overlay or fullmenu instead overlay -->
        <div class="closemenu text-muted">Close Menu</div>
        <div class="sidebar dark-bg">
            <!-- user information -->
            <div class="row my-3">
                <div class="col-12 ">
                    <div class="card shadow-sm bg-opac text-white border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <figure class="avatar avatar-44 rounded-15">
                                        <img src="{{url('/')}}/fimobile/assets/img/user1.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="col px-0 align-self-center">
                                    <p class="mb-1">{{$user->email}}</p>
                                    <p class="text-muted size-12">{{$user->first_name}}</p>
                                </div>
                                <div class="col-auto">
                                   <a href="{{url('/')}}/login"> <button class="btn btn-44 btn-light">
                                        <i class="bi bi-box-arrow-right"></i>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-opac text-white border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="display-4">{{$wallet_balance['wallet_balance']}}</h1>
                                    </div>
                                    <div class="col-auto">
                                        <p class="text-muted">Gold Wallet Balance</p>
                                    </div>
                                    <div class="col text-end">
                                        <p class="text-muted"><a href="addmoney.html" >+ Top up</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- user emnu navigation -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('/')}}/user/dashboard">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">Dashboard</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>
                                <div class="col">Profile</div>
                                <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                                </div>

                            </a>


                            <ul class="dropdown-menu">
                                
                              


                                      

                                     <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/change_profile">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Update Pofile</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>










                                <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/change_bank_details">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Update Wallet</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>



                                    <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/change_password">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Change Password</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>




                                     


                             </ul>



                        </li>





                          <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">

                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>

                                <div class="col">Deposit</div>
                                <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                                </div>

                            </a>


                            <ul class="dropdown-menu">



                                       <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/make_deposite_inr">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Deposit USDT
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>
                                


                                       <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/make_deposite">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Deposit Gold
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>



                                    <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/transfer_reward">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Transfer Reward
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>




                                     <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/deposite_report?reason=deposit&title=Deposit">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Deposit Gold history</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>
                                </ul>

                               </li>



                               <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">

                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>

                                <div class="col">Activation</div>
                                <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                                </div>

                            </a>


                            <ul class="dropdown-menu">
                                


                                       <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/package_active">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Activation Package
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>


                                     <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/activation_package_deposite?reason=activate_package&title=Activate%20Package">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Activation Package history</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>
                                </ul>

                               </li>






                          <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">

                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>

                                <div class="col">Team</div>
                                <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                                </div>

                            </a>


                            <ul class="dropdown-menu">
                                


                                       <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/downline?title=My%20Downline">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Downline
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>


                                     


                                     <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/direct_member">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Direct Team Member</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>





                                </ul>

                               </li>



                          <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">

                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>

                                <div class="col">Withdraw / Sell</div>
                                <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                                </div>

                            </a>


                            <ul class="dropdown-menu">
                                


                                       <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/sell_gold">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Sell Gold in USDT
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>


                                     <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/sell_gold_inr">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Sell Gold in INR
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>


                                     <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/withdrwal_report?reason=withdraw_payment&title=Withdrawal%20Report">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Sell Gold History</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>
                                </ul>

                               </li>





                          <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">

                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>

                                <div class="col">Gold Income Report</div>
                                <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                                </div>

                                 </a>


                                      <ul class="dropdown-menu">
                                

                                        <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/roi_income?reason=roi">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Gold Yeild Report
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>
                                      
                                      



                                       <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/receiver_transaction?reason=direct&title=Direct%20Income%20Report">

                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Direct Gold Income
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>





                                       <li><a class="dropdown-item nav-link" href="{{url('/')}}/user/roi_income?reason=level_roi">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Level Gold Income
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>





                                      
                                </ul>

                               </li>





                                    <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">

                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>

                                <div class="col">Support</div>
                                <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                                </div>

                                 </a>


                                      <ul class="dropdown-menu">
                                


                                      
                                      



                                       <li><a class="dropdown-item nav-link" href="#">

                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Live Chat
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>





                                       <li><a class="dropdown-item nav-link" href="https://wa.me/918788038245?text=I%20want%20support">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Whatsapp
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>



                                       <li><a class="dropdown-item nav-link" href="mailto:goldexchange24x7@gmail.com">
                                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="col">Mail
                                        </div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a></li>





                                      
                                </ul>

                               </li>

















                        


                        

                        

                        <li class="nav-item">
                            
                            <a class="nav-link active" href="{{url('/')}}/login" tabindex="-1">
                                <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-arrow-right"></i></div>
                                <div class="col">Logout</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- Sidebar main menu ends -->

    <!-- Begin page -->
    <main class="h-100">

        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col align-self-center text-center">
                    <div class="">
                        <img width="200px" src="https://goldexchange.store/drawapp/Gold/images/logo.png" alt="">
                        
                    </div>
                </div>
                <div class="col-auto">

                    <a href="{{url('/')}}/user/dashboard" target="_self" class="btn btn-light btn-44">

                     <i class="bi bi-house-door"></i>

                        <span class="count-indicator"></span>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header ends -->