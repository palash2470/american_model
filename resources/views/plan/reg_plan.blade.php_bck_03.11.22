@extends('layouts.app')
@section('content')
<section class="galleries">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>plan</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="plan-sect-wrap">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="plan-tab">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        @if ($plan_groups)
                            @foreach ($plan_groups as $pln_group_key => $plan_group)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{$plan_group->id == Auth::user()->userDetails->getCategory->plan_group_id ? 'active':'disable'}}" id="model-actore-tab" data-bs-toggle="tab" data-bs-target="#group_{{$plan_group->id}}" type="button" role="tab" aria-controls="model-actore" aria-selected="true" data-group-id="{{$plan_group->id}}">{{$plan_group->name}}</button>
                              </li>
                            @endforeach
                        @endif
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        @if ($plan_groups)
                            @foreach ($plan_groups as $pln_group_key => $plan_group)
                                <div class="tab-pane fade {{$plan_group->id == Auth::user()->userDetails->getCategory->plan_group_id ? 'show active' : ''}}" id="group_{{$plan_group->id}}" role="tabpanel" aria-labelledby="photographer-tab">
                                    <div class="subs-plan-wrap">
                                        <div class="row continu-text-gap justify-content-center">
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-12">
                                                <p class="plan-wrap-text text-center">{{$plan_group->details}}</p>
                                            </div>
                                            
                                        </div>
                                        @if ($plan_group->id == Auth::user()->userDetails->getCategory->plan_group_id)
                                            <div class="subs-plan-list-wrap plan-row d-flex">
                                                <div class="subs-plan-list-wrap-lft plan-row-grid">
                                                    <div class="subs-plan-type">
                                                        <ul class="d-flex plan-type-list">
                                                            <li>
                                                                <input type="radio" id="yearly_{{$plan_group->id}}" name="plan_type[{{$plan_group->id}}]" value="yearly" class="plan_type" checked>
                                                                <label for="yearly_{{$plan_group->id}}">yearly</label>
                                                            </li>
                                                            <li>
                                                                <input type="radio" id="monthly_{{$plan_group->id}}" name="plan_type[{{$plan_group->id}}]" value="monthly" class="plan_type">
                                                                <label for="monthly_{{$plan_group->id}}">monthly</label>
                                                            </li>
                                                        </ul>
                                                        <div class="plan-list-text-wrap margintop-20">
                                                            @if (count($plan_group->plan_attr_name) > 0)
                                                                @foreach ($plan_group->plan_attr_name as $attr)
                                                                    <div class="plan-list-text padding-10">{{$attr->name}}</div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="subs-plan-list-wrap-rgt plan-row-grid">
                                                    <div class="subs-plan-details-box-wrap d-flex plan-row">
                                                        @if($plan_group->plans)
                                                            @foreach ($plan_group->plans as $plan)
                                                            @php
                                                                $plan_colour = '';
                                                                $plan_name = strtolower($plan->name);
                                                                if($plan_name == 'free'){
                                                                    $plan_colour = 'free_plan';
                                                                }elseif ($plan_name == 'platinum') {
                                                                    $plan_colour = 'platinum_plan';
                                                                }elseif ($plan_name == 'gold') {
                                                                    $plan_colour = 'gold_plan';
                                                                }elseif ($plan_name == 'silver') {
                                                                    $plan_colour = 'silver_plan';
                                                                }elseif ($plan_name == 'bronze') {
                                                                    $plan_colour = 'bronze_plan';
                                                                }else {
                                                                    $plan_colour = '';
                                                                }
                                                            @endphp
                                                            <div class="subs-plan-details-box plan-row-grid {{$plan_colour}}">
                                                                <div class="subs-plan-name">{{$plan->name}}</div>
                                                                <div class="plan-list-text-wrap wrap-bg margintop-20 yearly_plan">
                                                                    
                                                                    @if ($plan->planDetails)
                                                                        @foreach ($plan->planDetails as $key=>$plan_detail)
                                                                            <div class="plan-list-text padding-10">{{$key == 0 ? '$ ':''}}
                                                                            @if ($plan_detail->yearly_value == 'yes')
                                                                                <i class="fas fa-check"></i>
                                                                            @elseif ($plan_detail->yearly_value == 'no')   
                                                                                <i class="fas fa-times"></i>
                                                                            @else 
                                                                                {{$plan_detail->yearly_value}}       
                                                                            @endif
                                                                        </div>
                                                                        @endforeach
                                                                    @endif
                                                                    <div class="plan-list-select">
                                                                        <li>
                                                                            <input type="radio" id="{{$plan_name}}_box_yearly" name="plan[]" class="select_plan" value="{{$plan->id}}">
                                                                            <label for="{{$plan_name}}_box_yearly">select</label>
                                                                        </li>
                                                                    </div>
                                                                </div>
                                                                <div class="plan-list-text-wrap wrap-bg margintop-20 monthly_plan">
                                                                    
                                                                    @if ($plan->planDetails)
                                                                        @foreach ($plan->planDetails as $key=>$plan_detail)
                                                                            <div class="plan-list-text padding-10">{{$key == 0 ? '$ ':''}}
                                                                            @if ($plan_detail->monthly_value == 'yes')
                                                                                <i class="fas fa-check"></i>
                                                                            @elseif ($plan_detail->monthly_value == 'no')   
                                                                                <i class="fas fa-times"></i>
                                                                            @else 
                                                                                {{$plan_detail->monthly_value}}       
                                                                            @endif
                                                                        </div>
                                                                        @endforeach
                                                                    @endif
                                                                    <div class="plan-list-select">
                                                                        <li>
                                                                            <input type="radio" id="{{$plan_name}}_box_monthly" name="plan[]" class="select_plan" value="{{$plan->id}}">
                                                                            <label for="{{$plan_name}}_box_monthly">select</label>
                                                                        </li>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            @endforeach 
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif 
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="continue-plan">
                                <button type="submit" id="submit" class="continue-plan-btn" data-plan-group="" data-plan-type="yearly" data-plan-v="">continue<i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row upgrade-gap">
            <div class="col-lg-6">
                <div class="plan-page-btm">
                    <h3>FAQs</h3>
                    <p>How do I cancel my paid subscription?</p>
                    <p>For security purposes, please write us on admin@americanmodel.net to cancel your membership.</p>
                    <p>NOTE: The scheduled payment MUST be canceled at least three (3) days prior to the scheduled date of the next payment. Canceling a Subscription on the day of a scheduled payment will not guarantee that the payment will not be sent.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="plan-page-btm">
                    <h3>How do I upgrade my membership?</h3>
                    <ul class="upgrade-plan">
                        <li>1. Log in to your “American Model” account.</li>
                        <li>2. Click the gear icon at the top right of the screen and then click 'Settings.'</li>
                        <li>3. Click the 'My Membership' link on the menu on the left.</li>
                        <li>4. Click the blue 'Change' button.</li>
                    </ul>
                    <p>You will be able to select whichever plan you want and then the system will guide you through the payment process.</p>
                </div>
            </div>
        </div>
    </div> 
</section>
@endsection
@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>

        $(document).ready(function(){
            $('.monthly_plan').hide();
            $('#submit').attr('data-plan-group',$('.nav-link.active').data('group-id'));
            
            $(document).on('change','.plan_type',function(){
                $('#submit').attr('data-plan-v','');
                if(this.value == 'monthly'){
                    $('.monthly_plan').show();
                    $('.yearly_plan').hide();
                    $('#submit').attr('data-plan-type','monthly');
                }else if(this.value == 'yearly'){
                    $('.yearly_plan').show();
                    $('.monthly_plan').hide();
                    $('#submit').attr('data-plan-type','yearly');
                }
            });

            $(document).on('click','.nav-link',function(){
                $('#submit').attr('data-plan-type','yearly');
                $("#yearly_"+$(this).data("group-id")).prop("checked", true);
                $('#submit').attr('data-plan-v','');
                $('#submit').attr('data-plan-group',$(this).data("group-id"));

            });

            $(document).on('click','.select_plan',function(e){
                //alert($(this).val());
                $('#submit').attr('data-plan-v',$(this).val());
            });

            $(document).on('click','#submit',function(e){
                //e.preventDefault();
                var plan = $(this).attr('data-plan-v');
                console.log(plan);
                if(plan == ''){
                    toastr.error('Please select a plan!');
                    return false;
                }

                var plan_group_id = $(this).data("plan-group");
                var plan_type = $(this).data('plan-type');
                
                $.ajax({
                    url: "{{route('user.store.plan')}}",
                    type: "POST",
                    data: {
                        plan_group_id: plan_group_id,
                        plan_type: plan_type,
                        plan: plan,
                        _token: csrf
                    },
                    //dataType: 'json',
                    success: function(data) {
                        if(data.redirect_url){
                            window.location=data.redirect_url; // or {{url('login')}}
                        }
                    }
                });
                
            });
            
        });
    </script>
@endpush