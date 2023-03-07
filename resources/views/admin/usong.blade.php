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
          
        </div>
      </div><!-- /.container-fluid -->
    </section>


	<section class="content" >
      <div class="container-fluid">
      <h1>Event</h1>
           <div class="row">
           <div class="col-md-12">
             <div class="info-box">
              <form action="{{url('/')}}/admin/event_post" enctype="multipart/form-data" method="post">
              	@csrf
              	 <div class="col-md-12">

  			<div class="form-group">
    			<label>Event Title</label>
   				 <input type="text" class="form-control"  id="event_title"
   				 name="event_title"style="width: 100%">   				
  			</div>

       <div class="form-group">
           <label >Description</label>
           <textarea type="text-area" class="form-control" id="description" name="description"  style="width:200%; height:100%"></textarea>
       </div>

     

      <div class="form-group">
          <label>Venu/VC Meeting</label>
           <input type="text" class="form-control"  id="meet"
           name="meet"style="width: 100%">           
      </div>

      <div class="form-group">
          <label>Address</label>
           <input type="text" class="form-control"  id="address"
           name="address"style="width: 100%">           
      </div>


    <div class="row">

<div class="col-md-6">
     <div class="form-group">
        <label>Evetn start Time And Date</label><br>
         <input type="datetime-local" id="starttime" name="starttime">
      </div>
</div>
<div class="col-md-6">
     <div class="form-group">
        <label>Event end Time And Date</label><br>
         <input type="datetime-local" id="endtime" name="endtime">
      </div>
</div>
</div>

        <div class="input-field col-md-6 s12">
               <p> <label>Payment Mode</label></p>
                    <p> <label>
                        <input type="radio" id="status" name="status" value="online" onchange = "verifyAnswer(this)">
                        <span> Online</span>
                      </label></p>

              <div id="installment_date_div" style="display: none;">
                 <input type="text" name="status" id="status" placeholder="Address">
              </div>
            
             <p><label>
                <input type="radio" id="status" name="status" value="off_line" onchange = "verifyAnswer(this)">
                      <span>Off line</span>
                      </label></p>                          
               <div id="estimated_amount_div" style="display: none;">
                 <input type="text" name="status" id="status" placeholder="VC Link">
               </div>
               

              </div>
               <div class="custom-file ">
          <input type="file" class="custom-file-input" id="file"
            name="image">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
 <div class="row mt-3">

<div class="col-md-6">
     <div class="form-group">
        <label>Display start Time And Date</label><br>
         <input type="datetime-local" id="displaystart" name="displaystart">
      </div>
</div>
<div class="col-md-6">
     <div class="form-group">
        <label>Dislpay end Time And Date</label><br>
         <input type="datetime-local" id="displayend" name="displayend">
      </div>
</div>
</div>
         <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </div>


       
  		</div>

 			
		</form>





            </div>
            <!-- /.info-box -->
           </div>
        </div></div></section>   
             
      
           
           </div>
           </div><hr>


 

  </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
    
 	<!-- footer -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script >
  function verifyAnswer(status) {
    
      var myval = $("input[type='radio'][name='status']:checked").val();

    if (myval == 'online') {

         document.getElementById('installment_date_div').style.display ='block';
    
   
  } else {
    //enable all the radio button
             document.getElementById('installment_date_div').style.display ='none';

     document.getElementById('estimated_amount_div').style.display ='block';
    
  }
}
    
  

</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script>


    @include('admin.common.footer')

 