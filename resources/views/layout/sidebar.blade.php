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
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i> <span>Device Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('allDevice')}}"><i class="fa fa-circle-o"></i> All Device </a></li>
                    <li><a href="{{route('borrowedDevice')}}"><i class="fa fa-circle-o"></i> Borrowed Device</a></li>
                    <li><a href="{{route('availableDevice')}}"><i class="fa fa-circle-o"></i> Available Device</a></li>
                    <li><a href="{{route('brokenDevice')}}"><i class="fa fa-circle-o"></i> Broken Device</a></li>
                    <li><a href="{{route('createDevice')}}"><i class="fa fa-plus"></i> Insert New Device</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i> <span>Borrow Device</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('borrow.device.borrowed')}}"><i class="fa fa-circle-o"></i> Crew Borrowed list
                        </a></li>
                    <li><a href="{{route('borrow.device.returned')}}"><i class="fa fa-circle-o"></i> Crew Returned list
                        </a></li>
                    <li><a href="{{route('borrow.device.new')}}"><i class="fa fa-plus"></i> Add new Borrow device</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Support Ticket</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('listTicket')}}"><i class="fa fa-circle-o"></i> Manage the Tickets</a></li>
                    <li><a href="{{route('createTicket')}}"><i class="fa fa-plus"></i> Issue a Ticket</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('listUser') }}"><i class="fa fa-user"></i> Manage User</a></li>
                    <li><a href="{{ route('adminUser') }}"><i class="fa fa-legal"></i> Manage Admin</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
