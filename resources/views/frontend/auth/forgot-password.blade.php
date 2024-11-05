@extends('frontend.layouts.app')

@section('title', 'Forgot Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
@endpush

@section('content')
    
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <!-- Blue Section -->
        <div class="col-lg-4 blue-section">
            <img src="/storage/frontend/gpni-removebg-pre.png" alt="GPNi Logo" class="logo">
            <h2>{!! $translation['heading'] !!}</h2>
            <div class="feature-section">
                <ul class="feature-list">
                    <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>{{ $translation['qualified_coaches'] }}</span></li>
                    <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>{{ $translation['on_demand_learning'] }}</span></li>
                    <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>{{ $translation['social_network'] }}</span></li>
                    <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>{{ $translation['global_certification'] }}</span></li>
                </ul>
            </div>
        </div>

        <!-- White Section -->
        <div class="col-lg-5 offset-lg-1 white-section">
            <x-frontend.notification></x-frontend.notification>

            <h1>{{ $translation['forgot_password'] }}</h1>
            <p class="subtitle">{{ $translation['subtitle'] }}</p>

            <form method="POST" action="{{ route('frontend.password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="email">{{ $translation['email_label'] }}</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ $translation['email_placeholder'] }}" value="{{ old('email') }}" required>
                    <x-frontend.input-error field="email"></x-frontend.input-error>
                </div>

                <div class="form-input">
                    <x-frontend.captcha></x-frontend.captcha>
                </div>

                <button type="submit" class="btn btn-primary btn-block submit-button" style="background-color: #0040c3; color: #fff; border: none; border-radius: 10px; height: 46px;" disabled>{{ $translation['send_reset_link'] }}</button>
            </form>

        </div>
    </div>
</div>

@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/captcha.js') }}"></script>
@endpush