@extends('layouts.app')
@section('content')
<section class="my-account-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>My Account</h3>
                </div>
            </div>
        </div>
        <div class="user-dashboard-wrap d-flex for-my-account">
            @include('includes.myaccount')
            {{-- <div class="user-dashboard-lft">
                <div class="account-menu">
                    <ul>
                        <li class="{{ request()->is('myaccount/account') ? 'open' : '' }}"><a href="javascript:;" class="icon-menu">general</a>
                            <ul class="submenu">
                                <li><a href="{{route('user.account')}}" class="{{ request()->is('myaccount/account') ? 'active' : '' }}">account</a></li>
                                <li><a href="#">change password</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;" class="icon-menu">privecy</a>
                            <ul class="submenu">
                                <li><a href="#" class="">Display Options</a></li>
                                <li><a href="#">Blocked People</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;" class="icon-menu">membership</a>
                            <ul class="submenu">
                                <li><a href="#" class="">My Membership</a></li>
                                <li><a href="#">My Billing</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;" class="icon-menu">subscription</a>
                            <ul class="submenu">
                                <li><a href="#" class="">My Subscriptions</a></li>
                                <li><a href="#">My Subscribers</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div> --}}
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
                                    <h4>account</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('user.account.update')}}" method="post" id="my_account_frm">
                        @csrf
                        <div class="usser-acc-edit-wrap">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-input edit-gap">
                                        <label>First Name</label>
                                        <input type="text" class="form-control edit-input-style @if($errors->has('first_name')) error @endif" placeholder="First Name" name="first_name" value="{{@$user->userDetails->first_name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-input edit-gap">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control edit-input-style @if($errors->has('middle_name')) error @endif" placeholder="Middle Name" name="middle_name" value="{{@$user->userDetails->middle_name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-input edit-gap">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control edit-input-style @if($errors->has('last_name')) error @endif" placeholder="Last Name" name="last_name" value="{{@$user->userDetails->last_name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-input edit-gap">
                                        <label>DOB</label>
                                        <input type="date" class="form-control edit-input-style @if($errors->has('dob')) error @endif" name="dob" value="@if(isset($user)){{$user->userDetails->dob}}@endif">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-select-wrap edit-gap">
                                        <label>Gender</label>
                                        <select class="form-control edit-select-style selectOption @if($errors->has('gender')) error @endif" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="">Please Select Gender</option>
                                        <option value="1" @if(isset($user) && $user->userDetails->gender == 1) selected @endif>Male</option>
                                        <option value="2"  @if(isset($user) && $user->userDetails->gender == 2) selected @endif>Female</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-input edit-gap">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control edit-input-style @if($errors->has('email')) error @endif" value="{{$user->email}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="save-cng-text">
                                        <p>To save these settings, please enter your password.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-input edit-gap">
                                        <label>Password</label>
                                        <input type="password" class="form-control edit-input-style @if($errors->has('password')) error @endif" placeholder="Enter Current Password" name="password">
                                    </div>
                                </div>
                                <div class="edit-save-btn-wrap">
                                    <button type="submit" class="edit-save-btn">save change</button>
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
            $('#my_account_frm').validate({
                rules: {
                    name: {
                        required:true,
                    },
                    gender: {
                        required:true,
                    },
                    dob :{
                        required:true,
                    },
                    email :{
                        required:true,
                    },
                    password :{
                        required:true,
                    },
                },
            });

        });
       

    </script>
@endpush