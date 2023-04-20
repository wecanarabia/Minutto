
<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

<!-- Plugin Js-->
<script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>

<!-- Jquery Page Js -->
<script src="https://pixelwibes.com/template/my-task/html/js/template.js"></script>
<script src="https://pixelwibes.com/template/my-task/html/js/page/hr.js"></script>
<!-- Plugin Js-->
<script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>

<script>
    // project data table
    $(document).ready(function() {
        $('#myProjectTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    });
</script>
</body>

<!-- Mirrored from pixelwibes.com/template/my-task/html/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Apr 2023 02:58:10 GMT -->

</html>
