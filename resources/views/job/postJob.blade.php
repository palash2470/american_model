@extends('layouts.app')
@section('content')
<section class="user-dashboard">
    <form action="{{route('job.post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid left-right-40">
            <div class="jobs-post-wrap d-flex flex-wrap">
                <div class="jobs-post-wrap-lft">
                    <div class="jobs-post-create-list">
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">title:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="text" name="jobTitle" class="form-control book-input-style" placeholder="Type Job title" value="{{old('jobTitle')}}">
                                @if ($errors->has('jobTitle'))
                                    <span class="text-danger">{{ $errors->first('jobTitle') }}</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">seeking:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="text" name="seeking" class="form-control book-input-style" placeholder="model, photographer, mua">
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">catagory:</li>
                            <li class="create-list-rgt book-select-wrap">
                                <select class="form-control book-select-style selectOption2" name="jobCategory">
                                    <option value="">Select Job Category</option>
                                    @foreach ($category as $categoryKey => $categoryValue )
                                        <option value="{{$categoryValue->id}} {{old('jobCategory') === $categoryValue->id ? 'selected':''}}" >{{$categoryValue->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jobCategory'))
                                    <span class="text-danger">{{ $errors->first('jobCategory') }}</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">gender:</li>
                            <li class="create-list-rgt book-select-wrap">
                                <select class="form-control book-select-style selectOption2" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{old('gender') === 'male' ?'selected':''}}>Male</option>
                                    <option value="female" {{old('gender') === 'female' ?'selected':''}}>Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">compensation:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="text" name="compensation" class="form-control book-input-style" placeholder="model, photographer, mua" value="{{old('compensation')}}">
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">Ages:</li>
                            <li class="create-list-rgt book-input-wrap d-flex">
                                <input type="number" name="fromAge" class="form-control book-input-style" placeholder="From" value="{{old('fromAge')}}">
                                <input type="number" name="toAge" class="form-control book-input-style" placeholder="To" value="{{old('toAge')}}">
                                @if ($errors->has('fromAge'))
                                    <span class="text-danger">{{ $errors->first('fromAge') }}</span>
                                @endif
                                </br>
                                @if ($errors->has('toAge'))
                                    <span class="text-danger">{{ $errors->first('toAge') }}</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">location:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <div class="ui-widget">
                                    <input type="text" class="form-control book-input-style ui-autocomplete-input" placeholder="Search Your Location " value="{{old('location')}}" id="city_autocomplete">
                                    <input type="hidden" name="location" id="location_id" value="">
                                </div>
                                @if ($errors->has('location'))
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                @endif
                            </li>
                        </ul>
                        
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">casting end date:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="date" name="toJobDate" class="form-control book-input-style" value="{{old('toJobDate')}}">
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">Height/Weight:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="test" class="form-control book-input-style" name="height" value="{{old('height')}}">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="jobs-post-wrap-rgt">
                    <div class="img-post-jobs d-flex">
                        <div class="img-post-jobs-lft">
                            <div class="jobs-img-post-wrap">
                                <input type="file" id="jobsImgPost" name="images[]" class="mutliple_image" data-max_length="2" multiple>
                                <label for="jobsImgPost" class="jobs-img-post-text">
                                    <span>
                                        <i class="far fa-images"></i>
                                        <p>Click to load image</p>
                                    </span>
                                </label>
                                @if ($errors->has('images'))
                                    <span class="text-danger">{{ $errors->first('images') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="img-post-jobs-rgt d-flex">
                            {{-- <div class="post-jobs-imgbox">
                                <img class="img-block" src="images/newest/newest1.jpg" alt="">
                                <span class="img-close">
                                    <button type="button" class="img-close-btn"><i class="fas fa-times"></i></button>
                                </span>
                            </div>
                            <div class="post-jobs-imgbox">
                                <img class="img-block" src="images/makeupartist/make-artist-dp.jpg" alt="">
                                <span class="img-close">
                                    <button type="button" class="img-close-btn"><i class="fas fa-times"></i></button>
                                </span>
                            </div>
                            <div class="post-jobs-imgbox">
                                <img class="img-block" src="images/feutered-model/model4.jpg" alt="">
                                <span class="img-close">
                                    <button type="button" class="img-close-btn"><i class="fas fa-times"></i></button>
                                </span>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="jobs-post-create-list mt-3">
                <ul class="d-flex">
                    <li class="create-list-lft input-title">Details:</li>
                    <li class="create-list-rgt book-txtare-wrap">
                        <textarea rows="4" class="form-control book-txtare-style resize" placeholder="Type Details" name="jobDescription" value="{{old('jobDescription')}}"></textarea>
                        @if ($errors->has('jobDescription'))
                            <span class="text-danger">{{ $errors->first('jobDescription') }}</span>
                        @endif
                    </li>
                </ul>
                <ul class="d-flex">
                    <li class="create-list-lft input-title">Preferences:</li>
                    <li class="create-list-rgt book-txtare-wrap">
                        <textarea rows="4" class="form-control book-txtare-style resize" placeholder="Type Preferences" name="jobPreference" value="{{old('jobPreference')}}"></textarea>
                        @if ($errors->has('jobPreference'))
                            <span class="text-danger">{{ $errors->first('jobPreference') }}</span>
                        @endif
                    </li>
                </ul>
                <ul class="d-flex">
                    <li class="create-list-lft input-title">Requirements:</li>
                    <li class="create-list-rgt book-txtare-wrap">
                        <textarea rows="4" class="form-control book-txtare-style resize" placeholder="Type Requirements" name="jobRequirement" value="{{old('jobRequirement')}}"></textarea>
                        @if ($errors->has('jobRequirement'))
                            <span class="text-danger">{{ $errors->first('jobRequirement') }}</span>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="cmn-btn-tag text-end">
                <button type="submit" class="cmn-btn-tag-btn">Post</button>
            </div>
        </div>
    </form>
</section>
{{-- <section class="user-dashboard">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Post JOb</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <span class="my-acc-menu-btn user_acc_menu">
                        <button type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="user-dashboard-wrap d-flex">
            <div class="user-dashboard-lft my_acc_lft">
                <span class="acc_close">
                    <button type="button">
                        <i class="fas fa-times"></i>
                    </button>
                </span>
                <div class="user-dashboard-wrap">
                    <div class="user-dashboard-prf-top">
                        <div class="img-wrap">
                            <a href="#" class="dashb-user-img">
                                <img class="img-block" src="{{url('img/user/profile-image/'.Auth::user()->userDetails->profile_image)}}" alt="">
                            </a>
                            <ul class="d-flex user-dashboard-noti">
                                <li>
                                    <a href="javascript:;"><i class="far fa-heart"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><i class="far fa-bell"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><i class="far fa-envelope"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="user-dashboard-prf-name">
                            <h4>Welcome back,</h4>
                            <h3>{{@Auth::user()->userDetails->name}}</h3>
                            <p>Your current plan: <strong>{{@Auth::user()->userPlan->plan->name}}</strong> <a href="{{route('user.registration.plan')}}" class="upgrd-btn">upgrade</a></p>
                        </div>
                    </div>
                    <div class="user-dashboard-prf-btm">
                        <div class="user-dsbrd-menu">
                            <ul>
                                <li class="d-flex justify-content-between align-items-center gp">
                                    <i class="far fa-eye"></i>
                                    <div class="vies-text"><p><strong>{{@Auth::user()->views_count}}</strong> views </p></div>
                                    @if (count(@Auth::user()->viewes) > 0)
                                    <div class="views-img d-flex align-items-center">
                                        <ul class="d-flex">
                                            @if (count(@Auth::user()->viewes) > 6)
                                                @foreach (array_slice(@Auth::user()->viewes , 0 ,6) as $view)
                                                    <li>
                                                        <a href="javascript:">
                                                            <img class="img-block" src="{{url('img/user/profile-image/'.@@Auth::user()->viewerUser->userDetails->profile_image)}}" alt="">
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                                @foreach (@Auth::user()->viewes as $view)
                                                    <li>
                                                        <a href="javascript:">
                                                            <img class="img-block" src="{{url('img/user/profile-image/'.@$view->viewerUser->userDetails->profile_image)}}" alt="">
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                        <a href="#" class="views-all-btn" data-bs-toggle="modal" data-bs-target="#viewsModal">view all</a>
                                    </div>
                                    @endif

                                </li>
                                <li class="gp">
                                    <a href="{{route('user.profile_edit')}}"><i class="far fa-image"></i><strong>{{count(@Auth::user()->images)}}</strong> images</a>
                                </li>
                                <li class="gp">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#favouritesModal"><i class="far fa-heart"></i><strong>{{count(@Auth::user()->favourites)}}</strong> Favorited</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="btm-button-wrap">
                        <ul>
                            <li><a href="{{route('user.profile_edit')}}" class="user-update-pic">Upload Pictures</a></li>
                            <li><a href="#" class="user-update-cal">Manage Calendar</a></li>
                            @php
                                if(isset(auth()->user()->userDetails) && auth()->user()->userDetails->membership_type_id === 5)
                                {
                            @endphp
                                <li><a href="{{route('jobs')}}" class="user-update-cal">Jobs</a></li>
                            @php
                                }
                            @endphp
                        </ul>
                    </div>
                </div>
            </div>
            <div class="user-dashboard-rgt">
                @include('flashmessage.flash-message')
                <div class="welcome-text-user">
                    <h3>Create Your Job</h3>
                    <div class="job-create-wrap">
                        <form action="{{route('job.post.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="job-photo-upload">
                                        <input type="file" id="job-photo" name="image">
                                        <label for="job-photo"></label>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                                    <div class="book-input-wrap">
                                        <label>Job title</label>
                                        <input type="text" name="jobTitle" class="form-control book-input-style" placeholder="Type Job title" value="{{old('jobTitle')}}">
                                        @if ($errors->has('jobTitle'))
                                            <span class="text-danger">{{ $errors->first('jobTitle') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-select-wrap">
                                        <label>Job Category</label>
                                        <select name="jobCategory" class="form-control book-select-style selectOption2">
                                            <option>Select Job Category</option>
                                            @foreach ($category as $categoryKey => $categoryValue )
                                                <option value="{{$categoryValue->id}}">{{$categoryValue->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('jobCategory'))
                                            <span class="text-danger">{{ $errors->first('jobCategory') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-select-wrap">
                                        <label>Job Location</label>
                                        <select class="js-example-basic-multiple form-control book-select-style selectOption2" name="location[]" multiple="multiple" data-allow-clear="true">
                                            @foreach ($getCities as $cityKey => $cityValue )
                                                <option value="{{$cityValue->id}}">{{$cityValue->city_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('location'))
                                            <span class="text-danger">{{ $errors->first('location') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-input-wrap">
                                        <label>Job Budget</label>
                                        <input type="text" name="budget" class="form-control book-input-style" placeholder="Type Budget" value="{{old('budget')}}">
                                        @if ($errors->has('budget'))
                                            <span class="text-danger">{{ $errors->first('budget') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-input-wrap">
                                        <label>Job Date (From - To)</label>
                                        <div class="d-flex">
                                            <input type="date" name="fromJobDate" class="form-control book-input-style" value="{{old('fromJobDate')}}">
                                            <input type="date" name="toJobDate" class="form-control book-input-style" value="{{old('toJobDate')}}">
                                        </div>
                                        @if ($errors->has('fromJobDate'))
                                            <span class="text-danger">{{ $errors->first('fromJobDate') }}</span>
                                        @endif
                                        </br>
                                        @if ($errors->has('toJobDate'))
                                            <span class="text-danger">{{ $errors->first('toJobDate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="book-input-wrap">
                                        <label>Age Range (From - To)</label>
                                        <div class="d-flex">
                                            <input type="text" name="fromAge" class="form-control book-input-style" placeholder="From" value="{{old('fromAge')}}">
                                            <input type="text" name="toAge" class="form-control book-input-style" placeholder="To" value="{{old('toAge')}}">
                                        </div>
                                        @if ($errors->has('fromAge'))
                                            <span class="text-danger">{{ $errors->first('fromAge') }}</span>
                                        @endif
                                        </br>
                                        @if ($errors->has('toAge'))
                                            <span class="text-danger">{{ $errors->first('toAge') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="job-gender">
                                        <label>Gender</label>
                                        <ul class="d-flex">
                                            <li class="checkbox">
                                                <input type="radio" id="male" name="gender" value="male" {{old('gender') === 'male' ?'checked':''}}>
                                                <label for="male">Male</label>
                                            </li>
                                            <li class="checkbox">
                                                <input type="radio" id="female" name="gender" value="female" {{old('gender') === 'female' ?'checked':''}}>
                                                <label for="female">Female</label>
                                            </li>
                                        </ul>
                                        @if ($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="book-txtare-wrap">
                                        <label>Job Description</label>
                                        <textarea rows="4" name="jobDescription" class="form-control book-txtare-style resize" placeholder="Type Job Description">{{old('jobDescription')}}</textarea>
                                        @if ($errors->has('jobDescription'))
                                            <span class="text-danger">{{ $errors->first('jobDescription') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="job-post-btn-cover text-end">
                                        <button class="job-post-btn" type="submit">post for this jobs</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('.js-example-basic-multiple').select2({
        placeholder: 'Select an job location',
    });
    
});
$(document).ready(function () {
    //$('#jobsImgPost').on('change', function() {
        ImgUpload();
    //});
  //ImgUpload();
});

function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];
    //console.log('dsfds');
    $('.mutliple_image').each(function () {
        //console.log('dsfs');
        $(this).on('change', function (e) {
            //console.log(this);
            imgWrap = $(this).closest('.img-post-jobs').find('.img-post-jobs-rgt');
            var maxLength = $(this).attr('data-max_length');
            //console.log(imgWrap);
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function (f, index) {

            if (!f.type.match('image.*')) {
                return;
            }
            
            if (imgArray.length > maxLength) {
                return false
            } else {
                var len = 0;
                for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i] !== undefined) {
                    len++;
                }
                }
                if (len > maxLength) {
                return false;
                } else {
                imgArray.push(f);

                var reader = new FileReader();
                reader.onload = function (e) {
                    var html = `<div class="post-jobs-imgbox" data-number="` + $(".img-close-btn").length + `">
                                <img class="img-block" src="`+e.target.result+`" alt="">
                                <span class="img-close">
                                    <button type="button" class="img-close-btn" data-file="` + f.name + `"><i class="fas fa-times"></i></button>
                                </span>
                            </div>`;
                    imgWrap.append(html);
                    iterator++;
                }
                reader.readAsDataURL(f);
                
                }
            }
            });
        });
    });
   
    $('body').on('click', ".img-close-btn", function (e) {
        var file = $(this).data("file");
        //console.log(file);
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
            imgArray.splice(i, 1);
            break;
            }
        }
        $(this).parent().parent().remove();
        //console.log(imgArray.length);
    });
    
}
/* $(function() {
    // Multiple images preview with JavaScript
    var previewImages = function(input, imgPreviewPlaceholder) {
    if (input.files) {
        var filesAmount = input.files.length;
        console.log(filesAmount);
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $($.parseHTML(`<div class="post-jobs-imgbox">
                                <img class="img-block" src="`+event.target.result+`" alt="">
                                <span class="img-close">
                                    <button type="button" class="img-close-btn"><i class="fas fa-times"></i></button>
                                </span>
                            </div>`)).appendTo(imgPreviewPlaceholder);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
    };
    $('#jobsImgPost').on('change', function() {
        previewImages(this, 'div.img-post-jobs-rgt');
    });
}); */
</script>
@endpush
