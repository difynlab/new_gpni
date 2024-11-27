@extends('frontend.layouts.app')

@section('title', 'ISSN Official Partners Affiliates')

@push('after-styles')
<link rel="stylesheet" href="{{ asset('frontend/css/issn-official-partners-and-affiliates.css') }}">
@endpush

@section('content')
<main>
    @if($contents->section_1_title_en)
    <section class="container issn-container mt-4 mt-md-5 pt-3 pt-md-5">
        <div class="pt-3 pt-md-5 fs-61 fs-md-49 fs-sm-31 text-center mx-auto issn-heading">
            {{ $contents->{'section_1_title_'. $middleware_language} ?? $contents->section_1_title_en }}
        </div>

        <div class="partners-section container pt-3 pt-md-5 mt-3 mt-md-4">
            <h2 class="fs-49 fs-md-39 fs-sm-31 mb-3 mb-md-4">
                {{ $contents->{'section_1_sub_title_'. $middleware_language} ?? $contents->section_1_sub_title_en }}
            </h2>
            <div class="fs-25 fs-md-20 fs-sm-16 px-2 px-md-4 pt-2 pt-md-3">
                {!! $contents->{'section_1_description_'. $middleware_language} ?? $contents->section_1_description_en
                !!}
            </div>

            <div class="row py-3 py-md-5">
                <div class="row px-2 px-md-5 pb-3 pb-md-5 gx-2 gx-md-4 custom-row-gap">
                    @if(!$partners->isEmpty())
                    @foreach($partners as $partner)
                    <div class="col-6 col-md-3 pt-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/backend/persons/issn-partners/' . $partner->image) }}"
                            alt="Partner Logo" class="partner-images img-fluid">
                    </div>
                    @endforeach
                    @else
                    <div class="col-6 col-md-3 pt-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"
                            alt="No Image" class="partner-images img-fluid">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($contents->section_2_title_en)
    <section class="affiliates-section d-flex align-items-center py-4 py-md-5">
        <div class="container">
            <div class="row g-4 image-content-container">
                <div class="content col-12 col-lg-6 order-2 order-lg-1">
                    <h2 class="fs-49 fs-md-39 fs-sm-31 mb-3 mb-md-4">
                        {{ $contents->{'section_2_title_'. $middleware_language} ?? $contents->section_2_title_en }}
                    </h2>
                    <div class="description-content fs-25 fs-md-20 fs-sm-16">
                        {!! $contents->{'section_2_description_'. $middleware_language} ??
                        $contents->section_2_description_en !!}
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-1 order-lg-2 d-flex justify-content-center align-items-center">
                    @if($contents->{'section_2_image_' . $middleware_language})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_2_image_' . $middleware_language}) }}"
                        alt="Affiliates Image" class="image img-fluid">
                    @elseif($contents->section_2_image_en)
                    <img src="{{ asset('storage/backend/pages/' . $contents->section_2_image_en) }}"
                        alt="Affiliates Image" class="image img-fluid">
                    @else
                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}"
                        alt="Affiliates Image" class="image img-fluid">
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($contents->section_3_title_en)
    <section class="text-center py-4 py-md-5">
        <div class="container">
            <h2 class="fs-49 fs-md-39 fs-sm-31 mb-3 mb-md-4">
                {{ $contents->{'section_3_title_'. $middleware_language} ?? $contents->section_3_title_en }}
            </h2>
            <div class="fs-25 fs-md-20 fs-sm-16 text-subtitle text-center mx-auto mb-4">
                {!! $contents->{'section_3_description_'. $middleware_language} ?? $contents->section_3_description_en
                !!}
            </div>

            <div class="pt-3 pt-md-5 d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_3_labels_links_en)[0]->link }}"
                    class="btn btn-primary btn-responsive fs-20 fs-md-16 fs-sm-13">
                    {{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[0]->label ??
                    json_decode($contents->section_3_labels_links_en)[0]->label }}
                </a>

                <a href="{{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_3_labels_links_en)[1]->link }}"
                    class="btn sign-up-btn btn-responsive fs-20 fs-md-16 fs-sm-13 d-flex align-items-center justify-content-center">
                    {{ json_decode($contents->{'section_3_labels_links_' . $middleware_language})[1]->label ??
                    json_decode($contents->section_3_labels_links_en)[1]->label }}
                    <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow Right" class="ms-2" />
                </a>
            </div>
        </div>
    </section>
    @endif
</main>
@endsection