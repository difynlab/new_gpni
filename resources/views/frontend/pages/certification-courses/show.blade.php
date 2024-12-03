@extends('frontend.layouts.app')

@section('title', 'Show Certification Course')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/certification-course.css') }}">
@endpush

@section('content')

    <section class="header-section">
        <div class="row d-flex align-items-center">
            <div class="col-lg-7 col-md-12">
                <section class="certification-section">
                    <h1 class="title fs-49 text-md-start text-center">{{ $course->title }}</h1>

                    @if($course->certificate_images)
                        <div class="row certificates-container">
                            @foreach(json_decode($course->certificate_images) as $certificate_image)
                                <div class="col-6">
                                    <img src="{{ asset('storage/backend/courses/certificate-images/' . $certificate_image) }}" alt="Certificate" class="certificate-image">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="rating pt-4">
                        <span>5.0</span>
                        <img src="{{ asset('storage/frontend/stars.svg') }}" alt="Rating Stars">
                        <span>(9)</span>
                    </div>
                </section>
            </div>

            <div class="col-lg-5 col-md-12 mt-4 mt-lg-0">
                <p class="description fs-16">
                    {{ $course->short_description }}
                </p>
                
                @if(auth()->check())
                    @if(hasUserSelectedCorrectLanguage(auth()->user()->id, $middleware_language_name) && $course->language == $middleware_language_name)
                        @if(hasUserPurchasedCourse(auth()->user()->id, $course->id))
                            <a class="btn btn-primary fs-20">Already Purchased</a>
                        @else
                            <a href="{{ route('frontend.certification-courses.purchase', $course) }}" class="btn btn-primary fs-20">Enroll Now</a>
                        @endif
                    @else
                        <a class="btn btn-primary fs-20">This course is not available in your primary language</a>
                    @endif
                @else
                    <a href="{{ route('frontend.login', ['redirect' => url()->current()]) }}" class="btn btn-primary fs-20">Login for Purchase</a>
                @endif
                
            </div>
        </div>
    </section>

    <div class="container-fluid mx-0 px-0">
        <section class="course-details container-fluid">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center position-relative">
                    <div class="course-item text-center">
                        <div class="label fs-20">No of Modules</div>
                        <div class="value">{{ $course->no_of_modules }}</div>
                    </div>
                    <div class="vertical-line d-none d-md-block"></div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center position-relative">
                    <div class="course-item text-center">
                        <div class="label fs-20">Course Type</div>
                        <div class="value fs-20">{{ $course->type }}</div>
                    </div>
                    <div class="vertical-line d-none d-md-block"></div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center position-relative">
                    <div class="course-item text-center">
                        <div class="label fs-20">Course Duration</div>
                        <div class="value fs-20">{{ $course->duration }}</div>
                    </div>
                    <div class="vertical-line d-none d-md-block"></div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center position-relative">
                    <div class="course-item text-center">
                        <div class="label fs-20">Course Language</div>
                        <div class="value fs-20">{{ $course->language }}</div>
                    </div>
                </div>
            </div>
        </section>

        @if($course->certification_section_2_title)
            <section class="plans-payment position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-7 mb-4 mb-md-0 d-flex align-items-center justify-content-center d-none d-lg-flex">
                            <div class="image-section">
                                @if($course->certification_section_2_image)
                                    <img src="{{ asset('storage/backend/courses/course-images/' . $course->certification_section_2_image) }}" alt="Certificate" class="img-fluid">
                                @else
                                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Header Image" class="img-fluid">
                                @endif
                            </div>
                        </div>
            
                        <div class="col-12 col-lg-5 d-flex align-items-center justify-content-center">
                            <div class="text-section">
                                <h1 class="fs-39 text-md-start text-center">{{ $course->certification_section_2_title }}</h1>
                                <p class="description fs-20 text-md-start text-center">{{ $course->certification_section_2_description }}</p>
        
                                @if($course->certification_section_2_points)
                                    @foreach(json_decode($course->certification_section_2_points) as $certification_section_2_point)
                                        <label class="plan plan-normal d-block">
                                            <div class="plan-description fs-16">
                                                <div class="check-container mb-2">
                                                    <img src="{{ asset('storage/frontend/check-lightning.svg') }}" alt="Check" class="img-fluid">
                                                </div>
                                                <div class="description-content">
                                                    {!! $certification_section_2_point !!}
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_3_title)
            <div class="container-fluid certification-section">
                <h1 class="text-center fs-39 my-4">{{ $course->certification_section_3_title }}</h1>

                @if($course->certification_section_3_points)
                    <div class="row gy-4">
                        @foreach(json_decode($course->certification_section_3_points) as $certification_section_3_point)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="certification-card">
                                    <img src="{{ asset('storage/backend/courses/course-images/' . $certification_section_3_point->image) }}" alt="Steps Icon">
                                    <p class="fs-16">{{ $certification_section_3_point->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        @if($course->certification_section_4_video)
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="video-section section-4-video-container">
                            <div class="video-container">
                                <video controls class="section-4-video">
                                    <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_4_video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($course->certification_section_5_title)
            <section class="nutrition-section container-fluid p-5">
                <div class="row content-wrapper">
                    <div class="col-12 col-md-6 text-content">
                        <h1 class="fs-36">{{ $course->certification_section_5_title }}</h1>
                        <p class="fs-16">{{ $course->certification_section_5_description }}</p>
                    </div>
                    <div class="col-12 col-md-6 testimonial-content">
                        <div class="testimonial-stars">
                            @for($i = 0; $i < $course->certification_section_5_rating; $i++)
                                <i class="bi bi-star-fill star"></i>
                            @endfor
                        </div>

                        <div class="testimonial-text"> {{  $course->certification_section_5_content }}</div>

                        <div class="testimonial-author">
                            <div class="name">{{ $course->certification_section_5_name }}</div>

                            <div class="role">{{  $course->certification_section_5_designation }}</div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_6_title)
            <section class="team-section container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <h1 class="title fs-39">{{ $course->certification_section_6_title }}
                            </h1>
                            <p class="description fs-20">{{ $course->certification_section_6_description }}
                            </p>
                        </div>
                        
                        @if($course->certification_section_6_teams)
                            @foreach(json_decode($course->certification_section_6_teams) as $certification_section_6_team)
                                <div class="col-6 col-md-3 profile-card mt-md-0 mt-2">
                                    <img src="{{ asset('storage/backend/courses/course-images/' . $certification_section_6_team->image) }}" alt="Person">
                                    <div class="name fs-20">{{ $certification_section_6_team->name }}</div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_7_title)
            <section class="enrollment-section container-fluid">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6">
                            <h1 class="program-title fs-36">{{ $course->certification_section_7_title }}</h1>
                            <div class="program-description fs-20">{!! $course->certification_section_7_description !!}</div>
                            <div class="pt-3 d-flex align-items-center flex-wrap justify-content-lg-start justify-content-center mb-3">
                                <a href="{{ json_decode($course->certification_section_7_labels_links)[0]->link }}" class="btn enroll-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5">{{ json_decode($course->certification_section_7_labels_links)[0]->label }}</a>
                                <a href="{{ json_decode($course->certification_section_7_labels_links)[1]->link }}" class="btn contact-us-btn btn-responsive fs-20 fs-md-16 py-3 px-4">{{ json_decode($course->certification_section_7_labels_links)[1]->label }} <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow" class="ms-2"></a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 d-flex justify-content-center">
                            <video controls class="section-7-video">
                                <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_7_video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <div class="tab-container container-fluid">
            <nav class="nav content-header d-flex justify-content-center">
                <ul class="nav nav-tabs flex-column flex-md-row">
                    <li class="nav-item">
                        <a class="nav-link active fs-20 fs-md-16" href="#introduction" data-bs-toggle="tab">Introduction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-20 fs-md-16" href="#course-content" data-bs-toggle="tab">Course Content</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-20 fs-md-16" href="#chapters" data-bs-toggle="tab">Chapters</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-20 fs-md-16" href="#review" data-bs-toggle="tab">Review</a>
                    </li>
                </ul>
            </nav>

            <div class="tab-content mt-3 px-md-5 px-2">
                <div class="tab-pane fade show active" id="introduction">
                    <div class="content-box">
                        <div>{!! $course->course_introduction !!}</div>
                    </div>
                </div>

                <div class="tab-pane fade" id="course-content">
                    <div class="content-box">
                        <div>{!! $course->course_content !!}</div>
                    </div>
                </div>

                <div class="tab-pane fade" id="chapters">
                    <div class="content-box">
                        <div>{!! $course->course_chapter !!}</div>
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

        @if($course->certification_section_9_content)
            <section class="requirements-section container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 d-flex justify-content-center align-items-center image-container pb-md-0 py-4">
                        @if($course->certification_section_9_image)
                            <img src="{{ asset('storage/backend/courses/course-images/' . $course->certification_section_9_image) }}" alt="Person Image" class="img-fluid person section-9-image">
                        @else
                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Person Image" class="img-fluid person section-9-image">
                        @endif
                    </div>
                    <div class="col-lg-6">
                        {!! $course -> certification_section_9_content !!}
                    </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_10_content)
            <section class="cissn-section container">
                <div class="row align-items-start">
                    <div class="col-lg-6">
                        <div>{!! $course->certification_section_10_content !!}</div>

                        <a href="{{ json_decode($course->certification_section_10_label_link)->link }}" class="btn-custom btn enroll-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5">{{ json_decode($course->certification_section_10_label_link)->label }}</a>
                    </div>

                    <div class="col-lg-6">
                        <video controls class="section-10-video">
                            <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_10_video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        
                        @if($course->certification_section_10_points)
                            <div class="accordion" id="accordionExample">
                                @foreach(json_decode($course->certification_section_10_points) as $key => $certification_section_10_point)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                                <span class="cissn-collapse-title">{{ $certification_section_10_point->title }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p class="cissn-collapse-content">{{ $certification_section_10_point->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_11_content)
            <section class="gpni-section container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="video-section">
                            <video controls class="w-100">
                                <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_11_video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        {!!  $course->certification_section_11_content !!}

                        <div class="text-center text-md-start pt-4">
                            <a href="{{ json_decode($course->certification_section_11_label_link)->link }}" class="gpni-btn fs-20">{{ json_decode($course->certification_section_11_label_link)->label }}</a>
                        </div>                   
                    </div>
                </div>
            </section>
        @endif

        @if($course->certification_section_12_title)
            <section class="advisory-board-section container">
                <h2 class="advisory-board-title fs-39">{{ $course->certification_section_12_title }}</h2>

                @if($advisory_boards->isNotEmpty())
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
                        @foreach($advisory_boards as $advisory_board)
                            <div class="col">
                                <div class="advisory-board-card d-flex align-items-center">
                                    <img src="{{ asset('storage/backend/persons/advisory-boards/' . $advisory_board->image) }}" alt="Erica Stump">
                                    <div class="ms-3">
                                        <div class="advisory-board-name fs-20">{{ $advisory_board->name }}</div>
                                        <div class="advisory-board-role fs-16">{{ $advisory_board->designations }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <a href="{{ json_decode($course->certification_section_12_label_link)->link }}" class="view-more-link fs-20">
                    {{ json_decode($course->certification_section_12_label_link)->label }}
                    <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow Icon">
                </a>
            </section>
        @endif

        @if($course->certification_section_13_title)
            <section class="payment-options-section container">
                <h2 class="payment-options-title fs-39">{{ $course->certification_section_13_title }}</h2>
                <p class="payment-options-description fs-20">{{ $course->certification_section_13_description }}</p>

                @if($course->certification_section_13_table_points)
                    <div class="table-container">
                        <table class="payment-table">
                            <thead>
                                <tr>
                                    <th class="highlight-primary">{{ $course->certification_section_13_first_column }}a</th>
                                    <th class="highlight-secondary">{{ $course->certification_section_13_second_column }}b</th>
                                    <th class="highlight-primary">{{ $course->certification_section_13_third_column }}c</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(json_decode($course->certification_section_13_table_points) as $certification_section_13_table_point)
                                    <tr>
                                        <td>{{ $certification_section_13_table_point->first }}</td>
                                        <td>{{ $certification_section_13_table_point->second }}</td>
                                        <td>{{ $certification_section_13_table_point->third }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="pt-3 d-flex align-items-center flex-wrap justify-content-center mb-3">
                    <a href="{{ json_decode($course->certification_section_13_labels_links)[0]->link }}" class="btn enroll-button btn-responsive mb-2 mb-md-0 me-md-3 py-3 px-5l">{{ json_decode($course->certification_section_13_labels_links)[0]->label }}</a>

                    <a href="{{ json_decode($course->certification_section_13_labels_links)[1]->link }}" class="btn contact-us-btn btn-responsive fs-20 fs-md-16 py-3 px-4">{{ json_decode($course->certification_section_13_labels_links)[1]->label }} <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow"></a>
                </div>
            </section>
        @endif

        @if($course->certification_section_14_title)
            <section class="student-testimonial-section container">
                <div class="student-testimonial-content">
                    <div class="student-testimonial-text">
                        <div class="student-testimonial-header">
                            <img src="{{ asset('storage/frontend/dash.svg') }}" alt="Line">
                            <div class="header-text fs-20">{{ $course->certification_section_14_title }}</div>
                        </div>

                        @if($testimonials->isNotEmpty())
                            @foreach($testimonials as $index => $testimonial)
                                @if($index === 0)
                                    <div class="student-testimonial-quote fs-32">"{{ $testimonial->content }}"</div>
                                    <div class="student-testimonial-author fs-16">{{ $testimonial->name }}</div>

                                    @for($i = 0; $i < $testimonial->rate; $i++)
                                        <i class="bi bi-star-fill star"></i>
                                    @endfor

                                    @break
                                @endif
                            @endforeach
                        @endif
                    </div>

                    <div class="video-section">
                        <video controls class="w-100" style="border-radius: 35px;">
                            <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_14_video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </section>

            @if(count($testimonials) > 1)
                <section class="student-reviews-section container">
                    <div class="row g-4">
                        @foreach($testimonials as $index => $testimonial)
                            @if($index !== 0)
                                <div class="col-lg-4">
                                    <div class="student-review-card p-3">
                                        <h5 class="student-review-name fs-20">{{ $testimonial->name }}</h5>
                                        <p class="student-review-text fs-16">{{ $testimonial->content }}</p>
                                        <div class="student-review-footer">
                                            <div class="student-review-rating">
                                                <span>Rated {{ $testimonial->rate }}/5 stars</span>
                                                
                                                <span>
                                                    @for($i = 0; $i < $testimonial->rate; $i++)
                                                        <i class="bi bi-star-fill star"></i>
                                                    @endfor
                                                </span>
                                            </div>
                                            <!-- <div>
                                                <p class="student-review-verified">Verified Student</p>
                                                <p class="student-review-batch">
                                                    <img src="{{ asset('storage/frontend/check-blue-icon.svg') }}" alt="check" width="10px" height="10px">
                                                    2022 Batch
                                                </p>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            @endif
        @endif

        @if($course->certification_section_15_title)
            <section class="advanced-certification-section container-fluid">
                <h2 class="advanced-certification-title fs-39">{{ $course->certification_section_15_title }}</h2>
                <div class="row mx-5 mb-4">
                    <div class="col-lg-6">
                        <video controls class="section-15-video">
                            <source src="{{ asset('storage/backend/courses/course-videos/' . $course->certification_section_15_video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-lg-6">
                        <div class="advanced-certification-text fs-20">
                            {!! $course->certification_section_15_content !!}
                        </div>
                    </div>
                </div>

                @if($course->certification_section_15_points)
                    <div class="accordion" id="accordion15">
                        <div class="row mx-5">
                            @foreach(json_decode($course->certification_section_15_points) as $key => $certification_section_15_point)
                                <div class="col-6">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                                                <span class="cissn-collapse-title">{{ $certification_section_15_point->title }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordion15">
                                            <div class="accordion-body">
                                                <p class="cissn-collapse-content">{{ $certification_section_15_point->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <a href="{{ json_decode($course->certification_section_15_label_link)->link }}" class="contact-us-btn">
                    {{ json_decode($course->certification_section_15_label_link)->label }}
                    <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow Icon">
                </a>
            </section>
        @endif
    </div>

    @if($course->certification_section_16_title)
        <div class="container-fluid p-0">
            <section class="masters-pack-section">
                <div class="masters-pack-overlay"></div>
                <div class="masters-pack-content">
                    <h2 class="masters-pack-title fs-36">{{ $course->certification_section_16_title }}</h2>

                    <div class="fs-32">{!! $course->certification_section_16_content !!}</div>
                    
                    <div class="btn-group">
                        <a href="{{ json_decode($course->certification_section_16_labels_links)[0]->link }}" class="btn-custom">{{ json_decode($course->certification_section_16_labels_links)[0]->label }}</a>

                        <a href="{{ json_decode($course->certification_section_16_labels_links)[1]->link }}" class="btn-custom secondary border-0">{{ json_decode($course->certification_section_16_labels_links)[1]->label }} <img src="{{ asset('storage/frontend/arrow-right.svg') }}" alt="Arrow"></a>
                    </div>
                </div>
            </section>
        </div>
    @endif

@endsection