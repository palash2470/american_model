@extends('layouts.app')
@section('content')
<section class="galleries">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3 class="clr-red">membership plans</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="plan-sect-wrap">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="all-plans">
                    <div class="all-plan-tab all-plans-responsive">
                        <ul class="nav nav-pills nav-tabs nav-justified add_active_class" role="tablist">
                            @if ($plan_groups)
                                @php
                                    $index = 0;
                                @endphp
                                @foreach ($plan_groups as $pln_group_key => $plan_group)
                                    @php
                                        $disable = '';
                                        if($plan_group->name == 'Non Industry' || $plan_group->name == 'Manager And Agencies'){
                                            $disable = 'disable';
                                        }
                                        if ($pln_group_key % 4 == 0) {
                                            $index = 0;
                                        }
                                        $index++;
                                    @endphp
                                    <li class="nav-item color-{{$index}} {{$disable}}" >
                                        <a id="tab-A" href="#group_{{$plan_group->id}}" class="nav-link {{$plan_group->id == Auth::user()->userDetails->getCategory->plan_group_id ? 'active':'disable'}}" data-bs-toggle="tab" data-group-id="{{$plan_group->id}}" role="tab" data-key-index="{{$plan_group->id == Auth::user()->userDetails->getCategory->plan_group_id ? $index:''}}">{{$plan_group->name}}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                
                        <div id="content" class="tab-content" role="tablist">
                            @if ($plan_groups)
                                @foreach ($plan_groups as $pln_group_key => $plan_group)   
                                    @if ($plan_group->id == Auth::user()->userDetails->getCategory->plan_group_id)               
                                        <div id="group_{{$plan_group->id}}" class="card tab-pane fade {{$plan_group->id == Auth::user()->userDetails->getCategory->plan_group_id ? 'show active' : ''}}" role="tabpanel" aria-labelledby="tab-B">
                                            <div class="card-header" role="tab" id="heading-B">
                                                <h5 class="mb-0">
                                                    <a class="collapsed" data-bs-toggle="collapse" href="#collapse-{{$plan_group->id}}" aria-expanded="false"
                                                        aria-controls="collapse-B">
                                                        {{$plan_group->name}}
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse-{{$plan_group->id}}" class="collapse {{$pln_group_key == 0 ? 'show' : ''}}" data-bs-parent="#content" role="tabpanel"
                                                aria-labelledby="heading-B">
                                                <div class="card-body">
                                                    <div class="all-plan-wrap">
                                                        <div class="all-plan-row d-flex flex-wrap allplan-text-gap">
                                                            <div class="all-plan-row-grid allplan-toggle-wrap">
                                                                <div class="allplan-choose">
                                                                    <div class="d-flex align-items-center">
                                                                        <span>yearly</span>
                                                                            <label class="switch">
                                                                                <input type="checkbox" name="plan_type" value="yearly" class="plan_type">
                                                                                <span class="slider round"></span>
                                                                            </label>
                                                                        <span>monthly</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="all-plan-row-grid allplan-wrap-text">
                                                                <p><strong>All Plans include:</strong> {{$plan_group->details}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="all-plan-row d-flex">
                                                            <div class="all-plan-row-grid allplan-list-lft">
                                                                <div class="name-list head-gap">
                                                                    @if (count($plan_group->plan_attr_name) > 0)
                                                                        @foreach ($plan_group->plan_attr_name as $attrkey=>$attr)
                                                                            <div class="{{$attrkey == 0 ? 'allplan-namelist-head' : 'allplan-namelist'}} padding-10">{{$attr->name}}</div>
                                                                        @endforeach
                                                                    @endif
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="all-plan-row-grid allplan-list-rgt">
                                                                <div class="allplan-list-wrap d-flex all-plan-row">
                                                                    @if($plan_group->plans)
                                                                        @foreach ($plan_group->plans as $plan)
                                                                            @php
                                                                                //$plan_colour = '';
                                                                                $plan_name = strtolower($plan->name);
                                                                                /* if($plan_name == 'free'){
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
                                                                                } */
                                                                            @endphp
                                                                            <div class="all-plan-row-grid allplan-list-box {{$plan_name == 'gold' ? 'plan-gold' : ''}}">
                                                                                <div class="allplan-list-box-head {{$plan_name == 'gold' ? 'add-tag' : ''}}">{{$plan->name}}
                                                                                    @if ($plan_name == 'gold')
                                                                                        <span class="gold-tag">
                                                                                            <img class="img-block" src="{{url('images/gold.png')}}">
                                                                                        </span>
                                                                                    @endif
                                                                                    
                                                                                </div>
                                                                                <div class="allplan-list-box-dtls yearly_plan">
                                                                                    @if ($plan->planDetails)
                                                                                        @foreach ($plan->planDetails as $key=>$plan_detail)
                                                                                            <div class="{{$key == 0 ? 'allplan-typelist-price':'allplan-typelist'}} padding-10">{{$key == 0 ? '$ ':''}}
                                                                                                @if ($plan_detail->yearly_value == 'yes')
                                                                                                    <span class="available">
                                                                                                        <i class="fas fa-check-circle"></i>
                                                                                                    </span>
                                                                                                @elseif ($plan_detail->yearly_value == 'no')   
                                                                                                <span class="not-available">
                                                                                                    <i class="fas fa-times-circle"></i>
                                                                                                </span>
                                                                                                @else 
                                                                                                    {{$plan_detail->yearly_value}}       
                                                                                                @endif
                                                                                            </div>
                                                                                        
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                                <div class="allplan-list-box-dtls monthly_plan">
                                                                                    @if ($plan->planDetails)
                                                                                        @foreach ($plan->planDetails as $key=>$plan_detail)
                                                                                            <div class="{{$key == 0 ? 'allplan-typelist-price':'allplan-typelist'}} padding-10">{{$key == 0 ? '$ ':''}}
                                                                                                @if ($plan_detail->monthly_value == 'yes')
                                                                                                    <span class="available">
                                                                                                        <i class="fas fa-check-circle"></i>
                                                                                                    </span>
                                                                                                @elseif ($plan_detail->monthly_value == 'no')   
                                                                                                <span class="not-available">
                                                                                                    <i class="fas fa-times-circle"></i>
                                                                                                </span>
                                                                                                @else 
                                                                                                    {{$plan_detail->monthly_value}}       
                                                                                                @endif
                                                                                            </div>
                                                                                        
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                                <input type="hidden" id="plan_type" value="">
                                                                                <div class="allplan-select-wrap">
                                                                                    <button type="button" id="submit" class="allplan-select-btn select_btn" data-plan-v="{{$plan->id}}" data-plan-type="" data-plan-group="{{$plan_group->id}}">select</button>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach 
                                                                    @endif
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    @endif 
                                @endforeach
                            @endif                              
                            
                        </div>
                        
                    </div>
                </div>
                <div class="row upgrade-gap">
                    <div class="col-lg-6">
                        <div class="plan-page-btm sdw-box rds-box">
                            <h3>FAQs</h3>
                            <p>How do I cancel my paid subscription?</p>
                            <p>For security purposes, please write us on cs@onemodelplace.com to cancel your membership.</p>
                            <p>NOTE: The scheduled payment MUST be canceled at least three (3) days prior to the scheduled date of the next payment. Canceling a Subscription on the day of a scheduled payment will not guarantee that the payment will not be sent.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="plan-page-btm rds-box">
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
            $('#plan_type').val('yearly');
            var key_number = $('.active').data('key-index');
            $(".add_active_class").addClass("active-"+key_number);
            //console.log(key_number);
            $(document).on('change','.plan_type',function(){
                if($(this).is(':checked')){
                    $('.monthly_plan').show();
                    $('.yearly_plan').hide();
                    //$('.plan_type').attr('data-plan-type','monthly');
                    $('#plan_type').val('monthly');
                }else {
                    $('.yearly_plan').show();
                    $('.monthly_plan').hide();
                    //$('.select_btn').attr('data-plan-type','yearly');
                    $('#plan_type').val('yearly');
                }
            });

            $(document).on('click','#submit',function(e){
                //e.preventDefault();
                var plan = $(this).attr('data-plan-v');
                //console.log(plan);
                if(plan == ''){
                    toastr.error('Please select a plan!');
                    return false;
                }

                var plan_group_id = $(this).data("plan-group");
                //console.log(plan_group_id);
                //var plan_type = $(this).data('plan-type');
                var plan_type = $('#plan_type').val();
                //console.log(plan_type);
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