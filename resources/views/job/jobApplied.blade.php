@extends('layouts.app')
@section('content')
<section class="user-dashboard">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Jobs</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <span class="my-acc-menu-btn user_acc_menu">
                        <button type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="user-dashboard-wrap d-flex">
            <div class="user-dashboard-lft my_acc_lft">
                <span class="acc_close">
                    <button type="button">
                        <i class="fas fa-times"></i>
                    </button>
                </span>
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
                                                            <img class="img-block" src="{{url('img/user/profile-image/'.@$view->viewerUser->userDetails->profile_image)}}" alt="">
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                @foreach ($user->viewes as $view)
                                                    <li>
                                                        <a href="javascript:">
                                                            <img class="img-block" src="{{url('img/user/profile-image/'.@$view->viewerUser->userDetails->profile_image)}}" alt="">
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
                            @php
                                if(isset(auth()->user()->userDetails) && auth()->user()->userDetails->membership_type_id === 5)
                                {
                            @endphp
                                <li><a href="{{route('jobs')}}" class="user-update-cal">Jobs</a></li>
                            @php
                                }
                            @endphp
                        </ul>
                    </div>
                </div>
            </div>
            <div class="user-dashboard-rgt">
                <div class="welcome-text-user">
                    <div class="job-listing-wrap">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="job-thumb relative">
                                    <a href="j{{url('job-applied').'/'.$job->id}}">
                                        <img class="img-block" src="{{isset($job->images[0]) ? url('images/job').'/'.$job->images[0]->image : url('images/no-image.jpg')}}" alt="">
                                    </a>
                                    <span class="job-post-date">{{date('d M Y', strtotime($job->created_at));}}</span>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="job-content">
                                    <a href="{{url('job-applied').'/'.$job->id}}" class="job-title">{{$job->title}}</a>
                                    <div class="job-text">
                                        <p>{{$job->jobReference}} / {{ucwords($job->gender)}} / {{$job->fromAge}} years - {{$job->toAge}} years</p>
                                        <p>Location : 
                                            {{@$job->getCity->city_name}},{{@$job->getState->name}}
                                            {{-- @foreach ($job->getJobLocations as $jobLocationKey => $jobLocationValue )
                                                @if ($jobLocationKey === 0)
                                                    {{$jobLocationValue->getCityName->city_name}}
                                                @else
                                                    , {{$jobLocationValue->getCityName->city_name}}
                                                @endif
                                            @endforeach --}}
                                        </p>
                                        <p>Category : {{@$job->getJobCategory->name}}</p>
                                        <p>Description : {{substr($job->jobDescription, 0, 150).'...'}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="user-applied">
                                    <h3>Applyed Users</h3>
                                    @foreach($job->getJobApplied as $appliedkey=>$appliedvalue)
                                        <div class="d-flex user-applied-list">
                                            <div class="user-applied-lft">
                                                <span class="user-applied-img">
                                                    <img class="img-block" src="{{url('img/user/profile-image').'/'.$appliedvalue->getUserDetails->userDetails->profile_image}}" alt="">
                                                </span>
                                            </div>
                                            <div class="user-applied-rgt">
                                                <h4><a href="{{route('user.view.profile',[$appliedvalue->getUserDetails->category->slug,$appliedvalue->getUserDetails->name_slug])}}">{{$appliedvalue->getUserDetails->name}}</a></h4>
                                                <p>{{$appliedvalue->message}}</p>
                                                <ul class="attach-link d-flex">
                                                    <li><i class="fas fa-calendar-alt"></i>Date : {{date('d.m.Y', strtotime($appliedvalue->created_at));}}</li>
                                                    @if($appliedvalue->attachment !== '')
                                                        <li><i class="fas fa-link"></i>Attach : <a href="{{url('images/jopApply').'/'.$appliedvalue->attachment}}" download>Click to download</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="d-flex user-applied-list">
                                        <div class="user-applied-lft">
                                            <span class="user-applied-img">
                                                <img class="img-block" src="" alt="">
                                            </span>
                                        </div>
                                        <div class="user-applied-rgt">
                                            <h4><a href="#">Rahul Das</a></h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium sed magni facere, provident amet quidem dignissimos ipsa quo ex consequuntur officia maiores veritatis. Placeat incidunt reprehenderit reiciendis dolorem atque enim!</p>
                                            <ul class="attach-link d-flex">
                                                <li><i class="fas fa-calendar-alt"></i>Date : 02.11.2022</li>
                                                <li><i class="fas fa-link"></i>Attach : <a href="#">cv.dox</a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="d-flex user-applied-list">
                                        <div class="user-applied-lft">
                                            <span class="user-applied-img">
                                                <img class="img-block" src="" alt="">
                                            </span>
                                        </div>
                                        <div class="user-applied-rgt">
                                            <h4><a href="#">Palash</a></h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium sed magni facere, provident amet quidem dignissimos ipsa quo ex consequuntur officia maiores veritatis. Placeat incidunt reprehenderit reiciendis dolorem atque enim!</p>
                                            <ul class="attach-link d-flex">
                                                <li><i class="fas fa-calendar-alt"></i>Date : 02.11.2022</li>
                                                <li><i class="fas fa-link"></i>Attach : <a href="#">cv.dox</a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="d-flex user-applied-list">
                                        <div class="user-applied-lft">
                                            <span class="user-applied-img">
                                                <img class="img-block" src="" alt="">
                                            </span>
                                        </div>
                                        <div class="user-applied-rgt">
                                            <h4><a href="#">Kartick</a></h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium sed magni facere, provident amet quidem dignissimos ipsa quo ex consequuntur officia maiores veritatis. Placeat incidunt reprehenderit reiciendis dolorem atque enim!</p>
                                            <ul class="attach-link d-flex">
                                                <li><i class="fas fa-calendar-alt"></i>Date : 02.11.2022</li>
                                                <li><i class="fas fa-link"></i>Attach : <a href="#">cv.dox</a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @foreach ($job as $jobKey => $jobValue)
                        <div class="job-listing-wrap">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="job-thumb relative">
                                        <a href="job-listing-details.html">
                                            <img class="img-block" src="{{url('images/job').'/'.$jobValue->image}}" alt="">
                                        </a>
                                        <span class="job-post-date">{{date('d M Y', strtotime($jobValue->created_at));}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                    <div class="job-content">
                                        <a href="job-listing-details.html" class="job-title">{{$jobValue->title}}</a>
                                        <div class="job-text">
                                            <p>{{$jobValue->jobReference}} / {{ucwords($jobValue->gender)}} / {{$jobValue->fromAge}} years - {{$jobValue->toAge}} years</p>
                                            <p>Location :
                                                @foreach ($jobValue->getJobLocations as $jobLocationKey => $jobLocationValue )
                                                    @if ($jobLocationKey === 0)
                                                        {{$jobLocationValue->getCityName->city_name}}
                                                    @else
                                                        , {{$jobLocationValue->getCityName->city_name}}
                                                    @endif
                                                @endforeach
                                            </p>
                                            <p>Category : {{$jobValue->getJobCategory->name}}</p>
                                            <p>Description : {{substr($jobValue->jobDescription, 0, 150).'...'}}</p>
                                        </div>
                                        @if(isset($jobValue->getJobApplied) && count($jobValue->getJobApplied) > 0)
                                            <div class="job-btn-cover">
                                                <a href="{{url('job-applied').'/'.$jobValue->id}}" class="job-read-more">Applied</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
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
                            <a href="{{url('/profile/'.@$view->viewerUser->category->slug.'/'.$view->viewerUser->name_slug)}}" class="profile-comments-img">
                                <img class="img-block" src="{{url('img/user/profile-image/'.@$view->viewerUser->userDetails->profile_image)}}" alt="">
                            </a>
                        </div>
                        <div class="views-modal-list-rgt">
                            <h4>{{$view->viewerUser->name}}</h4>
                            <p>{{@$view->viewerUser->category->name}}, {{@$view->viewerUser->userDetails->city_name}}</p>
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
                            <p>{{$favourite->favouriteUser->category->name}}, {{$favourite->favouriteUser->userDetails->city_name}}</p>
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
