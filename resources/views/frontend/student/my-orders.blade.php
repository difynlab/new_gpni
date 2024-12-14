@extends('frontend.layouts.app')

@section('title', 'My Orders')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/my-orders.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sidebar.css') }}">
@endpush

@section('content')

    <div class="container-fluid dashboard">
        <div class="row p-lg-5 p-3">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-lg-8 main-content ps-lg-5 ps-md-4 ps-3">
                <div class="orders-container">
                    <div class="orders-header">
                        <h1>{{ $student_dashboard_contents->my_orders_title }}</h1>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{ $student_dashboard_contents->my_orders_first_tab }}</th>
                                    <th>{{ $student_dashboard_contents->my_orders_second_tab }}</th>
                                    <th>{{ $student_dashboard_contents->my_orders_third_tab }}</th>
                                    <th>{{ $student_dashboard_contents->my_orders_fourth_tab }}</th>
                                    <th>{{ $student_dashboard_contents->my_orders_fifth_tab }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($purchases->isEmpty())
                                    <tr>
                                        <td colspan="5" class="empty-record">{{ $student_dashboard_contents->my_orders_no_records }}</td>
                                    </tr>
                                @else
                                    @foreach($purchases as $purchase)
                                        <tr>
                                            <td>{{ $purchase->order_type }}</td>
                                            <td>{{ $purchase->transaction_id }}</td>
                                            <td>{{ $purchase->currency === 'usd' ? '$' : '¥' }}{{ $purchase->amount_paid }}</td>
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