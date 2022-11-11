@extends('layouts.app')
@section('content')

<style type="text/css">
 .hide{
    display: none;
 }
   
</style>
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
                <div class="payment-card-wrap-lft">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">  
                            {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> --}}
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endif
                    <form 
                            role="form" 
                            action="{{ route('stripe.payment') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
                        <div class="payment-card-wrap-box">
                            <div class="payment-box-wrap-head">
                                <h4>Your details</h4>
                            </div>
                            <input type="hidden" name="plan" value="{{@$enc_plan_id}}">
                            <input type="hidden" name="payment" value="{{@$payment_id}}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="pay-input">
                                        <label>Name</label>
                                        <input type="text" class="form-control pay-input-style" placeholder="Name" name="name" value="@if(isset($user)) {{$user->name}}@endif">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="pay-input">
                                        <label>Email</label>
                                        <input type="text" class="form-control pay-input-style" placeholder="Email" name="email" value="@if(isset($user)) {{$user->email}}@endif">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="pay-input">
                                        <label>Address</label>
                                        <input type="text" class="form-control pay-input-style" placeholder="Address" name="address" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="pay-select">
                                        <label>Country</label>
                                        <select class="form-control pay-select-style selectOptionBdr" name="country" id="country-dd">
                                            <option value="">Please Select Country</option>
                                            @foreach ($countres as $country)
                                            <option value="{{$country->id}}" @if(isset($user) && $user->userDetails->country_id == $country->id) selected @endif>
                                                {{$country->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="selected_state" value="@if(isset($user)){{$user->userDetails->state_id}}@endif">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="pay-select">
                                        <label>State</label>
                                        <select class="form-control pay-select-style selectOptionBdr" name="state" id="state-dd">
                                            <option value="">Please Select State</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="pay-input">
                                        <label>City</label>
                                        <input type="text" class="form-control pay-input-style" placeholder="City" name="city" value="@if(isset($user)) {{$user->userDetails->city_name}}@endif">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="pay-input">
                                        <label>Zip Code</label>
                                        <input type="text" class="form-control pay-input-style" placeholder="Zip Code" name="zip_code" value="@if(isset($user)) {{$user->userDetails->zip_code}}@endif">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-card-wrap-box">
                            <div class="payment-box-wrap-head">
                                <h4>Your card details</h4>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="pay-input required">
                                        <label class="control-label">Name on Card</label> <input
                                        class="form-control" size="4" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="pay-input required">
                                        <label class="control-label">Card Number</label> <input
                                        autocomplete="off" class="form-control card-number" size="20"
                                        type="text">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="pay-input required">
                                        <label class="control-label">CVC</label> <input autocomplete="off"
                                        class="form-control card-cvc" placeholder="ex. 311" size="4"
                                        type="text">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="pay-input required">
                                        <label class="control-label">Expiration Month</label> <input
                                        class="form-control card-expiry-month" placeholder="MM" size="2"
                                        type="text">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="pay-input required">
                                        <label class="control-label">Expiration Year</label> <input
                                        class="form-control card-expiry-year" placeholder="YYYY" size="4"
                                        type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 error hide">
                                    <div class="alert-danger alert">Please correct the errors and try again.</div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-12">
                                    <div class="pay-btn-wrap">
                                        <button class="pay-btn-continue" type="submit">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 order-sm-2 order-1">
                <div class="payment-box-wrap">
                    <div class="payment-box-wrap-head">
                        <h4>Your payment details</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="your-plan-details">                                    
                                <p>{{@$user_plan->plan->name}}</p>
                                <h5>{{@$user_plan->price}} <span>/{{@ucfirst($user_plan->plan_type)}}</span></h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="your-plan-details mt-3">
                                <p>Net Payable</p>
                                <h5>{{@$user_plan->price}} <span>/With tax</span></h5>
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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    /* $(document).ready(function(){
       
    }); */
    $(function() {
   
   var $form         = $(".require-validation");
  
   $('form.require-validation').bind('submit', function(e) {
       var $form         = $(".require-validation"),
       inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
       $inputs       = $form.find('.required').find(inputSelector),
       
       $errorMessage = $form.find('div.error'),
       valid         = true;
       $errorMessage.addClass('hide');
       //console.log($inputs);
       $('.has-error').removeClass('has-error');
       $inputs.each(function(i, el) {
         var $input = $(el);
         if ($input.val() === '') {
           $input.parent().addClass('has-error');
           $errorMessage.removeClass('hide');
           e.preventDefault();
         }
       });
  
       if (!$form.data('cc-on-file')) {
         e.preventDefault();
         Stripe.setPublishableKey($form.data('stripe-publishable-key'));
         Stripe.createToken({
           number: $('.card-number').val(),
           cvc: $('.card-cvc').val(),
           exp_month: $('.card-expiry-month').val(),
           exp_year: $('.card-expiry-year').val()
         }, stripeResponseHandler);
       }
 
 });
 
 function stripeResponseHandler(status, response) {
       if (response.error) {
           $('.error')
               .removeClass('hide')
               .find('.alert')
               .text(response.error.message);
       } else {
            $("#loading_container").attr("style", "display:block");
           /* token contains id, last4, and card type */
           var token = response['id'];
              
           $form.find('input[type=text]').empty();
           $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
           $form.get(0).submit();
       }
   }
  
});
</script>
@endpush