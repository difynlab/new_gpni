@extends('frontend.layouts.app')

@section('title', 'Student Profile')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-profile.css') }}">
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
            <div class="student-profile-container">
                <div class="profile-header">
                    <h1>{{ $language_text['profile_header'] }}</h1>
                    <a href="#">
                        <img src="/storage/frontend/iconamoon-edit-light.svg" alt="Edit icon" width="20" height="20"> 
                        {{ $language_text['edit_profile'] }}
                    </a>
                </div>
                <form>
                    <div class="section">
                        <h2 class="section-title">{{ $language_text['personal_details'] }}</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName">{{ $language_text['first_name'] }}</label>
                                    <input type="text" class="form-control" id="firstName" value="Tim" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName">{{ $language_text['last_name'] }}</label>
                                    <input type="text" class="form-control" id="lastName" value="Stevens" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ $language_text['email_address'] }}</label>
                                    <input type="text" class="form-control" id="email" value="enews@thegpni.com" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="primaryLanguage">{{ $language_text['primary_language'] }}</label>
                                    <select class="form-control" id="primaryLanguage" disabled>
                                        <option>Chinese</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group checkbox-inline">
                            <input type="checkbox" id="newsletter" checked disabled>
                            <label for="newsletter">{{ $language_text['newsletter'] }}</label>
                        </div>
                    </div>
                    <hr>
                    <div class="section">
                        <h2 class="section-title">{{ $language_text['primary_practice'] }}</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="businessName">{{ $language_text['business_name'] }}</label>
                                    <input type="text" class="form-control" id="businessName" value="Business Name" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="businessAddress">{{ $language_text['business_address'] }}</label>
                                    <input type="text" class="form-control" id="businessAddress" value="Business Address" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

@endsection