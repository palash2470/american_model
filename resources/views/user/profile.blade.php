@extends('layouts.app')
{!! RecaptchaV3::initJs() !!}
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
                            <li><a href="javascript:void(0)"><i class="far fa-envelope" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>0</a></li>
                        </ul>
                    </div>
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
                </div>
                <div class="model-user-info d-flex flex-wrap align-items-end justify-content-between">
                    <div class="model-user-info-lft">
                        <div class="model-name">
                            <h3>{{@$user->name}}</h3>
                            <ul class="ratting-star d-flex">
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <div class="model-user">
                                <p><span class="info-type">Category:</span>{{$user->category->name}}</p>
                                {{-- <p><span class="info-type">Date:</span>April 16, 2019</p> --}}
                                <p><span class="info-type">Tags:</span>Artist, Cosmetics, Make up</p>
                            </div>
                        </div>
                        <div class="model-user">
                            <p>{{@$user->userDetails->city_name}}, {{@$user->userDetails->getState->name}}</p>
                            {{-- <p>{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}</p> --}}
                            <ul class="d-flex copy-url">
                                <li class="crnt-url">{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}</li>
                                <li><a href="javascript:void(0)" onclick="copyLink('{{url('/profile/'.$user->category->slug.'/'.$user->name_slug)}}')">copy link</a></li>
                            </ul>
                            <p><span class="info-type">Last Activity:</span>{{ Carbon\Carbon::parse($user->last_active)->format('F d Y') }}</p>
                            <p><span class="info-type">Join Date:</span>{{ Carbon\Carbon::parse($user->created_at)->format('F d Y') }}</p>
                        </div>
                        <div class="book-now-wrap">
                            <a href="javascript:void(0)" data-id="{{Crypt::encrypt($user->id)}}" data-bs-toggle="modal" data-bs-target="#book_now_modal" class="book-now">book now</a>

                        </div>
                    </div>
                    <div class="model-user-info-rgt add-wrap">
                        <div class="add-wrap-sec">
                            <ul class="model-social d-flex justify-content-end">
                                <li><a href="#" class="fcbk"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="ytbe"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#" class="twtr"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="lkdn"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
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
                                            <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->height)->size)}}</p>
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
                                            <p>{{@Helper::cmTofeet(Helper::getSizeById($user->userDetails->height)->size)}}</p>
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
                            <h5 class=""><a data-count="{{count($user->followers)}}" href="javascript:;" onclick="followers();">Followers <span class="followers-num" id="followers_count">{{count($user->followers)}}</span></a></h5>
                            <a href="javascript:" onclick="follow({{$user->id}})" class="flow-btn {{$count_follow > 0 ? 'followed' : ''}}" id="followlink">{{$count_follow > 0 ? 'following' : 'follow'}}</a>

                        </div>
                        <div class="followers-list">
                            <ul class="d-flex flex-wrap">
                                @if (count($user->followers) > 0)
                                    @foreach ($user->followers as $key=>$followers)
                                    <li>
                                        <a href="{{url('/profile/'.$followers->followersUser->category->slug.'/'.$followers->followersUser->name_slug)}}">
                                            <span class="follower-img">
                                                <img class="img-block" src="{{url('/img/user/profile-image/'.$followers->followersUser->userDetails->profile_image)}}" alt="">
                                            </span>
                                        </a>
                                    </li>
                                    @if ($key == 4)
                                        @break
                                    @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="follow-slider-wrap mt-3">
                        <div class="user-small-head">
                            <h5 class="mb-2"><a href="javascript:;" onclick="following()">Following <span class="followers-num">{{count($user->followings)}}</span></a></h5>
                        </div>
                        <div class="followers-list">
                            <ul class="d-flex flex-wrap">
                                @if (count($user->followings) > 0)
                                    @foreach ($user->followings as $key=>$followings)
                                        <li>
                                            <a href="{{url('/profile/'.$followings->followingsUser->category->slug.'/'.$followings->followingsUser->name_slug)}}">
                                                <span class="follower-img">
                                                    <img class="img-block" src="{{url('/img/user/profile-image/'.$followings->followingsUser->userDetails->profile_image)}}" alt="">
                                                </span>
                                            </a>
                                        </li>
                                        @if ($key == 4)
                                            @break
                                        @endif
                                    @endforeach
                                @endif
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
                                {{-- <ul class="d-flex flex-wrap justify-content-between">
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
                                </ul> --}}
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
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>Rates</h5>
                                        @if ($user->userDetails->booking_amount_hour != '')
                                            <p>$ {{$user->userDetails->booking_amount_hour}} per hour</p>
                                        @endif
                                        @if ($user->userDetails->booking_amount_day != '')
                                            <p>$ {{$user->userDetails->booking_amount_day}} per day</p>
                                        @endif
                                        @if ($user->userDetails->booking_amount_week != '')
                                            <p>$ {{$user->userDetails->booking_amount_week}} per week</p>
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
                                {{-- <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>accepted job type</h5>
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
                                <ul class="d-flex flex-wrap text-design single-list">
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
                                </ul> --}}
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>Rates</h5>
                                        @if ($user->userDetails->booking_amount_hour != '')
                                            <p>$ {{$user->userDetails->booking_amount_hour}} per hour</p>
                                        @endif
                                        @if ($user->userDetails->booking_amount_day != '')
                                            <p>$ {{$user->userDetails->booking_amount_day}} per day</p>
                                        @endif
                                        @if ($user->userDetails->booking_amount_week != '')
                                            <p>$ {{$user->userDetails->booking_amount_week}} per week</p>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            {{-- End photographer --}}
                        @elseif($user->category->slug == 'child-model-and-actor')
                            <div class="model-info-wrap">
                                <div class="user-small-head mb-2">
                                    <h6>Personal Information</h6>
                                </div>
                                {{-- <ul class="d-flex flex-wrap justify-content-between">
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
                                </ul> --}}
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
                                <ul class="d-flex flex-wrap text-design single-list">
                                    <li>
                                        <h5>Rates</h5>
                                        @if ($user->userDetails->booking_amount_hour != '')
                                            <p>$ {{$user->userDetails->booking_amount_hour}} per hour</p>
                                        @endif
                                        @if ($user->userDetails->booking_amount_day != '')
                                            <p>$ {{$user->userDetails->booking_amount_day}} per day</p>
                                        @endif
                                        @if ($user->userDetails->booking_amount_week != '')
                                            <p>$ {{$user->userDetails->booking_amount_week}} per week</p>
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
                              <button class="nav-link active" id="portfolio-tab" data-bs-toggle="tab" data-bs-target="#portfolio" type="button" role="tab" aria-controls="portfolio" aria-selected="true">portfolio<i class="fas fa-user"></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" type="button" role="tab" aria-controls="comments" aria-selected="false">comments<i class="far fa-comment-alt"></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="calender-tab" data-bs-toggle="tab" data-bs-target="#calender_tab_section" type="button" role="tab" aria-controls="calender_tab_section" aria-selected="false">calendar<i class="fas fa-calendar-alt"></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="followers-tab" data-bs-toggle="tab" data-bs-target="#followers" type="button" role="tab" aria-controls="followers" aria-selected="false">followers<i class="fas fa-user-friends"></i></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="following-tab" data-bs-toggle="tab" data-bs-target="#following" type="button" role="tab" aria-controls="following" aria-selected="false">following<i class="fas fa-user-friends"></i></button>
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
                                                            <span class="gal-img photo_view" data-photo="photo_{{$image->id}}">
                                                                <img class="img-block" src="{{url('img/user/images/'.$image->image)}}" alt="">
                                                            </span>
                                                            {{-- <a class="gal-img add-dlt" data-fancybox="img-gallery" href="{{url('img/user/images/'.$image->image)}}"><img class="img-block" src="{{url('img/user/images/'.$image->image)}}">
                                                            </a> --}}
                                                            <div class="model-photos-like-cmnt">
                                                                <ul class="d-flex justify-content-between">
                                                                    <li><a href="javascript:void(0)" onclick="photoLike({{$image->id}})"><i class="far fa-thumbs-up"></i></a><span id="image_like_{{$image->id}}">{{count($image->likes)}}</span></li>
                                                                    <li class="photo_view" data-photo="photo_{{$image->id}}"><a href="javascript:void(0)"><i class="far fa-comment-alt"></i></a>{{count($image->comments)}}</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
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
                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                                {{-- <div class="comments-contact-from">
                                    <form id="contact_frm" action="{{route('profile.contact_form.save')}}" class="needs-validation" novalidate method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="input-box">
                                                    <input type="text" class="input-box-style form-control" placeholder="Name" name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="input-box">
                                                    <input type="email" class="input-box-style form-control" placeholder="Email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="textare-box">
                                                    <textarea rows="4" class="textare-box-style form-control" placeholder="Massage" name="note" required></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="user_id" value="{{Crypt::encrypt($user->id)}}">
                                            <div class="col-12">
                                                <div class="">
                                                    <button class="style-button" type="submit">submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}


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
                            <div class="tab-pane fade calendar-wrap" id="calender_tab_section" role="tabpanel" aria-labelledby="calender-tab">
                                <div id="full_calendar_events"></div>
                            </div>
                            <div class="tab-pane fade" id="followers" role="tabpanel" aria-labelledby="followers-tab">
                                <div class="row">
                                    @forelse ($user->followers as $followers)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
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

                                </div>
                            </div>
                            <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">
                                <div class="row">
                                    @forelse ($user->followings as $followings )
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                {{-- <div id="" class="photo-list">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                            <div class="popup-img">
                                <img class="img-block" src="images/feutered-model/model5.jpg">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                            <div class="ftr-cmnt">
                                <div class="photo-comments-main">
                                    <div class="photo-comments">
                                        <div class="photo-comments-wrap d-flex">
                                            <div class="photo-comments-wrap-lft">
                                                <a href="#" class="photo-comments-img">
                                                    <img class="img-block" src="images/feutered-model/model5.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="photo-comments-wrap-rgt">
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <h4><a href="#">Palash Bhunia</a> <span>modal</span></h4>
                                                    <div class="cmnts-rply-date">
                                                        <ul class="d-flex">
                                                            <li>3 days ago</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <p>hi</p>
                                                <div class="cmnts-rply-date">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="photo-comments-wrap photo-with-reply d-flex">
                                            <div class="photo-comments-wrap-lft">
                                                <a href="#" class="photo-comments-img">
                                                    <img class="img-block" src="images/feutered-model/model5.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="photo-comments-wrap-rgt">
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <h4><a href="#">Palash Bhunia</a> <span>modal</span></h4>
                                                    <div class="cmnts-rply-date">
                                                        <ul class="d-flex">
                                                            <li>3 days ago</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <p>hi</p>
                                                <div class="cmnts-rply-date">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="msg-cmnt when-fixed">
                                        <div class="profile-input-wrap">
                                            <input type="text" class="form-control profile-input-style" placeholder="Type your comment">
                                            <span class="profile-input-btn-wrap">
                                                <button class="profile-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="" class="photo-list">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                            <div class="popup-img">
                                <img class="img-block" src="images/feutered-model/model5.jpg">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                            <div class="ftr-cmnt">
                                <div class="photo-comments-main">
                                    <div class="row h-100 align-items-center">
                                        <div class="col-12">
                                            <div class="not-found-text no-msg-area">
                                                <i class="far fa-comments"></i>
                                                <p>no Comments yet</p>
                                                <p><small>Be the first comment</small></p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="msg-cmnt when-fixed">
                                                <div class="profile-input-wrap">
                                                    <input type="text" class="form-control profile-input-style" placeholder="Type your comment">
                                                    <span class="profile-input-btn-wrap">
                                                        <button class="profile-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                        $('#followlink').text('follow');
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
$(document).on('submit','#book_now_frm',function(e){
    $("#loading_container_modal").attr("style", "display:block");
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
            window.location.href = '{{route('login')}}';
        }else{
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
</script>

@endpush
