@extends('frontend.layouts.app')

@section('title', 'My Orders')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-orders.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="orders-container">
                    <div class="orders-header">
                        <h1>My Orders</h1>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order Type</th>
                                    <th>Transaction ID</th>
                                    <th>Amount</th>
                                    <th>Date & Time</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($purchases->isEmpty())
                                    <tr>
                                        <td colspan="5" class="empty-record">Records Not Available</td>
                                    </tr>
                                @else
                                    @foreach($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->order_type }}</td>
                                        <td>{{ $purchase->transaction_id }}</td>
                                        <td>${{ $purchase->amount_paid }}</td>
                                        <td>{{ $purchase->date . ' | ' . $purchase->time }}</td>
                                        <td>{{ $purchase->payment_status }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection