@extends('frontend.layouts.app')

@section('title', 'Articles')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/articles.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="container my-5 pt-5">
            <h1 class="all-articles-heading pt-5">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h1>
            
            <div class="row">
                <div class="col-lg-8">
                    <ul class="nav" role="tablist">
                        <li class="nav-item m-0" role="presentation">
                            <button class="nav-link category active" id="latest-articles-tab" data-bs-toggle="tab" data-bs-target="#latest-articles-tab-pane" type="button" role="tab" aria-controls="latest-articles-tab-pane" aria-selected="true">Latest Articles</button>
                        </li>
                        <li class="nav-item my-0 ms-5" role="presentation">
                            <button class="nav-link category" id="recommended-tab" data-bs-toggle="tab" data-bs-target="#recommended-tab-pane" type="button" role="tab" aria-controls="recommended-tab-pane" aria-selected="false">Recommended</button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="latest-articles-tab-pane" role="tabpanel" aria-labelledby="latest-articles-tab" tabindex="0">
                            <div class="row">
                                @if($articles->isNotEmpty())
                                    @foreach($articles as $article)
                                        <div class="col-md-6 col-sm-12 my-3 card-wrapper">
                                            <div class="card bg-light">
                                                <div class="position-relative">
                                                    @if($article->thumbnail)
                                                        <img src="{{ asset('storage/backend/articles/articles/'. $article->thumbnail) }}" alt="Main Image" class="img-fluid w-100">
                                                    @else
                                                        <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Main Image" class="img-fluid w-100">
                                                    @endif
                                                    <div class="share-icon position-absolute">
                                                        <button class="btn btn-light">
                                                            <img src="{{ asset('storage/frontend/share-icon.svg') }}" alt="Share Icon">
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="p-3">
                                                    <div class="header-metadata mb-2">
                                                        <img src="{{ asset('storage/frontend/calendar.svg') }}" alt="Icon" class="icon mr-2">
                                                        <span class="text-muted">{{ $article->created_at->format('d M,Y') }}</span>
                                                        <div class="divider">|</div>
                                                        <span class="custom-text-muted">{{ App\Models\ArticleCategory::find($article->article_category_id)->name }}</span>
                                                    </div>
                                                    <h5 class="text-primary mb-2">{{ $article->title }}</h5>

                                                    <div class="text-muted card-text mb-4 line-clamp-4">{!! $article->content !!}</div>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            @if($article->author_image)
                                                                <img src="{{ asset('storage/backend/articles/author-images/'.$article->author_image) }}" alt="User" class="rounded-circle" 
                                                                style="width:40px; height:40px;">
                                                            @else
                                                                <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Main Image" class="rounded-circle" style="width:40px; height:40px;">
                                                            @endif 
                                                            <span class="username">{{ $article->author_name ?? 'Unknown'}}</span>
                                                        </div>
                                                        <a href="{{ route('frontend.articles.show', $article) }}" class="text-primary read-more-button">
                                                            <span>Read More</span>
                                                            <i class="fas fa-arrow-circle-right ms-2"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            {{ $articles->links("pagination::bootstrap-5") }}
                        </div>

                        <div class="tab-pane fade" id="recommended-tab-pane" role="tabpanel" aria-labelledby="recommended-tab" tabindex="0">
                            <div class="row">
                                @if($recommended_articles->isNotEmpty())
                                    @foreach($recommended_articles as $recommended_article)
                                        <div class="col-md-6 col-sm-12 my-3 card-wrapper">
                                            <div class="card bg-light">
                                                <div class="position-relative">
                                                    @if($recommended_article->thumbnail)
                                                        <img src="{{ asset('storage/backend/articles/articles/'. $recommended_article->thumbnail) }}" alt="Main Image" class="img-fluid w-100">
                                                    @else
                                                        <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Main Image" class="img-fluid w-100">
                                                    @endif
                                                    <div class="share-icon position-absolute">
                                                        <button class="btn btn-light">
                                                            <img src="{{ asset('storage/frontend/share-icon.svg') }}" alt="Share Icon">
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="p-3">
                                                    <div class="header-metadata mb-2">
                                                        <img src="{{ asset('storage/frontend/calendar.svg') }}" alt="Icon" class="icon mr-2">
                                                        <span class="text-muted">{{ $recommended_article->created_at->format('d M,Y') }}</span>
                                                        <div class="divider">|</div>
                                                        <span class="custom-text-muted">{{ App\Models\ArticleCategory::find($recommended_article->article_category_id)->name }}</span>
                                                    </div>
                                                    <h5 class="text-primary mb-2">{{ $recommended_article->title }}</h5>

                                                    <div class="text-muted card-text mb-4 line-clamp-4">{!! $recommended_article->content !!}</div>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            @if($recommended_article->author_image)
                                                                <img src="{{ asset('storage/backend/articles/author-images/'.$recommended_article->author_image) }}" alt="User" class="rounded-circle" 
                                                                style="width:40px; height:40px;">
                                                            @else
                                                                <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Main Image" class="rounded-circle" style="width:40px; height:40px;">
                                                            @endif 
                                                            <span class="username">{{ $recommended_article->author_name ?? 'Unknown'}}</span>
                                                        </div>
                                                        <a href="{{ route('frontend.articles.show', $recommended_article) }}" class="text-primary read-more-button">
                                                            <span>Read More</span>
                                                            <i class="fas fa-arrow-circle-right ms-2"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            {{ $recommended_articles->links("pagination::bootstrap-5") }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="trending-articles-section">
                        <h5>Trending Articles</h5>
                        
                        @if($trending_articles->isNotEmpty())
                            @foreach($trending_articles as $trending_article)
                                <a href="{{ route('frontend.articles.show', $trending_article) }}" class="text-decoration-none">
                                    <div class="trending-article">
                                        @if($trending_article->thumbnail)
                                            <img src="{{ asset('storage/backend/articles/articles/' . $trending_article->thumbnail) }}" alt="Trending Image">
                                        @else
                                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Trending Image">
                                        @endif

                                        <div class="trending-content">
                                            <h6>{{ $trending_article->title }}</h6>

                                            <div class="line-clamp-2">{!! $trending_article->content !!}</div>

                                            <div class="date-and-read mt-3">
                                                <span class="small">{{ $trending_article->created_at->format('M d,Y') }}</span>
                                                
                                                @if($trending_article->reading_time)
                                                    <span class="small time-read">
                                                        <img src="{{ asset('storage/frontend/clock.svg') }}" alt="Clock" class="read-icon">
                                                        {{ $trending_article->reading_time }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>

                    <div class="find-us-on">
                        <div class="title">{{ $contents->{'section_1_social_title_' . $middleware_language} ?? $contents->section_1_social_title_en }}</div>
                        <div class="social-icons">
                            <a href="{{ $settings->fb }}">
                                <img src="{{ asset('storage/frontend/fb-icon.svg') }}" alt="Facebook">
                            </a>
                            <a href="{{ $settings->linkedin }}">
                                <img src="{{ asset('storage/frontend/linkedin-icon.svg') }}" alt="LinkedIn">
                            </a>
                            <a href="{{ $settings->youtube }}">
                                <img src="{{ asset('storage/frontend/youtube-icon.svg') }}" alt="YouTube">
                            </a>
                        </div>
                    </div>

                    <div class="subscribe">
                        <h5>{{ $contents->{'section_1_newsletter_title_' . $middleware_language} ?? $contents->section_1_newsletter_title_en }}</h5>

                        <p>{{ $contents->{'section_1_newsletter_description_' . $middleware_language} ?? $contents->section_1_newsletter_description_en }}</p>

                        <form class="subscribe-form-article">
                            <input type="email" placeholder="{{ $contents->{'section_1_newsletter_placeholder_' . $middleware_language} ?? $contents->section_1_newsletter_placeholder_en }}" required>
                            <button type="submit">{{ $contents->{'section_1_newsletter_button_' . $middleware_language} ?? $contents->section_1_newsletter_button_en }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_title_en)
        <div class="instagram-section">
            <h2>{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</h2>

            <p>{{ $contents->{'section_2_description_' . $middleware_language} ?? $contents->section_2_description_en }}</p>

            <!-- This will be dynamic after connecting with the instagram feed -->
                <div class="instagram-images">
                    <img src="{{ asset('storage/frontend/follow-us-on-1.jpg') }}" alt="Instagram post 1">
                    <img src="{{ asset('storage/frontend/follow-us-on-2.jpg') }}" alt="Instagram post 2">
                    <img src="{{ asset('storage/frontend/follow-us-on-3.jpg') }}" alt="Instagram post 3">
                    <img src="{{ asset('storage/frontend/follow-us-on-4.jpg') }}" alt="Instagram post 4">
                </div>
            <!-- This will be dynamic after connecting with the instagram feed -->
        </div>
    @endif

@endsection