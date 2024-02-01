<head>

    <title>@yield('title')</title>
    @include('admin.layouts.metatags')

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/main-custom.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('styles')
</head>
