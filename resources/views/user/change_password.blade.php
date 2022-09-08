@extends('layouts.app')
@section('content')
<section class="my-account-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Change Password</h3>
                </div>
            </div>
        </div>
        <div class="user-dashboard-wrap d-flex for-my-account">
            @include('includes.myaccount')
            <div class="user-dashboard-rgt">
                <div class="usser-acc-edit">
                    <div class="row">
                        <div class="col-12">
                            <div class="edit-head-text">
                                <h4>Change Password</h4>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('user.change_password.update')}}" method="post" id="change_pwd_frm">
                        @csrf
                        <div class="usser-acc-edit-wrap">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-input edit-gap">
                                        <label>Current Password</label>
                                        <input type="password" class="form-control edit-input-style @if($errors->has('current_password')) error @endif" placeholder="*******" name="current_password">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-input edit-gap">
                                        <label>New Password</label>
                                        <input type="password" class="form-control edit-input-style @if($errors->has('password')) error @endif" placeholder="*******" name="password" id="password">
                                    </div>
                                    @error('password')
                                        <div class="error">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="edit-select-wrap edit-gap">
                                        <label>Re-Type New Password</label>
                                        <input type="password" class="form-control edit-input-style @if($errors->has('password_confirmation')) error @endif" placeholder="*******" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <div class="edit-save-btn-wrap">
                                <button type="submit" class="edit-save-btn">Change Password</button>
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
        });
        
        
         /* Validation  */
         $('#change_pwd_frm').validate({
                rules: {
                    current_password: {
                        required:true,
                    },
                    password: {
                        required:true,
                        minlength: 6,
                        maxlength: 15,
                    },
                    password_confirmation : {
                        minlength : 6,
                        maxlength: 15,
                        equalTo : "#password"
                    }
                   
                },
            });

    </script>
@endpush