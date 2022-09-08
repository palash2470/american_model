@extends('layouts.admin')
@section('content')
<section class="user-details-sec main-background pt_90 position-relative lft-rgt-corner-bg min-100vh">
    <div class="container-fluid p-h-60">
        <div class="row grid-gap">
            @include('admin.includes.left')
            <div class="col">
                <div class="profile-rgt-wrap">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="lft-lightnevy-blue-box blue-box-repet">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="chart-head">
                                            <h4>Your Orders</h4>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="view-more-table">
                                            <a href="#" class="view-more-rt">today</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-table table-top-border">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Order</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Sum</th>
                                                <th>Link</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order)
                                                <tr>
                                                    <td><span class="status-dot @if($order->delivery_status == 1) processing @elseif ($order->delivery_status == 2) on-the-way @elseif ($order->delivery_status == 3) deliverd @else  @endif"></span></td>
                                                    <td>
                                                        <span class="order-img"><img class="img-block" src="{{url('Admin/image/order-img.svg')}}" alt=""></span>
                                                    </td>
                                                    <td>
                                                        <span class="status-box @if($order->delivery_status == 1) processing @elseif ($order->delivery_status == 2) on-the-way @elseif ($order->delivery_status == 3) deliverd @else  @endif add-hover status_list">@if($order->delivery_status == 1) In Processing @elseif ($order->delivery_status == 2) On the way @elseif ($order->delivery_status == 3) Deliverd @else  @endif<i class="fas fa-angle-right"></i>
                                                            <ul class="status-list">
                                                                <li class="type-on-the-way" data-status="2" data-id="{{$order->id}}">On the way</li>
                                                                <li class="type-deliverd" data-status="3" data-id="{{$order->id}}">Deliverd</li>
                                                                <li class="type-in-processing" data-status="1" data-id="{{$order->id}}">In Processing</li>
                                                            </ul>
                                                        </span>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->isoFormat('MMMM DD')}}</td>
                                                    <td>{{$order->sub_total}} $</td>
                                                    <td>
                                                        <div class="link-btn-wrap">
                                                            <ul class="d-flex justify-content-center">
                                                                {{-- <li><a class="link-btn" href="#">add link</a></li> --}}
                                                                @if (isset($order->sticker->id))
                                                                    <li>
                                                                        <a class="link-btn qr_code_modal" href="javascript:;" data-bs-toggle="modal" data-bs-target="#qrcodeModal" data-qrcode ="{{url('qrcode/'.$order->sticker->qrcode)}}">
                                                                            <span class="link-btn-icon"><img class="img-block" src="{{url('Admin/image/qr-code.svg')}}" alt=""></span>
                                                                        </a>
                                                                    </li>
                                                                    <li><a class="link-btn" href="{{route('user.sticker.view',[@$order->sticker->unique_id])}}" target="_blank">
                                                                        <span class="link-btn-icon"><img class="img-block" src="{{url('image/eye-solid.svg')}}" alt=""></span>
                                                                    </a></li>
                                                                @else
                                                                    <li>
                                                                        <a class="link-btn disable-btn" href="#">
                                                                            <span class="link-btn-icon"><img class="img-block" src="{{url('Admin/image/qr-code.svg')}}" alt=""></span>
                                                                        </a>
                                                                    </li>
                                                                    <li><a class="link-btn disable-btn" href="#" target="_blank">
                                                                        <span class="link-btn-icon"><img class="img-block" src="{{url('image/eye-solid.svg')}}" alt=""></span>
                                                                    </a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if (isset($order->sticker->id))
                                                            @if ($order->sticker->status == 1)
                                                                <span class="status-box sticker-active add-hover sticker_status">Active
                                                                    <!-- If deactive this class sticker-deactive -->
                                                                    <ul class="status-list">
                                                                        <li class="type-sticker-active" data-status="1" data-id="{{$order->sticker->id}}">Active</li>
                                                                        <li class="type-sticker-deactive" data-status="0" data-id="{{$order->sticker->id}}">Deactive</li>
                                                                    </ul>
                                                                </span>
                                                            @elseif ($order->sticker->status == 0)
                                                            <span class="status-box sticker-active add-hover sticker-deactive sticker_status">Deactive
                                                                <!-- If deactive this class sticker-deactive -->
                                                                <ul class="status-list">
                                                                    <li class="type-sticker-active" data-status="1" data-id="{{$order->sticker->id}}">Active</li>
                                                                    <li class="type-sticker-deactive" data-status="0" data-id="{{$order->sticker->id}}">Deactive</li>
                                                                </ul>
                                                            </span>
                                                            @endif
                                                            
                                                        @else
                                                            <span class="status-box sticker-active add-hover disable-btn">Active
                                                                <!-- If deactive this class sticker-deactive -->
                                                                <ul class="status-list">
                                                                    <li class="type-sticker-active">Active</li>
                                                                    <li class="type-sticker-deactive">Deactive</li>
                                                                </ul>
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="black-box chart-box">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="chart-head">
                                            <h4>Coupon</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="coupon-list-box">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade page-modal qrcode-Modal" id="qrcodeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="qrcodeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            <div class="modal-body">
                <div class="qrcode-show-wrap">
                    <span class="qrcode-show">
                        <img id="qrcode_img" src="" class="img-block" alt="">
                    </span>
                    <div class="text-center">
                        <a id="qrcode_link" href="#" class="qrcode-download" download>download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

    //Order Delivery status update
    $(document).on('click','.status_list li', function(){
        var status = $(this).data('status');
        var id = $(this).data('id');
        
        $.ajax({
            type:'get',
            url: "{{route('admin.order.status.update')}}",
            data: {status:status,id:id}, 
            success: function (data, status, xhr) {
                location.reload();
                //$('p').append('status: ' + status + ', data: ' + data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                //$('p').append('Error' + errorMessage);
            }
        });
    });

    //Sticker status update
    $(document).on('click','.sticker_status li', function(){
        var status = $(this).data('status');
        var id = $(this).data('id');
        
        $.ajax({
            type:'get',
            url: "{{route('admin.sticker.status.update')}}",
            data: {status:status,id:id}, 
            success: function (data, status, xhr) {
                location.reload();
                //$('p').append('status: ' + status + ', data: ' + data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                //$('p').append('Error' + errorMessage);
            }
        });
    });

    //Qrcode modal Open 
    $(document).on('click','.qr_code_modal', function(){
        var qr_link = $(this).data('qrcode');
        $('#qrcode_img').attr('src',qr_link);
        $('#qrcode_link').attr('href',qr_link);
    });
</script>
@endpush