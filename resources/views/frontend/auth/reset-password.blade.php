@extends('frontend.layouts.app')

@section('title', 'Forgot Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/reset-password.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
@endpush

@section('content')
    
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center min-vh-100">
            <!-- Blue Section -->
            <div class="col-lg-4 blue-section">
                <img src="/storage/frontend/gpni-removebg-pre.png" alt="GPNi Logo" class="img-fluid mx-auto d-block logo">
                <h2 class="align-left">Gateway to 360°<br>Nutrition Education</h2>
                <div class="feature-section">
                    <ul class="feature-list">
                        <li><img src="/storage/frontend/typcn-tick.svg" alt="Tick Icon"><span>Qualified Coaches</span></li>
                        <li><img src="/storage/frontend/typcn-tick-2.svg" alt="Tick Icon"><span>On-Demand Learning</span></li>
                        <li><img src="/storage/frontend/typcn-tick-3.svg" alt="Tick Icon"><span>Social Network</span></li>
                        <li><img src="/storage/frontend/typcn-tick-4.svg" alt="Tick Icon"><span>Globally recognized
                                certification</span></li>
                    </ul>
                </div>
                <div class="partners">
                    <div class="partners-inner">
                        <div class="partner-logo">
                            <img src="/storage/frontend/SignIn1.png" alt="ISSN Logo">
                            <img src="/storage/frontend/SignIn2.png" alt="IDEA Logo">
                            <img src="/storage/frontend/SignIn3.png" alt="FIBO Logo">
                            <img src="/storage/frontend/SignIn4.png" alt="Nike Sparq Training Logo">
                        </div>
                        <div class="partner-logo">
                            <img src="/storage/frontend/SignIn1.png" alt="ISSN Logo">
                            <img src="/storage/frontend/SignIn2.png" alt="IDEA Logo">
                            <img src="/storage/frontend/SignIn3.png" alt="FIBO Logo">
                            <img src="/storage/frontend/SignIn4.png" alt="Nike Sparq Training Logo">
                        </div>
                    </div>
                </div>
            </div>

            <!-- White Section -->
            <div class="col-lg-5 offset-lg-1 white-section">
                <h1>Reset Password</h1>
                <p class="subtitle">Enter your new password to access your account</p>

                <form method="POST" action="{{ route('frontend.password.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <div class="input-group position-relative">
                            <input type="password" class="form-control pr-5" id="new-password" name="password" placeholder="New password" required>
                            <span class="input-icon">
                                <img src="/storage/frontend/carbon-view-off.svg" alt="View Off">
                            </span>
                        </div>
                        <x-backend.input-error field="password"></x-backend.input-error>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <div class="input-group position-relative">
                            <input type="password" class="form-control pr-5" id="confirm-password" name="confirm_password" placeholder="Confirm password" required>
                            <span class="input-icon">
                                <img src="/storage/frontend/carbon-view-off.svg" alt="View Off">
                            </span>
                        </div>
                        <x-backend.input-error field="confirm_password"></x-backend.input-error>
                    </div>

                    <div class="form-input">
                        <x-frontend.captcha></x-frontend.captcha>
                    </div>

                    <div class="form-input">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <button type="submit" class="btn btn-primary btn-block submit-button" disabled>Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/captcha.js') }}"></script>
@endpush