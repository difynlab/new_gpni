@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/podcasts.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="hero-container">
            <div class="hero-content d-flex flex-column align-items-center align-items-lg-start">
                <div class="hero-text fs-49">
                    {!! preg_replace('/Tune in!$/', '<span class="highlight">Tune in!</span>', $contents->{'section_1_title_' .
                    $middleware_language} ?? $contents->section_1_title_en) !!}
                </div>

                <div class="play-container mt-3 mt-md-0 px-md-0 px-3">
                    <img src="{{ asset('storage/frontend/play-icon.svg') }}" class="play-button" alt="Play Button">
                    <img src="{{ asset('storage/frontend/audio-waves.svg') }}" class="play-wave" alt="Sound Wave">
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_title_en && !$podcasts->isEmpty())
        <div class="podcast-section container">
            <div class="podcast-section-title fs-31">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</div>

            @if($podcasts->isNotEmpty())
                @foreach($podcasts as $podcast)
                    <div class="podcast-card row mb-4">
                        <div class="col-12 col-md-4 h-100">
                            @if($podcast->thumbnail)
                                <img src="{{ asset('storage/backend/podcasts/'. $podcast->thumbnail) }}" alt="Main Image" class="img-fluid podcast-image">
                            @else
                                <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Main Image" class="img-fluid podcast-image">
                            @endif
                        </div>

                        <div class="podcast-content col-12 col-md-8 d-flex flex-column justify-content-center">
                            <div class="podcast-header d-flex justify-content-between opacity-4">
                                <div>
                                    <img src="{{ asset('storage/frontend/small-calendar-icon.svg') }}" alt="Calendar Icon">
                                    <span class="fs-16">{{ $podcast->created_at->format('d M Y') }}</span>
                                </div>
                                <div>
                                    <img src="{{ asset('storage/frontend/play-icon-gray.svg') }}" alt="Listen Icon">
                                    <span class="fs-16">{{ $contents->{'section_2_listen_' . $middleware_language} ?? $contents->section_2_listen_en }}</span>
                                </div>
                            </div>
                            <div class="podcast-main-title fs-25 line-clamp-2">{{ $podcast->title }}</div>
                            <div class="podcast-description fs-20 line-clamp-4">{!! $podcast->content !!}</div>
                            <div class="podcast-link d-flex align-items-center gap-2 pt-1 pb-1">
                                <a href="{{ route('frontend.podcasts.show', $podcast) }}" class="text-decoration-none">
                                    <span class="fs-20">{{ $contents->{'section_2_watch_' . $middleware_language} ?? $contents->section_2_watch_en }}</span>
                                    <img src="{{ asset('storage/frontend/medium-arrow-right.svg') }}" alt="Watch Icon">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>
                @endforeach

                {{ $podcasts->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
            @endif
        </div>
    @endif

    @if($contents->section_3_title_en)
        <div class="journey-section">
            <h1 class="mb-4 fs-49">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h1>

            <div class="fs-25 ff-poppins-regular mb-3">{!! $contents->{'section_3_description_' . $middleware_language} ??
                $contents->section_3_description_en !!}</div>

            <div class="pt-3 d-flex justify-content-center align-items-center flex-wrap cta-buttons">
                <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_3_labels_links_en)[0]->link }}"
                    class="register-btn fs-20">{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->label
                    ?? json_decode($contents->section_3_labels_links_en)[0]->label }}</a>

                <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_3_labels_links_en)[1]->link }}"
                    class="explore-more fs-20">
                    {{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->label ??
                    json_decode($contents->section_3_labels_links_en)[1]->label }}
                    <img src="{{ asset('storage/frontend/right-white-arrow.svg') }}" alt="Arrow Icon">
                </a>
            </div>
        </div>
    @endif

    @if($contents->section_4_title_en)
        <div class="instagram-section container-fluid px-3 px-md-4 py-5">
            <h2 class="fs-49 mb-3 mb-md-4">{{ $contents->{'section_4_title_' . $middleware_language} ??
                $contents->section_4_title_en }}</h2>

            <p class="fs-25 mb-4 mb-md-5">{{ $contents->{'section_4_description_' . $middleware_language} ??
                $contents->section_4_description_en }}</p>

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

@endsection