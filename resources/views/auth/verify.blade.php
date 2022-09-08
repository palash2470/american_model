@extends('layouts.app')

@section('content')
<section class="verify-email">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="verify-email-wrap text-center">
                    <h4>Thank you for your registration!</h4>
                    <p>To activate your account please, click the activation link which has been sent to</p>
                    <span class="mail-id-reg">{{Crypt::decryptString($email)}}</span>
                    <p>If you have not received it yet please, check your Spam or Junk folder, then add our email</p>
                    <p>notify@americanmodel.net to your Address Book or click on the Not Spam button.</p> 
                    <a href="{{route('resend.email.verify',$email)}}" class="resend-link">resend link</a>                 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection