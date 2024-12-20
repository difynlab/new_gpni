@extends('backend.layouts.app')

@section('title', 'Material Purchases')

@section('content')

    <x-backend.breadcrumb page_name="Material Purchases"></x-backend.breadcrumb>

    <div class="pages">
        <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('backend.purchases.material-purchases.filter') }}" method="GET" class="filter-form">
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($material_purchases) > 0)
                            @foreach($material_purchases as $material_purchase)
                                <tr>
                                    <td>#{{ $material_purchase->id }}</td>
                                    <td>{{ $material_purchase->user_id }}</td>
                                    <td>{{ $material_purchase->course_id }}</td>
                                    <td>{{ $material_purchase->date_time }}</td>
                                    <td>{{ $material_purchase->currency === 'usd' ? '$' : '¥' }}{{ $material_purchase->amount_paid }}</td>
                                    <td>{!! $material_purchase->payment_status !!}</td>
                                    <td>{!! $material_purchase->action !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" style="text-align: center;">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>

                {{ $material_purchases->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            </div>
        </div>

        <x-backend.delete-data title="Material Purchase"></x-backend.delete-data>

        <div class="modal fade send-modal" id="send-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Material</h5>
                    </div>
                    <div class="modal-body">
                        <p class="modal-message">Are you sure you want to send?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn close-button" data-bs-dismiss="modal" title="Cancel">Cancel</button>
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="btn send-button" title="Send">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('.pages .table .delete-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.purchases.material-purchases.destroy', [':id']) }}";
                destroy_url = url.replace(':id', id);

                $('.pages .delete-modal form').attr('action', destroy_url);
                $('.pages .delete-modal').modal('show');
            });

            $('.pages .table .send-button').on('click', function() {
                let id = $(this).attr('id');
                let url = "{{ route('backend.purchases.material-purchases.send', [':id']) }}";
                send_url = url.replace(':id', id);

                $('.pages .send-modal form').attr('action', send_url);
                $('.pages .send-modal').modal('show');
            });

            $(".pages .pagination-form select").change(function () {
                window.location = "{!! $material_purchases->url(1) !!}&items=" + this.value; 
            });
        });
    </script>
@endpush