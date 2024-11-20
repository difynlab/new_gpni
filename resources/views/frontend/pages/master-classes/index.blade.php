@extends('frontend.layouts.app')

@section('title', 'Master Classes')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/master-classes.css') }}">
@endpush

@section('content')

    <div class="container my-5">

        @if($contents->section_1_title_en)
            <section class="heading-section container text-center">
                <x-frontend.notification></x-frontend.notification>

                <h1 class="title">{{ $contents->{'section_1_title_' . $middleware_language} ?? $contents->section_1_title_en }}</h1>
            </section>

            <section class="search-section mt-5">
                <input type="text" class="search-field" placeholder="Search">
                <img src="{{ asset('storage/frontend/search-icon-gray.svg') }}" class="search-icon" alt="Search Icon">
            </section>

            <header class="header-section">
                <div>
                    <h1>{{ $contents->{'section_1_sub_title_' . $middleware_language} ?? $contents->section_1_sub_title_en }}</h1>
                </div>
                <div>
                    <div>{!! $contents->{'section_1_description_' . $middleware_language} ?? $contents->section_1_description_en !!}</div>
                </div>
            </header>
        @endif

        <section class="course-filter-section">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                <li class="nav-item m-0" role="presentation">
                    <button class="nav-link active" id="all-courses-tab" data-bs-toggle="tab" data-bs-target="#all-courses-tab-pane" type="button" role="tab" aria-controls="all-courses-tab-pane" aria-selected="true">All Courses</button>
                </li>
                <li class="nav-item my-0 ms-5" role="presentation">
                    <button class="nav-link" id="upcoming-courses-tab" data-bs-toggle="tab" data-bs-target="#upcoming-courses-tab-pane" type="button" role="tab" aria-controls="upcoming-courses-tab-pane" aria-selected="false">Upcoming Courses</button>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-courses-tab-pane" role="tabpanel" aria-labelledby="all-courses-tab" tabindex="0">
                    <div class="container py-5">
                        <div class="row g-3 mb-3">
                            @if($all_courses->isNotEmpty())
                                @foreach($all_courses as $all_course)
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/backend/courses/course-images/' . $all_course->image) }}" class="card-img-top" alt="Card Image">

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $all_course->title }}</h5>

                                                <p class="card-text line-clamp-3">{{ $all_course->short_description }}</p>

                                                <a href="{{ route('frontend.master-classes.show', $all_course) }}" class="learn-more">Learn More</a>

                                                <div class="d-flex justify-content-between align-items-center mt-3">
                                                    <a href="{{ route('frontend.master-classes.show', $all_course) }}" class="enroll-button">
                                                        <span>Enroll Now</span>
                                                        <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" alt="Arrow Icon" width="12" height="10">
                                                    </a>
                                                    
                                                    <div class="d-flex flex-column align-items-end">
                                                        <div class="card-price-label">PRICE</div>
                                                        <div class="card-price">${{ $all_course->price }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        {{ $all_courses->links("pagination::bootstrap-5") }}
                    </div>
                </div>

                <div class="tab-pane fade" id="upcoming-courses-tab-pane" role="tabpanel" aria-labelledby="upcoming-courses-tab" tabindex="0">
                    <div class="container py-5">
                        <div class="row g-3 mb-3">
                            @if($upcoming_courses->isNotEmpty())
                                @foreach($upcoming_courses as $upcoming_course)
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/backend/courses/course-images/' . $upcoming_course->image) }}" class="card-img-top" alt="Card Image">

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $upcoming_course->title }}</h5>

                                                <p class="card-text line-clamp-3">{{ $upcoming_course->short_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        {{ $upcoming_courses->links("pagination::bootstrap-5") }}
                    </div>
                </div>
            </div>
        </section>

        @if($contents->section_3_title_en)
            <div class="container-fluid certification-section">
                <h1>{{ $contents->{'section_3_title_' . $middleware_language} ?? $contents->section_3_title_en }}</h1>

                <div class="row gy-4">
                    @if($contents->section_3_points_en)
                        @foreach(json_decode($contents->{'section_3_points_' . $middleware_language} ?? $contents->section_3_points_en) as $point)
                            <div class="col-md-4">
                                <div class="certification-card">
                                    <img src="{{ asset('storage/backend/courses/course-images/' . $point->image) }}" alt="Certification Icon">
                                    <p>{{ $point->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif

        <!-- Need to add testimonials section here -->

        @if($contents->section_5_title_en)
            <div class="faq-container">
                <div class="container-fluid" style="padding-top: 100px; padding-bottom: 100px;">
                    <div class="text-center">
                        <div class="mb-3 faq-heading h1">{{ $contents->{'section_5_title_' . $middleware_language} ?? $contents->section_5_title_en }}</div>

                        <div class="faq-body">{{ $contents->{'section_5_description_' . $middleware_language} ?? $contents->section_5_description_en }}</div>
                    </div>

                    @if($faqs->isNotEmpty())
                        <div class="mt-5">
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
            </div>
        @endif

    </div>

@endsection