
<script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
  </script>



<script src="/themeadmin/plugins/jquery/jquery.min.js"></script>
<script src="/themeadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/themeadmin/plugins/simplebar/simplebar.min.js"></script>
<script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



<script src="/themeadmin/plugins/apexcharts/apexcharts.js"></script>



<script src="/themeadmin/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>



<script src="/themeadmin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="/themeadmin/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script src="/themeadmin/plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>



<script src="/themeadmin/plugins/daterangepicker/moment.min.js"></script>
<script src="/themeadmin/plugins/daterangepicker/daterangepicker.js"></script>
<script>
  jQuery(document).ready(function() {
    jQuery('input[name="dateRange"]').daterangepicker({
    autoUpdateInput: false,
    singleDatePicker: true,
    locale: {
      cancelLabel: 'Clear'
    }
  });
    jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
      jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
    });
    jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
      jQuery(this).val('');
    });
  });
</script>



<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



<script src="/themeadmin/plugins/toaster/toastr.min.js"></script>



<script src="/themeadmin/js/mono.js"></script>
<script src="/themeadmin/js/chart.js"></script>
<script src="/themeadmin/js/map.js"></script>
<script src="/themeadmin/js/custom.js"></script>
