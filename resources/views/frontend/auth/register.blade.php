@extends('frontend.layouts.app')

@section('title', $contents->{'page_name_' . $middleware_language} !== '' 
    ? $contents->{'login_page_name_' . $middleware_language} 
    : $contents->login_page_name_en)

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/captcha.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/auth.css') }}">
@endpush

@section('content')

    <div class="container custom-container my-lg-5 mb-4 my-0">
        <div class="row flex-grow-1 d-flex align-items-center">

            <x-frontend.auth></x-frontend.auth>

            <div class="col-lg-8 white-section d-flex justify-content-center">
                <div class="form-container">
                    <h1 class="fs-39 text-center pt-4">{{ $contents->{'register_page_title_' . $middleware_language} ?? $contents->register_page_title_en }}</h1>
                    <p class="subheading fs-16 text-center">{{ $contents->{'register_page_sub_title_' . $middleware_language} ?? $contents->register_page_sub_title_en }}
                        <a href="{{ route('frontend.login') }}" class="text-primary">{{ $contents->{'register_page_login_' . $middleware_language} ?? $contents->register_page_login_en }}</a>
                    </p>

                    <form method="POST" action="{{ route('frontend.register.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName" class="form-label">{{ $contents->{'register_page_first_name_' . $middleware_language} ?? $contents->register_page_first_name_en }}</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name"value="{{ old('first_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName" class="form-label">{{ $contents->{'register_page_last_name_' . $middleware_language} ?? $contents->register_page_last_name_en }}</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name"
                                        placeholder="Enter your last name" value="{{ old('last_name') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country" class="form-label">{{ $contents->{'register_page_country_' . $middleware_language} ?? $contents->register_page_country_en }}</label>
                                    <select class="form-control country-select" id="country" name="country" required>
                                        <option value="">{{ $contents->{'register_page_country_select_' . $middleware_language} ?? $contents->register_page_country_select_en }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country }}"
                                                {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail4" class="form-label">{{ $contents->{'register_page_email_' . $middleware_language} ?? $contents->register_page_email_en }}</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ old('email') }}" required>
                                    <x-frontend.input-error field="email"></x-frontend.input-error>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label for="inputPassword4" class="form-label">{{ $contents->{'register_page_password_' . $middleware_language} ?? $contents->register_page_password_en }}</label>
                                    <input type="password" class="form-control" id="inputPassword4" name="password" required>
                                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                                    <x-frontend.input-error field="password"></x-frontend.input-error>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label for="inputConfirmPassword4" class="form-label">{{ $contents->{'register_page_confirm_password_' . $middleware_language} ?? $contents->register_page_confirm_password_en }}</label>
                                    <input type="password" class="form-control" id="inputConfirmPassword4" name="confirm_password" required>
                                    <span class="bi bi-eye-slash-fill toggle-password"></span>
                                    <x-frontend.input-error field="confirm_password"></x-frontend.input-error>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="language" class="form-label">{{ $contents->{'register_page_language_' . $middleware_language} ?? $contents->register_page_language_en }}</label>
                                    <select class="form-select country-select" id="language" name="language" required>
                                        <option value="">{{ $contents->{'register_page_language_select_' . $middleware_language} ?? $contents->register_page_language_select_en }}</option>
                                        <option value="{{ $contents->{'register_page_first_language_' . $middleware_language} ?? $contents->register_page_first_language_en }}" {{ old('language') == ($contents->{'register_page_first_language_' . $middleware_language} ?? $contents->register_page_first_language_en) ? 'selected' : '' }}>{{ $contents->{'register_page_first_language_' . $middleware_language} ?? $contents->register_page_first_language_en }}
                                        </option>
                                        <option value="{{ $contents->{'register_page_second_language_' . $middleware_language} ?? $contents->register_page_second_language_en }}" {{ old('language') == ($contents->{'register_page_second_language_' . $middleware_language} ?? $contents->register_page_second_language_en) ? 'selected' : '' }}>{{ $contents->{'register_page_second_language_' . $middleware_language} ?? $contents->register_page_second_language_en }}
                                        </option>
                                        <option value="{{ $contents->{'register_page_third_language_' . $middleware_language} ?? $contents->register_page_third_language_en }}" {{ old('language') == ($contents->{'register_page_third_language_' . $middleware_language} ?? $contents->register_page_third_language_en) ? 'selected' : '' }}>{{ $contents->{'register_page_third_language_' . $middleware_language} ?? $contents->register_page_third_language_en }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-input">
                            <x-frontend.captcha></x-frontend.captcha>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-block submit-button" style="background-color: #0040c3; color: #fff; border: none; border-radius: 10px; height: 46px;" disabled>{{ $contents->{'register_page_button_' . $middleware_language} ?? $contents->register_page_button_en }}</button>
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