<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TTA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontassets/tta/img/favicon.ico') }}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/owl.transitions.css') }}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/normalize.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/jvectormap/jquery-jvectormap-2.0.3.css') }}">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/notika-custom-icon.css') }}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/wave/waves.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/main.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/responsive.css') }}">

    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('frontassets/tta/css/jquery.dataTables.min.css') }}">

    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('frontassets/tta/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script>
</head>
<body>
    @include('includes.topheader')
    @yield('content')
    @include('includes.footer')

</body>
</html>
