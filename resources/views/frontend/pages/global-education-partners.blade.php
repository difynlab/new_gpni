@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/global-education-partners.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <section class="global-education-partners py-md-5 mt-md-5">
            <div class="container text-center pt-5">
                <h2 class="section-title-global text-center mx-auto mb-4 fs-61">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h2>
            </div>
        </section>

        <section class="education-partners py-5">
            <div class="container text-center">
                <h2 class="section-title-partners text-center mx-auto mb-4 fs-49">{{ $contents->{'section_1_sub_title_' . $middleware_language} ?? $contents->section_1_sub_title_en }}</h2>

                <div class="mb-5 fs-25">{!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}</div>

                @if(!$global_education_partners->isEmpty())
                    <div class="partner-logos">
                        <div class="row gx-4 gy-2 justify-content-center">
                            @foreach($global_education_partners as $index => $global_education_partner)
                                <div class="col-12 col-sm-6 col-md-4 mb-2 d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('storage/backend/persons/global-education-partners/' . $global_education_partner->image) }}" alt="Global Partner" class="img-fluid fixed-height">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
    
    @if($contents->section_2_title_en)
        <section class="education-table py-3 py-md-5">
            <div class="container px-2 px-md-3">
                <div class="text-center">
                    <h2 class="section-title fs-49">
                        {{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}
                    </h2>
                </div>
                
                <div class="d-flex justify-content-center">
                    <div class="table-responsive">
                        <table class="table table-bordered mx-auto custom-width-table">
                            <thead>
                                <tr class="fs-25">
                                    <th class="p-2 p-md-3 border-0">
                                        {{ $contents->{'section_2_first_column_title_' . $middleware_language} ?? $contents->section_2_first_column_title_en }}
                                    </th>
                                    <th class="p-2 p-md-3 border-0">
                                        {{ $contents->{'section_2_second_column_title_' . $middleware_language} ?? $contents->section_2_second_column_title_en }}
                                    </th>
                                    <th class="p-2 p-md-3 border-0 third-column text-center">
                                        {{ $contents->{'section_2_third_column_title_' . $middleware_language} ?? $contents->section_2_third_column_title_en }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($contents->section_2_points_en)
                                    @foreach(json_decode($contents->{'section_2_points_' . $middleware_language} ?? $contents->section_2_points_en) as $section_2_point)
                                        <tr class="fs-25 bg-transparent">
                                            <td class="p-2 p-md-3 bg-transparent text-white fs-25 fw-light">{!! $section_2_point->partner_name !!}</td>
                                            <td class="p-2 p-md-3 bg-transparent text-white fs-25 fw-light">{!! $section_2_point->course_name !!}</td>
                                            <td class="p-2 p-md-3 bg-transparent text-white fs-25 fw-light third-column text-center">{!! $section_2_point->points !!}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_3_title_en)
        <section class="middleware_language-partners py-5">
            <div class="container text-center">
                <h2 class="section-title fs-49 py-2">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h2>
                <div class="mb-5 fs-25">{!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}</div>
                <h3 class="sub-title fs-31">{{ $contents->{'section_3_sub_title_' . $middleware_language} ?? $contents->section_3_sub_title_en }}</h3>
                <div class="language-cards row mx-0">
                    @foreach(json_decode($contents->{'section_3_languages_' . $middleware_language} ?? $contents->section_3_languages_en) as $section_3_language)
                        <div class="col-12 col-sm-6 col-md-3 mx-2 my-2 my-md-0">
                            <div class="language-card h-100">
                                <p class="fs-13 fs-md-16 mb-2">
                                    {{ $contents->{'section_3_language_title_' . $middleware_language} ?? $contents->section_3_language_title_en }}
                                </p>
                                <h3 class="fs-20 fs-md-25 mb-0">{{ $section_3_language }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_4_title_en)
        <section class="journey-start py-5">
            <div class="container">
                <h2 class="section-title fs-49">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</h2>
                <p class="section-subtitle fs-25">{{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en }}</p>

                <div class="text-center mt-3">
                    <a href="{{ json_decode($contents->{'section_4_label_link_' . $middleware_language})->link ?? json_decode($contents->section_4_label_link_en)->link }}" class="btn signup-btn">{{ json_decode($contents->{'section_4_label_link_' . $middleware_language})->label ?? json_decode($contents->section_4_label_link_en)->label }}</a>
                </div>
            </div>
        </section>
    @endif

    @if($contents->{'section_5_title_en'})
        <section class="other-education-partners py-3 py-md-5">
            <div class="container text-center px-2 px-md-3">
                <h2 class="section-title fs-49 mb-3 mb-md-4">
                    {{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->{'section_5_title_en'} }}
                </h2>
                <div class="section-subtitle fs-20 mb-4 mb-md-5">
                    {!! $contents->{'section_5_description_' . $middleware_language} ?? $contents->{'section_5_description_en'} !!}
                </div>
                
                @if($contents->section_5_points_en)
                    @foreach(json_decode($contents->{'section_5_points_' . $middleware_language} ?? $contents->section_5_points_en) as $section_5_point)
                        <div class="partner-card flex-column flex-md-row">
                            <img src="{{ asset('storage/backend/pages/' . $section_5_point->image) }}" 
                                alt="Other Partner Logo" 
                                class="partner-logo mb-3 mb-md-0"
                                style="max-width: 120px; width: 100%; height: auto;"/>
                            <div class="partner-info fs-20 text-center text-md-start">
                                {!! $section_5_point->content !!}
                            </div>
                        </div>
                        <hr class="hr-divider my-4 my-md-5"/>
                    @endforeach
                @endif
            </div>
        </section>
    @endif

@endsection