@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Setting</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    @include('flashmessage.flash-message')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Setting</h3> 
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{route('admin.setting.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id" value="{{$settings->id}}">
                        <div class="card-body">
                            <div class="settings-wrap">
                                <h4 class="settings-wrap-heading">Top Header Section</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="top_header_address">Address</label>
                                            <input type="text" name="top_header_address" class="form-control" id="top_header_address" placeholder="Address" value="{{@$settings->top_header_address}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="top_header_phone_no">Phone No</label>
                                            <input type="text" name="top_header_phone_no" class="form-control" id="top_header_phone_no" placeholder="Phone No" value="{{@$settings->top_header_phone_no}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="settings-wrap">
                                <h4 class="settings-wrap-heading">Membership Plans Faq & How do I upgrade my membership</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Faq</label>
                                            <textarea  class="summernote" name="plan_faq" style="display: none;">{{@$settings->plan_faq}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">How do I upgrade my membership</label>
                                            <textarea  class="summernote" name="plan_hw_do_upgrade" style="display: none;">{{@$settings->plan_hw_do_upgrade}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="settings-wrap">
                                <h4 class="settings-wrap-heading">Home Poll Section</h4>
                                <div class="form-group">
                                    <label for="home_poll_image">Background Image</label>
                                    <input type="file" name="home_poll_image" class="form-control" id="home_poll_image">
                                </div>
                            </div>
                            <div class="settings-wrap">
                                <h4 class="settings-wrap-heading">Home Shop Section</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="home_shop_image">Image</label>
                                            <input type="file" name="home_shop_image" class="form-control" id="home_shop_image">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="home_shop_category">Category Name</label>
                                            <input type="text" name="home_shop_category" class="form-control" id="home_shop_category" value="{{@$settings->home_shop_category}}" placeholder="Category Name">
                                        </div>   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="home_shop_discount">Discount (%)</label>
                                            <input type="text" name="home_shop_discount" class="form-control" id="home_shop_discount" value="{{@$settings->home_shop_discount}}" placeholder="Discount %">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="home_shop_details">Details</label>
                                            <input type="text" name="home_shop_details" class="form-control" id="home_shop_details" value="{{@$settings->home_shop_details}}" placeholder="Category Name">
                                        </div>   
                                    </div>
                                </div>
                            </div>
                            <div class="settings-wrap">
                                <h4 class="settings-wrap-heading">Home Page Section Enable/Disable </h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="newest_face">NEWEST FACES</label>
                                            <select class="form-control" name="newest_face" id="newest_face">
                                                <option value="1" @if(@$settings->newest_face == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->newest_face == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="featured_models">FEATURED MODELS</label>
                                            <select class="form-control" name="featured_models" id="featured_models">
                                                <option value="1" @if(@$settings->featured_models == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->featured_models == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="child_model_and_acting">CHILD MODELING AND ACTING</label>
                                            <select class="form-control" name="child_model_and_acting" id="child_model_and_acting">
                                                <option value="1" @if(@$settings->child_model_and_acting == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->child_model_and_acting == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="top_photographer">TOP PHOTOGRAPHERS</label>
                                            <select class="form-control" name="top_photographer" id="top_photographer">
                                                <option value="1" @if(@$settings->top_photographer == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->top_photographer == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="convention_and_trade_show_model">CONVENTION & TRADE SHOW MODELS
                                            </label>
                                            <select class="form-control" name="convention_and_trade_show_model" id="convention_and_trade_show_model">
                                                <option value="1" @if(@$settings->convention_and_trade_show_model == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->convention_and_trade_show_model == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="shop_section">SHOP SECTION
                                            </label>
                                            <select class="form-control" name="shop_section" id="shop_section">
                                                <option value="1" @if(@$settings->shop_section == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->shop_section == 0) selected @endif>Disable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="advertisement_section">ADVERTISEMENT SECTION
                                            </label>
                                            <select class="form-control" name="advertisement_section" id="advertisement_section">
                                                <option value="1" @if(@$settings->advertisement_section == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->advertisement_section == 0) selected @endif>Disable</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="settings-wrap">
                                <h4 class="settings-wrap-heading">Menu Enable/Disable </h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="menu_about_us">ABOUT US</label>
                                            <select class="form-control" name="menu_about_us" id="menu_about_us">
                                                <option value="1" @if(@$settings->menu_about_us == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->menu_about_us == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="menu_search">SEARCH</label>
                                            <select class="form-control" name="menu_search" id="menu_search">
                                                <option value="1" @if(@$settings->menu_search == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->menu_search == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="menu_become_a_member">BECOME A MEMBER</label>
                                            <select class="form-control" name="menu_become_a_member" id="menu_become_a_member">
                                                <option value="1" @if(@$settings->menu_become_a_member == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->menu_become_a_member == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="menu_blog">BLOG</label>
                                            <select class="form-control" name="menu_blog" id="menu_blog">
                                                <option value="1" @if(@$settings->menu_blog == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->menu_blog == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="menu_job">JOB
                                            </label>
                                            <select class="form-control" name="menu_job" id="menu_job">
                                                <option value="1" @if(@$settings->menu_job == 1) selected @endif>Enable</option>
                                                <option value="0" @if(@$settings->menu_job == 0) selected @endif>Disable</option>
                                                
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            {{-- <div class="settings-wrap">
                                <h4 class="settings-wrap-heading">Home Advertisement Section</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="home_add_img1">Image 1</label>
                                            <input type="file" name="home_add_img1" class="form-control" id="home_add_img1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="home_add_img1_link">Image 1 Link</label>
                                            <input type="text" name="home_add_img1_link" class="form-control" id="home_add_img1_link" value="{{@$settings->home_add_img1_link}}" placeholder="Link">
                                        </div>   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="home_add_img2">Image 2</label>
                                            <input type="file" name="home_add_img2" class="form-control" id="home_add_img2">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="home_add_img2_link">Image 2 Link</label>
                                            <input type="text" name="home_add_img2_link" class="form-control" id="home_add_img2_link" value="{{@$settings->home_add_img2_link}}" placeholder="Link">
                                        </div>   
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
    $('.summernote').summernote();
});
</script>
@endpush