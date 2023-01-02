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
                <div class="sec-head-color-text">
                    <p>Search for open casting calls in your area. Find modeling jobs, acting auditions, and voice-over gigs. Major brands are constantly seeking male and female talent, including children and adults of all ages to appear in their commercials and print ads. So if you haven't yet, be sure to register now and become a member of our site so you can apply for auditions.</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="job-list-lft-wrap">
                    <ul class="jab-cata-list d-flex flex-wrap justify-content-center">
                        <li><h4>Job Categories</h4></li>
                        <li class="checkbox">
                            <input type="checkbox" class="categorySearch" name='category' id="chall" value='all' <?=isset($data['jobCategory'])?($data['jobCategory'] === 'all'?'checked':''):""?>>
                            <label for="chall">All Categories</label>
                        </li>
                        @foreach ($category as $categoryKey => $categoryValue )
                            <li class="checkbox">
                                <input type="checkbox" class="categorySearch" name='category' id="{{$categoryValue->id}}" value="{{$categoryValue->id}}" <?=isset($data['jobCategory'])?($data['jobCategory'] == $categoryValue->id?'checked':''):""?>>
                                <label for="{{$categoryValue->id}}">{{$categoryValue->name}}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @foreach ($job as $jobKey => $jobValue)
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="job-listing-wrap">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                                <div class="job-thumb relative">
                                    <a href="{{url('job/details').'/'.$jobValue->id}}">
                                        <img class="img-block" src="{{isset($jobValue->images[0]) ? url('images/job').'/'.$jobValue->images[0]->image : url('images/no-image.jpg')}}" alt="">
                                    </a>
                                    <div class="job-post-date">
                                        <span class="job-post-clock"><img class="img-block" src="{{ url('images/icon-time.png') }}"></span>
                                        <p><small>ends</small></p>
                                        {{-- <p>2d 5h 30m</p> --}}
                                        @php 
                                            $now = \Carbon\Carbon::now();
                                            //$end_date =  \Carbon\Carbon::parse($jobValue->toJobDate);
                                            $end_date = $jobValue->toJobDate." 23:59";
                                            $date = DateTime::createFromFormat("Y-m-d H:i",$end_date);
                                            //echo $date;die;
                                            $date2 = new DateTime();

                                        @endphp
                                        {{-- <p>{{$date2->diff($date)->format("%a days and %H hours and %i minutes and %s seconds")}}</p> --}}
                                        <p>{{$date2->diff($date)->format("%a d %H h %i m")}}</p>
                                    </div>
                                    {{-- <span class="job-post-date">{{date('d M Y', strtotime($jobValue->created_at));}}</span> --}}
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                                <div class="job-content">
                                    <a href="{{url('job/details').'/'.$jobValue->id}}" class="job-title">{{$jobValue->title}}</a>
                                    <h5><strong>Casting Number: </strong>{{$jobValue->jobReference}} {{ucwords($jobValue->gender)}} / {{$jobValue->fromAge}} years - {{$jobValue->toAge}} years</h5>
                                    <div class="job-text">
                                        <p><strong>Seeking:</strong> {{$jobValue->seeking}}</p>
                                        <p><strong>Category :</strong> {{@$jobValue->getJobCategory->name}}</p>
                                        <p><strong>Location :</strong>
                                            {{@$jobValue->getCity->city_name}},{{@$jobValue->getState->name}}
                                            {{-- @foreach ($jobValue->getJobLocations as $jobLocationKey => $jobLocationValue )
                                                @if ($jobLocationKey === 0)
                                                    {{$jobLocationValue->getCityName->city_name}}
                                                @else
                                                    , {{$jobLocationValue->getCityName->city_name}}
                                                @endif
                                            @endforeach --}}
                                        </p>
                                        
                                        <p><strong>Agency/Director:</strong> {{$jobValue->user->name}}</p>
                                        <p class="mt-2"><strong>Description :</strong> {{substr($jobValue->jobDescription, 0, 80).'...'}}</p>
                                    </div>
                                    <div class="job-btn-cover">
                                        <a href="{{url('job/details').'/'.$jobValue->id}}" class="job-read-more">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="pagination-wrap">{{ $job->appends($_GET)->links() }}</div>
        </div>
        {{-- <div class="job-list-wrap d-flex flex-wrap">
            <div class="job-list-lft">
                <div class="job-list-lft-wrap">
                    <h4>Job Categories</h4>
                    <ul class="jab-cata-list">
                        <li class="checkbox">
                            <input type="checkbox" class="categorySearch" name='category' id="chall" value='all' <?=isset($data['jobCategory'])?($data['jobCategory'] === 'all'?'checked':''):""?>>
                            <label for="chall">All Categories</label>
                        </li>
                        @foreach ($category as $categoryKey => $categoryValue )
                            <li class="checkbox">
                                <input type="checkbox" class="categorySearch" name='category' id="{{$categoryValue->id}}" value="{{$categoryValue->id}}" <?=isset($data['jobCategory'])?($data['jobCategory'] == $categoryValue->id?'checked':''):""?>>
                                <label for="{{$categoryValue->id}}">{{$categoryValue->name}}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="job-list-rgt">
                
            </div>
        </div> --}}
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

});
</script>
@endpush
