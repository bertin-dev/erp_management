<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Espace de gestion ez-pass</title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="all,follow">

    <!-- Bootstrap CSS-->

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Font Awesome CSS-->

    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Fontastic Custom icon font-->

    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">

    <!-- Google fonts - Roboto -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <!-- jQuery Circle-->

    <link rel="stylesheet" href="{{ asset('css/grasp_mobile_progress_circle-1.0.0.min.css') }}">

    <!-- Custom Scrollbar-->

    <link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">

    <!-- Bootstrap Tags input CSS-->

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">

    <!-- theme stylesheet-->

   <link rel="stylesheet" href="{{ asset('css/style.blue.premium.css') }}" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes-->

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- DataTables CSS-->

    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.min.css">    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Favicon-->

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

  </head>

  <body>

    <!-- CSS Spinner-->

    <div class="spinner-wrapper">

      <div class="spinner sk-spinner-pulse"></div>

    </div>

    <!-- Side Navbar -->

    @include('layouts.sidebar')

    <div class="page">

      @yield('content')

      @yield('footer')

    </div>

    <!-- JavaScript files-->

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>

    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="{{ asset('js/charts-home.js') }}"></script>

    <!-- Notifications-->

    <script src="{{ asset('vendor/messenger-hubspot/build/js/messenger.min.js') }}">   </script>

    <script src="{{ asset('vendor/messenger-hubspot/build/js/messenger-theme-flat.js') }}">       </script>

    <script src="{{ asset('js/home-premium.js') }}"> </script>

    <!-- Main File-->

    <!-- Data Tables-->

    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.js') }}"></script>

    <script src="{{ asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.js') }}"></script>

    <script src="{{ asset('vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>

    <script src="{{ asset('vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src=""></script>
    <!-- Bootstrap TypeAhead-->

    <script src="{{ asset('vendor/bootstrap-3-typeahead/bootstrap3-typeahead.min.js') }}"></script>

    <!-- Bootstrap Tags Input-->

    <script src="{{ asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

    <script src="{{ asset('js/components-preloader.js') }}"> </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>
    <script src="{{ asset('js/tables-datatable.js') }}"></script>


    <script src="{{ asset('js/front.js') }}"></script>

    <!-- JavaScript files-->

    <script src="{{ asset('js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js')}}"> </script>

    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>

    <script src="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <script src="{{ asset('js/charts-custom.js')}}"></script>

  </body>

</html>