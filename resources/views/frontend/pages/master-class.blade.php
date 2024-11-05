@extends('frontend.layouts.app')

@section('title', 'Master Classes')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/master-class.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    <!-- SECTION 01-->
    @if($contents->{'section_1_title_en'})
        <section class="heading-section container text-center">
            <h1 class="title">{{ $contents->{'section_1_title_' . $language} ?? $contents->{'section_1_title_en'} }}</h1>
        </section>
        <section class="search-section mt-5">
            <input type="text" class="search-field" placeholder="Search">
            <img src="/storage/frontend/search-grey.svg" class="search-icon" alt="Search Icon">
        </section>

        <header class="header-section">
            <div>
                <h1>{{ $contents->{'section_1_sub_title_' . $language} ?? $contents->{'section_1_sub_title_en'} }}</h1>
            </div>
            <div>
                <div>{!! $contents->{'section_1_description_' . $language} ?? $contents->{'section_1_description_en'} !!}</div>
            </div>
        </header>
    @endif
    <!-- END OF SECTION 01 -->

    <section class="course-filter-section">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#all-courses" data-toggle="tab">All Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#upcoming-courses" data-toggle="tab">Upcoming Courses</a>
            </li>
        </ul>
    </section>

    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="all-courses">
            <div class="container py-5">
                <div class="row g-3">
                    
                @foreach($courses as $course)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">

                            <img src="/storage/frontend/group-1171276042.svg" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->course_introduction }} <a href="#" class="learn-more">Learn More</a></p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    @if(Auth::check())
                                        <!-- If the user is logged in, show the Enroll Now button -->
                                        <a href="{{ route('frontend.payment-flow', ['id' => $course->id]) }}" class="enroll-button">
                                            <span>Enroll Now</span>
                                            <img src="/storage/frontend/arr.svg" alt="Arrow Icon" width="12" height="10">
                                        </a>
                                    @else
                                        <!-- If the user is not logged in, show the Sign In button -->
                                        <a href="{{ route('frontend.login') }}" class="enroll-button">
                                            <span>Sign In</span>
                                            <img src="/storage/frontend/arr.svg" alt="Arrow Icon" width="12" height="10">
                                        </a>
                                    @endif
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="card-price-label">PRICE</div>
                                        <div class="card-price">{{ $course->price }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="upcoming-courses">
            <h3>Upcoming Courses</h3>
            <p>Content for upcoming courses goes here.</p>
        </div>
    </div>

    <!-- SECTION 03 -->
    @if($contents->{'section_3_title_en'})
    <div class="container-fluid certification-section">
        <h1>{{ $contents->{'section_3_title_' . $language} ?? $contents->{'section_3_title_en'} }}</h1>

        <div class="row gy-4">
            @foreach($points as $point)
            <div class="col-md-4">
                <div class="certification-card">
                    <img src="/storage/backend/courses/master-classes/{{ $point['image'] }}" alt="Certification Icon">
                    <p>{{ $point['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    <!-- END OF SECTION 03 -->


    <!-- SECTION 04 -->
    @if($contents->{'section_4_title_en'})
    <!-- FAQ Container Start -->
    <div class="faq-container">
        <div class="container-fluid" style="padding-top: 100px; padding-bottom: 100px;">
            <div class="text-center">
                <div class="mb-3 faq-heading h1">
                    {{ $contents->{'section_4_title_' . $language} ?? $contents->{'section_4_title_en'} }}
                </div>
                <div class="mb-4 faq-body">
                    {!! $contents->{'section_4_description_' . $language} ?? $contents->{'section_4_description_en'} !!}
                </div>
            </div>
            <div class="my-3">
                <div class="accordion" id="accordionExample">
                    @foreach($faqs as $faq)
                        <div class="accordion-item" id="heading{{ $faq->id }}">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed p-2 p-md-3" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div  id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <!-- FAQ Container Container End -->
    @endif
    <!-- END OF SECTION 04 -->

    </div>

@endsection