@extends('frontend.layouts.app')

@section('title', 'Register')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
@endpush

@section('content')

    <div class="container my-5">
        <div class="row flex-grow-1 d-flex align-items-center">

            <x-frontend.auth></x-frontend.auth>

            <div class="col-lg-8 white-section" style="min-height: 500px;">
                <h1>Register now and get started!</h1>
                <p class="subtitle">Enter your details below to kickstart your journey.
                    <a href="{{ route('frontend.login') }}" class="text-primary">Login</a>
                </p>

                <form method="POST" action="{{ route('frontend.register.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name"
                                    placeholder="Enter your first name" value="{{ old('first_name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="last_name"
                                    placeholder="Enter your last name" value="{{ old('last_name') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-control country-select" id="country" name="country" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}"
                                            {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail4" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email"
                                    placeholder="Ex: johnmercury@gmail.com" value="{{ old('email') }}" required>
                                <x-frontend.input-error field="email"></x-frontend.input-error>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name="password"
                                    placeholder="********" required>
                                <span class="bi bi-eye-slash-fill toggle-password"></span>
                                <x-frontend.input-error field="password"></x-frontend.input-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label for="inputConfirmPassword4" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="inputConfirmPassword4"
                                    name="confirm_password" placeholder="********" required>
                                <span class="bi bi-eye-slash-fill toggle-password"></span>
                                <x-frontend.input-error field="confirm_password"></x-frontend.input-error>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="language" class="form-label">Select Language</label>
                                <select class="form-select country-select" id="language" name="language" required>
                                    <option value="">Select your language</option>
                                    <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English
                                    </option>
                                    <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese
                                    </option>
                                    <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-input">
                        <x-frontend.captcha></x-frontend.captcha>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary btn-block submit-button"
                            style="background-color: #0040c3; color: #fff; border: none; border-radius: 10px; height: 46px;"
                            disabled>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('frontend/js/captcha.js') }}"></script>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");

            if ($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            } else {
                $(this).prev().attr("type", "password");
            }
        });
    </script>
@endpush
