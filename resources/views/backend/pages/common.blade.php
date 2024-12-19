@extends('backend.layouts.app')

@section('title', 'Common')

@section('content')

    <x-backend.breadcrumb page_name="Common"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.common.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Navigation</p>

                <div class="row form-input">
                    <div class="col-4 mb-4">
                        <label for="header_second_tab_{{ $short_code }}" class="form-label">Second Tab</label>
                        <input type="text" class="form-control" id="header_second_tab_{{ $short_code }}" name="header_second_tab_{{ $short_code }}" value="{{ $contents->{'header_second_tab_' . $short_code} ?? '' }}" placeholder="Second Tab">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="header_third_tab_{{ $short_code }}" class="form-label">Third Tab</label>
                        <input type="text" class="form-control" id="header_third_tab_{{ $short_code }}" name="header_third_tab_{{ $short_code }}" value="{{ $contents->{'header_third_tab_' . $short_code} ?? '' }}" placeholder="Third Tab">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="header_fourth_tab_{{ $short_code }}" class="form-label">Fourth Tab</label>
                        <input type="text" class="form-control" id="header_fourth_tab_{{ $short_code }}" name="header_fourth_tab_{{ $short_code }}" value="{{ $contents->{'header_fourth_tab_' . $short_code} ?? '' }}" placeholder="Fourth Tab">
                    </div>

                    <div class="col-4">
                        <label for="header_login_{{ $short_code }}" class="form-label">Login</label>
                        <input type="text" class="form-control" id="header_login_{{ $short_code }}" name="header_login_{{ $short_code }}" value="{{ $contents->{'header_login_' . $short_code} ?? '' }}" placeholder="Login">
                    </div>

                    <div class="col-4">
                        <label for="header_user_dashboard_{{ $short_code }}" class="form-label">User Dashboard</label>
                        <input type="text" class="form-control" id="header_user_dashboard_{{ $short_code }}" name="header_user_dashboard_{{ $short_code }}" value="{{ $contents->{'header_user_dashboard_' . $short_code} ?? '' }}" placeholder="User Dashboard">
                    </div>

                    <div class="col-4">
                        <label for="header_user_logout_{{ $short_code }}" class="form-label">User Logout</label>
                        <input type="text" class="form-control" id="header_user_logout_{{ $short_code }}" name="header_user_logout_{{ $short_code }}" value="{{ $contents->{'header_user_logout_' . $short_code} ?? '' }}" placeholder="User Logout">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Footer</p>

                <div class="row form-input">
                    <div class="col-4 mb-4">
                        <label for="footer_powered_{{ $short_code }}" class="form-label">Powered</label>
                        <input type="text" class="form-control" id="footer_powered_{{ $short_code }}" name="footer_powered_{{ $short_code }}" value="{{ $contents->{'footer_powered_' . $short_code} ?? '' }}" placeholder="Powered">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_get_in_touch_{{ $short_code }}" class="form-label">Get in Touch</label>
                        <input type="text" class="form-control" id="footer_get_in_touch_{{ $short_code }}" name="footer_get_in_touch_{{ $short_code }}" value="{{ $contents->{'footer_get_in_touch_' . $short_code} ?? '' }}" placeholder="Get in Touch">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_instagram_{{ $short_code }}" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="footer_instagram_{{ $short_code }}" name="footer_instagram_{{ $short_code }}" value="{{ $contents->{'footer_instagram_' . $short_code} ?? '' }}" placeholder="Instagram">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_facebook_{{ $short_code }}" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="footer_facebook_{{ $short_code }}" name="footer_facebook_{{ $short_code }}" value="{{ $contents->{'footer_facebook_' . $short_code} ?? '' }}" placeholder="Facebook">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_youtube_{{ $short_code }}" class="form-label">Youtube</label>
                        <input type="text" class="form-control" id="footer_youtube_{{ $short_code }}" name="footer_youtube_{{ $short_code }}" value="{{ $contents->{'footer_youtube_' . $short_code} ?? '' }}" placeholder="Youtube">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_twitter_{{ $short_code }}" class="form-label">Twitter</label>
                        <input type="text" class="form-control" id="footer_twitter_{{ $short_code }}" name="footer_twitter_{{ $short_code }}" value="{{ $contents->{'footer_twitter_' . $short_code} ?? '' }}" placeholder="Twitter">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_linkedin_{{ $short_code }}" class="form-label">Linkedin</label>
                        <input type="text" class="form-control" id="footer_linkedin_{{ $short_code }}" name="footer_linkedin_{{ $short_code }}" value="{{ $contents->{'footer_linkedin_' . $short_code} ?? '' }}" placeholder="Linkedin">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_get_latest_{{ $short_code }}" class="form-label">Get Latest</label>
                        <input type="text" class="form-control" id="footer_get_latest_{{ $short_code }}" name="footer_get_latest_{{ $short_code }}" value="{{ $contents->{'footer_get_latest_' . $short_code} ?? '' }}" placeholder="Get Latest">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_placeholder_{{ $short_code }}" class="form-label">Placeholder</label>
                        <input type="text" class="form-control" id="footer_placeholder_{{ $short_code }}" name="footer_placeholder_{{ $short_code }}" value="{{ $contents->{'footer_placeholder_' . $short_code} ?? '' }}" placeholder="Placeholder">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_button_{{ $short_code }}" class="form-label">Button</label>
                        <input type="text" class="form-control" id="footer_button_{{ $short_code }}" name="footer_button_{{ $short_code }}" value="{{ $contents->{'footer_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_about_{{ $short_code }}" class="form-label">About</label>
                        <input type="text" class="form-control" id="footer_about_{{ $short_code }}" name="footer_about_{{ $short_code }}" value="{{ $contents->{'footer_about_' . $short_code} ?? '' }}" placeholder="About">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_education_{{ $short_code }}" class="form-label">Education</label>
                        <input type="text" class="form-control" id="footer_education_{{ $short_code }}" name="footer_education_{{ $short_code }}" value="{{ $contents->{'footer_education_' . $short_code} ?? '' }}" placeholder="Education">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_partners_{{ $short_code }}" class="form-label">Partners</label>
                        <input type="text" class="form-control" id="footer_partners_{{ $short_code }}" name="footer_partners_{{ $short_code }}" value="{{ $contents->{'footer_partners_' . $short_code} ?? '' }}" placeholder="Partners">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_other_{{ $short_code }}" class="form-label">Other</label>
                        <input type="text" class="form-control" id="footer_other_{{ $short_code }}" name="footer_other_{{ $short_code }}" value="{{ $contents->{'footer_other_' . $short_code} ?? '' }}" placeholder="Other">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="footer_country_{{ $short_code }}" class="form-label">Country</label>
                        <input type="text" class="form-control" id="footer_country_{{ $short_code }}" name="footer_country_{{ $short_code }}" value="{{ $contents->{'footer_country_' . $short_code} ?? '' }}" placeholder="Country">
                    </div>

                    <div class="col-4">
                        <label for="footer_copyright_{{ $short_code }}" class="form-label">Copyright</label>
                        <input type="text" class="form-control" id="footer_copyright_{{ $short_code }}" name="footer_copyright_{{ $short_code }}" value="{{ $contents->{'footer_copyright_' . $short_code} ?? '' }}" placeholder="Copyright">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Captcha</p>

                <div class="row form-input">
                    <div class="col-4">
                        <label for="captcha_title_{{ $short_code }}" class="form-label">Captcha Title</label>
                        <input type="text" class="form-control" id="captcha_title_{{ $short_code }}" name="captcha_title_{{ $short_code }}" value="{{ $contents->{'captcha_title_' . $short_code} ?? '' }}" placeholder="Captcha Title">
                    </div>

                    <div class="col-4">
                        <label for="captcha_button_{{ $short_code }}" class="form-label">Captcha Button</label>
                        <input type="text" class="form-control" id="captcha_button_{{ $short_code }}" name="captcha_button_{{ $short_code }}" value="{{ $contents->{'captcha_button_' . $short_code} ?? '' }}" placeholder="Captcha Button">
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