@include('user3.common.header')


@include('user3.common.sidebar')

<?php
   $data_setting = DB::table('setting')->first();
   $user = Sentinel::check();     
    ?>

<div class="page-wrapper">
     <div class="page-content">
         <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
             <div class="breadcrumb-title pe-3">Structure</div>
             <div class="ps-3">
                 <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                         <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                         </li>
                         <li class="breadcrumb-item active" aria-current="page">Autopool Details</li>
                     </ol>
                 </nav>
             </div>
             <div class="ms-auto">
                 <div class="btn-group">
                    
                 </div>
             </div>
         </div>
         <!--end breadcrumb-->
        <div class="row">
   <div class="col-xl-9 mx-auto">
     <h6 class="mb-0 text-uppercase">Autopool Income </h6>
     <hr/>
     <div class="card">
       <div class="card-body">
         <table class="table mb-0">
           <thead>

             <tr>
             
               <th scope="col">Member</th>
              
               <th scope="col">Credit Up</th>
                <th scope="col">Credit In</th>
             </tr>
           </thead>

           <tbody>
             
             <tr>
               
               <td>1</td>
               <td>20</td>
               <td>20</td>
     
             </tr>

           

            
           </tbody>
         </table>
       </div>
     </div>
     <hr>


     <h6 class="mb-0 text-uppercase">Autopool Report</h6>
     <hr/>
     <div class="card">
       <div class="card-body">
         <table class="table">
           <thead>
             <tr>
               <th scope="col">Member Name</th>
               <th scope="col">Amount</th>
               <th scope="col">Date</th>
             </tr>
           </thead>
            <tbody>
             <tr>
            
               <td>Ashish</td>
               <td>35</td>
               <td></td>
            
             </tr>

             
           </tbody>
           
         </table>
       </div>
     </div>
     
   
     
   
     
   </div>
 </div>
         
         
     </div>
 </div>
 <footer class="footer">
     <p class="mb-0">Copyright © 2021. All right reserved.</p>
 </footer>
</div>
<style>
.footer {
position: fixed;
left: 0;
bottom: 0;
width: 100%;

color: white;
text-align: center;
}
</style>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="{{url('/')}}/new_theme/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{url('/')}}/new_theme/assets/js/jquery.min.js"></script>
<script src="{{url('/')}}/new_theme/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{url('/')}}/new_theme/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{url('/')}}/new_theme/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{url('/')}}/new_theme/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/new_theme/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>


<!-- <script>
 $(document).ready(function() {
     $('#example').DataTable(
       
       );
     $("div.dataTables_filter input").focus();
   } );
</script> -->


<script>

$(document).ready(function() {
$('#example').DataTable()
});
</script>


<script>
 $(document).ready(function() {
     var table = $('#example2').DataTable( {
         lengthChange: false,
         buttons: [ 'copy', 'excel', 'pdf', 'print']
     } );
  
     table.buttons().container()
         .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
 } );
</script>
<!--app JS-->
<script src="{{url('/')}}/new_theme/assets/js/app.js"></script>     

</body>


</html>   