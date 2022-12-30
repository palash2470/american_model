<!-- Brand Logo -->
<a href="{{route('admin')}}" class="brand-link admin-logo">
    <img src="{{url('/images/logo2.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2">
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
    <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'menu-open' : '' }}">
                <a href="{{route('admin')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/user*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.user')}}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Users
                    </p>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/category*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.category.index')}}" class="nav-link {{ (request()->is('admin/category')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>
                        Categories
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/job-category*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.job_category.index')}}" class="nav-link {{ (request()->is('admin/job-category*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>
                        Job Categories
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/image-category')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.image_category.index')}}" class="nav-link {{ (request()->is('admin/image-category*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>
                        Photo Categories
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/colour*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.colour.index')}}" class="nav-link {{ (request()->is('admin/colour*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-palette"></i>
                    <p>
                        Colors
                    </p>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/size*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.size.index')}}" class="nav-link {{ (request()->is('admin/size*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-ruler-combined"></i>
                    <p>
                        Sizes
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/weight*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.weight.index')}}" class="nav-link {{ (request()->is('admin/weight*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-weight"></i>
                    <p>
                        Weights
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/height*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.height.index')}}" class="nav-link {{ (request()->is('admin/height*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-text-height"></i>
                    <p>
                        Heights
                    </p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/ethnicity*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.ethnicity.index')}}" class="nav-link {{ (request()->is('admin/ethnicity*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Ethnicities
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
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Plan Attributes
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
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                List
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/plan-group/add')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.plan_group.create')}}" class="nav-link {{ (request()->is('admin/plan-group/add')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-plus"></i>
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
                        Plans
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item {{ (request()->is('admin/plan')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.plan')}}" class="nav-link {{ (request()->is('admin/plan')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                List
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/plan/add')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.create.plan')}}" class="nav-link {{ (request()->is('admin/plan/add')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Add
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('admin/home-banner*')) ? 'menu-open' : '' }}">
                <a href="{{route('admin.home_banner.index')}}" class="nav-link {{ (request()->is('admin/home-banner*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-images"></i>
                    <p>
                        Home Banners
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item {{ (request()->is('admin/gallery*')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ (request()->is('admin/gallery/*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Gallery
                    </p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item {{ (request()->is('admin/gallery/album/*')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.gallery.album.index')}}" class="nav-link {{ (request()->is('admin/gallery/album')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-regular fa-images"></i>
                            <p>
                                Album
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/gallery/image/*')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.gallery.index')}}" class="nav-link {{ (request()->is('admin/gallery/image/*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-regular fa-image"></i>
                            <p>
                                Images
                            </p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li class="nav-item {{ (request()->is('admin/setting/*')) ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ (request()->is('admin/setting/*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Settings
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item {{ (request()->is('admin/setting/advertisement')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.advertisement.index')}}" class="nav-link {{ (request()->is('admin/setting/advertisement')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-ad"></i>
                            <p>
                                Advertisements
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/setting/edit/*')) ? 'menu-open' : '' }}">
                        <a href="{{route('admin.setting.edit',1)}}" class="nav-link {{ (request()->is('admin/setting/edit/*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>
                                Tools
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/setting/poll*')) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ (request()->is('admin/setting/poll*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-poll"></i>
                            <p>
                                Polls
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ (request()->is('admin/setting/poll')) ? 'menu-open' : '' }}">
                                <a href="{{route('admin.poll.index')}}" class="nav-link {{ (request()->is('admin/setting/poll')) ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>
                                        List
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item {{ (request()->is('admin/setting/poll/add')) ? 'menu-open' : '' }}">
                                <a href="{{route('admin.poll.create')}}" class="nav-link {{ (request()->is('admin/setting/poll/add')) ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-plus"></i>
                                    <p>
                                        Add
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
