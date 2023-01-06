@extends('layouts.app')
@section('content')
<section class="blog-page-sec bg-light-grey">
    <div class="container container-custom">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>job Details</h3>
                </div>
            </div>
            @include('flashmessage.flash-message')
            <div class="col-12">
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="casting-gal-wrap">
                            {{-- <p class="gal-head">Reference image for this casting</p> --}}
                            <div class="row">
                                @if (count(@$job->images) > 0)
                                    {{-- @foreach ($job->images as $image) --}}
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                        <div class="casting-gallery">
                                            <a data-fancybox="post-img" href="{{ url('images/job').'/'.$job->images[0]->image }}">
                                                <img class="img-block" src="{{ url('images/job').'/'.$job->images[0]->image }}">
                                            </a>
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
                                    
                                @else
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                        <div class="casting-gallery">
                                            <a data-fancybox="post-img" href="{{ url('images/no-image.jpg') }}">
                                                <img class="img-block" src="{{ url('images/no-image.jpg') }}">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                               {{--  <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="casting-gallery">
                                        <a data-fancybox="post-img" href="{{ url('images/photographer/shoot1.jpg') }}">
                                            <img class="img-block" src="{{ url('images/photographer/shoot1.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="casting-gallery">
                                        <a data-fancybox="post-img" href="{{ url('images/photographer/shoot2.jpg') }}">
                                            <img class="img-block" src="{{ url('images/photographer/shoot2.jpg') }}">
                                        </a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="job-details">
                            <h4>{{Str::ucfirst($job->title)}}</h4>
                            <div class="job-list-desc-lft">
                                <p><strong>Seeking:</strong> {{$job->seeking}}</p>
                                <p><strong>Category:</strong> {{@$job->getJobCategory->name}}</p>
                                <p><strong>Gender:</strong> {{ ucwords($job->gender)}}</p>
                                <p><strong>Height:</strong> {{@$job->height}}</p>
                                <p>
                                    <strong>Job Location:</strong>
                                    {{@$job->getCity->city_name}},{{@$job->getState->name}}
                                   {{--  @foreach ($job->getJobLocations as $jobLocationKey => $jobLocationValue )
                                        @if ($jobLocationKey === 0)
                                            {{$jobLocationValue->getCityName->city_name}}
                                        @else
                                            , {{$jobLocationValue->getCityName->city_name}}
                                        @endif
                                    @endforeach --}}
                                </p>
                                <p><strong>Age Range:</strong> {{$job->fromAge}} years - {{$job->toAge}} years</p>
                                <p><strong>Agency/Casting Director:</strong> <a href="{{route('user.view.profile',[$job->user->category->slug,$job->user->name_slug])}}">{{$job->user->name}}</a> </p>
                                <p><strong>Union:</strong> {{$job->union == 'yes' ? $job->union_name : 'No'}}</p>
                                {{-- <p><strong>Ends:</strong> November 12, 2022</p> --}}
                                <p><strong>Ends:</strong> {{ Carbon\Carbon::parse($job->toJobDate)->format('F d Y') }}</p>
                                {{-- <p><strong>Job Reference:</strong> {{$job->jobReference}}</p> --}}
                            </div>
                            {{-- <div class="job-list-desc">
                                <p>
                                    <strong>Job Location:</strong>
                                    @foreach ($job->getJobLocations as $jobLocationKey => $jobLocationValue )
                                        @if ($jobLocationKey === 0)
                                            {{$jobLocationValue->getCityName->city_name}}
                                        @else
                                            , {{$jobLocationValue->getCityName->city_name}}
                                        @endif
                                    @endforeach
                                </p>
                            </div> --}}
                            
                            {{-- <div class="job-list-desc">
                                <p><strong>Category:</strong> {{$job->getJobCategory->name}}</p>
                            </div> --}}
                            {{-- <div class="job-list-desc">
                                <p><strong>Budget:</strong> {{$job->budget}}tbc</p>
                            </div> --}}
                            {{-- <div class="job-list-desc">
                                <p><strong>Gender:</strong> {{ ucwords($job->gender)}}</p>
                            </div> --}}
                            {{-- <div class="job-list-desc">
                                <p><strong>Age Range:</strong> {{$job->fromAge}} years - {{$job->toAge}} years</p>
                            </div> --}}
                            {{-- <div class="job-list-desc">
                                <p><strong>Job Date:</strong> {{date('d M Y', strtotime($job->fromJobDate))}} - {{date('d M Y', strtotime($job->toJobDate))}}</p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="job-list-desc-rgt">
                            <h4><strong>Preferences</strong></h4>
                            
                            <p class="desc-scroll">{{@$job->jobPreference}}</p>
                            <h4><strong>Requirements</strong></h4>
                            <p class="desc-scroll">{{@$job->jobRequirement}}</p>
                            <h4><strong>Description</strong></h4>
                            <p class="desc-scroll">{{@$job->jobDescription}}</p>
                            {{-- <p>{{$job->jobDescription}}</p> --}}
                        </div>
                        <div class="job-list-desc-rgt">
                            <h4><strong>Pay</strong></h4>
                            <p><strong>Compensation: </strong>{{$job->compensation}}</p>
                            <p><strong>Paid session or event:</strong> {{Str::ucfirst(@$job->event_paid_unpaid)}}</p>
                            {{-- <p><strong>Location of the session or project:</strong> europe</p> --}}
                            <p><strong>Online or offline work/collaboration:</strong> {{Str::ucfirst(@$job->work_mode)}}</p>
                            {{-- <p>{{$job->jobDescription}}</p> --}}
                        </div>
                    </div>
                    <div class="col-12">
                        @if(auth()->user())
                            @if(!$job->getJobApplyByUser)
                            <div class="job-btn-cover">
                                <a href="javascript:;" class="job-read-more" data-bs-toggle="modal" data-bs-target="#jobapplyModal">Apply</a>
                            </div>
                            @else
                            <div class="all-rdy-applyed">you have already applied for this job!</div>
                            @endif
                        @else
                            <div class="job-btn-cover">
                                {{Session::put('url_back', url()->current())}}
                                <a href="{{url('job-apply').'/'.$job->id}}" class="job-read-more">Apply</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if (count($relatedJobs)> 0)
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="related-head">
                                <h4>Related Castings</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-4">
                                @foreach ($relatedJobs as $jobKey => $jobValue)
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
                                                        <h5><strong>Casting Number: </strong>{{$jobValue->jobReference}}</h5>
                                                        <div class="job-text">
                                                            <p><strong>Seeking:</strong> {{ucwords($jobValue->gender)}} / {{$jobValue->fromAge}} years - {{$jobValue->toAge}} years</p>
                                                            {{-- <p>{{$jobValue->jobReference}} / {{ucwords($jobValue->gender)}} / {{$jobValue->fromAge}} years - {{$jobValue->toAge}} years</p> --}}
                                                            <p><strong>Location :</strong>
                                                                @foreach ($jobValue->getJobLocations as $jobLocationKey => $jobLocationValue )
                                                                    @if ($jobLocationKey === 0)
                                                                        {{$jobLocationValue->getCityName->city_name}}
                                                                    @else
                                                                        , {{$jobLocationValue->getCityName->city_name}}
                                                                    @endif
                                                                @endforeach
                                                            </p>
                                                            <p><strong>Category :</strong> {{$jobValue->getJobCategory->name}}</p>
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
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- Job apply modal --}}
<div class="modal fade cmn-modal" id="jobapplyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('job.apply.store')}}" method="post" enctype="multipart/form-data" id="job_apply">
            @csrf
            <input type="hidden" name="jobId" value="{{$job->id}}" />
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Apply For Audition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="apply-modal-text">
                    <h4>{{Str::ucfirst($job->title)}}</h4>
                    <p><strong>Job Reference:</strong> {{$job->jobReference}}</p>
                </div>
                <div class="cmn-file-wrap mt-2">
                    <label for="description" class="file-lable">Upload File (.pdf/.docx/.doc):</label>
                    <div class="cmn-file">
                        <div class="file-select-name" id="noFile">No file chosen...</div>
                        <input type="file" id="apply-attach" name="image">
                        <label class="apply-box" for="apply-attach">upload</label>
                    </div>
                </div>
                <div class="cmn-modal-txtare mt-3">
                    <label for="description">Message:</label>
                    <textarea rows="3" class="form-control book-txtare-style" id="" name="message" required=""></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <div class="booked-now-wrap text-end">
                    <button type="submit" class="cmn-modal-btn">apply</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script>
        $('#apply-attach').bind('change', function () {
            var filename = $("#apply-attach").val();
            if (/^\s*$/.test(filename)) {
                $("#noFile").text("No file chosen..."); 
            }
            else {
                $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
            }
        });
        $(document).ready(function(){
         /* Validation  */
            $('#job_apply').validate({
                rules: {
                    "image": {
                        required: true,
                        extension: "pdf|docx|doc",
                        //filesize: 20971520,  
                    },
                    "message": {
                        required: true,
                    },
                },
            });
        });
    </script>

@endpush
