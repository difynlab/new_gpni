@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'page_name_' . $middleware_language} 
    : $contents->page_name_en)

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

            <form action="{{ route('frontend.master-classes.index') }}" method="GET">
                <section class="search-section mt-5">
                    <input type="text" class="search-field" name="master_class" value="{{ $master_class ?? '' }}" placeholder="{{ $contents->{'section_1_search_' . $middleware_language} ?? $contents->section_1_search_en }}">
                    <img src="{{ asset('storage/frontend/search-icon-gray.svg') }}" class="search-icon" alt="Search Icon">
                </section>
            </form>

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
                    <button class="nav-link active" id="all-courses-tab" data-bs-toggle="tab" data-bs-target="#all-courses-tab-pane" type="button" role="tab" aria-controls="all-courses-tab-pane" aria-selected="true">{{ $contents->{'section_2_first_tab_' . $middleware_language} ?? $contents->section_2_first_tab_en }}</button>
                </li>
                <li class="nav-item my-0 ms-5" role="presentation">
                    <button class="nav-link" id="upcoming-courses-tab" data-bs-toggle="tab" data-bs-target="#upcoming-courses-tab-pane" type="button" role="tab" aria-controls="upcoming-courses-tab-pane" aria-selected="false">{{ $contents->{'section_2_second_tab_' . $middleware_language} ?? $contents->section_2_second_tab_en }}</button>
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

                                                <p class="card-text">{{ \Illuminate\Support\Str::words($all_course->short_description, 6, '...') }}<a href="{{ route('frontend.master-classes.show', $all_course) }}" class="learn-more">{{ $contents->{'section_2_learn_' . $middleware_language} ?? $contents->section_2_learn_en }}</a></p>

                                                <div class="card-footer">
                                                    <a href="{{ route('frontend.master-classes.show', $all_course) }}" class="enroll-button">
                                                        <span>{{ $contents->{'section_2_enroll_' . $middleware_language} ?? $contents->section_2_enroll_en }}</span>
                                                        <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" alt="Arrow Icon" width="12" height="10">
                                                    </a>
                                                    <div class="card-price">{{ $currency_symbol }}{{ $all_course->price }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="no-data">{{ $contents->{'section_2_no_all_courses_' . $middleware_language} ?? $contents->section_2_no_all_courses_en }}</p>
                            @endif
                        </div>

                        {{ $all_courses->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
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

                                                <p class="card-text">{{ \Illuminate\Support\Str::words($upcoming_course->short_description, 6, '...') }}
                                                    <a href="{{ route('frontend.master-classes.show', $upcoming_course) }}" class="learn-more">{{ $contents->{'section_2_learn_' . $middleware_language} ?? $contents->section_2_learn_en }}</a>
                                                </p>

                                                <div class="card-footer">
                                                    <a href="{{ route('frontend.master-classes.show', $upcoming_course) }}" class="enroll-button">
                                                        <span>{{ $contents->{'section_2_enroll_' . $middleware_language} ?? $contents->section_2_enroll_en }}</span>
                                                        <img src="{{ asset('storage/frontend/small-arrow-right.svg') }}" alt="Arrow Icon" width="12" height="10">
                                                    </a>
                                                    <div class="card-price">{{ $currency_symbol }}{{ $upcoming_course->price }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="no-data">{{ $contents->{'section_2_no_upcoming_courses_' . $middleware_language} ?? $contents->section_2_no_upcoming_courses_en }}</p>
                            @endif
                        </div>

                        {{ $upcoming_courses->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
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
                        <div class="mb-3 mb-md-5 testimonial-heading fs-49 fs-md-36 fs-25">
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
                                    <video controls class="responsive-video">
                                        <source src="{{ asset('storage/backend/pages/' . $contents->{'section_4_video_' . $middleware_language}) }}" type="video/mp4">
                                    </video>
                                @elseif($contents->section_4_video_en)
                                    <video controls class="responsive-video">
                                        <source src="{{ asset('storage/backend/pages/' . $contents->section_4_video_en) }}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" class="responsive-video">
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

            if(clearIndex >= 0) {
                testimonials[clearIndex].classList.remove('clear');
                testimonials[clearIndex].classList.add('blurry');
            }

            const nextClearIndex = (clearIndex + 1) % numberOfTestimonials;
            testimonials[nextClearIndex].classList.add('clear');
            testimonials[nextClearIndex].classList.remove('blurry');

            testimonials.forEach((t, i) => {
                const diff = (i - nextClearIndex + numberOfTestimonials) % numberOfTestimonials;
                if(diff === 0) {
                    t.style.top = '50%';
                    t.style.transform = 'translateY(-50%)';
                }
                else if (diff === 1) {
                    t.style.top = '100%';
                    t.style.transform = 'translateY(-100%)';
                }
                else if (diff === 2) {
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