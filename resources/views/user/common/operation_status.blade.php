<div id="op_status">
    @if(Session::has('success'))
        <div id="card-alert" class="alert alert-success">
           <h4 class="alert-heading">Well done!</h4>
         
            <h5 style="color: black">{{ Session::get('success') }}</h5>
         
          <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
           <!-- <span aria-hidden="true">×</span>-->
          </button>
        </div>
    @endif 

    @if(Session::has('error'))
        <div id="card-alert" class="alert alert-danger">
           <h4 class="alert-heading">Something went wrong!</h4>
          
            <h5 style="color: black">{{ Session::get('error') }}</h5>
         
          <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
            <!--<span aria-hidden="true">×</span>-->
          </button>
        </div>
    @endif
</div>
