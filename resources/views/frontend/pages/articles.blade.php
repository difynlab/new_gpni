@extends('frontend.layouts.app')

@section('title', 'Articles and Trending Section')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/article.css') }}">
@endpush

@section('content')

    <div class="container mt-5 pt-5">
        @if($contents->{'title_en'})
            <h1 class="all-articles-heading pt-5">{{ $contents->{'title_' . $language} ?? $contents->{'title_en'} }}</h1>
        @endif

        @if($article_categories && $article_categories->isNotEmpty())
            <div class="article-categories">
                @foreach($article_categories as $category)
                    <div class="category {{ $category->name == 'Latest Articles' ? 'active' : '' }}" data-category="{{ $category->name }}">
                        {{ $category->name }}
                    </div>
                @endforeach
            </div>
        @endif

        <div class="row">
            <!-- Main content (left column) with cards -->
            <div class="col-lg-8">
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-6 col-sm-12 my-3 card-wrapper" data-category="{{ $article->category->name ?? 'Uncategorized' }}">
                        <div class="card bg-light">
                            <div class="position-relative">
                                @if($article->thumbnail)
                                    <img src="{{ asset('storage/backend/articles/articles/'. $article->thumbnail) }}" alt="Main Image" class="img-fluid w-100">
                                @else
                                    <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Main Image" class="img-fluid w-100">
                                @endif
                                <div class="share-icon position-absolute">
                                    <button class="btn btn-light" onclick="shareContent('{{ $article->title }}', '{{ asset('storage/backend/articles/articles/' . $article->thumbnail) }}')">
                                        <img src="/storage/frontend/share icon1.svg" alt="Share Icon">
                                    </button>
                                </div>
                            </div>
                            <div class="p-3">
                                <div class="header-metadata mb-2">
                                    <img src="/storage/frontend/calendar.svg" alt="Icon" class="icon mr-2">
                                    <span class="text-muted">{{ $article->created_at }}</span>
                                    <div class="divider"></div>
                                    <span class="custom-text-muted">{{ $article->category->name ?? 'Uncategorized' }}</span>
                                </div>
                                <h5 class="text-primary mb-2">{{ $article->title }}</h5>
                                <div class="text-muted card-text mb-4">{!! $article->content !!}</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        @if($article->author_image)
                                            <img src="{{ asset('storage/backend/articles/author-images/'.$article->author_image) }}" alt="User" class="rounded-circle" 
                                            style="width:40px; height:40px;">
                                        @endif 
                                        <span class="username">{{ $article->author_name }}</span>
                                    </div>
                                    <a href="{{ route('frontend.single-article', ['id' => $article->id]) }}" class="text-primary read-more-button">
                                        <span>Read More</span>
                                        <i class="fas fa-arrow-circle-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            </div>

            <!-- Right column with trending articles and additional sections -->
            <div class="col-lg-4">
                <!-- Trending Articles Section -->
                <div class="trending-articles-section">
                    <h5>Trending Articles</h5>
                    
                    @foreach($articles as $article)
                    <div class="trending-article">
                        @if($article -> thumbnail)
                            <img src="{{ asset('storage/backend/articles/articles/'.$article -> thumbnail) }}" alt="Trending Image">
                        @else
                            <img src="{{ asset('storage/backend/common/'.App\Models\Setting::find(1)->no_image) }}" alt="Trending Image">
                        @endif
                        <div class="trending-content">
                        <h6>{!! $article -> title !!}</h6>
                        <p>{!! $article -> content !!}</p>
                        <div class="date-and-read">
                            <span class="small">{!! $article -> created_at !!}</span>
                            <span class="small time-read">
                            <img src="/storage/frontend/bitcoin-icons_clock-.svg" alt="Clock" class="read-icon">{!! $article -> reading_time !!}</span>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Find Us On Section -->
                <div class="find-us-on">
                <div class="title">Find us on</div>
                <div class="social-icons">
                    <a href="#"><img src="/storage/frontend/FBICON.svg" alt="Facebook"></a>
                    <a href="#"><img src="/storage/frontend/linkedinicon.svg" alt="LinkedIn"></a>
                    <a href="#"><img src="/storage/frontend/ph-x-logo-bold.svg" alt="Xing"></a>
                    <a href="#"><img src="/storage/frontend/youtubeicon.svg" alt="YouTube"></a>
                </div>
                </div>

                <!-- NO BACKEND TABLE COLUMN FO THIS SECTION -->
                <!-- Subscription Section -->
                <div class="subscribe">
                <h5>Subscribe to our Newsletter</h5>
                <p>Subscribe to our newsletter and receive a selection of cool articles every week</p>
                <form class="subscribe-form-article">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
                </div>
            </div>
        </div>
        
    </div>

  <!-- NO BACKEND TABLE COLUMN FO THIS SECTION -->
  <!-- Follow us on instagram Section -->
  <!-- <div class="instagram-section">
    <h2>Follow us on Instagram</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing sed do eiusmod tempor incididunt.</p>
    <div class="instagram-images">
      <img src="/storage/frontend/followuson1.jpg" alt="Instagram post 1">
      <img src="/storage/frontend/followuson2.jpg" alt="Instagram post 2">
      <img src="/storage/frontend/followuson3.jpg" alt="Instagram post 3">
      <img src="/storage/frontend/followuson4.jpg" alt="Instagram post 4">
    </div>
  </div> -->

@endsection

@push('after-scripts')
<script src="{{ asset('frontend/js/main_article.js') }}"></script>
@endpush