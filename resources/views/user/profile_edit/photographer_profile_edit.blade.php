@extends('layouts.app')
<style type="text/css">
    img {
      display: block;
      max-width: 100%;
    }
    .preview {
      overflow: hidden;
      width: 160px; 
      height: 160px;
      margin: 10px;
      border: 1px solid red;
    }
    .modal-lg{
      max-width: 1000px !important;
    }
    /* .img-container img {
        width: 100%;
    } */
    

    </style>
@section('content')
<section class="model-details-page-sec only-for-edit-page edit_profile_section">
    <div class="model-details-banner position-relative">
        <img class="img-block" src="{{$user->userDetails->cover_img ? url('/img/user/cover-image/'.$user->userDetails->cover_img) : url('images/model-banner2.jpg')}}{{-- {{url('images/model-banner2.jpg')}} --}}" alt="">
        <span class="edip-dp">
            <input type='file' id="cover_image">
            <a class="edip-dp-btn" href="javascript:;"><i class="fas fa-pencil-alt"></i></a>
        </span>
    </div>
    <div class="topuser">
        <div class="container-fluid left-right-40">
            <div class="model-user-details d-flex flex-wrap">
                <div class="model-user-img">
                    <div class="mobile-box">
                        <span class="model-user-box position-relative bdr">
                            <img class="img-block" src="{{url('/img/user/profile-image/'.$user->userDetails->profile_image)}}" alt="">
                            <!-- <span class="model-views"><i class="fas fa-eye"></i>158 Views</span> -->
                            
                            <span class="edip-dp">
                                <input type='file' id="profile_image">
                                <a class="edip-dp-btn" href="javascript:;"><i class="fas fa-pencil-alt"></i></a>
                            </span>
                        </span>
                        <ul class="model-follower d-flex justify-content-between">
                            <li><p class="fev-total"><i class="far fa-heart"></i>0</p></li>
                            <li><a href="#"><i class="far fa-envelope"></i>0</a></li>
                        </ul>
                    </div>
                </div>
                <div class="model-user-info d-flex flex-wrap align-items-end justify-content-between">
                    <div class="model-user-info-lft">
                        <div class="model-name">
                            <h3>{{@$user->name}}</h3>
                            {{-- <ul class="ratting-star d-flex">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul> --}}
                            <div class="model-user">
                                <p><span class="info-type">Category:</span>{{$user->category->name}}</p>
                                {{-- <p><span class="info-type">Date:</span>April 16, 2019</p> --}}
                                <p><span class="info-type">Tags:</span>Artist, Cosmetics, Make up</p>
                                <p><span class="info-type">Join Date:</span>{{ Carbon\Carbon::parse($user->created_at)->format('F d Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="model-user-info-rgt">
                        <div class="model-user">
                            <p>{{$user->userDetails->city_name}}, {{$user->userDetails->getState->iso2}}</p>
                            {{-- <p>{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}</p> --}}
                            <ul class="d-flex copy-url">
                                <li class="crnt-url">{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}</li>
                                <li><a href="javascript:void(0)" onclick="copyLink('{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}')">copy link</a></li>
                            </ul>
                            <p><span class="info-type">Last Activity:</span>{{ Carbon\Carbon::parse($user->last_active)->format('F d Y') }}</p>
                           
                        </div>
                        @if ($user->category->slug == 'casting-director')
                            {{-- <div class="book-now-wrap">
                                <a href="javascript:void(0)" data-id="{{Crypt::encrypt($user->id)}}" data-bs-toggle="modal" data-bs-target="#job_post_modal" class="book-now">Post a Job</a>
                            </div> --}}
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="follow-slider-wrap">
                        <div class="user-small-head">
                            <h5 class="mb-2"><a href="#">Followers <span class="followers-num">0</span></a></h5>
                        </div>
                        {{-- <div class="followers-list">
                            <ul class="d-flex flex-wrap">
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model2.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model3.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model4.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model5.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="follow-slider-wrap mt-3">
                        <div class="user-small-head">
                            <h5 class="mb-2"><a href="#">Following <span class="followers-num">0</span></a></h5>
                        </div>
                        {{-- <div class="followers-list">
                            <ul class="d-flex flex-wrap">
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model2.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model3.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model4.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="follower-img">
                                            <img class="img-block" src="{{url('images/feutered-model/model5.jpg')}}" alt="">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <form action="" method="post" id="edit_profile_frm">
                        @csrf
                        <div class="user-about-edit-wrap">
                            <div class="accordion" id="accordionExample">
                                
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="infoOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseFive">
                                        Accepted Job Type
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="infoOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="info-edit-Interested">
                                            <ul class="d-flex flex-wrap">
                                                @if(Helper::acceptedJobTypeArr())
                                                    @foreach (Helper::acceptedJobTypeArr() as $key => $data)
                                                    <li class="checkbox">
                                                        @php 
                                                            $checked = '';
                                                            if($user->userDetails->accepted_job != '' || $user->userDetails->accepted_job != 'null'){
                                                                $jobArr = explode(',',$user->userDetails->accepted_job);
                                                                if(in_array($key,$jobArr)){
                                                                    $checked = 'checked';
                                                                }
                                                            }
                                                        @endphp
                                                        <input type="checkbox" onclick="enabledOption('accept_{{$key}}')" id="accept_{{$key}}" value="{{$key}}" name="accepted_job[]" {{$checked}}>
                                                        <label for="accept_{{$key}}">{{$data}}</label>
                                                    </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="infoTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseFive">
                                        Language
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="infoTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="info-edit-Interested">
                                            <ul class="d-flex flex-wrap">
                                                @if(Helper::languageArr())
                                                    @foreach (Helper::languageArr() as $key => $data)
                                                    <li class="checkbox">
                                                        @php 
                                                            $checked = '';
                                                            if($user->userDetails->language != '' || $user->userDetails->language != 'null'){
                                                                $languageArr = explode(',',$user->userDetails->language);
                                                                if(in_array($key,$languageArr)){
                                                                    $checked = 'checked';
                                                                }
                                                            }
                                                        @endphp
                                                        <input type="checkbox" onclick="enabledOption('lang_{{$key}}')" id="lang_{{$key}}" value="{{$key}}" name="language[]" {{$checked}}>
                                                        <label for="lang_{{$key}}">{{$data}}</label>
                                                    </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="infoThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseFive">
                                        Experience
                                    </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="infoThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="info-edit-wrap d-flex align-items-center">
                                            <div class="info-edit-lft">
                                                <h4>Experience</h4>
                                            </div>
                                            <div class="info-edit-rgt">
                                                <div class="info-edit-box d-flex align-items-center">
                                                    <div class="info-edit-icon" onclick="enabledOption('exprience')"><i class="fas fa-pencil-alt"></i></div>
                                                    <div class="info-edit-value">
                                                        <div class="edit-value-select">
                                                            <select class="form-control edit-select-style selectOptionEdit disabled" id="exprience" name="exprience">
                                                                @foreach(range(0, 40) as $exprience)
                                                                    <option value="{{$exprience}}" @if (isset($user) && $user->userDetails->exprience == $exprience) selected @endif>{{$exprience}} years</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="infoFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFive">
                                        Compensation
                                    </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="infoFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="info-edit-Interested">
                                            <ul class="d-flex flex-wrap">
                                                @if(Helper::compensationArr())
                                                    @foreach (Helper::compensationArr() as $key => $data)
                                                    <li class="checkbox">
                                                        @php 
                                                            $checked = '';
                                                            if($user->userDetails->compensation != '' || $user->userDetails->compensation != 'null'){
                                                                $compensationArr = explode(',',$user->userDetails->compensation);
                                                                if(in_array($key,$compensationArr)){
                                                                    $checked = 'checked';
                                                                }
                                                            }
                                                        @endphp
                                                        <input type="checkbox" onclick="enabledOption('compen_{{$key}}')" id="compen_{{$key}}" value="{{$key}}" name="compensation[]" {{$checked}}>
                                                        <label for="compen_{{$key}}">{{$data}}</label>
                                                    </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="infoSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Biography
                                    </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="infoSix" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="info-bio-edit">
                                                <div class="info-bio-edit-head d-flex align-items-center justify-content-between">
                                                    <div class="info-bio-lft">
                                                        <h4>Biography</h4>
                                                    </div> 
                                                    <div class="info-bio-rgt">
                                                        <div class="info-edit-icon" onclick="enabledOption('biography')"><i class="fas fa-pencil-alt"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bio-info-dtls">
                                                    <textarea class="form-control disabled" rows="3" id="biography" name="biography" placeholder="Please enter Biography">{{$user->userDetails->biography}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="infoSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSix">
                                        Rates
                                    </button>
                                    </h2>
                                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="infoSeven" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Per Hours</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('booking_amount_hour')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-input add-dlr-icon">
                                                                <input type="number" class="form-control edit-input-style disabled" placeholder="Amount in USD" id="booking_amount_hour" name="booking_amount_hour" value="{{$user->userDetails->booking_amount_hour}}">
                                                                <span class="dlr-icon"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Per day</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('booking_amount_day')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-input add-dlr-icon">
                                                                <input type="number" class="form-control edit-input-style disabled" placeholder="Enter Amount in USD" id="booking_amount_day" name="booking_amount_day" value="{{$user->userDetails->booking_amount_day}}">
                                                                <span class="dlr-icon"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Per Week</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('booking_amount_week')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-input add-dlr-icon">
                                                                <input type="number" class="form-control edit-input-style disabled" placeholder="Amount in USD" id="booking_amount_week" name="booking_amount_week" value="{{$user->userDetails->booking_amount_week}}">
                                                                <span class="dlr-icon"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="infoEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        Social
                                    </button>
                                    </h2>
                                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="infoEight" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="info-bio-edit">
                                                <div class="info-bio-edit-head d-flex align-items-center justify-content-between">
                                                    <div class="info-bio-lft">
                                                        <h4>Facebook Link</h4>
                                                    </div> 
                                                    <div class="info-bio-rgt">
                                                        <div class="info-edit-icon" onclick="enabledOption('facebook_link')"><i class="fas fa-pencil-alt"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bio-info-dtls mt-1">
                                                    <input type="text" class="form-control disabled" name="facebook_link" id="facebook_link" value="{{@$user->userDetails->facebook_link}}">
                                                </div>
                                            </div>
                                            <div class="info-bio-edit">
                                                <div class="info-bio-edit-head d-flex align-items-center justify-content-between">
                                                    <div class="info-bio-lft">
                                                        <h4>Youtube Link</h4>
                                                    </div> 
                                                    <div class="info-bio-rgt">
                                                        <div class="info-edit-icon" onclick="enabledOption('youtube_link')"><i class="fas fa-pencil-alt"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bio-info-dtls mt-1">
                                                    <input type="text" class="form-control disabled" name="youtube_link" id="youtube_link" value="{{@$user->userDetails->youtube_link}}">
                                                </div>
                                            </div>
                                            <div class="info-bio-edit">
                                                <div class="info-bio-edit-head d-flex align-items-center justify-content-between">
                                                    <div class="info-bio-lft">
                                                        <h4>Twitter Link</h4>
                                                    </div> 
                                                    <div class="info-bio-rgt">
                                                        <div class="info-edit-icon" onclick="enabledOption('twitter_link')"><i class="fas fa-pencil-alt"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bio-info-dtls mt-1">
                                                    <input type="text" class="form-control disabled" name="twitter_link" id="twitter_link" value="{{@$user->userDetails->twitter_link}}">
                                                </div>
                                            </div>
                                            <div class="info-bio-edit">
                                                <div class="info-bio-edit-head d-flex align-items-center justify-content-between">
                                                    <div class="info-bio-lft">
                                                        <h4>Linkedin Link</h4>
                                                    </div> 
                                                    <div class="info-bio-rgt">
                                                        <div class="info-edit-icon" onclick="enabledOption('linkedin_link')"><i class="fas fa-pencil-alt"></i></div>
                                                    </div>
                                                </div>
                                                <div class="bio-info-dtls mt-1">
                                                    <input type="text" class="form-control disabled" name="linkedin_link" id="linkedin_link" value="{{@$user->userDetails->linkedin_link}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                    <div class="models-tab-information">
                        <ul class="nav nav-tabs first-tab-list" id="modelsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="portfolio-tab" data-bs-toggle="tab" data-bs-target="#portfolio" type="button" role="tab" aria-controls="portfolio" aria-selected="true">portfolio<i class="fas fa-user"></i></button>
                            </li>
                            {{-- <li class="nav-item" role="presentation">
                              <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" type="button" role="tab" aria-controls="comments" aria-selected="false">comments<i class="far fa-comment-alt"></i></button>
                            </li> --}}
                            {{-- <li class="nav-item" role="presentation">
                              <button class="nav-link" id="calender-tab" data-bs-toggle="tab" data-bs-target="#calender" type="button" role="tab" aria-controls="calender" aria-selected="false">calendar<i class="fas fa-calendar-alt"></i></button>
                            </li> --}}
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="followers-tab" data-bs-toggle="tab" data-bs-target="#followers" type="button" role="tab" aria-controls="followers" aria-selected="false">followers<i class="fas fa-user-friends"></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="following-tab" data-bs-toggle="tab" data-bs-target="#following" type="button" role="tab" aria-controls="following" aria-selected="false">following<i class="fas fa-user-friends"></i></button>
                            </li>
                          </ul>
                        <div class="tab-content" id="modelsTabContent">
                            <div class="tab-pane fade show active" id="portfolio" role="tabpanel" aria-labelledby="portfolio-tab">
                                <div class="row justify-content-between align-items-center mt-3 mb-3">
                                    <div class="col-auto">
                                        <ul class="nav nav-tabs second-tab-list" id="portflTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab" aria-controls="photos" aria-selected="true">photos</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link " id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false">videos</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <div class="img-video-up d-flex align-items-center">
                                            <ul class="img-video-btn-wrap d-flex">
                                                <li>
                                                    <input type="file" id="img_upload">
                                                    <label for="img_upload" class="img-video-btn" {{-- data-bs-toggle="modal" data-bs-target="#imgUp" --}}><i class="fas fa-image"></i>image upload</label>
                                                </li>
                                                <li>
                                                    <button class="video-upload-btn" type="button" data-bs-toggle="modal" data-bs-target="#upload_video_modal"><i class="fas fa-video" ></i> video upload</button>
                                                    {{-- <input type="file" id="vid-up"> --}}
                                                   {{--  <label for="vid-up" class="img-video-btn"><i class="fas fa-video" ></i>video upload</label> --}}
                                                </li>
                                            </ul>
                                            {{-- <div class="src-select-wrap">
                                                <select class="form-control src-select-style selectOption2">
                                                    <option>Recent</option>
                                                    <option>Popular</option>
                                                    <option>Most like</option>
                                                </select>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content" id="portflTabContent">
                                    <div class="tab-pane fade show active" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                                        <div class="model-photos-wrap">
                                            <div class="row g-3">
                                                @if(count($user->images) > 0)
                                                    @foreach ($user->images->sortByDesc('id') as $image)
                                                    <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                                                        <div class="model-photos-gallery add-dlt">
                                                            {{-- <a class="gal-img" data-fancybox="img-gallery" href="{{url('img/user/images/'.$image->image)}}"><img class="img-block" src="{{url('img/user/images/'.$image->image)}}">
                                                            </a> --}}
                                                            <span class="gal-img photo_view" data-photo="photo_{{$image->id}}">
                                                                <img class="img-block" src="{{url('img/user/images/'.$image->image)}}" alt="">
                                                            </span>
                                                            <span class="delete-btn" onclick="deletePhoto({{$image->id}})"><i class="fas fa-trash-alt"></i></span>
                                                            <div class="model-photos-like-cmnt">
                                                                <ul class="d-flex justify-content-between">
                                                                    <li><p><i class="fas fa-thumbs-up"></i>0</p></li>
                                                                    <li class="photo_view"><a href="#"><i class="far fa-comment-alt"></i></a>0</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @else
                                                <div class="col-12">
                                                    <div class="not-found-text">
                                                        <i class="fas fa-exclamation-triangle"></i>
                                                        <p>no image found</p>
                                                    </div>
                                                </div>    
                                                @endif
                                               {{--  <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                                                    <div class="model-photos-gallery">
                                                        <a class="gal-img add-dlt" data-fancybox="img-gallery" href="{{url('images/feutered-model/model2.jpg')}}"><img class="img-block" src="{{url('images/feutered-model/model2.jpg')}}">
                                                            <span class="delete-btn"><i class="fas fa-trash-alt"></i></span>
                                                        </a>
                                                        <div class="model-photos-like-cmnt">
                                                            <ul class="d-flex justify-content-between">
                                                                <li><a href="#"><i class="far fa-thumbs-up"></i></a>5</li>
                                                                <li><a href="#"><i class="far fa-comment-alt"></i></a>5</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                                                    <div class="model-photos-gallery">
                                                        <a class="gal-img add-dlt" data-fancybox="img-gallery" href="{{url('images/feutered-model/model6.jpg')}}"><img class="img-block" src="{{url('images/feutered-model/model6.jpg')}}">
                                                            <span class="delete-btn"><i class="fas fa-trash-alt"></i></span>
                                                        </a>
                                                        <div class="model-photos-like-cmnt">
                                                            <ul class="d-flex justify-content-between">
                                                                <li><a href="#"><i class="far fa-thumbs-up"></i></a>5</li>
                                                                <li><a href="#"><i class="far fa-comment-alt"></i></a>5</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="videos" role="tabpanel" aria-labelledby="videos-tab">
                                        <div class="model-video-wrap">
                                            <div class="row">
                                                @if (count($user->videos) > 0)
                                                    @forelse ($user->videos as $video)
                                                        <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                                                            <div class="model-video-gallery add-dlt">
                                                                <span class="delete-btn" onclick="deleteVideo({{$video->id}})"><i class="fas fa-trash-alt"></i></span>
                                                                <a class="gal-video " data-fancybox="video-gallery" data-fancybox-type="iframe" href="{{$video->youtube_video_link}}">
                                                                    <img class="img-block" src="{{url('/img/user/youtube_thumbnail_image/'.$video->thumbnail_image.'')}}" alt="">
                                                                    <span class="video-play-btn"><i class="fab fa-youtube"></i></span>
                                                                    
                                                                </a>
                                                                <div class="model-photos-like-cmnt">
                                                                    <ul class="d-flex justify-content-between">
                                                                        <li><p><i class="far fa-thumbs-up"></i>{{count($video->likes)}}</p></li>
                                                                    {{--  <li><a href="#"><i class="far fa-comment-alt"></i></a>5</li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                       
                                                    @endforelse
                                                @else
                                                    <div class="col-12">
                                                        <div class="not-found-text">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                            <p>no video found</p>
                                                        </div>
                                                    </div>    
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                                @include('comments.profile.commentsDisplay', ['comments' => $user->comments, 'profile_id' => $user->id])

                                <div class="msg-cmnt">
                                    <form action="{{route('profile.comment.store')}}" method="post" class="profile_comment">
                                        @csrf
                                        <div class="profile-input-wrap">
                                            <input type="text" name="comment" class="form-control profile-input-style" placeholder="Type your comment">
                                            <input type="hidden" name="comment_to_user_id" value="{{Crypt::encrypt($user->id)}}">
                                            <span class="profile-input-btn-wrap">
                                                <button class="profile-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                            <div class="tab-pane fade" id="calender" role="tabpanel" aria-labelledby="calender-tab">...</div>
                            <div class="tab-pane fade" id="followers" role="tabpanel" aria-labelledby="followers-tab">
                                <div class="row g-3 mt-2">
                                    @forelse ($user->followers as $followers)
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="model-box-wrap followrs-box">
                                                <div class="model-box-design">
                                                    <span class="model-box-img">
                                                        <img class="img-block" src="{{url('/img/user/profile-image/'.$followers->followersUser->userDetails->profile_image)}}" alt="">
                                                    </span>
                                                    <div class="model-box-text">
                                                        <h4><a href="{{url('/profile/'.$followers->followersUser->category->slug.'/'.$followers->followersUser->name_slug)}}">{{$followers->followersUser->name}}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="col-12">
                                        <div class="not-found-text">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            <p>no follower found</p>
                                        </div>
                                    </div>
                                    @endforelse
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model6.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>block</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model2.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>block</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model2.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unblock</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>block</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">
                                <div class="row g-3 mt-2">
                                    @forelse ($user->followings as $followings )
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="model-box-wrap followrs-box">
                                                <div class="model-box-design">
                                                    <span class="model-box-img">
                                                        <img class="img-block" src="{{url('/img/user/profile-image/'.$followings->followingsUser->userDetails->profile_image)}}">
                                                    </span>
                                                    <div class="model-box-text">
                                                        <h4><a href="{{url('/profile/'.$followings->followingsUser->category->slug.'/'.$followings->followingsUser->name_slug)}}">{{$followings->followingsUser->name}}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="col-12">
                                        <div class="not-found-text">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            <p>no following found</p>
                                        </div>
                                    </div>
                                    @endforelse
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model6.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unfollow</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model2.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unfollow</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model2.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unfollow</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unfollow</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="edit_id" value="">
</section>

 <!-- image Upload Modal -->
 <div class="modal fade img-vidup-modal" id="img_upload_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="imgUpLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imgUpLabel">Add image details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('user.image.upload')}}" method="post" enctype="multipart/form-data" id="frm_img_upload">
            @csrf
            <input type="hidden" name="image" id="image" value="">
            <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="immg-select">
                        <img id="uploaded_image" class="img-block" src="{{url('images/makeupartist/make-artist-dp.jpg')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-12 mb-2">
                    <div class="input-wrap">
                        <input class="form-control input-underline" placeholder="Enter image title" name="title">
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="select-wrap">
                        <select class="form-control select-underline selectOption" name="image_category">
                            <option value="">Select Photo Catagory</option>
                            @foreach ($image_categories as $image_cat)
                                <option value="{{$image_cat->id}}">{{$image_cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               {{-- <div class="col-12 mb-2">
                    <div class="txtare-wrap">
                        <textarea class="form-control txtare-style" name="" id="" rows="3" placeholder="Write Copyright" name="copyright"></textarea>
                    </div>
                </div> --}}
                <div class="col-12 mb-2">
                    <div class="txtare-wrap">
                        <textarea class="form-control txtare-style" id="" rows="3" placeholder="Write Description" name="description"></textarea>
                    </div>
                </div>
                
            </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-dark">Save</button>
            </div>
        </form>
      </div>
    </div>
    <div class="loader-wrap" id="loading_container_modal" style="display: none">
        <div class="mesh-loader-wrap">
            <div class="mesh-loader">
            <div class="set-one">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            <div class="set-two">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
{{-- end Image upload  Model--}}
{{-- Crop Profile Image Modal --}}
<div class="modal fade" id="profile_img_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crop Image</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="img-container">
                <div class="row">
                    <div class="col-md-8">
                        <img id="brows_profile_image" src="https://avatars0.githubusercontent.com/u/3456749">
                    </div>
                    <div class="col-md-4">
                        <div class="preview"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="profile_image_crop">Crop</button>
        </div>
        </div>
    </div>
</div>
{{-- end Crop Profile Image Modal  --}}

{{-- Crop cover Image Modal --}}
<div class="modal fade" id="cover_img_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crop Image</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="img-container">
                <div class="row">
                    <div class="col-md-8">
                        <img id="brows_cover_image" src="https://avatars0.githubusercontent.com/u/3456749">
                    </div>
                    <div class="col-md-4">
                        <div class="preview"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="cover_image_crop">Crop</button>
        </div>
        </div>
    </div>
</div>
{{-- end Crop cover Image Modal --}}
<!-- Photo View Modal -->
<div class="popup-wrap popup_open">
    <div class="popup-body-main">
        <div class="popup-body">
            <button class="popup-wrap-btn close_popup"><i class="far fa-times-circle"></i></button>
            <div class="photo-list-wrap">
                @if(count($user->images) > 0)
                    @foreach ($user->images->sortByDesc('id') as $image)
                        <div id="photo_{{$image->id}}" class="photo-list">
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                                    <div class="popup-img">
                                        <img class="img-block photo_Height" src="{{url('img/user/images/'.$image->image)}}">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                                    <div class="ftr-cmnt photo_Height">
                                        <div class="photo-comments-main">
                                            <div class="photo-comments" id="photo_cmt_{{$image->id}}">
                                                @if (count($image->comments) > 0)
                                                    @foreach ($image->comments as $comment)
                                                        <div class="photo-comments-wrap d-flex">
                                                            <div class="photo-comments-wrap-lft">
                                                                <a href="{{url('/profile/'.$comment->user->category->slug.'/'.$comment->user->name_slug)}}" class="photo-comments-img">
                                                                    <img class="img-block" src="{{url('/img/user/profile-image/'.$comment->user->userDetails->profile_image)}}" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="photo-comments-wrap-rgt">
                                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                                    <h4><a href="{{url('/profile/'.$comment->user->category->slug.'/'.$comment->user->name_slug)}}">{{$comment->user->name}}</a> <span>{{$comment->user->category->name}}</span></h4>
                                                                    <div class="cmnts-rply-date">
                                                                        <ul class="d-flex">
                                                                            <li>{{\Carbon\Carbon::parse(now())->diffInDays(\Carbon\Carbon::parse($comment->created_at))}} days ago</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p>{{$comment->comment}}</p>
                                                                {{-- <div class="cmnts-rply-date">
                                                                    <ul class="d-flex">
                                                                        <li><a href="#"><i class="far fa-thumbs-up"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-reply"></i></a></li>
                                                                        <li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="photo-input-wrap">
                                                                    <input type="text" class="form-control photo-input-style" placeholder="Type your comment">
                                                                    <span class="photo-input-btn-wrap">
                                                                        <button class="photo-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                                    </span>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    @endforeach 
                                                @else
                                                    <div class="row h-100 align-items-center" id="no_comment_msg_{{$image->id}}">
                                                        <div class="col-12">
                                                            <div class="not-found-text no-msg-area">
                                                                <i class="far fa-comments"></i>
                                                                <p>no Comments yet</p>
                                                                <p><small>Be the first comment</small></p>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                @endif
                                            </div>
                                            <div class="msg-cmnt when-fixed">
                                                <form  action="{{route('photo.comment.store')}}" method="post" class="photo_comment">
                                                    @csrf
                                                    <div class="profile-input-wrap">
                                                        <input type="text" class="form-control profile-input-style" name="comment" placeholder="Type your comment" id="comment">
                                                        <input type="hidden" name="photo_id" value="{{Crypt::encrypt($image->id)}}">
                                                        <span class="profile-input-btn-wrap">
                                                            <button class="profile-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif        
                
            </div>
            <div class="popup-nav-wrap">
                <div class="popup-next" id="next"><i class="fas fa-chevron-right"></i></div>
                <div class="popup-prev" id="prev"><i class="fas fa-chevron-left"></i></div>
            </div>
        </div>
    </div>
    <div class="loader-wrap" id="loading_container_photo_modal" style="display: none">
        <div class="mesh-loader-wrap">
            <div class="mesh-loader">
            <div class="set-one">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            <div class="set-two">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
{{-- end model photo popup --}}
{{-- Start Job Post --}}

<div class="modal fade" id="job_post_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Post Job</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">  
            {{-- <input type="hidden" name="booked_id" value="" id="booked_id">   --}}
            <div class="book-input-wrap">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control book-input-style" id="job_title" name="job_title" value="" required>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="book-input-wrap">
                        <label for="category_id">Looking For</label>
                        <select class="form-select book-select-style" name="category_id" id="category_id" required>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="book-input-wrap">
                        <label for="gender">Your Phone No:</label>
                        <select class="form-select book-select-style" name="gender" id="gender">
                            <option>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="femail">Femail</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-6">
                    <div class="src-select-wrap">
                        <label>Age</label>
                        <div class="price-range-slider">  
                            <div id="age_slider_range" class="range-bar ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 23.7288%; width: 42.3729%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 23.7288%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 66.1017%;"></span></div>
                            <p class="range-value">
                              <input type="text" id="age" readonly="">
                            </p>                                        
                        </div>
                        <input type="hidden" name="min_age" value="15" id="min_age">
                        <input type="hidden" name="max_age" value="40" id="max_age">
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="book-input-wrap">
                        <label for="preferred_date">Preferred Date:</label>
                        <input type="date" class="form-control book-input-style" id="preferred_date" name="preferred_date" min="{{date('Y-m-d')}}" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="book-input-wrap">
                        <label for="preferred_time">Preferred Time:</label>
                        <input type="time" class="form-control book-input-style" id="preferred_time" name="preferred_time">
                    </div>
                </div>
            </div>
            <div class="book-input-wrap">
                <label for="street_address">Street Adderss:</label>
                <input type="text" class="form-control book-input-style" id="street_address" value="" name="street_address" required>
            </div>
            <div class="row">
                <div class="col-sm-6 col-12">
                    <div class="book-select-wrap">
                        <label>Country:</label>
                        <select class="form-select book-select-style selectOption2" name="country_id" id="country-dd" required>
                            <option value="">Please Select Country</option>
                            @foreach ($countres as $country)
                            <option value="{{$country->id}}">
                                {{$country->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-sm-6 col-12">
                    <div class="book-select-wrap">
                        <label>State:</label>
                        <select class="form-select book-select-style selectOption2" name="state_id" id="state-dd" required>
                            <option value="">Please Select State</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-12">
                    <div class="book-input-wrap">
                        <label for="city">City:</label>
                        <input type="text" class="form-control book-input-style" id="city" name="city" required>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="book-input-wrap">
                        <label for="zip_code">Zip Code:</label>
                        <input type="text" class="form-control book-input-style" id="zip_code" name="zip_code" required>
                    </div>
                </div>
            </div>
            
            <div class="book-txtare-wrap">
                <label for="description">Description/Comments:</label>
                <textarea rows="3" class="form-control book-txtare-style" id="description" name="description" required></textarea>
            </div>
            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    {!! RecaptchaV3::field('booking') !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="booked-now-wrap text-end">
                <button type="submit" class="booked-now" id="book_now">Book</button>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="cover_image_crop">Post</button>
        </div>
        </div>
    </div>
</div>
{{-- End Job Post --}}

{{-- Upload Video modal--}}
<div class="modal fade user-book-modal" id="upload_video_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="upload_video_frm" action="{{route('user.video.upload')}}" method="post" class="send_email needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="modelId" value="{{$user->id}}" />
                <div class="modal-body">
                    <div class="book-input-wrap">
                        <label for="video_link">Youtube Video Link :</label>
                        <input type="text" class="form-control book-input-style" id="video_link" name="youtube_video_link" value="" placeholder="Enter Youtube Video Link" required>
                        @if ($errors->has('youtube_video_link'))
                            <span class="text-danger">{{ $errors->first('youtube_video_link') }}</span>
                        @endif
                    </div>
                    <div class="cmn-file-wrap">
                        <label for="">Upload Thumbnail Image :</label>
                        <input type="file" class="form-control" aria-label="file example"   name="image" required>
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <div class="booked-now-wrap text-end">
                        <button type="submit" class="booked-now" id="">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="loader-wrap" id="loading_container_video_upload_modal" style="display: none">
        <div class="mesh-loader-wrap">
            <div class="mesh-loader">
            <div class="set-one">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            <div class="set-two">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
{{-- end upload video modal --}}
@endsection
@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function(){

        toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif

        //Start edit profile deteila
        $('#edit_id').val('');
        $(".edit_profile_section").on("mouseup", function(event) {
            var edit_id = $('#edit_id').val();
            //console.log(edit_id);
            if((event.target.id !="undefined") && (edit_id != event.target.id) && edit_id !=''){
                $('#'+edit_id).addClass('disabled');
                $('#edit_id').val('');
                //console.log('form');
                //Ajax profile data update
                var formdata = $('#edit_profile_frm').serialize(); 
                //console.log(formdata);
                $.ajax({
                    url: "{{route('user.profile.update')}}",
                    type: "POST",
                    data: formdata,
                    success: function(data) {
                        /* if(data.redirect_url){
                            window.location=data.redirect_url; // or {{url('login')}}
                        } */
                    }
                });
            }
        })
        //End Edit profile details

        //Start Image upload
        var $modal = $('#img_upload_model');
        var image = document.getElementById('uploaded_image');
        $("#img_upload").change(function(e) {
            var files = e.target.files;
            var done = function (url) {
            image.src = url;
                $modal.modal('show');
            };

            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                //console.log(file);
                if (URL) {
                    done(URL.createObjectURL(file));
                }/*  else if (FileReader) { */
                    
                    reader = new FileReader();
                    reader.onload = function (e) {
                        var base64data = reader.result; 
                        $('#image').val(base64data);
                        
                        //done(reader.result);
                       
                    };
                    reader.readAsDataURL(file);
                   
               /*  } */
            }
        });
        //End image upload

        //change profile image
        var $profile_modal = $('#profile_img_modal');
        var profile_image = document.getElementById('brows_profile_image');
        var profile_img_cropper;
        $("#profile_image").change(function(e) {
            //console.log('fdsf');
            var files = e.target.files;
            var done = function (url) {
                profile_image.src = url;
                $profile_modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $profile_modal.on('shown.bs.modal', function () {
            profile_img_cropper = new Cropper(profile_image, {
            //aspectRatio: 16 / 9,    
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            profile_img_cropper.destroy();
            profile_img_cropper = null;
        });

        $("#profile_image_crop").click(function(){
            canvas = profile_img_cropper.getCroppedCanvas({
                width: 400,
                height: 400,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob); 
                reader.onloadend = function(e) {
                    var base64data = reader.result; 
                    console.log(base64data);
                    var token = '{{csrf_token()}}';
                    var image_type = 'profile_iamge';
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('ajax.image_change')}}",
                        data: {'_token': token,'image_type':image_type, 'image': base64data},
                        success: function(data){
                            $modal.modal('hide');
                            location.reload();
                        }
                    });
                }
            });
        })
        //end change profile 
        //change cover photo
        var $cover_modal = $('#cover_img_modal');
        var cover_image = document.getElementById('brows_cover_image');
        var cover_img_cropper;
        $("#cover_image").change(function(e) {
            //console.log('fdsf');
            var files = e.target.files;
            var done = function (url) {
                cover_image.src = url;
                $cover_modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $cover_modal.on('shown.bs.modal', function () {
            cover_img_cropper = new Cropper(cover_image, {
            //aspectRatio: 16 / 9,    
            aspectRatio: 4/1,
            viewMode: 3,
            preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cover_img_cropper.destroy();
            cover_img_cropper = null;
        });

        $("#cover_image_crop").click(function(){
            canvas = cover_img_cropper.getCroppedCanvas({
                width: 1640,
                height: 400,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob); 
                reader.onloadend = function(e) {
                    var base64data = reader.result; 
                    console.log(base64data);
                    var token = '{{csrf_token()}}';
                    var image_type = 'cover_iamge';
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('ajax.image_change')}}",
                        data: {'_token': token,'image_type':image_type, 'image': base64data},
                        success: function(data){
                            $modal.modal('hide');
                            location.reload();
                        }
                    });
                }
            });
        })
        //end Cover photo
    });
   
    function enabledOption(id){
        $('#'+id).removeClass('disabled');
        $('#edit_id').val(id);
    }
    
    $("#frm_img_upload").validate({
        rules: {
            title: {
                required: true,
            },
            image_category: {
                required: true,
            },
        },
        submitHandler: function(form) {
            $("#loading_container_modal").attr("style", "display:block");
            form.submit();
        }
    });

    //delete Photo
    function deletePhoto(img){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.isConfirmed) {
                $("#loading_container").attr("style", "display:block");
                var token = '{{csrf_token()}}';
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{route('user.delete_img')}}",
                    data: {'_token': token,'image_id':img},
                    success: function(data){
                        toastr.success(data.massage);
                        location.reload();
                    }
                });
            }
        });
    }

    var $temp = $("<input>");
    function copyLink(url){
        $("body").append($temp);
        $temp.val(url).select();
        document.execCommand("copy");
        $temp.remove();
        //$("p").text("URL copied!");
        toastr.success('Link copied!')
    }
    $(document).on('submit','.profile_comment',function(){
        $("#loading_container").attr("style", "display:block");
    });

    //photo view popup
$(document).on('click', '.photo_view', function(){
    var photo_id  = $(this).data("photo");
    $('#'+photo_id).show();
    $(".popup_open").addClass("open");
});
$(document).on('click', '.close_popup', function(){
    //$(this).find(".photo-list-wrap .photo-list").hide();
    $(".photo-list-wrap .photo-list").hide();
    //console.log($(this).closest("div").find(".photo-list-wrap .photo-list").attr('id'));
    //$(".photo-list-wrap .photo-list").hide().attr('style','transition: all 0.5s ease-in-out');
    $(".popup_open").removeClass("open");
    
});

$(document).ready(function(){
    $(".photo-list-wrap .photo-list").each(function(e) {
        /* if (e != 0) */
            $(this).hide();
    });
    
    $("#next").click(function(){
        if ($(".photo-list-wrap .photo-list:visible").next().length != 0)
            $(".photo-list-wrap .photo-list:visible").next().show().prev().hide();
        else {
            $(".photo-list-wrap .photo-list:visible").hide();
            $(".photo-list-wrap .photo-list:first").show();
        }
        return false;
    });

    $("#prev").click(function(){
        if ($(".photo-list-wrap .photo-list:visible").prev().length != 0)
            $(".photo-list-wrap .photo-list:visible").prev().show().next().hide();
        else {
            $(".photo-list-wrap .photo-list:visible").hide();
            $(".photo-list-wrap .photo-list:last").show();
        }
        return false;
    });

    //Start Age range filter
    var min_age = 0;
    var max_age = 80;    
    $( "#age_slider_range" ).slider({
        range: true,
        min: 1,
        max: 60,
        values: [ min_age, max_age ],
        slide: function( event, ui ) {
            $( "#age" ).val(ui.values[ 0 ]+" Years  - " + ui.values[ 1 ]+" Years" );
            $('#min_age').val(ui.values[ 0 ]);
            $('#max_age').val(ui.values[ 1 ]);
        }
    });
    $( "#age" ).val( $( "#age_slider_range" ).slider( "values", 0 ) +
    " Years - " + $( "#age_slider_range" ).slider( "values", 1 )+" Years" );

    $('#min_age').val($( "#age_slider_range" ).slider( "values", 0 ));
    $('#max_age').val($( "#age_slider_range" ).slider( "values", 1 ));
    //End Age range filter
    
});
//end photo popup
//Photo comment submit
$(document).on('submit','.photo_comment',function(e){
    e.preventDefault(); 
    var form_value = $(this).serialize();
    var form_valueArr = $(this).serializeArray();
    var comment = form_valueArr[1]['value'];
    //console.log(form_valueArr[1]['value']);
    if(comment == ''){
        toastr.options.timeOut = 2000;
        toastr.error('Please enter comment');
    }else{
        var check_login = '{{Auth::check()}}';
        if(check_login == ''){
            window.location.href = '{{route('login')}}';
        }else{
            //var token = '{{csrf_token()}}';
            $("#loading_container_photo_modal").attr("style", "display:block");
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('photo.comment.store')}}",
                data: form_value,
                success: function(responce){
                    $("#loading_container_photo_modal").attr("style", "display:none");
                    $('.photo_comment').each(function(){
                        this.reset();
                    });
                    $('#no_comment_msg_'+responce.comment_details.photo_id).hide();
                    //console.log(responce.comment_details.photo_id);
                    $('#photo_cmt_'+responce.comment_details.photo_id).append(`<div class="photo-comments-wrap d-flex">
                                                <div class="photo-comments-wrap-lft">
                                                    <a href="`+responce.comment_details.profile_url+`" class="photo-comments-img">
                                                        <img class="img-block" src="`+responce.comment_details.profile_img+`" alt="">
                                                    </a>
                                                </div>
                                                <div class="photo-comments-wrap-rgt">
                                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                        <h4><a href="`+responce.comment_details.profile_url+`">`+responce.comment_details.user_name+`</a> <span>`+responce.comment_details.category_name+`</span></h4>
                                                        <div class="cmnts-rply-date">
                                                            <ul class="d-flex">
                                                                <li>`+responce.comment_details.created_at
                                                                    +` days ago</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <p>`+responce.comment_details.comment+`</p>
                                                </div>
                                            </div>`);
                }
            });
            
        } 
    }
    
    //$("#loading_container_modal").attr("style", "display:block");

});
(function () {
    'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
            //console.log(forms);
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
            //photo height
        var photoHeight = 0;
        $('.photo_Height').each(function () {
            if ($(this).outerHeight() >= photoHeight) {
                photoHeight = $(this).outerHeight();
            }
        });
        $('.photo_Height').css({
            'min-height': photoHeight
        });    

    })()

    //end photo popup
    $(document).on('submit','#contact_frm',function(e){
        $("#loading_container").attr("style", "display:block");
    });

    //Calender section
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var calendar = $('#full_calendar_events').fullCalendar({
            editable: true,
            editable: true,
            events: "{{route('user.calendar.book')}}",
            displayEventTime: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (event_start, event_end, allDay) {
                /* var event_name = prompt('Event Name:');
                if (event_name) {
                    var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                    var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + "/calendar-crud-ajax",
                        data: {
                            event_name: event_name,
                            event_start: event_start,
                            event_end: event_end,
                            type: 'create'
                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("Event created.");
                            calendar.fullCalendar('renderEvent', {
                                id: data.id,
                                title: event_name,
                                start: event_start,
                                end: event_end,
                                allDay: allDay
                            }, true);
                            calendar.fullCalendar('unselect');
                        }
                    });
                } */
            },
            eventDrop: function (event, delta) {
                /* var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                $.ajax({
                    url: SITEURL + '/calendar-crud-ajax',
                    data: {
                        title: event.event_name,
                        start: event_start,
                        end: event_end,
                        id: event.id,
                        type: 'edit'
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Event updated");
                    }
                }); */
            },
            eventClick: function (event) {
                /* var eventDelete = confirm("Are you sure?");
                if (eventDelete) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event removed");
                        }
                    });
                } */
            }
        });
    });
    function displayMessage(message) {
        toastr.success(message, 'Event');
    }

    $(document).on('submit','#upload_video_frm',function(){
        $("#loading_container_video_upload_modal").attr("style", "display:block");
    });

     //delete Video
    function deleteVideo(video){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.isConfirmed) {
                $("#loading_container").attr("style", "display:block");
                var token = '{{csrf_token()}}';
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{route('user.delete_video')}}",
                    data: {'_token': token,'video_id':video},
                    success: function(data){
                        toastr.success(data.massage);
                        location.reload();
                    }
                });
            }
        });

    }
</script>
@endpush