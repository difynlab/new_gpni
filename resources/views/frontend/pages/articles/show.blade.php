@extends('frontend.layouts.app')

@section('title', 'Show Article')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/article.css') }}">
@endpush

@section('content')

    <div class="container my-5">
        <div class="main-content my-5">
            <div class="content-wrapper mt-5 pt-5">
                <div class="header-metadata mt-2">
                    <img src="{{ asset('storage/frontend/calendar.svg') }}" alt="Calendar Icon" class="icon">
                    <span class="date">{{ $article->created_at->format('d M,Y') }}</span>
                </div>

                <h1>{{ $article->title }}</h1>

                <div class="content-section">
                    <div>{!! $article->content !!}</div>
                </div>

                <h6 class="mt-4">Author</h6>

                <div class="d-flex mt-3">
                    @if($article->author_image)
                        <img src="{{ asset('storage/backend/articles/author-images/' . $article->author_image) }}" alt="User" class="rounded-circle" style="width:60px; height:60px;">
                    @else
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Main Image" class="rounded-circle" style="width:60px; height:60px;">
                    @endif

                    <div class="ps-3">
                        <h6 class="username mb-1">{{ $article->author_name }}</h6>
                        <p class="mb-0" style="font-size: 13px;">{{ $article->author_designation }}</p>
                        <p class="mb-0" style="font-size: 12px;">{{ $article->author_description }}</p>
                    </div>
                </div>
            </div>

            <div class="sidebar mt-5">
                <a href="{{ route('frontend.gift-cards.index') }}">
                    <img src="{{ asset('storage/frontend/banner.svg') }}" alt="Banner" class="img-fluid mb-4 banner-section">
                </a>

                <h5 class="mt-4">Latest Articles</h5>

                <div class="latest-articles-section">
                    @foreach($latest_articles as $latest_article)
                        <a href="{{ route('frontend.articles.show', $latest_article) }}" class="text-decoration-none">
                            <div class="article-container">
                                @if($latest_article->thumbnail)
                                    <img src="{{ asset('storage/backend/articles/articles/'. $latest_article->thumbnail) }}" alt="Main Image" class="img-fluid w-100">
                                @else
                                    <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Trending Image">
                                @endif

                                <div class="article-details">
                                    <h6 class="article-title">{{ $latest_article->title }}</h6>

                                    <div class="article-description line-clamp-2">{!! $latest_article-> content !!}</div>

                                    <div class="article-metadata date-and-read">
                                        <span class="small">{{ $latest_article->created_at->format('M d,Y') }}</span>

                                        @if($latest_article->reading_time)
                                            <span class="small time-read">{{ $latest_article->reading_time }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="find-us-on mt-4 mb-4">
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

                <div class="subscribe mt-4 mb-4">
                    <h5>{{ $contents->{'section_1_newsletter_title_' . $middleware_language} ?? $contents->section_1_newsletter_title_en }}</h5>

                    <p>{{ $contents->{'section_1_newsletter_description_' . $middleware_language} ?? $contents->section_1_newsletter_description_en }}</p>

                    <form class="subscribe-form-article">
                        <input type="email" placeholder="{{ $contents->{'section_1_newsletter_placeholder_' . $middleware_language} ?? $contents->section_1_newsletter_placeholder_en }}" required>
                        <button type="submit">{{ $contents->{'section_1_newsletter_button_' . $middleware_language} ?? $contents->section_1_newsletter_button_en }}</button>
                    </form>
                </div>
            </div>
        </div>

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
    </div>

@endsection