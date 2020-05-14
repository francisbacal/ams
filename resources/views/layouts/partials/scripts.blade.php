<!-- jQuery -->
<script src="{{  asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{  asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="{{  asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{  asset('plugins/chart.js/Chart.min.js') }}"></script>

<!-- daterangepicker -->
<script src="{{  asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{  asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- overlayScrollbars -->
<script src="{{  asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{  asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="dist/js/pages/dashboard.js"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{  asset('dist/js/demo.js') }}"></script>

{{-- SWAL ALERT 2 --}}
<script src="{{  asset('js/sweetalert2.js') }}"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

</script>
