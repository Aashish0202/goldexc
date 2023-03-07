  @include('user5.common.header')


       @include('user5.common.sidebar')
   <!-- main page content -->
        <div class="main-container container">
       <div class="page-wraper">
        
       <div class="page-content">
        <div class="container fb">
            <!-- row -->
            <div class="row"> 
             <div class="ms-auto">
                         @if(count($errors)>0)

                    <div class="alert alert-danger">

                      <!-- <button class="close" type="button" data-dismiss="alert">x</button> -->
                      <ul>
                          @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>
                          
                          @endforeach
                      </ul>
                    </div>
                  @endif
                     @include('user4.common.operation_status')
                    </div>
                                  
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Change Password</h5>
                        </div>
                        <div class="card-body">
                            <div class="basic-form style-1">
                                <form method="post" action="{{url('/')}}/user/change_password_post" enctype="multipart/form-data" onsubmit="return checkall()">
                                        @csrf
                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Old Password" name="old_password" id="old_password">
                                         <p id="old_password_err" class="text-danger"></p>
                                    </div>
                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password">
                                        <p id="new_password_err" class="text-danger"></p>
                                    </div>
                                    <div class="mb-3 form-input">
                                        <span class="input-icon">
                                           <i class="fa fa-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="c_password" id="c_password">
                                        <p id="c_password" class="text-danger"></p>
                                    </div>
                                     <input type="hidden" name="id" value="{{$data->id}}">
                                  
                                     <div class="col-sm-9">
                                <input type="submit" class="btn btn-primary px-4" id="submit" value="Save Changes" />
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>   
    </div>
  
    <!-- Menubar -->
  
      
      
     
    </div>
  </div>
  <!-- Menubar -->

    <!-- Theme Color Settings -->
  <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom">
        <div class="offcanvas-body small">
            <ul class="theme-color-settings">
                <li>
                    <input class="filled-in" id="primary_color_8" name="theme_color" type="radio" value="color-primary" />
          <label for="primary_color_8"></label>
                    <span>Default</span>
                </li>
                <li>
          <input class="filled-in" id="primary_color_2" name="theme_color" type="radio" value="color-green" />
          <label for="primary_color_2"></label>
                    <span>Green</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_3" name="theme_color" type="radio" value="color-blue" />
          <label for="primary_color_3"></label>
                    <span>Blue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_4" name="theme_color" type="radio" value="color-pink" />
          <label for="primary_color_4"></label>
                    <span>Pink</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_5" name="theme_color" type="radio" value="color-yellow" />
          <label for="primary_color_5"></label>
                    <span>Yellow</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_6" name="theme_color" type="radio" value="color-orange" />
          <label for="primary_color_6"></label>
                    <span>Orange</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_7" name="theme_color" type="radio" value="color-purple" />
          <label for="primary_color_7"></label>
                    <span>Purple</span>
                </li>
                <li>
          <input class="filled-in" id="primary_color_1" name="theme_color" type="radio" value="color-red" />
          <label for="primary_color_1"></label>
                    <span>Red</span>
                </li>
                <li>
          <input class="filled-in" id="primary_color_9" name="theme_color" type="radio" value="color-lightblue" />
          <label for="primary_color_9"></label>
                    <span>Lightblue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_10" name="theme_color" type="radio" value="color-teal" />
          <label for="primary_color_10"></label>
                    <span>Teal</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_11" name="theme_color" type="radio" value="color-lime" />
          <label for="primary_color_11"></label>
                    <span>Lime</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_12" name="theme_color" type="radio" value="color-deeporange" />
          <label for="primary_color_12"></label>
                    <span>Deeporange</span>
                </li>
            </ul>
        </div>
    </div>
  <!-- Theme Color Settings End -->
</div>



            
</div>



<script>
  function checkall()
  {
      old_password_err.innerHTML="";
      new_password_err.innerHTML="";
      c_password_err.innerHTML="";

      //alert("a");

      if(old_password.value=="")
      {
          old_password_err.innerHTML = "Please Enter Old Password";
          return false;
      }
      else if(new_password.value=="")
      {
          new_password_err.innerHTML = "Please Enter New Password";
          return false;
      }
      else if(c_password.value=="" || new_password.value!=c_password.value)
      {
          c_password_err.innerHTML = "Password Not Match";
          return false;
      }
  }
</script>
<script src="{{url('/')}}/fimobile/assets/js/jquery.js"></script>
<script src="{{url('/')}}/fimobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/settings.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/custom.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="{{url('/')}}/fimobile/assets/vendor/imageuplodify/imageuploadify.min.js"></script>
<script src="{{url('/')}}/fimobile/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script>
  $(document).ready(function() 
  {
    $('input[type="file"]').imageuploadify();
  })
</script>
</html>
  
    

        <!-- main page content ends -->


     
        <!-- Page ends-->


         @include('user5.common.footer')