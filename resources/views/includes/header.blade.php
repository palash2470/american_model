<?php
    // dd(auth()->user()->userDetails->membership_type_id);
    //dd($settings);
?>
<a class="scrollup" href="javascript:void(0);" aria-label="Scroll to top"><i class="fas fa-chevron-up"></i></a>
    <header class="menu-header">
        <div class="top-header-bar">
            <div class="container-fluid left-right-40">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <div class="top-phone">
                            <ul class="d-flex">
                                <li class="mob-none"><i class="fas fa-map-marker-alt"></i>Phoenix, AZ 85069</li>
                                <li><a href="tel:(480) 265-0187"><i class="fas fa-phone-alt"></i><span class="">(480) 265-0187</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="top-rgt-wrap d-flex flex-wrap align-items-center">
                            <div class="only-mobile">
                                <button class="only-mobile-social" type="button">help</button>
                                <ul class="top-small-menu d-flex">
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Language</a></li>
                                </ul>
                            </div>
                            <ul class="top-social d-flex">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="topHeader start-style start-header">
            <div class="container-fluid left-right-40">
                <div class="row justify-content-between align-items-center">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img class="img-block" src="{{url('images/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col">
                        <div class="navArea d-flex justify-content-start align-items-center">
                            <nav id="res_nav" class="navigation {{ Auth::check() ? 'after-login-menu' : '' }}">
                                <button id="menu_res" class="menu-responsive">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>

                                <ul class="d-flex justify-content-between">
                                    {{-- <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{route('home')}}">home</a></li> --}}
                                    <li class="{{ request()->is('about-us') ? 'active' : '' }}"><a href="{{$settings->menu_about_us === 1 ? route('about_us') : '#'}}">About Us</a></li>
                                    <li class="sub_menu_open {{ request()->is('filter/*') || Route::currentRouteName() == 'search.talent' ? 'active' : '' }}">
                                        <a href="javascript:;">Search</a>
                                        @if ($settings->menu_search === 1)
                                            <ul class="submenu">
                                                <li class="{{Route::currentRouteName() == 'search.talent' ? 'active' : '' }}" ><a href="{{route('search.talent')}}">Browse All Talent</a></li>
                                                @if ($categories)
                                                    @foreach ($categories as $category)
                                                        <li class="{{ request()->is('filter/'.$category->slug) ? 'active' : '' }}" ><a href="{{route('user.search',$category->slug)}}">{{$category->name}}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        @endif
                                        
                                    </li>
                                    @if(!Auth::check())
                                        <li class="{{ request()->is('subscription-plan') ? 'active' : '' }}"><a href="{{$settings->menu_become_a_member === 1 ? route('user.subscription.plan') : '#'}}">Become a Member</a></li>
                                    @endif
                                    <li class="{{ request()->is('blog*') ? 'active' : '' }}" ><a href="{{$settings->menu_blog === 1 ? route('blog') : '#'}}">Blog</a></li>
                                    <li class="{{ request()->is('job*') ? 'active' : '' }}" ><a href="{{$settings->menu_job === 1 ? route('job') : '#'}}">Job</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="login-area">
                        <!-- Only After login -->
                        @if(Auth::check())
                            <div class="after-login-wrap position-relative">
                                <div class="after-login d-flex align-items-center justify-content-end">
                                    <span class="user-img">
                                        <img class="img-block" src="{{@Auth::user()->userDetails->profile_image ? url('img/user/profile-image/'.Auth::user()->userDetails->profile_image) :url('images/avatar.jpg')}}" alt="">
                                    </span>
                                    <h5>{{@Auth::user()->userDetails->first_name}}</h5>
                                    <span class="after-login-icon"><i class="fas fa-angle-down"></i></span>
                                </div>
                                <div class="after-login-menu-wrap">
                                    <ul>
                                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                        <li><a href="{{route('user.profile_edit')}}">My Profile</a></li>
                                        <li><a href="{{route('user.account')}}">My Account</a></li>
                                        @php
                                            if(isset(auth()->user()->userDetails) && auth()->user()->userDetails->membership_type_id === 5)
                                            {
                                        @endphp
                                            <li><a href="{{route('job.post')}}">Post Job</a></li>
                                        @php
                                            }
                                        @endphp
                                        <li><a href="{{route('logout')}}">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        @else
                        <div class="log-reg-nav">
                            <ul class="d-flex">
                                <li><a href="{{route('login')}}"><i class="far fa-user-circle"></i>login</a></li>
                                <li><a href="{{route('signup')}}" class="reg-nav">register</a></li>
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
