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
                            <li><a href="#"><i class="far fa-heart"></i>0</a></li>
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
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
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
                            <p>{{$user->userDetails->getCity->name}}, {{$user->userDetails->getState->iso2}}</p>
                            <p>{{url('/'.$user->category->slug.'/'.$user->name_slug)}}</p>
                            <p><span class="info-type">Last Activity:</span>{{ Carbon\Carbon::parse($user->last_active)->format('F d Y') }}</p>
                           
                        </div>
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
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Personal Information
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="infoOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="info-edit-mainwrap">
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Eye Color</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('eye_color')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            @if(Helper::getColoursByAttr('eye'))
                                                                <div class="edit-value-select">
                                                                    <select class="form-control edit-select-style selectOptionEdit disabled" id="eye_color" name="eye_color">
                                                                        @foreach (Helper::getColoursByAttr('eye') as $key => $colour)
                                                                        <option value ="{{$colour->id}}" @if ($user->userDetails->eye_color == $colour->id ) selected @endif>{{$colour->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Skin Color</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('skin_color')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            @if(Helper::getColoursByAttr('skin'))
                                                                <div class="edit-value-select">
                                                                    <select class="form-control edit-select-style selectOptionEdit disabled" id="skin_color" name="skin_color">
                                                                        @foreach (Helper::getColoursByAttr('skin') as $key => $colour)
                                                                        <option value ="{{$colour->id}}" @if ($user->userDetails->skin_color == $colour->id ) selected @endif>{{$colour->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Hair Color</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('hair_color')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            @if(Helper::getColoursByAttr('hair'))
                                                                <div class="edit-value-select">
                                                                    <select class="form-control edit-select-style selectOptionEdit disabled" id="hair_color" name="hair_color">
                                                                        @foreach (Helper::getColoursByAttr('hair') as $key => $colour)
                                                                        <option value ="{{$colour->id}}" @if ($user->userDetails->hair_color == $colour->id ) selected @endif>{{$colour->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Hair Length</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('hair_lenth')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            @if($hairLenths)
                                                                <div class="edit-value-select">
                                                                    <select class="form-control edit-select-style selectOptionEdit disabled" id="hair_lenth" name="hair_lenth">
                                                                        @foreach ($hairLenths as $key => $hairLenth)
                                                                        <option value="{{$hairLenth->id}}" @if ($user->userDetails->hair_lenth == $hairLenth->id ) selected @endif>{{$hairLenth->hair_lenth}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Weight</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('weight')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-select">
                                                                <select class="form-control edit-select-style selectOptionEdit disabled" id="weight" name="weight">
                                                                    @if ($weights)
                                                                    @foreach ($weights as $weight)
                                                                        <option value="{{$weight->weight}}" @if (isset($user) && $user->userDetails->weight == $weight->weight) selected @endif>{{Helper::kgToLb($weight->weight)}} lbs / {{$weight->weight}} kg</option>
                                                                    @endforeach
                                            
                                                                @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Height</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('height')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-select">
                                                                <select class="form-control edit-select-style selectOptionEdit disabled" id="height" name="height">
                                                                    @if(count($heights) > 0)
                                                                        @foreach ($heights as $data)
                                                                            <option value="{{$data->id}}" @if (isset($user) && $user->userDetails->height == $data->id) selected @endif>{{$data->height}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Ethnicity</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('ethnicity')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-select">
                                                                <select class="form-control edit-select-style selectOptionEdit disabled" id="ethnicity" name="ethnicity">
                                                                    @if ($ethnicities)
                                                                        @foreach ($ethnicities as $ethnicity)
                                                                        <option value="{{$ethnicity->id}}" @if (isset($user) && $user->userDetails->ethnicity == $ethnicity->id) selected @endif>{{$ethnicity->name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Shoe Size</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('shoe_size')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-select">
                                                                <select class="form-control edit-select-style selectOptionEdit disabled" id="shoe_size" name="shoe_size">
                                                                    @if(Helper::shoeSizeArr())
                                                                        @foreach (Helper::shoeSizeArr() as $data)
                                                                            <option value="{{$data}}" @if (isset($user) && $user->userDetails->shoe_size == $data) selected @endif>{{$data}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Waist</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('waist')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-select">
                                                                <select class="form-control edit-select-style selectOptionEdit disabled" id="waist" name="waist">
                                                                    @if(Helper::getSizeByAttr('waist'))
                                                                        @foreach (Helper::getSizeByAttr('waist') as $data)
                                                                            <option value="{{$data->id}}" @if (isset($user) && $user->userDetails->waist == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}} /{{$data->size}}cm</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Chest/Bust</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('chest')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-select">
                                                                <select class="form-control edit-select-style selectOptionEdit disabled" id="chest" name="chest">
                                                                    @if(Helper::getSizeByAttr('chest'))
                                                                        @foreach (Helper::getSizeByAttr('chest') as $data)
                                                                            <option value="{{$data->id}}" @if (isset($user) && $user->userDetails->chest == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}} /{{$data->size}}cm</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Dress/Jacket Size</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('dress_size')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-select">
                                                                <select class="form-control edit-select-style selectOptionEdit disabled" id="dress_size" name="dress_size">
                                                                    
                                                                    @foreach(range(0, 60) as $dressSize)
                                                                        <option value="{{$dressSize}}" @if (isset($user) && $user->userDetails->dress_size == $dressSize) selected @endif>{{$dressSize}}</option>
                                                                    @endforeach
                                                            
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Hip/Inseam</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('hip')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-select">
                                                                <select class="form-control edit-select-style selectOptionEdit disabled" id="hip" name="hip">
                                                                    @if(Helper::getSizeByAttr('hip'))
                                                                        @foreach (Helper::getSizeByAttr('hip') as $data)
                                                                            <option value="{{$data->id}}" @if (isset($user) && $user->userDetails->hip == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}} /{{$data->size}}cm</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="accordion-item">
                                <h2 class="accordion-header" id="infoThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Exprience
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="infoThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="info-edit-wrap d-flex align-items-center">
                                            <div class="info-edit-lft">
                                                <h4>Exprience</h4>
                                            </div>
                                            <div class="info-edit-rgt">
                                                <div class="info-edit-box d-flex align-items-center">
                                                    <div class="info-edit-icon" onclick="enabledOption('exprience')"><i class="fas fa-pencil-alt"></i></div>
                                                    <div class="info-edit-value">
                                                        <div class="edit-value-select">
                                                            <select class="form-control edit-select-style selectOptionEdit disabled" name="exprience" id="exprience">
                                                                @if(Helper::experienceArr())
                                                                        @foreach (Helper::experienceArr() as $key => $data)
                                                                            <option value="{{$key}}" @if (isset($user) && $user->userDetails->exceprience == $key) selected @endif>{{$data}}</option>
                                                                        @endforeach
                                                                    @endif
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
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Compensation
                                    </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="infoFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="info-edit-wrap d-flex align-items-center">
                                                <div class="info-edit-lft">
                                                    <h4>Compensation</h4>
                                                </div>
                                                <div class="info-edit-rgt">
                                                    <div class="info-edit-box d-flex align-items-center">
                                                        <div class="info-edit-icon" onclick="enabledOption('compensation')"><i class="fas fa-pencil-alt"></i></div>
                                                        <div class="info-edit-value">
                                                            <div class="edit-value-select">
                                                                <select class="form-control edit-select-style selectOptionEdit disabled" id="compensation" name="compensation">
                                                                    @if(Helper::compensationArr())
                                                                    @foreach (Helper::compensationArr() as $key => $data)
                                                                        <option value="{{$key}}" @if (isset($user) && $user->userDetails->compensation == $key) selected @endif>{{$data}}</option>
                                                                    @endforeach
                                                                @endif
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
                                    <h2 class="accordion-header" id="infoFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Interested In
                                    </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="infoFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="info-edit-Interested">
                                            <ul class="d-flex flex-wrap">
                                                @if(Helper::interestedArr())
                                                    @foreach (Helper::interestedArr() as $key => $data)
                                                    <li class="checkbox">
                                                        @php 
                                                            $checked = '';
                                                            if($user->userDetails->interested != '' || $user->userDetails->interested != 'null'){
                                                                $interestArr = explode(',',$user->userDetails->interested);
                                                                if(in_array($key,$interestArr)){
                                                                    $checked = 'checked';
                                                                }
                                                            }
                                                        @endphp
                                                        <input type="checkbox" onclick="enabledOption({{$key}})" id="{{$key}}" value="{{$key}}" name="interested[]" {{$checked}}>
                                                        <label for="{{$key}}">{{$data}}</label>
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
                            </div>
                        </div>
                    </form>
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
                                        <div class="img-video-up d-flex">
                                            <ul class="img-video-btn-wrap d-flex">
                                                <li>
                                                    <input type="file" id="img_upload">
                                                    <label for="img_upload" class="img-video-btn" {{-- data-bs-toggle="modal" data-bs-target="#imgUp" --}}><i class="fas fa-image"></i>image upoload</label>
                                                </li>
                                                <li>
                                                    <input type="file" id="vid-up">
                                                    <label for="vid-up" class="img-video-btn"><i class="fas fa-video"></i>video upoload</label>
                                                </li>
                                            </ul>
                                            <div class="src-select-wrap">
                                                <select class="form-control src-select-style selectOption2">
                                                    <option>Recent</option>
                                                    <option>Popular</option>
                                                    <option>Most like</option>
                                                </select>
                                            </div>
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
                                                        <div class="model-photos-gallery add-dlt">
                                                            <a class="gal-img" data-fancybox="img-gallery" href="{{url('img/user/images/'.$image->image)}}"><img class="img-block" src="{{url('img/user/images/'.$image->image)}}">
                                                            </a>
                                                            <span class="delete-btn"><i class="fas fa-trash-alt"></i></span>
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
                                                <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                                                    <div class="model-video-gallery">
                                                        <a class="gal-video add-dlt" data-fancybox="video-gallery" data-fancybox-type="iframe" href="https://youtu.be/UzHHNVtiRMc">
                                                            <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                                            <span class="video-play-btn"><i class="fab fa-youtube"></i></span>
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
                                                    <div class="model-video-gallery">
                                                        <a class="gal-video add-dlt" data-fancybox="video-gallery" data-fancybox-type="iframe" href="https://youtu.be/UzHHNVtiRMc">
                                                            <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                                            <span class="video-play-btn"><i class="fab fa-youtube"></i></span>
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
                                                    <div class="model-video-gallery">
                                                        <a class="gal-video add-dlt" data-fancybox="video-gallery" data-fancybox-type="iframe" href="https://youtu.be/UzHHNVtiRMc">
                                                            <img class="img-block" src="{{url('images/feutered-model/model1.jpg')}}" alt="">
                                                            <span class="video-play-btn"><i class="fab fa-youtube"></i></span>
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
                                    </div>
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
                        <select class="form-control select-underline selectOption" name="category">
                            <option value="">Select Catagory</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="txtare-wrap">
                        <textarea class="form-control txtare-style" name="" id="" rows="3" placeholder="Write Copyright" name="copyright"></textarea>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="txtare-wrap">
                        <textarea class="form-control txtare-style" name="" id="" rows="3" placeholder="Write Description" name="description"></textarea>
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
                width: 160,
                height: 160,
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
                height: 1000,
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
            }
        },
    });

</script>
@endpush