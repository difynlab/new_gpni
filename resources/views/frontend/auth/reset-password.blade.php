@extends('frontend.layouts.app')

@section('title', 'Forgot Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/reset-password.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
@endpush

@section('content')
    
<div class="container custom-container my-lg-5 mb-4 my-0">
    <div class="row flex-grow-1 d-flex align-items-center">

            <x-frontend.auth></x-frontend.auth>

            <div class="col-lg-8 white-section d-flex justify-content-center">
                <div class="form-container">

                    <h1 class="fs-39">Reset Password</h1>
                    <p class="subheading fs-16">Enter your new password to access your account</p>

                    <form method="POST" action="{{ route('frontend.password.store') }}">
                        @csrf
                        <div class="form-group position-relative">
                            <label for="new-password">New Password</label>
                            <input type="password" class="form-control pr-5" id="new-password" name="password" placeholder="New password" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
                            <x-backend.input-error field="password"></x-backend.input-error>
                        </div>
                        
                        <div class="form-group position-relative">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control pr-5" id="confirm-password" name="confirm_password" placeholder="Confirm password" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
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
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/captcha.js') }}"></script>
    <script>
        $(".toggle-password").click(function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");
            
            if($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            }
            else {
                $(this).prev().attr("type", "password");
            }
        });
    </script>
@endpush