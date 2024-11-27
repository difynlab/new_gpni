@extends('frontend.layouts.app')

@section('title', 'Show Article')

@push('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/css/article.css') }}">
@endpush

@section('content')

<div class="container my-lg-5 pt-lg-5">
    <div class="main-content row">
        <div class="col-lg-8">
            <div class="content-wrapper mt-5">
                <div class="header-metadata mt-2">
                    <img src="{{ asset('storage/frontend/calendar.svg') }}" alt="Calendar Icon" class="icon">
                    <span class="custom-text-muted date-meta fs-13">{{ $article->created_at->format('d M,Y') }}</span>
                </div>

                <h1 class="fs-36 pt-2">{{ $article->title }}</h1>

                <div class="content-section fs-16">
                    <div>{!! $article->content !!}</div>
                </div>

                <h6 class="mt-4 fs-16 author-title text-center text-md-start">Author</h6>

                <div
                    class="d-flex mt-1 flex-column flex-md-row align-items-center align-items-md-start text-center text-md-start">
                    @if($article->author_image)
                    <img src="{{ asset('storage/backend/articles/author-images/' . $article->author_image) }}"
                        alt="User" class="rounded-circle img-fluid mx-auto mx-md-0" style="width:60px; height:60px;">
                    @else
                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"
                        alt="Main Image" class="rounded-circle img-fluid mx-auto mx-md-0"
                        style="width:60px; height:60px;">
                    @endif

                    <div class="ps-0 ps-md-3 mt-3 mt-md-0">
                        <h6 class="username mb-1 fs-16">{{ $article->author_name }}</h6>
                        <p class="mb-0 fs-13">{{ $article->author_designation }}</p>
                        <p class="mb-0 fs-12">{{ $article->author_description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sidebar mt-5 ps-md-4 px-3">
                <a href="{{ route('frontend.gift-cards.index') }}">
                    <img src="{{ asset('storage/frontend/banner.svg') }}" alt="Banner" class="img-fluid mb-4 banner-section w-100
                        ">
                </a>

                <h5 class="fs-16 latest-article-title py-2">Latest Articles</h5>
                <div class="latest-articles-section">
                    @if($latest_articles->isNotEmpty())
                    @foreach($latest_articles as $latest_article)
                    <a href="{{ route('frontend.articles.show', $latest_article) }}" class="text-decoration-none">
                        <div class="article-container">
                            <div class="row g-3 w-100">
                                <div class="col-4 col-lg-6">
                                    @if($latest_article->thumbnail)
                                    <img src="{{ asset('storage/backend/articles/articles/'. $latest_article->thumbnail) }}"
                                        alt="Main Image" class="img-fluid object-fit-cover">
                                    @else
                                    <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}"
                                        alt="Trending Image" class="img-fluid object-fit-cover">
                                    @endif
                                </div>
                                <div class="col-8 col-lg-6">
                                    <div class="article-details">
                                        <h6 class="article-title fs-13 title-clamp">{{ $latest_article->title }}</h6>
                                        <div class="line-clamp-2 fs-12">{!! $latest_article->content
                                            !!}
                                        </div>
                                        <div
                                            class="date-and-read d-flex justify-content-between align-items-center flex-wrap gap-2 mt-2 mt-md-3">
                                            <span class="small text-muted">{{ $latest_article->created_at->format('M
                                                d,Y')
                                                }}</span>
                                            @if($latest_article->reading_time)
                                            <span class="small time-read d-flex align-items-center gap-1">
                                                <img src="{{ asset('storage/frontend/clock.svg') }}" alt="Clock"
                                                    class="read-icon" style="width: 12px; height: 12px;">
                                                <span class="d-inline-block">{{ $latest_article->reading_time }}</span>
                                            </span> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @endif
                </div>

                <div class="find-us-on d-flex flex-column align-items-lg-start align-items-center mt-4">
                    <div class="title fs-16 text-lg-start text-center">
                        {{ $contents->{'section_1_social_title_' . $middleware_language} ??
                        $contents->section_1_social_title_en }}
                    </div>
                    <div class="social-icons d-flex justify-content-lg-start justify-content-center gap-4">
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

                <div class="subscribe fs-16 d-flex flex-column align-items-lg-start align-items-center">
                    <h5 class="fs-16 text-lg-start text-center w-100">
                        {{ $contents->{'section_1_newsletter_title_' . $middleware_language} ??
                        $contents->section_1_newsletter_title_en }}</h5>

                    <p class="fs-16 text-lg-start text-center w-100">
                        {{ $contents->{'section_1_newsletter_description_' . $middleware_language} ??
                        $contents->section_1_newsletter_description_en }}</p>

                    <form class="subscribe-form-article">
                        <input type="email" class="fs-16"
                            placeholder="{{ $contents->{'section_1_newsletter_placeholder_' . $middleware_language} ?? $contents->section_1_newsletter_placeholder_en }}"
                            required>
                        <button type="submit" class="m-2">{{ $contents->{'section_1_newsletter_button_' .
                            $middleware_language} ??
                            $contents->section_1_newsletter_button_en }}</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


    @if($contents->section_2_title_en)
    <div class="instagram-section container-fluid px-3 px-md-4 pt-md-5 pt-2">
        <h2 class="fs-49 mb-3 mb-md-4">{{ $contents->{'section_2_title_' . $middleware_language} ??
            $contents->section_2_title_en }}</h2>

        <p class="fs-25 mb-4 mb-md-5">{{ $contents->{'section_2_description_' . $middleware_language} ??
            $contents->section_2_description_en }}</p>

        <div class="instagram-images row g-3 justify-content-center">
            <div class="col-6 col-sm-6 col-md-3">
                <img src="{{ asset('storage/frontend/follow-us-on-1.jpg') }}" alt="Instagram post 1"
                    class="img-fluid w-100 h-100 object-fit-cover">
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <img src="{{ asset('storage/frontend/follow-us-on-2.jpg') }}" alt="Instagram post 2"
                    class="img-fluid w-100 h-100 object-fit-cover">
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <img src="{{ asset('storage/frontend/follow-us-on-3.jpg') }}" alt="Instagram post 3"
                    class="img-fluid w-100 h-100 object-fit-cover">
            </div>
            <div class="col-6 col-sm-6 col-md-3">
                <img src="{{ asset('storage/frontend/follow-us-on-4.jpg') }}" alt="Instagram post 4"
                    class="img-fluid w-100 h-100 object-fit-cover">
            </div>
        </div>
    </div>
    @endif
</div>

@endsection