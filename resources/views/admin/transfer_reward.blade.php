 	<!-- Header -->
    @include('admin.common.header')

    <!-- Sidebar -->
    @include('admin.common.sidebar')


     @yield('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 ml-5">
            <!-- <h1>Change Password</h1> -->
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Site Setting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content ml-5" >
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 mt-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Password Setting</h3>
              </div>
              @include('admin.common.operation_status')
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
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('/')}}/admin/transfer_reward_post" method="post" enctype="multipart/form-data" onsubmit="return checkall()"> @csrf
                <div class="card-body">
                  <div class="row">
                   

                     <div class="col-md-6">
                    <div class="form-group">
                    <label for="marquee">Enter User ID</label>
                    <input class="form-control" onchange="registercheck()" id="user_id" name="user_id" />
                   <div id="marquee_err" class="text-danger"></div>
                  </div>
                </div>


                   <div class="col-md-6">
                    <div class="form-group">
                    <label for="marquee">Enter Amount</label>
                    <input class="form-control" id="amount" name="amount" />
                   <div id="marquee_err" class="text-danger"></div>
                  </div>
                </div>

                



            
                                 

                
                  
             
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         

       
          
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>


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




<script>
  function registercheck()
    {
           var user_id = $('#user_id').val();
               //alert(user_id);
              $.ajax({
              url: "{{url('/')}}/package_user_check",
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

                 sweet('User Name/ID is available','User Name/ ID is correct for '+response.name,'success','OKay.. Go Ahead');
                 //alert(response.name);
                $('#success_msg_sponcer').text(response.name+" ✅");
               
              }
              else if(response.status == 'error')
              {
                // alert("Sponcer ID is Invalid");
                 sweet('User ID/User Name is InCorrect','User ID is wrong','error','Enter Correct');
                $('#success_msg').text('');
                document.getElementById('sponcer_id').value="";
              }
            
              
            }
            });

      
    }
</script>

 


    <!-- footer -->
    @include('admin.common.footer')

 