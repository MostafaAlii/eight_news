<!-- plugin_path -->
<script>
    var plugin_path = '{{ URL::asset('assets/js/') }}/';
</script>
<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatable/jquery_dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatable/dataTables_bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatable/dataTables_buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatable/buttons_233_bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/datatable/buttons_232_bootstrap4.min.js') }}"></script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->

<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script src="{{ URL::asset('assets/js/nicescroll/jquery.nicescroll.js') }}"></script>
<script src="{{ URL::asset('assets/js/switch/dist/switch.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@yield('js')
