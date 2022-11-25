@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Size</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Size</li>
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
                                <h3 class="card-title">Size List</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body table-responsive data-table-space">
                                <table class="table table-bordered data-table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Size (Inch)</th>
                                            <th>Height</th>
                                            <th>Waist</th>
                                            <th>Chest/Bust</th>
                                            <th>Hip/Inseam</th>
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
                            <h3 class="card-title">Update Size</h3>
                        @else
                            <h3 class="card-title">Add Size</h3>
                        @endif
                        
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if(isset($id))
                        <form action="{{route('admin.size.update')}}" method="post" class="needs-validation" novalidate>
                        <input type="hidden" name="id" value="{{$id}}">
                    @else
                        <form action="{{route('admin.size.store')}}" method="post" class="needs-validation" novalidate>
                    @endif
                    
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="brand">Size (Inch)</label>
                                <input type="text" name="size" class="form-control" id="brand" value="{{isset($get_size)?$get_size->size:''}}" placeholder="Size in inch" required>
                                @if($errors->has('size'))
                                    <div class="custom-error">{{ $errors->first('size') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="form-check checkbox">
                                    <input class="form-check-input" id="height" type="checkbox"  name="height" {{isset($get_size)?($get_size->height == 1 ? 'checked' : '0'):' '}}>
                                    <label class="form-check-label" for="height">Height</label>
                                </div>
                                <div class="form-check checkbox">
                                    <input class="form-check-input" id="waist" type="checkbox" name="waist" {{isset($get_size)?($get_size->waist == 1 ? 'checked' : '0') : ' '}}>
                                    <label class="form-check-label" for="waist">Waist</label>
                                </div>
                                <div class="form-check checkbox">
                                    <input class="form-check-input" id="chest_bust" type="checkbox" name="chest" {{isset($get_size)?($get_size->chest == 1 ? 'checked' : '0') : ' '}}>
                                    <label class="form-check-label" for="chest_bust">Chest/Bust</label>
                                </div>
                                <div class="form-check checkbox">
                                    <input class="form-check-input" id="hip_inseam" type="checkbox" name="hip" {{isset($get_size)?($get_size->hip == 1 ? 'checked' : '0') : ' '}}>
                                    <label class="form-check-label" for="hip_inseam">Hip/Inseam</label>
                                </div>
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
            ajax: "{{ route('admin.size.index') }}",
            columns: [
                {data: 'size', name: 'size'},
                {data: 'height', name: 'height'},
                {data: 'waist', name: 'waist'},
                {data: 'chest', name: 'chest'},
                {data: 'hip', name: 'hip'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
});
</script>
@endpush