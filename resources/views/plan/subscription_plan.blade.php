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
                        <ul class="nav nav-pills nav-tabs nav-justified add_active_class" role="tablist" data-color-index="1">
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
                                <li class="nav-item color-{{$index}} " data-key-index="{{$index}}">
                                    <a id="tab-A" href="#group_{{$plan_group->id}}" class="nav-link {{$pln_group_key == 0 ? 'active':''}}" data-bs-toggle="tab" data-group-id="{{$plan_group->id}}" role="tab">{{$plan_group->name}}</a>
                                </li>
                                @endforeach
                            @endif
                            {{-- <li class="nav-item second">
                                <a id="tab-B" href="#pane-B" class="nav-link active" data-bs-toggle="tab" role="tab">Photographer & others</a>
                            </li>
                            <li class="nav-item third">
                                <a id="tab-C" href="#pane-C" class="nav-link" data-bs-toggle="tab" role="tab">Manager & Agencies</a>
                            </li>
                            <li class="nav-item fourth">
                                <a id="tab-D" href="#pane-D" class="nav-link" data-bs-toggle="tab" role="tab">Non Industry</a>
                            </li> --}}
                        </ul>
                
                        <div id="content" class="tab-content" role="tablist">
                            {{-- <div id="pane-A" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-A">
                                <div class="card-header" role="tab" id="heading-A">
                                    <h5 class="mb-0">
                                        <a data-bs-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
                                            Model & Actors
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-A" class="collapse" data-bs-parent="#content" role="tabpanel"
                                    aria-labelledby="heading-A">
                                    <div class="card-body">
                                        <div class="found-dtls-tab-text">
                                            <p>As the country heals, it still feels like we're lagging where hunger still remains an urgency even if the pandemic is not.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}  
                            @if ($plan_groups)
                                @foreach ($plan_groups as $pln_group_key => $plan_group)   
                                    @php
                                        $disable = '';
                                        if($plan_group->name == 'Non Industry' || $plan_group->name == 'Manager And Agencies'){
                                            $disable = 'disable';
                                        }
                                    @endphp                 
                                    <div id="group_{{$plan_group->id}}" class="card tab-pane fade {{$pln_group_key == 0 ? 'show active' : ''}} " role="tabpanel" aria-labelledby="tab-B">
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
                                                    <div class="plan-row d-flex d-md-none align-items-center justify-content-end mb-3">
                                                        <div class="plan-row-grid plan-select-mob">
                                                            <select class="form-control selectOptionBdr planSelector" id="planSelector">
                                                                @if($plan_group->plans)
                                                                    @foreach ($plan_group->plans as $plan)
                                                                        <option value="{{ $plan->name}}_{{$plan_group->id}}">{{ $plan->name }}</option>
                                                                        {{-- <option value="silver-mob">Silver</option>
                                                                        <option value="gold-mob">Gold</option>
                                                                        <option value="platinum-mob">Platinum</option> --}}
                                                                    @endforeach
                                                                @endif
                                                            </select>
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
                                                                        <div class="all-plan-row-grid allplan-list-box {{$plan_name == 'gold' ? 'plan-gold' : ''}} only-mobile d-md-block" id="{{ $plan->name }}_{{$plan_group->id}}">
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
                                                                            <div class="allplan-select-wrap">
                                                                                <button type="button" class="allplan-select-btn select_btn">select</button>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach 
                                                                @endif
                                                                {{-- <div class="all-plan-row-grid allplan-list-box">
                                                                    <div class="allplan-list-box-head">silver</div>
                                                                    <div class="allplan-list-box-dtls">
                                                                        <div class="allplan-typelist-price padding-10">$79.99</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">
                                                                            <span class="available">
                                                                                <i class="fas fa-check-circle"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                    </div>
                                                                    <div class="allplan-select-wrap">
                                                                        <button type="submit" class="allplan-select-btn">select</button>
                                                                    </div>
                                                                </div>
                                                                <div class="all-plan-row-grid allplan-list-box plan-gold">
                                                                    <div class="allplan-list-box-head add-tag">
                                                                        gold
                                                                        <span class="gold-tag">
                                                                            <img class="img-block" src="images/gold.png">
                                                                        </span>
                                                                    </div>
                                                                    <div class="allplan-list-box-dtls">
                                                                        <div class="allplan-typelist-price padding-10">$279.99</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">
                                                                            <span class="available">
                                                                                <i class="fas fa-check-circle"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="allplan-typelist padding-10">
                                                                            <span class="not-available">
                                                                                <i class="fas fa-times-circle"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="allplan-typelist padding-10">
                                                                            <span class="not-available">
                                                                                <i class="fas fa-times-circle"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                    </div>
                                                                    <div class="allplan-select-wrap">
                                                                        <button type="submit" class="allplan-select-btn">select</button>
                                                                    </div>
                                                                </div>
                                                                <div class="all-plan-row-grid allplan-list-box">
                                                                    <div class="allplan-list-box-head">platinum</div>
                                                                    <div class="allplan-list-box-dtls">
                                                                        <div class="allplan-typelist-price padding-10">$279.99</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">
                                                                            <span class="not-available">
                                                                                <i class="fas fa-times-circle"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                        <div class="allplan-typelist padding-10">18</div>
                                                                    </div>
                                                                    <div class="allplan-select-wrap">
                                                                        <button type="submit" class="allplan-select-btn">select</button>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                @endforeach
                            @endif                              
                            {{-- <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                                <div class="card-header" role="tab" id="heading-C">
                                    <h5 class="mb-0">
                                        <a data-bs-toggle="collapse" href="#collapse-C" aria-expanded="true" aria-controls="collapse-C">
                                            Manager & Agencies
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-C" class="collapse" data-bs-parent="#content" role="tabpanel"
                                    aria-labelledby="heading-C">
                                    <div class="card-body">
                                        [Tab content C]
                                    </div>
                                </div>
                            </div>
                            <div id="pane-D" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-D">
                                <div class="card-header" role="tab" id="heading-D">
                                    <h5 class="mb-0">
                                        <a data-bs-toggle="collapse" href="#collapse-D" aria-expanded="true" aria-controls="collapse-D">
                                            Non Industry
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-D" class="collapse" data-bs-parent="#content" role="tabpanel"
                                    aria-labelledby="heading-D">
                                    <div class="card-body">
                                        [Tab content d]
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        
                    </div>
                </div>
                <div class="row upgrade-gap">
                    <div class="col-lg-6">
                        <div class="plan-page-btm sdw-box rds-box">
                            <h3>FAQs</h3>
                            {!! $settings->plan_faq !!}
                            {{-- <p>How do I cancel my paid subscription?</p>
                            <p>For security purposes, please write us on admin@americanmodel.net to cancel your membership.</p>
                            <p>NOTE: The scheduled payment MUST be canceled at least three (3) days prior to the scheduled date of the next payment. Canceling a Subscription on the day of a scheduled payment will not guarantee that the payment will not be sent.</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="plan-page-btm rds-box">
                            <h3>How do I upgrade my membership?</h3>
                            {!! $settings->plan_hw_do_upgrade !!}
                            {{-- <ul class="upgrade-plan">
                                <li>1. Log in to your “American Model” account.</li>
                                <li>2. Click the gear icon at the top right of the screen and then click 'Settings.'</li>
                                <li>3. Click the 'My Membership' link on the menu on the left.</li>
                                <li>4. Click the blue 'Change' button.</li>
                            </ul>
                            <p>You will be able to select whichever plan you want and then the system will guide you through the payment process.</p> --}}
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
            $('.monthly_plan').hide();
            $(document).on('change','.plan_type',function(){
                //console.log($(this).is(':checked'));
                if($(this).is(':checked')){
                    $('.monthly_plan').show();
                    $('.yearly_plan').hide();
                }else {
                    $('.yearly_plan').show();
                    $('.monthly_plan').hide();
                }
            });

            $(document).on('click','.nav-link',function(){
                $("#yearly_"+$(this).data("group-id")).prop("checked", true);

            });

            $(document).on('click','.select_btn',function(){
                var url = "{{route('signup')}}";
                $(location).attr('href',url);
            })

            $(document).on('click','.nav-item',function(){
                var key_number = $(this).data('key-index');
                var nav_active_colour_index = $(".add_active_class").attr('data-color-index');
                //console.log(nav_active_colour_index);
                $(".add_active_class").removeClass("active-"+nav_active_colour_index);
                $(".add_active_class").addClass("active-"+key_number);
                $(".add_active_class").attr('data-color-index',key_number);
            })
            
        });
    </script>
@endpush