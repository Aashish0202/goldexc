@include('user4.common.header')


       @include('user4.common.sidebar')

       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
 

        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container-fluid pt-25">

                  <div class="row" style="padding-left: 10px;">
                  
                  <p class="text-white my-10 font-size-16">
                      Referal URL <strong class="text-warning">   <a href="{{url('/')}}/resistration?sponcer_id={{$user->email}}"> <span id="p1">{{url('/')}}/resistration?sponcer_id={{$user->email}}</span> </a> </strong>  <button class="btn-danger" onclick="copyToClipboard('#p1')"> <i class="fa fa-copy"></i> </button>
                    </p>
                    
                </div>
                
                <!-- Row -->
                <div class="row">

                  


                   
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="panel panel-warning card-view">
                            <div class="panel-heading small-panel-heading relative">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-light">WALLET</h6>
                                </div>
                                <div class="clearfix"></div>
                                <div class="head-overlay"></div>
                            </div> 

                            <div class="panel-wrapper collapse in">
                                <div class="panel-body row pa-0">
                                    <div class="sm-data-box data-with-border bg-yellow">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="weight-500 uppercase-font txt-light block">Activation Wallet</span>
                                                    <span class="txt-light block counter">$ <span class="counter-anim">{{$wallet_balance['activation_wallet']}}</span></span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <span class="weight-500 uppercase-font txt-light  block">Income Wallet</span>
                                                    <span class="txt-light block counter">$ <span class="counter-anim">{{$wallet_balance['income_wallet']}}</span></span>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>


                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="panel panel-primary card-view">
                            <div class="panel-heading small-panel-heading relative">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-light">FUND TRANSFER</h6>
                                </div>
                                <div class="clearfix"></div>
                                <div class="head-overlay"></div>
                            </div> 

                            <div class="panel-wrapper collapse in">
                                <div class="panel-body row pa-0">
                                    <div class="sm-data-box data-with-border bg-blue">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="weight-500 uppercase-font txt-light block">TOTAL FUND IN</span>
                                                    <span class="txt-light block counter">$ <span class="counter-anim">{{$wallet_balance['fund_transfer_in']}}</span></span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <span class="weight-500 uppercase-font txt-light  block">TOTAL FUND OUT</span>
                                                    <span class="txt-light block counter">$ <span class="counter-anim">{{$wallet_balance['fund_transfer_out']}}</span></span>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                              </div>
                             </div>
                        </div>


                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="panel panel-success card-view">
                            <div class="panel-heading small-panel-heading relative">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-light">Action</h6>
                                </div>
                                <div class="clearfix"></div>
                                <div class="head-overlay"></div>
                            </div> 

                            <div class="panel-wrapper collapse in">
                                <div class="panel-body row pa-0">
                                    <div class="sm-data-box data-with-border bg-green">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="weight-500 uppercase-font txt-light block">Total Deposite</span>
                                                    <span class="txt-light block counter">$ <span class="counter-anim">{{$wallet_balance['total_deposit']}}</span></span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                    <span class="weight-500 uppercase-font txt-light  block">Total Withdrawal</span>
                                                    <span class="txt-light block counter">$ <span class="counter-anim">{{$wallet_balance['withdraw_payment']}}</span></span>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                              </div>
                             </div>
                        </div>

                   

                      <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="panel panel-default card-view pt-0 mb-5">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box bg-white">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-left pl-0 pr-0 data-wrap-left">
                                                    <span class="txt-dark block counter">$ <span class="counter-anim">{{$wallet_balance['uplevel_income']}}</span></span>
                                                    <span class="block"><span class="weight-500 uppercase-font txt-grey font-13">Total level</span><i class="zmdi zmdi-caret-up txt-success font-21 ml-5 vertical-align-middle"></i></span>
                                                </div>
                                                <div class="col-xs-6 text-left  pl-0 pr-0 pt-25 data-wrap-right">
                                                    <div id="sparkline_1" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="panel panel-default card-view pt-0 mb-5">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box bg-white">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-left pl-0 pr-0 data-wrap-left">
                                                    <span class="txt-dark block counter">$ <span class="counter-anim">{{$wallet_balance['direct_income']}}</span></span>
                                                    <span class="block"><span class="weight-500 uppercase-font txt-grey font-13">Total Direct Income</span><i class="zmdi zmdi-caret-up txt-success font-21 ml-5 vertical-align-middle"></i></span>
                                                </div>
                                                <div class="col-xs-6 text-left  pl-0 pr-0 pt-25 data-wrap-right">
                                                    <div id="sparkline_2" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="col-lg-3 col-md-6 col-xs-12">
                        <div class="panel panel-default card-view pt-0 mb-5">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box bg-white">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-left pl-0 pr-0 data-wrap-left">
                                                    <span class="txt-dark block counter">$ <span class="counter-anim">{{$wallet_balance['roi_income']}}</span></span>
                                                    <span class="block"><span class="weight-500 uppercase-font txt-grey font-13">Trade Income</span><i class="zmdi zmdi-caret-down txt-danger font-21 ml-5 vertical-align-middle"></i></span>
                                                </div>
                                                <div class="col-xs-6 text-left  pl-0 pr-0 pt-25 data-wrap-right">
                                                    <div id="sparkline_4" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     


                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="sm-data-box bg-blue">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                    <span class="txt-light block counter">$ <span class="counter-anim">{{$wallet_balance['total_activation']}}</span></span>
                                                    <span class="weight-500 uppercase-font txt-light block">Total Activation<br><br></span>
                                                </div>
                                                <div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
                                                    <i class="zmdi zmdi-undo txt-light data-right-rep-icon"></i>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                  
                    
                    <br>

                   

               
            </div><hr>
            <?php  $data = DB::table('income_table')->get(); ?>

           
             <script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 1500);
    </script>

<script type="text/javascript">
  
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>

          

        <script src="../../vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>        
             @include('user4.common.footer')