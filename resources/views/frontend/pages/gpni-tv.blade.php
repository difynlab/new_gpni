@extends('frontend.layouts.app')

@section('title', 'GPNI TV')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/gpni-tv.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="container my-5 py-5"> 
            <div class="row d-flex align-items-center">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center mb-3">
                        <span class="rating me-2">{{ $contents->{'section_1_rating_title_' . $middleware_language} ?? $contents->section_1_rating_title_en }}</span>
                        
                        {{ $contents->{'section_1_rating_' . $middleware_language} ?? $contents->section_1_rating_en }}
                    </div>

                    <h1>{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h1>

                    <div>{!! $contents->{'section_1_content_' . $middleware_language} ?? $contents->section_1_content_en !!}</div>

                    <a href="{{ json_decode($contents->{'section_1_label_link_' . $middleware_language})->link ?? json_decode($contents->section_1_label_link_en)->link }}" class="btn btn-enroll mt-4">
                        {{ json_decode($contents->{'section_1_label_link_' . $middleware_language})->label ?? json_decode($contents->section_1_label_link_en)->label }}
                        <img src="{{ asset('storage/frontend/right-white-arrow.svg') }}" alt="arrow-icon" width="10" height="12">
                    </a>
                </div>

                <div class="col-lg-5 text-lg-end">
                    @if($contents->{'section_1_image_' . $middleware_language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="GPNi-TV" class="img-fluid">
                    @elseif($contents->section_1_image_en)
                        <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="GPNi-TV" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="GPNi-TV" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_title_en)
        <div class="container-fluid summary-section py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="main-heading">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</h2>
                    <p class="sub-heading pb-5">{{ $contents->{'section_2_sub_title_' . $middleware_language} ?? $contents->section_2_sub_title_en }}</p>
                </div>

                @if(!$recent_webinars->isEmpty())
                    @foreach($recent_webinars as $recent_webinar)
                        <div class="row align-items-center mb-5">
                            <div class="col-md-4 text-center">
                                <video controls class="img-fluid">
                                    <source src="{{ asset('storage/backend/webinars/' . $recent_webinar->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div class="col-md-8">
                                <img src="{{ asset('storage/frontend/entypo-quote-4.svg') }}" alt="quote-icon" class="quote-icon mb-3">
                                <div class="speaker-text">{!! $recent_webinar->content !!}</div>
                            </div>
                        </div>

                        <div class="divider"></div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif

    @if($contents->section_3_title_en)
        <div class="container-fluid webinars-section">
            <div class="container">
                <div class="text-center mb-5">
                    <h1 class="main-heading">{!! $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en !!}</h1>
                    <p class="sub-heading">
                    {!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}
                    </p>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5 text-center mb-4 mb-lg-0">
                        @if($contents->{'section_3_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_image_' . $middleware_language}) }}" alt="Global Experts" class="img-fluid">
                        @elseif($contents->section_3_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_3_image_en) }}" alt="Global Experts" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Global Experts" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-lg-7">
                        <div>{!! $contents->{'section_3_content_' . $middleware_language} ?? $contents->section_3_content_en !!}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_4_title_en)
        <div class="container-fluid Famous-Global-Speakers-Experts-section">
            <div class="container">
                <h1 class="main-heading">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</h1>

                <div class="row justify-content-center">
                    {!! $contents->{'section_4_content_' . $middleware_language} ?? $contents->section_4_content_en !!}
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_5_content_en)
        <div class="container-fluid Webinar-Seminar-Key-Takeaways-section">
            <div class="container">
                <div class="row g-5 d-flex">
                    <div class="col-lg-6">
                        {!! $contents->{'section_5_content_' . $middleware_language} ?? $contents->section_5_content_en !!}
                    </div>
                    
                    <div class="col-lg-6 text-center d-flex justify-content-center">
                        @if($contents->{'section_5_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_5_image_' . $middleware_language}) }}" alt="Webinar Image" class="img-fluid">
                        @elseif($contents->section_5_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_5_image_en) }}" alt="Webinar Image" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Webinar Image" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_6_content_en)
        <section class="learn-more-earn-more">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        @if($contents->{'section_6_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_6_image_' . $middleware_language}) }}" alt="On-Demand Benefits" class="img-fluid">
                        @elseif($contents->section_6_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_6_image_en) }}" alt="On-Demand Benefits" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="On-Demand Benefits" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-6">
                        {!! $contents->{'section_6_content_' . $middleware_language} ?? $contents->section_6_content_en !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_7_content_en)
        <section class="learn-grow-career-business">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        {!! $contents->{'section_7_content_' . $middleware_language} ?? $contents->section_7_content_en !!}
                    </div>
                    <div class="col-md-6">
                        @if($contents->{'section_7_video_' . $middleware_language})
                            <video controls class="img-fluid">
                                <source src="{{ asset('storage/backend/pages/' . $contents->{'section_7_video_' . $middleware_language}) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @elseif($contents->section_7_video_en)
                            <video controls class="img-fluid">
                                <source src="{{ asset('storage/backend/pages/' . $contents->section_7_video_en) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="On-Demand Benefits" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_8_title_en)
        <section class="watch-anytime-anywhere">
            <div class="container">
                <h1>{{ $contents->{'section_8_title_' . $middleware_language} ?? $contents->section_8_title_en }}</h1>
                
                <div>{!! $contents->{'section_8_content_' . $middleware_language} ?? $contents->section_8_content_en !!}</div>

                <a href="{{ json_decode($contents->{'section_8_label_link_' . $middleware_language})->link ?? json_decode($contents->section_8_label_link_en)->link }}" class="btn-sign-up">
                    {{ json_decode($contents->{'section_8_label_link_' . $middleware_language})->label ?? json_decode($contents->section_8_label_link_en)->label }}
                </a>
            </div>
        </section>
    @endif

    @if($contents->section_9_title_en)
        <section class="previous-experts-seminars">
            <div class="container">
                <h1>{{ $contents->{'section_9_title_' . $middleware_language} ?? $contents->section_9_title_en }}</h1>

                <div>{!! $contents->{'section_9_content_' . $middleware_language} ?? $contents->section_9_content_en !!}</div>
                
                @if(!$previous_webinars->isEmpty())
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($previous_webinars as $previous_webinar)
                                <div class="col-12 col-md-6 col-lg-3 mb-3">
                                    <video controls class="img-fluid">
                                        <source src="{{ asset('storage/backend/webinars/' . $previous_webinar->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if($contents->section_10_content_en)
        <section class="special-offer-members">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        @if($contents->{'section_10_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_10_image_' . $middleware_language}) }}" alt="Special Offer" class="img-fluid">
                        @elseif($contents->section_10_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_10_image_en) }}" alt="Special Offer" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Special Offer" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-6">
                        {!! $contents->{'section_10_content_' . $middleware_language} ?? $contents->section_10_content_en !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_11_title_en)
        <section class="contact-us">
            <div class="container">
                <h1>{{ $contents->{'section_11_title_' . $middleware_language} ?? $contents->section_11_title_en }}</h1>
                <p>{{ $contents->{'section_11_sub_title_' . $middleware_language} ?? $contents->section_sub_11_title_en }}</p>

                <div class="contact-us-icons">
                    <div class="row d-flex align-items-end">
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="mailto:{{ $settings->email }}" class="text-decoration-none">
                                    <img src="{{ asset('storage/frontend/email-grey.svg') }}" alt="Email Icon" class="img-fluid">
                                    <p>{{ $settings->email }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->instagram }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/insta-grey.svg') }}" alt="Instagram Icon" class="img-fluid">
                                    <p>Instagram</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->twitter }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/twitter-greey.svg') }}" alt="Twitter Icon" class="img-fluid">
                                    <p>Twitter</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->linkedin }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/linkedin-grey.svg') }}" alt="LinkedIn Icon" class="img-fluid">
                                    <p>LinkedIn</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->youtube }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/youtube-grey.svg') }}" alt="Youtube Icon" class="img-fluid">
                                    <p>Youtube</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->fb }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/facebook-grey.svg') }}" alt="Facebook Icon" class="img-fluid">
                                    <p>Facebook</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="newsletter mt-4">
                    <h2 class="mb-3" style="color: #0040c3;">{{ $contents->{'section_11_message_' . $middleware_language} ?? $contents->section_11_message_en }}</h2>
                    
                    <div class="d-flex justify-content-center flex-wrap">
                        <input type="email" class="form-control mb-2 mb-md-0" placeholder="{{ $contents->{'section_11_placeholder_' . $middleware_language} ?? $contents->section_11_placeholder_en }}">
                        <button class="btn btn-primary ml-md-2">{{ $contents->{'section_11_button_' . $middleware_language} ?? $contents->section_11_button_en }}</button>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection