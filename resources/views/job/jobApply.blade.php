@extends('layouts.app')
@section('content')
<section class="blog-page-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>job Apply</h3>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6 col-12">
                <div class="job-details">
                    <h4>{{$job->title}}</h4>
                    <div class="job-list-desc">
                        <p><strong>Job Reference:</strong> {{$job->jobReference}}</p>
                    </div>
                    <form action="{{route('job.apply.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="jobId" value="{{$job->id}}" />
                        <div class="col-12">
                            <div class="book-txtare-wrap">
                                <label>Message</label>
                                <textarea rows="4" name="message" class="form-control book-txtare-style resize" placeholder="Message.....">{{old('message')}}</textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="book-txtare-wrap">
                                <label>Attachment</label>
                                <input type="file" id="job-photo" name="image">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="job-post-btn-cover text-end">
                                <button class="job-post-btn" type="submit">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="ads-wrap home-rgt-gap">
                    <div class="ads-wrap-box">
                        <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                        <a class="d-block" href="#">
                            <img class="img-block" src="https://palash.aqualeafitsol.com/american-model/images/ad-sec3.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="ads-wrap home-rgt-gap">
                    <div class="ads-wrap-box">
                        <h5>advertisement <span class="ads-info blue-tooltip" data-tooltip-content="If you'd like to advertise here, contact us at advertising@americanmodel.net"><i class="fas fa-question-circle"></i></span></h5>
                        <a class="d-block" href="#">
                            <img class="img-block" src="https://palash.aqualeafitsol.com/american-model/images/ad-sec3.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
