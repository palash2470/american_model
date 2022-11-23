<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('images/favicon.ico')}}">
    <title>American Model</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/Admin/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{url('/Admin/css/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/Admin/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{url('/Admin/css/login.css')}}">
</head>
<body class="hold-transition login-page">
    <section class="log-reg-banner" style="background: url({{ url('images/log-reg/log-reg-banner.jpg') }}) no-repeat center center;">
        <div class="log-reg-area">
            @include('flashmessage.flash-message')
            <form action="{{route('admin.logins')}}" method="post">
            @csrf
                <div class="log-reg-box">
                    <h3>welcome back!</h3>
                    <div class="heading-icon-wrap">
                        <span class="heading-icon"><img src="images/pattern-heading.png" alt=""></span>
                    </div>
                    <div class="log-input">
                        <label>email adress</label>
                        <input type="email" class="form-control log-input-style" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="log-input">
                        <label>password</label>
                        <div class="add-pass-eye">
                           {{--  <input type="password" class="form-control" name="password" placeholder="Password" required> --}}
                            <input type="password" class="form-control log-input-style pass_input" placeholder="*********" name="password" required>
                            <span class="pass-eye">
                                <i class="far fa-eye-slash pass_eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="log-btn-wrap">
                        <ul class="d-flex justify-content-center align-items-center">
                            <li><button type="submit" class="reg-btn">login</button></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
    {{-- <div class="login-box">
        <div class="login-logo">
            <a href="javascript:void(0)">American Model</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @include('flashmessage.flash-message')
                <form action="{{route('admin.logins')}}" method="post">
                @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- /.login-box -->

<!-- jQuery -->
<script src="{{url('/Admin/js/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('/Admin/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/Admin/js/adminlte.min.js')}}"></script>


<!-- /*-------------------------------------Password Eye-----------------------------------*/ -->
<script>
    $(document).on('click', '.pass_eye', function(){   
        if($(this).closest('.add-pass-eye').find(".pass_input").attr('type')=='password'){
        $(this).closest('.add-pass-eye').find(".pass_input").attr('type','text');
        $(this).closest('.add-pass-eye').find(".far").addClass("fa-eye").removeClass("fa-eye-slash");
        }else{
        $(this).closest('.add-pass-eye').find(".pass_input").attr('type', 'password');
        $(this).closest('.add-pass-eye').find(".far").removeClass("fa-eye").addClass("fa-eye-slash");
        } 
    });
</script>
</body>
</html>