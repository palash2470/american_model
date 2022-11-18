@extends('layouts.app')
@section('content')
<section class="galleries">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    @if ( strstr( strtolower($category->name), 'child' ) )
                    <h3><span class="color-c">C</span><span class="color-h">h</span><span class="color-i">i</span><span class="color-l">l</span><span class="color-d">d</span> Models & Actors</h3>
                    @else
                        <h3>{{$category->name}}</h3>
                    @endif

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="sticky-search-left">
                    <div class="mobile-lft-filter">
                        <button type="button" class="mobile-filter mob_filt">search</button>
                    </div>
                    <div class="model-search-box mob_filt_wrap">
                        <h4>Search Options</h4>
                        <form method="get" action="" id="model_filter_frm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="src-input-wrap">
                                        <label>name</label>
                                        <input type="text" class="form-control src-input-style" name="name" value="{{$request->name}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="src-input-wrap">
                                        <label>Location</label>
                                        <input type="text" class="form-control src-input-style" name="city" value="{{$request->city}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="src-input-wrap">
                                        <label>id</label>
                                        <input type="text" class="form-control src-input-style" name="id" value="{{$request->id}}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Age</label>
                                        <div class="price-range-slider">
                                            <div id="age_slider_range" class="range-bar"></div>
                                            <p class="range-value">
                                              <input type="text" id="age" readonly>
                                            </p>
                                        </div>
                                        <input type="hidden" name="min_age" value="" id="min_age">
                                        <input type="hidden" name="max_age" value="" id="max_age">
                                        {{-- <select class="form-control src-select-style selectOption2" name="age">
                                            <option value="">Select Age</option>
                                            @foreach(range(1, 60) as $age)
                                                <option value="{{$age}}" @if (isset($request) && $request->age == $age) selected @endif>{{$age}}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Gender</label>
                                        <select class="form-control src-select-style selectOption2" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="1" @if (isset($request) && $request->gender == '1') selected @endif>Male</option>
                                            <option value="2" @if (isset($request) && $request->gender == '2') selected @endif>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Height</label>
                                        <select class="form-control src-select-style selectOption2" name="height">
                                            <option value="">Select height</option>
                                        @if(Helper::getSizeByAttr('height'))
                                            @foreach (Helper::getSizeByAttr('height') as $data)
                                                <option value="{{$data->id}}" @if (isset($request) && $request->height == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}}{{--  /{{$data->size}}cm --}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Weight</label>
                                        <div class="price-range-slider">
                                            <div id="weight_slider_range" class="range-bar"></div>
                                            <p class="range-value">
                                              <input type="text" id="weight_filter" readonly>
                                            </p>
                                        </div>
                                        <input type="hidden" name="min_weight" value="" id="min_weight">
                                        <input type="hidden" name="max_weight" value="" id="max_weight">
                                        {{-- <select class="form-control src-select-style selectOption2" name="weight">
                                            <option value="">Select weight</option>
                                            @if ($weights)
                                                @foreach ($weights as $weight)
                                                    <option value="{{$weight->weight}}" @if (isset($request) && $request->weight == $weight->weight) selected @endif>{{Helper::kgToLb($weight->weight)}} lbs </option>
                                                @endforeach
                                            @endif
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Bust</label>
                                        <select class="form-control src-select-style selectOption2" name="chest">
                                            <option value="">Please select Bust</option>
                                            @if(Helper::getSizeByAttr('chest'))
                                                @foreach (Helper::getSizeByAttr('chest') as $data)
                                                    <option value="{{$data->id}}" @if (isset($request) && $request->chest == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}} {{-- /{{$data->size}}cm --}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Waist</label>
                                        <select class="form-control src-select-style selectOption2" name="waist">
                                            <option value="">Select waist </option>
                                            @if(Helper::getSizeByAttr('waist'))
                                                @foreach (Helper::getSizeByAttr('waist') as $data)
                                                    <option value="{{$data->id}}" @if (isset($request) && $request->waist == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}}{{--  /{{$data->size}}cm --}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Hips</label>
                                        <select class="form-control src-select-style selectOption2" name="hip">
                                            <option value="">Select hip/inseam</option>
                                            @if(Helper::getSizeByAttr('hip'))
                                                @foreach (Helper::getSizeByAttr('hip') as $data)
                                                    <option value="{{$data->id}}" @if (isset($request) && $request->hip == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}} {{-- /{{$data->size}}cm --}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Eyes</label>
                                        <select class="form-control src-select-style selectOption2" name="eye_color">
                                            <option value="">Select Eye</option>
                                            @if(Helper::getColoursByAttr('eye'))
                                                @foreach (Helper::getColoursByAttr('eye') as $colour)
                                                    <option value="{{$colour->id}}"  @if (isset($request) && $request->eye_color == $colour->id) selected @endif>{{$colour->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Hair</label>
                                        <select class="form-control src-select-style selectOption2" name="hair_color">
                                            <option value="">Select Hair</option>
                                            @if(Helper::getColoursByAttr('hair'))
                                                @foreach (Helper::getColoursByAttr('hair') as $colour)
                                                    <option value="{{$colour->id}}" @if (isset($request) && $request->hair_color == $colour->id) selected @endif>{{$colour->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Skin</label>
                                        <select class="form-control src-select-style selectOption2" name="skin_color">
                                            <option value="">Select Skin</option>
                                            @if(Helper::getColoursByAttr('skin'))
                                                @foreach (Helper::getColoursByAttr('skin') as $colour)
                                                    <option value="{{$colour->id}}" @if (isset($request) && $request->skin_color == $colour->id) selected @endif>{{$colour->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Dress</label>
                                        <select class="form-control src-select-style selectOption2" name="dress_size">
                                            <option value="">Please select dress/jacket size</option>
                                            @foreach(range(1, 60) as $dressSize)
                                                <option value="{{$dressSize}}" @if (isset($request) && $request->dress_size == $dressSize) selected @endif>{{$dressSize}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Shoe</label>
                                        <select class="form-control src-select-style selectOption2" name="shoe_size">
                                            <option value="">Please select shoe size</option>
                                            @if(Helper::shoeSizeArr())
                                                @foreach (Helper::shoeSizeArr() as $data)
                                                    <option value="{{$data}}" @if (isset($request) && $request->shoe_size == $data) selected @endif>{{$data}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Language</label>
                                        <select class="form-control src-select-style selectOption2" name="language">
                                            <option value="">Language</option>
                                            @if(Helper::languageArr())
                                                @foreach (Helper::languageArr() as $key => $data)
                                                    <option value="{{$key}}" @if (isset($request) && $request->language == $key) selected @endif>{{$data}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                    <div class="src-select-wrap">
                                        <label>Ethnicity</label>
                                        <select class="form-control src-select-style selectOption2" name="ethnicity">
                                            <option value="">Select ethnicity</option>
                                            @if ($ethnicities)
                                                @foreach ($ethnicities as $ethnicity)
                                                <option value="{{$ethnicity->id}}" @if (isset($request) && $request->ethnicity == $ethnicity->id) selected @endif>{{$ethnicity->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="applysrc-btn-wrap">
                                                <button type="button" class="reset-btn" id="resetbtn">Reset</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                                            <div class="applysrc-btn-wrap">
                                                <button type="submit" class="applysrc-btn">Apply Filters</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                <div class="search-head">
                    <h4>Search Results <span class="search-results">
                        Showing
                        @if ($users->firstItem())
                            {{ $users->firstItem() }} to {{ $users->lastItem() }}
                        @else
                            {{ $users->count() }}
                        @endif
                        of {{ $users->total() }} results
                    </span></h4>
                    <div class="pagination-wrap">{{ $users->appends($_GET)->links() }}</div>
                </div>

                <div class="row g-4">
                    @php
                        $index = 0;
                    @endphp
                    @forelse ($users as $key => $user)
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            @php
                               if ($key % 3 == 0) {
                                    $index = 0;
                                }
                                $index++;
                            @endphp
                            <div class="model-box-wrap wow fadeInUp delay{{$index}}">
                                <div class="model-box-design hover-efects">
                                    <span class="model-box-img position-relative hover-ly">
                                        <img class="img-block" src="{{url('img/user/profile-image/'.$user->userDetails->profile_image)}}" alt="">
                                        @if(isset($user->userPlan->userPremiumMemberPlanDetails) && $user->userPlan->userPremiumMemberPlanDetails->value == 'yes')
                                            <div class="add-membership-tag">
                                                <p>Premium Member</p>
                                            </div>
                                        @endif
                                        <div class="hover-efects-size">
                                            <ul class="d-flex flex-wrap justify-content-center">
                                                <li><h5>Height</h5><p>{{@$user->userDetails->getHeight->size}}</p></li>
                                                <li><h5>Weight</h5><p>{{@$user->userDetails->weight}}</p></li>
                                                <li><h5>Bust</h5><p>{{@$user->userDetails->getChest->size}}</p></li>
                                                <li><h5>Waist</h5><p>{{@$user->userDetails->getWaist->size}}</p></li>
                                                <li><h5>Hips</h5><p>{{@$user->userDetails->getHips->size}}</p></li>
                                                <li><h5>Shoe</h5><p>{{@$user->userDetails->shoe_size}}</p></li>
                                                <li><h5>Dress</h5><p>{{@$user->userDetails->dress_size}}</p></li>
                                                <li><h5>Hair</h5><p>{{Helper::getColoursById($user->userDetails->hair_color)->name}}</p></li>
                                            </ul>
                                        </div>
                                        <div class="hover-efects-social-link">
                                            <ul>
                                                <li><a target="_blank" href="{{@$user->userDetails->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a target="_blank" href="{{@$user->userDetails->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                                                <li><a target="_blank" href="{{@$user->userDetails->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                                                <li><a target="_blank" href="{{@$user->userDetails->linkedin_link}}"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="model-box-text">
                                        <h4><a href="{{route('user.view.profile',[$user->category->slug,$user->name_slug])}}">{{$user->name}}</a></h4>
                                        <div class="same_height_model_text">
                                            <p>American model ID:<span class="info-model">{{$user->model_id}}</span></p>
                                            <p>Nationality:<span class="info-model">{{$user->userDetails->getCountry->name}}</span></p>
                                            <p>Location:<span class="info-model">{{$user->userDetails->city_name}}, {{@$user->userDetails->getState->name}}</span></p>
                                            <p>Language:<span class="info-model">English</span></p>
                                        </div>
                                        <ul class="box-view-more d-flex justify-content-end">
                                            <li><a href="{{route('user.view.profile',[$category->slug,$user->name_slug])}}">view profile</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="col-12">
                        <div class="not-found-text">
                            <i class="fas fa-exclamation-triangle"></i>
                            <p>no data found</p>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="pagination-wrap">{{ $users->appends($_GET)->links() }}</div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
$(document).on('click','#resetbtn',function(){
    //alert('dsfdsf');
    $('#model_filter_frm').trigger("reset");
    window.location.replace('{{route('user.search',$category->slug)}}');
})
$(document).ready(function(){
    //Start Age range filter
    var min_age = "{{$request->min_age ? $request->min_age : 15}}";
    var max_age = "{{$request->max_age ? $request->max_age : 40}}";
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
    //Start Weight range filter
    var min_weight = "{{$request->min_weight ? $request->min_weight : $weights->min('weight')}}";
    var max_weight = "{{$request->max_weight ? $request->max_weight : $weights->max('weight')}}";
    $( "#weight_slider_range" ).slider({
        range: true,
        min: 10,
        max: 120,
        values: [ min_weight, max_weight ],
        slide: function( event, ui ) {
            $( "#weight_filter" ).val(ui.values[ 0 ]+" Lbs  - " + ui.values[ 1 ]+" Lbs" );
            $('#min_weight').val(ui.values[ 0 ]);
            $('#max_weight').val(ui.values[ 1 ]);
        }
    });
    $( "#weight_filter" ).val( $( "#weight_slider_range" ).slider( "values", 0 ) +
    " Lbs - " + $( "#weight_slider_range" ).slider( "values", 1 )+" Lbs" );

    $('#min_weight').val($( "#weight_slider_range" ).slider( "values", 0 ));
    $('#max_weight').val($( "#weight_slider_range" ).slider( "values", 1 ));
    //End Weight range filter
});
</script>
@endpush
