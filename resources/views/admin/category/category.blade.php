@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
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
                                <h3 class="card-title">Category List</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body table-responsive data-table-space">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
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
                <div class="card">
                    <div class="card-header">
                        @if(isset($id))
                            <h3 class="card-title">Update Category</h3>
                        @else
                            <h3 class="card-title">Add Category</h3>
                        @endif
                        
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if(isset($id))
                        <form action="{{route('admin.category.update')}}" method="post">
                        <input type="hidden" name="id" value="{{$id}}">
                    @else
                        <form action="{{route('admin.category.store')}}" method="post">
                    @endif
                    
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="brand">Category</label>
                                <input type="text" name="name" class="form-control" id="brand" value="{{isset($get_category)?$get_category->name:''}}" placeholder="Category Name">
                                @if($errors->has('name'))
                                    <div class="custom-error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="brand">Select Plan Group</label>
                                <select class="form-control" name="plan_group_id" id="plan_group">
                                    <option value="">Select Plan Group</option>
                                    @forelse ($plan_groups as $plan_group)
                                        <option value="{{$plan_group->id}}" @if(isset($get_category) && $get_category->plan_group_id == $plan_group->id) selected @endif>{{$plan_group->name}}</option>
                                    @empty
                                    <option>No Plan Group</option>
                                    @endforelse
                                </select>
                            </div>
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
            ajax: "{{ route('admin.category.index') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
});
</script>
@endpush