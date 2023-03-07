   @include('user.common.header')

    <!-- Sidebar -->
    @include('user.common.sidebar')


     @yield('content')


     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>@if(isset($_GET['title'])){{$_GET['title']}}@endif Report</h1>
              </div>
<!--               <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">DataTables</li>
                </ol>
              </div> -->
            </div>
          </div><!-- /.container-fluid -->
        </section>
  <div id="op_status">
     

    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card" >

              <div class="card-body" >
                  <table id="example2" class="table table-bordered table-striped">
                      <thead>
                     <tr>
                                      <th>Sender</th>
                                      <th>Reciver</th>
                                      <th>Amount</th>
                                      <th>Package</th>
                                      <th>Approval</th>
                                      
                                      <th>Date</th>
                                     
                                  </tr>
                             
                              
                                  @foreach($data as $arr_data)

                                   <tr>
                                    
                                      <td>{{$arr_data->sender}} | {{$arr_data->reciver}}</td>
                                      <td>{{$arr_data->reciver}}</td>
                                      <td>{{$arr_data->amount}}</td>
                                      <td>{{$arr_data->package}}</td>
                                      <td>{{$arr_data->approval}}</td>
                                      
                                      <td>{{$arr_data->date}}</td>
                                     
                                   
                                   </tr>
                         @endforeach
                    
                    
                      </tbody>
                    
                  </table>
              </div>
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 	<!-- footer -->

<script>


var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

if( isMobile.any() ) 
  {
    // alert('Mobile');
    
    var divsToHide = document.getElementsByClassName("icon");
   for(var i = 0; i < divsToHide.length; i++){
        divsToHide[i].style.visibility = "inline"; // or
       
    }
    

    }

    else
    {
      // alert('Window');
        var divsToHide = document.getElementsByClassName("icon");
   for(var i = 0; i < divsToHide.length; i++){
        divsToHide[i].style.visibility = "hidden"; // or
       
    }
    }
 
       
</script>

  
    @include('user.common.footer')