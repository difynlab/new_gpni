@extends('frontend.layouts.app')

@section('title', 'Forgot Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
@endpush

@section('content')
    
<div class="container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        
        <x-frontend.auth></x-frontend.auth>

        <div class="col-lg-5 offset-lg-1 white-section">
            <x-frontend.notification></x-frontend.notification>

            <h1>Forgot Password</h1>
            <p class="subtitle">Please provide your email address below to reset your password</p>

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

                <button type="submit" class="btn btn-primary btn-block submit-button" style="background-color: #0040c3; color: #fff; border: none; border-radius: 10px; height: 46px;" disabled>Send Reset Link</button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/captcha.js') }}"></script>
@endpush