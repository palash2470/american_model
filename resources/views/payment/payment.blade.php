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
        <div class="row justify-content-center g-3">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 order-sm-1 order-2">
                <form action="{{route('payment.process')}}" method="get" id="payment_frm">
                    @csrf
                <div class="payment-card-wrap-lft">
                    <div class="payment-box-wrap-head">
                        <h4>Pay with</h4>
                    </div>
                    <input type="hidden" name="user_plan" value="{{$user_plan_enc}}">
                    <div class="payment-card-wrap">
                        <div class="pay-card-box radio">
                            <input type="radio" id="card" name="pay_method" value="card">
                            <label for="card">
                                <h5>Credit / Debit cards</h5>
                                <ul class="d-flex card-img-wrap">
                                    <li>
                                        <span class="pay-card-img"><img class="img-block" src="{{url('images/card/visa.jpg')}}" alt=""></span>
                                    </li>
                                    <li>
                                        <span class="pay-card-img"><img class="img-block" src="{{url('images/card/master-card.jpg')}}" alt=""></span>
                                    </li>
                                    <li>
                                        <span class="pay-card-img"><img class="img-block" src="{{url('images/card/discover.jpg')}}" alt=""></span>
                                    </li>
                                    <li>
                                        <span class="pay-card-img"><img class="img-block" src="{{url('images/card/american-ex.jpg')}}" alt=""></span>
                                    </li>
                                </ul>
                            </label>
                        </div>
                        <div class="pay-card-box radio">
                            <input type="radio" id="paypal" name="pay_method" value="paypal">
                            <label for="paypal">
                                <h5>Paypal</h5>
                                <ul class="d-flex card-img-wrap">
                                    <li>
                                        <span class="pay-card-img"><img class="img-block" src="{{url('images/card/paypal.jpg')}}" alt=""></span>
                                    </li>
                                </ul>
                            </label>
                        </div>
                    </div>
                    <div class="checkbox agree-wrap">
                        <input id="terms1" type="checkbox" name="agree">
                        <label for="terms1">
                            <small>
                                <a href="#">Term's and Condition</a> 
                                I agree to pay the total amount
                            </small>
                        </label>
                    </div>
                    <div class="pay-btn-wrap" id="continue_btn">
                        {{-- <a href="payment-card.html" class="pay-btn">Continue</a> --}}
                        <button type="submit" class="pay-btn-continue">Continue</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 order-sm-2 order-1">
                <div class="payment-box-wrap">
                    <div class="payment-card-wrap-box">
                        <div class="payment-box-wrap-head">
                            <h4>Your payment details</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="your-plan-details">                                    
                                    <p>{{$user_plan->plan->name}}</p>
                                    <h5>{{$user_plan->price}} <span>/{{ucfirst($user_plan->plan_type)}}</span></h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="your-plan-details mt-3">
                                    <p>Net Payable</p>
                                    <h5>{{$user_plan->price}} <span>/With tax</span></h5>
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                <div class="coupon-wrap">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="coupon-text-head">
                                                <h4>You have coupon?</h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="copun-input">
                                                <div class="coupon-btn-wrap">
                                                    <input type="text" class="form-control copun-input-style" placeholder="XXXXXXX">
                                                    <div class="coupon-btn-pos">
                                                        <button type="button" class="coupon-btn">Apply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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
        $('#continue_btn').hide();
        $("input[type='radio']").change(function(){
            if($('input[name="agree"]:checked').length > 0){
                $('#continue_btn').show();
            }
        });

        $("input[name='agree']:checkbox").change(function() {
            //console.log("asdfs");
            var ischecked= $(this).is(':checked');
            if($('input[name="pay_method"]:checked').length > 0 && ischecked){
                $('#continue_btn').show();
            }
            if(!ischecked){
                $('#continue_btn').hide();
            }  
        });
       
    });
</script>
@endpush