@extends('layouts.app')
@section('content')
<section class="my-account-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>My Membership</h3>
                </div>
            </div>
        </div>
        <div class="user-dashboard-wrap d-flex for-my-account">
            @include('includes.myaccount')
            <div class="user-dashboard-rgt">
                <div class="usser-acc-edit">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <span class="my-acc-menu-btn user_acc_menu">
                                    <button type="button">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </span>
                                <div class="edit-head-text">
                                    <h4>Membership</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('user.display_option.update')}}" method="post" id="display_option_frm">
                        @csrf
                        <div class="usser-acc-edit-wrap">
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th class="">Members</th>
                                                <th class="">Plan</th>
                                                <th class="">Expiry</th>
                                                <th class="">Price</th>
                                                <th class="">Recurring</th>
                                                <th class="">Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <tr class="">
                                                    @if ($userPlan)
                                                        <td class="">{{Auth::user()->category->name}}</td>
                                                        <td>
                                                        <span class="">{{$userPlan->plan->name}}</span>
                                                        </td>
                                                        <td class="">{{$userPlan->expiry}}</td>
                                                        <td class="">${{$userPlan->price}}</td>
                                                        <td class="">{{ucfirst($userPlan->plan_type)}}</td>
                                                        <td class="text-left capitalize ">Active</td>
                                                        <td>
                                                        <a class="" href="{{route('user.registration.plan')}}">Change Plan</a>
                                                        </td>
                                                    @else
                                                    <td colspan="4">No Records Found.</td>
                                                    @endif
                                                </tr>
                                            
                                            
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                            
                        </div>
                    </form>
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

            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif


            $(document).on('click', '.account-menu li a', function(){            
                $('.account-menu li').removeClass('open');
                $(this).parent().addClass('open');
            });

            /* Validation  */
           

        });
       

    </script>
@endpush