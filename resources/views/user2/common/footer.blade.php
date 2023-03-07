    <!--=================================*
                  Footer Section
    *===================================-->
     <?php
            $data = DB::table('setting')
                ->first();
       ?>
    <footer>
       
        <div class="footer-area">
            <p>&copy; Copyright <?php echo date("Y"); ?>. All right reserved. {{$data->site_name}}.</p>
        </div>
    </footer>
    <!--=================================
                End Footer Section
    *===================================-->


<!--=========================*
        End Page Container
*===========================-->


<!--=========================*
            Scripts
*===========================-->

<!-- Jquery Js -->
<script src="{{url('/')}}/myadmin/assets/js/jquery.min.js"></script>
<!-- bootstrap 4 js -->
<script src="{{url('/')}}/myadmin/assets/js/popper.min.js"></script>
<script src="{{url('/')}}/myadmin/assets/js/bootstrap.min.js"></script>
<!-- Owl Carousel Js -->
<script src="{{url('/')}}/myadmin/assets/js/owl.carousel.min.js"></script>
<!-- Metis Menu Js -->
<script src="{{url('/')}}/myadmin/assets/js/metisMenu.min.js"></script>
<!-- SlimScroll Js -->
<script src="{{url('/')}}/myadmin/assets/js/jquery.slimscroll.min.js"></script>
<!-- Slick Nav -->
<script src="{{url('/')}}/myadmin/assets/js/jquery.slicknav.min.js"></script>
<!-- ========== This Page js ========== -->

<!-- start amchart js -->
<script src="{{url('/')}}/myadmin/assets/vendors/am-charts/js/ammap.js"></script>
<script src="{{url('/')}}/myadmin/assets/vendors/am-charts/js/worldLow.js"></script>
<script src="{{url('/')}}/myadmin/assets/vendors/am-charts/js/continentsLow.js"></script>
<script src="{{url('/')}}/myadmin/assets/vendors/am-charts/js/light.js"></script>
<!-- maps js -->
<script src="{{url('/')}}/myadmin/assets/js/am-maps.js"></script>

<!--Float Js-->
<script src="{{url('/')}}/myadmin/assets/vendors/charts/float-bundle/jquery.flot.js"></script>
<script src="{{url('/')}}/myadmin/assets/vendors/charts/float-bundle/jquery.flot.pie.js"></script>
<script src="{{url('/')}}/myadmin/assets/vendors/charts/float-bundle/jquery.flot.resize.js"></script>

<!--Chart Js-->
<script src="{{url('/')}}/myadmin/assets/vendors/charts/charts-bundle/Chart.bundle.js"></script>

<!--Easy pie chart Js-->
<script src="{{url('/')}}/myadmin/assets/vendors/charts/sparkline/easy-pie-chart.js"></script>

<!--Sparkline Js-->
<script src="{{url('/')}}/myadmin/assets/vendors/charts/sparkline/sparklines.js"></script>

<!--Apex Chart-->
<script src="{{url('/')}}/myadmin/assets/vendors/apex/js/apexcharts.min.js"></script>

<!--Home Script-->
<script src="{{url('/')}}/myadmin/assets/js/home.js"></script>

<!-- ========== This Page js ========== -->

<!-- Main Js -->
<script src="{{url('/')}}/myadmin/assets/js/main.js"></script>


</body>

<!-- Mirrored from rtsolutionz.com/vizzstudio/demo-falr/falr/dark-theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jul 2021 07:20:35 GMT -->
</html>
