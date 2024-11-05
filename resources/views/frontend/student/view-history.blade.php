@extends('frontend.layouts.app')

@section('title', 'View History')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/view-history.css') }}">
@endpush

@section('content')

    <div class="container my-5">

    
    <div class="d-flex flex-column flex-md-row dashboard-container">
        <div class="d-flex flex-column flex-md-row">
            <nav class="sidebar">
                <div class="profile-card">
                    <div class="profile-container">
                        <img src="storage/frontend/ellipse-2.svg" class="profile-img" alt="Profile Image">
                        <div class="edit-icon">
                            <img src="storage/frontend/akar-icons-edit.svg" alt="Edit">
                        </div>
                    </div>
                    <h2>Tim Stevens</h2>
                    <p>
                        <img src="storage/frontend/dashicons-location.svg" class="location-icon" alt="Location" width="24"
                            height="24">
                        China
                    </p>
                </div>
                <a href="./studentProfile.html" class="sidebar-item">
                    <img src="storage/frontend/profile.svg" alt="Profile icon" width="28" height="28">
                    Student Profile
                </a>
                <a href="./courseListView.html" class="sidebar-item">
                    <img src="storage/frontend/fluent-mdl-2-publish-course.svg" alt="Courses icon" width="28" height="28">
                    Courses
                </a>
                <a href="./qualification.html" class="sidebar-item">
                    <img src="storage/frontend/healthicons-i-exam-qualification-outline.svg" alt="Qualifications icon" width="28"
                        height="28">
                    Qualifications
                </a>
                <a href="./studyMaterialMain.html" class="sidebar-item d-flex">
                    <img src="storage/frontend/fluent-people-toolbox-20-regular.svg" alt="Study Tools icon" width="28"
                        height="28">
                    Study Tools
                    <img src="storage/frontend/ep-arrow-up-bold.svg" alt="Expand icon" width="24" height="24" class="ml-auto">
                </a>
                <a href="./studyMaterialPaymentPortal.html" class="sidebar-item">
                    <img src="storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Buy Study Material
                </a>
                <a href="./members.Corner.html" class="sidebar-item">
                    <img src="storage/frontend/profile-2.svg" alt="Buy Study Material icon" width="28" height="28">
                    Members Corner
                </a>

                <a href="./askTheExpert.html" class="sidebar-item">
                    <img src="storage/frontend/mdi-chat-question-outline.svg" alt="Ask the Experts icon" width="28" height="28">
                    Ask the Experts
                </a>
                <a href="./referFriend.html" class="sidebar-item">
                    <img src="storage/frontend/ph-hand-coins.svg" alt="Referral Points icon" width="28" height="28">
                    Referral Points
                </a>
            </nav>
        </div>

        <div class="col-md-9 main-content">
            <div class="container-main">
                <div class="header-section">
                    <h1>{{ $language_text['page_title'] }}</h1>
                    <a href="{{ route('frontend.question-and-answer') }}">
                        <img src="storage/frontend/question.svg" class="icon-question" alt="Question Icon" width="28" height="28">
                        {{ $language_text['ask_question'] }}
                    </a>
                </div>
                <div class="questions-list">
                    @foreach($questions as $question)
                    <a href="{{ route('frontend.question-and-answer', ['id' => $question->id]) }}" style="text-decoration: none; color: inherit;">
                        <div class="question-card">
                            <div class="question-header">
                                <div class="title">{{ $question->subject }}</div>
                                <div class="status">
                                    <div class="status-badge">{{ $language_text['answered_question'] }}</div>
                                    <div class="question-date">{{ $question->date }} {{ $question->time }}</div>
                                </div>
                            </div>
                            <div class="question-content">
                                {{ $language_text['question'] }} {{ $question->initial_message }}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
        
    </div>

@endsection