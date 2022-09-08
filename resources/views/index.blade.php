@extends('layouts.app')
@section('content')
<section class="slider-wrap index-z">
    <div class="home-slider">
        <div class="owl-carousel owl-theme home_slider">
        @if(count($banners) > 0)
        @foreach ($banners as $banner)
        <div class="item">
            <div class="bannar-text-wrap">
                <img src="{{url('img/home_banner/'.$banner->image_name)}}" alt="">
                <div class="bannar-text-box">
                    <h2>{{$banner->name}}</h2>
                    <p>{{$banner->desc}}</p>
                    <ul class="bannar-btn d-flex justify-content-center">
                        <li><a href="#">get noticed</a></li>
                        <li><a href="#">Find Talent</a></li>
                    </ul>
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
                <div class="become-member-wrap position-relative bcm-member-bg" style="background: url({{url('images/banner-Become.jpg')}}) center center no-repeat;">
                    <span class="model-bg"><img class="img-block" src="{{url('images/banner-Become-lft.png')}}" alt=""></span>
                    <div class="become-member">
                        <div class="become-member-head">
                            <h3><strong>become</strong> a member</h3>
                            <!-- <p>Join the largest online american fashion model industry community and gain many benefits and connections.</p> -->
                        </div>
                        <div class="member-login">
                            <ul class="member-login-list">
                                <li class="wow fadeInDown delay1">Models, Photographers and MUA's Wanted</li>
                                <li class="wow fadeInDown delay2">Be Seen, Get Hired! Receive Casting Calls!</li>
                                <li class="wow fadeInDown delay3">Create Your Profile, Upload Portfolio & Bio</li>
                            </ul>
                            <!-- <div class="input-wrap input-gap">
                                <input type="text" class="form-control input-underline" placeholder="Name">
                            </div>
                            <div class="input-wrap input-gap">
                                <div class="add-icon">
                                    <input type="text" class="form-control input-underline" placeholder="+91 0000 00 0000">
                                    <span class="icon-input"><i class="fas fa-phone-alt"></i></span>
                                </div>
                            </div>
                            <div class="select-wrap input-gap">
                                <div class="add-icon">
                                    <select class="form-control select-underline selectOption">
                                        <option>Choose Membership</option>
                                    </select>
                                    <span class="icon-input"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            <div class="input-wrap input-gap">
                                <div class="add-icon">
                                    <input type="text" class="form-control input-underline" placeholder="Your Email Address">
                                    <span class="icon-input"><i class="fas fa-envelope"></i></span>
                                </div>
                            </div> -->
                            <div class="login-ftr">
                                <!-- <p>your personal information won't be shared with any 3rd party organization</p> -->
                                <div class="join-model-btn-wrap">
                                    <a href="#" class="join-model-btn">join americanmodel.net today!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="newest-facts wrap-gap">
                    <div class="wrap-head">
                        <h3>Newest Faces</h3>
                        <div class="heading-icon-wrap">
                            <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
                        </div>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque somos notros corrupti quos et quas molestias sint occaecati summ.</p>
                        <div class="text-end">
                            <a href="search.html" class="view-all-btn-pos">view all</a>
                        </div>
                    </div>
                    <div class="newest-box-wrap d-flex flex-wrap">
                        <div class="newest-box wow fadeInUp delay1">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest1.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>Make up</h4>
                                    <p>model, photo</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Weight</h5><p>55</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Dress</h5><p>10</p></li>
                                            <li><h5>Hair</h5><p>Black</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="newest-box wow fadeInUp delay2">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest2.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>Fashion Killa</h4>
                                    <p>Make Up, Model</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Weight</h5><p>55</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Dress</h5><p>10</p></li>
                                            <li><h5>Hair</h5><p>Black</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="newest-box wow fadeInUp delay3">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest3.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>New Collection</h4>
                                    <p>Model, Swimsuit</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Weight</h5><p>55</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Dress</h5><p>10</p></li>
                                            <li><h5>Hair</h5><p>Black</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="newest-box wow fadeInUp delay4">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest4.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>Make up</h4>
                                    <p>model, photo</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Weight</h5><p>55</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Dress</h5><p>10</p></li>
                                            <li><h5>Hair</h5><p>Black</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="newest-box wow fadeInUp delay1">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest5.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>Stand out</h4>
                                    <p>model, photo</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Weight</h5><p>55</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Dress</h5><p>10</p></li>
                                            <li><h5>Hair</h5><p>Black</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="newest-box wow fadeInUp delay2">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest6.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>Decorate</h4>
                                    <p>Model, Swimsuit</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Weight</h5><p>55</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Dress</h5><p>10</p></li>
                                            <li><h5>Hair</h5><p>Black</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="newest-box wow fadeInUp delay3">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest7.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>Imagination</h4>
                                    <p>Make Up, Model</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Weight</h5><p>55</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Dress</h5><p>10</p></li>
                                            <li><h5>Hair</h5><p>Black</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="newest-box wow fadeInUp delay4">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest8.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>Appearance</h4>
                                    <p>Fashion, Model</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Weight</h5><p>55</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Dress</h5><p>10</p></li>
                                            <li><h5>Hair</h5><p>Black</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="newest-box">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest9.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>Model</h4>
                                    <p>Model, Swimsuit</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Eyes</h5><p>Blue</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="newest-box">
                            <div class="newest-box-box">
                                <img class="img-block" src="{{url('images/newest/newest10.jpg')}}" alt="">
                                <div class="newest-box-text">
                                    <h4>Dress Code</h4>
                                    <p>Make Up, Model</p>
                                    <div class="model-size">
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><h5>Height</h5><p>185</p></li>
                                            <li><h5>Bust</h5><p>79</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Waist</h5><p>59</p></li>
                                            <li><h5>Hips</h5><p>87</p></li>
                                            <li><h5>Shoe</h5><p>39</p></li>
                                            <li><h5>Eyes</h5><p>Blue</p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="model-social-link">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="featured-models wrap-gap">
                    <div class="wrap-head">
                        <h3>featured models</h3>
                        <div class="heading-icon-wrap">
                            <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
                        </div>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque somos notros corrupti quos et quas molestias sint occaecati summ.</p>
                        <div class="text-end">
                            <a href="search.html" class="view-all-btn-pos">view all</a>
                        </div>
                    </div>
                    <div class="row grid-gap">
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="featured-model-box wow fadeInUp delay1">
                                <div class="featured-model-box-wrap">
                                    <span class="featured-model-img position-relative">
                                        <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                        <div class="model-size-two">
                                            <ul class="d-flex flex-wrap justify-content-center">
                                                <li><h5>Height</h5><p>185</p></li>
                                                <li><h5>Bust</h5><p>79</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Hips</h5><p>87</p></li>
                                                <li><h5>Shoe</h5><p>39</p></li>
                                                <li><h5>Eyes</h5><p>Blue</p></li>
                                            </ul>
                                        </div>
                                        <div class="model-social-link-two">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="featured-model same_height1">
                                        <h4><a href="model.html">jessica Herbert</a></h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet deleniti illo minima quam itaque!</p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="model.html">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="featured-model-box wow fadeInUp delay2">
                                <div class="featured-model-box-wrap">
                                    <span class="featured-model-img position-relative">
                                        <img class="img-block" src="{{url('images/feutered-model/model2.jpg')}}" alt="">
                                        <div class="model-size-two">
                                            <ul class="d-flex flex-wrap justify-content-center">
                                                <li><h5>Height</h5><p>185</p></li>
                                                <li><h5>Bust</h5><p>79</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Hips</h5><p>87</p></li>
                                                <li><h5>Shoe</h5><p>39</p></li>
                                                <li><h5>Eyes</h5><p>Blue</p></li>
                                            </ul>
                                        </div>
                                        <div class="model-social-link-two">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="featured-model same_height1">
                                        <h4><a href="#">jessica Herbert</a></h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet deleniti illo minima quam itaque!</p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="#">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="featured-model-box wow fadeInUp delay3">
                                <div class="featured-model-box-wrap">
                                    <span class="featured-model-img position-relative">
                                        <img class="img-block" src="{{url('images/feutered-model/model3.jpg')}}" alt="">
                                        <div class="model-size-two">
                                            <ul class="d-flex flex-wrap justify-content-center">
                                                <li><h5>Height</h5><p>185</p></li>
                                                <li><h5>Bust</h5><p>79</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Hips</h5><p>87</p></li>
                                                <li><h5>Shoe</h5><p>39</p></li>
                                                <li><h5>Eyes</h5><p>Blue</p></li>
                                            </ul>
                                        </div>
                                        <div class="model-social-link-two">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="featured-model same_height1">
                                        <h4><a href="#">jessica Herbert</a></h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet deleniti illo minima quam itaque!</p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="#">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="featured-model-box wow fadeInUp delay4">
                                <div class="featured-model-box-wrap">
                                    <span class="featured-model-img position-relative">
                                        <img class="img-block" src="{{url('images/feutered-model/model4.jpg')}}" alt="">
                                        <div class="model-size-two">
                                            <ul class="d-flex flex-wrap justify-content-center">
                                                <li><h5>Height</h5><p>185</p></li>
                                                <li><h5>Bust</h5><p>79</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Hips</h5><p>87</p></li>
                                                <li><h5>Shoe</h5><p>39</p></li>
                                                <li><h5>Eyes</h5><p>Blue</p></li>
                                            </ul>
                                        </div>
                                        <div class="model-social-link-two">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="featured-model same_height1">
                                        <h4><a href="#">jessica Herbert</a></h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet deleniti illo minima quam itaque!</p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="#">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="featured-model-box wow fadeInUp delay1">
                                <div class="featured-model-box-wrap">
                                    <span class="featured-model-img position-relative">
                                        <img class="img-block" src="{{url('images/feutered-model/model5.jpg')}}" alt="">
                                        <div class="model-size-two">
                                            <ul class="d-flex flex-wrap justify-content-center">
                                                <li><h5>Height</h5><p>185</p></li>
                                                <li><h5>Bust</h5><p>79</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Hips</h5><p>87</p></li>
                                                <li><h5>Shoe</h5><p>39</p></li>
                                                <li><h5>Eyes</h5><p>Blue</p></li>
                                            </ul>
                                        </div>
                                        <div class="model-social-link-two">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="featured-model same_height1">
                                        <h4><a href="#">jessica Herbert</a></h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet deleniti illo minima quam itaque!</p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="#">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="featured-model-box wow fadeInUp delay2">
                                <div class="featured-model-box-wrap">
                                    <span class="featured-model-img position-relative">
                                        <img class="img-block" src="{{url('images/feutered-model/model6.jpg')}}" alt="">
                                        <div class="model-size-two">
                                            <ul class="d-flex flex-wrap justify-content-center">
                                                <li><h5>Height</h5><p>185</p></li>
                                                <li><h5>Bust</h5><p>79</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Hips</h5><p>87</p></li>
                                                <li><h5>Shoe</h5><p>39</p></li>
                                                <li><h5>Eyes</h5><p>Blue</p></li>
                                            </ul>
                                        </div>
                                        <div class="model-social-link-two">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="featured-model same_height1">
                                        <h4><a href="#">jessica Herbert</a></h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet deleniti illo minima quam itaque!</p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="#">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="featured-model-box wow fadeInUp delay3">
                                <div class="featured-model-box-wrap">
                                    <span class="featured-model-img position-relative">
                                        <img class="img-block" src="{{url('images/feutered-model/model7.jpg')}}" alt="">
                                        <div class="model-size-two">
                                            <ul class="d-flex flex-wrap justify-content-center">
                                                <li><h5>Height</h5><p>185</p></li>
                                                <li><h5>Bust</h5><p>79</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Hips</h5><p>87</p></li>
                                                <li><h5>Shoe</h5><p>39</p></li>
                                                <li><h5>Eyes</h5><p>Blue</p></li>
                                            </ul>
                                        </div>
                                        <div class="model-social-link-two">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="featured-model same_height1">
                                        <h4><a href="#">jessica Herbert</a></h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet deleniti illo minima quam itaque!</p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="#">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="featured-model-box wow fadeInUp delay4">
                                <div class="featured-model-box-wrap">
                                    <span class="featured-model-img position-relative">
                                        <img class="img-block" src="{{url('images/feutered-model/model8.jpg')}}" alt="">
                                        <div class="model-size-two">
                                            <ul class="d-flex flex-wrap justify-content-center">
                                                <li><h5>Height</h5><p>185</p></li>
                                                <li><h5>Bust</h5><p>79</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Waist</h5><p>59</p></li>
                                                <li><h5>Hips</h5><p>87</p></li>
                                                <li><h5>Shoe</h5><p>39</p></li>
                                                <li><h5>Eyes</h5><p>Blue</p></li>
                                            </ul>
                                        </div>
                                        <div class="model-social-link-two">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="featured-model same_height1">
                                        <h4><a href="#">jessica Herbert</a></h4>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet deleniti illo minima quam itaque!</p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="#">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <div class="chiled-models" style="background: url({{url('images/child-modal/chiled-model-bg.jpg')}}) no-repeat center center;">
                        <div class="wrap-head">
                            <!-- <h3 class="text-white"></h3> -->
                            <div class="text-end">
                                <a href="search-child-model.html" class="view-all-btn-pos text-white">view all</a>
                            </div>
                        </div>
                        <div class="chiled-models-wrap d-flex flex-wrap">
                            <div class="chiled-models-box wow fadeInUp delay1">
                                <a href="#">
                                    <img class="img-block" src="{{url('images/child-modal/model-1.jpg')}}" alt="">
                                    <div class="chiled-box-text">
                                        <h4>Fashion Killa</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                                    </div>
                                </a>
                            </div>
                            <div class="chiled-models-box wow fadeInUp delay2">
                                <a href="#">
                                    <img class="img-block" src="{{url('images/child-modal/model-2.jpg')}}" alt="">
                                    <div class="chiled-box-text">
                                        <h4>Fashion Killa</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                                    </div>
                                </a>
                            </div>
                            <div class="chiled-models-box wow fadeInUp delay3">
                                <a href="#">
                                    <img class="img-block" src="{{url('images/child-modal/model-3.jpg')}}" alt="">
                                    <div class="chiled-box-text">
                                        <h4>Fashion Killa</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                                    </div>
                                </a>
                            </div>
                            <div class="chiled-models-box wow fadeInUp delay4">
                                <a href="#">
                                    <img class="img-block" src="{{url('images/child-modal/model-4.jpg')}}" alt="">
                                    <div class="chiled-box-text">
                                        <h4>Fashion Killa</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                                    </div>
                                </a>
                            </div>
                            <div class="chiled-models-box wow fadeInUp delay5">
                                <a href="#">
                                    <img class="img-block" src="{{url('images/child-modal/model-5.jpg')}}" alt="">
                                    <div class="chiled-box-text">
                                        <h4>Fashion Killa</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="photographe-wrap wrap-gap">
                    <div class="wrap-head">
                        <h3>Top Photographers</h3>
                        <div class="heading-icon-wrap">
                            <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, dolor tenetur? Repellendus deleniti voluptatem similique atque in quibusdam explicabo dolorem quidem nostrum esse fuga quasi, ea eaque quod! Vero, voluptatem.</p>
                        <div class="text-end">
                            <a href="search-photographer.html" class="view-all-btn-pos">view all</a>
                        </div>
                    </div>
                    <div class="row grid-gap">
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="photographe-box wow fadeInUp delay1">
                                <div class="photographe-wrap-box">
                                    <span class="photographe-box-img position-relative">
                                        <img class="img-block" src="{{url('images/photography/photography1.jpg')}}" alt="">
                                        <span class="user-ribbon">
                                            <img src="{{url('images/platinum.svg')}}" alt="">
                                        </span>
                                        <div class="photoghp-des">
                                            <h5>Lorem ipsum</h5>
                                            <p>Lorem ipsum, dolor sit</p>
                                        </div>
                                        <div class="photoghp-social-link">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="photographe-box-text same_height2">
                                        <h4><a href="photographer-profile.html">jessica Herbert</a></h4>
                                        <p>Available for:<span class="info-photogh">Commercial</span></p>
                                        <p>City:<span class="info-photogh">Las Vegas</span></p>
                                        <p>State:<span class="info-photogh">NV</span></p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="photographer-profile.html">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="photographe-box wow fadeInUp delay2">
                                <div class="photographe-wrap-box">
                                    <span class="photographe-box-img position-relative">
                                        <img class="img-block" src="{{url('images/photography/photography2.jpg')}}" alt="">
                                        <span class="user-ribbon">
                                            <img src="{{url('images/gold.svg')}}" alt="">
                                        </span>
                                        <div class="photoghp-des">
                                            <h5>Lorem ipsum</h5>
                                            <p>Lorem ipsum, dolor sit</p>
                                        </div>
                                        <div class="photoghp-social-link">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="photographe-box-text same_height2">
                                        <h4><a href="#">jessica Herbert</a></h4>
                                        <p>Available for:<span class="info-photogh">Commercial</span></p>
                                        <p>City:<span class="info-photogh">Las Vegas</span></p>
                                        <p>State:<span class="info-photogh">NV</span></p>
                                        <ul class="box-more-btn d-flex justify-content-end">
                                            <li>
                                                <a href="#">view profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="photographe-box wow fadeInUp delay3">
                                <div class="photographe-box">
                                    <div class="photographe-wrap-box">
                                        <span class="photographe-box-img position-relative">
                                            <img class="img-block" src="{{url('images/photography/photography3.jpg')}}" alt="">
                                            <div class="photoghp-des">
                                                <h5>Lorem ipsum</h5>
                                                <p>Lorem ipsum, dolor sit</p>
                                            </div>
                                            <div class="photoghp-social-link">
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </span>
                                        <div class="photographe-box-text same_height2">
                                            <h4><a href="#">jessica Herbert</a></h4>
                                            <p>Available for:<span class="info-photogh">Commercial</span></p>
                                            <p>City:<span class="info-photogh">Las Vegas</span></p>
                                            <p>State:<span class="info-photogh">NV</span></p>
                                            <ul class="box-more-btn d-flex justify-content-end">
                                                <li>
                                                    <a href="#">view profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="photographe-box wow fadeInUp delay4">
                                <div class="photographe-box">
                                    <div class="photographe-wrap-box">
                                        <span class="photographe-box-img position-relative">
                                            <img class="img-block" src="{{url('images/photography/photography4.jpg')}}" alt="">
                                            <div class="photoghp-des">
                                                <h5>Lorem ipsum</h5>
                                                <p>Lorem ipsum, dolor sit</p>
                                            </div>
                                            <div class="photoghp-social-link">
                                                <ul>
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </span>
                                        <div class="photographe-box-text same_height2">
                                            <h4><a href="#">jessica Herbert</a></h4>
                                            <p>Available for:<span class="info-photogh">Commercial</span></p>
                                            <p>City:<span class="info-photogh">Las Vegas</span></p>
                                            <p>State:<span class="info-photogh">NV</span></p>
                                            <ul class="box-more-btn d-flex justify-content-end">
                                                <li>
                                                    <a href="#">view profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 co-12">
                <div class="sticky-right">
                    <div class="american-model home-rgt-gap position-relative pol-img-bg" style="background: url(./images/pol-bg.jpg) center center no-repeat;">
                        <!-- <span class="american-bg-img">
                            <img class="img-block" src="images/american-bg.png" alt="">
                        </span> -->
                        <div class="border-box">
                            <div class="rgt-head">
                                <h3>american model poll</h3>
                                <h4>Who's Your Favorite Supermodel?</h4>
                            </div>
                            <!-- <div class="moder-src position-relative">
                                <input type="text" class="form-control input-src" placeholder="Keywords">
                                <span class="model-src-btn-wrap">
                                    <button type="submit" class="model-src-btn"><i class="fas fa-search"></i></button>
                                </span>
                            </div> -->
                            <div class="voteing-wrap" style="display: block;">
                                <ul class="tagline-src">
                                    <li class="radio wow fadeInUp delay1">
                                        <input id="vote4" name="poll" type="radio" value="">
                                        <label for="vote4">Kate Upton</label>
                                    </li>
                                    <li class="radio wow fadeInUp delay2">
                                        <input id="vote3" name="poll" type="radio" value="">
                                        <label for="vote3">Christy Turlington</label>
                                    </li>
                                    <li class="radio wow fadeInUp delay3">
                                        <input id="vote1" name="poll" type="radio" value="">
                                        <label for="vote1">Cindy Crawford</label>
                                    </li>
                                    <li class="radio wow fadeInUp delay4">
                                        <input id="vote2" name="poll" type="radio" value="">
                                        <label for="vote2">Elle macPherson</label>
                                    </li>
                                    <li class="radio wow fadeInUp delay5">
                                        <input id="vote5" name="poll" type="radio" value="">
                                        <label for="vote5">Giselle Bundchen</label>
                                    </li>
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
                    <div class="news-letter d-flex justify-content-between align-items-center home-rgt-gap">
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
                    </div>
                    <div class="product-sell home-rgt-gap">
                        <div class="product-sell-img relative">
                            <img class="img-block" src="{{url('images/tshirt.jpg')}}" alt="">
                        </div>
                        <div class="product-sell-text">
                            T-shirt <span>49% off</span>on selected products
                            <a href="#">shop now</a>
                        </div>
                    </div>
                    <div class="ads-wrap home-rgt-gap">
                        <div class="ads-wrap-box">
                            <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                            <img class="img-block" src="{{url('images/flyer.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="ads-wrap home-rgt-gap">
                        <div class="ads-wrap-box">
                            <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                            <img class="img-block" src="{{url('images/flyer1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection