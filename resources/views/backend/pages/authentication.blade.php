@extends('backend.layouts.app')

@section('title', 'Authentication')

@section('content')

    <x-backend.breadcrumb page_name="Authentication"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.authentication.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-3">
                        <label for="login_page_name_{{ $short_code }}" class="form-label">Login Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="login_page_name_{{ $short_code }}" name="login_page_name_{{ $short_code }}" value="{{ $contents->{'login_page_name_' . $short_code} ?? '' }}" placeholder="Login Page Name" required>
                    </div>

                    <div class="col-6 mb-3">
                        <label for="register_page_name_{{ $short_code }}" class="form-label">Register Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="register_page_name_{{ $short_code }}" name="register_page_name_{{ $short_code }}" value="{{ $contents->{'register_page_name_' . $short_code} ?? '' }}" placeholder="Register Page Name" required>
                    </div>

                    <div class="col-6">
                        <label for="forgot_page_name_{{ $short_code }}" class="form-label">Forgot Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="forgot_page_name_{{ $short_code }}" name="forgot_page_name_{{ $short_code }}" value="{{ $contents->{'forgot_page_name_' . $short_code} ?? '' }}" placeholder="Forgot Page Name" required>
                    </div>

                    <div class="col-6">
                        <label for="reset_page_name_{{ $short_code }}" class="form-label">Reset Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="reset_page_name_{{ $short_code }}" name="reset_page_name_{{ $short_code }}" value="{{ $contents->{'reset_page_name_' . $short_code} ?? '' }}" placeholder="Reset Page Name" required>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Login</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="login_page_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="login_page_title_{{ $short_code }}" name="login_page_title_{{ $short_code }}" value="{{ $contents->{'login_page_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="login_page_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="login_page_sub_title_{{ $short_code }}" name="login_page_sub_title_{{ $short_code }}" value="{{ $contents->{'login_page_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="login_page_username_{{ $short_code }}" class="form-label">Username</label>
                        <input type="text" class="form-control" id="login_page_username_{{ $short_code }}" name="login_page_username_{{ $short_code }}" value="{{ $contents->{'login_page_username_' . $short_code} ?? '' }}" placeholder="Username">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="login_page_password_{{ $short_code }}" class="form-label">Password</label>
                        <input type="text" class="form-control" id="login_page_password_{{ $short_code }}" name="login_page_password_{{ $short_code }}" value="{{ $contents->{'login_page_password_' . $short_code} ?? '' }}" placeholder="Password">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="login_page_remember_password_{{ $short_code }}" class="form-label">Remember Password</label>
                        <input type="text" class="form-control" id="login_page_remember_password_{{ $short_code }}" name="login_page_remember_password_{{ $short_code }}" value="{{ $contents->{'login_page_remember_password_' . $short_code} ?? '' }}" placeholder="Remember Password">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="login_page_forgot_password_{{ $short_code }}" class="form-label">Forgot Password</label>
                        <input type="text" class="form-control" id="login_page_forgot_password_{{ $short_code }}" name="login_page_forgot_password_{{ $short_code }}" value="{{ $contents->{'login_page_forgot_password_' . $short_code} ?? '' }}" placeholder="Forgot Password">
                    </div>

                    <div class="col-4">
                        <label for="login_page_button_{{ $short_code }}" class="form-label">Button</label>
                        <input type="text" class="form-control" id="login_page_button_{{ $short_code }}" name="login_page_button_{{ $short_code }}" value="{{ $contents->{'login_page_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-4">
                        <label for="login_page_no_account_{{ $short_code }}" class="form-label">No Account</label>
                        <input type="text" class="form-control" id="login_page_no_account_{{ $short_code }}" name="login_page_no_account_{{ $short_code }}" value="{{ $contents->{'login_page_no_account_' . $short_code} ?? '' }}" placeholder="No Account">
                    </div>

                    <div class="col-4">
                        <label for="login_page_register_{{ $short_code }}" class="form-label">Register</label>
                        <input type="text" class="form-control" id="login_page_register_{{ $short_code }}" name="login_page_register_{{ $short_code }}" value="{{ $contents->{'login_page_register_' . $short_code} ?? '' }}" placeholder="Register">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Register</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="register_page_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="register_page_title_{{ $short_code }}" name="register_page_title_{{ $short_code }}" value="{{ $contents->{'register_page_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="register_page_sub_title_{{ $short_code }}" name="register_page_sub_title_{{ $short_code }}" value="{{ $contents->{'register_page_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_login_{{ $short_code }}" class="form-label">Login</label>
                        <input type="text" class="form-control" id="register_page_login_{{ $short_code }}" name="register_page_login_{{ $short_code }}" value="{{ $contents->{'register_page_login_' . $short_code} ?? '' }}" placeholder="Login">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_first_name_{{ $short_code }}" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="register_page_first_name_{{ $short_code }}" name="register_page_first_name_{{ $short_code }}" value="{{ $contents->{'register_page_first_name_' . $short_code} ?? '' }}" placeholder="First Name">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_last_name_{{ $short_code }}" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="register_page_last_name_{{ $short_code }}" name="register_page_last_name_{{ $short_code }}" value="{{ $contents->{'register_page_last_name_' . $short_code} ?? '' }}" placeholder="Last Name">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_country_{{ $short_code }}" class="form-label">Country</label>
                        <input type="text" class="form-control" id="register_page_country_{{ $short_code }}" name="register_page_country_{{ $short_code }}" value="{{ $contents->{'register_page_country_' . $short_code} ?? '' }}" placeholder="Country">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_country_select_{{ $short_code }}" class="form-label">Select Country</label>
                        <input type="text" class="form-control" id="register_page_country_{{ $short_code }}" name="register_page_country_select_{{ $short_code }}" value="{{ $contents->{'register_page_country_select_' . $short_code} ?? '' }}" placeholder="Select Country">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_email_{{ $short_code }}" class="form-label">Email</label>
                        <input type="text" class="form-control" id="register_page_email_{{ $short_code }}" name="register_page_email_{{ $short_code }}" value="{{ $contents->{'register_page_email_' . $short_code} ?? '' }}" placeholder="Email">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_password_{{ $short_code }}" class="form-label">Password</label>
                        <input type="text" class="form-control" id="register_page_password_{{ $short_code }}" name="register_page_password_{{ $short_code }}" value="{{ $contents->{'register_page_password_' . $short_code} ?? '' }}" placeholder="Password">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_confirm_password_{{ $short_code }}" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" id="register_page_confirm_password_{{ $short_code }}" name="register_page_confirm_password_{{ $short_code }}" value="{{ $contents->{'register_page_confirm_password_' . $short_code} ?? '' }}" placeholder="Confirm Password">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_language_{{ $short_code }}" class="form-label">Language</label>
                        <input type="text" class="form-control" id="register_page_language_{{ $short_code }}" name="register_page_language_{{ $short_code }}" value="{{ $contents->{'register_page_language_' . $short_code} ?? '' }}" placeholder="Language">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_language_select_{{ $short_code }}" class="form-label">Select Language</label>
                        <input type="text" class="form-control" id="register_page_language_{{ $short_code }}" name="register_page_language_select_{{ $short_code }}" value="{{ $contents->{'register_page_language_select_' . $short_code} ?? '' }}" placeholder="Select Language">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="register_page_first_language_{{ $short_code }}" class="form-label">First Language</label>
                        <input type="text" class="form-control" id="register_page_first_language_{{ $short_code }}" name="register_page_first_language_{{ $short_code }}" value="{{ $contents->{'register_page_first_language_' . $short_code} ?? '' }}" placeholder="First Language">
                    </div>

                    <div class="col-4">
                        <label for="register_page_second_language_{{ $short_code }}" class="form-label">Second Language</label>
                        <input type="text" class="form-control" id="register_page_second_language_{{ $short_code }}" name="register_page_second_language_{{ $short_code }}" value="{{ $contents->{'register_page_second_language_' . $short_code} ?? '' }}" placeholder="Second Language">
                    </div>

                    <div class="col-4">
                        <label for="register_page_third_language_{{ $short_code }}" class="form-label">Third Language</label>
                        <input type="text" class="form-control" id="register_page_third_language_{{ $short_code }}" name="register_page_third_language_{{ $short_code }}" value="{{ $contents->{'register_page_third_language_' . $short_code} ?? '' }}" placeholder="Third Language">
                    </div>

                    <div class="col-4">
                        <label for="register_page_button_{{ $short_code }}" class="form-label">button</label>
                        <input type="text" class="form-control" id="register_page_button_{{ $short_code }}" name="register_page_button_{{ $short_code }}" value="{{ $contents->{'register_page_button_' . $short_code} ?? '' }}" placeholder="button">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Forgot Password</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="forgot_page_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="forgot_page_title_{{ $short_code }}" name="forgot_page_title_{{ $short_code }}" value="{{ $contents->{'forgot_page_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="forgot_page_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="forgot_page_sub_title_{{ $short_code }}" name="forgot_page_sub_title_{{ $short_code }}" value="{{ $contents->{'forgot_page_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                    </div>

                    <div class="col-4">
                        <label for="forgot_page_email_{{ $short_code }}" class="form-label">Email</label>
                        <input type="text" class="form-control" id="forgot_page_email_{{ $short_code }}" name="forgot_page_email_{{ $short_code }}" value="{{ $contents->{'forgot_page_email_' . $short_code} ?? '' }}" placeholder="Email">
                    </div>

                    <div class="col-4">
                        <label for="forgot_page_button_{{ $short_code }}" class="form-label">Button</label>
                        <input type="text" class="form-control" id="forgot_page_button_{{ $short_code }}" name="forgot_page_button_{{ $short_code }}" value="{{ $contents->{'forgot_page_button_' . $short_code} ?? '' }}" placeholder="Submit Button">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Reset Password</p>

                <div class="row form-input">
                    <div class="col-4 mb-3">
                        <label for="reset_page_title_{{ $short_code }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="reset_page_title_{{ $short_code }}" name="reset_page_title_{{ $short_code }}" value="{{ $contents->{'reset_page_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="reset_page_sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="reset_page_sub_title_{{ $short_code }}" name="reset_page_sub_title_{{ $short_code }}" value="{{ $contents->{'reset_page_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                    </div>

                    <div class="col-4 mb-3">
                        <label for="reset_page_new_password_{{ $short_code }}" class="form-label">New Password</label>
                        <input type="text" class="form-control" id="reset_page_new_password_{{ $short_code }}" name="reset_page_new_password_{{ $short_code }}" value="{{ $contents->{'reset_page_new_password_' . $short_code} ?? '' }}" placeholder="New Password">
                    </div>

                    <div class="col-4">
                        <label for="reset_page_confirm_password_{{ $short_code }}" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" id="reset_page_confirm_password_{{ $short_code }}" name="reset_page_confirm_password_{{ $short_code }}" value="{{ $contents->{'reset_page_confirm_password_' . $short_code} ?? '' }}" placeholder="Confirm Password">
                    </div>

                    <div class="col-4">
                        <label for="reset_page_button_{{ $short_code }}" class="form-label">Button</label>
                        <input type="text" class="form-control" id="reset_page_button_{{ $short_code }}" name="reset_page_button_{{ $short_code }}" value="{{ $contents->{'reset_page_button_' . $short_code} ?? '' }}" placeholder="Reset Button">
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save the updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection