@extends('frontend.layouts.app')

@section('title', 'Shopping Cart')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    <div class="container">
        <!-- Main Item Section -->
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-30">
            <div class="card item-box">
                <h5 class="section-header">{{ $text['items'] }}</h5>
                <div class="d-flex align-items-center mb-2 mt-2">
                    <img src="storage/frontend/mdi-checkbox-marked.svg" alt="Checkbox" width="24" height="24" style="margin-right: 10px;">
                    <span class="price">All items ({{ $cartItems->sum('quantity') }})</span>
                </div>
                <hr>
                @foreach($cartItems as $cartItem)
                    <div class="d-flex align-items-center mt-2">
                        <img src="{{ asset('storage/backend/products/products/' . $cartItem->product->thumbnail) }}" alt="{{ $cartItem->product->name }}" style="width: 80px; margin-right: 20px;">
                        <div class="item-details">
                            <h5 style="font-size: 18px; font-weight: 600;">{{ $cartItem->product->name }}</h5>
                            <p style="font-size: 13px; margin: 0;">{{ $cartItem->product->colors }} / {{ $cartItem->product->available_sizes }}</p>
                            <div class="d-flex align-items-center my-2">
                                <img src="storage/frontend/mdi-minus.svg" alt="Minus" width="24" height="24">
                                <span class="mx-2">{{ $cartItem->quantity }}</span>
                                <img src="storage/frontend/mdi-plus.svg" alt="Plus" width="24" height="24">
                            </div>
                            <span class="price" style="font-size: 20px;">${{ $cartItem->total_price }}</span>
                        </div>
                        <img src="storage/frontend/mdi-delete-outline.svg" alt="Delete" width="24" height="24" style="margin-left: auto;">
                    </div>
                @endforeach
            </div>
            <div style="flex: 1; min-width: 300px;">
            <div class="card mb-3">
                <h5 class="section-header">{{ $text['order_summary'] }}</h5>
                <div class="content">
                    <p>{{ $text['no_of_items'] }} : {{ $cartItems->sum('quantity') }}</p>
                    <p>{{ $text['shipping_fee'] }} : <span>${{ $cartItems->sum(fn($item) => $item->product->shipping_cost) }}</span></p>
                    <p>{{ $text['sub_total'] }}: <span>${{ $cartItems->sum('total_price') }}</span></p>
                    <h5>{{ $text['total'] }} : 
                        <span class="price">${{ $cartItems->sum('total_price') + $cartItems->sum(fn($item) => $item->product->shipping_cost) }}</span>
                    </h5>
                </div>
                <button class="btn btn-primary btn-custom">{{ $text['place_order'] }}</button>
            </div>
                <div class="card payment-methods">
                    <h5 class="section-header">{{ $text['we_accept'] }}</h5>
                    <div class="payment-icons">
                        <img src="storage/frontend/visa-logo-png-2026-1.svg" alt="Visa">
                        <img src="storage/frontend/mastercard.svg" alt="MasterCard">
                        <img src="storage/frontend/amex.svg" alt="American Express">
                        <img src="storage/frontend/discover.svg" alt="Discover">
                    </div>
                </div>
            </div>
        </div>

        <!-- You may also like Section -->
        <h2 class="mb-4">{{ $text['you_may_also_like'] }}</h2>
        <div class="product-list">
        @foreach($otherProducts as $product)
            <div class="product-card">
                <img src="{{ asset('storage/backend/products/products/' . $product->thumbnail) }}" alt="{{ $product->name }}">
                <div class="product-info">
                    <div class="category-ratings">
                        <p class="category">{{ $product->category->name }}</p> <!-- Assuming the Product has a category relationship -->
                        <div class="rating">
                            <img src="storage/frontend/rating.svg" alt="Rating">
                        </div>
                    </div>
                    <h5 class="product-title">{{ $product->name }}</h5>
                    <p class="price">${{ $product->price }}</p>
                </div>
            </div>
        @endforeach
    </div>
    </div>
        
    </div>

@endsection