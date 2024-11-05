@extends('frontend.layouts.app')

@section('title', 'Qualifications')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/qualification.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    
    <div class="d-flex flex-column flex-md-row dashboard-container">
        <div class="d-flex flex-column flex-md-row">
            <nav class="sidebar">
                <div class="profile-card">
                    <div class="profile-container">
                        <img src="/storage/frontend/ellipse-2.svg" class="profile-img" alt="Profile Image">
                        <div class="edit-icon">
                            <img src="/storage/frontend/akar-icons-edit.svg" alt="Edit">
                        </div>
                    </div>
                    <h2>Tim Stevens</h2>
                    <p>
                        <img src="/storage/frontend/dashicons-location.svg" class="location-icon" alt="Location" width="24"
                            height="24">
                        China
                    </p>
                </div>
                <a href="./studentProfile.html" class="sidebar-item">
                    <img src="/storage/frontend/profile.svg" alt="Profile icon" width="28" height="28">
                    Student Profile
                </a>
                <a href="./courseListView.html" class="sidebar-item">
                    <img src="/storage/frontend/fluent-mdl-2-publish-course.svg" alt="Courses icon" width="28" height="28">
                    Courses
                </a>
                <a href="./qualification.html" class="sidebar-item">
                    <img src="/storage/frontend/healthicons-i-exam-qualification-outline.svg" alt="Qualifications icon" width="28"
                        height="28">
                    Qualifications
                </a>
                <a href="./studyMaterialMain.html" class="sidebar-item d-flex">
                    <img src="/storage/frontend/fluent-people-toolbox-20-regular.svg" alt="Study Tools icon" width="28"
                        height="28">
                    Study Tools
                    <img src="/storage/frontend/ep-arrow-up-bold.svg" alt="Expand icon" width="24" height="24" class="ml-auto">
                </a>
                <a href="./studyMaterialPaymentPortal.html" class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Buy Study Material
                </a>
                <a href="./members.Corner.html" class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Members Corner
                </a>

                <a href="./askTheExpert.html" class="sidebar-item">
                    <img src="/storage/frontend/mdi-chat-question-outline.svg" alt="Ask the Experts icon" width="28" height="28">
                    Ask the Experts
                </a>
                <a href="./referFriend.html" class="sidebar-item">
                    <img src="/storage/frontend/ph-hand-coins.svg" alt="Referral Points icon" width="28" height="28">
                    Referral Points
                </a>
            </nav>
        </div>

        <div class="col-md-9 main-content">
            <div class="container-main">
                <!-- Tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item col-6">
                        <a class="nav-link active" id="certificates-tab" data-toggle="tab" href="#certificates"
                            role="tab" aria-controls="certificates" aria-selected="true">Certificates</a>
                    </li>
                    <li class="nav-item col-6">
                        <a class="nav-link" id="cecs-tab" data-toggle="tab" href="#cecs" role="tab" aria-controls="cecs"
                            aria-selected="false">CECs</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="certificates" role="tabpanel"
                        aria-labelledby="certificates-tab">
                        <!-- Certificates content goes here -->
                        <!-- Search Bar -->
                        <div class="search-bar">
                            <img src="/storage/frontend/vector.svg" alt="Search Icon" width="18" height="18">
                            <input type="text" placeholder="Search for Certificates">
                        </div>

                        <!-- Certificates List -->
                        <div class="certificate-list">
                        @foreach($purchases as $purchase)
                            @if($purchase->certificate)
                                <div class="certificate-card">
                                    <div class="certificate-header">
                                        <div class="title">Course ID: {{ $purchase->course_id }}</div> <!-- Display course title or ID -->
                                        <a href="/path/to/certificate/{{ $purchase->certificate->id }}/download">
                                            <img src="/storage/frontend/icon.svg" alt="Download Icon" width="32" height="32">
                                        </a>
                                    </div>
                                    <img src="/storage/frontend/rectangle-110694.svg" class="certificate-image" alt="Certificate">
                                    <div class="certificate-issued">
                                        Issued on: {{ $purchase->certificate->certificate_issued_date }} at {{ $purchase->certificate->certificate_issued_time }}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cecs" role="tabpanel" aria-labelledby="cecs-tab">
                        <!-- Header -->
                        <div class="cec-header">
                            <h1 class="pt-4">CEC Points</h1>

                            <button type="button" class="btn btn-cec-request" data-toggle="modal"
                                data-target="#cecRequestModal">
                                CEC Point Request
                            </button>

                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Point By</th>
                                        <th>Course Name</th>
                                        <th>Type</th>
                                        <th>CEC Points</th>
                                        <th>Balance</th>
                                        <th>Column Header</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="empty-record">
                            Record not available
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cecRequestModal" tabindex="-1" aria-labelledby="cecRequestModalLabel"
        aria-hidden="true">

    </div>

@endsection