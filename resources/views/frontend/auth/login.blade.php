@extends('frontend.layouts.app')

@section('title', 'Login')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
@endpush

@section('content')

    <div class="container my-5">
        <div class="row flex-grow-1 d-flex align-items-center">
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
            <div class="col-lg-8 white-section" style="min-height: 500px;">
                <div class="form-container">
                    <h1>Login Your Account</h1>
                    <div class="subheading">
                        Log in with your data that you entered during your registration.
                        <a href="{{ route('frontend.register') }}" class="text-primary">Register</a>
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
                    </div>
                    <div class="or-separator">
                        <div class="line"></div>
                        <div class="or-text">Or</div>
                        <div class="line"></div>
                    </div> -->

                    <form method="POST" action="{{ route('frontend.login.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username" style="font-size:16px; font-weight:500;">User Name</label>
                            <input type="email" class="form-control" id="username" name="email" placeholder="john@gmail.com" required>
                            <x-frontend.input-error field="login_failed"></x-frontend.input-error>
                        </div>
                        <div class="form-group">
                            <label for="password" style="font-size:16px; font-weight:500;">Password</label>
                            <div class="input-group position-relative">
                                <input type="password" class="form-control pr-5" id="password" name="password" placeholder="********" required>
                                <span class="input-icon">
                                    <img src="/storage/frontend/carbon-view-off.svg" alt="View Off">
                                </span>
                            </div>
                            <x-frontend.input-error field="login_failed"></x-frontend.input-error>
                        </div>
                        <div class="remember-forget">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember-password">
                                <label class="form-check-label" for="remember-password"
                                    style="font-size:13px; font-weight:400;">Remember password</label>
                            </div>
                            <a href="{{ route('frontend.password.request') }}" class="text-primary" style="font-size:13px; font-weight:400;">Forget
                                Password?</a>
                        </div>

                        <div class="form-input">
                            <x-frontend.captcha></x-frontend.captcha>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block submit-button" style="background-color: #0040c3; color: #fff; border: none; border-radius: 10px; height: 46px;" disabled>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/captcha.js') }}"></script>
@endpush