@extends('frontend.layouts.app')

@section('title', 'Register')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
@endpush

@section('content')

    <div class="container my-5">
        <div class="container-custom">
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
                    <h1>Register now and get started!</h1>
                    <p class="subtitle">Enter your details below to kickstart your journey.
                        <a href="{{ route('frontend.login') }}" class="text-primary">Login</a>
                    </p>

                    <form method="POST" action="{{ route('frontend.register.store') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name" value="{{ old('last_name') }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-control country-select" id="country" name="country" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Ex: johnmercury@gmail.com" value="{{ old('email') }}" required>
                                <x-frontend.input-error field="email"></x-frontend.input-error>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="********" required>
                                <x-frontend.input-error field="password"></x-frontend.input-error>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputConfirmPassword4" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="inputConfirmPassword4" name="confirm_password" placeholder="********" required>
                                <x-frontend.input-error field="confirm_password"></x-frontend.input-error>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="language" class="form-label">Select Language</label>
                                <select class="form-select country-select" id="language" name="language" required>
                                    <option value="">Select your language</option>
                                    <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                                    <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                                    <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-input">
                            <x-frontend.captcha></x-frontend.captcha>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-block submit-button" style="background-color: #0040c3; color: #fff; border: none; border-radius: 10px; height: 46px;" disabled>Submit</button>
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