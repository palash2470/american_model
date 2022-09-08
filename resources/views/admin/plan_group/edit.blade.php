@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Plan Group</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Plan Group</li>
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
                        <h3 class="card-title">Edit Plan Group</h3> 
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.plan_group.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$get_plan_group->id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Plan Group Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{isset($get_plan_group)?$get_plan_group->name:''}}" placeholder="Plan Name">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="details">Plan Group Details</label>
                                        <textarea name="details" class="form-control" placeholder="Plan Group Details">{{isset($get_plan_group)?$get_plan_group->details:''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="plan-attr">
                                        <label for="details">Select Plan Attribute</label>
                                        <ul class="d-flex flex-wrap">
                                            @if(count($planAttributes) > 0)
                                                @foreach ($planAttributes as $planAttribute)
                                                <li>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="plan_attributes[]" value="{{$planAttribute->id}}" @if(in_array($planAttribute->id, $get_plan_group->plan_attr_arr)) checked @endif>
                                                            <label class="form-check-label">{{$planAttribute->name}}</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                
                                            @endif
                                        </ul>
                                    </div>
                                    @error('plan_attributes')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-12">
                                    <div class="plan-attr">
                                        <label for="details">Select Plan Type</label>
                                        <ul class="d-flex flex-wrap">
                                            
                                            @if(count($planTypes) > 0)
                                                @foreach ($planTypes as $planType)
                                                <li>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="plan_types[]" value="{{$planType->id}}" @if(in_array($planType->id, $get_plan_group->plan_type_list)) checked @endif>
                                                            <label class="form-check-label">{{$planType->name}}</label>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                
                                            @endif
                                        </ul>
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
  <script>
   
    
  </script>

@endpush