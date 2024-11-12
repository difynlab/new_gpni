@extends('frontend.layouts.app')

@section('title', 'Homepage')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/homepage.css') }}">
@endpush

@section('content')

    @if($contents->section_1_title_en)
        <div class="container-xxl bg-white p-0">
            <div class="container-xxl position-relative p-0">
                <div class="container-xxl pt-5 hero-header">
                    <div class="container my-5 py-5">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-6 text-center text-lg-start">
                                <h1 class="display-3 text-black ff-poppins-semibold fs-61">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h1>

                                <div class="mb-4 mt-5 ff-poppins-medium fs-25 international-society-of-sport">{!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}</div>

                                <div class="pt-5">
                                    <a href="{{ json_decode($contents->{'section_1_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_1_labels_links_en)[0]->link }}" class="fs-20 btn btn-primary py-sm-3 px-sm-5 me-3">{{ json_decode($contents->{'section_1_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->section_1_labels_links_en)[0]->label }}</a>

                                    <a href="{{ json_decode($contents->{'section_1_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_1_labels_links_en)[1]->link }}" class="py-sm-3 px-sm-5 fs-20 fw-semi-bold learn-more">
                                        {{ json_decode($contents->{'section_1_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->section_1_labels_links_en)[1]->label }}
                                        <img src="{{ asset('storage/frontend/arrow-right.svg') }}"/>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 text-center text-lg-end overflow-hidden image-header">
                                @if($contents->{'section_1_image_' . $middleware_language})
                                    <img src="{{ asset('storage/backend/pages/' . $contents->{'section_1_image_' . $middleware_language}) }}" alt="Header Image">
                                @elseif($contents->section_1_image_en)
                                    <img src="{{ asset('storage/backend/pages/' . $contents->section_1_image_en) }}" alt="Header Image">
                                @else
                                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Header Image">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_2_title_en)
        <div class="container-xxl">
            <div class="container">
                <div class="text-center ">
                    <h1 class="mb-3 mb-md-5 ff-poppins-medium fs-49">{{ $contents->{'section_2_title_' . $middleware_language} ?? $contents->section_2_title_en }}</h1>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="video-container">

                            @if($contents->{'section_2_video_' . $middleware_language})
                                <video src="{{ asset('storage/backend/pages/' . $contents->{'section_2_video_' . $middleware_language} ?? '') }}" controls class="w-100"></video>
                            @elseif($contents->section_2_video_en)
                                <video src="{{ asset('storage/backend/pages/' . $contents->section_2_video_en ?? '') }}" controls class="w-100"></video>
                            @else
                                <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" class="w-100" alt="Header Image">
                            @endif

                            @if($contents->section_2_points_en)
                                <div class="overlay-text position-absolute p-3">
                                    <ul class="list-unstyled">
                                        @if($contents->{'section_2_points_' . $middleware_language})
                                            @foreach(json_decode($contents->{'section_2_points_' . $middleware_language}) as $section_2_point)
                                                @if($section_2_point)
                                                    <li>{{ $section_2_point }}</li>
                                                @endif
                                            @endforeach
                                        @elseif($contents->section_2_points_en)
                                            @foreach(json_decode($contents->section_2_points_en) as $section_2_point)
                                                @if($section_2_point)
                                                    <li>{{ $section_2_point }}</li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_3_title_en)
        <div class="py-5">
            <div class="container pt-4 mt-4">
                <div class="text-center">
                    <h1 class="mb-3 ff-poppins-medium fs-49">{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h1>
                    <p class="mb-1 professional-body ff-poppins-regular fs-25">{{ $contents->{'section_3_description_' . $middleware_language} ?? $contents->section_3_description_en }}</p>
                </div>

                <div class="tab-class pt-5 text-center ">
                    <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active pill-link"
                                data-bs-toggle="pill" href="#tab-1">
                                <div class="tab-text mt-n1 mb-0">
                                    All
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-md-tart text-center mx-3 pb-3 pill-link"
                                data-bs-toggle="pill" href="#tab-2">
                                <div class="tab-text mt-n1 mb-0">
                                    International Certificates
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3 pill-link" data-bs-toggle="pill"
                                href="#tab-3">
                                <div class="tab-text mt-n1 mb-0">
                                    Master Classes
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="tab-content" id="tab1Content">
                                    <div class="scrollable-container">
                                        @foreach($courses as $course)
                                            <div class="card">
                                                <div class="overlay-logo p-3">
                                                    <img src="{{ asset('storage/frontend/issn.png') }}" alt="Logo" width="100%">
                                                </div>
                                                <img src="{{ asset('storage/backend/courses/course-images/' . $course->image_video) }}" alt="Menu Item" class="card-img-top">
                                                <div class="card-body ps-4">
                                                    <h5 class="card-title d-flex justify-content-start text-start">{{ $course->title }}</h5>
                                                    <div
                                                        class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                                        <div class="apply-now-text">APPLY NOW</div>
                                                        <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="tab-content" id="tab1Content">
                                    <div class="scrollable-container">
                                        @foreach($courses as $course)
                                            @if($course->type == "Certification")
                                                <div class="card">
                                                    <div class="overlay-logo p-3">
                                                        <img src="{{ asset('storage/frontend/issn.png') }}" alt="Logo" width="100%">
                                                    </div>
                                                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->image_video) }}" alt="Menu Item" class="card-img-top">
                                                    <div class="card-body ps-4">
                                                        <h5 class="card-title d-flex justify-content-start text-start">{{ $course->title }}</h5>
                                                        <div
                                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                                            <div class="apply-now-text">APPLY NOW</div>
                                                            <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="tab-content" id="tab1Content">
                                    <div class="scrollable-container">
                                        @foreach($courses as $course)
                                            @if($course->type == "Masters")
                                                <div class="card">
                                                    <div class="overlay-logo p-3">
                                                        <img src="{{ asset('storage/frontend/issn.png') }}" alt="Logo" width="100%">
                                                    </div>
                                                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->image_video) }}" alt="Menu Item" class="card-img-top">
                                                    <div class="card-body ps-4">
                                                        <h5 class="card-title d-flex justify-content-start text-start">{{ $course->title }}</h5>
                                                        <div
                                                            class="apply-now-container d-flex justify-content-between align-items-center w-100">
                                                            <div class="apply-now-text">APPLY NOW</div>
                                                            <img src="{{ asset('storage/frontend/right-chevron-arrow.svg') }}" alt="right-chevron-arrow">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5 pt-5">
                    <a href="{{ json_decode($contents->{'section_3_label_link_' . $middleware_language})->link ?? json_decode($contents->section_3_label_link_en)->link }}" class="py-sm-4 px-sm-5 ff-poppins-medium fs-20 explore-course-text">
                        {{ json_decode($contents->{'section_3_label_link_' . $middleware_language})->label ?? json_decode($contents->section_3_label_link_en)->label }}
                        <img src="{{ asset('storage/frontend/arrow-right.svg') }}"/>
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_4_title_en)
        <!-- <div class="testimonial-container">
            <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
                <div class="text-center">
                    <div class="mb-3 mb-md-5 testimonial-heading">{{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->{'section_4_title_en'} }}
                    </div>
                    <b class="mb-1 testimonial-body">
                    {{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->{'section_4_description_en'} }}
                        </br>
                </div>
                <div class="row g-4 pt-5">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <div class="student-video">
                                <video controls>
                                    <source src="/assets/GPNi Student Testimonial： Holly Priestland.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>

                        <div class="col-md-6 testimonials-wrapper">
                            <div class="testimonials">
                                @foreach($testimonials as $index => $testimonial)
                                    <div class="testimonial {{ $index === 1 ? 'clear' : 'blurry' }}" style="top: {{ $index * 50 }}%; transform: translateY({{ -$index * 50 }}%);">
                                        <img src="{{ asset('storage/frontend/homepage/section4/quotes-2.svg') }}" alt="Quote Icon" class="quote">
                                        <p>{!! $testimonial->content !!}</p>
                                        <div class="author">
                                            <img src="{{ asset('storage/backend/testimonials/' . $testimonial->image) }}" alt="Author Picture">
                                            <div>
                                                <p>{!! $testimonial->name !!}</p>
                                                <p>{!! $testimonial->designation !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div> -->
    @endif

    @if($contents->section_5_title_en)
        <div class="partners-container">
            <div class="container">
                <div class="text-center">
                    <div class="mb-3 mb-md-5 ff-poppins-medium fs-49 partners-heading mt-5 pt-5">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}
                    </div>
                    <p class="mb-1 partners-body fw-normal fs-25">{{ $contents->{'section_5_description_' . $middleware_language} ?? $contents->section_5_description_en }}</p>
                </div>

                @if($contents->section_5_images_en)
                    <div class="row pb-5">
                        <div class="row px-5 pb-5 gx-1">
                            @if($contents->{'section_5_images_' . $middleware_language})
                                @foreach(json_decode($contents->{'section_5_images_' . $middleware_language}) as $section_5_image)
                                    <div class="col-md-3 col-6 mt-5">
                                        <img src="{{ asset('storage/backend/pages/' . $section_5_image) }}" alt="Image" class="event-image">
                                    </div>
                                @endforeach
                            @else
                                @foreach(json_decode($contents->section_5_images_en) as $section_5_image)
                                    <div class="col-md-3 col-6 mt-5">
                                        <img src="{{ asset('storage/backend/pages/' . $section_5_image) }}" alt="Image" class="event-image">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if($contents->section_6_title_en)
        <div class="journey-container">
            <div class="container" style="padding-top: 100px; padding-bottom:100px;">
                <div class="text-center">
                    <div class="mb-3 journey-heading fs-49 fw-poppins-medium">{{ $contents->{'section_6_title_' . $middleware_language} ?? $contents->section_6_title_en }}</div>
                    <p class="mb-4 journey-body fs-20 fw-poppins-regular">{{ $contents->{'section_6_description_' . $middleware_language} ?? $contents->section_6_description_en }}</p>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center flex-wrap">
                    <a href="{{ json_decode($contents->{'section_6_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_6_labels_links_en)[0]->link }}" class="btn btn-secondary signup-button fd-20 ff-poppins-medium mb-2 mb-md-0 me-md-3 py-3 px-5">{{ json_decode($contents->{'section_6_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->section_6_labels_links_en)[0]->label }}</a>

                    <a href="{{ json_decode($contents->{'section_6_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_6_labels_links_en)[1]->link }}" class="btn explore-lesson ff-poppins-medium fs-20 py-3 px-4">{{ json_decode($contents->{'section_6_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->section_6_labels_links_en)[1]->label }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                            <path
                                d="M11.293 4.707 17.586 11H4v2h13.586l-6.293 6.293 1.414 1.414L21.414 12l-8.707-8.707-1.414 1.414z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_7_title_en)
        <div class="expert-container">
            <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
                <div class="text-center">
                    <div class="mb-3 expert-heading fs-49 ff-poppins-medium">{{ $contents->{'section_7_title_' . $middleware_language} ?? $contents->section_7_title_en }}
                    </div>
                    <p class="mb-4 expert-body fs-25 ff-poppins-regular">{{ $contents->{'section_7_description_' . $middleware_language} ?? $contents->section_7_description_en }}</p>
                </div>

                @if(!$advisory_boards->isEmpty())
                    <div class="row text-center g-4 pt-4 d-flex justify-content-center">
                        @foreach($advisory_boards as $advisory_board)
                            <div class="col-6 col-md-2">
                                <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" class="img-fluid rounded-circle expert-select" data-bs-toggle="modal" data-bs-target="#expert-modal-{{ $advisory_board->id }}" id="{{ $advisory_board->id }}">
                            </div>

                            <div class="modal fade" id="expert-modal-{{ $advisory_board->id }}" tabindex="-1" role="dialog" aria-labelledby="expert-modal-label" aria-hidden="true">
                                <div class="modal-dialog expert-modal modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-2 col-4">
                                                    <img class="expert-image-15 rounded-circle" alt="" src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}"/>
                                                </div>
                                                <div class="col-md-8 col-12 d-flex align-items-center">
                                                    <div>
                                                        <div class="expert-name">{{ $advisory_board->name }}</div>
                                                        <div class="qualification">{{ $advisory_board->designations }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-4 text-right">
                                                    <button type="button" class="btn-close position-absolute btn-close-custom" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="mt-4 expert-content">
                                                {!! $advisory_board->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="text-center mt-5 pt-5 explore-course-text">
                    <a href="{{ json_decode($contents->{'section_7_label_link_' . $middleware_language})->link ?? json_decode($contents->section_7_label_link_en)->link }}" class="py-sm-4 px-sm-5 fw-medium learn-more">
                        {{ json_decode($contents->{'section_7_label_link_' . $middleware_language})->label ?? json_decode($contents->section_7_label_link_en)->label }}
                        <img src="{{ asset('storage/frontend/arrow-right.svg') }}"/>
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_8_title_en)
        <div class="nutritionist-container">
            <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
                <div class="text-center">
                    <div class="mb-3 mb-md-5 nutritionist-heading ff-poppins-medium fs-49">{{ $contents->{'section_8_title_' . $middleware_language} ?? $contents->section_8_title_en }}
                    </div>
                    <b class="mb-1 nutritionist-body ff-poppins-regular fs-25">{{ $contents->{'section_8_description_' . $middleware_language} ?? $contents->section_8_description_en }}</b>
                </div>
                
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="d-flex justify-content-center ">
                            <div class="w-50">
                                <div class="custom-search-bar">
                                    <div class="input-group mb-3 mt-5 d-flex justify-content-center align-items-center">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ps-3 bi bi-search"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-lg p-3" placeholder="Search by name or certification number" aria-label="Search" aria-describedby="basic-addon1">
                                        <div class="p-2 d-flex align-items-center">
                                            <button class="btn btn-primary btn-lg search-button m-2" type="button">Search Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center pt-5">
                    <div class="mb-3 mb-md-5 list-heading">{{ $contents->{'section_8_sub_description_' . $middleware_language} ?? $contents->section_8_sub_description_en }}</div>

                    <div class="d-flex justify-content-center flex-wrap">
                        <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[0]->link ?? json_decode($contents->section_8_labels_links_en)[0]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button mx-2 my-1">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[0]->label ?? json_decode($contents->section_8_labels_links_en)[0]->label }}</a>

                        <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[1]->link ?? json_decode($contents->section_8_labels_links_en)[1]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button mx-2 my-1">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[1]->label ?? json_decode($contents->section_8_labels_links_en)[1]->label }}</a>

                        <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[2]->link ?? json_decode($contents->section_8_labels_links_en)[2]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button mx-2 my-1">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[2]->label ?? json_decode($contents->section_8_labels_links_en)[2]->label }}</a>

                        <a href="{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[3]->link ?? json_decode($contents->section_8_labels_links_en)[3]->link }}" type="button" class="btn btn-outline-secondary nutritionist-button mx-2 my-1">{{ json_decode($contents->{'section_8_labels_links_' . $middleware_language})[3]->label ?? json_decode($contents->section_8_labels_links_en)[3]->label }}</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($contents->section_9_title_en)
        <div class="faq-container">
            <div class="container" style="padding-top: 100px; padding-bottom: 100px;">
                <div class="text-center">
                    <div class="mb-3 faq-heading h1">{{ $contents->{'section_9_title_' . $middleware_language} ?? $contents->section_9_title_en }}</div>
                    <p class="mb-4 faq-body">{{ $contents->{'section_9_description_' . $middleware_language} ?? $contents->section_9_description_en }}</p>
                </div>
                <div class="my-3">
                    <div class="accordion" id="accordionFAQ">
                        @foreach($faqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed p-2 p-md-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $faq->id }}" aria-expanded="false" aria-controls="collapse_{{ $faq->id }}">
                                        {{ $faq->{'question'} }}
                                    </button>
                                </h2>

                                <div id="collapse_{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                                    <div class="accordion-body">
                                        {!! $faq->{'answer'} !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection