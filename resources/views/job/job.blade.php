@extends('layouts.app')
@section('content')
<section class="blog-page-sec bg-light-grey">
    <form action="{{route('job.search')}}" method="post" id="search_form">
        @csrf
        <input type="hidden" name="jobCategory" id="jobCategory" value="{{isset($data)?$data['jobCategory']:''}}" />
    </form>
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="sec-head-color position-relative create-job-btn-add">
                    <h3>
                        <span class="position-relative create-job-btn-add">CASTING CALLS
                            @if (Auth::check() && @Auth::user()->category->slug != 'casting-director')
                            {{-- <button type="button" class="createnew-job" id="post_job">Post a job</button> --}}
                            @else
                                <button type="button" class="createnew-job" id="post_job">Post Casting Call</button> 
                            @endif
                        </span>
                    </h3>
                    
                    
                </div>
            </div>
            
            {{-- <div class="col-12">
                <div class="job-banner">
                    <img class="img-block" src="images/jon-banner.jpg" alt="">
                </div>
            </div> --}}
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="sec-head-color-text pb-md-2">
                    <p>Search for open casting calls in your area. Find modeling jobs, acting auditions, and voice-over gigs. Major brands are constantly seeking male and female talent, including children and adults of all ages to appear in their commercials and print ads. So if you haven't yet, be sure to register now and become a member of our site so you can apply for auditions.</p>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-3 col-md-4 col-sm-12 col-12">
                <form method="get" id="job_filter_frm">
                    <div class="casting-filter-wrap mobile-casting mobile_casting">
                        <button type="button" class="mobile-casting-hide casting_hide"><i class="fas fa-times"></i></button>
                        <div class="casting-filter-mobile">
                            <div class="casting-filter">
                                <h4 class="casting-filter-head">Keyword</h4>
                                <div class="src-input-wrap">
                                    <input type="text" class="form-control src-input-style" name="keyword" placeholder="Keyword" value="{{@$request->keyword}}">
                                </div>
                            </div>
                            <div class="casting-filter">
                                <h4 class="casting-filter-head">Category</h4>
                                <div class="checkbox ps-1">
                                    <input type="checkbox" class="" name='category_all' id="cat_all" value='all' <?=isset($data['jobCategory'])?($data['jobCategory'] === 'all'?'checked':''):""?>>
                                    <label for="cat_all">All</label>
                                </div>
                                @foreach ($category as $categoryKey => $categoryValue )
                                <div class="checkbox ps-1">
                                    <input type="checkbox" class="job_cat" name='category[]' id="{{$categoryValue->id}}" value="{{$categoryValue->id}}" @if(isset($request->category) && in_array($categoryValue->id, $request->category)) {{'checked'}} @endif>
                                    <label for="{{$categoryValue->id}}">{{$categoryValue->name}}</label>
                                   {{--  {{dd($request->category)}} --}}
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="casting-filter">
                                <h4 class="casting-filter-head">Location</h4>
                                <input type="hidden" name="country_id" id="country-dd" value="231">
                                <input type="hidden" id="selected_state" value="@if(isset($request)){{$request->state_id}}@endif">
                                <div class="src-select-wrap">
                                    <label>State</label>
                                    <select class="form-control src-select-style selectOption2" name="state_id" id="state-dd">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="src-select-wrap">
                                    <input type="hidden" id="selected_city" value="@if(isset($request)){{$request->city_id}}@endif">
                                    <label>City</label>
                                    <select class="form-control src-select-style selectOption2" name="city_id" id="city-dd">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                {{-- <div class="src-input-wrap">
                                    <label>Zip code</label>
                                    <input type="text" class="form-control src-input-style" placeholder="Zip code">
                                </div> --}}
                                
                            </div>
                            <div class="casting-filter">
                                <h4 class="casting-filter-head">Age</h4>
                                <div class="src-input-wrap">
                                    <label>Age</label>
                                    <div class="price-range-slider">  
                                        <div id="slider-range" class="range-bar"></div>
                                        <p class="range-value">
                                        <input type="text" id="age" name="age" readonly>
                                        </p>                                        
                                    </div>
                                    <input type="hidden" name="min_age" value="" id="min_age">
                                    <input type="hidden" name="max_age" value="" id="max_age">
                                </div>
                            </div>
                        </div>
                        <div class="casting-filter mobile-apply-wrap">
                            <div class="col-12">
                                <div class="row g-2">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="applysrc-btn-wrap">
                                            <button type="button" class="reset-btn" id="resetbtn">Reset</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="applysrc-btn-wrap">
                                            <button type="submit" class="applysrc-btn">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                <div class="row justify-content-md-end justify-content-between">
                    <div class="col-auto">
                        <button type="button" class="cast-filter-btn mobile_casting_menu d-md-none">filter job</button>
                    </div>
                    <div class="col-auto">
                        <ul class="grid-btn-wrap d-flex">
                            <li><button type="button" class="grid-btn btn-list active"><i class="fas fa-list"></i>list</button></li>
                            <li><button type="button" class="grid-btn btn-grid"><i class="fas fa-th"></i>grid</button></li>
                        </ul>
                    </div>
                </div>
                <!-- list-view -->
                <div class="grid-container list-view">
                    <div class="row g-3 mt-0">
                        @forelse ($job as $jobKey => $jobValue)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 list-design">
                                <div class="job-listing-wrap new-job-design-list">
                                    <div class="row g-3">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <div class="job-thumb relative">
                                                <a href="{{url('job/details').'/'.$jobValue->id}}">
                                                    <img class="img-block" src="{{isset($jobValue->images[0]) ? url('images/job').'/'.$jobValue->images[0]->image : url('images/no-image.jpg')}}" alt="">
                                                </a>
                                                <div class="job-post-date">
                                                    <span class="job-post-clock"><img class="img-block" src="{{ url('images/icon-time.png') }}"></span>
                                                    <p><small>ends</small></p>
                                                    @php 
                                                        $now = \Carbon\Carbon::now();
                                                        //$end_date =  \Carbon\Carbon::parse($jobValue->toJobDate);
                                                        $end_date = $jobValue->toJobDate." 23:59";
                                                        $date = DateTime::createFromFormat("Y-m-d H:i",$end_date);
                                                        //echo $date;die;
                                                        $date2 = new DateTime();

                                                    @endphp
                                                    <p>{{$date2->diff($date)->format("%a d %H h %i m")}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                            <div class="job-content">
                                                <a href="{{url('job/details').'/'.$jobValue->id}}" class="job-title">{{$jobValue->title}}</a>
                                                <h5><strong>Casting Number: </strong>{{$jobValue->jobReference}}</h5>
                                                <div class="row g-lg-2 g-0">
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="job-text">
                                                            <p>Gender : <strong>{{ucwords($jobValue->gender)}}</strong></p>
                                                            <p>Age : <strong>{{$jobValue->fromAge}} years - {{$jobValue->toAge}} years</strong></p>
                                                            <p>Category : <strong>{{@$jobValue->getJobCategory->name}}</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                                        <div class="job-text">
                                                            <p>Payment : <strong>{{$jobValue->compensation}}</strong></p>
                                                            <p>Union : <strong>{{$jobValue->union == 'yes' ? $jobValue->union_name : 'No'}}</strong></p>
                                                            <p>Role Type : <strong>{{ucwords(@$jobValue->role)}}</strong></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-0">
                                                        <div class="job-text">
                                                            <p>Location : <strong>{{@$jobValue->getCity->city_name}},{{@$jobValue->getState->name}}</strong></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="job-btn-cover">
                                                    <a href="{{url('job/details').'/'.$jobValue->id}}" class="job-read-more">Read More</a>
                                                </div>
                                            </div>
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
                        <div class="pagination-wrap">{{ $job->appends($_GET)->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- categorySearch --}}
@push('scripts')
<script>
$(document).ready(function(){
    $(document).on('change','.categorySearch', function () {
        if ($(this).is(":checked")) {
            $("#jobCategory").val($(this).val());
        } else {
            $("#jobCategory").val('');
        }
        $("#search_form").submit();
    });
    $(document).on('click','#post_job',function(){
        //console.log('sdfds');
        var check_login = '{{Auth::check()}}';
        if(check_login == ''){
            {{Session::put('url_back', url()->current())}}
            window.location.href = '{{route('login')}}';
        }else{
            var user_type = '{{@Auth::user()->category->slug}}';
            if(user_type == 'casting-director'){
                window.location.href = '{{route('job.post')}}';
            }else{
                //toastr.options.timeOut = 10000;
                toastr.options = {
                    "positionClass": "toast-top-center",
                    "timeOut": 10000,
                }
                toastr.info('You have a logged in {{@Auth::user()->category->name}} User.To post a job <a style="text-decoration: underline" href="{{route('logout')}}">login/signup</a> as a casting user.');
                
            }
            //console.log(user_type);
        }
    });
    //filter check all category
    $(document).on('click','#cat_all',function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    var total_chebox = $('input.job_cat').length;
    var checked_count = $('input.job_cat:checked').length;
    if(total_chebox === checked_count){
        $('#cat_all').prop('checked', true);
    }else{
        $('#cat_all').prop('checked', false);
    }
    $('.job_cat').on('change', function(){
        var total_chebox = $('input.job_cat').length;
        var checked_count = $('input.job_cat:checked').length;
        if(total_chebox === checked_count){
            $('#cat_all').prop('checked', true);
        }else{
            $('#cat_all').prop('checked', false);
        }
    });
    //end check all category
    
});
$(document).on('click','#resetbtn',function(){
    $('#job_filter_frm').trigger("reset");
    window.location.replace('{{route('job')}}');
})
</script>
<script>
    $(document).on('click', '.mobile_casting_menu', function(){
        $('.mobile_casting').toggleClass('show_casting');
        $('body').addClass('filteroverlay').append(`
            <div class="modal-backdrop fade show"></div>
        `);
    });
    $(document).on('click', '.casting_hide', function(){
        $('.mobile_casting').removeClass('show_casting');
        $('body').removeClass('filteroverlay').find('.modal-backdrop').hide();
    });
</script>

<script>
    $(function() {
       
        //Start Age range filter
        var min_age = "{{$request->min_age ? $request->min_age : 15}}";
        var max_age = "{{$request->max_age ? $request->max_age : 40}}";
        $( "#slider-range" ).slider({
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
        $( "#age" ).val( $( "#slider-range" ).slider( "values", 0 ) +
        " Years - " + $( "#slider-range" ).slider( "values", 1 )+" Years" );

        $('#min_age').val($( "#slider-range" ).slider( "values", 0 ));
        $('#max_age').val($( "#slider-range" ).slider( "values", 1 ));
    });
</script>

<script>
    function showList(e) {
        var $gridCont = $('.grid-container');
        e.preventDefault();
        //$gridCont.hasClass('list-view') ? $gridCont.removeClass('list-view') : $gridCont.addClass('list-view');
        $gridCont.addClass('list-view');
    }
    function gridList(e) {
        var $gridCont = $('.grid-container')
        e.preventDefault();
        $gridCont.removeClass('list-view');
    }
           
    $(document).on('click', '.btn-grid', gridList);
    $(document).on('click', '.btn-list', showList);

    $(document).on('click', '.grid-btn', function(){
        $('.grid-btn').removeClass('active');
        $(this).addClass('active');
    });
</script>

@endpush
