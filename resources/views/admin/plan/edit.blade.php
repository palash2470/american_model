@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Plan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Plan</li>
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
                        <h3 class="card-title">Edit Plan</h3> 
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('admin.update.plan')}}" method="post">
                    @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Plan Group</label>
                                        <select class="form-control" name="plan_group_id" id="plan_group">
                                            {{-- <option value="">Select Plan Group</option> --}}
                                            @forelse ($plan_groups as $plan_group)
                                                <option value="{{$plan_group->id}}">{{$plan_group->name}}</option>
                                            @empty
                                            <option>No Plan Group</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Plan Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{$plan->name}}" placeholder="Plan Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table" id="attr_list">
                                            <thead>
                                                <tr>
                                                    <th>Attribute Name</th>
                                                    <th>Yearly</th>
                                                    <th>Monthly</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($plan_attr_list as $key=>$attr_val)
                                                    <input type="hidden" name="attribute_name[{{$attr_val->id}}]" value="">
                                                    <input type="hidden" name="attribute_id[{{$attr_val->id}}]" value="{{$attr_val->id}}">
                                                    <tr>
                                                        <td>{{$attr_val->name}}</td>
                                                    @if($attr_val->input_type == 'text')
                                                        <td>
                                                            <div class="">
                                                                <ul>
                                                                    <li><input type="text" class="form-control" placeholder="Enter Yearly Value"  name="yearly_value[{{$attr_val->id}}]" value="{{@$plan_details[$key]->yearly_value}}"></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <ul>
                                                                    <li><input type="text" class="form-control" placeholder="Enter Montyly Value" name="monthly_value[{{$attr_val->id}}]" value="{{@$plan_details[$key]->monthly_value}}"></li>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </td>
                                                
                                                        @elseif($attr_val->input_type == 'radio')
                                                   
                                                        <td>
                                                            <div class="">
                                                                <ul>
                                                                    <li><input type="radio" name="yearly_value[{{$attr_val->id}}]" value="yes" @if(@$plan_details[$key]->yearly_value == 'yes') checked  @endif>Yes</li>
                                                                    <li><input type="radio" name="yearly_value[{{$attr_val->id}}]" value="no" @if(@$plan_details[$key]->yearly_value == 'no') checked  @endif>No</li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="">
                                                                <ul>
                                                                    <li><input type="radio" name="monthly_value[{{$attr_val->id}}]" value="yes" @if(@$plan_details[$key]->monthly_value == 'yes') checked  @endif>Yes</li>
                                                                    <li><input type="radio" name="monthly_value[{{$attr_val->id}}]" value="no" @if(@$plan_details[$key]->monthly_value == 'no') checked  @endif>No</li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    
                                                    @endif 
                                                </tr> 
                                                @endforeach
                                                 
                                            </tbody>
                                        </table>
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