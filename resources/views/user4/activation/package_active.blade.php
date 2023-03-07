@include('user4.common.header')


@include('user4.common.sidebar')
 
<!-- Main Content -->
      <div class="page-wrapper">
        <div class="container-fluid">
          
          <!-- Title -->
          <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h5 class="txt-dark">Activation</h5>
            </div>
          
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <ol class="breadcrumb">
                <li><a href="index-2.html">Dashboard</a></li>
               
                <li class="active"><span>Package Activation</span></li>
              </ol>
            </div>
            <!-- /Breadcrumb -->
          
          </div>
          <!-- /Title -->
          
         
          
          <!-- Row -->
          <div class="row">
            
            <div class="col-md-6">
              <div class="panel panel-default card-view">
                <div class="panel-heading">
                  <div class="pull-left">
                    <h6 class="panel-title txt-dark">Package Activate</h6>
                  </div>
                  <div class="clearfix"></div>
                </div>
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
                @include('user4.common.operation_status')

                 <?php  $user = Sentinel::check();  ?>


                <div class="panel-wrapper collapse in">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12">
                        <div class="form-wrap">
                          <form class="form-horizontal" action="{{url('/')}}/user/package_active_post" method="post" onsubmit="return checkall()">
                            {{ csrf_field() }}
                            <div class="form-group">
                              <label for="exampleInputuname_4" class="col-sm-3 control-label">User Id*</label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                 
                                  <input type="text" class="form-control" name="user_id" id="user_id" value="{{$user->email}}">
                                  <div class="input-group-addon"><i class="icon-user"></i></div>
                                </div>
                              </div>
                            </div>



                            <div class="form-group">
                              <label for="exampleInputEmail_4" class="col-sm-3 control-label">Wallet Balance</label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                  <input type="text" class="form-control"  name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['activation_wallet']}}" readonly>
                                  <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                </div>
                              </div>
                            </div>
                           

                            <div class="form-group">
                              <label for="exampleInputweb_41" class="col-sm-3 control-label">Package</label>
                              <div class="col-sm-9">
                                

                                 <div class="input-group">
                                  <input type="text" class="form-control"  name="package" id="package"  required="true">
                                  <div class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                </div>


                              </div>
                            </div>
                            <div class="form-group mb-0">
                              <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-info ">Activate Package</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
          <!-- /Row -->
          
         
          
         
          
          
        
        </div>
        
       
       
            
 @include('user4.common.footer')