<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" sizes="32x32" href="{{url('images/favicon.ico')}}">
        <title>::American Model::</title>
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Css owl -->
        <link rel="stylesheet" href="{{url('css/owl.carousel.css')}}" media="all">
        <!-- Css owl -->
        <link rel="stylesheet" href="{{url('css/build.css')}}" media="all">
        <!-- Css Animat -->
        <link rel="stylesheet" href="{{url('css/animate.min.css')}}" media="all">
        <!-- Css owl -->
        <link rel="stylesheet" href="{{url('custom-fonts/custom_font.css')}}" media="all">
        <link rel="stylesheet" href="{{url('css/jquery.fancybox.min.css')}}" media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>

        <link rel="stylesheet" href="{{url('css/jquery-ui.css')}}" type="text/css" media="all" />
        <!-- Css Style -->
        <link rel="stylesheet" href="{{url('css/style.css')}}" media="all">

         <!-- Jquary -->
        <script src="{{url('js/jquery-3.6.0.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{url('js/bootstrap.js')}}"></script>
        <!-- owl -->
        <script src="{{url('js/owl.carousel.js')}}"></script>
        <!-- WOW -->
        <script src="{{url('js/wow.min.js')}}"></script>
        <script src="{{url('js/wow.custom.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
        {{-- Validation  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
        <script src="{{url('js/jquery.fancybox.min.js')}}"></script>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="{{url('js/jquery-ui.min.js')}}"></script>
        <script src="{{url('js/jquery.ui.touch-punch.min.js')}}"></script>
        <!-- Custom Js -->
        <script src="{{url('js/custom.js')}}"></script>
        <script src="{{url('js/developer.js')}}"></script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
            })
            var base_url = '{{url('/')}}';
            var csrf = '{{ csrf_token() }}';
        </script>
    </head>
<body>
    <!-- Header -->
    @include('includes.header')

    <!-- Body -->
    @yield('content')

    <!-- Footer -->
    @include('includes.footer')

    @stack('scripts')
    {{-- Start Loader  --}}
    {{-- <div id="loading_container" class="loading-container" style="display: none">
        <div class="custom-line">
            <div class="loader loader-1">
                <div class="loader loader-2">
                    <div class="loader loader-1">
                        <div class="loader loader-2">
                            <div class="loader loader-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
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
    {{-- End loader --}}
</body>
</html>
