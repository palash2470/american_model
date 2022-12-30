@extends('layouts.app')
{{-- {!! RecaptchaV3::initJs() !!} --}}
@section('content')
<section class="model-details-page-sec">
    <div class="model-details-banner new-add-bnr">
        <img class="img-block" src="{{$user->userDetails->cover_img ? url('/img/user/cover-image/'.$user->userDetails->cover_img) : url('images/model-banner3.jpg')}}" alt="">
        <div class="bannar-social">
            <ul class="model-social-icon d-flex justify-content-end">
                <li><a href="{{@$user->userDetails->facebook_link}}" class="fcbk"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{@$user->userDetails->youtube_link}}" class="ytbe"><i class="fab fa-youtube"></i></a></li>
                <li><a href="{{@$user->userDetails->twitter_link}}" class="twtr"><i class="fab fa-twitter"></i></a></li>
                <li><a href="{{@$user->userDetails->linkedin_link}}" class="lkdn"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="new-topuser">
        <div class="container-fluid left-right-40">
            <div class="new-profile-user d-flex">
                <div class="new-profile-user-lft">
                    <div class="new-profile-user-details">
                        <div class="new-profile-user1">
                            <span class="new-profile-user-img-box">
                                <img class="img-block" src="{{url('/img/user/profile-image/'.$user->userDetails->profile_image)}}" alt="">
                            </span>
                        </div>
                        <div class="new-profile-user2">
                            <h4>{{@$user->name}}</h4>
                            <ul class="new-model-follower d-flex justify-content-center">
                                <li><a href="javascript:void(0)" onclick="favourite({{$user->id}})"><i class="{{($count_favourite > 0 ? 'fas' : 'far')}} fa-heart" id="favourite"></i>{{count($user->favourites)}}</a></li>
                                <li><a href="javascript:void(0)"><i class="far fa-envelope" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>0</a></li>
                            </ul>
                            <p class="new-info-type"><strong>Category:</strong> {{$user->category->name}}</p>
                            <p class="new-info-type"><strong>Tags:</strong> Artist, Cosmetics, Make up</p>
                            <p class="new-info-type"><a class="copy-link-btn" href="javascript:void(0)" onclick="copyLink('{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}')">copy link</a></p>
                            <p class="new-info-type"><strong>Last Activity:</strong> {{ Carbon\Carbon::parse($user->last_active)->format('F d Y') }}</p>
                            <p class="new-info-type"><strong>Join Date:</strong> {{ Carbon\Carbon::parse($user->created_at)->format('F d Y') }}</p>
                            <p class="new-info-type"><a class="new-book-btn" href="javascript:void(0)" data-id="{{Crypt::encrypt($user->id)}}" data-bs-toggle="modal" data-bs-target="#book_now_modal">book now</a></p>
                            <p class="new-info-type"><a class="new-follow-btn {{$count_follow > 0 ? 'followed' : ''}}" href="javascript:" onclick="follow({{$user->id}})" id="followlink">{{$count_follow > 0 ? 'following' : 'follow'}} @if($count_follow > 0) @else <span class="flw-img"><img src="{{url('images/hand.png')}}" alt=""></span>@endif</a></p>
                            <ul class="new-model-follower-list d-flex flex-wrap justify-content-center">
                                <li><a data-count="{{count($user->followers)}}" href="javascript:;" onclick="followers();">Followers <strong>{{count($user->followers)}}</strong></a></li>
                                <li><a href="javascript:;" onclick="following()">Following <strong>{{count($user->followings)}}</strong></a></li>
                            </ul>
                            <div class="user-small-head mb-2">
                                <h5>Biography</h5>
                            </div>
                            <div class="biography">
                                <p>{{$user->userDetails->biography}}</p>
                            </div>
                            <div class="accordion list-accordion" id="accordionExample">
                                <!-- <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Personal Information
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                        </div>
                                    </div>
                                </div> -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Interested In
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="d-flex flex-wrap one-line-list">
                                                <li>
                                                    {{-- Acting, Fitness --}}
                                                    @if($user->category->slug == 'models')
                                                        @php
                                                            $interestArr = [];
                                                            if($user->userDetails->interested != '' || $user->userDetails->interested != 'null'){
                                                                $interestArr = explode(',',$user->userDetails->interested);
                                                            }
                                                        @endphp
                                                        @if(count($interestArr) > 0)
                                                            @php
                                                                $interestArrName = []
                                                            @endphp
                                                            @foreach ($interestArr as $interest)
                                                                @php
                                                                    $interestArrName[]= @Helper::interestedArr()[$interest];
                                                                @endphp
                                                                
                                                                {{-- <p>{{@Helper::interestedArr()[$interest]}}</p> --}}
                                                            @endforeach
                                                            {{implode( ',',  $interestArrName)}}
                                                        @endif
                                                    @elseif($user->category->slug == 'photographer') 
                                                    @elseif($user->category->slug == 'child-model-and-actor')
                                                        @php
                                                            $interestArr = [];
                                                            if($user->userDetails->interested != '' || $user->userDetails->interested != 'null'){
                                                                $interestArr = explode(',',$user->userDetails->interested);
                                                            }
                                                        @endphp
                                                        @if(count($interestArr) > 0)
                                                            @php
                                                                $interestArrName = []
                                                            @endphp
                                                            @foreach ($interestArr as $interest)
                                                                @php
                                                                    $interestArrName[]= @Helper::interestedArr()[$interest];
                                                                @endphp
                                                                
                                                                {{-- <p>{{@Helper::interestedArr()[$interest]}}</p> --}}
                                                            @endforeach
                                                            {{implode( ',',  $interestArrName)}}
                                                        @endif
                                                    @else

                                                    @endif   
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Rates
                                    </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="one-line-list">
                                                @if($user->category->slug == 'models')
                                                    @if ($user->userDetails->booking_amount_hour != '')
                                                    <li><strong>Per Hours :</strong> $ {{$user->userDetails->booking_amount_hour}}</li>
                                                    @endif
                                                    @if ($user->userDetails->booking_amount_day != '')
                                                    <li><strong>Per Day :</strong> $ {{$user->userDetails->booking_amount_day}}</li>
                                                    @endif
                                                    @if ($user->userDetails->booking_amount_week != '')
                                                    <li><strong>Per Week :</strong> $ {{$user->userDetails->booking_amount_week}}</li>
                                                    @endif
                                                @elseif($user->category->slug == 'photographer')
                                                    @if ($user->userDetails->booking_amount_hour != '')
                                                    <li><strong>Per Hours :</strong> $ {{$user->userDetails->booking_amount_hour}}</li>
                                                    @endif
                                                    @if ($user->userDetails->booking_amount_day != '')
                                                    <li><strong>Per Day :</strong> $ {{$user->userDetails->booking_amount_day}}</li>
                                                    @endif
                                                    @if ($user->userDetails->booking_amount_week != '')
                                                    <li><strong>Per Week :</strong> $ {{$user->userDetails->booking_amount_week}}</li>
                                                    @endif 
                                                @elseif($user->category->slug == 'child-model-and-actor')
                                                    @if ($user->userDetails->booking_amount_hour != '')
                                                    <li><strong>Per Hours :</strong> $ {{$user->userDetails->booking_amount_hour}}</li>
                                                    @endif
                                                    @if ($user->userDetails->booking_amount_day != '')
                                                    <li><strong>Per Day :</strong> $ {{$user->userDetails->booking_amount_day}}</li>
                                                    @endif
                                                    @if ($user->userDetails->booking_amount_week != '')
                                                    <li><strong>Per Week :</strong> $ {{$user->userDetails->booking_amount_week}}</li>
                                                    @endif
                                                @else

                                                @endif   
                                                {{-- <li><strong>Per Hours :</strong> 96</li>
                                                <li><strong>Per Day :</strong> 52</li>
                                                <li><strong>Per Week :</strong> 12</li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-profile-user-rgt">
                    <div class="new-user-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item color-1" role="presentation">
                                <button class="nav-link active" id="stats-tab" data-bs-toggle="tab" data-bs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true">stats</button>
                            </li>
                            <li class="nav-item color-2" role="presentation">
                                <button class="nav-link" id="portfolio-tab" data-bs-toggle="tab" data-bs-target="#portfolio" type="button" role="tab" aria-controls="portfolio" aria-selected="false">portfolio</button>
                            </li>
                            <li class="nav-item color-3" role="presentation">
                                <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="false">videos</button>
                            </li>
                            <li class="nav-item color-4" role="presentation">
                                <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" type="button" role="tab" aria-controls="comments" aria-selected="false">comments</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                                @if($user->category->slug == 'models')
                                {{-- For Model Section --}}
                                    <div class="model-info-wrap">
                                        <div class="user-small-head mb-2">
                                            <h6>Stats</h6>
                                            {{-- <h6>Personal Information</h6> --}}
                                        </div>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            <li>
                                                <h5>Age</h5>
                                                <p>{{Carbon\Carbon::parse($user->userDetails->dob)->age}}</p>
                                            </li>
                                            <li>
                                                <h5>Height</h5>
                                                <p>{{@$user->userDetails->getHeight->height}}</p>
                                            </li>
                                            <li>
                                                <h5>Weight</h5>
                                                <p>{{@Helper::kgToLb($user->userDetails->weight)}} lbs</p>
                                            </li>
                                            <li>
                                                <h5>Bust</h5>
                                                <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->chest)->size)}}</p>
                                            </li>
                                            <li>
                                                <h5>waist</h5>
                                                <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->waist)->size)}}</p>
                                            </li>
                                        </ul>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            <li>
                                                <h5>hips</h5>
                                                <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->hip)->size)}}</p>
                                            </li>
                                            <li>
                                                <h5>shoe size</h5>
                                                <p>{{$user->userDetails->shoe_size}}</p>
                                            </li>
                                            <li>
                                                <h5>dress size</h5>
                                                <p>{{$user->userDetails->dress_size}}</p>
                                            </li>
                                            <li>
                                                <h5>hair</h5>
                                                <p>{{@Helper::getColoursById($user->userDetails->hair_color)->name}}</p>
                                            </li>
                                            <li>
                                                <h5>eyes</h5>
                                                <p>{{@Helper::getColoursById(@$user->userDetails->eye_color)->name}}</p>
                                            </li>
                                        </ul>
                                        <ul class="d-flex flex-wrap text-design single-list three-list">
                                            <li>
                                                <h5>ETHNICITY</h5>
                                                <p>{{@$user->userDetails->getEthnicity->name}}</p>
                                            </li>
                                            <li>
                                                <h5>language</h5>
                                                <p>Very Experienced</p>
                                            </li>
                                            <li>
                                                <h5>COMPENSATION</h5>
                                                <p>{{@Helper::compensationArr()[@$user->userDetails->compensation]}}</p>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- End Model section --}}
                                    
                                @elseif($user->category->slug == 'photographer')
                                    {{-- For Photographer --}}
                                    <div class="model-info-wrap">
                                        <div class="user-small-head mb-2">
                                            <h6>Stats</h6>
                                            {{-- <h6>Personal Information</h6> --}}
                                        </div>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            <li>
                                                <h5>Age</h5>
                                                <p>{{Carbon\Carbon::parse($user->userDetails->dob)->age}}</p>
                                            </li>
                                            <li>
                                                <h5>exprience</h5>
                                                <p>{{@$user->userDetails->exprience}} years</p>
                                            </li>
                                            <li>
                                                <h5>Accepted job type</h5>
                                                @php
                                                    $acceptedJobArr = [];
                                                    if($user->userDetails->accepted_job != '' || $user->userDetails->accepted_job != 'null'){
                                                        $acceptedJobIdArr = explode(',',@$user->userDetails->accepted_job);
                                                        foreach (@$acceptedJobIdArr as $acceptesJob) {
                                                            @$acceptedJobArr[] = @Helper::acceptedJobTypeArr()[@$acceptesJob];
                                                        }
                                                    }
                                                @endphp
                                                @if(count($acceptedJobArr) > 0)
                                                <p>{{@implode(',',$acceptedJobArr)}}</p>
                                                @endif
                                            </li>
                                            
                                        </ul>
                                    
                                        <ul class="d-flex flex-wrap text-design single-list three-list">
                                            
                                            <li>
                                                <h5>language</h5>
                                                @php
                                                    $languageArr = [];
                                                    if($user->userDetails->language != '' || @$user->userDetails->language != 'null'){
                                                        $languageIdArr = explode(',',@$user->userDetails->language);
                                                        foreach ($languageIdArr as $language) {
                                                            $languageArr[] = @Helper::languageArr()[$language];
                                                        }
                                                    }
                                                @endphp
                                                @if(count($languageArr) > 0)
                                                    <p>{{@implode(',',$languageArr)}}</p>
                                                @endif
                                            </li>
                                            <li>
                                                <h5>COMPENSATION</h5>
                                                @php
                                                    $compensationArr = [];
                                                    if($user->userDetails->compensation != '' || $user->userDetails->compensation != 'null'){
                                                        $compensationIdArr = explode(',',@$user->userDetails->compensation);
                                                        foreach ($compensationIdArr as $compensation) {
                                                            $compensationArr[] = @Helper::compensationArr()[$compensation];
                                                        }
                                                    }
                                                @endphp
                                                @if(count($compensationArr) > 0)
                                                    <p>{{@implode(',',$compensationArr)}}</p>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- End photographer --}}
                                @elseif($user->category->slug == 'child-model-and-actor')
                                    {{-- start child-model-and-actor --}}
                                    <div class="model-info-wrap">
                                        <div class="user-small-head mb-2">
                                            <h6>Stats</h6>
                                            {{-- <h6>Personal Information</h6> --}}
                                        </div>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            <li>
                                                <h5>Age</h5>
                                                <p>{{Carbon\Carbon::parse($user->userDetails->dob)->age}}</p>
                                            </li>
                                            <li>
                                                <h5>Height</h5>
                                                <p>{{@$user->userDetails->getHeight->height}}</p>
                                            </li>
                                            <li>
                                                <h5>Weight</h5>
                                                <p>{{@Helper::kgToLb($user->userDetails->weight)}} lbs</p>
                                            </li>
                                            <li>
                                                <h5>shoe size</h5>
                                                <p>{{$user->userDetails->shoe_size}}</p>
                                            </li>
                                        </ul>
                                        <ul class="d-flex flex-wrap justify-content-between">
                                            <li>
                                                <h5>dress size</h5>
                                                <p>{{$user->userDetails->dress_size}}</p>
                                            </li>
                                            <li>
                                                <h5>hair</h5>
                                                <p>{{@Helper::getColoursById($user->userDetails->hair_color)->name}}</p>
                                            </li>
                                            <li>
                                                <h5>eyes</h5>
                                                <p>{{@Helper::getColoursById(@$user->userDetails->eye_color)->name}}</p>
                                            </li>
                                            <li>
                                                <h5>EXPERIENCE</h5>
                                                <p>{{@$user->userDetails->exprience}} jobs</p>
                                            </li>
                                        </ul>
                                        <ul class="d-flex flex-wrap text-design single-list three-list">
                                            <li>
                                                <h5>ETHNICITY</h5>
                                                <p>{{@$user->userDetails->getEthnicity->name}}</p>
                                            </li>
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
                                    </div>
                                    {{-- end child-model-and-actor --}}
                                @else
                                @endif
                            </div>
                            <div class="tab-pane fade" id="portfolio" role="tabpanel" aria-labelledby="portfolio-tab">
                                <div class="model-photos-wrap">
                                    <div class="row g-4" id="user_image_load">
                                        <div class="col-12">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="head-pan-title">
                                                        <h4>photos</h4>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-auto">
                                                    <div class="src-select-wrap">
                                                        <select class="form-control src-select-style selectOption2">
                                                            <option>Recent</option>
                                                            <option>Popular</option>
                                                            <option>Most like</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        @if(count($user_images) > 0)
                                            @include('user.profile_image')
                                        @else
                                            <div class="col-12">
                                                <div class="not-found-text">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    <p>no photo found</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center " >
                                    <div class="meso-loader ajax-load" style="display:none">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                                <div class="model-video-wrap">
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <div class="head-pan-title">
                                                        <h4>videos</h4>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-auto">
                                                    <div class="src-select-wrap">
                                                        <select class="form-control src-select-style selectOption2">
                                                            <option>Recent</option>
                                                            <option>Popular</option>
                                                            <option>Most like</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        @if (count($user->videos) > 0)
                                            @forelse ($user->videos as $video)
                                                <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                                                    <div class="model-video-gallery add-dlt">
                                                        <a class="gal-video " data-fancybox="video-gallery" data-fancybox-type="iframe" href="{{$video->youtube_video_link}}">
                                                            <img class="img-block" src="{{url('/img/user/youtube_thumbnail_image/'.$video->thumbnail_image.'')}}" alt="">
                                                            <span class="video-play-btn"><i class="fab fa-youtube"></i></span>
                                                            
                                                        </a>
                                                        <div class="model-photos-like-cmnt">
                                                            <ul class="d-flex justify-content-between">
                                                                <li><a href="javascript:void(0)" onclick="videoLike({{$video->id}})"><i class="far fa-thumbs-up"></i></a> <span id="video_like_{{$video->id}}">{{count($video->likes)}}</li>
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
                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
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
                                @if(auth()->user())
                                    @include('comments.profile.commentsDisplay', ['comments' => $user->usersComments, 'profile_id' => $user->id])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<!-- Send E-mail Modal -->
<div class="modal fade user-book-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send E-mail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('profile.send.mail')}}" method="post" class="send_email">
                @csrf
                <input type="hidden" name="modelId" value="{{$user->id}}" />
                <div class="modal-body">
                    <div class="book-input-wrap">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control book-input-style" id="subject" name="subject" value="" required>
                        @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                    <div class="book-txtare-wrap">
                        <label for="description">Message:</label>
                        <textarea rows="3" class="form-control book-txtare-style" id="message" name="message" required></textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <div class="booked-now-wrap text-end">
                        <button type="submit" class="booked-now" id="send_now">Send Mail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Photo View Modal -->
<div class="popup-wrap popup_open">
    <div class="popup-body-main">
        <div class="popup-body">
            <button class="popup-wrap-btn close_popup"><i class="far fa-times-circle"></i></button>
            <div class="photo-list-wrap" id="image_popup_view">
                @include('user.profile_image_popup')
            </div>
            <div class="popup-nav-wrap">
                <div class="popup-next" id="next"><i class="fas fa-chevron-right"></i></div>
                <div class="popup-prev" id="prev"><i class="fas fa-chevron-left"></i></div>
            </div>
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
{{-- end model photo popup --}}
{{-- Book Now Modal --}}
<div class="modal fade user-book-modal" id="book_now_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="book_now_frm" action="{{route('book_now')}}" class="needs-validation" novalidate method="POST">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="booking-price-head">Booking Rate:</div>
                        @if ($user->userDetails->booking_amount_hour != '')
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="booking-price-box">
                                    <h4>Hours</h4>
                                    <p>{{$user->userDetails->booking_amount_hour ? $user->userDetails->booking_amount_hour : '0.00'}} USD</p>
                                </div>
                            </div>
                        @endif
                        @if ($user->userDetails->booking_amount_day !='')
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="booking-price-box">
                                    <h4>Day</h4>
                                    <p>{{$user->userDetails->booking_amount_day ? $user->userDetails->booking_amount_day : '0.00'}} USD </p>
                                </div>
                            </div>
                        @endif
                        @if ($user->userDetails->booking_amount_week !='')
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="booking-price-box">
                                    <h4>Week</h4>
                                    <p>{{$user->userDetails->booking_amount_week ? $user->userDetails->booking_amount_week : '0.00'}} USD</p>
                                </div>
                            </div>
                        @endif

                    </div>
                    <input type="hidden" name="booked_id" value="" id="booked_id">
                    <div class="book-input-wrap">
                        <label for="name">Your Name:</label>
                        <input type="text" class="form-control book-input-style" id="name" name="name" value="{{@Auth::user()->name}}" required>
                        {{-- <div class="invalid-feedback">
                            Please enter name.
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="book-input-wrap">
                                <label for="email">Your Email:</label>
                                <input type="email" class="form-control book-input-style" id="email" name="email" value="{{@Auth::user()->email}}" required>
                                {{-- <div class="invalid-feedback">
                                    Please enter email.
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="book-input-wrap">
                                <label for="phone_no">Your Phone No:</label>
                                <input type="text" class="form-control book-input-style" id="phone_no" name="phone_no" value="" required>
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
                    {{-- <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <div class="col-md-6">
                            {!! RecaptchaV3::field('booking') !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> --}}
                    <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHAV2_SITEKEY')}}"></div>
                    <div class="error" id="captcha_error"></div>
                    @if ($errors->has('g-recaptcha-response'))
                        <div class="error">{{ $errors->first('g-recaptcha-response') }}</div>
                    @endif
                    <div class="booked-now-wrap text-end">
                        <button type="submit" class="booked-now" id="book_now">Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="loader-wrap" id="loading_container_book_modal" style="display: none">
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
{{-- end Book Now Modal --}}
@endsection
@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
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
            {{Session::put('url_back', url()->current())}}
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
        //console.log(followers_count);
        var check_login = '{{Auth::check()}}';
        if(check_login == ''){
            {{Session::put('url_back', url()->current())}}
            window.location.href = '{{route('login')}}';
        }else{
            $("#loading_container").attr("style", "display:block");
            var token = '{{csrf_token()}}';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('user.follow')}}",
                data: {'_token': token,'user_id':user_id},
                success: function(data){
                    $("#loading_container").attr("style", "display:none");
                    if(data.type == 'add'){
                        $('#followlink').text('following');
                        $('#followlink').addClass('followed');
                        var count = (parseInt(followers_count) +1);
                        $('#followers_count').text(count)
                    }else if(data.type == 'remove'){
                        $('#followlink').text('follow ');
                        $('#followlink').append('<span class="flw-img"><img src="{{url('images/hand.png')}}" alt="">');
                        $('#followlink').removeClass('followed');
                        var count = (parseInt(followers_count) -1);
                        $('#followers_count').text(count)
                    }
                    toastr.success(data.massage);
                    //location.reload();
                }
            });

        }
    }
    function photoLike(photo_id){
        //console.log(photo_id);
        var check_login = '{{Auth::check()}}';
        if(check_login == ''){
            {{Session::put('url_back', url()->current())}}
            window.location.href = '{{route('login')}}';
        }else{
            $("#loading_container").attr("style", "display:block");
            var token = '{{csrf_token()}}';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('user.like.photo')}}",
                data: {'_token': token,'photo_id':photo_id},
                success: function(data){
                    $("#loading_container").attr("style", "display:none");
                    if(data.type == 'add'){
                        //console.log(data);
                        var like_count = $('#image_like_'+data.photo_like.photo_id).text();
                        var count = (parseInt(like_count) + 1);
                        $('#image_like_'+data.photo_like.photo_id).text(count);
                        toastr.success(data.massage);
                    }else if(data.type == 'remove'){
                        var like_count = $('#image_like_'+data.photo_like.photo_id).text();
                        var count = (parseInt(like_count) -1);
                        $('#image_like_'+data.photo_like.photo_id).text(count)
                    }

                    //location.reload();
                }
            });

        }
    }
    function followers(){
        $('li.nav-item button.active').removeClass('active');
        $("#followers-tab").addClass("active");
        $('#modelsTabContent div.active').removeClass('active show');
        $('#followers').addClass('active show');
    }
    function following(){
        $('li.nav-item button.active').removeClass('active');
        $("#following-tab").addClass("active");
        $('#modelsTabContent div.active').removeClass('active show');
        $('#following').addClass('active show');
    }

    //form validation
    // Example starter JavaScript for disabling form submissions if there are invalid fields
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
//end form validation
$(document).on("click", ".book-now", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #booked_id").val( myBookId );
     // As pointed out in comments,
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
$(document).on('submit','#book_now_frm',function(event){
    //$("#loading_container_modal").attr("style", "display:block");
    if (grecaptcha.getResponse()) {
        //event.preventDefault();
        $("#loading_container_book_modal").attr("style", "display:block");
    } 
    else {
        event.preventDefault();
        $('#book_now_modal').modal('show');
        $('#captcha_error').text('Please confirm captcha to proceed');
    //alert('Please confirm captcha to proceed');
    }
});

$(document).on('click','#reply',function(e){
    $(this).closest('.comment_section').find('.reply_section').slideToggle();
})
$(document).on('submit','.profile_comment',function(){
    $("#loading_container").attr("style", "display:block");
});
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
            {{Session::put('url_back', url()->current())}}
            window.location.href = '{{route('login')}}';
        }else{
            //alert('sdfsdf');
            //var token = '{{csrf_token()}}';
            $("#loading_container_modal").attr("style", "display:block");
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('photo.comment.store')}}",
                data: form_value,
                success: function(responce){
                    $("#loading_container_modal").attr("style", "display:none");
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


});
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

$(document).ready(function(){


    //User image pagination
    var page = 1;
    var no_data = 0;
    $(window).scroll(function() {
        //console.log($('footer').height());
        //console.log(no_data);
        scrollDistance = $(window).scrollTop() + $(window).height();
        footerDistance = $('#footer').offset().top;
        if (scrollDistance >= footerDistance) {
            console.log('load');
            page++;
            if(no_data == 0){
                loadMoreData(page);
            }
        } /* else {
            console.log("Keep going...");
        } */
        /* if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        } */
    });
    function loadMoreData(page){
        //console.log(page);
        $.ajax(
            {
                //url: '?page=' + page,
                url : "{{route('user.profile.image',[$user->id])}}?page="+page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data.data_count == 0){
                    no_data = 1;
                }
                //console.log(data);
                if(data.html == ""){
                    no_data = 1;
                    $('.ajax-load').hide();
                    //console.log('dsfsfsdf');
                    //$('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#user_image_load").append(data.user_images);
                $("#image_popup_view").append(data.image_popup_view);

                $(".photo-list-wrap .photo-list").each(function(e) {
                    
                        $(this).hide();
                });
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                //alert('server not responding...');
            });
    }

    /* function user_image_pagination(page)
    {
        $.ajax({
            url:"{{route('user.profile.image',[$user->id])}}?page="+page,
            success:function(data)
            {
                console.log(data);
                //$('#table_data').html(data);
            }
        });
    } */
});

function videoLike(video_id){
        //console.log(photo_id);
        var check_login = '{{Auth::check()}}';
        if(check_login == ''){
            {{Session::put('url_back', url()->current())}}
            window.location.href = '{{route('login')}}';
        }else{
            $("#loading_container").attr("style", "display:block");
            var token = '{{csrf_token()}}';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('user.like.video')}}",
                data: {'_token': token,'video_id':video_id},
                success: function(data){
                    $("#loading_container").attr("style", "display:none");
                    if(data.type == 'add'){
                        //console.log(data);
                        var like_count = $('#video_like_'+data.video_like.video_id).text();
                        var count = (parseInt(like_count) + 1);
                        $('#video_like_'+data.video_like.video_id).text(count);
                        toastr.success(data.massage);
                    }else if(data.type == 'remove'){
                        var like_count = $('#video_like_'+data.video_like.video_id).text();
                        var count = (parseInt(like_count) -1);
                        $('#video_like_'+data.video_like.video_id).text(count)
                    }

                    //location.reload();
                }
            });

        }
    }
</script>

@endpush
