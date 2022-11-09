@extends('layouts.app')
@section('content')

<section class="payment-page-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="payment-page pay-success">
                    <i class="far fa-check-circle"></i>
                    <h2>PAYMENT SUCCESS</h2>
                    <p>Your Payment Has Been Made. Thank you.</p>
                    <a href="{{route('dashboard')}}">back to dashboard</a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
