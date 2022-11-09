@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Poll Group</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Poll Group</li>
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
                        <h3 class="card-title">Edit Poll Group</h3> 
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('admin.poll.update')}}" method="post">
                        <input type="hidden" name="id" value="{{$poll->id}}">
                    @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="question">Poll Question</label>
                                        <input type="text" name="question" class="form-control" id="question" value="{{$poll->question}}" placeholder="Poll Question">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="question">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{-- <div class="plan-wrap-main shadow-box"> --}}
                                        <div class="plan-wrap">                                    
                                            <div class="add-plan-wrap">
                                                @forelse ($poll->userPolls as $user_poll)
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="">Select User</label>
                                                                <select class="form-control" name="user_ids[]">
                                                                    <option value="">Select user</option>
                                                                    @forelse ($users as $user)
                                                                        <option value="{{$user->id}}" {{($user->id == $user_poll->user_id) ? 'selected':''}}>{{$user->name}}</option>
                                                                    @empty
                                                                        
                                                                    @endforelse
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    
                                                @endforelse
                                                
                                                <div class="more-field"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <button type="button" class="btn btn-sm btn-success add-minus-btn add_more_user"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                               
                            </div
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
   var count=0;
    $(document).on('click', '.add_more_user', function(e){
        count++;
        $('.more-field').append(`<div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select class="form-control" name="user_ids[]">
                                                <option value="">Select user</option>
                                                @forelse ($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @empty
                                                    
                                                @endforelse
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-sm btn-danger add-minus-btn remove_package"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>`);
    });

    $(document).on('click','.remove_package',function(){
        $(this).closest('.row').remove();
    });
    
  </script>

@endpush