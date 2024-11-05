@extends('frontend.layouts.app')

@section('title', 'Single Article')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/single-article.css') }}">
@endpush

@section('content')

    <div class="container my-5">
               
        <div class="main-content my-5">
            <!-- Main Article Content -->
            <div class="content-wrapper mt-5 pt-5">
            <div class="header-metadata mt-2">
                <img src="/storage/frontend/calendar.svg" alt="Calendar Icon" class="icon">
                <span class="date">{{ $articles->created_at }}</span>
            </div>
                <h1>{{ $articles->title }}</h1>

                <div class="content-section">
                    <div>{!! $articles->content !!}</div>
                    @if($articles->thumbnail)
                        <img src="{{ asset('storage/backend/articles/articles/'. $articles->thumbnail) }}" alt="Image" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Image" class="img-fluid">
                    @endif
                </div>

            </div>

            <!-- Right Sidebar for Articles and Additional Content -->
            <div class="sidebar mt-5">
            <a href="{{ route('frontend.gift-card') }}">
                <img src="/storage/frontend/group-1171276120.svg" alt="Banner" class="img-fluid mb-4 banner-section">
            </a>

            <!-- Categories Section -->
            <div class="categories mb-4">
                
            @if($article_categories && $article_categories->isNotEmpty())
                <h5>Categories</h5>
                <div class="categories-wrapper">
                    @foreach($article_categories as $category)
                        <div class="category {{ $category->name == 'Latest Articles' ? 'active' : '' }}" data-category="{{ $category->name }}">
                            {{ $category->name }}
                        </div>
                    @endforeach
                </div>
            @endif
            
            </div>

            <h5 class="mt-4">Latest Articles</h5>
            <div class="latest-articles-section">

                @foreach($latest_articles as $article)
                    <div class="article-container" data-category="lorem-ipsum">
                            @if($article -> thumbnail)
                            @else
                                <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Trending Image">
                            @endif
                        <div class="article-details">
                            <h6 class="article-title">{{ $article -> title }}</h6>
                            <div class="article-description">{!! $article -> content !!}</div>
                            <div class="article-metadata date-and-read">
                                <span class="small">{!! $article -> created_at !!}</span>
                                <span class="small time-read">{!! $article -> reading_time !!}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
               
            </div>
            
            <!-- NO BACKEND TABLE COLUMN FO THIS SECTION -->
            <!-- Find Us On Section -->
            <div class="find-us-on mt-4 mb-4">
                <h5>Find us on</h5>
                <div class="social-icons">
                <a href="#"><img src="/storage/frontend/FBICON.svg" alt="Facebook"></a>
                <a href="#"><img src="/storage/frontend/linkedinicon.svg" alt="LinkedIn"></a>
                <a href="#"><img src="/storage/frontend/ph-x-logo-bold.svg" alt="Twitter"></a>
                <a href="#"><img src="/storage/frontend/youtubeicon.svg" alt="YouTube"></a>
                </div>
            </div>

            <!-- NO BACKEND TABLE COLUMN FO THIS SECTION -->
            <!-- Subscription Section -->
            <div class="mt-4 mb-4">
                <h5>Subscription</h5>
                <p>Subscribe to our newsletter and receive a selection of cool articles every week</p>
                <div class="subscribe-form-opened-article">
                <input type="email" placeholder="Enter your email here">
                <button class="subscribe-button">Subscribe</button>
                </div>
            </div>
            </div>
        </div>

    </div>

@endsection