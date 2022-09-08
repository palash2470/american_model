@extends('layouts.app')
@section('content')
<section class="log-reg-banner" style="background: url({{url('images/log-reg/log-reg-banner.jpg')}}) no-repeat center center;">
    <div class="log-reg-area">
        <div class="log-reg-box">
            @include('flashmessage.flash-message')
            <h3>Reset Password</h3>
            <div class="heading-icon-wrap">
                <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
            </div>
            <form action="{{route('reset.password.post')}}" method="post" id="loginfrm">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

                <div class="log-input">
                    <label>password</label>
                    <div class="add-pass-eye">
                        <input type="password" class="form-control log-input-style pass_input" placeholder="*********" name="password">
                        <span class="pass-eye">
                            <i class="far fa-eye-slash pass_eye"></i>
                        </span>
                        @if($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                    </div>
                </div>
                <div class="log-input">
                    <label>confirm password</label>
                    <div class="add-pass-eye">
                        <input type="password" class="form-control log-input-style pass_input" placeholder="*********" name="password_confirmation">
                        <span class="pass-eye">
                            <i class="far fa-eye-slash pass_eye"></i>
                        </span>
                        @if($errors->has('password_confirmation'))
                            <div class="error">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                </div>
                <div class="log-btn-wrap">
                    <ul class="d-flex justify-content-center align-items-center">
                        
                        <li><button type="submit" class="reg-btn">Reset</button></li>
                        
                    </ul>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
   /*  $(document).ready(function(){
        $('#loginfrm').validate({
            rules: {
                password: {
                    required:true,
                    minlength: 6,
                    maxlength: 10,
                },
                
            },
        });
    }) */
</script>
@endpush

{{-- <section class="main-background login-create-bg-lft-rgt position-relative min-100vh">
    
    <span class="lb-img"><img class="img-block" src="{{url('image/lb-img.svg')}}" alt=""></span>
    <div class="log-create-main-wrap position-relative">
        <span class="lt-img"><img class="img-block" src="{{url('image/lt-img.svg')}}" alt=""></span>
        <span class="rt-img"><img class="img-block" src="{{url('image/rt-img.svg')}}" alt=""></span>
        <span class="log-in-logo">
            <img class="img-block" src="{{url('image/logo.png')}}" alt="">
        </span>
        <div class="log-create-box">
            <div class="log-create-box-head">
                @include('flashmessage.flash-message')
                <h4>Reset Password</h4>
            </div>
            <form action="{{route('reset.password.post')}}" method="post">
                @csrf
                <div class="log-create-box-body">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-style-wrap">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password" class="form-control input-style">
                        @if($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="input-style-wrap">
                        <label>Confirm password</label>
                        <input type="password" placeholder="Confirm password" name="password_confirmation" class="form-control input-style">
                        @if($errors->has('password_confirmation'))
                            <div class="error">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                    
                    <div class="account-btn-wrap">
                        <button class="account-btn" type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section> --}}
