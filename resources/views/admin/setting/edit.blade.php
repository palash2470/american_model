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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Setting</h3> 
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{route('admin.setting.update')}}" method="post">
                    @csrf
                        <input type="hidden" name="id" value="{{$settings->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="order_tax">Order Tax (%)</label>
                                <input type="text" name="order_tax" class="form-control" id="order_tax" value="{{$settings->order_tax}}" placeholder="Order Tax (%)">
                                @if($errors->has('order_tax'))
                                    <div class="error">{{ $errors->first('order_tax') }}</div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="facebook_link">Facebook</label>
                                        <input type="text" name="facebook_link" class="form-control" id="facebook_link" value="{{@$settings->facebook_link}}" placeholder="Facebook link">
                                        @if($errors->has('facebook_link'))
                                            <div class="error">{{ $errors->first('facebook_link') }}</div>
                                        @endif
                                    </div>   
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="insta_link">Instagram</label>
                                        <input type="text" name="insta_link" class="form-control" id="insta_link" value="{{@$settings->insta_link}}" placeholder="Instagram Link">
                                        @if($errors->has('insta_link'))
                                            <div class="error">{{ $errors->first('insta_link') }}</div>
                                        @endif
                                    </div>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="twitter_link">Twitter</label>
                                        <input type="text" name="twitter_link" class="form-control" id="twitter_link" value="{{@$settings->twitter_link}}" placeholder="Twitter Link">
                                        @if($errors->has('twitter_link'))
                                            <div class="error">{{ $errors->first('twitter_link') }}</div>
                                        @endif
                                    </div>   
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="linkedin_link">Linkedin</label>
                                        <input type="text" name="linkedin_link" class="form-control" id="linkedin_link" value="{{@$settings->linkedin_link}}" placeholder="Linkedin Link">
                                        @if($errors->has('linkedin_link'))
                                            <div class="error">{{ $errors->first('linkedin_link') }}</div>
                                        @endif
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
  

@endpush