@extends('backend.layouts.app')

@section('title', 'Cart')

@section('content')

    <x-backend.breadcrumb page_name="Cart"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.cart.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_items_{{ $short_code }}" class="form-label">Items</label>
                        <input type="text" class="form-control" id="page_items_{{ $short_code }}" name="page_items_{{ $short_code }}" value="{{ $contents->{'page_items_' . $short_code} ?? '' }}" placeholder="Items">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_order_summary_{{ $short_code }}" class="form-label">Order Summary</label>
                        <input type="text" class="form-control" id="page_order_summary_{{ $short_code }}" name="page_order_summary_{{ $short_code }}" value="{{ $contents->{'page_order_summary_' . $short_code} ?? '' }}" placeholder="Order Summary">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_no_of_items_{{ $short_code }}" class="form-label">No of Items</label>
                        <input type="text" class="form-control" id="page_no_of_items_{{ $short_code }}" name="page_no_of_items_{{ $short_code }}" value="{{ $contents->{'page_no_of_items_' . $short_code} ?? '' }}" placeholder="No of Items">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_sub_total_{{ $short_code }}" class="form-label">Sub Total</label>
                        <input type="text" class="form-control" id="page_sub_total_{{ $short_code }}" name="page_sub_total_{{ $short_code }}" value="{{ $contents->{'page_sub_total_' . $short_code} ?? '' }}" placeholder="Sub Total">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_shipping_fee_{{ $short_code }}" class="form-label">Shipping Fee</label>
                        <input type="text" class="form-control" id="page_shipping_fee_{{ $short_code }}" name="page_shipping_fee_{{ $short_code }}" value="{{ $contents->{'page_shipping_fee_' . $short_code} ?? '' }}" placeholder="Shipping Fee">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_gift_amount_{{ $short_code }}" class="form-label">Gift Amount</label>
                        <input type="text" class="form-control" id="page_gift_amount_{{ $short_code }}" name="page_gift_amount_{{ $short_code }}" value="{{ $contents->{'page_gift_amount_' . $short_code} ?? '' }}" placeholder="Gift Amount">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_total_{{ $short_code }}" class="form-label">Total</label>
                        <input type="text" class="form-control" id="page_total_{{ $short_code }}" name="page_total_{{ $short_code }}" value="{{ $contents->{'page_total_' . $short_code} ?? '' }}" placeholder="Total">
                    </div>

                    <div class="col-6">
                        <label for="page_button_{{ $short_code }}" class="form-label">Button</label>
                        <input type="text" class="form-control" id="page_button_{{ $short_code }}" name="page_button_{{ $short_code }}" value="{{ $contents->{'page_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-6">
                        <label for="page_we_accept_{{ $short_code }}" class="form-label">We Accept</label>
                        <input type="text" class="form-control" id="page_we_accept_{{ $short_code }}" name="page_we_accept_{{ $short_code }}" value="{{ $contents->{'page_we_accept_' . $short_code} ?? '' }}" placeholder="We Accept">
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save the updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection