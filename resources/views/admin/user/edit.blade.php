@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
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
                        <h3 class="card-title">Edit User</h3> 
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.user.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{@$user->id}}">
                        <div class="card-body">
                            @if(@$user->userdetails->profile_image != '')
                                <div class="user-img-wrap">
                                    <div class="user-img-box">
                                        <img src="{{url('/img/user/profile-image/'.@$user->userdetails->profile_image)}}" alt="">
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" class="form-control" id="first_name" value="{{@$user->userdetails->first_name}}" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control" id="middle_name" value="{{@$user->userdetails->middle_name}}" placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name" value="{{@$user->userdetails->last_name}}" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="1" @if (@$user->userdetails->gender == 1) selected @endif>Male</option>
                                            <option value="2" @if (@$user->userdetails->gender == 2) selected @endif>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dob">Birthday</label>
                                        <input type="date" name="dob" class="form-control" id="dob" value="{{@$user->userdetails->dob}}" placeholder="Birthday">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="country_id">Country</label>
                                        <select class="form-control @if($errors->has('country_id')) error @endif" name="country_id" id="country-dd">
                                            <option value="">Country</option>
                                            @foreach ($countres as $country)
                                            <option value="{{$country->id}}" @if(isset($user) && @$user->userDetails->country_id == $country->id) selected @endif>
                                                {{$country->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="selected_state" value="@if(isset($user)){{@$user->userDetails->state_id}}@endif">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="state_id">State</label>
                                        <select class="form-control @if($errors->has('state_id')) error @endif" name="state_id" id="state-dd">
                                            <option value="">Please Select State</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="city_name">City</label>
                                        <input type="text" name="city_name" class="form-control" id="city_name" value="{{@$user->userdetails->city_name}}" placeholder="City">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="zip_code">Zip Code</label>
                                        <input type="text" name="zip_code" class="form-control" id="zip_code" value="{{@$user->userdetails->zip_code}}" placeholder="Zip Code">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="membership_type_id">Member Type</label>
                                        <select class="form-control @if($errors->has('membership_type_id')) error @endif" name="membership_type_id">
                                            <option value="">{{@$user->userDetails->getCategory->name}}</option>
                                            {{-- @foreach ($categories as $category)
                                                <option value="{{$category->id}}" @if(isset($user) && $user->userDetails->membership_type_id == $category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                @if ($user->membership_id == 1)
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <ul>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="feature_model" id="feature_model" value="1" @if(isset($user) && $user->feature_model == 1) checked @endif>
                                                    <label for="feature_model">FEATURED MODELS</label>
                                                </li>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="convention_and_trade" id="convention_and_trade" value="1" @if(isset($user) && $user->convention_and_trade == 1) checked @endif>
                                                    <label for="convention_and_trade">CONVENTION & TRADE SHOW MODELS</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                @if ($user->membership_id == 2)
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <ul>
                                                <li class="checkbox">
                                                    <input type="checkbox" name="feature_photographer" id="feature_photographer" value="1" @if(isset($user) && $user->feature_photographer == 1) checked @endif>
                                                    <label for="feature_photographer">FEATURED PHOTOGRAPHER</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="0" @if(isset($user) && $user->status == 0) selected @endif>Pending</option>
                                            <option value="1" @if(isset($user) && $user->status == 1) selected @endif>Active</option>
                                            <option value="2" @if(isset($user) && $user->status == 2) selected @endif>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
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
  <script>
   
    
  </script>

@endpush