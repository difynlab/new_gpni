@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/products.css') }}">
@endpush

@section('content')

    <div class="container mt-5">
        <x-frontend.notification></x-frontend.notification>

        <div class="product-heading">{{ $contents->{'page_title_' . $middleware_language} ?? $contents->page_title_en }}</div>

        @if($products->isNotEmpty())
            <nav class="nav nav-tabs category-tabs" id="myTab" role="tablist">
                <button class="nav-link active }}" id="0-tab" data-bs-toggle="tab" data-bs-target="#products-0-tab"
                    role="tab" aria-controls="0-products-tab" aria-selected="true">
                    {{ $contents->{'page_first_tab_' . $middleware_language} ?? $contents->page_first_tab_en }}
                </button>

                @if($categories->isNotEmpty())
                    @foreach ($categories as $key => $category)
                        <button class="nav-link" id="{{ $category->id }}-tab" data-bs-toggle="tab"
                            data-bs-target="#products-{{ $category->id }}-tab" role="tab"
                            aria-controls="{{ $category->id }}-products-tab" aria-selected="false">{{ $category->name }}
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
                                                    <img src="{{ asset('storage/backend/products/products/' . $product->thumbnail) }}" alt="Product Image" class="card-img">
                                                    <div class="product-info">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="category">{{ $category->name }}</span>
                                                            <span class="rating">
                                                                <img src="{{ asset('storage/frontend/rating.svg') }}" alt="Rating">
                                                            </span>
                                                        </div>
                                                        <span class="product-name py-2">{{ $product->name }}</span>
                                                        <div class="product-details">
                                                            <span class="price">{{ $currency_symbol }}{{ $product->price }}</span>
                                                        </div>
                                                    </div>

                                                    @if(auth()->check())
                                                        @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name))
                                                            @if(hasUserAddedToCart(auth()->user()->id, $product->id))
                                                                <button class="cta-button-disabled" disabled>
                                                                    {{ $contents->{'page_added_to_cart_' . $middleware_language} ?? $contents->page_added_to_cart_en }}
                                                                </button>
                                                            @else
                                                                <form action="{{ route('frontend.carts.store') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                                    <button type="submit" class="cta-button">
                                                                        <img src="{{ asset('storage/frontend/cart.svg') }}" alt="Cart Icon">
                                                                        {{ $contents->{'page_add_to_cart_' . $middleware_language} ?? $contents->page_add_to_cart_en }}
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        @else
                                                            <button class="cta-button-disabled" disabled>
                                                                {{ $contents->{'page_not_available_' . $middleware_language} ?? $contents->page_not_available_en }}
                                                            </button>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}"
                                                            class="cta-button">{{ $contents->{'page_login_for_purchase_' . $middleware_language} ?? $contents->page_login_for_purchase_en }}</a>
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
                        <div class="tab-pane fade" id="products-{{ $category->id }}-tab" role="tabpanel"
                            aria-labelledby="{{ $category->id }}-products-tab" tabindex="0">
                            <div class="heading-text py-3">{{ $category->name }}</div>

                            <div class="row row-horizontal px-0">
                                @if($products->isNotEmpty())
                                    @foreach($products as $product)
                                        @if($product->product_category_id == $category->id)
                                            <div class="col-md-3 mb-4">
                                                <div class="card-custom">
                                                    <img src="{{ asset('storage/backend/products/products/' . $product->thumbnail) }}" alt="Product Image" class="card-img">

                                                    <div class="product-info">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="category">{{ $category->name }}</span>
                                                            <span class="rating">
                                                                <img src="{{ asset('storage/frontend/rating.svg') }}" alt="Rating">
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
                                                                {{ $contents->{'page_added_to_cart_' . $middleware_language} ?? $contents->page_added_to_cart_en }}
                                                            </button>
                                                        @else
                                                            <form action="{{ route('frontend.carts.store') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                                <button type="submit" class="cta-button">
                                                                    <img src="{{ asset('storage/frontend/cart.svg') }}" alt="Cart Icon">
                                                                        {{ $contents->{'page_add_to_cart_' . $middleware_language} ?? $contents->page_add_to_cart_en }}
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="cta-button">{{ $contents->{'page_login_for_purchase_' . $middleware_language} ?? $contents->page_login_for_purchase_en }}</a>
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
        @else
            <p class="no-data">{{ $contents->{'page_no_products_' . $middleware_language} ?? $contents->page_no_products_en }}</p>
        @endif
    </div>

@endsection
