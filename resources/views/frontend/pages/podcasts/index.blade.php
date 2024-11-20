@extends('frontend.layouts.app')

@section('title', 'Podcasts')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/podcasts.css') }}">
@endpush

@section('content')
 
    @if($contents->section_1_title_en)
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-text">
                    {{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}
                </div>

                <div class="play-container">
                    <img src="{{ asset('storage/frontend/play-icon.svg') }}" class="play-button" alt="Play Button" width="47" height="47">
                    <img src="{{ asset('storage/frontend/audio-waves.svg') }}" class="play-wave" alt="Sound Wave" width="402" height="67.38">
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_title_en && !$podcasts->isEmpty())
        <div class="podcast-section container">
            <div class="section-title">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</div>

            @foreach($podcasts as $podcast)
                <div class="podcast-card">

                    @if($podcast->thumbnail)
                        <img src="{{ asset('storage/backend/podcasts/'. $podcast->thumbnail) }}" alt="Main Image" class="img-fluid podcast-image">
                    @else
                        <img src="{{ asset('storage/backend/common/'. App\Models\Setting::find(1)->no_image) }}" alt="Main Image" class="img-fluid podcast-image">
                    @endif

                    <div class="podcast-content">
                        <div class="podcast-header">
                            <div>
                                <img src="{{ asset('storage/frontend/small-calendar-icon.svg') }}" alt="Calendar Icon">
                                <span>{{ $podcast->created_at->format('d M Y') }}</span>
                            </div>
                            <div>
                                <img src="{{ asset('storage/frontend/play-icon-gray.svg') }}" alt="Listen Icon">
                                <span>Listen Now</span>
                            </div>
                        </div>
                        <div class="podcast-main-title line-clamp-2">{{ $podcast->title }}</div>
                        <div class="podcast-description line-clamp-4">{!! $podcast->content !!}</div>
                        <div class="podcast-link">
                            <a href="{{ route('frontend.podcasts.show', $podcast) }}" class="text-decoration-none">
                                <span>Watch Now</span>
                                <img src="{{ asset('storage/frontend/medium-arrow-right.svg') }}" alt="Watch Icon">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="divider"></div>
            @endforeach

            {{ $podcasts->links("pagination::bootstrap-5") }}
        </div>
    @endif

    @if($contents->section_3_title_en)
        <div class="journey-section">
            <h1 class="mb-4">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h1>

            <div class="fs-25 ff-poppins-regular mb-3">{!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}</div>

            <div class="pt-3 d-flex justify-content-center align-items-center flex-wrap cta-buttons">
                <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_3_labels_links_en)[0]->link }}" class="register-btn">{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->section_3_labels_links_en)[0]->label }}</a>

                <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_3_labels_links_en)[1]->link }}" class="explore-more">
                    {{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->section_3_labels_links_en)[1]->label }}
                    <img src="{{ asset('storage/frontend/right-white-arrow.svg') }}" alt="Arrow Icon">
                </a>
            </div>
        </div>
    @endif

    @if($contents->section_4_title_en)
        <div class="instagram-section">
            <h2>{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</h2>

            <p>{{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en }}</p>

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