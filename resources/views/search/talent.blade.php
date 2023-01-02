@extends('layouts.app')
@section('content')
<section class="galleries">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Talent Directory</h3>
                </div>
            </div>
            <form action="{{route('search.talent')}}" id="talent_search_form">
                <input type="hidden" name="category_id" id="category_id" value="">
                <input type="hidden" name="state_id" id="state_id" value="">
            </form>
            <div class="col-12">
                <div class="src-tlnt">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="talent-head-text">
                                <h4>Browse our directory</h4>
                            </div>
                        </div>
                       
                        <div class="col-auto">
                            <div class="model-src-list">
                                <ul class="d-flex">
                                    <li>
                                        <select class="form-control selectOptionBdr select_filter" id="select_category">
                                            <option value="">Please select one</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" @if (isset($request) && $request->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                    <li>
                                        <select class="form-control selectOptionBdr select2 select_filter" id="select_state">
                                            <option value="">Please select one</option>
                                            @foreach ($states as $state)
                                                <option value="{{$state->id}}" @if (isset($request) && $request->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6 col-12">
                <div class="ads-wrap mb-2">
                    <div class="ads-wrap-box">
                        <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                        <a class="d-block" href="#"> 
                            <img class="img-block" src="{{url('images/ad-sec2.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
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
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            @php
                               if ($key % 3 == 0) {
                                    $index = 0;
                                }
                                $index++;
                            @endphp
                            <div class="model-box-wrap talents-list-box">
                                <div class="model-box-design">
                                    <span class="model-box-img">
                                        <img class="img-block" src="{{url('img/user/profile-image/'.$user->userDetails->profile_image)}}" alt="">
                                    </span>
                                    <div class="model-box-text">
                                        <h4><a href="{{route('user.view.profile',[$user->userDetails->getCategory->slug,$user->name_slug])}}">{{$user->name}}</a></h4>
                                        <div class="same_height_model_text">
                                            <p>Nationality:<span class="info-model">{{$user->userDetails->getCountry->name}}</span></p>
                                            <p>Location:<span class="info-model">{{$user->userDetails->city_name}}, {{@$user->userDetails->getState->name}}</span></p>
                                        </div>
                                        <ul class="box-view-more d-flex justify-content-end">
                                            <li><a href="{{route('user.view.profile',[$user->userDetails->getCategory->slug,$user->name_slug])}}">view profile</a></li>
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
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="ads-wrap home-rgt-gap">
                    <div class="ads-wrap-box">
                        <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                        <a class="d-block" href="#"> 
                            <img class="img-block" src="{{url('images/ad-sec3.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="ads-wrap home-rgt-gap">
                    <div class="ads-wrap-box">
                        <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                        <a class="d-block" href="#"> 
                            <img class="img-block" src="{{url('images/banner-sections.jpg')}}" alt="">
                            {{-- <img class="img-block" src="{{url('images/feutered-model/model4.jpg')}}" alt=""> --}}
                        </a>
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
    $('.select2').select2({
        //placeholder: 'Select an job location',
    });
});
$(document).on('change','.select_filter',function(){
    $("#loading_container").attr("style", "display:block");
    //console.log($('#select_category').val());
    $('#category_id').val($('#select_category').val());
    $('#state_id').val($('#select_state').val());
    $('#talent_search_form').submit();
});
</script>
@endpush