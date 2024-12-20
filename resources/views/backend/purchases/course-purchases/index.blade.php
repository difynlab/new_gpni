@extends('backend.layouts.app')

@section('title', 'Course Purchases')

@section('content')

    <x-backend.breadcrumb page_name="Course Purchases"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.purchases.course-purchases.filter') }}" method="GET" class="filter-form">
                    <div class="row align-items-center">
                        <div class="col">
                            <input type="text" class="form-control" name="transaction_id" value="{{ $transaction_id ?? '' }}" placeholder="Transaction ID">
                        </div>

                        <!-- <div class="col">
                            <input type="text" class="form-control" name="buyer_receiver_name" value="{{ $buyer_receiver_name ?? '' }}" placeholder="Buyer/ receiver name">
                        </div> -->

                        <div class="col">
                            <input type="date" class="form-control" name="date" value="{{ $date ?? '' }}" placeholder="Date">
                        </div>

                        <div class="col-4 col-xl-2 d-flex justify-content-between">
                            <button type="submit" class="filter-search-button" name="action" value="search">SEARCH</button>

                            <button type="submit" class="filter-reset-button" name="action" value="reset">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-backend.pagination-form items="{{ $items }}"></x-backend.pagination-form>
            
                <div class="table-container mb-3">
                    <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Student</th>
                            <th scope="col">Course</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Course Access Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($course_purchases) > 0)
                            @foreach($course_purchases as $course_purchase)
                                <tr>
                                    <td>#{{ $course_purchase->id }}</td>
                                    <td>{{ $course_purchase->user_id }}</td>
                                    <td>{{ $course_purchase->course_id }}</td>
                                    <td>{{ $course_purchase->date_time }}</td>
                                    <td>{{ $course_purchase->currency === 'usd' ? '$' : '¥' }}{{ $course_purchase->amount_paid }}</td>
                                    <td>{!! $course_purchase->payment_status !!}</td>
                                    <td>{!! $course_purchase->course_access_status !!}</td>
                                    <td>{!! $course_purchase->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>

                {{ $course_purchases->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Course Purchase"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.purchases.course-purchases.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $course_purchases->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush