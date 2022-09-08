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
                <div class="raiser-dtls-tab">
                    <div class="plan-tab responsive-tabs-dtls">
                        <ul class="nav nav-pills nav-tabs nav-justified" role="tablist">
                            @if ($plan_groups)
                            @foreach ($plan_groups as $pln_group_key => $plan_group)
                            {{-- <li class="nav-item" role="presentation"> --}}
                                @php
                                    $disable = '';
                                    if($plan_group->name == 'Non Industry' || $plan_group->name == 'Manager And Agencies'){
                                        $disable = 'disable';
                                    }
                                @endphp
                                 <li class="nav-item {{$disable}}">
                                    <a id="tab-A" href="#group_{{$plan_group->id}}" class="nav-link {{$pln_group_key == 0 ? 'active':''}} {{$disable}}" data-bs-toggle="tab" role="tab" data-group-id="{{$plan_group->id}}">{{$plan_group->name}}</a>
                                </li>
                                {{-- <button class="nav-link {{$pln_group_key == 0 ? 'active':''}} {{$disable}}" id="model-actore-tab" data-bs-toggle="tab" data-bs-target="#group_{{$plan_group->id}}" type="button" role="tab" aria-controls="model-actore" aria-selected="true" data-group-id="{{$plan_group->id}}">{{$plan_group->name}}</button> --}}
                              {{-- </li> --}}
                            @endforeach
                        @endif
                           
                        </ul>
                
                        {{-- Mobile view --}}
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
                            </div>   --}} 
                            @if ($plan_groups)
                                @foreach ($plan_groups as $pln_group_key => $plan_group)
                                    @php
                                        $disable = '';
                                        if($plan_group->name == 'Non Industry' || $plan_group->name == 'Manager And Agencies'){
                                            $disable = 'disable';
                                        }
                                    @endphp                 
                                    <div id="group_{{$plan_group->id}}"  class="card tab-pane fade {{$pln_group_key == 0 ? 'show active' : ''}} {{$disable}}" role="tabpanel" aria-labelledby="tab-B">
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
                                                <div class="subs-plan-wrap">
                                                    <div class="row continu-text-gap justify-content-center">
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-12">
                                                            <p class="plan-wrap-text text-center">{{$plan_group->details}}</p>
                                                        </div>
                                                        
                                                    </div>
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
                                                                                <a href="{{route('signup')}}" class="subs-plan-btn-select">select</a>
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
                                                                                <a href="{{route('signup')}}" class="subs-plan-btn-select">select</a>
                                                                            </div>
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
                                @endforeach
                            @endif                              
                        </div>
                        
                    </div>
                </div>
                {{-- <div class="plan-tab">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        @if ($plan_groups)
                            @foreach ($plan_groups as $pln_group_key => $plan_group)
                            <li class="nav-item" role="presentation">
                                @php
                                    $disable = '';
                                    if($plan_group->name == 'Non Industry' || $plan_group->name == 'Manager And Agencies'){
                                        $disable = 'disable';
                                    }
                                @endphp
                                <button class="nav-link {{$pln_group_key == 0 ? 'active':''}} {{$disable}}" id="model-actore-tab" data-bs-toggle="tab" data-bs-target="#group_{{$plan_group->id}}" type="button" role="tab" aria-controls="model-actore" aria-selected="true" data-group-id="{{$plan_group->id}}">{{$plan_group->name}}</button>
                              </li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @if ($plan_groups)
                            @foreach ($plan_groups as $pln_group_key => $plan_group)
                                <div class="tab-pane fade {{$pln_group_key == 0 ? 'show active' : ''}}" id="group_{{$plan_group->id}}" role="tabpanel" aria-labelledby="photographer-tab">
                                    <div class="subs-plan-wrap">
                                        <div class="row continu-text-gap justify-content-center">
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-12">
                                                <p class="plan-wrap-text text-center">{{$plan_group->details}}</p>
                                            </div>
                                            
                                        </div>
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
                                                                    <a href="{{route('signup')}}" class="subs-plan-btn-select">select</a>
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
                                                                    <a href="{{route('signup')}}" class="subs-plan-btn-select">select</a>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        @endforeach 
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div> --}}
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
    <script>

        $(document).ready(function(){
            $('.monthly_plan').hide();
            $(document).on('change','.plan_type',function(){
                if(this.value == 'monthly'){
                    $('.monthly_plan').show();
                    $('.yearly_plan').hide();
                }else if(this.value == 'yearly'){
                    $('.yearly_plan').show();
                    $('.monthly_plan').hide();
                }
            });

            $(document).on('click','.nav-link',function(){
                $("#yearly_"+$(this).data("group-id")).prop("checked", true);

            });
            
        });
    </script>
@endpush