@extends('frontend.layouts.app')

@section('title', 'Student Dashboard')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/dashboard.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 sidebar">
                <div class="sidebar-item">
                    <img src="/storage/frontend/profile.svg" alt="Profile icon" width="28" height="28">
                    <span>Student Profile</span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/fluent-mdl-2-publish-course.svg" alt="Courses icon" width="28" height="28">
                    <span>Courses</span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/healthicons-i-exam-qualification-outline.svg" alt="Qualifications icon" width="28"
                        height="28">
                    <span><a href="{{ route('frontend.qualifications') }}">Qualifications</a></span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/fluent-people-toolbox-20-regular.svg" alt="Study Tools icon" width="28"
                        height="28">
                    <span>Study Tools</span>
                    <img src="/storage/frontend/ep-arrow-up-bold.svg" alt="Expand icon" width="24" height="24">
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    <span><a href="{{ route('frontend.student-materials') }}">Buy Study Material</a></span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    <span><a href="{{ route('frontend.members-corner') }}">Members Corner</a></span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/mdi-chat-question-outline.svg" alt="Ask the Experts icon" width="28" height="28">
                    <span>Ask the Experts</span>
                </div>
                <div class="sidebar-item">
                    <img src="/storage/frontend/ph-hand-coins.svg" alt="Referral Points icon" width="28" height="28">
                    <span><a href="{{ route('frontend.refer-friend') }}">Referral Points</a></span>
                </div>
            </div>
            <div class="col-12 col-md-9 main-content">
                <div class="profile-card mb-4">
                    <div class="profile-card-details">
                    <div class="date">{{ $current_date }}</div>
                        <h1>Welcome Back, Tim Stevens!</h1>
                        <div class="location">
                            <img src="/storage/frontend/dashicons-location.svg" alt="Location icon" width="24" height="24"
                                class="mr-2">
                            China
                        </div>
                    </div>
                    <img src="/storage/frontend/image-16.svg" alt="Profile image" width="171" height="148">
                </div>
                <div class="card-section">
                    <a href="{{ route('frontend.student-profile') }}" class="card">
                        <h2>{{ $dashboard_text['student_profile'] }}</h2>
                        <p>{{ $dashboard_text['view_edit_profile'] }}</p>
                    </a>
                    <a href="{{ route('frontend.change-password') }}" class="card">
                        <h2>{{ $dashboard_text['change_password'] }}</h2>
                        <p>{{ $dashboard_text['view_edit_password'] }}</p>
                    </a>
                    <a href="{{ route('frontend.my-orders') }}" class="card">
                        <h2>{{ $dashboard_text['courses'] }}</h2>
                        <p>{{ $dashboard_text['access_course_details'] }}</p>
                    </a>
                    <div class="card">
                        <h2>{{ $dashboard_text['billing_center'] }}</h2>
                        <p>{{ $dashboard_text['billing_info'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection