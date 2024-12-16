@extends('backend.layouts.app')

@section('title', 'Nutritionist')

@section('content')

    <x-backend.breadcrumb page_name="Nutritionist"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.nutritionist.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section <span>(Introduction)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title_{{ $short_code }}" name="title_{{ $short_code }}" value="{{ $contents->{'title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="sub_title_{{ $short_code }}" class="form-label">Sub Title</label>
                            <input type="text" class="form-control" id="sub_title_{{ $short_code }}" name="sub_title_{{ $short_code }}" value="{{ $contents->{'sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Common Words</p>

                <div class="row form-input">
                    <div class="col-4 mb-4">
                        <label for="search_{{ $short_code }}" class="form-label">Search</label>
                        <input type="text" class="form-control" id="search_{{ $short_code }}" name="search_{{ $short_code }}" value="{{ $contents->{'search_' . $short_code} ?? '' }}" placeholder="Search">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="contact_coach_{{ $short_code }}" class="form-label">Contact Coach</label>
                        <input type="text" class="form-control" id="contact_coach_{{ $short_code }}" name="contact_coach_{{ $short_code }}" value="{{ $contents->{'contact_coach_' . $short_code} ?? '' }}" placeholder="Contact Coach">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="qualified_coach_{{ $short_code }}" class="form-label">Qualified Coach</label>
                        <input type="text" class="form-control" id="qualified_coach_{{ $short_code }}" name="qualified_coach_{{ $short_code }}" value="{{ $contents->{'qualified_coach_' . $short_code} ?? '' }}" placeholder="Qualified Coach">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="age_{{ $short_code }}" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age_{{ $short_code }}" name="age_{{ $short_code }}" value="{{ $contents->{'age_' . $short_code} ?? '' }}" placeholder="Age">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="credentials_{{ $short_code }}" class="form-label">Credentials</label>
                        <input type="text" class="form-control" id="credentials_{{ $short_code }}" name="credentials_{{ $short_code }}" value="{{ $contents->{'credentials_' . $short_code} ?? '' }}" placeholder="Credentials">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="cec_status_{{ $short_code }}" class="form-label">CEC Status</label>
                        <input type="text" class="form-control" id="cec_status_{{ $short_code }}" name="cec_status_{{ $short_code }}" value="{{ $contents->{'cec_status_' . $short_code} ?? '' }}" placeholder="CEC Status">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="active_{{ $short_code }}" class="form-label">Active</label>
                        <input type="text" class="form-control" id="active_{{ $short_code }}" name="active_{{ $short_code }}" value="{{ $contents->{'active_' . $short_code} ?? '' }}" placeholder="Active">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="inactive_{{ $short_code }}" class="form-label">Inactive</label>
                        <input type="text" class="form-control" id="inactive_{{ $short_code }}" name="inactive_{{ $short_code }}" value="{{ $contents->{'inactive_' . $short_code} ?? '' }}" placeholder="Inactive">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="view_profile_{{ $short_code }}" class="form-label">View Profile</label>
                        <input type="text" class="form-control" id="view_profile_{{ $short_code }}" name="view_profile_{{ $short_code }}" value="{{ $contents->{'view_profile_' . $short_code} ?? '' }}" placeholder="View Profile">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="country_{{ $short_code }}" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country_{{ $short_code }}" name="country_{{ $short_code }}" value="{{ $contents->{'country_' . $short_code} ?? '' }}" placeholder="Country">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="choose_country_{{ $short_code }}" class="form-label">Choose Country</label>
                        <input type="text" class="form-control" id="choose_country_{{ $short_code }}" name="choose_country_{{ $short_code }}" value="{{ $contents->{'choose_country_' . $short_code} ?? '' }}" placeholder="Choose Country">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="city_{{ $short_code }}" class="form-label">City</label>
                        <input type="text" class="form-control" id="city_{{ $short_code }}" name="city_{{ $short_code }}" value="{{ $contents->{'city_' . $short_code} ?? '' }}" placeholder="City">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="phone_{{ $short_code }}" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone_{{ $short_code }}" name="phone_{{ $short_code }}" value="{{ $contents->{'phone_' . $short_code} ?? '' }}" placeholder="Phone">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="email_{{ $short_code }}" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email_{{ $short_code }}" name="email_{{ $short_code }}" value="{{ $contents->{'email_' . $short_code} ?? '' }}" placeholder="Email">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="app_chat_{{ $short_code }}" class="form-label">App Chat</label>
                        <input type="text" class="form-control" id="app_chat_{{ $short_code }}" name="app_chat_{{ $short_code }}" value="{{ $contents->{'app_chat_' . $short_code} ?? '' }}" placeholder="App Chat">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="choose_app_chat_{{ $short_code }}" class="form-label">Choose App Chat</label>
                        <input type="text" class="form-control" id="choose_app_chat_{{ $short_code }}" name="choose_app_chat_{{ $short_code }}" value="{{ $contents->{'choose_app_chat_' . $short_code} ?? '' }}" placeholder="Choose App Chat">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="app_chat_first_{{ $short_code }}" class="form-label">App Chat First</label>
                        <input type="text" class="form-control" id="app_chat_first_{{ $short_code }}" name="app_chat_first_{{ $short_code }}" value="{{ $contents->{'app_chat_first_' . $short_code} ?? '' }}" placeholder="App Chat First">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="app_chat_second_{{ $short_code }}" class="form-label">App Chat Second</label>
                        <input type="text" class="form-control" id="app_chat_second_{{ $short_code }}" name="app_chat_second_{{ $short_code }}" value="{{ $contents->{'app_chat_second_' . $short_code} ?? '' }}" placeholder="App Chat Second">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="app_chat_third_{{ $short_code }}" class="form-label">App Chat Third</label>
                        <input type="text" class="form-control" id="app_chat_third_{{ $short_code }}" name="app_chat_third_{{ $short_code }}" value="{{ $contents->{'app_chat_third_' . $short_code} ?? '' }}" placeholder="App Chat Third">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="app_chat_fourth_{{ $short_code }}" class="form-label">App Chat Fourth</label>
                        <input type="text" class="form-control" id="app_chat_fourth_{{ $short_code }}" name="app_chat_fourth_{{ $short_code }}" value="{{ $contents->{'app_chat_fourth_' . $short_code} ?? '' }}" placeholder="App Chat Fourth">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="app_chat_id_{{ $short_code }}" class="form-label">App Chat ID</label>
                        <input type="text" class="form-control" id="app_chat_id_{{ $short_code }}" name="app_chat_id_{{ $short_code }}" value="{{ $contents->{'app_chat_id_' . $short_code} ?? '' }}" placeholder="App Chat ID">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="button_{{ $short_code }}" class="form-label">Button</label>
                        <input type="text" class="form-control" id="button_{{ $short_code }}" name="button_{{ $short_code }}" value="{{ $contents->{'button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="coach_name_{{ $short_code }}" class="form-label">Coach Name</label>
                        <input type="text" class="form-control" id="coach_name_{{ $short_code }}" name="coach_name_{{ $short_code }}" value="{{ $contents->{'coach_name_' . $short_code} ?? '' }}" placeholder="Coach Name">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="certificate_number_{{ $short_code }}" class="form-label">Certificate Number</label>
                        <input type="text" class="form-control" id="certificate_number_{{ $short_code }}" name="certificate_number_{{ $short_code }}" value="{{ $contents->{'certificate_number_' . $short_code} ?? '' }}" placeholder="Certificate Number">
                    </div>
                    <div class="col-4">
                        <label for="membership_credential_status_{{ $short_code }}" class="form-label">Membership/ Credential Status</label>
                        <input type="text" class="form-control" id="membership_credential_status_{{ $short_code }}" name="membership_credential_status_{{ $short_code }}" value="{{ $contents->{'membership_credential_status_' . $short_code} ?? '' }}" placeholder="Membership Credential Status">
                    </div>
                    <div class="col-4">
                        <label for="area_of_interest_{{ $short_code }}" class="form-label">Area of Interest</label>
                        <input type="text" class="form-control" id="area_of_interest_{{ $short_code }}" name="area_of_interest_{{ $short_code }}" value="{{ $contents->{'area_of_interest_' . $short_code} ?? '' }}" placeholder="Area of Interest">
                    </div>
                    <div class="col-4">
                        <label for="self_introduction_{{ $short_code }}" class="form-label">Self Introduction</label>
                        <input type="text" class="form-control" id="self_introduction_{{ $short_code }}" name="self_introduction_{{ $short_code }}" value="{{ $contents->{'self_introduction_' . $short_code} ?? '' }}" placeholder="Self Introduction">
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