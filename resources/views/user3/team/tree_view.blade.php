   @include('user3.common.header')


       @include('user3.common.sidebar')

     @yield('content')

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <style>

#grad1 {
  background-image: linear-gradient(to right, rgb(24 119 242), rgb(24 119 242));
  width:100%;
  color:white;
}

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#26262c;
  display:none;
}  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:850px;
  display:none;
  z-index:9999;
  padding:20px;
  border-radius: 5px;
  text-align: center;
}
#boxes #dialog {
  width:300px; 
  height:auto;
  padding: 10px 10px 10px 10px;
  background-color:#ffffff;
  font-size: 15pt;
}

.agree:hover{
  background-color: #D1D1D1;
}
.popupoption:hover{
 background-color:#D1D1D1;
 color: green;
}
.popupoption2:hover{
 color: red;
}

</style>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body class="">

 <center> <a href="{{url('/')}}/user/dashboard"><button class="mt-5 btn btn-danger my-4 " > <b>Back to the Dashboard</b></button></a></center>
        



  <div class="container" >
      <form>
      <div>
        <div class="container" style="border: 1px solid black;margin-top: 10px;border-color: cyan;">
        
          <div class="row">

              <div class="" style="background-color: cyan;margin-right:0px;padding: 20px"><label class="form-label">Search Member</label></div>
              <!-- <div class="mt-4" align="left"> <label class="form-label">Search Member</label></div> -->
              <form method="get" action="{{url('/')}}/user/tree_view">
              <input type="text" class="form-control" aria-describedby="Search" id="user_id" name="user_id" style="margin: 18px; width: 500px;border-color: cyan;">
            <button type="submit" class="btn btn-primary" style="width: 100px;margin: 20px;">Search</button>
            </form>
          
      </div>
        </div>
        
       </div>

  </form>

  <a href="javascript:void(0);"><button class="mt-4 btn btn-success float-right my-4" onclick="window.print()"> <i class="fa fa-print" aria-hidden="true"></i> Print this page</button></a>

<div class="container"  id="printableArea"></div>

  <center><table class="table" style="width:100% ; margin-top: 100px;">
    <tr bgcolor="orange" align="center">
      <th>User ID</th>
      <th>Name</th>
      <th>Date Of Joining</th>
      <th>Total Inactive Member</th>
      <th>Total Active Member</th>
      
    </tr>
    <tr align="center">
      <td>{{$user->email}} <img src="{{url('/')}}/public/profile_image/user_tree.png" style="height: 20px;width:25px ;"></td>
      <td>{{$user->first_name}}</td>
      <?php $date_act = date('d-m-Y H:i:s', strtotime($user->created_at. ' + '.('270').' minutes')); ?>
      <td>{{$date_act}}</td>
      <td>{{$wallet_balance['total_team_inactive']}}</td>
      <td>{{$wallet_balance['total_team_active']}}</td>
     
      
      
    </tr>
   
    
  </table></center>

  <br></br>

  
 <center> <a href="javascript:void(0);"><button class="mt-4 btn btn-danger float-right my-4" onclick="history.back()" > <i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back .</button></a>
  </center>
<div class="tree">


<ul>
    <li style="width: max-content;">

      <div class="tooltip">Hover over me
  <span class="tooltiptext">Tooltip text</span>
</div>

      @if($user->is_active == "active")
        @if($user->is_active_10 == "active")
         <a data-toggle="tooltip" data-placement="top" title="{{$user->first_name}} | {{$user->mobile}} | {{$user->is_active_10}}" href="#" style ="background-color:yellowgreen; color:#fff;"><img src="{{url('/')}}/public/profile_image/user_tree.png" style="height:25px;width: 30px"> 

        @else
         <a data-toggle="tooltip" data-placement="top" title="{{$user->first_name}} {{$user->mobile}} | {{$user->is_active_10}}" href="#" style ="background-color:green; color:#fff;"><img src="{{url('/')}}/public/profile_image/user_tree.png" style="height:25px;width: 30px">

        @endif
      
       
         <h5><b>{{$user->email}}</b></h5></a>
         @else
        <a data-toggle="tooltip" data-placement="top" title="{{$user->first_name}} {{$user->mobile}}"  href="#" style ="background-color:red; color:#fff;"><img src="{{url('/')}}/public/profile_image/user_tree.png" style="height:25px;width: 30px">
       
         <h5><b>{{$user->email}}</b></h5></a>
         @endif
        


      <ul>
        <?php $sponcer1_data = DB::table('users')->where('sponcer_id','=',$user->email)->get(); ?>
          @foreach($sponcer1_data as $key=>$value)
        <li>
           @if($value->is_active == "active")

           @if($value->is_active_10 == "active")

            <a  data-toggle="tooltip" data-placement="top" title="{{$value->first_name}} {{$value->mobile}}"  href="{{url('/')}}/user/tree_view?user_id={{$value->email}}" style ="background-color:blue; color:#fff;"><b>{{$value->email}}</b></a>

        @else
         <a  data-toggle="tooltip" data-placement="top" title="{{$value->first_name}} {{$value->mobile}}"  href="{{url('/')}}/user/tree_view?user_id={{$value->email}}" style ="background-color:green; color:#fff;"><b>{{$value->email}}</b></a>

        @endif

        

          
            @else
            <a data-toggle="tooltip" data-placement="top" title="{{$value->first_name}} {{$value->mobile}}" href="{{url('/')}}/user/tree_view?user_id={{$value->email}}" style ="background-color:red; color:#fff;"><b>{{$value->email}}</b></a>
            @endif
           
          <ul>
          <?php $sponcer2_data = DB::table('users')->where('sponcer_id','=',$value->email)->get(); ?>
          @foreach($sponcer2_data as $key1=>$value1)
            <li>
              @if($value1->is_active == "active")
              @if($value1->is_active_10 == "active")
              <a data-toggle="tooltip" data-placement="top" title="{{$value1->first_name}} {{$value1->mobile}}" href="{{url('/')}}/user/tree_view?user_id={{$value1->email}}" style ="background-color:blue; color:#fff;">{{$value1->email}}</a>
              @else
              <a data-toggle="tooltip" data-placement="top" title="{{$value1->first_name}} {{$value1->mobile}}" href="{{url('/')}}/user/tree_view?user_id={{$value1->email}}" style ="background-color:green; color:#fff;">{{$value1->email}}</a>

              @endif
               @else
                <a data-toggle="tooltip" data-placement="top" title="{{$value1->first_name}} {{$value1->mobile}}" href="{{url('/')}}/user/tree_view?user_id={{$value1->email}}" style ="background-color:red; color:#fff;">{{$value1->email}}</a>
              @endif

              <ul>
          <?php $sponcer3_data = DB::table('users')->where('sponcer_id','=',$value1->email)->get(); ?>
          @foreach($sponcer3_data as $key2=>$value2)
            <li>
              @if($value2->is_active == "active")
              @if($value2->is_active_10 == "active")
              <a data-toggle="tooltip" data-placement="top" title="{{$value2->first_name}} {{$value2->mobile}}" href="{{url('/')}}/user/tree_view?user_id={{$value2->email}}" style ="background-color:blue; color:#fff;">{{$value2->email}}</a>
              @else
              <a data-toggle="tooltip" data-placement="top" title="{{$value2->first_name}} {{$value2->mobile}}" href="{{url('/')}}/user/tree_view?user_id={{$value2->email}}" style ="background-color:green; color:#fff;">{{$value2->email}}</a>

              @endif
              @else
              <a data-toggle="tooltip" data-placement="top" title="{{$value2->first_name}} {{$value2->mobile}}" href="{{url('/')}}/user/tree_view?user_id={{$value2->email}}" style ="background-color:red; color:#fff;">{{$value2->email}}</a>
              @endif
            </li>
            @endforeach
          </ul>
            </li>
            @endforeach
          </ul>
        </li>
        @endforeach
        
      </ul>
    </li>
  </ul>
</div>
</div>

</div>


</body>


      <style>
table, th, td {
  border:1px solid black;
}

* {margin: 0; padding: 0;}

.tree ul {
  padding-top: 20px; position: relative;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

.tree li {
  float: left; text-align: center;
  list-style-type: none;
  position: relative;
  padding: 20px 5px 0 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/We will use ::before and ::after to draw the connectors/

.tree li::before, .tree li::after{
  content: '';
  position: absolute; top: 0; right: 50%;
  border-top: 1px solid #ccc;
  width: 50%; height: 20px;
}
.tree li::after{
  right: auto; left: 50%;
  border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
  display: none;
}

/Remove space from the top of single children/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
  border: 0 none;
}
/Adding back the vertical connector to the last nodes/
.tree li:last-child::before{
  border-right: 1px solid #ccc;
  border-radius: 0 5px 0 0;
  -webkit-border-radius: 0 5px 0 0;
  -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
  border-radius: 5px 0 0 0;
  -webkit-border-radius: 5px 0 0 0;
  -moz-border-radius: 5px 0 0 0;
}

Time to add downward connectors from parents/
.tree ul ul::before{
  content: '';
  position: absolute; top: 0; left: 50%;
  border-left: 1px solid #ccc;
  width: 0; height: 20px;
}

.tree li a{
  border: 1px solid #ccc;
  padding: 5px 10px;
  text-decoration: none;
  color: #666;
  font-family: arial, verdana, tahoma;
  font-size: 11px;
  display: inline-block;
  
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}


.tree li a:hover, .tree li a:hover+ul li a {
  background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}

.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
  border-color:  #94a0b4;
}
</style>

</head>
<body>


<style>

  /*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
  padding-top: 20px; position: relative;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

.tree li {
  float: left; text-align: center;
  list-style-type: none;
  position: relative;
  padding: 20px 5px 0 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
  content: '';
  position: absolute; top: 0; right: 50%;
  border-top: 1px solid #ccc;
  width: 50%; height: 20px;
}
.tree li::after{
  right: auto; left: 50%;
  border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
  display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
  border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
  border-right: 1px solid #ccc;
  border-radius: 0 5px 0 0;
  -webkit-border-radius: 0 5px 0 0;
  -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
  border-radius: 5px 0 0 0;
  -webkit-border-radius: 5px 0 0 0;
  -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
  content: '';
  position: absolute; top: 0; left: 50%;
  border-left: 1px solid #ccc;
  width: 0; height: 20px;
}

.tree li a{
  border: 1px solid #ccc;
  padding: 5px 10px;
  text-decoration: none;
  color: #666;
  font-family: arial, verdana, tahoma;
  font-size: 11px;
  display: inline-block;
  
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
  background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
  border-color:  #94a0b4;
}

.scrollmenu {
 
  overflow: auto;
  white-space: nowrap;
}


/*Thats all. I hope you enjoyed it.
Thanks :)*/
</style>
<script type="text/javascript">$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>