@extends('frontend.layouts.app')

@section('title', 'PNE Level 1 + SNS')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/pne-level-1.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    <section class="header-section">
        <div class="row d-flex align-items-center">
            <div class="col-lg-7 col-md-12">
                <section class="certification-section">
                    <h1 class="title">{{  $course_content->title }}</h1>
                    <div class="certificates-container d-flex flex-wrap justify-content-center">
                        <img src="/storage/frontend/certificate 1.png" alt="Certificate 1" class="img-fluid">
                        <div class="d-flex flex-column align-items-center">
                            <img src="/storage/frontend/certificate 2.png" alt="Certificate 2" class="img-fluid">
                            <div class="rating pt-4">
                                <span>5.0</span>
                                <img src="/storage/frontend/frame-1171275930.svg" alt="Rating Stars">
                                <span>(9)</span>
                            </div>
                        </div>
                    </div>

                    <p class="description">
                    {{  $course_content->course_introduction }}
                    </p>
                </section>
            </div>
            <div class="col-lg-5 col-md-12 mt-4 mt-lg-0">
                <div class="form-wrapper">
                    <div class="form-heading">Sign up Today To Get Your Free Trial!</div>
                    <div class="form-subheading">
                        For limited time ONLY! GPNi® is offering a FREE trial to everyone who signs up using the below
                        form.
                    </div>
                    <form>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last Name" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Country/Region" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enroll Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="course-details container-fluid">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center">
                <div class="course-item text-center">
                    <div class="label">Delivery of Mode</div>
                    <div class="value">Online</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center">
                <div class="course-item text-center">
                    <div class="label">Course Type</div>
                    <div class="value">{{  $course_content->type }}</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center">
                <div class="course-item text-center">
                    <div class="label">Course Duration</div>
                    <div class="value">{{  $course_content->duration }}</div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex align-items-center justify-content-center">
                <div class="course-item text-center">
                    <div class="label">Course Language</div>
                    <div class="value">English, Chinese, Japanese</div>
                </div>
            </div>
        </div>
    </section>

    <!-- certification_section_2 -->
    <section class="plans-payment position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-4 mb-md-0 d-flex align-items-center justify-content-center">
                    <div class="image-section">
                        <img src="/storage/frontend/girl.svg" alt="Certificate">
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                    <div class="text-section">
                        <h1>{{  $course_content->certification_section_2_title }}</h1>
                        <p>{{  $course_content->certification_section_2_description }}</p>
                        <label class="plan plan-highlight">
                            <input type="radio" name="plan" value="type-one">
                            <div class="check-container">
                                <img src="/storage/frontend/check-square-contained-filled.svg" alt="Check">
                            </div>
                            <div>
                                <div class="plan-title">Type One</div>
                                <div class="plan-description">
                                    Pay Only USD 99.00 Monthly For 12 Months & Start Today.
                                </div>
                            </div>
                        </label>
                        <label class="plan plan-normal">
                            <input type="radio" name="plan" value="type-two">
                            <div class="check-container">
                                <img src="/storage/frontend/check-square-contained-filled-2.svg" alt="Check">
                            </div>
                            <div>
                                <div class="plan-title">Type Two</div>
                                <div class="plan-description">
                                    Pay in One Time Go & Pay Only USD 1,099.00, Savings of Over USD 600.00, together
                                    with USD 928.00
                                    In Additional Free Bonuses.
                                </div>
                            </div>
                        </label>
                        <label class="plan plan-normal">
                            <input type="radio" name="plan" value="type-three">
                            <div class="check-container">
                                <img src="/storage/frontend/check-square-contained-filled-3.svg" alt="Check">
                            </div>
                            <div>
                                <div class="plan-title">Type Three</div>
                                <div class="plan-description">
                                    Get in Contact with Our Team to Ask Questions and/or Schedule One-On-One-Call to
                                    Walk Through
                                    Thing The Demo Ask Questions On Teams Video Call.
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF certification_section_2 -->

    <!-- certification_section_3 -->
    <div class="container-fluid certification-section">
        <h1 class="text-center mb-4">{{  $course_content->certification_section_3_title }}</h1>

        <div class="row gy-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="certification-card">
                    <img src="/storage/frontend/ph-steps-duotone.svg" alt="Steps Icon">
                    <p>GPNi® is an-all access portal, to begin and advance your in sports nutrition to an elite level
                        with blossoming career opportunities.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF certification_section_3 -->

    <!-- certification_section_4 -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="video-section">
                    <div class="video-container">
                        <video controls>
                            <source src="{{ asset('storage/backend/courses/course-image-videos/' . $course_content->certification_section_4_video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF certification_section_4 -->

    <!-- certification_section_5 -->
    <section class="nutrition-section container-fluid p-5">
        <div class="row content-wrapper">
            <div class="col-12 col-md-6 text-content">
                <h1>{{  $course_content->certification_section_5_title }}</h1>
                <p>{{  $course_content->certification_section_5_description }}</p>
            </div>
            <div class="col-12 col-md-6 testimonial-content">
                <div class="testimonial-stars">
                    <!-- <img src="/storage/frontend/frame-1171275930.svg" alt="Rating Stars" class="img-fluid"> -->
                    {{  $course_content->certification_section_5_rating }}
                </div>
                <div class="testimonial-text">
                {{  $course_content->certification_section_5_content }}
                </div>
                <div class="testimonial-author">
                    <div class="name">
                    {{  $course_content->certification_section_5_name }}
                    </div>
                    <div class="role">
                    {{  $course_content->certification_section_5_designation }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF certification_section_5 -->

    <!-- certification_section_6 -->
    <section class="team-section container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h1 class="title">{{  $course_content->certification_section_6_title }}
                    </h1>
                    <p class="description">{{  $course_content->certification_section_6_description }}
                    </p>
                </div>
                <div class="col-6 col-md-3 profile-card">
                    <img src="/storage/frontend/drew.png" alt="Drew Campbell">
                    <div class="name">Drew Campbell</div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF certification_section_6 -->

    <!-- certification_section_7 -->
    <section class="enrollment-section container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <h1 class="program-title">{{  $course_content->certification_section_7_title }}</h1>
                    <p class="program-description">{{  $course_content->certification_section_6_description }}</p>
                    <div class="d-flex flex-wrap">
                        <a href="#" class="btn-custom btn-enroll">Enroll Now</a>
                        <a href="#" class="btn-custom btn-contact">Contact us <img src="/storage/frontend/arrow-indication-10.svg"
                                alt="Arrow" class="ms-2"></a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-center">
                    <img src="/storage/frontend/1653789192-png-1.svg" alt="Program Image" class="program-image">
                </div>
            </div>
        </div>
    </section>
    <!-- END OF certification_section_7 -->

    <div class="tab-container container-fluid">
        <nav class="nav content-header d-flex justify-content-center">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#introduction" data-bs-toggle="tab">Introduction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#course-content" data-bs-toggle="tab">Course Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#chapters" data-bs-toggle="tab">Chapters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#review" data-bs-toggle="tab">Review</a>
                </li>
            </ul>
        </nav>

        <div class="tab-content mt-3 px-5">
            <div class="tab-pane fade show active" id="introduction">
                <div class="content-box">
                    <div class="content-title">
                        This course includes 15 modules and the available chapters are listed below:
                    </div>
                    <div class="content-description">
                        Enrollment Gives You Immediate Access To:
                        <ul>
                            <li>On-demand video content – 25+ hours</li>
                            <li>Live-streaming class – 10+ hours.</li>
                            <li>Homework & presentations – 15+ hours.</li>
                            <li>Reading & review – approximately – 15-25hours</li>
                            <li>Exam – 1.5hours.</li>
                            <li>Live online tutorials + Q&A with expert lectures</li>
                            <li>Group assignments + new connections with students based globally</li>
                        </ul>
                    </div>
                    <div class="info-note warning">
                        <img src="/storage/frontend/bi-exclamation-circle.svg" alt="Note Icon">
                        <div class="text-warning">
                            Please Note: Only Available For Those That Have Paid 100% Of Their Tuition Fees
                        </div>
                    </div>
                    <div class="info-note primary">
                        <img src="/storage/frontend/bi-exclamation-circle-2.svg" alt="Note Icon">
                        <div class="text-primary">
                            Additional free bonuses, including a one-year GPNi membership worth USD$99
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="course-content">
                <div class="content-box">
                    <div class="content-description">
                        Live online tutorials + Q&A with expert lectures. <br>
                        Group assignments + new connections with
                        students based globally.
                        <br><br>“It’s Who You Know, Not Just What You Know”
                        <br><br>On-demand video content – 40+ hours.<br>
                        Live-streaming with experts in Ph.D. lecture classes – 20+ hours.<br>
                        Homework & presentations – 25+ hours.<br>
                        Reading & review – approximately – 25-45 hours.<br>
                        Exam – 2 hours.<br>
                        Additional Free Bonuses
                        <br><br>One-year free GPNi membership - worth USD$99 a year<br>
                        Bonus Free Content & Courses
                        <br><br>PNE Level-1 + SNS online course content<br>
                        GPNi-TV with ISSN seminars and video content
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="chapters">
                <div class="modules-content">
                    <div class="modules-title">
                        This course includes 15 modules and the available chapters are listed below:
                    </div>
                    <div class="module-item">Module 1: Course Introduction & Nutrition Fundamentals</div>
                    <div class="module-item">Module 2: Skeletal Muscle Support Systems</div>
                    <div class="module-item">Module 3: Energy Expenditure and Balance</div>
                    <div class="module-item">Module 4: Nutrition & Performance, Dietary Trends</div>
                    <div class="module-item">Module 5: Dietary Supplements & Ergogenic Aids</div>
                    <div class="module-item">Module 6: Exercise, Hydration & Nutrition Considerations</div>
                    <div class="module-item">Module 7: Sports Nutrition Applications</div>
                    <div class="module-item">Module 8: Exam Review & Assignment Discussion</div>
                    <!-- Add more modules here if needed -->
                </div>
            </div>

            <div class="tab-pane fade" id="review">
                <section class="testimonial-section">
                    <div class="testimonial-header">
                        <img src="/storage/frontend/expert-image.svg" alt="Lenka Sutra">
                        <div>
                            <div class="testimonial-name">Lenka Sutra</div>
                            <div class="testimonial-stars">
                                <img src="/storage/frontend/frame-1171275930.svg" alt="Rating Stars">
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        I was looking for the perfect course that combined theoretical knowledge and practical
                        experience in
                        sports nutrition for many years.
                        <br><br>
                        After much research, I chose The ISSN Sports Nutrition Specialist (SNS) on the GPNi® portal. I
                        was
                        greatly impressed with the new knowledge
                        I gained also the course flow with the blend of on-demand content together with “live” online
                        Zoom
                        tutorials and class group.
                        <br><br>
                        For those in the fitness industry, I highly recommended getting ISSN certified on the GPNi®
                        portal
                        and upgrading your knowledge and career at the same time.
                    </div>
                </section>
            </div>
        </div>


    </div>

    <!-- certification_section_9 -->
    <section class="requirements-section container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 image-container">
                <!-- <img src="/storage/frontend/div.col-lg-6.svg" alt="Person Image" class="img-fluid person"> -->
                @if($course_content -> certification_section_9_image)
                    <img src="{{ asset('storage/backend/courses/course-image-videos/' . $course_content -> certification_section_9_image) }}" alt="Person Image" class="img-fluid person">
                @else
                    <img src="{{ asset('storage/backend/common/' . App\Models\Setting::find(1)->no_image) }}" alt="Person Image" class="img-fluid person">
                @endif
            </div>
            {!!  $course_content -> certification_section_9_content !!}
        </div>
    </section>
    <!-- END OF certification_section_9 -->

    <!-- certification_section_10 -->
    <section class="cissn-section container">
        <div class="row align-items-start">
            <div class="col-lg-6">
                {!!  $course_content -> certification_section_10_content !!}
            </div>
            <div class="col-lg-6">
                <img src="/storage/frontend/pne-level-2-masters-cissn-1.svg" alt="CISSN Certification" class="img-fluid mb-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="cissn-collapse-title">Ornare laoreet mi tempus neque</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="cissn-collapse-content">Timperdiet gravida scelerisque odio nunc. Eget felis,
                                    odio bibendum quis eget sit lorem donec diam. Volutpat sed orci turpis sit dolor est
                                    a pretium eget. Vitae turpis orci vel tellus cursus lorem vestibulum quis eu. Ut
                                    commodo, eget lorem venenatis urna.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF certification_section_10 -->

    <!-- certification_section_11 -->
    <section class="gpni-section container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="video-section">
                    <video controls class="img-fluid mb-4 full-width-video">
                        <source src="/storage/frontend/who gpni.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="col-lg-6">
                {!!  $course_content -> certification_section_11_content !!}
                <a href="#" class="gpni-btn">View CEC Policy</a>
            </div>
        </div>
    </section>
    <!-- END OF certification_section_11 -->

    <!-- certification_section_12 -->
    @php
        $advisoryBoardLink = json_decode($course_content->certification_section_12_label_link);
    @endphp

    <section class="advisory-board-section container">
        <h2 class="advisory-board-title">{{  $course_content -> certification_section_12_title }}</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-8-1.svg" alt="Erica Stump">
                    <div class="ms-3">
                        <div class="advisory-board-name">Erica Stump</div>
                        <div class="advisory-board-role">Legal Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-6.svg" alt="Sue Graves">
                    <div class="ms-3">
                        <div class="advisory-board-name">Sue Graves</div>
                        <div class="advisory-board-role">Scientific Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-10.svg" alt="Rick Collins">
                    <div class="ms-3">
                        <div class="advisory-board-name">Rick Collins</div>
                        <div class="advisory-board-role">Legal Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-9.svg" alt="David Sandler">
                    <div class="ms-3">
                        <div class="advisory-board-name">David Sandler</div>
                        <div class="advisory-board-role">Performance Training Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-7.svg" alt="Robert Wildman">
                    <div class="ms-3">
                        <div class="advisory-board-name">Robert Wildman</div>
                        <div class="advisory-board-role">Scientific Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-1.svg" alt="Jeffrey Stout">
                    <div class="ms-3">
                        <div class="advisory-board-name">Jeffrey Stout</div>
                        <div class="advisory-board-role">Scientific Advisor and Past President 2006-2008</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-2.svg" alt="Susan Kleiner">
                    <div class="ms-3">
                        <div class="advisory-board-name">Susan Kleiner</div>
                        <div class="advisory-board-role">Scientific Advisor and Co-Founder</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-3.svg" alt="Roger Harris">
                    <div class="ms-3">
                        <div class="advisory-board-name">Roger Harris</div>
                        <div class="advisory-board-role">Scientific Advisor</div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="advisory-board-card d-flex align-items-center">
                    <img src="/storage/frontend/expert-image-5.svg" alt="Jaime Tartar">
                    <div class="ms-3">
                        <div class="advisory-board-name">Jaime Tartar</div>
                        <div class="advisory-board-role">Sports Neuroscience Advisor</div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ $advisoryBoardLink->link }}" class="view-more-link">
            {{ $advisoryBoardLink->label }}
            <br>
            <img src="/storage/frontend/arrow-indication-10.svg" alt="Arrow Icon">
        </a>
    </section>
    <!-- END OF certification_section_12 -->

    <!-- certification_section_13 -->
    @php
        $tablePoints = json_decode($course_content->certification_section_13_table_points);
        $paymentLinks = json_decode($course_content->certification_section_13_label_link);
    @endphp
    <section class="payment-options-section container">
        <h2 class="payment-options-title">{{  $course_content -> certification_section_13_title }}</h2>
        <p class="payment-options-description">
            {{  $course_content -> certification_section_13_description }}
        </p>
        <div class="table-container">
            <table class="payment-table">
                <thead>
                    <tr>
                        <th class="highlight-primary">{{ $course_content->certification_section_13_first_column }}</th>
                        <th class="highlight-secondary">{{ $course_content->certification_section_13_second_column }}</th>
                        <th class="highlight-primary">{{ $course_content->certification_section_13_third_column }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tablePoints as $point)
                        <tr>
                            <td>{{ $point->first }}</td>
                            <td>{!! nl2br(e($point->second)) !!}</td>
                            <td>{{ $point->third }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="#" class="btn-enroll">Enroll Now</a>
            <a href="#" class="btn-contact border-0">Contact us <img src="/storage/frontend/arrow-indication-10.svg"
                    alt="Arrow Icon"></a>
        </div>
    </section>
    <!-- END OF certification_section_13 -->

    <!-- certification_section_14 -->
    <section class="student-testimonial-section container">
        <div class="student-testimonial-content">
            <div class="student-testimonial-text">
                <div class="student-testimonial-header">
                    <img src="/storage/frontend/line-42.svg" alt="Line">
                    <div class="header-text">{{  $course_content -> certification_section_14_title }}</div>
                </div>
                <div class="student-testimonial-quote">“I was looking for the perfect course that combined theoretical
                    knowledge and practical experience in sports nutrition for many years.</div>
                <div class="student-testimonial-author">Lenka Sutra</div>
                <img src="/storage/frontend/frame-1171275930.svg" alt="Rating Stars">
            </div>
            <div>
                <img src="/storage/frontend/group-1171276142.svg" alt="Student Photo" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="student-reviews-section container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="student-review-card p-3">
                    <h5 class="student-review-name">Bindi Wilson</h5>
                    <p class="student-review-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.
                    </p>
                    <div class="student-review-footer">
                        <div class="student-review-rating">
                            <span>Rated 5/5 stars</span>
                            <img src="/storage/frontend/frame-1171275930.svg" alt="Star">
                        </div>
                        <div>
                            <p class="student-review-verified">Verified Student</p>
                            <p class="student-review-batch"> <img src="/storage/frontend/check blue.svg" alt="check" width="10px"
                                    height="10px">
                                2022 Batch</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="student-review-card p-3">
                    <h5 class="student-review-name">Anne Marry</h5>
                    <p class="student-review-text">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua.
                    </p>
                    <div class="student-review-footer">
                        <div class="student-review-rating">
                            <span>Rated 5/5 stars</span>
                            <img src="/storage/frontend/frame-1171275930.svg" alt="Star">
                        </div>
                        <div>
                            <p class="student-review-verified">Verified Student</p>
                            <p class="student-review-batch"> <img src="/storage/frontend/check blue.svg" alt="check" width="10px"
                                    height="10px">
                                2022 Batch</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="student-review-card p-3">
                    <h5 class="student-review-name">Byron Rolfson</h5>
                    <p class="student-review-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.
                    </p>
                    <div class="student-review-footer">
                        <div class="student-review-rating">
                            <span>Rated 5/5 stars</span>
                            <img src="/storage/frontend/frame-1171275930.svg" alt="Star">
                        </div>
                        <div>
                            <p class="student-review-verified">Verified Student</p>
                            <p class="student-review-batch"> <img src="/storage/frontend/check blue.svg" alt="check" width="10px"
                                    height="10px">
                                2022 Batch</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OF certification_section_14 -->

    <!-- certification_section_15 -->
    <section class="advanced-certification-section container-fluid">
        <h2 class="advanced-certification-title">{{ $course_content -> certification_section_15_title }}</h2>
        <div class="row mx-5">
            <div class="col-lg-6">
                <img src="/storage/frontend/1672650802-removebg-preview-1.svg" alt="Certification Image"
                    class="advanced-certification-image img-fluid">
            </div>
            <div class="col-lg-6">
                <div class="advanced-certification-text">
                    {!!  $course_content -> certification_section_15_content !!}
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="row mx-5">
            <div class="col-lg-6">
                <div class="accordion" id="accordionExample1">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Ornare laoreet mi tempus neque
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                Timperdiet gravida scelerisque odio nunc. Eget felis, odio bibendum quis eget sit lorem
                                donec diam. Volutpat sed orci turpis sit dolor est a pretium eget. Vitae turpis orci vel
                                tellus cursus lorem vestibulum quis eu. Ut commodo, eget lorem venenatis urna.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Rhoncus nullam aliquam nam proin
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample1">
                            <div class="accordion-body">
                                Lore ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="accordion" id="accordionExample2">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Example Title
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                Example content for this section. Some additional content goes here.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Additional Title
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                                Additional content for this section.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="contact-us-btn">
            Contact us
            <img src="/storage/frontend/arrow-indication-13.svg" alt="Arrow Icon">
        </a>
    </section>
    <!-- END OF certification_section_15 -->

    <!-- certification_section_16 -->
    <section class="masters-pack-section">
        <div class="masters-pack-overlay"></div>
        <div class="masters-pack-content">
            <h2 class="masters-pack-title">{{ $course_content -> certification_section_16_title }}
            </h2>
            {!!  $course_content -> certification_section_16_content !!}
            
            <div class="btn-group">
                <a href="#" class="btn-custom">Enroll Now</a>
                <a href="#" class="btn-custom secondary border-0">
                    Contact us
                    <img src="/storage/frontend/right-white-arrow.svg" alt="Arrow Icon">
                </a>
            </div>
        </div>
    </section>
    <!-- END OF certification_section_16 -->

    </div>

@endsection