@extends('layouts.app')
@section('content')
<section class="user-dashboard">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
        <div class="user-dashboard-wrap d-flex">
            <div class="user-dashboard-lft">
                <div class="user-dashboard-wrap">
                    <div class="user-dashboard-prf-top">
                        <div class="img-wrap">
                            <a href="#" class="dashb-user-img">
                                <img class="img-block" src="{{url('img/user/profile-image/'.Auth::user()->userDetails->profile_image)}}" alt="">
                            </a>
                            <ul class="d-flex user-dashboard-noti">
                                <li>
                                    <a href="javascript:;"><i class="far fa-heart"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><i class="far fa-bell"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><i class="far fa-envelope"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="user-dashboard-prf-name">
                            <h4>Welcome back,</h4>
                            <h3>{{@Auth::user()->userDetails->name}}</h3>
                            <p>Your current plan: <strong>{{@Auth::user()->userPlan->plan->name}}</strong> <a href="{{route('user.registration.plan')}}" class="upgrd-btn">upgrade</a></p>
                        </div>
                    </div>
                    <div class="user-dashboard-prf-btm">
                        <div class="user-dsbrd-menu">
                            <ul>
                                <li class="d-flex justify-content-between align-items-center gp">
                                    <i class="far fa-eye"></i>
                                    <div class="vies-text"><p><strong>{{$user->views_count}}</strong> views </p></div>
                                    @if (count($user->viewes) > 0)
                                    <div class="views-img d-flex align-items-center">
                                        <ul class="d-flex">
                                            @if (count($user->viewes) > 6)
                                                @foreach (array_slice($user->viewes , 0 ,6) as $view)
                                                    <li>
                                                        <a href="javascript:">
                                                            <img class="img-block" src="{{url('img/user/profile-image/'.$view->viewerUser->userDetails->profile_image)}}" alt="">
                                                        </a>
                                                    </li>  
                                                @endforeach 
                                            @else
                                                @foreach ($user->viewes as $view)
                                                    <li>
                                                        <a href="javascript:">
                                                            <img class="img-block" src="{{url('img/user/profile-image/'.$view->viewerUser->userDetails->profile_image)}}" alt="">
                                                        </a>
                                                    </li>  
                                                @endforeach 
                                            @endif
                                        </ul>
                                        <a href="#" class="views-all-btn" data-bs-toggle="modal" data-bs-target="#viewsModal">view all</a>
                                    </div>  
                                    @endif
                                    
                                </li>
                                <li class="gp">
                                    <a href="{{route('user.profile_edit')}}"><i class="far fa-image"></i><strong>{{count($user->images)}}</strong> images</a>
                                </li>
                                <li class="gp">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#favouritesModal"><i class="far fa-heart"></i><strong>{{count($user->favourites)}}</strong> Favorited</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="btm-button-wrap">
                        <ul>
                            <li><a href="{{route('user.profile_edit')}}" class="user-update-pic">Upload Pictures</a></li>
                            <li><a href="#" class="user-update-cal">Manage Calendar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="user-dashboard-rgt">
                <div class="welcome-text-user">
                    <h3>Welcome</h3>
                    <p>Thank you, your account is being reviewed, and is pending approval. Please allow us 2 Business days to review your profile. You are free to Browse, Favorite, Like Follow our members in the mean time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Views Modal -->
    <div class="modal fade views-modal" id="viewsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewsModaldropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewsModaldropLabel">{{count($user->viewes)}} Members viewed your profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                @if (count($user->viewes) > 0)
                    @foreach ($user->viewes as $view)
                        
                    @endforeach
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="views-modal-list d-flex align-items-center">
                        <div class="views-modal-list-lft">
                            <a href="{{url('/profile/'.$view->viewerUser->category->slug.'/'.$view->viewerUser->name_slug)}}" class="profile-comments-img">
                                <img class="img-block" src="{{url('img/user/profile-image/'.$view->viewerUser->userDetails->profile_image)}}" alt="">
                            </a>
                        </div> 
                        <div class="views-modal-list-rgt">
                            <h4>{{$view->viewerUser->name}}</h4>
                            <p>{{$view->viewerUser->category->name}}, {{$view->viewerUser->userDetails->getCity->name}}</p>
                        </div> 
                        </div>
                    </div>
                @endif 
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Favourites Modal -->
    <div class="modal fade views-modal" id="favouritesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewsModaldropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewsModaldropLabel">{{count($user->favourites)}} Favorited me</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                @if (count($user->favourites) > 0)
                    @foreach ($user->favourites as $favourite)
                        
                    @endforeach
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="views-modal-list d-flex align-items-center">
                        <div class="views-modal-list-lft">
                            <a href="{{url('/profile/'.$favourite->favouriteUser->category->slug.'/'.$favourite->favouriteUser->name_slug)}}" class="profile-comments-img">
                                <img class="img-block" src="{{url('img/user/profile-image/'.$favourite->favouriteUser->userDetails->profile_image)}}" alt="">
                            </a>
                        </div> 
                        <div class="views-modal-list-rgt">
                            <h4>{{$favourite->favouriteUser->name}}</h4>
                            <p>{{$favourite->favouriteUser->category->name}}, {{$favourite->favouriteUser->userDetails->getCity->name}}</p>
                        </div> 
                        </div>
                    </div>
                @endif 
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection