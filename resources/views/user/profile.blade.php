@extends('layouts.app')
@section('content')
<section class="model-details-page-sec">
    <div class="model-details-banner">
        <img class="img-block" src="{{url('images/model-banner2.jpg')}}" alt="">
    </div>
    <div class="topuser">
        <div class="container-fluid left-right-40">
            <div class="model-user-details d-flex flex-wrap">
                <div class="model-user-img">
                    <div class="mobile-box">
                        <span class="model-user-box position-relative bdr">
                            <img class="img-block" src="{{url('/img/user/profile-image/'.$user->userDetails->profile_image)}}" alt="">
                            <!-- <span class="model-views"><i class="fas fa-eye"></i>158 Views</span> -->
                        </span>
                        <ul class="model-follower d-flex justify-content-between">
                            <li><a href="javascript:" class="add-fev" onclick="favourite({{$user->id}})"><i class="{{($count_favourite > 0 ? 'fas' : 'far')}} fa-heart" id="favourite"></i>{{count($user->favourites)}}</a></li>
                            <li><a href="#"><i class="far fa-envelope"></i>0</a></li>
                        </ul>
                    </div>
                </div>
                <div class="model-user-info d-flex flex-wrap align-items-end justify-content-between">
                    <div class="model-user-info-lft">
                        <div class="model-name">
                            <h3>{{@$user->userDetails->name}}</h3>
                            <ul class="ratting-star d-flex">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <div class="model-user">
                                <p><span class="info-type">Category:</span>{{$user->category->name}}</p>
                                <p><span class="info-type">Date:</span>April 16, 2019</p>
                                <p><span class="info-type">Tags:</span>Artist, Cosmetics, Make up</p>
                            </div>
                        </div>
                    </div>
                    <div class="model-user-info-rgt">
                        <ul class="model-social d-flex">
                            <li><a href="#" class="fcbk"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="ytbe"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#" class="twtr"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="lkdn"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                        <div class="model-user">
                            <p>{{$user->userDetails->city_name}}, {{$user->userDetails->getState->iso2}}</p>
                            {{-- <p>{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}</p> --}}
                            <ul class="d-flex copy-url">
                                <li class="crnt-url">{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}</li>
                                <li><a href="javascript:void(0)" onclick="copyLink('{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}')">copy link</a></li>
                            </ul>
                            <p><span class="info-type">Last Activity:</span>{{ Carbon\Carbon::parse($user->last_active)->format('F d Y') }}</p>
                            <p><span class="info-type">Join Date:</span>{{ Carbon\Carbon::parse($user->created_at)->format('F d Y') }}</p>
                        </div>
                        <div class="book-now-wrap">
                            <a href="#" class="book-now">book now</a>
                        </div>
                        <!-- <ul class="add-to-favorite d-flex">
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li>Add to Favorite</li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="follow-slider-wrap">
                        <div class="user-small-head d-flex justify-content-between mb-2">
                            <h5 class=""><a data-count="{{count($user->followers)}}" href="#">Followers <span class="followers-num" id="followers_count">{{count($user->followers)}}</span></a></h5>
                            <a href="javascript:" onclick="follow({{$user->id}})" class="flow-btn {{$count_follow > 0 ? 'followed' : ''}}" id="followlink">{{$count_follow > 0 ? 'following' : 'follow'}}</a>
                            
                        </div>
                        <div class="followers-list">
                            <ul class="d-flex flex-wrap">
                                @if (count($user->followers) > 0)
                                    @foreach ($user->followers as $followers)
                                    <li>
                                        <a href="#">
                                            <span class="follower-img">
                                                <img class="img-block" src="{{url('/img/user/profile-image/'.$followers->followingsUser->userDetails->profile_image)}}" alt="">
                                            </span>
                                        </a>
                                    </li>
                                    @endforeach
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                    <div class="follow-slider-wrap mt-3">
                        <div class="user-small-head">
                            <h5 class="mb-2"><a href="#">Following <span class="followers-num">5</span></a></h5>
                        </div>
                        <div class="followers-list">
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
                        </div>
                    </div>
                    <div class="user-details-info-box">
                        <div class="user-small-head">
                            <h5>Biography</h5>
                        </div>
                        <div class="user-biography">
                            <p>{{$user->userDetails->biography}}</p>
                        </div>
                        @if($user->category->slug == 'models')
                            {{-- For Model Section --}}
                            <div class="model-info-wrap">
                                <div class="user-small-head mb-2">
                                    <h6>Personal Information</h6>
                                </div>
                                <ul class="d-flex flex-wrap justify-content-between">
                                    <li>
                                        <h5>Age</h5>
                                        <p>{{Carbon\Carbon::parse($user->userDetails->dob)->age}}</p>
                                    </li>
                                    <li>
                                        <h5>Height</h5>
                                        <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->height)->size)}}</p>
                                    </li>
                                    <li>
                                        <h5>Weight</h5>
                                        <p>{{@Helper::kgToLb($user->userDetails->weight)}} lbs</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap justify-content-between">
                                    <li>
                                        <h5>Bust</h5>
                                        <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->chest)->size)}}</p>
                                    </li>
                                    <li>
                                        <h5>waist</h5>
                                        <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->waist)->size)}}</p>
                                    </li>
                                    <li>
                                        <h5>hips</h5>
                                        <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->hip)->size)}}</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap">
                                    <li>
                                        <h5>shoe size</h5>
                                        <p>{{$user->userDetails->shoe_size}}</p>
                                    </li>
                                    <li>
                                        <h5>dress size</h5>
                                        <p>{{$user->userDetails->dress_size}}</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap">
                                    <li>
                                        <h5>hair</h5>
                                        <p>{{@Helper::getColoursById($user->userDetails->hair_color)->name}}</p>
                                    </li>
                                    <li>
                                        <h5>eyes</h5>
                                        <p>{{@Helper::getColoursById(@$user->userDetails->eye_color)->name}}</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>ETHNICITY</h5>
                                        <p>{{@$user->userDetails->getEthnicity->name}}</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>EXPERIENCE</h5>
                                        <p>{{@Helper::experienceArr()[@$user->userDetails->exprience]}}</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>COMPENSATION</h5>
                                        <p>{{@Helper::compensationArr()[@$user->userDetails->compensation]}}</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>INTERESTED IN</h5>
                                        @php
                                            $interestArr = [];
                                            if($user->userDetails->interested != '' || $user->userDetails->interested != 'null'){
                                                $interestArr = explode(',',$user->userDetails->interested);
                                            }
                                        @endphp
                                        @if(count($interestArr) > 0)
                                            @foreach ($interestArr as $interest)
                                                <p>{{@Helper::interestedArr()[$interest]}}</p>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            {{-- End Model section --}}
                        @elseif($user->category->slug == 'photographer')
                            {{-- For Photographer --}}
                            <div class="model-info-wrap">
                                <div class="user-small-head mb-2">
                                    <h6>Personal Information</h6>
                                </div>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>accepted job type</h5>
                                        @php
                                            $acceptedJobArr = [];
                                            if($user->userDetails->accepted_job != '' || $user->userDetails->accepted_job != 'null'){
                                                $acceptedJobIdArr = explode(',',$user->userDetails->accepted_job);
                                                foreach ($acceptedJobIdArr as $acceptesJob) {
                                                    $acceptedJobArr[] = Helper::acceptedJobTypeArr()[$acceptesJob];
                                                }
                                            }                                  
                                        @endphp
                                        @if(count($acceptedJobArr) > 0)
                                           <p>{{@implode(',',$acceptedJobArr)}}</p>
                                        @endif
                                        
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>language</h5>
                                        @php
                                            $languageArr = [];
                                            if($user->userDetails->language != '' || $user->userDetails->language != 'null'){
                                                $languageIdArr = explode(',',$user->userDetails->language);
                                                foreach ($languageIdArr as $language) {
                                                    $languageArr[] = Helper::languageArr()[$language];
                                                }
                                            }                                  
                                        @endphp
                                        @if(count($languageArr) > 0)
                                            <p>{{@implode(',',$languageArr)}}</p>
                                        @endif
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>exprience</h5>
                                        <p>{{@$user->userDetails->exprience}} years</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>compensation</h5>
                                        @php
                                            $compensationArr = [];
                                            if($user->userDetails->compensation != '' || $user->userDetails->compensation != 'null'){
                                                $compensationIdArr = explode(',',$user->userDetails->compensation);
                                                foreach ($compensationIdArr as $compensation) {
                                                    $compensationArr[] = Helper::compensationArr()[$compensation];
                                                }
                                            }                                  
                                        @endphp
                                        @if(count($compensationArr) > 0)
                                            <p>{{@implode(',',$compensationArr)}}</p>
                                        @endif
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>Rates</h5>
                                        <p>${{@$user->userDetails->rate_per_hours}} per hour</p>
                                        <p>${{@$user->userDetails->rate_half_day}} half day (4 hours)</p>
                                        <p>${{@$user->userDetails->rate_full_day}} full day (8 hours)</p>
                                    </li>
                                </ul>
                            </div>
                            {{-- End photographer --}}
                        @elseif($user->category->slug == 'child-model-and-actor')
                            <div class="model-info-wrap">
                                <div class="user-small-head mb-2">
                                    <h6>Personal Information</h6>
                                </div>
                                <ul class="d-flex flex-wrap justify-content-between">
                                    <li>
                                        <h5>Age</h5>
                                        <p>{{Carbon\Carbon::parse($user->userDetails->dob)->age}}</p>
                                    </li>
                                    <li>
                                        <h5>height</h5>
                                        <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->height)->size)}}</p>
                                    </li>
                                    <li>
                                        <h5>hair</h5>
                                        <p>{{@Helper::getColoursById($user->userDetails->hair_color)->name}}</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap justify-content-between">
                                    <li>
                                        <h5>eyes</h5>
                                        <p>{{@Helper::getColoursById(@$user->userDetails->eye_color)->name}}</p>
                                    </li>
                                    <li>
                                        <h5>dress size</h5>
                                        <p>{{@$user->userDetails->dress_size}}</p>
                                    </li>
                                    <li>
                                        <h5>shoe</h5>
                                        <p>{{@$user->userDetails->shoe_size}}</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>EXPERIENCE</h5>
                                        <p>{{@$user->userDetails->exprience}} jobs</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>ETHNICITY</h5>
                                        <p>{{@$user->userDetails->getEthnicity->name}}</p>
                                    </li>
                                </ul>                                
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>languages</h5>
                                    @php
                                        $languageArr = [];
                                        if($user->userDetails->language != '' || $user->userDetails->language != 'null'){
                                            $languageIdArr = explode(',',$user->userDetails->language);
                                            foreach ($languageIdArr as $language) {
                                                $languageArr[] = Helper::languageArr()[$language];
                                            }
                                        }                                  
                                    @endphp
                                    @if(count($languageArr) > 0)
                                        <p>{{@implode(',',$languageArr)}}</p>
                                    @endif
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>training</h5>
                                        <p>{{$user->userDetails->training}}</p>
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>COMPENSATION</h5>
                                        @php
                                            $compensationArr = [];
                                            if($user->userDetails->compensation != '' || $user->userDetails->compensation != 'null'){
                                                $compensationIdArr = explode(',',$user->userDetails->compensation);
                                                foreach ($compensationIdArr as $compensation) {
                                                    $compensationArr[] = Helper::compensationArr()[$compensation];
                                                }
                                            }                                  
                                        @endphp
                                        @if(count($compensationArr) > 0)
                                            <p>{{@implode(',',$compensationArr)}}</p>
                                        @endif
                                    </li>
                                </ul>
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>INTERESTED IN</h5>
                                        @php
                                            $interestArr = [];
                                            if($user->userDetails->interested != '' || $user->userDetails->interested != 'null'){
                                                $interestArr = explode(',',$user->userDetails->interested);
                                            }
                                        @endphp
                                        @if(count($interestArr) > 0)
                                            @foreach ($interestArr as $interest)
                                                <p>{{@Helper::interestedArr()[$interest]}}</p>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        @else
                            
                        @endif
                       
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                    <div class="models-tab-information">
                        <ul class="nav nav-tabs first-tab-list" id="modelsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="portfolio-tab" data-bs-toggle="tab" data-bs-target="#portfolio" type="button" role="tab" aria-controls="portfolio" aria-selected="true">portfolio</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" type="button" role="tab" aria-controls="comments" aria-selected="false">comments</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="calender-tab" data-bs-toggle="tab" data-bs-target="#calender" type="button" role="tab" aria-controls="calender" aria-selected="false">calendar</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="followers-tab" data-bs-toggle="tab" data-bs-target="#followers" type="button" role="tab" aria-controls="followers" aria-selected="false">followers</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="following-tab" data-bs-toggle="tab" data-bs-target="#following" type="button" role="tab" aria-controls="following" aria-selected="false">following</button>
                            </li>
                          </ul>
                        <div class="tab-content" id="modelsTabContent">
                            <div class="tab-pane fade show active" id="portfolio" role="tabpanel" aria-labelledby="portfolio-tab">
                                <div class="row justify-content-between mt-3 mb-3">
                                    <div class="col-auto">
                                        <ul class="nav nav-tabs second-tab-list" id="portflTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab" aria-controls="photos" aria-selected="true">photos</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false">videos</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <div class="src-select-wrap">
                                            <select class="form-control src-select-style selectOption2">
                                                <option>Recent</option>
                                                <option>Popular</option>
                                                <option>Most like</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content" id="portflTabContent">
                                    <div class="tab-pane fade show active" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                                        <div class="model-photos-wrap">
                                            <div class="row">
                                                @if(count($user->images) > 0)
                                                    @foreach ($user->images->sortByDesc('id') as $image)
                                                    <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                                                        <div class="model-photos-gallery">
                                                            <a class="gal-img add-dlt" data-fancybox="img-gallery" href="{{url('img/user/images/'.$image->image)}}"><img class="img-block" src="{{url('img/user/images/'.$image->image)}}">
                                                            </a>
                                                            <div class="model-photos-like-cmnt">
                                                                <ul class="d-flex justify-content-between">
                                                                    <li><a href="#"><i class="far fa-thumbs-up"></i></a>0</li>
                                                                    <li><a href="#"><i class="far fa-comment-alt"></i></a>0</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @else
                                                <div><p>No image Found</p></div>    
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="videos" role="tabpanel" aria-labelledby="videos-tab">
                                        <div class="model-video-wrap">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                                                    <div class="model-video-gallery">
                                                        <a class="gal-video" data-fancybox="video-gallery" data-fancybox-type="iframe" href="https://youtu.be/UzHHNVtiRMc">
                                                            <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                                            <span class="video-play-btn"><i class="fab fa-youtube"></i></span>
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
                                                    <div class="model-video-gallery">
                                                        <a class="gal-video" data-fancybox="video-gallery" data-fancybox-type="iframe" href="https://youtu.be/UzHHNVtiRMc">
                                                            <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                                            <span class="video-play-btn"><i class="fab fa-youtube"></i></span>
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
                                                    <div class="model-video-gallery">
                                                        <a class="gal-video" data-fancybox="video-gallery" data-fancybox-type="iframe" href="https://youtu.be/UzHHNVtiRMc">
                                                            <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                                            <span class="video-play-btn"><i class="fab fa-youtube"></i></span>
                                                        </a>
                                                        <div class="model-photos-like-cmnt">
                                                            <ul class="d-flex justify-content-between">
                                                                <li><a href="#"><i class="far fa-thumbs-up"></i></a>5</li>
                                                                <li><a href="#"><i class="far fa-comment-alt"></i></a>5</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">...</div>
                            <div class="tab-pane fade" id="calender" role="tabpanel" aria-labelledby="calender-tab">...</div>
                            <div class="tab-pane fade" id="followers" role="tabpanel" aria-labelledby="followers-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model6.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    {{-- <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>block</a> --}}
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
                                                    {{-- <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>block</a> --}}
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
                                                    {{-- <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unblock</a> --}}
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
                                                    {{-- <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>block</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="model-box-wrap followrs-box">
                                            <div class="model-box-design">
                                                <span class="model-box-img">
                                                    <img class="img-block" src="{{url('images/feutered-model/model6.jpg')}}" alt="">
                                                </span>
                                                <div class="model-box-text">
                                                    <h4><a href="#">Susan Heath</a></h4>
                                                    {{-- <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unfollow</a> --}}
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
                                                    {{-- <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unfollow</a> --}}
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
                                                    {{-- <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unfollow</a> --}}
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
                                                    {{-- <a href="javascripe:;" class="unblk-fllw-btn"><i class="fas fa-user-times"></i>unfollow</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
     });
    var $temp = $("<input>");
    function copyLink(url){
        $("body").append($temp);
        $temp.val(url).select();
        document.execCommand("copy");
        $temp.remove();
        //$("p").text("URL copied!");
        toastr.success('Link copied!')
    }

    function favourite(user_id){
        var check_login = '{{Auth::check()}}';
        if(check_login == ''){
            window.location.href = '{{route('login')}}';
        }else{
            var token = '{{csrf_token()}}';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('user.favourite')}}",
                data: {'_token': token,'user_id':user_id},
                success: function(data){
                    if(data.type == 'add'){
                        $('#favourite').removeClass('far');
                        $('#favourite').addClass('fas');
                    }else if(data.type == 'remove'){
                        $('#favourite').addClass('far');
                        $('#favourite').removeClass('fas');
                    }
                    toastr.success(data.massage);
                    //location.reload();
                }
            });
            
        }  
    }

    function follow(user_id){
        var followers_count = $('#followers_count').text();
        console.log(followers_count);
        var check_login = '{{Auth::check()}}';
        if(check_login == ''){
            window.location.href = '{{route('login')}}';
        }else{
            var token = '{{csrf_token()}}';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('user.follow')}}",
                data: {'_token': token,'user_id':user_id},
                success: function(data){
                    if(data.type == 'add'){
                        $('#followlink').text('following');
                        $('#followlink').addClass('followed');
                        var count = (parseInt(followers_count) +1);
                        $('#followers_count').text(count)
                    }else if(data.type == 'remove'){
                        $('#followlink').text('follow');
                        $('#followlink').removeClass('followed');
                        var count = (parseInt(followers_count) -1);
                        $('#followers_count').text(count)
                    }
                    //toastr.success(data.massage);
                    //location.reload();
                }
            });
            
        }  
    }
</script>
@endpush    