@extends('backend.layouts.guest')

@section('title', 'Login')

@section('content')

    <div class="form">
        <x-backend.notification></x-backend.notification>

        <h3 class="title">Get Started Now</h3>
        <p class="subtitle">Enter your credentials to access your account</p>

        <form method="POST" action="{{ route('backend.login.store') }}">
            @csrf

            <div class="form-input">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required autofocus>
                <x-backend.input-error field="login_failed"></x-backend.input-error>
            </div>

            <div class="form-input position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="* * * * * * * *" required>
                <span class="bi bi-eye-slash-fill toggle-password"></span>
                <x-backend.input-error field="login_failed"></x-backend.input-error>
            </div>

            <div class="form-input">
                <div class="row">
                    <div class="col-6">
                        <div class="form-check mb-0">
                            <input class="form-check-input remember-password" type="checkbox" id="remember-password">
                            <label class="form-check-label remember-password" for="remember-password">Remember password</label>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        @if(Route::has('backend.password.request'))
                            <a href="{{ route('backend.password.request') }}" class="forgot-password-text">Forgot password?</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-input">
                <x-backend.captcha></x-backend.captcha>
            </div>

            <div class="form-input">
                <button type="submit" class="submit-button" disabled>Login</button>
            </div>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script src="{{ asset('backend/js/captcha.js') }}"></script>
@endpush