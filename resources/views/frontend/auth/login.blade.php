@extends('frontend.layouts.app')

@section('title', 'Login')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
@endpush

@section('content')

    <div class="container my-5">
        <div class="row flex-grow-1 d-flex align-items-center">

            <x-frontend.auth></x-frontend.auth>

            <div class="col-lg-8 white-section" style="min-height: 500px;">
                
                <x-frontend.notification></x-frontend.notification>

                <div class="form-container">
                    <h1 class="fs-39">Login Your Account</h1>

                    <div class="subheading fs-16">
                        Enter your credentials to access your account.
                    </div>

                    <!-- <div class="social-login-buttons d-flex justify-content-center">
                        <a href="#" class="btn-social">
                            <img src="/storage/frontend/devicon-google.svg" alt="Google">
                            Login with Google
                        </a>
                        <a href="#" class="btn-social">
                            <img src="/storage/frontend/ic-baseline-apple.svg" alt="Apple">
                            Login with Apple
                        </a>
                        <a href="#" class="btn-social">
                            <img src="/storage/frontend/basil-facebook-outline-6.svg" alt="Facebook">
                            Login with Facebook
                        </a>
                    </div> -->

                    <!-- <div class="or-separator">
                        <div class="line"></div>
                        <div class="or-text">Or</div>
                        <div class="line"></div>
                    </div> -->

                    <form method="POST" action="{{ route('frontend.login.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="fs-16" style="font-size:16px; font-weight:500;">User Name</label>
                            <input type="email" class="form-control fs-13" id="username" name="email" placeholder="john@gmail.com" required>
                            <x-frontend.input-error field="login_failed"></x-frontend.input-error>
                        </div>

                        <div class="form-group position-relative">
                            <label for="password" class="fs-16" style="font-size:16px; font-weight:500;">Password</label>
                            <input type="password" class="form-control pr-5 fs-13" id="password" name="password" placeholder="********" required>
                            <span class="bi bi-eye-slash-fill toggle-password"></span>
                            <x-frontend.input-error field="login_failed"></x-frontend.input-error>
                        </div>
                        
                        <div class="remember-forget">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember-password">
                                <label class="form-check-label fs-13" for="remember-password" style="font-size:13px; font-weight:400;">Remember password</label>
                            </div>

                            <a href="{{ route('frontend.password.request') }}" class="text-primary" style="font-size:13px; font-weight:400;">Forget Password?</a>
                        </div>

                        <div class="form-input">
                            <x-frontend.captcha></x-frontend.captcha>
                        </div>

                        <input type="hidden" name="redirect" value="{{ request('redirect') }}">

                        <button type="submit" class="btn submit-button">Login</button>
                    </form>

                    <!-- New Text and Link -->
                    <div class="text-center mt-3">
                        <span class="dont-have-account fs-13">Don’t have an account?</span>
                        <a href="{{ route('frontend.register') }}" class="register-now">Register Now</a>
                    </div>
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