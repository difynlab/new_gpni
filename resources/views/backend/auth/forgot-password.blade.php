@extends('backend.layouts.guest')

@section('title', 'Forgot Password')

@section('content')

    <div class="form forgot-password">
        <x-backend.notification></x-backend.notification>

        <h3 class="title">Forgot Password?</h3>
        <p class="subtitle">Enter your email to get a password reset link</p>

        <form method="POST" action="{{ route('backend.password.email') }}">
            @csrf
            <div class="form-input">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required autofocus>
                <x-backend.input-error field="email"></x-backend.input-error>
            </div>

            <div class="form-input">
                <x-backend.captcha></x-backend.captcha>
            </div>

            <div class="form-input">
                <button type="submit" class="submit-button" disabled>Reset Password</button>
            </div>
            
            <p class="message">Remember your password? <a href="{{ route('backend.login') }}">Login</a></p>
        </form>
    </div>

@endsection