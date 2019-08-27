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
    @yield('style')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


        @include('layout.header')
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="https://via.placeholder.com/150" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name  }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li><a href="{{ route('homeUser') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li><a href="{{ route('deviceUser') }}">
                            <i class="fa fa-laptop"></i> <span>Your Device</span>
                        </a>
                    </li>
                    <li><a href="{{ route('ticketUser') }}">
                            <i class="fa fa-tags"></i> <span>Support Ticket</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>


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
