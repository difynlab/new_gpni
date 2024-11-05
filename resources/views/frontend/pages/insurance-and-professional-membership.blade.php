@extends('frontend.layouts.app')

@section('title', 'Insurance & Professional Membership')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/insurance-and-professional-membership.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="container bg-white section my-5">
            <h2 class="title-main">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h2>
            <div class="d-flex-custom">
                <div>
                    @if($contents->{'section_1_image_' . $middleware_language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="Cover image" class="img-fluid img-fluid-custom"
                        style="max-width: 610px;">
                    @elseif($contents->section_1_image_en)
                        <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="Cover image" class="img-fluid img-fluid-custom"
                        style="max-width: 610px;">
                    @else
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Cover image" class="img-fluid img-fluid-custom"
                        style="max-width: 610px;">
                    @endif
                </div>
                <div class="content-text" style="max-width: 587px;">
                    {!! $contents->{'section_1_content_' . $middleware_language} ?? $contents->section_1_content_en !!}
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_content_en)
        <div class="container-fluid section approve-section approve-section-background">
            <div class="container">
                <div class="d-flex-custom">
                    <div>
                        <div class="content-text-white">
                            {!! $contents->{'section_2_content_' . $middleware_language} ?? $contents->section_2_content_en !!}
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        @if($contents->{'section_2_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}" alt="Certified" class="img-fluid img-fluid-custom"
                            style="max-width: 480px;">
                        @elseif($contents->section_2_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}" alt="Certified" class="img-fluid img-fluid-custom"
                            style="max-width: 480px;">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Certified" class="img-fluid img-fluid-custom"
                            style="max-width: 480px;">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_3_content_en)
        <div class="container bg-white section my-5">
            <div class="content-text" style="max-width: 1245px; margin: 0 auto;">
                {!! $contents->{'section_3_content_' . $middleware_language} ?? $contents->section_3_content_en !!}
            </div>
        </div>
    @endif

    @if($contents->section_4_content_en)
        <div class="container-fluid section approve-section-background">
            <div class="container">
                <div class="d-flex-custom align-items-center">
                    <div class="text-center">
                        @if($contents->{'section_4_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_4_image_' . $middleware_language}) }}" alt="Importance of insurance"
                            class="img-fluid img-fluid-custom"
                            style="max-width: 486px; margin-right: auto; margin-left: auto;">
                        @elseif($contents->section_4_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_4_image_en) }}" alt="Importance of insurance"
                            class="img-fluid img-fluid-custom"
                            style="max-width: 486px; margin-right: auto; margin-left: auto;">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Importance of insurance"
                            class="img-fluid img-fluid-custom"
                            style="max-width: 486px; margin-right: auto; margin-left: auto;">
                        @endif
                    </div>
                    <div style="max-width: 726px;">
                        <div class="content-text-white">
                            {!! $contents->{'section_4_content_' . $middleware_language} ?? $contents->section_4_content_en !!}
                        </div>
                    </div>
                </div>

                <div class="highlight-box">
                    <div>
                        {!! $contents->{'section_4_sub_content_' . $middleware_language} ?? $contents->section_4_sub_content_en !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_5_content_en)
        <div class="container bg-white section my-5">
            <div class="content-text" style="max-width: 1245px; margin: 0 auto;">
                {!! $contents->{'section_5_content_' . $middleware_language} ?? $contents->section_5_content_en !!}
            </div>
        </div>
    @endif

@endsection