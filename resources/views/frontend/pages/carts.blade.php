@extends('frontend.layouts.app')

@section('title', 'Carts')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/carts.css') }}">
@endpush

@section('content')

    <div class="container-fluid my-5">
        <div class="container-fluid">
            <form action="{{ route('frontend.products.checkout') }}" method="POST">
                @csrf
                <div class="row justify-content-between mb-5">
                    <div class="col-6">
                        <div class="card">
                            <h5 class="section-header">Items ({{ $items->count() }})</h5>

                            <hr>

                            @if($items->isNotEmpty())
                                @foreach($items as $item)
                                    <div class="d-flex align-items-center my-2">
                                        <img src="{{ asset('storage/backend/products/products/' . $item->product->thumbnail) }}" alt="{{ $item->product->name }}" style="width: 30%; height: 30%; margin-right: 20px; object-fit: cover;">

                                        <div class="item-details">
                                            <h5 style="font-size: 18px; font-weight: 600;">{{ $item->product->name }}</h5>

                                            @if($item->product->colors || $item->product->available_sizes)
                                                <p style="font-size: 13px; margin: 0;">{{ $item->product->colors }} / {{ $item->product->available_sizes }}</p>
                                            @endif

                                            <div class="d-flex align-items-center my-2">
                                                <i class="bi bi-dash-circle" onclick="updateQuantity({{ $item->id }}, 'decrease')" style="cursor: pointer;"></i>
                                                
                                                <span class="mx-3" style="width: 15px; text-align: center;" id="quantity-{{ $item->id }}">{{ $item->quantity }}</span>

                                                <input type="hidden" name="quantities[]" id="quantity-input-{{ $item->id }}" value="{{ $item->quantity }}">

                                                <input type="hidden" name="products[]" value="{{ $item->product_id }}">

                                                <i class="bi bi-plus-circle" onclick="updateQuantity({{ $item->id }}, 'increase')" style="cursor: pointer;"></i>
                                            </div>

                                            <span class="price total-product-price" id="total-price-{{ $item->id }}" style="font-size: 20px;">{{ $currency_symbol }}{{ $item->total_price }}</span>
                                        </div>
                                    
                                        <i class="bi bi-trash-fill fs-5" onclick="deleteItem({{ $item->id }})" style="cursor: pointer;"></i>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card mb-3">
                            <h5 class="section-header">Order Summary</h5>
                            <div class="content">
                                <p>No. of items: {{ $items->sum('quantity') }}</p>

                                <p>Sub Total: <span class="sub-total-price">{{ $currency_symbol }}{{ number_format($items->sum('total_price'), 2) }}</span></p>

                                <p>Shipping Fee: <span>{{ $currency_symbol }}{{ number_format($shipping_cost, 2) }}</span></p>

                                <p>Gift Amount: <span class="gift-amount">{{ $currency_symbol }}{{ sprintf('%.2f', $wallet_balance) }}</span></p>

                                <h5>Total: <span class="price total-price">{{ $currency_symbol }}{{ sprintf('%.2f', $total_price) }}</span></h5>
                            </div>

                            <button type="submit" class="btn btn-primary btn-custom">Place Order</button>
                        </div>

                        <div class="card payment-methods">
                            <h5 class="section-header">We accept</h5>
                            <div class="payment-icons">
                                <img src="{{ asset('storage/frontend/visa-card.svg') }}" alt="Visa">
                                <img src="{{ asset('storage/frontend/mastercard.svg') }}" alt="MasterCard">
                                <img src="{{ asset('storage/frontend/amex.svg') }}" alt="American Express">
                                <img src="{{ asset('storage/frontend/discover.svg') }}" alt="Discover">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <div class="container-fluid mb-5">
        <div class="row mb-4">
            <div class="col-12">
                <h1>You may also like</h1>
            </div>
        </div>
        <div class="row">
            @if($other_products->isNotEmpty())
                @foreach($other_products as $product)
                    <div class="col-3">
                        <div class="product-card">
                            <img src="{{ asset('storage/backend/products/products/' . $product ->thumbnail) }}" alt="Product Image" class="card-img">
                            <div class="product-info">
                                <div class="d-flex justify-content-between">
                                    <span class="category"></span>
                                    <span class="rating">
                                        <img src="{{ asset('storage/frontend/products/rating.svg') }}" alt="Rating">
                                    </span>
                                </div>
                                <span class="product-name py-2">{{ $product->name }}</span>
                                <div class="product-details">
                                    <span class="price">{{ $currency_symbol }}{{ $product->price }}</span>
                                </div>
                            </div>

                            @if(auth()->check())
                                @if(hasUserAddedToCart(auth()->user()->id, $product->id))
                                    <button class="cta-button-disabled" disabled>
                                        Added to Cart
                                    </button>
                                @else
                                    <form action="{{ route('frontend.carts.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                                        <button type="submit" class="cta-button">
                                            <img src="{{ asset('storage/frontend/products/cart.svg') }}" alt="Cart Icon">
                                            Add to Cart
                                        </button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="cta-button">Login for Purchase</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div> -->

@endsection

@push('after-scripts')
    <script>
        function updateQuantity(itemId, action) {
            let quantityElement = document.getElementById('quantity-' + itemId);
            let quantityInputElement = document.getElementById('quantity-input-' + itemId);
            let currentQuantity = parseInt(quantityElement.innerText);

            let newQuantity = action === 'increase' ? currentQuantity + 1 : currentQuantity - 1;
            if(newQuantity < 1) return;

            quantityElement.innerText = newQuantity;
            quantityInputElement.value = newQuantity;

            let url = "{{ route('frontend.carts.update-quantity') }}";
            csrfToken = '{{ csrf_token() }}';

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    item_id: itemId,
                    quantity: newQuantity,
                    _token: csrfToken
                },
                success: function(data) {
                    if(data.success) {
                        $('#total-price-' + itemId).html(data.currency_symbol + data.item_total_price);
                        $('.sub-total-price').html(data.currency_symbol + data.sub_total_price);
                        $('.total-price').html(data.currency_symbol + data.cart_total_price);
                    }
                    else {
                        alert('Failed to update quantity');
                    }
                },
                error: function() {
                    console.error('Error updating quantity:', error);
                }
            });
        }

        function deleteItem(itemId) {
            let url = "{{ route('frontend.carts.destroy') }}";
            csrfToken = '{{ csrf_token() }}';

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    item_id: itemId,
                    _token: csrfToken
                },
                success: function(data) {
                    if(data.success) {
                        location.reload();
                    }
                    else {
                        alert('Failed to delete item');
                    }
                },
                error: function() {
                    console.error('Error deleting item:', error);
                }
            });
        }
    </script>
@endpush