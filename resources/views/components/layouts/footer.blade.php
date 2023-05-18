
<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

<!-- Plugin Js-->
<script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>

<!-- Jquery Page Js -->
{{-- <script src="https://pixelwibes.com/template/my-task/html/js/template.js"></script>--}}
<script src="https://pixelwibes.com/template/my-task/html/js/page/hr.js"></script>
<!-- Plugin Js-->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

<script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>

<script src="{{ asset('assets/js/ajax.js') }}"></script>
<script src="{{ asset('assets/js/map.js') }}"></script>
<script src="{{ asset('assets/js/task.js') }}"></script>

<script>
    // project data table
    $(document).ready(function() {
        $('.chatlist-toggle').remove()
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


</html>
