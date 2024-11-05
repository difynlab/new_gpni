@extends('frontend.layouts.app')

@section('title', 'Podcasts')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/podcasts.css') }}">
@endpush

@php
    $links = json_decode($contents->{'section_3_labels_links_' . $language} ?? $contents->section_3_labels_links_en, true);
@endphp

@section('content')
 
    @if($contents->{'section_1_title_en'})
    <!-- Hero Section -->
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-text">
            {!!  $contents->{'section_1_title_' . $language} ?? $contents->{'section_1_title_en'} !!}
            </div>
            <div class="play-container">
                <img src="/storage/frontend/clarity-play-solid.svg" class="play-button" alt="Play Button" width="47" height="47">
                <img src="/storage/frontend/fooo.svg" class="play-wave" alt="Sound Wave" width="402" height="67.38">
            </div>
        </div>
    </div>
    @endif

    @if($contents->{'section_2_title_en'})
    <!-- Podcast Section -->
    <div class="podcast-section container">
        <div class="section-title">{{ $contents->{'section_2_title_' . $language} ?? $contents->{'section_2_title_en'} }}</div>

        @foreach($podcasts as $podcast)
            <!-- Podcast Card 1 -->
            <div class="podcast-card">
                <img src="/storage/frontend/podcast.png" alt="Podcast Cover" class="podcast-image">
                <div class="podcast-content">
                    <div class="podcast-header">
                        <div>
                            <img src="/storage/frontend/icons.svg" alt="Calendar Icon">
                            <span> {!! $podcast->created_at !!}</span>
                        </div>
                        <div>
                            <img src="/storage/frontend/podcastlistennow.svg" alt="Listen Icon">
                            <span>Listen Now</span>
                        </div>
                    </div>
                    <div class="podcast-main-title">
                         {{ $podcast->title }}
                    </div>
                    <div class="podcast-description">
                        {!! $podcast->content !!}
                    </div>
                    <div class="podcast-link">
                        <span>Watch Now</span>
                        <img src="/storage/frontend/podcastWatchArrow.svg" alt="Watch Icon">
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        @endforeach

    </div>
    @endif

    @if($contents->{'section_3_title_en'})
    <!-- Journey Section -->
    <div class="journey-section">
        <h1>{{ $contents->{'section_3_title_' . $language} ?? $contents->{'section_3_title_en'} }}</h1>
        <p></p>
        <div class="cta-buttons">
            <!-- Register Now Button -->
            @if(isset($links[0]))
                <a href="{{ $links[0]['link'] }}" class="register-btn">{{ $links[0]['label'] }}</a>
            @endif

            <!-- Explore More Button -->
            @if(isset($links[1]))
                <a href="{{ $links[1]['link'] }}" class="explore-more">
                    {{ $links[1]['label'] }}
                    <img src="/storage/frontend/podarrow.svg" alt="Arrow Icon">
                </a>
            @endif
        </div>
    </div>
    @endif

    @if($contents->{'section_4_title_en'})
    <!-- Instagram Section -->
    <div class="instagram-section">
        <h2>{{ $contents->{'section_4_title_' . $language} ?? $contents->{'section_4_title_en'} }}</h2>
        <p>{{ $contents->{'section_4_description_' . $language} ?? $contents->{'section_4_description_en'} }}</p>
        <div class="instagram-images">
            <img src="/storage/frontend/followuson1.jpg" alt="Instagram Image 1">
            <img src="/storage/frontend/followuson2.jpg" alt="Instagram Image 2">
            <img src="/storage/frontend/followuson3.jpg" alt="Instagram Image 3">
            <img src="/storage/frontend/followuson4.jpg" alt="Instagram Image 4">
        </div>
    </div>
    @endif

@endsection