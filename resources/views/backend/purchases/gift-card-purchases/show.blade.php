@extends('backend.layouts.app')

@section('title', 'Show Purchase')

@section('content')

    <x-backend.breadcrumb page_name="Show Purchase"></x-backend.breadcrumb>

    <div class="static-pages">
        <form>
            <div class="section">
                <p class="inner-page-title">Purchase Details</p>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="mb-4">
                            <label class="form-label">Receiver Name</label>
                            <input class="form-control" value="{{ $gift_card_purchase->receiver_name }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Receiver Email</label>
                            <input class="form-control" value="{{ $gift_card_purchase->receiver_email }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Date</label>
                            <input class="form-control" value="{{ $gift_card_purchase->date }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Time</label>
                            <input class="form-control" value="{{ $gift_card_purchase->time }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Payment Mode</label>
                            <input class="form-control" value="{{ ucfirst($gift_card_purchase->mode) }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Transaction ID</label>
                            <input class="form-control" value="{{ $gift_card_purchase->transaction_id }}" readonly>
                        </div>

                        <div>
                            <label class="form-label">Refund Status</label>
                            <input class="form-control" value="{{ $gift_card_purchase->refund_status }}" readonly>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label class="form-label">Buyer Name</label>
                            <input class="form-control" value="{{ $gift_card_purchase->buyer_name }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Buyer Email</label>
                            <input class="form-control" value="{{ $gift_card_purchase->buyer_email }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Amount Paid</label>
                            <input class="form-control" value="{{ $gift_card_purchase->amount_paid }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Discount Applied</label>
                            <input class="form-control" value="{{ $gift_card_purchase->discount_applied }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Payment Status</label>
                            <input class="form-control" value="{{ $gift_card_purchase->payment_status }}" readonly>
                        </div>

                        <div>
                            <label class="form-label">Receipt URL</label>
                            <input class="form-control" value="{{ $gift_card_purchase->receipt_url }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection