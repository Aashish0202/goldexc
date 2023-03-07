@include('user.common.header ')

  <!-- Main Sidebar Container -->
 
 
      @include('user.common.sidebar ')

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
          <div class="col-md-8 mt-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Active Package</h3>
            
              </div>
              <!-- /.card-header -->
              <!-- form start -->
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
              <form action="{{url('/')}}/user/package_active_post" method="post" onsubmit="return checkall()">
                           

                 {{ csrf_field() }}
                <div class="card-body">
            
                <div class="col-11">
                  <div class="form-group col-md-12">
                    <label for="package_name">User Id</label>
                   <!--  <?php
                        $data = DB::table('users')
                                  ->where('id','=',)
                                    ->get();
                    ?> -->
                    <input type="text" class="form-control" name="user_id" id="user_id" placeholder="Enter User Name"  value="{{$user->email}}" onchange="useridcheck()">
                       <span style="color:green;" id="success_msg"></span>
                      <!--  <span style="color:red;" id="error_msg"></span> -->
                  </div>
                
                 </div>
                 <div class="col-11">
                   <div class="form-group col-md-12">
                    <label for="amount">Wallet Balance</label>
                    <input type="number" class="form-control" name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['activation_wallet']}}" placeholder="Enter Wallet Balance" readonly="true">
                    
                  </div>



                   <div class="col-12">
                   <div class="form-group col-md-12">
                    <label for="amount">Select Package</label>
                    <?php  $package = DB::table('package')
                    ->orderby('amount','asc')
                    ->get(); ?>
                    <select name="package" id="package" class="form-control">
                      <option value="">Select Package</option>
                      @foreach($package as $package)
                       
                        <option value="{{$package->amount}}">{{$package->amount}}</option>
                      @endforeach
                    </select>
                     <div id="package_err" class="text-danger"></div>
                  </div>
                           
                    <hr>
                    <div class="form-group col-md-12">
                    <button  type="submit" class="btn btn-primary ">Activate Package</button>
                  </div>

               </div>
             </form>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script>
  
  function checkall()
  {
    package_err.innerHTML = "";
    if(package.value=="")
    {
      package_err.innerHTML = "Please Select Package";
      return false;
    }
  }
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  function useridcheck()
    {
           var user_id = $('#user_id').val();
              // alert(user_id);
              $.ajax({
              url: "{{url('/')}}/useridcheck",
              type: 'GET',
              data:
              {
                _method     : 'GET',
                user_id     : user_id,
              },
            success: function(response)
            {
              var response = JSON.parse(response);
              
              if(response.status == 'success')
              {

                 sweet('User ID is Correct','User ID is correct for'+response.name,'success','OKay.. Go Ahead');
                // alert("Sponcer ID is Available");
                $('#success_msg').text(response.name);
                $('#error_msg').text('');
              }
              else if(response.status == 'error')
              {
                // alert("Sponcer ID is Invalid");
                 sweet('User ID is InCorrect','User ID is wrong','error','Enter Correct');
                $('#success_msg').text('');
                $('#error_msg').text('User_id is invalid');
              }
              
            }
            });

      
    }
</script>


 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script type="text/javascript">
     function sweet(title,text,icon,confirmButtonText)
    {
       Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: confirmButtonText
    })

    }
 
   

  </script>

 @include('user.common.footer')