<!-- Brand Logo -->
<a href="{{route('admin')}}" class="brand-link">
    <img src="{{url('/images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">American Model</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
   {{--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{url('/Image/admin_image/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{route('admin')}}" class="d-block">{{Auth()->user()->name}}</a>
        </div>
    </div> --}}
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'menu-open' : '' }}">
                <a href="{{route('admin')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/user')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.user')}}" class="nav-link {{ (request()->is('admin/user')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        User
                    </p>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/category')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.category.index')}}" class="nav-link {{ (request()->is('admin/category')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Category
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/colour')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.colour.index')}}" class="nav-link {{ (request()->is('admin/colour')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Colour
                    </p>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/size')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.size.index')}}" class="nav-link {{ (request()->is('admin/size')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Size
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/ethnicity')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.ethnicity.index')}}" class="nav-link {{ (request()->is('admin/ethnicity')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Ethnicity
                    </p>
                </a>
            </li>
           {{--  <li class="nav-item {{ (request()->is('admin/plan-group')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.plan_group.index')}}" class="nav-link {{ (request()->is('admin/plan-group')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Plan Group
                    </p>
                </a>
            </li> --}}
            <li class="nav-item {{ (request()->is('admin/plan-attribute*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.plan_attribute.index')}}" class="nav-link {{ (request()->is('admin/plan-attribute*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Plan Attribute
                    </p>
                </a>
            </li>
           
            <li class="nav-item {{ request()->is('admin/plan-group*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('admin/plan-group*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Plan Group
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item {{ (request()->is('admin/plan-group')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.plan_group.index')}}" class="nav-link {{ (request()->is('admin/plan-group')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                List
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/plan-group/add')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.plan_group.create')}}" class="nav-link {{ (request()->is('admin/plan-group/add')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Add
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
           
            <li class="nav-item {{ (request()->is('admin/plan') || request()->is('admin/plan/*')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ (request()->is('admin/plan') || request()->is('admin/plan/*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Plan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item {{ (request()->is('admin/plan')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.plan')}}" class="nav-link {{ (request()->is('admin/plan')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                List
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/plan/add')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.create.plan')}}" class="nav-link {{ (request()->is('admin/plan/add')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Add
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('admin/home-banner')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.home_banner.index')}}" class="nav-link {{ (request()->is('admin/home-banner')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Home Banner
                    </p>
                </a>
            </li>
            <li class="nav-item {{ Request::segment(2)=='settings' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::segment(2)=='settings' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>
                        Settings
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
