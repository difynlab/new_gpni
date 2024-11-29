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
                                        <div class="card h-100 d-flex flex-column">
                                            <img src="{{ asset('storage/backend/courses/course-images/' . $all_course->image) }}" class="card-img-top" alt="Card Image">

                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">{{ $all_course->title }}</h5>

                                                <p class="card-text line-clamp-2">{{ $all_course->short_description }}</p>

                                                <div class="mt-auto d-flex justify-content-between align-items-center">
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
                            @else
                                <p class="no-data">No courses are available right now, but stay tuned, exciting new courses are on the way! Check back soon!</p>
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
                                        <div class="card h-100 d-flex flex-column">
                                            <img src="{{ asset('storage/backend/courses/course-images/' . $upcoming_course->image) }}" class="card-img-top" alt="Card Image">

                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title">{{ $upcoming_course->title }}</h5>

                                                <p class="card-text line-clamp-2">{{ $upcoming_course->short_description }}</p>

                                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                                    <a href="{{ route('frontend.master-classes.show', $upcoming_course) }}" class="enroll-button">
                                                        <span>Enroll Now</span>
                                                        <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" alt="Arrow Icon" width="12" height="10">
                                                    </a>
                                                    
                                                    <div class="d-flex flex-column align-items-end">
                                                        <div class="card-price-label">PRICE</div>
                                                        <div class="card-price">${{ $upcoming_course->price }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="no-data">No upcoming master classes are available right now, but stay tuned, exciting new courses are on the way! Check back soon or explore our current offerings to keep learning and growing!</p>
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

        @if($contents->section_4_title_en)
            <div class="testimonial-container">
                <div class="container py-5">
                    <div class="text-center">
                        <div class="mb-3 mb-md-5 testimonial-heading">
                            {{ $contents->{'section_4_title_' . $middleware_language} ?? $contents->section_4_title_en }}
                        </div>
                        <b class="mb-1 testimonial-body">
                            {{ $contents->{'section_4_description_' . $middleware_language} ?? $contents->section_4_description_en }}
                        </b>
                    </div>

                    <div class="row g-4 pt-5">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <div class="student-video">
                                @if($contents->{'section_4_video_' . $middleware_language})
                                    <video controls>
                                        <source src="{{ asset('storage/backend/pages/' . $contents->{'section_4_video_' . $middleware_language}) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @elseif($contents->section_4_video_en)
                                    <video controls>
                                        <source src="{{ asset('storage/backend/pages/' . $contents->section_4_video_en) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}">
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 testimonials-wrapper">
                            @foreach($testimonials as $index => $testimonial)
                                <div class="testimonial {{ $index === 0 ? 'clear' : 'blurry' }}">
                                    
                                    <img src="{{ asset('storage/frontend/testimonial-quote.svg') }}" alt="Quote Icon" class="quote">

                                    <p>{{ $testimonial->content }}</p>

                                    <div class="author">
                                        @if($testimonial->image)
                                            <img src="{{ asset('storage/backend/testimonials/' . $testimonial->image) }}" alt="Author Picture">
                                        @else
                                            <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}">
                                        @endif
                                        
                                        <div>
                                            <p>{{ $testimonial->name }}</p>
                                            <p>{{ $testimonial->designation }}</p>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

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

@push('after-scripts')
    <script>
        function rotateTestimonials() {
            const testimonials = document.querySelectorAll('.testimonial');
            const numberOfTestimonials = testimonials.length;
            let clearIndex = Array.from(testimonials).findIndex(t => t.classList.contains('clear'));

            if (clearIndex >= 0) {
                testimonials[clearIndex].classList.remove('clear');
                testimonials[clearIndex].classList.add('blurry');
            }

            // The next clear testimonial
            const nextClearIndex = (clearIndex + 1) % numberOfTestimonials;
            testimonials[nextClearIndex].classList.add('clear');
            testimonials[nextClearIndex].classList.remove('blurry');

            // Update each testimonial positioning
            testimonials.forEach((t, i) => {
                const diff = (i - nextClearIndex + numberOfTestimonials) % numberOfTestimonials;
                if (diff === 0) {
                    t.style.top = '50%';
                    t.style.transform = 'translateY(-50%)';
                } else if (diff === 1) {
                    t.style.top = '100%';
                    t.style.transform = 'translateY(-100%)';
                } else if (diff === 2) {
                    t.style.top = '0%';
                    t.style.transform = 'translateY(0)';
                }
            });
        }

        window.addEventListener('DOMContentLoaded', () => {
            setInterval(rotateTestimonials, 3000);
        });
    </script>
@endpush
