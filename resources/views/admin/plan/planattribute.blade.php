@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Plan Attribute</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Plan Attribute</li>
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
                                <h3 class="card-title">Plan Attribute List</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body table-responsive data-table-space">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Input Type</th>
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
                            <h3 class="card-title">Update Plan Attribute</h3>
                        @else
                            <h3 class="card-title">Add Plan Attribute</h3>
                        @endif
                        
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if(isset($id))
                        <form action="{{route('admin.plan_attribute.update')}}" method="post">
                        <input type="hidden" name="id" value="{{$id}}">
                    @else
                        <form action="{{route('admin.plan_attribute.store')}}" method="post">
                    @endif
                    
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="brand">Plan Attribute Name</label>
                                <input type="text" name="name" class="form-control" id="brand" value="{{isset($get_plan_attribute)?$get_plan_attribute->name:''}}" placeholder="Plan Attribute Name">
                                @if($errors->has('name'))
                                    <div class="custom-error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Attribute Input Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="input_type" value="text"  {{isset($get_plan_attribute)?($get_plan_attribute->input_type == 'text' ? 'checked' : ''):''}} >
                                    <label class="form-check-label">Text</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="input_type" value="radio" {{isset($get_plan_attribute)?($get_plan_attribute->input_type == 'radio' ? 'checked' : ''):''}}>
                                    <label class="form-check-label">Radio</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            @if(isset($id))
                                <button type="submit" class="btn btn-primary">Update</button>
                            @else
                                <button type="submit" class="btn btn-primary">Add</button>
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
            order:[],
            ajax: "{{ route('admin.plan_attribute.index') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'input_type', name: 'input_type'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
});
</script>
@endpush