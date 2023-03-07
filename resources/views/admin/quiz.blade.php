  @include('admin.common.header ')
  <!-- Main Sidebar Container -->
 
      @include('admin.common.sidebar ')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: #fff;">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Quations</h1>
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
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" /> -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css" type="text/css" />

<body>


  <div class="container-fluid">

                        

   <div> <a href="{{url('/')}}/admin/quiz"  class="btn btn-danger float-right mb-5 ">Go Back</a></div>   
<style type="text/css">/* Styles go here */

/* Column Filter row at top of table  */
.datatable tfoot {
  display: table-header-group;
}

.datatable tfoot .filter-column {
  width: 100% !important;
}</style>


    <table id="example" class="datatable table table-hover table-bordered">

      <thead>
          <tr>
                        <th>Sr.No</th>
                       <th>Quation</th>

                       <th> Option 1</th>
                       <th style="width: 60.8889px;"> Option 2</th>
                       <th  style="width: 60.8889px;"> Option 3</th>
                       <th  style="width: 60.8889px;"> Option 4</th>

                       <th  style="width: 60.8889px;">Right Answer</th>
                       <th  style="width: 60.8889px;">Show Date</th>
                       <th  style="width: 60.8889px;">Show Time</th>
                        <th  style="width: 60.8889px;">End Time</th>
                        <th  style="width: 60.8889px;">Only Booking</th>
                        <th>Edit</th>
                      
                       <th>Delete</th>
                       

                      </tr>
      </thead>
      <tfoot>
        <tr>
          <th></th>
          <th>
            <input type="text" class="form-control input-sm filter-column" readonly="true">
          </th>
          <th>
            <input type="text" class="form-control input-sm filter-column" readonly="true">
          </th>
          <th>
            <select class="form-control input-sm filter-column" readonly="true">
              <option value="">S</option>
              <option value="">B</option>
              <option value="">C</option>
            </select>
          </th>
        </tr>
      </tfoot>
      
       <tbody>
                        
                        
                          @foreach($data as $key=>$value)
                        
                      <tr>
                       <td>{{$key+1}}</td>
                       <td>{{$value->quation}}</td>
                       <td>{{$value->option_1}}</td>
                       <td>{{$value->option_2}}</td>

                       <td>{{$value->option_3}}</td>
                      <td>{{$value->option_4}}</td>
                       <td class="text-success"><b> {{$value->right_ans  }} </b></td>
                       <td>{{$value->date}}</td>
                       <td>{{$value->time}}</td>
                        <td>{{$value->to_time}}</td>

                         <td>{{$value->booking}}</td>

                       <td><a href="{{url('/')}}/admin/quiz_edit?id={{$value->id}}" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                       <td><a href="{{url('/')}}/admin/quiz_delete?id={{$value->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

                         
                      </tr>
                      @endforeach
                      
                      </tbody>
       
    </table>
  </div>
  
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <!-- Responsive extension -->
  <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
  <!-- Buttons extension -->
  <script src="//cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
  
  <script src="script.js"></script>



<script type="text/javascript">
// Code goes here

var dataTable = $('.datatable').DataTable({
  buttons: [
    {
      extend: 'excel',
      text: 'Export to Excel',
      className: 'btn-sm btn-flat',
    },
  ],
  dom: "<'row'<'col-md-3'l><'col-md-6 text-center'B><'col-md-3'f>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-md-5'i><'col-md-7'p>>",
  drawCallback: function(settings) {
    if (!$('.datatable').parent().hasClass('table-responsive')) {
      $('.datatable').wrap("<div class='table-responsive'></div>");
    }
  }
});

dataTable.columns().every(function() {
  var column = this;

  $('.filter-column', this.footer()).on('keyup change', function() {
    if (column.search() !== this.value) {
      column
        .search(this.value)
        .draw();
      this.focus();
    }
  });
});
</script>
<script type="text/javascript">
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



  
  @include('admin.common.footer')
