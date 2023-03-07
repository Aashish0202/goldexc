 <footer class="main-footer">
  <?php
        $data = DB::table('setting')
                ->first();



  ?>
 
    <strong>Copyright  <?php echo date("Y"); ?>  &copy; <a href="#">{{$data->site_name}}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/moment/moment.min.js"></script>
<script src="{{url('/')}}/bower_components/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{url('/')}}/bower_components/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/bower_components/admin-lte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/')}}/bower_components/admin-lte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('/')}}/bower_components/admin-lte/dist/js/pages/dashboard.js"></script>



<script src="{{url('/')}}/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/jszip/jszip.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{url('/')}}/bower_components/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



<script type="text/javascript">
    
     $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


   $('#example2').DataTable( {
       "responsive": true,
       "ordering": true,
       "info": true,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            'csv','pdf'
        ]
    } );


  });
  </script>


</body>
</html>
