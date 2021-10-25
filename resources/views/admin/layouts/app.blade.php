<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KOPS</title>
    <link href="{{ asset('adminassets/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    @include('admin.includes.topnav')
    <div id="layoutSidenav">
        @include('admin.includes.sidenav')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                @include('admin.includes.footer')
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
    <script src="{{ asset('adminassets/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('adminassets/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('adminassets/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('adminassets/assets/demo/datatables-demo.js') }}"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.0/b-2.0.0/b-html5-2.0.0/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.0/b-2.0.0/b-html5-2.0.0/datatables.min.js"></script>


    <script src="{{ asset('adminassets/js/ajaxcalls.js') }}"></script>
    
    

    <script>
$(document).ready(function() {
    $('#dataTables').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
        ],
    } );
    
    
    $('#dataTableusers').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
        ],
    } );
    
    
    $('#dataTableCasting').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2 ]
                }
            },
        ],
    } );
    
    
    
    
} );
</script>



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.itemselection').select2();
});
</script>
<script>
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.itemsselect').select2();
});
</script>

<script>
$(document).ready(function(){
$('#product_name').on('change', function(e) {
    e.preventDefault();
    var currentSel = this.options[this.selectedIndex].getAttribute('procode');
    $('#code').val(currentSel).trigger('change');
});
});
</script>

<script>
$(document).ready(function(){
$('#code').on('change', function(e) {
    e.preventDefault();
    var currentSel = this.options[this.selectedIndex].getAttribute('proid');
    $('#product_name').val(currentSel).trigger('change');
});
});
</script>

</body>

</html>
