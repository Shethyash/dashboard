    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <!-- <script src="{{ asset('public/assets/libs/jquery/dist/jquery.min.js')}}"></script> -->
    <script src="{{ asset('js/app.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <!--Menu sidebar -->
    <script src="{{ asset('assets/dist/js/sidebarmenu.js')}}"></script>
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/dist/js/waves.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{ asset('assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{ asset('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('assets/dist/js/pages/chart/chart-page-init.js')}}"></script>

    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
    <script src="{{ asset('assets/dist/js/thresold.js')}}"></script>    <!-- // COMMON NOTIFICATION AND FUNCTION WILL STORE HERE -->
    <script src="{{ asset('js/ajaxcall.js')}}"></script> <!-- // ALL AJAX CALL WILL FIRE FROM HERE --> 
    <script src="{{ asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{ asset('assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{ asset('assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/dist/js/pages/mask/mask.init.js')}}"></script>

    @if(Session::has('flash_message'))
        <script>    model_popup("{{session('flash_message')[0]}}","{{session('flash_message')[1]}}","{{session('flash_message')[2]}}"); </script>
    @endif
            <footer class="footer text-center">
            Artisry admin. Designed and Developed by <a href="#">Yash</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
</body>
</html>