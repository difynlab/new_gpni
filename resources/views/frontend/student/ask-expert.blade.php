@extends('frontend.layouts.app')

@section('title', 'Ask The Expert')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/ask-the-expert.css') }}">
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
                <div class="header-section">
                    <h1>{{ $language_text['header_text'] }}</h1>
                    <a href="{{ route('frontend.view-history') }}">
                        <img src="/storage/frontend/solar-history-linear.svg" class="icon-history" alt="History Icon" width="22" height="22">
                        {{ $language_text['view_history'] }}
                    </a>
                </div>
                <form action="{{ route('frontend.ask-expert.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="subject" class="form-label">{{ $language_text['subject_label'] }}</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="{{ $language_text['subject_placeholder'] }}">
                    </div>
                    <div class="mb-4">
                        <label for="question" class="form-label">{{ $language_text['question_label'] }}</label>
                        <input type="text" class="form-control" id="question" name="question" placeholder="{{ $language_text['question_placeholder'] }}">
                    </div>
                    <button type="submit" class="btn btn-submit">{{ $language_text['submit'] }}</button>
                </form>
            </div>
        </div>

    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        
    </div>

@endsection