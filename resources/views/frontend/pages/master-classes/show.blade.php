@extends('frontend.layouts.app')

@section('title', $contents->{'single_master_class_page_name_' . $middleware_language} ?? $contents->single_master_class_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/master-class.css') }}">
@endpush

@section('content')

    <div class="container" style="padding-top: 150px;">
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-4">{{ $course->title }}</h1>
                <div class="d-flex align-items-center mt-3">
                    <span class="me-2" style="font-size: 16px; font-weight: 500; color: #898989;">{{ $average_rating }}.0</span>
                    @for($i = 0; $i < $average_rating; $i++)
                        <i class="bi bi-star-fill star"></i>
                    @endfor
                    <span class="ms-2" style="font-size: 16px; font-weight: 500; color: #898989;">({{ $course_reviews->count() }})</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="list-group">
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-duration.svg') }}" alt="Course Duration" class="me-3 img-size">
                            <div class="common-style">{{ $contents->{'course_duration_' . $middleware_language} ?? $contents->course_duration_en }}</div>
                        </div>
                        <div class="common-text-style">{{ $course->duration }}</div>
                    </div>
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-language.svg') }}" alt="Language" class="me-3 img-size">
                            <div class="common-style">{{ $contents->{'language_' . $middleware_language} ?? $contents->language_en }}</div>
                        </div>
                        <div class="common-text-style">{{ $course->language }}</div>
                    </div>
                    <div class="list-group-item bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/frontend/course-type.svg') }}" alt="Course Type"
                                    class="me-3 img-size">
                                <div class="common-style">{{ $contents->{'course_type_' . $middleware_language} ?? $contents->course_type_en }}</div>
                            </div>
                            <div class="common-text-style">{{ $course->type }}</div>
                        </div>
                        <!-- <div class="note mt-2 px-3 py-1 rounded">
                            Note: Certifications included in the package
                        </div> -->
                    </div>
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-modules.svg') }}" alt="No. of Modules"
                                class="me-3 img-size">
                            <div class="common-style">{{ $contents->{'no_of_modules_' . $middleware_language} ?? $contents->no_of_modules_en }}</div>
                        </div>
                        <div class="common-text-style">{{ $course->no_of_modules }}</div>
                    </div>
                    <div class="list-group-item bg-light d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/frontend/course-students.svg') }}" alt="No. Of Student Enrolled" class="me-3 img-size">
                            <div class="common-style">{{ $contents->{'no_of_students_enrolled_' . $middleware_language} ?? $contents->no_of_students_enrolled_en }}</div>
                        </div>
                        <div class="common-text-style">{{ $course->no_of_students_enrolled }}</div>
                    </div>
                </div>

                <div class="author-card bg-warning rounded d-flex align-items-center p-3 position-relative mt-3">
                    <div class="by-badge text-center">
                        <span>{{ $contents->{'by_' . $middleware_language} ?? $contents->by_en }}</span>
                    </div>

                    <img src="{{ asset('storage/backend/courses/course-instructors/' . $course->instructor_profile_image) }}" alt="Instructor Profile Image" class="rounded-circle ms-3"style="width: 100px; height: 100px;">

                    <div class="ms-4 text-white">
                        <div class="h5 mb-1" style="font-weight: 500; font-size: 25px; line-height: 120%;">{{ $course->instructor_name }}</div>
                        <small style="font-size: 20px;">{{ $course->instructor_designation }}</small>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <video class="video-player" controls>
                    <source src="{{ asset('storage/backend/courses/course-videos/' . $course->video) }}" type="video/mp4">
                </video>

                <p class="pt-4 text-muted line-clamp-3" style="font-size: 19px; line-height: 145%;">{{ $course->short_description }}</p>

                @if(auth()->check())
                    @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                        <button type="submit" class="btn btn-primary btn-block" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'already_purchased_' . $middleware_language} ?? $contents->already_purchased_en }}</button>
                    @else
                        <form action="{{ route('frontend.master-classes.checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_name" value="{{ $course->title }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="payment_mode" value="payment">
                            <input type="hidden" name="price" value="{{ $course->price }}">

                            <button type="submit" class="btn btn-primary btn-block" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'enroll_now_' . $middleware_language} ?? $contents->enroll_now_en }} {{ $currency_symbol }}{{ $course->price }}</button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn btn-primary btn-block" style="font-size: 20px; font-weight: 500; line-height: 30px;">{{ $contents->{'login_for_enroll_' . $middleware_language} ?? $contents->login_for_enroll_en }}</a>
                @endif
            </div>
        </div>

        @if($course->master_section_2_title)
            <div class="row mt-5">
                <div class="col text-center mb-4">
                    <h2 class="learn-title my-4">{{ $course->master_section_2_title }}</h2>
                    <p class="learn-subtitle">{{ $course->master_section_2_description }}</p>
                </div>
            </div>

            <div class="row">
                @if($course->master_section_2_points)
                    @foreach(json_decode($course->master_section_2_points) as $master_section_2_point)
                        <div class="col-md-6">
                            <div class="learn-list d-flex">
                                <img src="{{ asset('storage/frontend/circle-tick.svg') }}" alt="Tick" class="me-3">
                                {{ $master_section_2_point }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endif
    </div>

    @if($course->master_section_3_title)
        <div class="container-fluid journey-container">
            <div class="row justify-content-center text-center text-white py-5 my-5">
                <div class="col-md-8">
                    <h2 class="journey-title pb-2">{{ $course->master_section_3_title }}</h2>
                    <p class="journey-subtitle">{{ $course->master_section_3_description }}</p>

                    <div class="text-center mt-3">
                        <a href="{{ json_decode($course->master_section_3_label_link)->link }}" class="btn btn-light journey-button mt-4">{{ json_decode($course->master_section_3_label_link)->label }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="tab-container container-fluid">
        <nav class="nav content-header d-flex justify-content-center">
            <ul class="nav nav-tabs flex-wrap">
                <li class="nav-item">
                    <a class="nav-link active" href="#introduction" data-bs-toggle="tab">{{ $contents->{'first_tab_' . $middleware_language} ?? $contents->first_tab_en }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#course-content" data-bs-toggle="tab">{{ $contents->{'second_tab_' . $middleware_language} ?? $contents->second_tab_en }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#chapters" data-bs-toggle="tab">{{ $contents->{'third_tab_' . $middleware_language} ?? $contents->third_tab_en }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#review" data-bs-toggle="tab">{{ $contents->{'fourth_tab_' . $middleware_language} ?? $contents->fourth_tab_en }}</a>
                </li>
            </ul>
        </nav>

        <div class="tab-content mt-3 px-3 px-md-5">
            <div class="tab-pane fade show active" id="introduction">
                <div class="content-box">
                    {!! $course->course_introduction !!}
                </div>
            </div>

            <div class="tab-pane fade" id="course-content">
                <div class="content-box">
                    {!! $course->course_content !!}
                </div>
            </div>

            <div class="tab-pane fade" id="chapters">
                <div class="content-box">
                    {!! $course->course_chapter !!}
                </div>
            </div>

            <div class="tab-pane fade" id="review">
                @if($course_reviews->isNotEmpty())
                    <section class="testimonial-section">
                        @foreach($course_reviews as $course_review)
                            <div class="single-course-review">
                                <div class="testimonial-header">
                                    <img src="{{ asset('storage/backend/courses/course-reviews/' . $course_review->image) }}" alt="{{ $course_review->name }}">
                                    <div>
                                        <div class="testimonial-name">{{ $course_review->name }}</div>
                                        <div class="testimonial-stars">
                                            @for($i = 0; $i < $course_review->rating; $i++)
                                                <i class="bi bi-star-fill star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <div class="testimonial-content">{{ $course_review->content }}</div>
                            </div>
                        @endforeach
                    </section>
                @endif
            </div>
        </div>
    </div>

    @if($course->master_section_4_content)
        <div class="container-fluid p-5 my-5" style="background-color: #0040c3;">
            <div class="row justify-content-center text-white">
                <div class="col-lg-6 col-md-12 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->master_section_4_image) }}" alt="Merchandise Image" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-12 px-4">
                    <div>{!! $course->master_section_4_content !!}</div>

                    <a href="{{ json_decode($course->master_section_4_label_link)->link }}" class="btn btn-light mt-4">{{ json_decode($course->master_section_4_label_link)->label }}</a>
                </div>
            </div>
        </div>
    @endif

    @if($course->master_section_5_title)
        <div class="container py-5">
            <div class="text-center mb-4">
                <h2 class="advisory-title">{{ $course->master_section_5_title }}</h2>
            </div>

            @if($advisory_boards->isNotEmpty())
                <div class="row justify-content-center">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <div class="board-images">
                            <div class="row justify-content-center mt-5">
                                @foreach($advisory_boards as $advisory_board)
                                    <div class="col-6 col-md-2 mb-4 image-container">
                                        <div class="rounded-circle-wrapper">
                                            <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" alt="Member" class="rounded-circle img-fluid shadow">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ json_decode($course->master_section_5_label_link)->link }}" class="learn-more">
                        <span>{{ json_decode($course->master_section_5_label_link)->label }}</span>
                        <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" alt="Arrow" class="ms-1">
                    </a>
                </div>
            @endif
        </div>
    @endif

    @if($course->master_section_6_title)
        <div class="regions-languages-section">
            <div class="container">
                <h2>{{ $course->master_section_6_title }}</h2>
                <p class="pt-3">{{ $course->master_section_6_description }}</p>

                <div class="row d-flex align-items-center">
                    <div class="col-md-8">
                        <div class="map-background d-flex align-items-center justify-content-center">
                            <img src="{{ asset('storage/frontend/world-map.svg') }}" alt="World Map" class="img-fluid">

                            <div class="regions-text">
                                <div class="text-container">
                                    {!! $course->master_section_6_content !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="languages-box">
                            <div class="language-heading text-start">Languages</div>
                            <ul class="languages-list">
                                <li>{{ $contents->{'first_language_' . $middleware_language} ?? $contents->first_language_en }}</li>
                                <li>{{ $contents->{'second_language_' . $middleware_language} ?? $contents->second_language_en }}</li>
                                <li>{{ $contents->{'third_language_' . $middleware_language} ?? $contents->third_language_en }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($course->master_section_7_title)
        <div class="container-fluid mt-5 custom-testimonial-section">
            <div class="row d-flex align-items-center justify-content-center mx-5">
                <div class="col-md-6">
                    <div class="testimonial-header mb-3 d-flex align-items-center">
                        <div class="line me-3"></div>
                        <span class="text-muted font-weight-light">{{ $course->master_section_7_title }}</span>
                    </div>

                    @if($testimonials->isNotEmpty())
                        @foreach($testimonials as $index => $testimonial)
                            @if($index === 0)
                                <div class="quote text-primary mb-3">"{{ $testimonial->content }}"</div>
                                <div class="student-name mb-2">{{ $testimonial->name }}</div>

                                @for($i = 0; $i < $testimonial->rate; $i++)
                                    <i class="bi bi-star-fill star"></i>
                                @endfor

                                @break
                            @endif
                        @endforeach
                    @endif
                </div>

                <div class="col-md-6 d-flex justify-content-center">
                    <div class="video-section">
                        <video controls class="w-100" style="border-radius: 35px;">
                            <source src="{{ asset('storage/backend/courses/course-videos/' . $course->master_section_7_video) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>

            @if(count($testimonials) > 1)
                <div class="row mt-4">
                    @foreach($testimonials as $index => $testimonial)
                        @if($index !== 0)
                            <div class="col-md-4 mb-4">
                                <div class="card p-4 rounded shadow-sm">
                                    <div class="card-title text-primary mb-2">{{ $testimonial->name }}</div>
                                    <div class="card-text mb-3">{{ $testimonial->content }}</div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <span class="font-weight-bold d-block mb-1">Rated {{ $testimonial->rate }}/5 stars</span>
                                            <div class="stars text-warning">
                                                <span>
                                                    @for($i = 0; $i < $testimonial->rate; $i++)
                                                        <i class="bi bi-star-fill star"></i>
                                                    @endfor
                                                </span>
                                            </div>
                                        </div>

                                        <!-- <div>
                                            <span class="font-weight-bold d-block mb-1">Verified Student</span>
                                            <span class="d-block">
                                                <img src="{{ asset('storage/frontend/check-blue-icon.svg') }}" alt="Verified" class="me-2">
                                                2022 Batch
                                            </span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    @endif

    @if($course->master_section_8_title)
        <div class="container text-center mt-5">
            <h2 class="experts-title">{{ $course->master_section_8_title }}</h2>
            <p class="experts-description">{{ $course->master_section_8_description }}</p>

            @if($course->master_section_8_videos)
                <div class="assessment-container my-4">
                    <div class="row">
                        @foreach(json_decode($course->master_section_8_videos) as $master_section_8_video)
                            <div class="col-md-3 mb-3">
                                <video class="assessment-images" controls>
                                    <source src="{{ asset('storage/backend/courses/course-videos/' . $master_section_8_video) }}" type="video/mp4">
                                </video>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @endif

    @if($course->master_section_9_title)
        <section class="contact-us my-5">
            <div class="container">
                <h1>{{ $course->master_section_9_title }}</h1>
                <p>{{ $course->master_section_9_description }}</p>

                <div class="contact-us-icons">
                    <div class="row d-flex align-items-end">
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="mailto: {{ $settings->email }}" class="text-decoration-none">
                                    <img src="{{ asset('storage/frontend/email-white.svg') }}" alt="Email Icon" class="img-fluid white-fill">
                                    <p>{{ $settings->email }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->instagram }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/instagram-white.svg') }}" alt="Instagram Icon" class="img-fluid">
                                    <p>{{ $contents->{'instagram_' . $middleware_language} ?? $contents->instagram_en }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->twitter }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/twitter-white.svg') }}" alt="Twitter Icon" class="img-fluid">
                                    <p>{{ $contents->{'twitter_' . $middleware_language} ?? $contents->twitter_en }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->linkedin }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/linkedin-white.svg') }}" alt="LinkedIn Icon" class="img-fluid">
                                    <p>{{ $contents->{'linkedin_' . $middleware_language} ?? $contents->linkedin_en }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->youtube }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/youtube-white.svg') }}" alt="Youtube Icon" class="img-fluid">
                                    <p>{{ $contents->{'youtube_' . $middleware_language} ?? $contents->youtube_en }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2 mb-3">
                            <div class="icon-item text-center">
                                <a href="{{ $settings->fb }}" class="text-decoration-none" target="_blank">
                                    <img src="{{ asset('storage/frontend/facebook-white.svg') }}" alt="Facebook Icon" class="img-fluid">
                                    <p>{{ $contents->{'facebook_' . $middleware_language} ?? $contents->facebook_en }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($course->master_section_10_title)
        <div class="container my-5">
            <h2 class="faq-title text-center">{{ $course->master_section_10_title }}</h2>
            <p class="faq-subtitle text-center">{{ $course->master_section_10_description }}</p>

            @if($faqs->isNotEmpty())
                <div class="faq-container mt-5">
                    <div class="accordion" id="accordionExample">
                        @foreach($faqs as $faq)
                            <div class="accordion-item" id="heading{{ $faq->id }}">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed p-2 p-md-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>

                                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @endif

@endsection