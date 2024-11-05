@extends('frontend.layouts.app')

@section('title', 'GPNI TV')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/gpni-tv.css') }}">
@endpush

@section('content')

    <div class="container my-5 py-5">
    <!-- SECTION 01-->
    @if($contents->{'section_1_title_en'})
        <div class="row d-flex align-items-center">
            <div class="col-lg-7">
                <div class="d-flex align-items-center mb-3">
                    <span class="rating me-2">{{ $contents->{'section_1_rating_title_' . $language} ?? $contents->{'section_1_rating_title_en'} }}</span>
                    {{ $contents->{'section_1_rating_' . $language} ?? $contents->{'section_1_rating_en'} }}
                </div>
                    
                <!-- saved in HTML format including <h1> and <h2> tags -->
                {!! $contents->{'section_1_title_' . $language} ?? $contents->{'section_1_title_en'} !!}
                
                <!-- saved in HTML format including <p> and <ul> tags -->
                {!! $contents->{'section_1_content_' . $language} ?? $contents->{'section_1_content_en'} !!}

                <div href="" class="btn btn-enroll mt-4">
                    Enroll Now
                    <img src="/storage/frontend/right-white-arrow.svg" alt="arrow-icon" width="10" height="12">
                </div>
            </div>
            <div class="col-lg-5 text-lg-end">
                
                @if($contents->{'section_1_image_' . $language})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $language}) }}" alt="GPNi-TV" class="img-fluid">
                @elseif($contents->{'section_1_image_en'})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_en'}) }}" alt="GPNi-TV" class="img-fluid">
                @else
                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="GPNi-TV" class="img-fluid">
                @endif
            </div>
        </div>
    @endif
    <!-- END OF SECTION 01 -->
    </div>

    <!-- SECTION 02-->
    @if($contents->{'section_2_title_en'})
    <div class="container-fluid summary-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="main-heading">{{ $contents->{'section_2_title_' . $language} ?? $contents->{'section_2_title_en'} }}</h2>
                <p class="sub-heading pb-5">{{ $contents->{'section_2_sub_title_' . $language} ?? $contents->{'section_2_sub_title_en'} }}</p>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-md-4 text-center">
                    <video controls class="img-fluid">
                        <source src="/storage/frontend/speaker 1 summary.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-md-8">
                    <img src="/storage/frontend/entypo-quote-4.svg" alt="quote-icon" class="quote-icon mb-3">
                    <div class="speaker-title">From The Science Of Building a Successful PT Business Webinar</div>
                    <div class="speaker-text">
                        Juan Carlos Santana MS CSCS FNSCA - What I've learned running the Institute of Human Performance
                        - BIO: Fitness maverick, founder of the Institute of Human Performance (IHP), dynamic speaker,
                        sought-after consultant, prolific author; for over 30 years Juan Carlos “JC”.
                    </div>
                </div>
            </div>

            <div class="divider"></div>
        </div>
    </div>
    @endif
    <!-- END OF SECTION 02 -->

    <!-- SECTION 03-->
    @if($contents->{'section_3_title_en'})
    <div class="container-fluid webinars-section">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="main-heading">{!! $contents->{'section_3_title_' . $language} ?? $contents->{'section_3_title_en'} !!}</h1>
                <p class="sub-heading">
                {!! $contents->{'section_3_description_' . $language} ?? $contents->{'section_3_description_en'} !!}
                </p>
            </div>

            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-5 text-center mb-4 mb-lg-0">
                @if($contents->{'section_3_image_' . $language})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_image_' . $language}) }}" alt="Global Experts" class="img-fluid">
                @elseif($contents->{'section_3_image_en'})
                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_3_image_en'}) }}" alt="Global Experts" class="img-fluid">
                @else
                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Global Experts" class="img-fluid">
                @endif
                </div>

                <!-- saved in HTML format including <p> and <ul> tags -->
                {!! $contents->{'section_3_content_' . $language} ?? $contents->{'section_3_content_en'} !!}
            </div>
        </div>
    </div>
    @endif
    <!-- END OF SECTION 03 -->

    <!-- SECTION 04 -->
    @if($contents->{'section_4_title_en'})
    <div class="container-fluid Famous-Global-Speakers-Experts-section">
        <div class="container">
            <div class="text-center mb-5">
            <!-- saved in HTML format including <p> and <h1> tags -->
                {!! $contents->{'section_4_title_' . $language} ?? $contents->{'section_4_title_en'} !!}
            </div>

            <div class="row justify-content-center">
                <!-- saved in HTML format including <p> and <ul> tags -->
                {!! $contents->{'section_4_content_' . $language} ?? $contents->{'section_4_content_en'} !!}
            </div>
        </div>
    </div>
    @endif
    <!-- END OF SECTION 04 -->

    <!-- SECTION 05-->
    @if($contents->{'section_5_title_en'})
    <div class="container-fluid Webinar-Seminar-Key-Takeaways-section">
        <div class="container">
            <div class="row g-5 d-flex align-items-center">
                
                <!-- saved in HTML format including <p> and <ul> tags -->
                {!! $contents->{'section_5_content_' . $language} ?? $contents->{'section_5_content_en'} !!}

                <div class="col-lg-6 text-center d-flex justify-content-center">
                    @if($contents->{'section_5_image_' . $language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_5_image_' . $language}) }}" alt="Webinar Image" class="img-fluid">
                    @elseif($contents->{'section_5_image_en'})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_5_image_en'}) }}" alt="Webinar Image" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Webinar Image" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- END OF SECTION 05 -->

    <!-- SECTION 06-->
    @if($contents->{'section_6_content_en'})
    <section class="learn-more-earn-more">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <!-- <img src="/storage/frontend/image-54.svg" alt="On-Demand Benefits" class="img-fluid"> -->
                    @if($contents->{'section_6_image_' . $language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_6_image_' . $language}) }}" alt="On-Demand Benefits" class="img-fluid">
                    @elseif($contents->{'section_6_image_en'})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_6_image_en'}) }}" alt="On-Demand Benefits" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="On-Demand Benefits" class="img-fluid">
                    @endif
                </div>
                <div class="col-md-6">
                    <!-- saved in HTML format including <p> and <ul> tags -->
                    {!! $contents->{'section_6_content_' . $language} ?? $contents->{'section_6_content_en'} !!}
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- END OF SECTION 06 -->

    <!-- SECTION 07-->
    @if($contents->{'section_7_content_en'})
    <section class="learn-grow-career-business">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4">
                    <!-- saved in HTML format including <p> and <ul> tags -->
                    {!! $contents->{'section_7_content_' . $language} ?? $contents->{'section_7_content_en'} !!}
                </div>
                <div class="col-md-6">
                    <video controls class="img-fluid">
                        <source src="/storage/frontend/learn & grow.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- END OF SECTION 07 -->

    <!-- SECTION 08-->
    @if($contents->{'section_8_title_en'})
    <section class="watch-anytime-anywhere">
        <div class="container">
            <h1>{{ $contents->{'section_8_title_' . $language} ?? $contents->{'section_8_title_en'} }}</h1>
            
            <!-- saved in HTML format including <p> and <ul> tags -->
            {!! $contents->{'section_8_content_' . $language} ?? $contents->{'section_8_content_en'} !!}
            <button class="btn-sign-up">Sign Up Now</button>
        </div>
    </section>
    @endif
    <!-- END OF SECTION 08 -->

    <!-- SECTION 09-->
    @if($contents->{'section_9_title_en'})
    <section class="previous-experts-seminars">
        <div class="container">
            <h1>{{ $contents->{'section_9_title_' . $language} ?? $contents->{'section_9_title_en'} }}</h1>

            <!-- saved in HTML format including <p> and <ul> tags -->
            {!! $contents->{'section_9_content_' . $language} ?? $contents->{'section_9_content_en'} !!}
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <video controls class="img-fluid">
                            <source src="/storage/frontend/prreviouse seminar 1.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <video controls class="img-fluid">
                            <source src="/storage/frontend/prreviouse seminar 2.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <video controls class="img-fluid">
                            <source src="/storage/frontend/prreviouse seminar 3.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <video controls class="img-fluid">
                            <source src="/storage/frontend/prreviouse seminar 4.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- END OF SECTION 09 -->

    <!-- SECTION 10 -->
    @if($contents->{'section_10_content_en'})
    <section class="special-offer-members">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <!-- <img src="/storage/frontend/image-55.svg" alt="Special Offer" class="img-fluid"> -->
                    @if($contents->{'section_10_image_' . $language})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_10_image_' . $language}) }}" alt="Special Offer" class="img-fluid">
                    @elseif($contents->{'section_10_image_en'})
                        <img src="{{ asset('storage/backend/pages/' . $contents->{'section_10_image_en'}) }}" alt="Special Offer" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Special Offer" class="img-fluid">
                    @endif
                </div>
                <div class="col-md-6">
                    <!-- saved in HTML format including <p> and <ul> tags -->
                    {!! $contents->{'section_10_content_' . $language} ?? $contents->{'section_10_content_en'} !!}
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- END OF SECTION 10 -->

    <!-- SECTION 11 -->
    @if($contents->{'section_11_title_en'})
    <section class="contact-us">
        <div class="container">
            <h1>{{ $contents->{'section_11_title_' . $language} ?? $contents->{'section_11_title_en'} }}</h1>
            <p>{{ $contents->{'section_11_sub_title_' . $language} ?? $contents->{'section_sub_11_title_en'} }}</p>
            <div class="contact-us-icons">
                <div class="row d-flex align-items-end">
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/email-grey.svg" alt="Email Icon" class="img-fluid">
                            <p>info@thegpni.com</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/insta-grey.svg" alt="Instagram Icon" class="img-fluid">
                            <p>Instagram</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/twitter-greey.svg" alt="Twitter Icon" class="img-fluid">
                            <p>Twitter</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/linkedin-grey.svg" alt="LinkedIn Icon" class="img-fluid">
                            <p>LinkedIn</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/youtube-grey.svg" alt="Youtube Icon" class="img-fluid">
                            <p>Youtube</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="icon-item text-center">
                            <img src="/storage/frontend/facebook-grey.svg" alt="Facebook Icon" class="img-fluid">
                            <p>Facebook</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="newsletter mt-4">
                <h2 style="color: #0040c3;">{{ $contents->{'section_11_message_' . $language} ?? $contents->{'section_11_message_en'} }}</h2>
                <div class="d-flex justify-content-center flex-wrap">
                    <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter email address">
                    <button class="btn btn-primary ml-md-2">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- END OF SECTION 11 -->


@endsection