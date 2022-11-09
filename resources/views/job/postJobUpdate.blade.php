@extends('layouts.app')
@section('content')
<section class="user-dashboard">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Post JOb</h3>
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
                                    <div class="vies-text"><p><strong>{{@Auth::user()->views_count}}</strong> views </p></div>
                                    @if (count(@Auth::user()->viewes) > 0)
                                    <div class="views-img d-flex align-items-center">
                                        <ul class="d-flex">
                                            @if (count(@Auth::user()->viewes) > 6)
                                                @foreach (array_slice(@Auth::user()->viewes , 0 ,6) as $view)
                                                    <li>
                                                        <a href="javascript:">
                                                            <img class="img-block" src="{{url('img/user/profile-image/'.@@Auth::user()->viewerUser->userDetails->profile_image)}}" alt="">
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                @foreach (@Auth::user()->viewes as $view)
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
                                    <a href="{{route('user.profile_edit')}}"><i class="far fa-image"></i><strong>{{count(@Auth::user()->images)}}</strong> images</a>
                                </li>
                                <li class="gp">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#favouritesModal"><i class="far fa-heart"></i><strong>{{count(@Auth::user()->favourites)}}</strong> Favorited</a>
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
                @include('flashmessage.flash-message')
                <div class="welcome-text-user">
                    <h3>Update Your Job</h3>
                    <div class="job-create-wrap">
                        <form action="{{route('job.post.update.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{$job->id}}" />
                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                    <div class="book-input-wrap">
                                        <label>Job title</label>
                                        <input type="text" name="jobTitle" class="form-control book-input-style" placeholder="Type Job title" value="{{$job->title}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-select-wrap">
                                        <label>Job Category</label>
                                        <select name="jobCategory" class="form-control book-select-style selectOption2" disabled>
                                            <option>Select Job Category</option>
                                            @foreach ($category as $categoryKey => $categoryValue )
                                                <option value="{{$categoryValue->id}}" {{$categoryValue->id === $job->jobCategory? 'selected':''}}>{{$categoryValue->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-select-wrap">
                                        <label>Job Location</label>
                                        <select class="js-example-basic-multiple form-control book-select-style selectOption2" name="location[]" multiple="multiple" data-allow-clear="true" disabled>
                                            @foreach ($getCities as $cityKey => $cityValue )
                                                <option value="{{$cityValue->id}}" {{in_array($cityValue->id, $joblocation)?'selected':''}}>{{$cityValue->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-input-wrap">
                                        <label>Job Budget</label>
                                        <input type="text" name="budget" class="form-control book-input-style" placeholder="Type Budget" value="{{$job->budget}}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-input-wrap">
                                        <label>Job Date (From - To)</label>
                                        <div class="d-flex">
                                            <input type="date" name="fromJobDate" class="form-control book-input-style" value="{{$job->fromJobDate}}" disabled>
                                            <input type="date" name="toJobDate" class="form-control book-input-style" value="{{$job->toJobDate}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-input-wrap">
                                        <label>Age Range (From - To)</label>
                                        <div class="d-flex">
                                            <input type="text" name="fromAge" class="form-control book-input-style" placeholder="From" value="{{$job->fromAge}}" disabled>
                                            <input type="text" name="toAge" class="form-control book-input-style" placeholder="To" value="{{$job->toAge}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="job-gender">
                                        <label>Gender</label>
                                        <ul class="d-flex">
                                            <li class="checkbox">
                                                <input type="radio" id="male" name="gender" value="male" {{$job->gender === 'male' ?'checked':''}} disabled>
                                                <label for="male">Male</label>
                                            </li>
                                            <li class="checkbox">
                                                <input type="radio" id="female" name="gender" value="female" {{$job->gender === 'female' ?'checked':''}} disabled>
                                                <label for="female">Female</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="book-txtare-wrap">
                                        <label>Job Description</label>
                                        <textarea rows="4" name="jobDescription" class="form-control book-txtare-style resize" placeholder="Type Job Description">{{$job->jobDescription}}</textarea>
                                        @if ($errors->has('jobDescription'))
                                            <span class="text-danger">{{ $errors->first('jobDescription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="job-post-btn-cover text-end">
                                        <button class="job-post-btn" type="submit">post for this jobs</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('.js-example-basic-multiple').select2({
        placeholder: 'Select an job location',
    });
});
</script>
@endpush
