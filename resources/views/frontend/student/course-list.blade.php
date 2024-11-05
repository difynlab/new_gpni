@extends('frontend.layouts.app')

@section('title', 'Course List')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/course-list-view.css') }}">
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
            <div class="course-container">
                <div class="course-header">
                    <h1>Course List</h1>
                </div>
                @foreach($courses as $course)
                    <div class="course-card">
                        <img src="/storage/backend/courses/course-image-videos/{{ $course['image'] }}" alt="Course image">
                        <div class="course-info">
                            <h2>{{ $course['title'] }}</h2>
                            <p>Started: {{ $course['start_date'] }} | Completed: {{ $course['completion_date'] }}
                                <span class="badge-completed">{{ $course['completed'] }}</span>
                            </p>
                        </div>
                        <div class="course-actions">
                            <a href="{{ route('frontend.course-detail', ['id' => $course['id']]) }}">View Details <img src="/storage/frontend/arrow-indication.svg" alt="Arrow"></a>
                        </div>
                    </div>
                @endforeach
                <!-- Add more course cards here as needed -->
            </div>
        </div>
    </div>

    </div>

@endsection