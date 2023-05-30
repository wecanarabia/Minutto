
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
        if ($('table').hasClass('table-attendance')||$('table').hasClass('table-leaves')
        ||$('table').hasClass('table-rewards')||$('table').hasClass('table-advances')
        ||$('table').hasClass('table-extra')||$('table').hasClass('table-alerts')
        ||$('table').hasClass('table-vacations')||$('table').hasClass('table-vacations2')
        ||$('table').hasClass('table-salries')||$('table').hasClass('table-logs')) {

            $('.table-attendance, .table-leaves, .table-rewards, .table-advances, .table-extra, .table-alerts, .table-vacations, .table-vacations2, .table-salaries, .table-logs')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            order:[[0, 'desc']],
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });

        }else if (!$('table').hasClass('table-attendance')||!$('table').hasClass('table-leaves')
        ||!$('table').hasClass('table-rewards')||!$('table').hasClass('table-advances')
        ||!$('table').hasClass('table-extra')||!$('table').hasClass('table-alerts')
        ||!$('table').hasClass('table-vacations')||!$('table').hasClass('table-vacations2')
        ||!$('table').hasClass('table-salries')||!$('table').hasClass('table-logs')) {
        {
            if (!$('table').hasClass('data-table')) {


        $('table')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            order:[[0, 'desc']],
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    }
    }

    });
</script>
</body>


</html>
