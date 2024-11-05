@extends('frontend.layouts.app')

@section('title', 'Change Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/change-password.css') }}">
@endpush

@section('content')

    

    <div class="container my-5">
        <div class="d-flex flex-column flex-md-row dashboard-container">
            <div class="d-flex flex-column flex-md-row">
                <x-frontend.student-sidebar></x-frontend.student-sidebar>
            </div>

            <div class="col-md-9 main-content">
                <x-frontend.notification></x-frontend.notification>

                <div class="change-password-container">
                    <div class="text-centered">
                        <h1 style="font-weight: 500; font-size: 31px; line-height: 46.5px; color: #0e0e0e;">Change Password
                        </h1>
                        <p style="font-weight: 400; font-size: 20px; line-height: 30px; color: #505050;">To change password,
                            please fill in the fields below</p>
                    </div>
                    <div class="password-rules-container">
                        <h5>Password should be and must contain:</h5>
                        <div class="password-rules-list">
                            <div class="password-rule-item">
                                <span class="rule-title">8+</span>
                                <span class="rule-desc">Characters</span>
                            </div>
                            <div class="password-rule-item">
                                <span class="rule-title">AA</span>
                                <span class="rule-desc">Uppercase</span>
                            </div>
                            <div class="password-rule-item">
                                <span class="rule-title">aa</span>
                                <span class="rule-desc">Lowercase</span>
                            </div>
                            <div class="password-rule-item">
                                <span class="rule-title">123</span>
                                <span class="rule-desc">Numbers</span>
                            </div>
                            <div class="password-rule-item">
                                <span class="rule-title">@#$</span>
                                <span class="rule-desc">Symbols</span>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('frontend.change-password') }}">
                        @csrf

                        <div class="form-group">
                            <label for="newPassword" style="font-weight: 500; font-size: 16px; color: #505050;">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="password" placeholder="********" required>
                            <x-frontend.input-error field="password"></x-frontend.input-error>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword" style="font-weight: 500; font-size: 16px; color: #505050;">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="********" required>
                            <x-frontend.input-error field="confirm_password"></x-frontend.input-error>
                        </div>

                        <div class="change-password-button">
                            <button type="submit" class="btn btn-change-password">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection