@extends('frontend.layouts.app')

@section('title', 'Education Partners')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/global-education-partners.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <section class="global-education-partners py-5 my-5">
            <div class="container text-center">
                <h2 class="section-title mb-4">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h2>
            </div>
        </section>

        <section class="education-partners py-5">
            <div class="container text-center">
                <h2 class="section-title mb-4">{{ $contents->{'section_1_sub_title_' . $middleware_language} ?? $contents->section_1_sub_title_en }}</h2>

                <div class="mb-5">{!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}</div>

                @if(!$global_education_partners->isEmpty())
                    <div class="partner-logos">
                        <div class="row justify-content-center">
                            @foreach($global_education_partners as $global_education_partner)
                                <div class="col-6 col-md-3">
                                    <img src="{{ asset('storage/backend/persons/global-education-partners/' . $global_education_partner->image) }}" alt="Global Partner" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
    
    @if($contents->section_2_title_en)
        <section class="education-table py-5">
            <div class="container text-center">
                <h2 class="section-title">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</h2>

                <table>
                    <thead>
                        <tr>
                            <th>{{ $contents->{'section_2_first_column_title_' . $middleware_language} ?? $contents->section_2_first_column_title_en }}</th>
                            <th>{{ $contents->{'section_2_second_column_title_' . $middleware_language} ?? $contents->section_2_second_column_title_en }}</th>
                            <th>{{ $contents->{'section_2_third_column_title_' . $middleware_language} ?? $contents->section_2_third_column_title_en }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(json_decode($contents->{'section_2_points_' . $middleware_language} ?? $contents->section_2_points_en) as $section_2_point)
                            <tr>
                                <td>{!! $section_2_point->partner_name !!}</td>
                                <td>{!! $section_2_point->course_name !!}</td>
                                <td>{!! $section_2_point->points !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>  
    @endif

    @if($contents->section_3_title_en)
        <section class="middleware_language-partners py-5">
            <div class="container text-center">
                <h2 class="section-title">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h2>
                <div class="mb-5">{!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}</div>
                <h3 class="sub-title">{{ $contents->{'section_3_sub_title_' . $middleware_language} ?? $contents->section_3_sub_title_en }}</h3>

                <div class="language-cards">
                    @foreach(json_decode($contents->{'section_3_languages_' . $middleware_language} ?? $contents->section_3_languages_en) as $section_3_language)
                        <div class="language-card" tabindex="0">
                            <p>{{ $contents->{'section_3_language_title_' . $middleware_language} ?? $contents->section_3_language_title_en }}</p>
                            <h3>{{ $section_3_language }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_4_title_en)
        <section class="journey-start py-5">
            <div class="container">
                <h2 class="section-title">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</h2>
                <p class="section-subtitle">{{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en }}</p>

                <div class="text-center mt-3">
                    <a href="{{ json_decode($contents->{'section_4_label_link_' . $middleware_language})->link ?? json_decode($contents->section_4_label_link_en)->link }}" class="btn signup-btn">{{ json_decode($contents->{'section_4_label_link_' . $middleware_language})->label ?? json_decode($contents->section_4_label_link_en)->label }}</a>
                </div>
            </div>
        </section>
    @endif

    @if($contents->{'section_5_title_en'})
        <section class="other-education-partners py-5">
            <div class="container text-center">
                <h2 class="section-title mb-4">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->{'section_5_title_en'} }}</h2>
                <div class="section-subtitle mb-5">{!! $contents->{'section_5_description_' . $middleware_language} ?? $contents->{'section_5_description_en'} !!}</div>
                
                @if($contents->section_5_points_en)
                    @foreach(json_decode($contents->{'section_5_points_' . $middleware_language} ?? $contents->section_5_points_en) as $section_5_point)
                        <div class="partner-card">
                            <img src="{{ asset('storage/backend/pages/' . $section_5_point->image) }}" alt="Other Partner Logo" class="partner-logo"/>
                            <div class="partner-info">{!! $section_5_point->content !!}</div>
                        </div>
                        <hr class="hr-divider"/>
                    @endforeach
                @endif
            </div>
        </section>
    @endif

@endsection