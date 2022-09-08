@extends('layouts.app')

@section('content')
<section class="log-reg-banner" style="background: url({{url('images/log-reg/log-reg-banner.jpg')}}) no-repeat center center;">
    <div class="log-reg-area">
        <div class="log-reg-box">
            @include('flashmessage.flash-message')
            <h3>Forgot Password</h3>
            <div class="heading-icon-wrap">
                <span class="heading-icon"><img src="{{url('images/pattern-heading.png')}}" alt=""></span>
            </div>
            <form action="{{route('forget.password.post')}}" method="post" id="forgotfrm">
            @csrf
                <div class="log-input">
                    <label>enter email adress</label>
                    <input type="text" class="form-control log-input-style" placeholder="e.g emailid@gmail.com" name="email">
                    @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                
                <div class="log-btn-wrap">
                    <ul class="d-flex justify-content-center align-items-center">
                        
                        <li><button type="submit" class="reg-btn" href="#">submit</button></li>
                        <li><a href="{{route('login')}}" class="log-btn">Login</a></li>
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
        $('#loginfrm').validate({
            rules: {
                email: {
                    required:true,
                    email: true,
                    //regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                },
                
            },
        });
    })
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
                <h4>Forgot Password</h4>
                <p>Please enter your details.</p>
            </div>
            <form action="{{route('forget.password.post')}}" method="post">
                @csrf
                <div class="log-create-box-body">
                    <div class="input-style-wrap">
                        <label>Email</label>
                        <input type="text" placeholder="Enter your email" name="email" class="form-control input-style">
                        @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    
                    <div class="forget-pass">
                        <a href="{{route('login')}}">Login</a>
                    </div>
                    <div class="account-btn-wrap">
                        <button class="account-btn" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section> --}}
