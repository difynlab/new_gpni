@extends('frontend.layouts.app')

@section('title', 'Student Dashboard')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dashboard.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="profile-card mb-4">
                    <div class="profile-card-details">
                        <p class="date mb-0">{{ $date }}</p>

                        <h1>{{ $student_dashboard_contents->dashboard_welcome }}, {{ $student->first_name . ' ' . $student->last_name}}!</h1>

                        <div class="location">
                            <img src="{{ asset('storage/frontend/location-icon.svg') }}" alt="Location icon" width="24" height="24" class="me-2">
                            {{ $student->country }}
                        </div>
                    </div>

                    @if($student->image)
                        <img src="{{ asset('storage/backend/persons/students/' . $student->image) }}" alt="Profile image" width="171" height="148">
                    @else
                        <img src="{{ asset('storage/frontend/sample-profile-image.svg') }}" alt="Profile image" width="171" height="148">
                    @endif
                </div>

                <div class="card-section">
                    <a href="{{ route('frontend.profile.index') }}" class="card">
                        <h2>{{ $student_dashboard_contents->dashboard_profile }}</h2>
                        <p>{{ $student_dashboard_contents->dashboard_profile_description }}</p>
                    </a>

                    <a href="{{ route('frontend.change-password') }}" class="card">
                        <h2>{{ $student_dashboard_contents->dashboard_change_password }}</h2>
                        <p>{{ $student_dashboard_contents->dashboard_change_password_description }}</p>
                    </a>

                    <a href="{{ route('frontend.courses.index') }}" class="card">
                        <h2>{{ $student_dashboard_contents->dashboard_courses }}</h2>
                        <p>{{ $student_dashboard_contents->dashboard_courses_description }}</p>
                    </a>

                    <a href="{{ route('frontend.my-orders') }}" class="card">
                        <h2>{{ $student_dashboard_contents->dashboard_billing_centre }}</h2>
                        <p>{{ $student_dashboard_contents->dashboard_billing_centre_description }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection