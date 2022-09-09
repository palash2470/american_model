@extends('layouts.app')
@section('content')
<section class="my-account-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Display Options</h3>
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
                                    <h4>Display Options</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('user.display_option.update')}}" method="post" id="display_option_frm">
                        @csrf
                        <div class="usser-acc-edit-wrap">
                            <div class="row">
                                <div class="col-12">
                                    <div class="model-head-info">
                                        <div class="model-head-details">
                                            <div class="row">
                                                <div class="col-lg-3 d-flex align-items-start">
                                                    <h4>Age</h4>
                                                </div>
                                                <div class="col-lg-9">
                                                    <ul class="model-head-listing d-flex flex-wrap">
                                                        <li class="radio">
                                                            <input type="radio" id="age_private" value="3" name="age_display" @if(isset($displayOption) && $displayOption->age_display == 3) checked @endif>
                                                            <label for="age_private">PRIVATE</label>
                                                        </li>
                                                        <li class="radio">
                                                            <input type="radio" id="age_member" value="2" name="age_display"  @if(isset($displayOption) && $displayOption->age_display == 2) checked @endif>
                                                            <label for="age_member">MEMBERS</label>
                                                        </li>
                                                        <li class="radio">
                                                            <input type="radio" id="age_public" value="1" name="age_display"  @if(isset($displayOption) && $displayOption->age_display == 1) checked @elseif(!isset($displayOption)) checked @endif>
                                                            <label for="age_public">PUBLIC</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="model-head-details">
                                            <div class="row">
                                                <div class="col-lg-3 d-flex align-items-start">
                                                    <h4>Weight</h4>
                                                </div>
                                                <div class="col-lg-9">
                                                    <ul class="model-head-listing d-flex flex-wrap">
                                                        <li class="radio">
                                                            <input type="radio" id="weight_private" value="3" name="weight_display"  @if(isset($displayOption) && $displayOption->weight_display == 3) checked @endif>
                                                            <label for="weight_private">PRIVATE</label>
                                                        </li>
                                                        <li class="radio">
                                                            <input type="radio" id="weight_member" value="2" name="weight_display"  @if(isset($displayOption) && $displayOption->weight_display == 2) checked @endif>
                                                            <label for="weight_member">MEMBERS</label>
                                                        </li>
                                                        <li class="radio">
                                                            <input type="radio" id="weight_public" value="1" name="weight_display" @if(isset($displayOption) && $displayOption->weight_display == 1) checked @elseif(!isset($displayOption)) checked @endif>
                                                            <label for="weight_public">PUBLIC</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="model-head-details">
                                            <div class="row">
                                                <div class="col-lg-3 d-flex align-items-start">
                                                    <h4>My Comments</h4>
                                                </div>
                                                <div class="col-lg-9">
                                                    <ul class="model-head-listing d-flex flex-wrap">
                                                        <li class="radio">
                                                            <input type="radio" id="my_comment_private" value="3" name="my_comment_display"  @if(isset($displayOption) && $displayOption->my_comment_display == 3) checked @endif>
                                                            <label for="my_comment_private">PRIVATE</label>
                                                        </li>
                                                        <li class="radio">
                                                            <input type="radio" id="my_comment_member" value="2" name="my_comment_display"  @if(isset($displayOption) && $displayOption->my_comment_display == 2) checked @endif>
                                                            <label for="my_comment_member">MEMBERS</label>
                                                        </li>
                                                        <li class="radio">
                                                            <input type="radio" id="my_comment_public" value="1" name="my_comment_display" @if(isset($displayOption) && $displayOption->my_comment_display == 1) checked @elseif(!isset($displayOption)) checked @endif>
                                                            <label for="my_comment_public">PUBLIC</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="model-head-details">
                                            <div class="row">
                                                <div class="col-lg-3 d-flex align-items-start">
                                                    <h4>Picture Comments</h4>
                                                </div>
                                                <div class="col-lg-9">
                                                    <ul class="model-head-listing d-flex flex-wrap">
                                                        <li class="radio">
                                                            <input type="radio" id="pic_comment_private" value="3" name="pic_comment_display"  @if(isset($displayOption) && $displayOption->pic_comment_display == 3) checked @endif>
                                                            <label for="pic_comment_private">PRIVATE</label>
                                                        </li>
                                                        <li class="radio">
                                                            <input type="radio" id="pic_comment_member" value="2" name="pic_comment_display"  @if(isset($displayOption) && $displayOption->pic_comment_display == 2) checked @endif>
                                                            <label for="pic_comment_member">MEMBERS</label>
                                                        </li>
                                                        <li class="radio">
                                                            <input type="radio" id="pic_comment_public" value="1" name="pic_comment_display" @if(isset($displayOption) && $displayOption->pic_comment_display == 1) checked @elseif(!isset($displayOption)) checked @endif>
                                                            <label for="pic_comment_public">PUBLIC</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
            $('#display_option_frm').validate({
                rules: {
                    age_display: {
                        required:true,
                    },
                    weight_display: {
                        required:true,
                    },
                    my_comment_display :{
                        required:true,
                    },
                    pic_comment_display :{
                        required:true,
                    },
                },
            });

        });
       

    </script>
@endpush