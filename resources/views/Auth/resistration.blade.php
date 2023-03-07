  




        <?php

          $data_setting = DB::table('setting')->first();

         ?>




    <!-- ***************************************************-->


   <!doctype html>
    <html lang="en" class="h-100">


     <!-- Mirrored from maxartkiller.com/website/fimobile2/HTML/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Feb 2023 06:00:25 GMT -->
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grow your gold like you grow your money</title>
    <meta name="description" content="Lease your gold to Gold Exchange and earn 0.5 - 2% per day in the form of gold" />

    <meta name="keywords" content="Gold Exchnage, Buy Gold Exchnage" />
    <meta property="og:type" content="Artical" /><meta property="og:title" content="Gold Exchnage: Buy, Sell, Gift & SIP in Gold at Lowest Market Price" /><meta property="og:description" content="Gold Exchnage is India's most trusted digital platform for gold and silver where you can buy, sell and store online at live market rates." /><
    <meta property="og:url" content="http://www.goldexchnage.store" /><meta property="og:site_name" content="www.goldexchnage.store" />
    

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

    <!-- style css for this template -->
    <link href="{{url('/')}}/fimobile/assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="signin">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <div class="loader-cube-wrap loader-cube-animate mx-auto">
                    <img src="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}" alt="Logo">



                    <title>{{$data_setting->site_name}}</title>



                </div>
                <p class="mt-4">It's time for Gold Echange<br><strong>Please wait...</strong></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Begin page content -->
    <main class="container-fluid h-100">
        <div class="row h-100 overflow-auto">
            <div class="col-12 text-center mb-auto px-0">
                <header class="header">
                    <div class="row">
                        <div class="col-auto"></div>
                        <div class="col">
                            <div class="logo-small">
                                <img src="{{url('/')}}/public/site_logo/{{$data_setting->site_logo}}" alt="">
                                <h5>Gold Exchange</h5>
                            </div>
                        </div>
                        <div class="col-auto"></div>
                    </div>
                </header>
            </div>
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center text-center py-4">
                <h1 class="mb-4 text-color-theme">Create an Account</h1>

                <p class="mb-0">Please fill registration form below</p>






                   <div class="ms-auto">

                         @if(count($errors)>0)

                     <div class="alert alert-danger">

                     
                      <ul>
                          @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>
                          
                          @endforeach
                      </ul>
                    </div>
                  @endif
                     @include('user4.common.operation_status')
                    </div>




                 <form class="was-validated needs-validation"   onsubmit="return checkall()" action="{{url('/')}}/resistration_post" method="post"  novalidate>




                   {{ csrf_field() }}


                   


                    <div class="form-group form-floating mb-3 is-valid">
                        <input type="text" class="form-control"  id="sponcer_id" placeholder="Sponcer Id"  oninput="this.value = this.value.toUpperCase()" name="sponcer_id"  @if(isset($_GET['sponcer_id'])) value="{{$_GET['sponcer_id']}}" readonly @endif onchange="registercheck()"  >



                    <label class="form-control-label" for="username">Sponsor's User Name : <span style="color: green;" id="success_msg_sponcer">@if(isset($_GET['sponcer_id'])) {{$_GET['sponcer_id']}} @endif</span></label>




                    </div>

                    <div class="form-group form-floating mb-3 is-valid">
                      <input type="text" oninput="this.value = this.value.toUpperCase()" placeholder="User Id"  id="user_id" name="user_id"class="form-control">



                       <label class="form-control-label" for="username">Create User Name : </label>

                 </div>



                    <div class="form-group form-floating mb-3 is-valid">
              <input type="text" oninput="this.value = this.value.toUpperCase()" placeholder="User Name"  id="first_name" name="first_name" class="form-control">


                       <label class="form-control-label" for="username">Full name : </label>

            </div>



         
                    <div class="form-group form-floating mb-3 is-valid">
              <input type="tel" placeholder="User Mobile"  id="mobile" name="mobile"  class="form-control">

                       <label class="form-control-label" for="username">Mobile : </label>

          </div>

                    <div class="form-group form-floating mb-3 is-valid">
              <input type="mail" oninput="this.value = this.value.toUpperCase()" placeholder="User Email"  id="email1" name="email1"  class="form-control">

                       <label class="form-control-label" for="username">Email : </label>

          </div>


                    <div class="form-group form-floating mb-3 is-valid">
              <input type="password" placeholder="Password" id="password" name="password" class="form-control be-0">

               <label class="form-control-label" for="username">Password :
              </label>
          </div>


          <div class="form-group form-floating mb-3 is-valid">
              <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" class="form-control be-0">

               <label class="form-control-label" for="username">Confirm Password :
              </label>
          </div>


            <div class="form-group form-floating mb-3 is-valid">
              <input type="tel" placeholder="Mobile Number for used Jar"  id="jar" name="jar"  class="form-control">

                       <label class="form-control-label" for="username">Jar Mobile (Optional): </label>

          </div>


          <div class="form-group form-floating mb-3 is-valid">
              <input type="tel" placeholder="Mobile Number for used Digigold"  id="digigold" name="digigold"  class="form-control">
                       <label class="form-control-label" for="username">Digigold Mobile (Optional): </label>

          </div>


   <div class="form-group form-floating mb-3 is-valid">
              <input type="tel" placeholder="USDT (BEP20) Address"  id="usdt" name="usdt"  class="form-control">
                       <label class="form-control-label" for="username">USDT BEP20 Address: </label>

          </div>



        
               
         
        
                  <div class="input-group">
              <button type="submit" class="btn mt-2 btn-primary w-100 btn-rounded">Sign UP</button>
          </div>
          <p class="text-center">By tapping “Sign Up” you accept our <a href="javascript:void(0);" class="text-primary font-w700">terms</a> and <a href="javascript:void(0);" class="text-primary font-w700">condition</a></p>
                </form>

                <a href="{{url('/')}}/login" target="_self" class="">
                    Already Account, Click to sign in <i class="bi bi-arrow-right"></i>
                </a>


              

            </div>
        </div>





        
    </main>


    <!-- Required jquery and libraries -->
    <script src="{{url('/')}}/fimobile/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('/')}}/fimobile/assets/js/popper.min.js"></script>
    <script src="{{url('/')}}/fimobile/assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- cookie js -->
    <script src="{{url('/')}}/fimobile/assets/js/jquery.cookie.js"></script>

    <!-- Customized jquery file  -->
    <script src="{{url('/')}}/fimobile/assets/js/main.js"></script>
    <script src="{{url('/')}}/fimobile/assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="{{url('/')}}/fimobile/assets/js/pwa-services.js"></script>

    <!-- page level custom script -->
    <script src="{{url('/')}}/fimobile/assets/js/app.js"></script>




    <script>
// Vanilla Javascript
var input = document.querySelector("#mobile");
window.intlTelInput(input,({
// options here
}));



$(document).ready(function() {
$('.iti__flag-container').click(function() { 
var countryCode = $('.iti__selected-flag').attr('title');
var countryCode = countryCode.replace(/[^0-9]/g,'')
$('#mobile').val("");
$('#mobile').val("+"+countryCode+" "+ $('#mobile').val());
});
});
</script>


<script>

function checkall()
{
err_first_name.innerHTML = "";
err_user_id.innerHTML = "";
err_email1.innerHTML = "";
err_mobile.innerHTML = "";
err_password.innerHTML = "";
err_sponcer_id.innerHTML ="";


if(first_name.value=="")
{
err_first_name.innerHTML = "Please Enter First Name";
return false;
}
if(user_id.value=="")
{
err_user_id.innerHTML = "Please Enter User Name";
return false;
}

else if(email1.value=="")
{
err_email1.innerHTML = "Please Enter Email";
return false;
}
else if(mobile.value=="")
{
err_mobile.innerHTML = "Please Enter Valid Mobile Number";
return false;
}
else if(password.value=="")
{
err_password.innerHTML = "Please Enter Password";
return false;
}
else if(sponcer_id.value=="")
{
err_sponcer_id.innerHTML = "Please Enter Sponcer Id";
return false;
}
}

</script>






<script>
function registercheck()
{
 var sponcer_id = $('#sponcer_id').val();
     //alert(sponcer_id);
    $.ajax({
    url: "{{url('/')}}/registercheck",
    type: 'GET',
    data:
    {
      _method     : 'GET',
      sponcer_id     : sponcer_id,
    },
  success: function(response)
  {
    var response = JSON.parse(response);
    
    if(response.status == 'success')
    {

       sweet('Sponcer id is available','Sponcer ID is correct for ' +response.name,'success','OKay.. Go Ahead');
      // alert("Sponcer ID is Available");
      $('#success_msg_sponcer').text(response.name+" ✅");
     
    }
    else if(response.status == 'error')
    {
      // alert("Sponcer ID is Invalid");
       sweet('User ID is InCorrect','User ID is wrong','error','Enter Correct');
      $('#success_msg').text('');
      document.getElementById('sponcer_id').value="";
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
function usercheck()
{
var user_id = $('#user_id').val();
// alert(sponcer_id);
$.ajax({
    url: "{{url('/')}}/usercheck",
    type: 'GET',
    data: {
      _method: 'GET',
      user_id     : user_id,

    },
  success: function(response)
  {
    var response = JSON.parse(response);
    
    if(response.status == 'error')
    {
     // alert("User is already Exist");
      $('#success_msg').text('');
      $('#error_msg').text('User is already Exist');
    }


    else
    {
      /*alert("Sponcer ID is Invalid");
      $('#success_msg').text('');
      $('#error_msg').text('Sponcer id is invalid');*/
    }
  }
  });

}



</script>









<script src="{{url('/')}}/fimobile/assets/js/jquery.js"></script>
<script src="{{url('/')}}/fimobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/settings.js"></script>
<script src="{{url('/')}}/fimobile/assets/js/custom.js"></script>




  <script src="{{url('/')}}/fimobile/assets/js/jquery.min.js"></script>

<script>
$(document).ready(function () {
$("#show_hide_password a").on('click', function (event) {
event.preventDefault();
if ($('#show_hide_password input').attr("type") == "text") {
$('#show_hide_password input').attr('type', 'password');
$('#show_hide_password i').addClass("bx-hide");
$('#show_hide_password i').removeClass("bx-show");
} else if ($('#show_hide_password input').attr("type") == "password") {
$('#show_hide_password input').attr('type', 'text');
$('#show_hide_password i').removeClass("bx-hide");
$('#show_hide_password i').addClass("bx-show");
}
});
});
</script>

<script>
$(".switcher-btn").on("click", function() {
$(".switcher-wrapper").toggleClass("switcher-toggled")
}), $(".close-switcher").on("click", function() {
$(".switcher-wrapper").removeClass("switcher-toggled")
}),


$('#theme1').click(theme1);
$('#theme2').click(theme2);
$('#theme3').click(theme3);
$('#theme4').click(theme4);
$('#theme5').click(theme5);
$('#theme6').click(theme6);
$('#theme7').click(theme7);
$('#theme8').click(theme8);
$('#theme9').click(theme9);
$('#theme10').click(theme10);
$('#theme11').click(theme11);
$('#theme12').click(theme12);
$('#theme13').click(theme13);
$('#theme14').click(theme14);
$('#theme15').click(theme15);


function theme1() {
$('body').attr('class', 'bg-theme bg-theme1');
}

function theme2() {
$('body').attr('class', 'bg-theme bg-theme2');
}

function theme3() {
$('body').attr('class', 'bg-theme bg-theme3');
}

function theme4() {
$('body').attr('class', 'bg-theme bg-theme4');
}

function theme5() {
$('body').attr('class', 'bg-theme bg-theme5');
}

function theme6() {
$('body').attr('class', 'bg-theme bg-theme6');
}

function theme7() {
$('body').attr('class', 'bg-theme bg-theme7');
}

function theme8() {
$('body').attr('class', 'bg-theme bg-theme8');
}

function theme9() {
$('body').attr('class', 'bg-theme bg-theme9');
}

function theme10() {
$('body').attr('class', 'bg-theme bg-theme10');
}

function theme11() {
$('body').attr('class', 'bg-theme bg-theme11');
}

function theme12() {
$('body').attr('class', 'bg-theme bg-theme12');
}

function theme13() {
$('body').attr('class', 'bg-theme bg-theme13');
}

function theme14() {
$('body').attr('class', 'bg-theme bg-theme14');
}

function theme15() {
$('body').attr('class', 'bg-theme bg-theme15');
}
</script>



</body>


</html>


