<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>GT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Aga</b>te</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="user">
                    <a href="{{ route('logout') }}" style="font-size: 16px;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                            class="glyphicon glyphicon-log-out"></span> {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
        </div>
    </nav>
</header>
