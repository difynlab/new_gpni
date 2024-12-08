@extends('frontend.layouts.app')

@section('title', 'Forgot Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
@endpush

@section('content')
    
<div class="container custom-container my-lg-5 mb-4 my-0">
    <div class="row flex-grow-1 d-flex align-items-center">
        
        <x-frontend.auth></x-frontend.auth>

        <div class="col-lg-8 white-section d-flex justify-content-center">
            <div class="form-container">
                <x-frontend.notification></x-frontend.notification>

                <h1 class="fs-39 text-center">Forgot Password</h1>
                <p class="subheading fs-16 text-center">Please provide your email address below to reset your password</p>

                <form method="POST" action="{{ route('frontend.password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your email address" value="{{ old('email') }}" required>
                        <x-frontend.input-error field="email"></x-frontend.input-error>
                    </div>

                    <div class="form-input">
                        <x-frontend.captcha></x-frontend.captcha>
                    </div>
                <div class="py-2">
                    <button type="submit" class="btn submit-button" style="background-color: #0040c3; color: #fff; border: none; border-radius: 10px; height: 46px;" disabled>Send Reset Link</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/captcha.js') }}"></script>
@endpush