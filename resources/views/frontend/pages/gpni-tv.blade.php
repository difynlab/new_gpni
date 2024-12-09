@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/gpni-tv.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="container my-5 py-5 gpni-container">
            <x-frontend.notification></x-frontend.notification>

            <div class="row d-flex align-items-center">
                <div class="col-lg-7 mx-auto text-center text-lg-start">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-3">
                        <span class="rating me-2">{{ $contents->{'section_1_rating_title_' . $middleware_language} ?? $contents->section_1_rating_title_en }}</span>
                        
                        @if($contents->{'section_1_rating_' . $middleware_language})
                            @for($i = 1; $i <= $contents->{'section_1_rating_' . $middleware_language}; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                        @elseif($contents->section_1_rating_en)
                            @for($i = 1; $i <= $contents->section_1_rating_en; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                        @endif
                    </div>
                
                    <h1 class="fs-49">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h1>
                
                    <div class="section-1">{!! $contents->{'section_1_content_' . $middleware_language} ?? $contents->section_1_content_en !!}</div>
                
                    <a href="{{ json_decode($contents->{'section_1_label_link_' . $middleware_language})->link ?? json_decode($contents->section_1_label_link_en)->link }}" class="btn btn-enroll mt-4 fs-20">
                        {{ json_decode($contents->{'section_1_label_link_' . $middleware_language})->label ?? json_decode($contents->section_1_label_link_en)->label }}
                        <img src="{{ asset('storage/frontend/right-white-arrow.svg') }}" alt="arrow-icon" width="10" height="12">
                    </a>
                </div>

                <div class="col-lg-5 text-lg-end">
                    @if($contents->{'section_1_image_' . $middleware_language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="GPNi-TV" class="img-fluid pt-lg-0 pt-3 hide-on-small">
                    @elseif($contents->section_1_image_en)
                        <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="GPNi-TV" class="img-fluid pt-lg-0 pt-3 hide-on-small">
                    @else
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="GPNi-TV" class="img-fluid pt-lg-0 pt-3 hide-on-small">
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_title_en)
        <div class="container-fluid summary-section py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="main-heading fs-49">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</h2>
                    <p class="sub-heading pb-3 fs-25">{{ $contents->{'section_2_sub_title_' . $middleware_language} ?? $contents->section_2_sub_title_en }}</p>
                </div>

                @if($recent_webinars->isNotEmpty())
                    @foreach($recent_webinars as $recent_webinar)
                        <div class="row align-items-center mb-5">
                            <div class="col-md-5 text-center">
                                <video controls class="img-fluid video-container">
                                    <source src="{{ asset('storage/backend/webinars/' . $recent_webinar->video) }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="col-md-7">
                                <img src="{{ asset('storage/frontend/quote.svg') }}" alt="quote-icon" class="quote-icon mb-3">
                                <div class="speaker-text fs-20">{!! $recent_webinar->content !!}</div>
                            </div>
                        </div>

                        <div class="divider"></div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif

    @if($contents->section_3_title_en)
        <div class="container-fluid webinars-section py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h1 class="main-heading fs-49">{!! $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en !!}</h1>
                    <div class="sub-heading fs-25">
                    {!! $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en !!}
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-md-5 text-center mb-4 mb-lg-0">
                        @if($contents->{'section_3_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_image_' . $middleware_language}) }}" alt="Global Experts" class="img-fluid">
                        @elseif($contents->section_3_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_3_image_en) }}" alt="Global Experts" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Global Experts" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="section-3 px-2">{!! $contents->{'section_3_content_' . $middleware_language} ?? $contents->section_3_content_en !!}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_4_title_en)
        <div class="container-fluid Famous-Global-Speakers-Experts-section py-5">
            <div class="container">
                <h1 class="main-heading fs-49">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}</h1>

                <div class="row justify-content-center section-4">
                    {!! $contents->{'section_4_content_' . $middleware_language} ?? $contents->section_4_content_en !!}
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_5_content_en)
        <div class="container-fluid Webinar-Seminar-Key-Takeaways-section py-5 ">
            <div class="container">
                <div class="row g-5 d-flex">
                    <div class="col-md-6 section-5">
                        {!! $contents->{'section_5_content_' . $middleware_language} ?? $contents->section_5_content_en !!}
                    </div>
                    
                    <div class="col-md-6 text-center d-flex justify-content-center mt-0">
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
        <section class="learn-more-earn-more my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        @if($contents->{'section_6_image_' . $middleware_language})
                            <img src="{{ asset('storage/backend/pages/' . $contents->{'section_6_image_' . $middleware_language}) }}" alt="On-Demand Benefits" class="img-fluid learn-more-image">
                        @elseif($contents->section_6_image_en)
                            <img src="{{ asset('storage/backend/pages/' . $contents->section_6_image_en) }}" alt="On-Demand Benefits" class="img-fluid learn-more-image">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="On-Demand Benefits" class="img-fluid learn-more-image">
                        @endif
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center content-section">
                        {!! $contents->{'section_6_content_' . $middleware_language} ?? $contents->section_6_content_en !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_7_content_en)
        <section class="learn-grow-career-business my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-4 d-flex flex-column justify-content-center section-7">
                        {!! $contents->{'section_7_content_' . $middleware_language} ?? $contents->section_7_content_en !!}
                    </div>
                    <div class="col-md-6 d-flex justify-content-center ">
                        @if($contents->{'section_7_video_' . $middleware_language})
                            <video controls class="img-fluid learn-grow-video">
                                <source src="{{ asset('storage/backend/pages/' . $contents->{'section_7_video_' . $middleware_language}) }}" type="video/mp4">
                            </video>
                        @elseif($contents->section_7_video_en)
                            <video controls class="img-fluid learn-grow-video">
                                <source src="{{ asset('storage/backend/pages/' . $contents->section_7_video_en) }}" type="video/mp4">
                            </video>
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="On-Demand Benefits" class="img-fluid learn-grow-video">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_8_title_en)
        <section class="watch-anytime-anywhere">
            <div class="container">
                <h1 class="fs-49">{{ $contents->{'section_8_title_' . $middleware_language} ?? $contents->section_8_title_en }}</h1>
                
                <div class="fs-25 section-8-content">{!! $contents->{'section_8_content_' . $middleware_language} ?? $contents->section_8_content_en !!}</div>                
                <div class="pt-3">
                    <a href="{{ json_decode($contents->{'section_8_label_link_' . $middleware_language})->link ?? json_decode($contents->section_8_label_link_en)->link }}" class="btn-sign-up">
                        {{ json_decode($contents->{'section_8_label_link_' . $middleware_language})->label ?? json_decode($contents->section_8_label_link_en)->label }}
                    </a>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_9_title_en)
        <section class="previous-experts-seminars">
            <div class="container">
                <h1 class="fs-49">{{ $contents->{'section_9_title_' . $middleware_language} ?? $contents->section_9_title_en }}</h1>

                <div class="fs-25 section-9-content">{!! $contents->{'section_9_content_' . $middleware_language} ?? $contents->section_9_content_en !!}</div>                
                @if($previous_webinars->isNotEmpty())
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($previous_webinars as $previous_webinar)
                                <div class="col-12 col-md-6 col-lg-3 mb-3">
                                    <video controls class="img-fluid">
                                        <source src="{{ asset('storage/backend/webinars/' . $previous_webinar->video) }}" type="video/mp4">
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
                    <div class="col-md-6 pt-md-0 pt-3">
                        {!! $contents->{'section_10_content_' . $middleware_language} ?? $contents->section_10_content_en !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($contents->section_11_title_en)
        <section class="contact-us">
            <div class="container">
                <h1 class="fs-49">{{ $contents->{'section_11_title_' . $middleware_language} ?? $contents->section_11_title_en }}</h1>
                <p class="fs-25">{{ $contents->{'section_11_sub_title_' . $middleware_language} ?? $contents->section_11_sub_title_en }}</p>

                <div class="contact-us-icons">
                    <div class="row d-flex align-items-end">
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="mailto:{{ $settings->email }}" class="text-decoration-none">
                                    <img src="{{ asset('storage/frontend/email-gray.svg') }}" alt="Email Icon" class="img-fluid">
                                    <p>{{ $settings->email }}</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->instagram }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/instagram-gray.svg') }}" alt="Instagram Icon" class="img-fluid">
                                    <p>{{ $contents->{'section_11_instagram_' . $middleware_language} ?? $contents->section_11_instagram_en }}</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->twitter }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/twitter-gray.svg') }}" alt="Twitter Icon" class="img-fluid">
                                    <p>{{ $contents->{'section_11_twitter_' . $middleware_language} ?? $contents->section_11_twitter_en }}</p>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->linkedin }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/linkedin-gray.svg') }}" alt="LinkedIn Icon" class="img-fluid">
                                    <p>{{ $contents->{'section_11_linkedin_' . $middleware_language} ?? $contents->section_11_linkedin_en }}</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->youtube }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/youtube-gray.svg') }}" alt="Youtube Icon" class="img-fluid">
                                    <p>{{ $contents->{'section_11_youtube_' . $middleware_language} ?? $contents->section_11_youtube_en }}</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->fb }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/facebook-gray.svg') }}" alt="Facebook Icon" class="img-fluid">
                                    <p>{{ $contents->{'section_11_facebook_' . $middleware_language} ?? $contents->section_11_facebook_en }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="newsletter mt-4">
                    <h2 class="mb-3 fs-20" style="color: #0040c3;">{{ $contents->{'section_11_message_' . $middleware_language} ?? $contents->section_11_message_en }}</h2>
                    
                    <form action="{{ route('frontend.subscription') }}" method="POST">
                        @csrf
                                                <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="d-flex flex-md-row justify-content-center align-items-center">
                                        <input type="email" class="form-control" name="email" placeholder="{{ $contents->{'section_11_placeholder_' . $middleware_language} ?? $contents->section_11_placeholder_en }}" required>
                                        <button class="btn btn-primary ml-md-2">{{ $contents->{'section_11_button_' . $middleware_language} ?? $contents->section_11_button_en }}</button>
                                    </div>
                                    <x-frontend.input-error field="email"></x-frontend.input-error>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endif

@endsection