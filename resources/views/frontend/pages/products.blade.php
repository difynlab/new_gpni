@extends('frontend.layouts.app')

@section('title', 'Products')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/products.css') }}">
@endpush

@section('content')

    <div class="container mt-5">
        <x-frontend.notification></x-frontend.notification>

        <nav class="nav nav-tabs category-tabs" id="myTab" role="tablist">
            <button class="nav-link active }}" id="0-tab" data-bs-toggle="tab" data-bs-target="#products-0-tab" role="tab" aria-controls="0-products-tab" aria-selected="true">
                All
            </button>

            @if($categories->isNotEmpty())
                @foreach($categories as $key => $category)
                    <button class="nav-link" id="{{ $category->id }}-tab" data-bs-toggle="tab" data-bs-target="#products-{{ $category->id }}-tab" role="tab" aria-controls="{{ $category->id }}-products-tab" aria-selected="false">{{ $category->name }}
                    </button>
                @endforeach
            @endif
        </nav>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="products-0-tab" role="tabpanel" aria-labelledby="all-tab">
                @if($categories->isNotEmpty())
                    @foreach($categories as $category)
                        <div class="heading-text py-3">{{ $category->name }}</div>

                        <div class="row row-horizontal px-0">
                            @if($products->isNotEmpty())
                                @foreach($products as $product)
                                    @if($product->product_category_id == $category->id)
                                        <div class="col-md-3 mb-4">
                                            <div class="card-custom">
                                                <img src="{{ asset('storage/backend/products/products/' . $product ->thumbnail) }}" alt="Product Image" class="card-img">
                                                <div class="product-info">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="category">{{ $category->name }}</span>
                                                        <span class="rating">
                                                            <img src="{{ asset('storage/frontend/rating.svg') }}" alt="Rating">
                                                        </span>
                                                    </div>
                                                    <span class="product-name py-2">{{ $product->name }}</span>
                                                    <div class="product-details">
                                                        <span class="price">${{ $product->price }}</span>
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
                                                                <img src="{{ asset('storage/frontend/cart.svg') }}" alt="Cart Icon">
                                                                Add to Cart
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="cta-button">Login for Purchase</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>

            @if($categories->isNotEmpty())
                @foreach($categories as $category)
                    <div class="tab-pane fade" id="products-{{ $category->id }}-tab" role="tabpanel" aria-labelledby="{{ $category->id }}-products-tab" tabindex="0">
                        <div class="heading-text py-3">{{ $category->name }}</div>

                        <div class="row row-horizontal px-0">
                            @if($products->isNotEmpty())
                                @foreach($products as $product)
                                    @if($product->product_category_id == $category->id)
                                        <div class="col-md-3 mb-4">
                                            <div class="card-custom">
                                                <img src="{{ asset('storage/backend/products/products/' . $product ->thumbnail) }}" alt="Product Image" class="card-img">
                                                <div class="product-info">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="category">{{ $category->name }}</span>
                                                        <span class="rating">
                                                            <img src="{{ asset('storage/frontend/rating.svg') }}" alt="Rating">
                                                        </span>
                                                    </div>
                                                    <span class="product-name py-2">{{ $product->name }}</span>
                                                    <div class="product-details">
                                                        <span class="price">${{ $product->price }}</span>
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
                                                                <img src="{{ asset('storage/frontend/cart.svg') }}" alt="Cart Icon">
                                                                Add to Cart
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="cta-button">Login for Purchase</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- <div class="add-to-cart-modal">
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-container">
                                    <div class="product-gallery">
                                        <div class="item">
                                            <img src="storage/frontend/frame-1171276145.svg" alt="White T-shirt">
                                        </div>
                                        <div class="item">
                                            <img src="storage/frontend/frame-1171276145-2.svg" alt="Blue T-shirt">
                                        </div>
                                        <div class="item">
                                            <img src="storage/frontend/frame-1171276145-3.svg" alt="Dark Blue T-shirt">
                                        </div>
                                    </div>
                                    <div class="product-main">
                                        <img src="storage/frontend/frame-1171276145-4.svg" alt="Main T-shirt">
                                        <div class="product-caption">
                                            ISSN T-shirt (White)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-details">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="category">Clothing</span>
                                        <div class="d-flex align-items-center">
                                            <span class="reviews">567 reviews</span>
                                            <img src="{{ asset('storage/frontend/products/rating.svg') }}" alt="Rating" class="ml-2">
                                        </div>
                                    </div>

                                    <h1 class="title">ISSN T-shirt (White)</h1>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="price">$23</span>
                                        <div class="colors-available">
                                            <span>Colors available</span>
                                            <div class="color-option"><img src="storage/frontend/white.svg" alt="White"></div>
                                            <div class="color-option"><img src="storage/frontend/blue.svg" alt="Blue"></div>
                                            <div class="color-option"><img src="storage/frontend/dark-blue.svg" alt="Dark Blue">
                                            </div>
                                        </div>
                                    </div>

                                    <p class="description">This ISSN T-shirt is a must-have for any fitness enthusiast.
                                        Crafted from a lightweight, breathable fabric, it's designed to keep you cool
                                        and
                                        comfortable during your workouts. The classic white color makes it perfect for
                                        any
                                        occasion.</p>

                                    <div>
                                        <a href="#" class="size-guide d-flex align-items-center">
                                            <img src="storage/frontend/mdi-ruler.svg" alt="Size guide">
                                            Size guide
                                        </a>
                                    </div>

                                    <div class="sizes">
                                        <div class="size-option selected"><span>XS</span></div>
                                        <div class="size-option"><span>S</span></div>
                                        <div class="size-option"><span>M</span></div>
                                        <div class="size-option"><span>L</span></div>
                                        <div class="size-option"><span>XL</span></div>
                                    </div>

                                    <form action="{{ route('frontend.carts.store') }}" method="POST">
                                        @csrf
                                        <a type="submit" class="cta-button">
                                            <img src="{{ asset('storage/frontend/products/cart.svg') }}" alt="Cart Icon">
                                            Add to cart
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

@endsection