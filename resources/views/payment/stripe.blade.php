@extends('layouts.app')
@section('content')
<section class="galleries">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>payment</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="plan-sect-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="payment-card-wrap-lft">
                    <div class="payment-card-wrap-box">
                        <div class="payment-box-wrap-head">
                            <h4>Your details</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="pay-input">
                                    <label>Name</label>
                                    <input type="text" class="form-control pay-input-style" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pay-input">
                                    <label>Email</label>
                                    <input type="text" class="form-control pay-input-style" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="pay-input">
                                    <label>Address</label>
                                    <input type="text" class="form-control pay-input-style" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="pay-select">
                                    <label>Country</label>
                                    <select class="form-control pay-select-style selectOptionBdr">
                                        <option>India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="pay-select">
                                    <label>State</label>
                                    <select class="form-control pay-select-style selectOptionBdr">
                                        <option>Delhi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="pay-input">
                                    <label>City</label>
                                    <input type="text" class="form-control pay-input-style" placeholder="City">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="pay-input">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control pay-input-style" placeholder="Zip Code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-card-wrap-box">
                        <div class="payment-box-wrap-head">
                            <h4>Your card details</h4>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="pay-input">
                                    <label>Cardholder's Name</label>
                                    <input type="text" class="form-control pay-input-style" placeholder="Cardholder's Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="pay-input">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control pay-input-style" placeholder="XXXX XXXX XXXX XXXX">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <label class="sxp-lbl">Expiry Date</label>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="pay-input">
                                                            <input type="text" class="form-control pay-input-style" placeholder="MM">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                        <div class="pay-input">
                                                            <input type="text" class="form-control pay-input-style" placeholder="YYYY">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                <div class="pay-input">
                                                    <label>CVV</label>
                                                    <input type="text" class="form-control pay-input-style" placeholder="XXX">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pay-btn-wrap">
                        <a href="#" class="pay-btn">Continue</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="payment-box-wrap">
                    <div class="payment-box-wrap-head">
                        <h4>Your payment details</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="your-plan-details">                                    
                                <p>Silver</p>
                                <h5>65.58 <span>/Year</span></h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="your-plan-details mt-3">
                                <p>Net Payable</p>
                                <h5>69.58 <span>/With tax</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
       
    });
</script>
@endpush