@extends('frontend.layouts.app')

@section('title', 'Show Podcast')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/podcast.css') }}">
@endpush

@section('content')

    <div class="full-page-layout">
        <section class="video-section">
            <div class="container-fluid p-0">
                <video autoplay loop muted controls>
                    <source src="{{ asset('storage/backend/podcasts/' . $podcast->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </section>

        <section class="content-section">
            <div class="container">
                <div class="date">
                    <img src="{{ asset('storage/frontend/small-calendar-icon.svg') }}" alt="Icon" width="21" height="21">
                    <span class="ms-2">{{ $podcast->created_at->format('d M Y') }}</span>
                </div>

                <div>{!! $podcast->content !!}</div>
            </div>
        </section>

        @if($contents->section_3_title_en)
            <section class="cta-section">
                <div class="container">
                    <h1 class="mb-4">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h1>
                    <div class="fs-25 ff-poppins-regular mb-3">{!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}</div>

                    <div class="pt-3 d-flex justify-content-center align-items-center flex-wrap cta-buttons">
                        <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_3_labels_links_en)[0]->link }}" class="btn-register">{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->section_3_labels_links_en)[0]->label }}</a>

                        <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_3_labels_links_en)[1]->link }}" class="btn-explore">
                            {{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->section_3_labels_links_en)[1]->label }}
                            <img src="{{ asset('storage/frontend/right-white-arrow.svg') }}" alt="Arrow Icon">
                        </a>
                    </div>
                </div>
            </section>
        @endif

        @if($contents->section_4_title_en)
            <section class="container instagram-section">
                <div class="row">
                    <div class="col-12 text-center">
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
                </div>
            </section>
        @endif
    </div>

@endsection