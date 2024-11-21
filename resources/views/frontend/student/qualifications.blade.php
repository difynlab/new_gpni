@extends('frontend.layouts.app')

@section('title', 'Qualifications')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/qualifications.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="container-main">
                    <div class="header-section">
                        <h1>Qualifications</h1>
                    </div>

                    <form action="" method="POST">
                        <div class="search-bar">
                            <img src="{{ asset('storage/frontend/search-icon-gray.svg') }}" alt="Search Icon" width="18" height="18">
                            <input type="text" placeholder="Search for Qualifications">
                        </div>
                    </form>

                    <div class="certificate-list">
                        @if(count($obtained_certificates) > 0)
                            @foreach($obtained_certificates as $obtained_certificate)
                                @if($obtained_certificate)
                                    <div class="certificate-card">
                                        <div class="certificate-header">
                                            <div class="title">{{ $obtained_certificate['course_title'] }}</div>

                                            <a href="{{ asset('storage/backend/courses/course-certificates/' . $obtained_certificate['certificate_url']) }}" class="download-button" download><i class="bi bi-download"></i></a>
                                        </div>

                                        <p class="certificate-issued">Issued on: <span>{{ $obtained_certificate['issued_date_time'] }}</span></p>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p class="no-qualifications">Please complete the courses to obtain the certificates</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection