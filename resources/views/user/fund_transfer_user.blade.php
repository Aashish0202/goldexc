
 	<!-- Header -->
    @include('user.common.header')

    <!-- Sidebar -->
    @include('user.common.sidebar')


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
                <h3 class="card-title">Fund Transfer User</h3>
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
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <div id="op_status">
     

    </div>
      @include('user.common.operation_status')
              <form action="{{url('/')}}/user/fund_transfer_user_post" method="post" onsubmit="return checkall()">
                @csrf
               
                <div class="card-body">
            
                <div class="col-11">
                  <div class="form-group col-md-12">
                    <label for="amount">Wallet Balance</label>
                    <input type="text" class="form-control" name="wallet_balance" id="wallet_balance" value="{{$wallet_balance['activation_wallet']}}"  readonly>
                     
                  </div>
                 </div>
                 <div class="col-11">
                   <div class="form-group col-md-12">
                    <label for="amount">Transfer Amount</label>
                    <input type="number" class="form-control" name="transfer_amount" id="transfer_amount" placeholder="Enter Transfer Amount">
                     <div id="err_transfer_amount" class="text-danger" ></div> 
                  </div>
                   <div class="col-11">
                   <div class="form-group col-md-12">
                    <label for="transfer_to">Transfer To</label>
                    <input type="text" class="form-control" name="transfer_to" id="transfer_to" placeholder="Enter Transfer To" onchange="usertrascheck()">
                     <div id="err_transfer_to" class="text-danger" ></div> 
                  </div>
                  </div>
                    
                    <hr>
                    <div class="form-group col-md-12">
                    <button  type="submit" class="btn btn-primary ">Sumbit</button>
                  </div>
</div>
</div>
               </div>
             </form>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  function usertrascheck()
    {
           var transfer_to = $('#transfer_to').val();
              // alert(user_id);
              $.ajax({
              url: "{{url('/')}}/usertrascheck",
              type: 'GET',
              data:
              {
                _method     : 'GET',
                transfer_to     : transfer_to,
              },
            success: function(response)
            {
              var response = JSON.parse(response);
              
              if(response.status == 'success')
              {

                 sweet('User ID is Correct','User ID is correct for' +response.name,'success','OKay.. Go Ahead');
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
  <script type="text/javascript">
   
   function checkall()
  {
    err_transfer_amount.innerHTML = "";
    err_transfer_to.innerHTML = "";
   
    if(transfer_amount.value=="")
    {
     err_transfer_amount.innerHTML = "Please Enter Transfer Amount";
      return false;
    }
   else if(transfer_to.value=="")
    {
      err_transfer_to.innerHTML = "Please Enter Transfer to ID";
      return false;
    }
    
  }
 </script>
 	<!-- footer -->
    @include('user.common.footer')

 