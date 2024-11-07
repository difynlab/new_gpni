@extends('frontend.layouts.app')

@section('title', 'ISSN Official Partners Affiliates')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/issn-official-partners-and-affiliates.css') }}">
@endpush

@section('content')

    <main>
        @if($contents->section_1_title_en)
            <section class="container issn-heading text-center mt-5 pt-5">
                <h1 class="pt-5">{{ $contents->{'section_1_title_'. $middleware_language} ?? $contents->section_1_title_en }}</h1>

                <div class="partners-section container pt-5">
                    <h2>{{ $contents->{'section_1_sub_title_'. $middleware_language} ?? $contents->section_1_sub_title_en }}</h2>
                    <div>{!! $contents->{'section_1_description_'. $middleware_language} ?? $contents->section_1_description_en !!}</div>

                    <div class="image-container">
                        @if(!$partners->isEmpty())
                            @foreach($partners as $partner)
                                <div class="image-container">
                                    <img src="{{ asset('storage/backend/persons/issn-partners/' . $partner->image) }}" alt="Partner Logo">
                                </div>
                            @endforeach
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"  alt="No Image">
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @if($contents->section_2_title_en)
            <section class="affiliates-section d-flex align-items-center">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="content">
                        <h2>{{ $contents->{'section_2_title_'. $middleware_language} ?? $contents->section_2_title_en }}</h2>
                        <div>{!! $contents->{'section_2_description_'. $middleware_language} ?? $contents->section_2_description_en !!}</div>
                    </div>
                    <div class="image">
                        @if($contents->{'section_2_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}"  alt="Affiliates Image">
                        @elseif($contents->section_2_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}"  alt="Affiliates Image">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"  alt="Affiliates Image">
                        @endif
                    </div>
                </div>
            </section>
        @endif
        
        @if($contents->section_3_title_en)
            <section class="text-center" style="padding: 60px 0;">
                <h2>{{ $contents->{'section_3_title_'. $middleware_language} ?? $contents->section_3_title_en }}</h2>
                <div>{!! $contents->{'section_3_description_'. $middleware_language} ?? $contents->section_3_description_en !!}</div>

                <div class="d-flex justify-content-center">
                    <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_3_labels_links_en)[0]->link }}" class="btn btn-primary me-3">{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->section_3_labels_links_en)[0]->label }}</a>

                    <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_3_labels_links_en)[1]->link }}" class="btn btn-outline-primary">{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->section_3_labels_links_en)[1]->label }}</a>
                </div>
            </section>
        @endif
    </main>

@endsection