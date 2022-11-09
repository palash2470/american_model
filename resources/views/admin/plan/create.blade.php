@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Member Plan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Member plan</li>
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
                        <h3 class="card-title">Add Member Plan</h3> 
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.add.plan')}}" method="post" id="plan_add">
                    @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Plan Group</label>
                                        <select class="form-control" name="plan_group_id" id="plan_group">
                                            <option value="">Select Plan Group</option>
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
                                        <input type="text" name="name" class="form-control" id="name" value="" placeholder="Plan Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table" id="attr_list">
                                            {{-- <thead>
                                                <tr>
                                                    <th>Attribute Name</th>
                                                    <th>Yearly</th>
                                                    <th>Monthly</th>
                                                </tr>
                                            </thead> --}}
                                            {{-- <tbody>
                                                <tr>
                                                    <td>Subscription Fee</td>
                                                    <td>
                                                        <div class="">
                                                            <ul>
                                                                <li><input type="text" class="form-control" placeholder="type"></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <ul>
                                                                <li><input type="text" class="form-control" placeholder="type"></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Showcase Elg.</td>
                                                    <td>
                                                        <div class="">
                                                            <ul>
                                                                <li><input type="radio">Yes</li>
                                                                <li><input type="radio">No</li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <ul>
                                                                <li><input type="radio">Yes</li>
                                                                <li><input type="radio">No</li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody> --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="cmn-btn-tag">Save</button>
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
    $(document).on('change','#plan_group',function(e){
        var plan_group_id = $(this).val();
        console.log(plan_group_id);
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type:'GET',
            url:'{{route("admin.ajax.attr")}}',
            data:{plan_group_id:plan_group_id},
            success:function(data) {
                console.log(data.attributes);
                if(data.attributes.length > 0){
                    var html = `<thead>
                                    <tr>
                                        <th>Attribute Name</th>
                                        <th>Yearly</th>
                                        <th>Monthly</th>
                                    </tr>
                                </thead><tbody>`;
                            $.each(data.attributes,function(key,value){
                                html+=` <tr>
                                        <input type="hidden" name="attribute_name[`+value.id+`]" value="`+value.name+`">
                                        <input type="hidden" name="attribute_id[`+value.id+`]" value="`+value.id+`">
                                            <td>`+value.name+`</td>`;
                                            if(value.input_type == 'text'){
                                                html+=`<td>
                                                    <div class="">
                                                        <ul>
                                                            <li><input type="text" class="form-control" placeholder="Enter Yearly Value" name=yearly_value[`+value.id+`]></li>
                                                            
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <ul>
                                                            <li><input type="text" class="form-control" placeholder="Enter Montyly Value" name=monthly_value[`+value.id+`]></li>
                                                            
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>`
                                        }else if(value.input_type == 'radio'){ 
                                            html+= `<td>
                                                        <div class="">
                                                            <ul>
                                                                <li><input type="radio" name="yearly_value[`+value.id+`]" value="yes" checked>Yes</li>
                                                                <li><input type="radio" name="yearly_value[`+value.id+`]" value="no">No</li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                            <ul>
                                                                <li><input type="radio" name="monthly_value[`+value.id+`]" value="yes" checked>Yes</li>
                                                                <li><input type="radio" name="monthly_value[`+value.id+`]" value="no">No</li>
                                                            </ul>
                                                        </div>
                                                    </td>`;
                                        }
                            }),        
                        html += `</tbody>`;         
                    $('#attr_list').html(html);            
                }else{
                    $('#attr_list').html('');  
                }
            }
        });
    });
  </script>

@endpush