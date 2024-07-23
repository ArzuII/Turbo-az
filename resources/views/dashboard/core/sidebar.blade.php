<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">TURBO</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" @if(request()->segment(2) == 'home') active @endif>
                <a class="nav-link" href="{{ route('dashboard.home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item"  @if(request()->segment(2) == 'car') active @endif >
                <a class="nav-link" href="{{ route('dashboard.car.index') }}">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Cars</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item"  @if(request()->segment(2) == 'car-model') active @endif >
                <a class="nav-link" href="{{ route('dashboard.car-model.index') }}">
                    <i class="fas fa-fw fa-car-on"></i>
                    <span>Car Models</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item"  @if(request()->segment(2) == 'site-user') active @endif >
                <a class="nav-link" href="{{ route('dashboard.site-user.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Site Users</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item"  @if(request()->segment(2) == 'advertisement') active @endif >
                <a class="nav-link" href="{{ route('dashboard.advertisement.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Advertisements</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->