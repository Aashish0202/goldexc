<div id="op_status">
    @if(Session::has('success'))
        <div id="card-alert" class="alert alert-success">
           <h4 class="alert-heading">Well done!</h4>
         
            <h6 style="color: black">{{ Session::get('success') }}</h6>
         
           <!-- <span aria-hidden="true">×</span>-->
          </button>
        </div>
    @endif 

    @if(Session::has('error'))
        <div id="card-alert" class="alert alert-danger">
           <h4 class="alert-heading">Something went wrong!</h4>
          
            <h6 style="color: black">{{ Session::get('error') }}</h6>
         
            <!--<span aria-hidden="true">×</span>-->
          </button>
        </div>
    @endif
</div>
