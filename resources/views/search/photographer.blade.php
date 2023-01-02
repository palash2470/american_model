@extends('layouts.app')
@section('content')
<section class="galleries">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>{{$category->name}}</h3>
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
                                        {{-- <div class="hover-efects-size">
                                            <h5>Lorem ipsum</h5>
                                            <p>dolor sit amet consectetur adipisicing elit.</p>
                                        </div> --}}
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
                                            <p>Available for:<span class="info-model">Commercial</span></p>
                                            <p>City:<span class="info-model">{{$user->userDetails->city_name}}</span></p>
                                            <p>State:<span class="info-model">{{@$user->userDetails->getState->name}}</span></p>
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
                            <p>Sorry, there doesn't appear to be any matching results.</p>
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
        max: 80,
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
</script>
@endpush
