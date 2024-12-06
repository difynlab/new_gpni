@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/insurance-and-professional-membership.css') }}">
@endpush

@section('content')
    @if($contents->section_1_title_en)
        <div class="container bg-white section my-md-5 my-0">
            <h2 class="title-main text-center mx-auto my-5 fs-61">
                {{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}
            </h2>
            <div class="row align-items-center g-0 my-5">
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                    @if($contents->{'section_1_image_' . $middleware_language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}"
                            alt="Cover image" class="img-fluid img-fluid-custom">
                    @elseif($contents->section_1_image_en)
                        <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="Cover image"
                            class="img-fluid img-fluid-custom">
                    @else
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Cover image"
                            class="img-fluid img-fluid-custom">
                    @endif
                </div>
                <div class="col-md-6 content-text fs-25 px-md-0 px-4">
                    {!! $contents->{'section_1_content_' . $middleware_language} ?? $contents->section_1_content_en !!}
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_content_en)
        <div class="container-fluid section approve-section approve-section-background">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-md-7 content-text-white fs-25">
                        {!! $contents->{'section_2_content_' . $middleware_language} ?? $contents->section_2_content_en !!}
                    </div>
                    <div class="col-md-5 text-center">
                        @if($contents->{'section_2_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}"
                                alt="Certified" class="img-fluid img-approved">
                        @elseif($contents->section_2_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}" alt="Certified"
                                class="img-fluid img-approved">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"
                                alt="Certified" class="img-fluid img-approved">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_3_content_en)
        <div class="container bg-white section my-5">
            <div class="content-text fs-25 px-md-0 px-4">
                {!! $contents->{'section_3_content_' . $middleware_language} ?? $contents->section_3_content_en !!}
            </div>
        </div>
    @endif

    @if($contents->section_4_content_en)
        <div class="container-fluid section approve-section-background">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center">
                        @if($contents->{'section_4_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_4_image_' . $middleware_language}) }}"
                                alt="Importance of insurance" class="img-fluid img-fluid-custom">
                        @elseif($contents->section_4_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_4_image_en) }}"
                                alt="Importance of insurance" class="img-fluid img-fluid-custom">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"
                                alt="Importance of insurance" class="img-fluid img-fluid-custom">
                        @endif
                    </div>
                    <div class="col-md-6 content-text-white insurance-text fs-25">
                        {!! $contents->{'section_4_content_' . $middleware_language} ?? $contents->section_4_content_en !!}
                    </div>
                </div>

                <div class="highlight-box mt-4">
                    <div>
                        {!! $contents->{'section_4_sub_content_' . $middleware_language} ?? $contents->section_4_sub_content_en !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_5_content_en)
        <div class="container bg-white section my-5">
            <div class="content-text px-4 px-md-0 fs-25">
                {!! $contents->{'section_5_content_' . $middleware_language} ?? $contents->section_5_content_en !!}
            </div>
        </div>
    @endif

@endsection