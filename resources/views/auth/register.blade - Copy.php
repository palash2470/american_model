@extends('layouts.app')
{!! RecaptchaV3::initJs() !!}
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
<section class="log-reg-banner" style="background: url({{url('images/log-reg/log-reg-banner.jpg')}}) no-repeat center center;">
    <div class="log-reg-area">
        <div class="log-reg-box">
            <h3>sign up</h3>
            <div class="heading-icon-wrap">
                <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
            </div>
            <form action="{{route('user.signup')}}" method="post" id="regfrm">
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
                <div class="log-input">
                    <label>confirm password</label>
                    <div class="add-pass-eye">
                        <input type="password" class="form-control log-input-style pass_input  @error('password_confirmation')error @enderror" placeholder="*********" name="password_confirmation">
                        <span class="pass-eye">
                            <i class="far fa-eye-slash pass_eye"></i>
                        </span>
                        @if($errors->has('password_confirmation'))
                            <div class="error">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        {!! RecaptchaV3::field('signup') !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="log-btn-wrap">
                    <ul class="d-flex justify-content-center align-items-center">
                        <li><button type="submit" class="reg-btn">register</button></li>
                        <li><a href="{{route('login')}}" class="log-btn">login</a></li>
                    </ul>
                </div>
            </form>
            
        </div>
    </div>
</section>
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
        });
    })
</script>
@endpush
