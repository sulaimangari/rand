<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agate IT Support</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/bower_components/morris.js/morris.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet"
        href="{{ asset('vendor/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('vendor/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet"
        href="{{ asset('vendor/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    @yield('style')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


        @include('layout.header')
        @include('layout.sidebar')


        <div class="content-wrapper">
            @yield('content')
        </div>


        <div class="control-sidebar-bg"></div>
    </div>

    <script src="{{ asset('vendor/AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendor/AdminLTE/dist/js/adminlte.min.js')}}"></script>
    @yield('script')
</body>

</html>
