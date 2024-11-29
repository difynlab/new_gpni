@extends('backend.layouts.app')

@section('title', 'Membership Purchases')

@section('content')

    <x-backend.breadcrumb page_name="Membership Purchases"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.purchases.membership-purchases.filter') }}" method="POST" class="filter-form">
                    @csrf
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

                        <div class="col-2 d-flex justify-content-between">
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
            
                <table class="table table-striped w-100">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Student</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($membership_purchases) > 0)
                            @foreach($membership_purchases as $membership_purchase)
                                <tr>
                                    <td>#{{ $membership_purchase->id }}</td>
                                    <td>{{ $membership_purchase->user_id }}</td>
                                    <td>{{ $membership_purchase->date_time }}</td>
                                    <td>{{ $membership_purchase->currency === 'usd' ? '$' : '¥' }}{{ $membership_purchase->amount_paid }}</td>
                                    <td>{!! $membership_purchase->payment_status !!}</td>
                                    <td>{!! $membership_purchase->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $membership_purchases->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Membership Purchase"></x-backend.delete-data>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.purchases.membership-purchases.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $membership_purchases->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush