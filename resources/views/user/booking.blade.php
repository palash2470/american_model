@extends('layouts.app')
@section('content')
<section class="my-account-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Booking</h3>
                </div>
            </div>
        </div>
        <div class="user-dashboard-wrap d-flex for-my-account">
            @include('includes.myaccount')
            <div class="user-dashboard-rgt">
                <div class="usser-acc-edit">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <span class="my-acc-menu-btn user_acc_menu">
                                    <button type="button">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </span>
                                <div class="edit-head-text">
                                    <h4>Booking List</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('user.display_option.update')}}" method="post" id="display_option_frm">
                        @csrf
                        <div class="usser-acc-edit-wrap">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="">Name</th>
                                                    <th class="">Email</th>
                                                    <th class="">Phone No</th>
                                                    <th class="">Preferred Date</th>
                                                    <th class="">Preferred Time</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($bookings as $booking)
                                                <tr class="">
                                                    <td class="">{{$booking->name}}</td>
                                                    <td>{{$booking->email}}</td>
                                                    <td class="">{{$booking->phone_no}}</td>
                                                    <td class="">{{$booking->preferred_date}}</td>
                                                    <td class="">{{$booking->preferred_time}}</td>
                                                    <td>
                                                    <a class="change-plan view_booking_details" href="javascript:void(0)" data-details="{{$booking}}">View more</a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6">No Records Found.</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Booking details Modal --}}
<div class="modal fade" id="booking_details_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('book_now')}}" class="row g-3 needs-validation" novalidate method="POST">
                @csrf
                
                <div class="modal-body">   
                    <p><strong>Name : </strong><span id="name"></span></p>
                    <p><strong>Email : </strong><span id="email"></span></p>
                    <p><strong>Phone No : </strong><span id="phone_no"></span></p>
                    <p><strong>Preferred Date : </strong><span id="preferred_date"></span></p>
                    <p><strong>Preferred Time : </strong><span id="preferred_time"></span></p>
                    <p><strong>Street Address : </strong><span id="street_address"></span></p>
                    <p><strong>Country : </strong><span id="country_name"></span></p>
                    <p><strong>State : </strong><span id="state_name"></span></p>
                    <p><strong>City : </strong><span id="city"></span></p>
                    <p><strong>Zip Code : </strong><span id="zip_code"></span></p>
                    <p><strong>Description : </strong><span id="description"></span></p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary" id="book_now">Book</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end Booking details Modal --}}
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function(){

            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif


            $(document).on('click', '.account-menu li a', function(){            
                $('.account-menu li').removeClass('open');
                $(this).parent().addClass('open');
            });

            /* Validation  */
           

        });
        $(document).on('click', '.view_booking_details', function() {
            var booking_details = $(this).data('details');
            $("#booking_details_modal").modal('show'); //show modal
            console.log(booking_details);
            $('.modal-body #name').html(booking_details.name);
            $('.modal-body #email').html(booking_details.email);
            $('.modal-body #phone_no').html(booking_details.phone_no);
            $('.modal-body #preferred_date').html(booking_details.preferred_date);
            $('.modal-body #preferred_time').html(booking_details.preferred_time);
            $('.modal-body #street_address').html(booking_details.street_address);
            $('.modal-body #country_name').html(booking_details.country.name);
            $('.modal-body #state_name').html(booking_details.state.name);
            $('.modal-body #city').html(booking_details.city);
            $('.modal-body #zip_code').html(booking_details.zip_code);
            $('.modal-body #description').html(booking_details.description);
        });

    </script>
@endpush