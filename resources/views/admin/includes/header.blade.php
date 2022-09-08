<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li> -->

    <li class="dropdown dropdown-user nav-item open">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link" aria-expanded="false">
            <span class="avatar avatar-online">
            </span>
            <span class="user-name">{{Auth::user()->name}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
            <!-- <a class="dropdown-item" href="https://binay.aqualeafitsol.com/market-place/admin/dashboard">
                <i class="fa fa-home"></i> Dashboard
            </a>
            <a class="dropdown-item" href="javascript:void(0);">
                <i class="fa fa-user"></i> My Account
            </a>
            <a class="dropdown-item" href="https://binay.aqualeafitsol.com/market-place/admin/reset-password">
                <i class="fa fa-key"></i> Change Password
            </a> -->
            <div class="dropdown-divider"></div>
            <a href="{{route('admin.logout')}}" class="dropdown-item">
                <i class="fa fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
        </a>
    </li> -->
</ul>