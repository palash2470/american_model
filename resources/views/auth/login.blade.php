@extends('layouts.app')
{{-- {!! RecaptchaV3::initJs() !!} --}}
@section('content')
{{-- @include('flashmessage.flash-message') --}}
<style>
    .log-input input[type=password].error + label.error,
    .log-input input[type=text].error + label.error,
    .log-input input[type=text].error + div.error {
        display: block !important;
        color: red;
        position: absolute;
        font-size: 11px;
        text-transform: capitalize;
    }
   
</style>
<section class="log-reg-banner-new login-wrap">
    <div class="banner-new d-flex justify-content-center align-items-lg-start align-items-md-center">
        <div class="banner-new-lft">
            <h2>WELCOME BACK!</h2>
            {{-- <p>Models, Photographers, and MUA's</p> --}}
            <span class="lft-back d-block">
                <img class="img-block" src="images/log-lft-bg.png" alt="">
            </span>
        </div>
        <div class="banner-new-rgt">
            <div class="log-reg-box">
                <span class="log-logo">
                    <img class="img-block" src="images/american-model.png" alt="">
                </span>
                <p><strong>Don't Have An Account?</strong> <a href="{{route('signup')}}" class="log-btn-new">Signup</a></p>
                <ul class="sgn-text-icon d-flex align-items-center">
                    <li><h4>Login</h4></li>
                    <li><img class="img-block" src="{{url('images/icons.png')}}" alt=""></li>
                </ul>
                @include('flashmessage.flash-message')
                <form action="{{route('user.login')}}" method="post" id="regfrm">
                    @csrf
                    <div class="log-input">
                        <label>email address</label>
                        <input type="text" class="form-control log-input-style @error('email')error @enderror" placeholder="e.g emailid@gmail.com" name="email">
                        @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
    
                    </div>
                    <div class="log-input">
                        <label>password</label>
                        <div class="add-pass-eye">
                            <input type="password" class="form-control log-input-style pass_input  @error('password')error @enderror" placeholder="*********" name="password" id="password">
                            <span class="pass-eye">
                                <i class="far fa-eye-slash pass_eye"></i>
                            </span>
                            @if($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHAV2_SITEKEY')}}"></div>
                    <div class="error" id="captcha_error"></div>
                    @if ($errors->has('g-recaptcha-response'))
                        <div class="error">{{ $errors->first('g-recaptcha-response') }}</div>
                    @endif
                    {{-- <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <div class="col-md-6">
                            {!! RecaptchaV3::field('login') !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> --}}
                    {{-- <div class="checkbox-wrap">
                        <div class="checkbox">
                            <input type="checkbox" id="terms">
                            <label for="terms">By creating your account, you agree to our <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a></label>
                        </div>
                    </div> --}}
                    <div class="log-btn-wrap">
                        <ul class="d-flex justify-content-center align-items-center mt-2">
                            <li class="w-100"><button type="submit" class="reg-btn w-100">login</button></li>
                            <!-- <li><a href="{{route('login')}}" class="log-btn">login</a></li> -->
                        </ul>
                    </div>
                    <div class="text-center mt-2">
                        <p>© Copyright 2022-2023 Model Management, LLC </p>
                        <ul class="log-menu">
                            <li><a href="#">Terms Of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <div class="loader-wrap" id="loading_container" style="display: none">
        <div class="mesh-loader-wrap">
            <div class="mesh-loader">
            <div class="set-one">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            <div class="set-two">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="log-reg-banner" style="background: url({{url('images/log-reg/log-reg-banner.jpg')}}) no-repeat center center;">
    <div class="log-reg-area">
        
    </div>
</section> -->
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#regfrm').validate({
            rules: {
                email: {
                    required:true,
                    email: true,
                    //regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                },
                password: {
                    required:true,
                    minlength: 6,
                    maxlength: 15,
                },
                password_confirmation : {
                    minlength : 6,
                    maxlength: 15,
                    equalTo : "#password"
                }
                
            },
            submitHandler: function(form) {
         		if (grecaptcha.getResponse()) {
                    event.preventDefault();
         		//alert('Captcha Confirmed!');
                    $("#loading_container").attr("style", "display:block");
         		    form.submit();
         		} 
         		else {
                    $('#captcha_error').text('Please confirm captcha to proceed');
         		//alert('Please confirm captcha to proceed');
         		}
         	}
        });
    })
   /*  $(document).on('submit','#regfrm',function(e){
        $("#loading_container").attr("style", "display:block");
    }); */
</script>
@endpush
