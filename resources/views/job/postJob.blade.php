@extends('layouts.app')
@section('content')
<section class="user-dashboard">
    <div class="container-fluid left-right-40">
    <div class="row">
        <div class="col-12">
            <div class="gelleries-page-head">
                <h3>Create A Casting Call</h3>
            </div>
        </div>
    </div>
</div>

    <form id="job_post_frm" action="{{route('job.post.store')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        <div class="container-fluid left-right-40">
            <div class="jobs-post-wrap d-flex flex-wrap">
                <div class="jobs-post-wrap-lft">
                    <div class="jobs-post-create-list">
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">title:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="text" name="jobTitle" class="form-control book-input-style" placeholder="type your project title here" value="{{old('jobTitle')}}" required>
                                @if ($errors->has('jobTitle'))
                                    <span class="text-danger">{{ $errors->first('jobTitle') }}</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">seeking:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="text" name="seeking" class="form-control book-input-style" placeholder="subtitle or short description" value="{{old('seeking')}}" required>
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">Job catagory:</li>
                            <li class="create-list-rgt book-select-wrap">
                                <select class="form-control book-select-style selectOption2" name="jobCategory" required>
                                    <option value="">Select Job Category</option>
                                    @foreach ($category as $categoryKey => $categoryValue )
                                        <option value="{{$categoryValue->id}} {{old('jobCategory') == $categoryValue->id ? 'selected':''}}">{{$categoryValue->name}}</option>
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
                                <select class="form-control book-select-style selectOption2" name="gender" required>
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
                                <input type="text" name="compensation" class="form-control book-input-style" placeholder="example $200 per day" value="{{old('compensation')}}">
                            </li>
                        </ul>
                        <ul class="d-flex ">
                            <li class="create-list-lft input-title">Ages:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <div class="row g-1">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="age-input">
                                            <input type="number" name="fromAge" class="form-control book-input-style" placeholder="From" value="{{old('fromAge')}}" required>
                                            @if ($errors->has('fromAge'))
                                                <span class="text-danger">{{ $errors->first('fromAge') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <div class="age-input">
                                            <input type="number" name="toAge" class="form-control book-input-style" placeholder="To" value="{{old('toAge')}}" required>
                                            @if ($errors->has('toAge'))
                                                <span class="text-danger">{{ $errors->first('toAge') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        
                        <ul class="d-flex">
                            <input type="hidden" name="country_id" id="country-dd" value="231">
                            <li class="create-list-lft input-title">Location State:</li>
                            <li class="create-list-rgt book-select-wrap">
                                <select class="form-control book-select-style selectOption2 @if($errors->has('state_id')) error @endif" name="state_id" id="state-dd" required>
                                    <option value="">Please Select State</option>
                                </select>
                                @if ($errors->has('state_id'))
                                    <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">Location City:</li>
                            <li class="create-list-rgt book-select-wrap">
                                <select class="form-control book-select-style selectOption2 @if($errors->has('city_id')) error @endif" name="city_id" id="city-dd">
                                    <option value="">Please Select City</option>
                                </select>
                                @if ($errors->has('city_id'))
                                    <span class="text-danger">{{ $errors->first('city_id') }}</span>
                                @endif
                            </li>
                        </ul>
                        {{-- <ul class="d-flex">
                            <li class="create-list-lft input-title">location:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <div class="ui-widget">
                                    <input type="text" class="form-control book-input-style ui-autocomplete-input" placeholder="Search Your Location" name="job_location_name" value="{{old('job_location_name')}}" id="city_autocomplete" required>
                                    <input type="hidden" name="location" id="location_id" value="{{old('location')}}" >
                                </div>
                                @if ($errors->has('location'))
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                @endif
                            </li>
                        </ul> --}}
                        
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">casting end date:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="date" name="toJobDate" class="form-control book-input-style" value="{{old('toJobDate')}}" required>
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">Height/Weight:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="text" class="form-control book-input-style" name="height" placeholder="Height/Weight" value="{{old('height')}}">
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">Paid session or event:</li>
                            <li class="create-list-rgt book-select-wrap">
                                <select class="form-control book-select-style selectOption2" name="event_paid_unpaid">
                                    {{-- <option value="">Select Paid session or event</option> --}}
                                    <option value="paid" {{old('event_paid_unpaid') === 'paid' ?'selected':''}}>Paid</option>
                                    <option value="unpaid" {{old('event_paid_unpaid') === 'unpaid' ?'selected':''}}>Unpaid</option>
                                </select>
                                @if ($errors->has('event_paid_unpaid'))
                                    <span class="text-danger">{{ $errors->first('event_paid_unpaid') }}</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">Work/collaboration mode:</li>
                            <li class="create-list-rgt book-select-wrap">
                                <select class="form-control book-select-style selectOption2" name="work_mode">
                                    {{-- <option value="">Select Work/collaboration mode</option> --}}
                                    <option value="offline" {{old('work_mode') === 'offline' ?'selected':''}}>Offline</option>
                                    <option value="online" {{old('work_mode') === 'online' ?'selected':''}}>Online</option>
                                </select>
                                @if ($errors->has('work_mode'))
                                    <span class="text-danger">{{ $errors->first('work_mode') }}</span>
                                @endif
                            </li>
                        </ul>
                        <ul class="d-flex">
                            <li class="create-list-lft input-title">Union:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input class="form-check-input" type="radio" name="union" id="union1" value="no" checked>
                                <label class="form-check-label" for="union1">
                                    No
                                </label>
                                <input class="form-check-input" type="radio" name="union" id="union2" value="yes">
                                <label class="form-check-label" for="union2">
                                    Yes
                                </label>
                            </li>
                        </ul>
                        <ul class="d-flex" id="union_name_field">
                            <li class="create-list-lft input-title">Union Name:</li>
                            <li class="create-list-rgt book-input-wrap">
                                <input type="text" class="form-control book-input-style" name="union_name" placeholder="Union Name" value="{{old('union_name')}}">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="jobs-post-wrap-rgt">
                    <div class="img-post-jobs2 d-flex flex-wrap">
                        <div class="img-post-jobs-lft">
                            <div class="jobs-img-post-wrap">
                                <input type="file" id="jobsImgPost" name="images[]" class="mutliple_image" data-max_length="0">
                                <label for="jobsImgPost" class="jobs-img-post-text">
                                    <span>
                                        <i class="far fa-images"></i>
                                        <p>Click to upload image</p>
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
                        <textarea rows="4" class="form-control book-txtare-style resize" placeholder="Type Details" name="jobDescription" value="{{old('jobDescription')}}" required>{{old('jobDescription')}}</textarea>
                        @if ($errors->has('jobDescription'))
                            <span class="text-danger">{{ $errors->first('jobDescription') }}</span>
                        @endif
                    </li>
                </ul>
                <ul class="d-flex">
                    <li class="create-list-lft input-title">Preferences:</li>
                    <li class="create-list-rgt book-txtare-wrap">
                        <textarea rows="4" class="form-control book-txtare-style resize" placeholder="Type Preferences" name="jobPreference" value="{{old('jobPreference')}}" required>{{old('jobPreference')}}</textarea>
                        @if ($errors->has('jobPreference'))
                            <span class="text-danger">{{ $errors->first('jobPreference') }}</span>
                        @endif
                    </li>
                </ul>
                <ul class="d-flex">
                    <li class="create-list-lft input-title">Requirements:</li>
                    <li class="create-list-rgt book-txtare-wrap">
                        <textarea rows="4" class="form-control book-txtare-style resize" placeholder="Type Requirements" name="jobRequirement" value="{{old('jobRequirement')}}" required>{{old('jobRequirement')}}</textarea>
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

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        const scrollContainer = document.querySelector(".img-scroll");
        scrollContainer.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scrollContainer.scrollLeft += evt.deltaY;
        });
    })
</script>
<script>
$(document).on('submit','#job_post_frm',function(e){
    $("#loading_container").attr("style", "display:block");
});
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
            imgWrap = $(this).closest('.img-post-jobs2').find('.img-post-jobs-rgt');
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

(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

$('#union_name_field').removeClass('d-block');
$('#union_name_field').addClass('d-none');
$(document).on('change','input[type=radio][name=union]',function(){
    if (this.value == 'yes') {
        $('#union_name_field').addClass('d-block');
        $('#union_name_field').removeClass('d-none');
    }
    else if (this.value == 'no') {
        $('#union_name_field').removeClass('d-block');
        $('#union_name_field').addClass('d-none');
    }
});
</script>
@endpush
