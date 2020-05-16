<!-- jQuery -->
<script src="{{  asset('js/app.js') }}"></script>

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
<!-- overlayScrollbars -->
<script src="{{  asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{  asset('dist/js/adminlte.js') }}"></script>

{{-- Select 2 --}}
<script src="{{  asset('plugins/select2/js/select2.full.min.js') }}"></script>

{{-- SWAL ALERT 2 --}}
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@9"> </script>

<!-- daterangepicker -->
<script src="{{  asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{  asset('plugins/daterangepicker/daterangepicker.js') }}"></script>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('#reservation').daterangepicker();
        $('.select2').select2()
    });

</script>
