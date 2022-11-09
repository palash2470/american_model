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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User List</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <div class="table-responsive pb-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="checkbox list-chk">
                                                <input type="checkbox" name="check_all" value="" id="checkall">
                                                <label for="checkall"></label>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Email Verify</th>
                                        <th>Status</th>
                                        <th>IP Address</th>
                                        <th>Created Date</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="checkbox list-chk">
                                                <input type="checkbox" id="list{{$user->id}}" class="table_checkbox" name="selected_values[]" value="{{$user->id}}" data-id="{{$user->id}}">
                                                <label for="list{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>{{@$user->name}}</td>
                                        <td>{{@$user->email}}</td>
                                        <td>{{@$user->category->name}}</td>
                                        <td>{{@$user->is_email_verified == 1 ? 'Yes':'No'}}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                Active
                                            @elseif ($user->status == 2)  
                                                Deactive 
                                            @elseif ($user->status == 0)  
                                                Pending  
                                            @endif
                                        </td>
                                        <td>{{@$user->ip_address}}</td>
                                        <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
                                        <td>
                                            <ul class="datatable-action-btn">
                                                <li title="Edit"><a class="edtBtn edit-btn" href="{{route('admin.user.edit',[base64_encode($user->id)])}}" ><i class="fas fa-edit"></i></a></li>
                                                <li title="Delete"><a class="delBtn delete-btn delete-item" 
                                                    data-url="{{route('admin.user.delete', [base64_encode($user->id)])}}" href="javascript:?"><i class="fas fa-trash-alt"></i></a></li>
                                                <li title="Ban"><a class="delBtn delete-btn" href="{{route('admin.user.ban',[base64_encode($user->id)])}}"><i class="fas fa-user-slash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr> 
                                    @empty
                                        <tr><td>No data found</td></tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                            {{-- {{ $users->links('vendor.pagination.default') }} --}}
                            {{ $users->appends($_GET)->links('vendor.pagination.default') }}
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-4 col-12">
                                <div class="action-select-wrap d-flex">
                                    <div class="action-select-wrap-lft">
                                        <select class="form-control" name="bulk_type" id="bulk_type">
                                            <option value="">Select Type</option>
                                            <option value="active">Active</option>
                                            <option value="deactive">Deactive</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </div>
                                    <div class="action-select-wrap-rgt">
                                        <button class="admin-btn-tag" type="Submit" value="submit" id="checkbox_submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
       
    </div>
</section>
<!-- /.content -->
@endsection
@push('scripts')


<script>
$(document).ready(function(){
    $('#checkall:checkbox').change(function () {
        //alert('sdsf')
        if($('input:checkbox[name=check_all]').is(':checked')) {
            $('input:checkbox').attr('checked','checked');
        }else{
            $('input:checkbox').removeAttr('checked');
        }
        
        //else $('input:checkbox').removeAttr('checked');
    });
});
$(document).on('click','#checkbox_submit',function(){
    var allVals = [];    
    $(".table_checkbox:checked").each(function() {    
        allVals.push($(this).attr('data-id'));  
    });
    if($('#bulk_type').val() == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please select type.',
        })
    } else{
        if(allVals.length <=0)    
        {    
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please select row.',
            })
        }  else {   
            var type = $('#bulk_type').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('admin.user.bulk') }}",
                data : {'ids':allVals,'type':type},
                type : 'POST',
                dataType : 'json',
                success : function(result){
                    if(result.status == 1){
                        location.reload();
                    }
                    //console.log(result.status);

                }
            });
            //alert($('#bulk_type').val());
        }
    }
    
});
</script>
@endpush