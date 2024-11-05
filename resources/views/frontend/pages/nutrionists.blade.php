@extends('frontend.layouts.app')

@section('title', 'Nutritionist')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/nutritionist.css') }}">
@endpush

@section('content')

    @if($contents->{'title_en'})
        <div class="container my-5">
            <section class="learn-best-section">
                <div class="container">
                    <h1>{{ $contents->{'title_' . $language} ?? $contents->{'title_en'} }}</h1>
                    <div class="search-field">
                        <img src="/storage/frontend/search-grey.svg" alt="Search Icon" width="17.98" height="18">
                        <input type="text" placeholder="Search for courses">
                    </div>
                </div>
            </section>

            <section class="coaches-section">
                <div class="container">
                    <div class="row justify-content-center">
                        
                        @foreach($nutritionists as $nutritionist)
                            <!-- Coach Card -->
                            <div class="col-md-3 mb-4">
                                <div class="coach-card">
                                    <div class="flex-grow">
                                        <div class="qualified-coach">Qualified Coach</div>
                                        @if($nutritionist->{'image'})
                                            <img src="{{ asset('storage/backend/persons/nutritionists/'.$nutritionist->{'image'}) }}" alt="User Image">
                                        @else
                                            <img src="/storage/frontend/male-avatar-for-ui-design-png-google-search-removebg-preview-2.svg" alt="User Image">
                                        @endif
                                        <div class="coach-name">{{ $nutritionist -> name }}</div>
                                        <div class="coach-location-row">
                                            <div class="coach-location-item">
                                                <img src="/storage/frontend/fluent-globe-location-20-regular.svg" alt="Location Icon" width="20px" height="20px">
                                                <span>{{ $nutritionist -> country }}</span>
                                            </div>
                                            <div class="coach-location-item">
                                                <img src="/storage/frontend/material-symbols-connect-without-contact.svg" alt="Contact Icon" width="20px" height="20px">
                                                <span>Contact Coach</span>
                                            </div>
                                        </div>
                                        <div class="coach-info-row">
                                            <div class="coach-info">{{ $nutritionist -> age }}</div>
                                            <div class="coach-info">Credentials: SNC,SNS</div>
                                            <div class="coach-info">CEC Status: <span class="cec-status">{{ $nutritionist -> status }}</span></div>
                                        </div>
                                    </div>
                                    <!-- <a href="#" class="view-profile-btn">View Profile</a> -->
                                    
                                    <a href="{{ route('frontend.view-coach', ['id' => $nutritionist->id]) }}" class="view-profile-btn">
                                        View Profile
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </section>
            
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://maxcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
            </body>
        </div>
    @endif
    

@endsection