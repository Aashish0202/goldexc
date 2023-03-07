 <!-- Header -->
    @include('admin.common.header')

    <!-- Sidebar -->
    @include('admin.common.sidebar')


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
                <h3 class="card-title">Edit User</h3>
                 <a href="{{url('/')}}/admin/view_user"  class="btn btn-warning float-right my-4 ">View Users</a>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
               @include('user.common.operation_status ')
              <form action="{{url('/')}}/admin/user_edit_post" method="post" onsubmit="return checkall()";>
                 {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="email">User Id</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{$data->email}}" readonly>
                     <div id="err_email" class="text-danger" ></div> 
                  </div>
                  <div class="form-group col-md-6">
                    <label for="first_name" >Full Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$data->first_name}}">
                    <div id="err_first_name" class="text-danger" ></div>
                  </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                    <label for="email1">Email</label>
                    <input type="email" class="form-control" id="email1" name="email1" placeholder="Enter Email Address" value="{{$data->email1}}"> 
                    <div id="err_email1" class="text-danger" ></div>
                  </div>
                
                   <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="{{$data->mobile}}">
                    <div id="err_mobile" class="text-danger" ></div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="btc_address">BTC Address</label>
                    <input type="text" class="form-control" id="btc_address" name="btc_address" placeholder="Enter BTC Address" value="{{$data->btc_address}}" >
                    <div id="err_btc_address" class="text-danger" ></div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="sponcer_id">Sponcer Id</label>
                    <input type="text" class="form-control" id="sponcer_id" name="sponcer_id"placeholder="Enter Sponcer Id" readonly value="{{$data->sponcer_id}}">
                    <div id="err_sponcer_id" class="text-danger" ></div>
                  </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                    <label for="pan">Pan Number</label>
                    <input type="text" class="form-control" id="pan" name="pan" placeholder="Enter Pan Number" value="{{$data->pan}}">
                    <div id="err_pan" class="text-danger" ></div>
                  </div>
                   <div class="form-group col-md-6">
                    <label for="tron_address">Tron Address</label>
                    <input type="text" class="form-control" id="tron_address" name="tron_address"placeholder="Enter Tron Address"  value="{{$data->tron_address}}">
                    <div id="err_tron_address" class="text-danger" ></div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="bank_acc_no">Bank Account Number</label>
                    <input type="number" class="form-control" id="bank_acc_no" name="bank_acc_no" placeholder="Enter Account Number" value="{{$data->bank_acc_no}}">
                    <div id="err_bank_acc_no" class="text-danger" ></div>
                  </div>
                   <div class="form-group col-md-6">
                    <label for="adhar">Aadhar Number</label>
                    <input type="number" class="form-control" id="adhar" name="adhar" placeholder="Enter Aadhar Number" value="{{$data->adhar}}">
                    <div id="err_adhar" class="text-danger" ></div>
                  </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                    <label for="bank_acc_holder_name">Bank Account Holder Name</label>
                    <input type="text" class="form-control" id="bank_acc_holder_name" name="bank_acc_holder_name" placeholder="Enter Account Holder Name" value="{{$data->bank_acc_holder_name}}" >
                    <div id="err_bank_acc_holder_name" class="text-danger" ></div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_ifsc">Bank IFSC</label>
                    <input type="text" class="form-control" id="bank_ifsc" name="bank_ifsc" placeholder="Enter IFSC Code" value="{{$data->bank_ifsc}}">
                    <div id="err_bank_ifsc" class="text-danger" ></div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="{{$data->state}}">
                    <div id="err_state" class="text-danger" ></div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{$data->city}}" >
                    <div id="err_city" class="text-danger" ></div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{$data->address}}"> </textarea>
                    <div id="err_address" class="text-danger" ></div>
                  </div>
                   <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="{{$data->country}}">
                    <div id="err_country" class="text-danger" ></div>
                  </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                    <label for="dob">Date Of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="Select Date of Birth" value="{{$data->dob}}">
                    <div id="err_dob" class="text-danger" ></div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="Status">Status</label>
                    <input type="text" class="form-control" id="is_active" name="is_active" placeholder="Enter Country" value="{{$data->is_active}}" readonly>
                    <div id="err_country" class="text-danger" ></div>
                  </div>
                   </div>
                
                  
                </div>

                <input type="hidden" name="id" id="id" value="{{$data->id}}">
                <!-- /.card-body -->

                <div class="card-footer">
                 <center> <button  type="submit" class="btn btn-primary ">Update</button></center>
                </div>
              </form>
            </div>
        </div>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script>
  function checkall()
  {
    
  err_email.innerHTML="";
  err_permission.innerHTML="";
  err_first_name.innerHTML="";
  err_mobile.innerHTML="";
  err_email1.innerHTML="";
  err_sponcer_id.innerHTML="";
  err_btc_address.innerHTML="";
  err_tron_address.innerHTML="";
  err_pan.innerHTML="";
  err_adhar.innerHTML="";
  err_bank_acc_no.innerHTML="";
  err_bank_ifsc.innerHTML="";
  err_bank_acc_holder_name.innerHTML="";
  err_city.innerHTML="";
  err_state.innerHTML="";
  err_country.innerHTML="";
  err_address.innerHTML="";
  err_dob.innerHTML="";
  err_is_Active.innerHTML="";
  err_user_type.innerHTML="";

  
  if(email.value=="")
    {
      err_email.innerHTML = "Please Enter Email";
      return false;
    }
    else if(permission.value==""){
    err_permission.innerHTML ="Select Permission";
     return false;
    }
    else if(first_name.value==""){
      err_first_name.innerHTML  ="Please Enter Name";
      return false;
    }
    else if(mobile.value=="" || mobile.value.length != 10){
      err_mobile.innerHTML ="Please Enter Mobile Number";
       return false;

    }
    else if(email1.value==""){
     err_email1.innerHTML ="Please Enter Email";
      return true;
    }
    else if(sponcer_id.value==""){
     err_sponcer_id.innerHTML ="Please Enter Sponcer ID";
      return true;
    }
     else if(btc_address.value){
     err_btc_address.innerHTML ="Please Enter BTC Address";
      return true;
    }
      else if(tron_address.value==""){
     err_tron_address.innerHTML ="Please Enter TRON Address";
      return true;
    }
    else if(pan.value==""){
     err_pan.innerHTML ="Please Enter Pan No";
      return true;
    }
      else if(adhar.value==""){
     err_adhar.innerHTML ="Please Enter Adhar No";
      return true;
    }
    else if(bank_acc_no.value==""){
     err_bank_acc_no.innerHTML=" Please Enter Bank Account No";
      return true;
    }
    else if(bank_ifsc.value==""){
     err_bank_ifsc.innerHTML=" Please Enter Bank Account No";
      return true;
    }
     else if(bank_acc_holder_name.value==""){
     err_bank_acc_holder_name.innerHTML=" Please Enter Bank Account Holder Name";
      return true;
    }
      else if(city.value==""){
     err_city.innerHTML=" Please Enter City";
      return true;
    }
     else if(state.value==""){
     err_state.innerHTML=" Please Enter State";
      return true;
    }
     else if(country.value==""){
     err_country.innerHTML=" Please Enter State";
      return true;
    }
    else if(address.value==""){
     err_address.innerHTML=" Please Enter Address";
      return true;
    }
       else if(dob.value==""){
     err_dob.innerHTML=" Select Date of Birth";
      return true;
    }
         else if(is_Active.value==""){
     err_is_Active.innerHTML=" Select Active";
      return true;
    }
         else if(user_type.value=="")
         {
       err_user_type.innerHTML=" Select Active";
      return true;
    }
     err_user_type.innerHTML


  }
</script>
    @include('admin.common.footer')

 