@extends('backend.layouts.guest')

@section('title', 'Reset Password')

@section('content')

    <div class="form">
        <h3 class="title">Reset Password</h3>
        <p class="subtitle">Enter your new password to access your account</p>

        <form method="POST" action="{{ route('backend.password.store') }}">
            @csrf

            <div class="form-input position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="* * * * * * * *" required>
                <span class="bi bi-eye-slash-fill toggle-password"></span>
                <x-backend.input-error field="password"></x-backend.input-error>
            </div>

            <div class="form-input position-relative">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="* * * * * * * *" required>
                <span class="bi bi-eye-slash-fill toggle-password"></span>
                <x-backend.input-error field="confirm_password"></x-backend.input-error>
            </div>

            <div class="form-input">
                <x-backend.captcha></x-backend.captcha>
            </div>

            <div class="form-input">
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">
                <button type="submit" class="submit-button" disabled>Reset Password</button>
            </div>
        </form>
    </div>

@endsection