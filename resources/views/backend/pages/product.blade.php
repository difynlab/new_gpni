@extends('backend.layouts.app')

@section('title', 'Product')

@section('content')

    <x-backend.breadcrumb page_name="Product"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.product.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="page_title_{{ $short_code }}" name="page_title_{{ $short_code }}" value="{{ $contents->{'page_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_first_tab_{{ $short_code }}" class="form-label">First Tab</label>
                        <input type="text" class="form-control" id="page_first_tab_{{ $short_code }}" name="page_first_tab_{{ $short_code }}" value="{{ $contents->{'page_first_tab_' . $short_code} ?? '' }}" placeholder="First Tab">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_added_to_cart_{{ $short_code }}" class="form-label">Added to Cart</label>
                        <input type="text" class="form-control" id="page_added_to_cart_{{ $short_code }}" name="page_added_to_cart_{{ $short_code }}" value="{{ $contents->{'page_added_to_cart_' . $short_code} ?? '' }}" placeholder="Added to Cart">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_add_to_cart_{{ $short_code }}" class="form-label">Add to Cart</label>
                        <input type="text" class="form-control" id="page_add_to_cart_{{ $short_code }}" name="page_add_to_cart_{{ $short_code }}" value="{{ $contents->{'page_add_to_cart_' . $short_code} ?? '' }}" placeholder="Add to Cart">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="page_not_available_{{ $short_code }}" class="form-label">Not Available</label>
                        <input type="text" class="form-control" id="page_not_available_{{ $short_code }}" name="page_not_available_{{ $short_code }}" value="{{ $contents->{'page_not_available_' . $short_code} ?? '' }}" placeholder="Not Available">
                    </div>

                    <div class="col-6">
                        <label for="page_login_for_purchase_{{ $short_code }}" class="form-label">Login for Purchase</label>
                        <input type="text" class="form-control" id="page_login_for_purchase_{{ $short_code }}" name="page_login_for_purchase_{{ $short_code }}" value="{{ $contents->{'page_login_for_purchase_' . $short_code} ?? '' }}" placeholder="Login for Purchase">
                    </div>

                    <div class="col-6">
                        <label for="page_no_products_{{ $short_code }}" class="form-label">No Products</label>
                        <input type="text" class="form-control" id="page_no_products_{{ $short_code }}" name="page_no_products_{{ $short_code }}" value="{{ $contents->{'page_no_products_' . $short_code} ?? '' }}" placeholder="No Products">
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