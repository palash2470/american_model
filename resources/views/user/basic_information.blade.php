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
    .avatar-upload #profile_image-error.error{
        position: absolute;
    }
    </style>
@section('content')
<section class="verify-email">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="start-one complete-account">
                    <div class="head-form">
                        <h3>hi there!</h3>
                        <p>tell us a bit about yourself</p>
                    </div>
                    <form action="{{route('user.basic.information.store')}}" method="post" enctype="multipart/form-data" id="basic_info_frm">
                        @csrf
                    <div class="avatar-upload when-full-select @if (isset($user) && $user->userDetails->profile_image !='') uploaded @endif">
                        <div class="avatar-edit">
                            <input type='file' id="profile_image" name="profile_image" class="" value="" data-src="@if(isset($user)){{$user->userDetails->profile_image}}@endif">
                            <label class="file-pop" for="profile_image"></label>
                            @if($errors->has('profile_image')) 
                                <p class="error">Please Upload Profile Image </p>
                            @endif
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url(@if(isset($user)){{url('img/user/profile-image/'.$user->userDetails->profile_image)}}@else{{url('images/avatar.jpg')}} @endif);">
                            </div>
                        </div>
                        <input type="hidden" name="crop_image" id="crop_image" value="">
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="src-input-wrap">
                                <label>First Name</label>
                                <input type="text" class="form-control src-input-style @if($errors->has('first_name')) error @endif" name="first_name" placeholder="First Name" value="@if(isset($user)) {{$user->userDetails->first_name}}@endif">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="src-input-wrap">
                                <label>Middle Name</label>
                                <input type="text" class="form-control src-input-style @if($errors->has('middle_name')) error @endif" name="middle_name" placeholder="Middle Name" value="@if(isset($user)) {{$user->userDetails->middle_name}}@endif">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="src-input-wrap">
                                <label>Last Name</label>
                                <input type="text" class="form-control src-input-style @if($errors->has('last_name')) error @endif" name="last_name" placeholder="Last Name" value="@if(isset($user)) {{$user->userDetails->last_name}}@endif">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="src-select-wrap">
                                <label>gender</label>
                                <select class="form-control src-select-style selectOption2 @if($errors->has('gender')) error @endif" name="gender">
                                    <option value="">Please Select Gender</option>
                                    <option value="1" @if(isset($user) && $user->userDetails->gender == 1) selected @endif>Male</option>
                                    <option value="2"  @if(isset($user) && $user->userDetails->gender == 2) selected @endif>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="src-input-wrap">
                                <label>birthday</label>
                                <input type="date" class="form-control src-input-style @if($errors->has('dob')) error @endif" name="dob" value="@if(isset($user)){{$user->userDetails->dob}}@endif">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="src-select-wrap">
                                <label>country</label>
                                <select class="form-control src-select-style selectOption2 @if($errors->has('country_id')) error @endif" name="country_id" id="country-dd">
                                    <option value="">Please Select Country</option>
                                    @foreach ($countres as $country)
                                    <option value="{{$country->id}}" @if(isset($user) && $user->userDetails->country_id == $country->id) selected @endif>
                                        {{$country->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" id="selected_state" value="@if(isset($user)){{$user->userDetails->state_id}}@endif">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="src-select-wrap">
                                <label>state</label>
                                <select class="form-control src-select-style selectOption2 @if($errors->has('state_id')) error @endif" name="state_id" id="state-dd">
                                    <option value="">Please Select State</option>
                                </select>
                            </div>
                        </div>
                       {{--  <input type="hidden" id="selected_city" value="@if(isset($user)){{$user->userDetails->city_id}}@endif"> --}}
                        {{-- <div class="col-lg-6 col-12">
                            <div class="src-select-wrap">
                                <label>City</label>
                                <select class="form-control src-select-style selectOption2 @if($errors->has('city_id')) error @endif" name="city_id" id="city-dd">
                                    <option value="">Please Select City</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="src-input-wrap">
                                <label>City</label>
                                <input type="text" class="form-control src-input-style @if($errors->has('city_name')) error @endif" name="city_name" placeholder="City" value="@if(isset($user)){{$user->userDetails->city_name}}@endif">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="src-input-wrap">
                                <label>zip code</label>
                                <input type="text" class="form-control src-input-style @if($errors->has('zip_code')) error @endif" name="zip_code" placeholder="Zip Code" value="@if(isset($user)){{$user->userDetails->zip_code}}@endif">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="src-input-wrap">
                                <label>Booking Amount (USD)</label>
                                <div class="ad-price-type">
                                    <input type="number" class="form-control src-input-style" name="booking_amount_hour" placeholder="Amount (USD/Hour)" value="@if(isset($user)){{$user->userDetails->booking_amount_hour}}@endif">
                                    <span class="ad-price-name">Hour</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="src-input-wrap">
                                <label>Booking Amount (USD)</label>
                                <div class="ad-price-type">
                                    <input type="number" class="form-control src-input-style" name="booking_amount_day" placeholder="Amount (USD/Day)" value="@if(isset($user)){{$user->userDetails->booking_amount_day}}@endif">
                                    <span class="ad-price-name">Day</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="src-input-wrap">
                                <label>Booking Amount (USD)</label>
                                <div class="ad-price-type">
                                    <input type="number" class="form-control src-input-style" name="booking_amount_week" placeholder="Amount (USD/Week)" value="@if(isset($user)){{$user->userDetails->booking_amount_week}}@endif">
                                    <span class="ad-price-name">Week</span>
                                </div>
                            </div>
                        </div>
                       {{--  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="src-input-wrap">
                                <label>Booking Amount (USD)</label>
                                <input type="text" class="form-control src-input-style" name="booking_amount" placeholder="Booking Amount (USD)" value="@if(isset($user)){{$user->userDetails->booking_amount}}@endif">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="src-select-wrap">
                                <label>Select Booking Amount PER</label>
                                <select class="form-control src-select-style selectOption2" name="booking_amount_per">
                                    <option value="hour">Hour</option>
                                    <option value="day">Day</option>
                                    <option value="week">Week</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="src-select-wrap">
                                <label>Member Type</label>
                                <select class="form-control src-select-style selectOption2 @if($errors->has('membership_type_id')) error @endif" name="membership_type_id">
                                    <option value="">Please select Member Type</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if(isset($user) && $user->userDetails->membership_type_id == $category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="acc-save-wrap">
                               <button type="submit" class="acc-save-btn">Save & continue</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Crop Image Modal --}}
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                </div>
                <div class="col-md-4">
                    <div class="preview"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="crop">Crop</button>
    </div>
    </div>
</div>
</div>
@endsection


@push('scripts')

<script>
$(document).ready(function(){
    /* Start Crop Image */
    var $modal = $('#modal');
    var image = document.getElementById('image');
    var cropper;
    //$(document).on("change", "#profile_image", function(e){
    $("#profile_image").change(function(e) {
        console.log('fdsf');
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
    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 3,
        preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob); 
            reader.onloadend = function(e) {
                var base64data = reader.result; 
                $('#crop_image').val(base64data);
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
                $('.when-full-select').addClass('uploaded');
                $('#profile_image').removeClass('error');
                $('#profile_image').addClass('valid');
                $('#profile_image-error').css('display','none');
                $modal.modal('hide');
                /* $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "crop-image-upload",
                    data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
                    success: function(data){
                        console.log(data);
                        $modal.modal('hide');
                        alert("Crop image successfully uploaded");
                    }
                }); */
            }
        });
    })
    /* End Crop Image */

    /* Validation  */
    $('#basic_info_frm').validate({
        rules: {
            first_name: {
                required:true,
            },
            last_name: {
                required:true,
            },
            gender: {
                required:true,
            },
            dob :{
                required:true,
            },
            country_id :{
                required:true,
            },
            state_id :{
                required:true,
            },
            city_name :{
                required:true,
            },
            zip_code :{
                required:true,
            },
            membership_type_id :{
                required:true,
            },
            profile_image :{
                required: function(element){
                    if ($("#profile_image").attr('data-src') !== '') {
                        return false;
                    } else {
                        return true;
                    }
                }, 
                accept: "jpg|jpeg|png|gif",
            },
            
        },
    });
});
</script>
@endpush