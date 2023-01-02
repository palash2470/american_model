@extends('layouts.app')
@section('content')
<section class="slider-wrap index-z">
    <div class="home-slider">
        <div class="owl-carousel owl-theme home_slider">
            {{-- <div class="item">
                <div class="bannar-text-wrap">
                    <img src="" alt="">
                    <div class="bannar-text-box">
                        <h2>FIND TALENT NEAR YOU</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque somos notros corrupti quos et quas molestias sint occaecati summ. </p>
                        <div class="src-model-wrap">
                            <h4>Where Do You Need Talent?</h4>
                            <form action="{{route('search.talent')}}" method="get" >
                                <div class="d-flex">
                                    <div class="bnr-input col">
                                        <input type="text" name="search" class="form-control bnr-input-style" placeholder="Search for talent by city, state">
                                    </div>
                                    <div class="bnr-src-btn-wrap col-auto">
                                        <button type="submit" class="bnr-src-btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <ul class="text-list-wrap d-flex justify-content-center mt-2">
                                <li>Commercial, Print, Runway</li>
                                <li>Conventions & Trade Shows</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
        @if(count($banners) > 0)
            @foreach ($banners as $banner)
                <div class="item">
                    <div class="bannar-text-wrap">
                        <img src="{{url('img/home_banner/'.$banner->image_name)}}" alt="">
                        <div class="bannar-text-box">
                            <h2>{{@$banner->name}}</h2>
                            <p>{{@$banner->desc}}</p>
                            {{-- <div class="src-model-wrap">
                                <h4>Where Do You Need Talent?</h4>
                                <form action="{{route('search.talent')}}" method="get" >
                                    <div class="d-flex">
                                        <div class="bnr-input col">
                                            <input type="text" name="search" class="form-control bnr-input-style" placeholder="Search for talent by city, state">
                                        </div>
                                        <div class="bnr-src-btn-wrap col-auto">
                                            <button type="submit" class="bnr-src-btn"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <ul class="text-list-wrap d-flex justify-content-center mt-2">
                                    <li>Commercial, Print, Runway</li>
                                    <li>Conventions & Trade Shows</li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
          {{-- <div class="item">
            <div class="bannar-text-wrap">
                <img src="{{url('images/slider2.jpg')}}" alt="">
                <div class="bannar-text-box">
                    <h2>Print Models</h2>
                    <p>Network with photographers, makeup artists (MUA's), casting agencies</p>
                    <ul class="bannar-btn d-flex justify-content-center">
                        <li><a href="#">get noticed</a></li>
                        <li><a href="#">Find Talent</a></li>
                    </ul>
                </div>
            </div>
          </div>
          <div class="item">
            <div class="bannar-text-wrap">
                <img src="{{url('images/slider3.jpg')}}" alt="">
                <div class="bannar-text-box">
                    <h2>Makeup Artists</h2>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque somos notros corrupti quos et quas molestias sint occaecati summ.</p>
                    <ul class="bannar-btn d-flex justify-content-center">
                        <li><a href="#">get noticed</a></li>
                        <li><a href="#">Find Talent</a></li>
                    </ul>
                </div>
            </div>
          </div> --}}
        </div>
    </div>
</section>
   
<section class="home-model-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-6 col-12">
                <div class="become-member-wrapatag">
                    <a href="{{route('signup')}}" class="d-block">
                        <img class="img-block" src="{{url('images/become-member.jpg')}}" alt="">
                    </a>
                </div>
                @if (count($newestFaces) > 0 && $settings->newest_face == 1)
                    <div class="newest-facts wrap-gap">
                        <div class="wrap-head">
                            <h3>Newest Faces</h3>
                            <div class="heading-icon-wrap">
                                <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
                            </div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque somos notros corrupti quos et quas molestias sint occaecati summ.</p>
                            <div class="text-end">
                                <a href="{{route('search.talent')}}" class="view-all-btn-pos">view all</a>
                            </div>
                        </div>
                        <div class="newest-box-wrap d-flex flex-wrap">
                            @php
                                $index = 0;
                            @endphp
                            @forelse ($newestFaces as $key => $new_face)
                                @php
                                if ($key % 4 == 0) {
                                        $index = 0;
                                    }
                                    $index++;
                                @endphp
                                <div class="newest-box wow fadeInUp delay{{$index}}">
                                    <div class="newest-box-box">
                                        <img class="img-block" src="{{url('img/user/profile-image/'.$new_face->userDetails->profile_image)}}" alt="">
                                        <div class="newest-box-text">
                                            <h4>{{$new_face->name}}</h4>
                                            <p>{{$new_face->category->name}}</p>
                                            <div class="model-size">
                                                <ul class="d-flex flex-wrap justify-content-center">
                                                    @if (isset($new_face->userDetails->getHeight->height))
                                                        <li><h5>Height</h5><p>{{@$new_face->userDetails->getHeight->height}}</p></li>
                                                    @endif
                                                    @if (isset($new_face->userDetails->weight))
                                                        <li><h5>Weight</h5><p>{{@$new_face->userDetails->weight}}</p></li>
                                                    @endif
                                                    @if (isset($new_face->userDetails->getChest->size))
                                                        <li><h5>Bust</h5><p>{{@$new_face->userDetails->getChest->size}}</p></li>
                                                    @endif
                                                    @if (isset($new_face->userDetails->getWaist->size))
                                                        <li><h5>Waist</h5><p>{{@$new_face->userDetails->getWaist->size}}</p></li>
                                                    @endif
                                                    @if (isset($new_face->userDetails->getHips->size))
                                                        <li><h5>Hips</h5><p>{{@$new_face->userDetails->getHips->size}}</p></li>
                                                    @endif
                                                    @if ($new_face->userDetails->shoe_size)
                                                        <li><h5>Shoe</h5><p>{{@$new_face->userDetails->shoe_size}}</p></li>
                                                    @endif
                                                    @if ($new_face->userDetails->dress_size)
                                                        <li><h5>Dress</h5><p>{{@$new_face->userDetails->dress_size}}</p></li>
                                                    @endif
                                                    @if ($new_face->userDetails->hair_color)
                                                        <li><h5>Hair</h5><p>{{Helper::getColoursById(@$new_face->userDetails->hair_color)->name}}</p></li>
                                                    @endif
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="model-social-link">
                                            <ul>
                                                <li><a target="_blank" href="{{@$new_face->userDetails->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a target="_blank" href="{{@$new_face->userDetails->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                                                <li><a target="_blank" href="{{@$new_face->userDetails->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                                                <li><a target="_blank" href="{{@$new_face->userDetails->linkedin_link}}"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                @endif
                
                @if (count($featureModels) > 0 && $settings->featured_models == 1)
                    <div class="featured-models wrap-gap">
                        <div class="wrap-head">
                            <h3>featured models</h3>
                            <div class="heading-icon-wrap">
                                <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
                            </div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque somos notros corrupti quos et quas molestias sint occaecati summ.</p>
                            <div class="text-end">
                                <a href="{{route('user.search','models')}}" class="view-all-btn-pos">view all</a>
                            </div>
                        </div>
                        <div class="row grid-gap">
                            @php
                                $index = 0;
                            @endphp
                            @forelse ($featureModels as $key => $feature_model)
                                @php
                                    if ($key % 4 == 0) {
                                        $index = 0;
                                    }
                                    $index++;
                                @endphp
                                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="featured-model-box wow fadeInUp delay{{$index}}">
                                        <div class="featured-model-box-wrap">
                                            <span class="featured-model-img position-relative">
                                                <img class="img-block" src="{{url('img/user/profile-image/'.$feature_model->userDetails->profile_image)}}" alt="">
                                                <div class="model-size-two">
                                                    <ul class="d-flex flex-wrap justify-content-center">
                                                        @if (isset($feature_model->userDetails->getHeight->height))
                                                            <li><h5>Height</h5><p>{{@$feature_model->userDetails->getHeight->height}}</p></li>
                                                        @endif
                                                        @if (isset($feature_model->userDetails->weight))
                                                            <li><h5>Weight</h5><p>{{@$feature_model->userDetails->weight}}</p></li>
                                                        @endif
                                                        @if (isset($feature_model->userDetails->getChest->size))
                                                            <li><h5>Bust</h5><p>{{@$feature_model->userDetails->getChest->size}}</p></li>
                                                        @endif
                                                        @if (isset($feature_model->userDetails->getWaist->size))
                                                            <li><h5>Waist</h5><p>{{@$feature_model->userDetails->getWaist->size}}</p></li>
                                                        @endif
                                                        @if (isset($feature_model->userDetails->getHips->size))
                                                            <li><h5>Hips</h5><p>{{@$feature_model->userDetails->getHips->size}}</p></li>
                                                        @endif
                                                        @if ($feature_model->userDetails->shoe_size)
                                                            <li><h5>Shoe</h5><p>{{@$feature_model->userDetails->shoe_size}}</p></li>
                                                        @endif
                                                        @if ($feature_model->userDetails->dress_size)
                                                            <li><h5>Dress</h5><p>{{@$feature_model->userDetails->dress_size}}</p></li>
                                                        @endif
                                                        @if ($feature_model->userDetails->hair_color)
                                                            <li><h5>Hair</h5><p>{{Helper::getColoursById(@$feature_model->userDetails->hair_color)->name}}</p></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="model-social-link-two">
                                                    <ul>
                                                        <li><a target="_blank" href="{{@$feature_model->userDetails->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a target="_blank" href="{{@$feature_model->userDetails->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                                                        <li><a target="_blank" href="{{@$feature_model->userDetails->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a target="_blank" href="{{@$feature_model->userDetails->linkedin_link}}"><i class="fab fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </span>
                                            <div class="featured-model same_height1">
                                                <h4><a href="{{route('user.view.profile',[$feature_model->category->slug,$feature_model->name_slug])}}">{{$feature_model->name}}</a></h4>
                                                <p class="same_height-smtext">
                                                    
                                                    {{@Str::of($feature_model->userDetails->biography)->limit(80);}}
                                                </p>
                                                <ul class="box-more-btn d-flex justify-content-end">
                                                    <li>
                                                        <a href="{{route('user.view.profile',[$feature_model->category->slug,$feature_model->name_slug])}}">view profile</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                @endif
                @if (count($childModels) > 0 && $settings->child_model_and_acting == 1)
                    <div class="wrap-gap">
                        <div class="wrap-head">
                            <h3><span class="color-c">C</span><span class="color-h">h</span><span class="color-i">i</span><span class="color-l">l</span><span class="color-d">d</span> Modeling and acting </h3>
                            <div class="heading-icon-wrap">
                                <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
                            </div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                            <!-- <div class="text-end">
                                <a href="search.html" class="view-all-btn-pos">view all</a>
                            </div> -->
                        </div>
                        {{-- <div class="chiled-models"> --}}
                        <div class="chiled-models" style="background: url({{url('images/child-modal/chiled-model-bg.jpg')}}) no-repeat center center;">                    
                            <div class="wrap-head">
                                <!-- <h3 class="text-white"></h3> -->
                                <div class="text-end">
                                    <a href="{{route('user.search','child-model-and-actor')}}" class="view-all-btn-pos text-white">view all</a>
                                </div>
                            </div>
                            <div class="chiled-models-wrap d-flex flex-wrap">
                                @forelse ($childModels as $key => $child_model)
                                    <div class="featured-model-box chiled-models-box wow fadeInUp delay{{$key+1}}">
                                        <div class="featured-model-box-wrap">
                                            <span class="featured-model-img position-relative">
                                                <img class="img-block" src="{{url('img/user/profile-image/'.$child_model->userDetails->profile_image)}}" alt="">
                                                <div class="model-size-two pe-0">
                                                    <ul class="d-flex flex-wrap justify-content-center">
                                                        @if (isset($child_model->userDetails->weight))
                                                        <li><h5>Weight</h5><p>{{@$child_model->userDetails->weight}}</p></li>
                                                        @endif
                                                        @if (isset($child_model->userDetails->shoe_size))
                                                            <li><h5>Shoe</h5><p>{{@$child_model->userDetails->shoe_size}}</p></li>
                                                        @endif
                                                        
                                                        @if ($child_model->userDetails->hair_color)
                                                            <li><h5>Eye</h5><p>{{Helper::getColoursById(@$child_model->userDetails->eye_color)->name}}</p></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </span>
                                            <div class="featured-model">
                                                <h4><a href="{{route('user.view.profile',[$child_model->category->slug,$child_model->name_slug])}}">{{@$child_model->name}}</a></h4>
                                                <p>City : <span class="info-desc">{{@$child_model->userDetails->city_name}}</span></p>
                                                <p>Age : <span class="info-desc">{{Carbon\Carbon::parse($child_model->userDetails->dob)->age}}+</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    
                                @endforelse
                                
                            </div>
                        </div>
                    </div>
                @endif
                
                @if (count($photographers) > 0 && $settings->top_photographer == 1)
                    <div class="photographe-wrap wrap-gap">
                        <div class="wrap-head">
                            <h3>Top Photographers</h3>
                            <div class="heading-icon-wrap">
                                <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, dolor tenetur? Repellendus deleniti voluptatem similique atque in quibusdam explicabo dolorem quidem nostrum esse fuga quasi, ea eaque quod! Vero, voluptatem.</p>
                            <div class="text-end">
                                <a href="{{route('user.search','photographer')}}" class="view-all-btn-pos">view all</a>
                            </div>
                        </div>
                        <div class="row grid-gap">
                            @forelse ($photographers as $key => $photographer)
                                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="photographe-box wow fadeInUp delay{{$key+1}}">
                                        <div class="photographe-wrap-box">
                                            <span class="photographe-box-img position-relative">
                                                <img class="img-block" src="{{url('img/user/profile-image/'.$photographer->userDetails->profile_image)}}" alt="">
                                                <span class="user-ribbon">
                                                    @if ($photographer->userPlan->plan->name == 'Platinum')
                                                        <img src="{{url('images/platinum.svg')}}" alt="">
                                                    @endif
                                                    @if ($photographer->userPlan->plan->name == 'Gold')
                                                        <img src="{{url('images/gold.svg')}}" alt="">
                                                    @endif
                                                </span>
                                                {{-- <div class="photoghp-des">
                                                    <h5>Lorem ipsum</h5>
                                                    <p>Lorem ipsum, dolor sit</p>
                                                </div> --}}
                                                <div class="photoghp-social-link">
                                                    <ul>
                                                        <li><a target="_blank" href="{{@$user->userDetails->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a target="_blank" href="{{@$user->userDetails->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                                                        <li><a target="_blank" href="{{@$user->userDetails->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a target="_blank" href="{{@$user->userDetails->linkedin_link}}"><i class="fab fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </span>
                                            <div class="photographe-box-text same_height2">
                                                <h4><a href="{{route('user.view.profile',[$photographer->category->slug,$photographer->name_slug])}}">{{$photographer->name}}</a></h4>
                                                <p>Available for:<span class="info-photogh">Commercial</span></p>
                                                <p>City:<span class="info-photogh">{{@$photographer->userDetails->city_name}}</span></p>
                                                <p>State:<span class="info-photogh">{{@$photographer->userDetails->getState->name}}</span></p>
                                                <ul class="box-more-btn d-flex justify-content-end">
                                                    <li>
                                                        <a href="{{route('user.view.profile',[$photographer->category->slug,$photographer->name_slug])}}">view profile</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
                        
                        </div>
                    </div>
                @endif
                
                @if (count($conventionAndTradeModels) > 0 && $settings->convention_and_trade_show_model == 1)
                <div class="featured-models wrap-gap">
                    <div class="wrap-head">
                        <h3>Convention & Trade Show Models</h3>
                        <div class="heading-icon-wrap">
                            <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, dolor tenetur? Repellendus deleniti voluptatem similique atque in quibusdam explicabo dolorem quidem nostrum esse fuga quasi, ea eaque quod! Vero, voluptatem.</p>
                        <div class="text-end">
                            <a href="{{route('user.search','models')}}" class="view-all-btn-pos">view all</a>
                        </div>
                    </div>
                    <div class="row grid-gap">
                        @foreach ($conventionAndTradeModels as $key => $conventionAndTradeModel)
                            <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="featured-model-box wow fadeInUp delay{{$key+1}}">
                                    <div class="featured-model-box-wrap">
                                        <span class="featured-model-img position-relative">
                                            <img class="img-block" src="{{url('img/user/profile-image/'.$conventionAndTradeModel->userDetails->profile_image)}}" alt="">
                                            <div class="model-size-two">
                                                <ul class="d-flex flex-wrap justify-content-center">
                                                    @if (isset($conventionAndTradeModel->userDetails->getHeight->height))
                                                            <li><h5>Height</h5><p>{{@$conventionAndTradeModel->userDetails->getHeight->height}}</p></li>
                                                        @endif
                                                        @if (isset($conventionAndTradeModel->userDetails->weight))
                                                            <li><h5>Weight</h5><p>{{@$conventionAndTradeModel->userDetails->weight}}</p></li>
                                                        @endif
                                                        @if (isset($conventionAndTradeModel->userDetails->getChest->size))
                                                            <li><h5>Bust</h5><p>{{@$conventionAndTradeModel->userDetails->getChest->size}}</p></li>
                                                        @endif
                                                        @if (isset($conventionAndTradeModel->userDetails->getWaist->size))
                                                            <li><h5>Waist</h5><p>{{@$conventionAndTradeModel->userDetails->getWaist->size}}</p></li>
                                                        @endif
                                                        @if (isset($conventionAndTradeModel->userDetails->getHips->size))
                                                            <li><h5>Hips</h5><p>{{@$conventionAndTradeModel->userDetails->getHips->size}}</p></li>
                                                        @endif
                                                        @if ($conventionAndTradeModel->userDetails->shoe_size)
                                                            <li><h5>Shoe</h5><p>{{@$conventionAndTradeModel->userDetails->shoe_size}}</p></li>
                                                        @endif
                                                        @if ($conventionAndTradeModel->userDetails->dress_size)
                                                            <li><h5>Dress</h5><p>{{@$conventionAndTradeModel->userDetails->dress_size}}</p></li>
                                                        @endif
                                                        @if ($conventionAndTradeModel->userDetails->hair_color)
                                                            <li><h5>Hair</h5><p>{{Helper::getColoursById(@$conventionAndTradeModel->userDetails->hair_color)->name}}</p></li>
                                                        @endif
                                                </ul>
                                            </div>
                                            <div class="model-social-link-two">
                                                <ul>
                                                    <li><a target="_blank" href="{{@$conventionAndTradeModel->userDetails->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a target="_blank" href="{{@$conventionAndTradeModel->userDetails->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a target="_blank" href="{{@$conventionAndTradeModel->userDetails->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a target="_blank" href="{{@$conventionAndTradeModel->userDetails->linkedin_link}}"><i class="fab fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </span>
                                        <div class="featured-model same_height1">
                                            <h4><a href="model.html">{{@$conventionAndTradeModel->name}}</a></h4>
                                            <p>{{@Str::of($conventionAndTradeModel->userDetails->biography)->limit(80);}}</p>
                                            <ul class="box-more-btn d-flex justify-content-end">
                                                <li>
                                                    <a href="{{{route('user.view.profile',[$conventionAndTradeModel->category->slug,$conventionAndTradeModel->name_slug])}}}">view profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 co-12">
                <div class="sticky-right">
                    <div class="ads-wrap home-rgt-gap">
                        <div class="ads-wrap-box fit-add">
                            <a class="d-block" href="{{ isset($fixed_advertisements[0]) ? @$fixed_advertisements[0]->link : 'https://www.cutestbabyphoto.com'}}"> <img class="img-block" src="{{ isset($fixed_advertisements[0]) ? url('img/home/'.@$fixed_advertisements[0]->image_name) : url('images/ad-sec1.jpg')}}" alt="Enter Our Cutest Baby Photo Contest"></a>
                        </div>
                        <div class="ads-wrap-box fit-add">
                            <a class="d-block" href="{{ isset($fixed_advertisements[1]) ? @$fixed_advertisements[1]->link : 'https://www.americanmodel.net/subscription-plan'}}"> <img class="img-block" src="{{ isset($fixed_advertisements[1]) ? url('img/home/'.@$fixed_advertisements[1]->image_name) : url('images/ad-sec3.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    {{-- @if (isset($poll->userPolls) && count(@$poll->userPolls) > 0)
                    <div class="american-model home-rgt-gap position-relative pol-img-bg" style="background: url({{url('img/home/'.$settings->home_poll_image)}}) center center no-repeat;">
                        <!-- <span class="american-bg-img">
                            <img class="img-block" src="images/american-bg.png" alt="">
                        </span> -->
                        <div class="border-box">
                            <div class="rgt-head">
                                <h3>american model poll</h3>
                                <h4>{{@$poll->question}}</h4>
                            </div>
                            <!-- <div class="moder-src position-relative">
                                <input type="text" class="form-control input-src" placeholder="Keywords">
                                <span class="model-src-btn-wrap">
                                    <button type="submit" class="model-src-btn"><i class="fas fa-search"></i></button>
                                </span>
                            </div> -->
                            
                            <div class="voteing-wrap" style="display: block;">
                                <ul class="tagline-src">
                                    @forelse (@$poll->userPolls as $key=>$poll_user)
                                    <li class="radio wow fadeInUp delay{{$key+1}}">
                                        <input id="vote4" name="poll[]" type="radio" value="">
                                        <label for="vote4">{{@$poll_user->user->name}}</label>
                                    </li>
                                    @empty
                                        
                                    @endforelse
                                </ul>
                                <div class="vote-wrap">
                                    <button type="submit" class="pol-submit">submit</button>
                                </div>
                            </div>
                            
                            <div class="vote-result" style="display: none;">
                                <div class="vote-result-single">
                                    <p>Cindy Crawford</p>
                                    <div class="voteing-total-wrap">
                                        <span class="voteing-total" style="width: 30%;"></span>
                                        <span class="voteing-total-count">30%</span>
                                    </div>
                                </div>
                                <div class="vote-result-single">
                                    <p>Tyra Banks</p>
                                    <div class="voteing-total-wrap">
                                        <span class="voteing-total" style="width: 80%;"></span>
                                        <span class="voteing-total-count">80%</span>
                                    </div>
                                </div>
                                <div class="vote-result-single">
                                    <p>Christy Turlington</p>
                                    <div class="voteing-total-wrap">
                                        <span class="voteing-total" style="width: 60%;"></span>
                                        <span class="voteing-total-count">40%</span>
                                    </div>
                                </div>
                                <div class="vote-result-single">
                                    <p>Kate Upton</p>
                                    <div class="voteing-total-wrap">
                                        <span class="voteing-total" style="width: 20%;"></span>
                                        <span class="voteing-total-count">20%</span>
                                    </div>
                                </div>
                                <div class="vote-result-single">
                                    <p>Christie Brinkley</p>
                                    <div class="voteing-total-wrap">
                                        <span class="voteing-total" style="width: 90%;"></span>
                                        <span class="voteing-total-count">90%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif --}}
                    {{-- <div class="news-letter d-flex justify-content-between align-items-center home-rgt-gap">
                        <div class="news-letter-box">
                            <span class="news-ltb-icon">
                                <img class="img-block" src="{{url('images/newsletter-bg.svg')}}" alt="">
                            </span>
                            <div class="rgt-head">
                                <h4>newsletter Signup</h4>
                                <p>Signup to our newsletter & get all the latest updates from the industry, free!</p>
                            </div>
                            <div class="news-input position-relative">
                                <input type="text" class="form-control news-input-style" placeholder="Your email Address">
                                <span class="icon-input-news"><i class="fas fa-envelope"></i></span>
                            </div>
                            <div class="news-letter-btn-wrap">
                                <button type="submit" class="register-news">register</button>
                            </div>
                        </div>
                    </div> --}}
                    @if (@$settings->shop_section == 1)
                        <div class="product-sell home-rgt-gap">
                            <div class="product-sell-img relative">
                                <img class="img-block" src="{{url('img/home/'.$settings->home_shop_image)}}" alt="">
                            </div>
                            <div class="product-sell-text">
                                {{@$settings->home_shop_category}} <span>{{@$settings->home_shop_discount}} % off</span>{{@$settings->home_shop_details}}
                                <a href="#">shop now</a>
                            </div>
                        </div>
                    @endif
                    @if (@$settings->advertisement_section == 1)
                        @forelse ($advertisements as $advertisement)
                            <div class="ads-wrap home-rgt-gap">
                                <div class="ads-wrap-box">
                                    <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                                <a class="d-block" href="{{@$advertisement->link}}"> <img class="img-block" src="{{url('img/home/'.@$advertisement->image_name)}}" alt=""></a>
                                </div>
                            </div>
                        @empty
                            
                        @endforelse
                    @endif
                    
                    {{-- <div class="ads-wrap home-rgt-gap">
                        <div class="ads-wrap-box">
                            <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                           <a class="d-block" href="{{@$settings->home_add_img1_link}}"> <img class="img-block" src="{{url('img/home/'.@$settings->home_add_img1)}}" alt=""></a>
                        </div>
                    </div>
                    <div class="ads-wrap home-rgt-gap">
                        <div class="ads-wrap-box">
                            <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                            <a class="d-block" href="{{@$settings->home_add_img2_link}}"><img class="img-block" src="{{url('img/home/'.@$settings->home_add_img2)}}" alt=""></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script>
    
   
</script>
@endpush