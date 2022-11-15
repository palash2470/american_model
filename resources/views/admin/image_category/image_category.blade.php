@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Photo Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Photo Category</li>
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
            <div class="col-lg-7 col-md-7 col-sm-12 col-12 connectedSortable">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Photo Category List</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body table-responsive data-table-space">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th width="100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                 <!-- /.row -->
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 connectedSortable">
                <div class="card card-primary">
                    <div class="card-header">
                        @if(isset($id))
                            <h3 class="card-title">Update Photo Category</h3>
                        @else
                            <h3 class="card-title">Add Photo Category</h3>
                        @endif
                        
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if(isset($id))
                        <form action="{{route('admin.image_category.update')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$id}}">
                    @else
                        <form action="{{route('admin.image_category.store')}}" method="post" enctype="multipart/form-data">
                    @endif
                    
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="brand">Category Name</label>
                                <input type="text" name="name" class="form-control" id="brand" value="{{isset($image_category)?$image_category->name:''}}" placeholder="Category Name">
                                @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                               {{-- <input type="file" name="image" class="form-control" id="image">
                                @if($errors->has('image'))
                                    <div class="error">{{ $errors->first('image') }}</div>
                                @endif --}}
                                <div class="onlyname-imgfile position-relative">
                                    <div class="file-select">
                                        <div class="file-select-name" id="noFile">No file chosen...</div> 
                                        <input type="file" name="image" class="form-control" id="chooseFile">
                                        <label for="chooseFile" class="file-label">File Upload</label>
                                    </div>
                                    @if($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                    @if (isset($image_category) && $image_category->image != '')
                                        <div class="show-img">
                                            <img src="{{url('/img/photo_cat_image/'.$image_category->image)}}" alt="" width="100px">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if(isset($id))
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1" {{$image_category->status == 1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$image_category->status == 0 ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                            @endif
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            @if(isset($id))
                                <button type="submit" class="cmn-btn-tag">Update</button>
                            @else
                                <button type="submit" class="cmn-btn-tag">Add</button>
                            @endif
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
$(document).ready(function(){
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.image_category.index') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'image_name', name: 'image_name'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    // File name
    $('#chooseFile').bind('change', function () {
    var filename = $("#chooseFile").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen..."); 
    }
    else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
    }
    });
});
</script>
@endpush