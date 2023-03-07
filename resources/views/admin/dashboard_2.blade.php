 	<!-- Header -->
    @include('admin.common.header')

    <!-- Sidebar -->
    @include('admin.common.sidebar')


     @yield('content')



<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<section class="content" >
      <div class="container-fluid">
       

           <div class="row">
           
             
            


      


           <div class="col-md-3 col-sm-6 col-12">
            <a>
            <div class="info-box">
              <span class="info-box-icon bg-gray"><i class="fa-regular fa fa-calculator"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Balance</span>
                <span class="info-box-number">{{$sum}} $</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>



           

        <!--  -->


        </div>

  </div>
          <!--/.col (left) -->
        
    
 	<!-- footer -->
   

 