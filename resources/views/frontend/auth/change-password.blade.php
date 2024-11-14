@extends('frontend.layouts.app')

@section('title', 'Change Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/change-password.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <x-frontend.notification></x-frontend.notification>

                <div class="change-password-container">
                    <div class="text-centered">
                        <h1 style="font-weight: 500; font-size: 31px; line-height: 46.5px; color: #0e0e0e;">Change Password
                        </h1>
                        <p style="font-weight: 400; font-size: 20px; line-height: 30px; color: #505050;">To change password, please fill in the fields below</p>
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
                        <div class="form-group position-relative">
                            <label for="new-password">New Password</label>
                            <input type="password" class="form-control pr-5" id="new-password" name="password" placeholder="New password" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
                            <x-frontend.input-error field="password"></x-frontend.input-error>
                        </div>
                    
                        <div class="form-group position-relative">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control pr-5" id="confirm-password" name="confirm_password" placeholder="Confirm password" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
                            <x-frontend.input-error field="confirm_password"></x-frontend.input-error>
                        </div>

                        <div class="form-input">
                            <x-frontend.captcha></x-frontend.captcha>
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