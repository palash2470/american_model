@extends('layouts.app')

@section('content')
<section class="verify-email">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="verify-email-wrap text-center">
                    <h4>Congratulations you have created an account!</h4>
                    <p>Your email address has been successfully verified</p>
                    <span class="create-account-icon"><i class="far fa-check-circle"></i></span>
                    <a href="{{route('login')}}" class="go-to-site-btn">Go to login</a>              
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
    
   