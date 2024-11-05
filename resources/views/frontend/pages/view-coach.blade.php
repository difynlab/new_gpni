@extends('frontend.layouts.app')

@section('title', 'View Coach')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/view-coach.css') }}">
@endpush

@section('content')

<div class="container my-5">
    <div class="coach-profile">
        <!-- Close Icon -->
        <img src="/storage/frontend/material-symbols_close.svg" alt="Close Icon" class="close-icon" width="24" height="24">

        <!-- QR Code -->
        <img src="/storage/frontend/qr.png" alt="QR Code" class="qr-code">

        <!-- Left Section -->
        <div class="side-section">
            @if($nutritionists->{'image'})
                <img src="{{ asset('storage/backend/persons/nutritionists/'.$nutritionists->{'image'}) }}" alt="Coach Image" class="coach-image">
            @else
                <img src="/storage/frontend/male-avatar-for-ui-design-png-google-search-removebg-preview-2.svg" alt="Coach Image" class="coach-image">
            @endif
        </div>

        <!-- Central Content -->
        <div class="coach-details">
            <div class="details-content">
                <h5 class="mb-2">{{ $nutritionists -> name }}</h5>
                <p><strong>Age:</strong> {{ $nutritionists -> age }}</p>
                <p><strong>Country/Region:</strong> {{ $nutritionists -> country }}</p>
                <p><strong>CEC status:</strong> <span class="highlight">{{ $nutritionists -> status }}</span></p>
                <p><strong>Credentials:</strong> {{ $nutritionists -> cec_status }}</p>
                <p><strong>Certificate number:</strong> {{ $nutritionists -> certificate_number }}</p>
                <p><strong>Membership/Credential status:</strong> {{ $nutritionists -> credentials }}</p>
                <div class="area-of-interest">
                    <strong>Area Of Interest</strong>
                    <div class="mt-2 d-flex flex-wrap">
                        <span class="interest-btn">Interest opt 1</span>
                        <span class="interest-btn">Interest opt 2</span>
                        <span class="interest-btn">Interest opt 3</span>
                        <span class="interest-btn">Interest opt 4</span>
                    </div>
                </div>
                <div class="self-intro">
                    <strong>Self Introduction</strong>
                    <p class="intro-paragraph">{{ $nutritionists -> self_introduction }}</p>
                </div>
                <div class="bottom-section">
                    <span class="qualified-coach">Qualified Coach</span>
                    <a href="#" class="contact-now">Contact coach Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection