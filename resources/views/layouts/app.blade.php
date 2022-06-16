<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="csrf-token" content="IikHSDaQXP4kULIk3JiZKdlNzTlslu3iC6Vyizmh">
  <meta name="description"
    content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords"
    content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>App layout</title>
  <base href='{{ \URL::to(" /") }}'>
  <link rel="apple-touch-icon" href='{{ asset("/images/ico/apple-icon-120.png") }}'>
  <link rel="shortcut icon" type="image/x-icon" href='{{ asset("/images/logo/favicon.ico") }}'>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
    rel="stylesheet">


  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" href='{{ asset("/vendors/css/vendors.min.css") }}' />

  {{-- Vendor Styles --}}
  @yield('vendor-style')


  {{--
  <link rel="stylesheet" href='{{ asset("/vendors/css/tables/datatable/dataTables.bootstrap5.min.css") }}'>
  <link rel="stylesheet" href='{{ asset("/vendors/css/tables/datatable/responsive.bootstrap5.min.css") }}'>
  <link rel="stylesheet" href='{{ asset("/vendors/css/tables/datatable/buttons.bootstrap5.min.css") }}'>
  <link rel="stylesheet" href='{{ asset("/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css") }}'>
  <link rel="stylesheet" href='{{ asset("/vendors/css/pickers/flatpickr/flatpickr.min.css") }}'> --}}
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" href='{{ asset("/css/core.css") }}' />
  <link rel="stylesheet" href='{{ asset("/css/base/themes/dark-layout.css") }}' />
  <link rel="stylesheet" href='{{ asset("/css/base/themes/bordered-layout.css") }}' />
  <link rel="stylesheet" href='{{ asset("/css/base/themes/semi-dark-layout.css") }}' />


  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" href='{{ asset("/css/base/core/menu/menu-types/vertical-menu.css") }}' />

  {{-- Page Styles --}}
  @yield('page-style')

  <!-- laravel style -->
  <link rel="stylesheet" href='{{ asset("/css/overrides.css") }}' />

  <!-- BEGIN: Custom CSS-->


  <link rel="stylesheet" href='{{ asset("/css/style.css") }}' />

  @section('add-to-head')

  @show

  <style>
    .form-label,
    .form-check-label {
      text-transform: capitalize
    }

    .capitalize {
      text-transform: capitalize;
    }
  </style>

  {{-- <style>
    @media print {
      body * {
        visibility: hidden;
      }

      #section-to-print,
      #section-to-print * {
        visibility: visible;
      }

      #section-to-print {
        position: absolute;
        left: 0;
        top: 0;
      }
    }
  </style> --}}

  @livewireStyles

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->


<body class="vertical-layout vertical-menu-modern navbar-floating footer-static default" data-open="click"
  data-menu="vertical-menu-modern" data-col="default" data-framework="laravel" data-asset-path="/">
  <!-- BEGIN: Header-->
  @include('layouts.header')
  <!-- END: Header-->

  <!-- BEGIN: Main Menu-->
  @switch(auth()->user()->role_id)
  @case(\App\Models\Role::IS_ADMIN)
  @include('layouts.adminSidebar')
  @break
  @case(\App\Models\Role::IS_SELLER)
  @include('layouts.sellerSidebar')
  @break
  @case(\App\Models\Role::IS_HUB_MANAGER)
  @include('layouts.hub_managerSidebar')
  @break
  @case(\App\Models\Role::IS_DELIVERY_AGENT)
  @include('layouts.delivery_agentSidebar')
  @break
  @case(\App\Models\Role::IS_FRANCHISE_MANAGER)
  @include('layouts.franchise_managerSidebar')
  @break
  @case(\App\Models\Role::IS_FRANCHISE_STAFF)
  @include('layouts.franchise_staffSidebar')
  @break
  @default
  @include('layouts.sidebar')
  @endswitch
  <!-- END: Main Menu-->

  <!-- BEGIN: Content-->
  <div class="app-content content ">
    @yield('page-content')
  </div>
  <!-- End: Content-->

  <!-- BEGIN: Customizer-->
  {{-- @include('layouts.customizer') --}}
  <!-- End: Customizer-->

  <!-- Buynow Button-->
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>


  <!-- BEGIN: Footer-->
  @include('layouts.footer')
  <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
  <!-- END: Footer-->


  <!-- BEGIN: Vendor JS-->
  <script src='{{ asset("/vendors/js/vendors.min.js") }}'></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src='{{ asset("/vendors/js/ui/jquery.sticky.js") }}'></script>
  @yield('vendor-script')
  {{-- <script src='{{ asset("/vendors/js/tables/datatable/jquery.dataTables.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/dataTables.bootstrap5.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/dataTables.responsive.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/responsive.bootstrap5.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/datatables.checkboxes.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/datatables.buttons.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/jszip.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/pdfmake.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/vfs_fonts.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/buttons.html5.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/buttons.print.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/tables/datatable/dataTables.rowGroup.min.js") }}'></script>
  <script src='{{ asset("/vendors/js/pickers/flatpickr/flatpickr.min.js") }}'></script> --}}
  <!-- END: Page Vendor JS-->
  <!-- BEGIN: Theme JS-->
  <script src='{{ asset("/js/core/app-menu.js") }}'></script>
  <script src='{{ asset("/js/core/app.js") }}'></script>

  <!-- custome scripts file for user -->
  <script src='{{ asset("/js/core/scripts.js") }}'></script>

  <script src='{{ asset("/js/scripts/customizer.js") }}'></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  @yield('page-script')

  <script type="text/javascript">
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14, height: 14
        });
      }
    })
  </script>

  <script>
    function printFunction(elem)
      {
          var mywindow = window.open('', 'PRINT', 'height=400,width=600');

          mywindow.document.write('<html><head><title>' + document.title  + '</title>');
          mywindow.document.write('</head><body >');
          mywindow.document.write('<h1>' + document.title  + '</h1>');
          mywindow.document.write(document.getElementById(elem).innerHTML);
          mywindow.document.write('</body></html>');

          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10*/

          mywindow.print();
          mywindow.close();

          return true;
      }
  </script>
  {{-- <script src='{{ asset("/js/scripts/tables/table-datatables-basic.js") }}'></script> --}}
  <!-- END: Page JS-->
  @livewireScripts
</body>

</html>