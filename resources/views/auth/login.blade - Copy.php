@extends('layouts.app')
{!! RecaptchaV3::initJs() !!}
@section('content')
<section class="log-reg-banner" style="background: url({{url('images/log-reg/log-reg-banner.jpg')}}) no-repeat center center;">
    <div class="log-reg-area">
        <div class="log-reg-box">
            @include('flashmessage.flash-message')
            <h3>Welcome back!</h3>
            <div class="heading-icon-wrap">
                <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
            </div>
            <form action="{{route('user.login')}}" method="post" id="loginfrm">
            @csrf
                <div class="log-input">
                    <label>email address</label>
                    <input type="text" class="form-control log-input-style" placeholder="e.g emailid@gmail.com" name="email">
                </div>
                <div class="log-input">
                    <label>password</label>
                    <div class="add-pass-eye">
                        <input type="password" class="form-control log-input-style pass_input" placeholder="*********" name="password">
                        <span class="pass-eye">
                            <i class="far fa-eye-slash pass_eye"></i>
                        </span>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        {!! RecaptchaV3::field('login') !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="log-btn-wrap">
                    <ul class="d-flex justify-content-center align-items-center">
                        
                        <li><button type="submit" class="reg-btn" href="#">login</button></li>
                        <li><a href="{{route('signup')}}" class="log-btn">register</a></li>
                    </ul>
                </div>
            </form>
            <div class="for-got-wrap">
                <a href="{{route('forget.password.get')}}" class="for-got-pass">forgot password</a>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#loginfrm').validate({
            rules: {
                email: {
                    required:true,
                    email: true,
                    //regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                },
                password: {
                    required:true,
                    minlength: 6,
                    maxlength: 10,
                },
                
            },
        });
    })
</script>
@endpush