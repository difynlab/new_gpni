@extends('frontend.layouts.app')

@section('title', 'Profile')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/student-main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row p-5">
            <x-frontend.sidebar :student="$student"></x-frontend.sidebar>

            <div class="col-12 col-md-9 main-content">
                <div class="student-profile-container">
                    <div class="profile-header">
                        <x-frontend.notification></x-frontend.notification>

                        <h1>{{ $student_dashboard_contents->student_profile_title }}</h1>
                        <a class="profile-action edit-profile">
                            <img src="{{ asset('storage/frontend/profile-edit-icon.svg') }}" alt="Edit icon" width="20" height="20">
                            {{ $student_dashboard_contents->student_profile_sub_title }}
                        </a>
                    </div>

                    <form action="{{ route('frontend.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <h5 class="profile-title mb-3">{{ $student_dashboard_contents->student_profile_personal_details }}</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">{{ $student_dashboard_contents->student_profile_personal_first_name }}</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') ?? $student->first_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">{{ $student_dashboard_contents->student_profile_personal_last_name }}</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') ?? $student->last_name }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">{{ $student_dashboard_contents->student_profile_personal_email }}</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ?? $student->email }}" required>
                                        <x-frontend.input-error field="email"></x-frontend.input-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="primaryLanguage">{{ $student_dashboard_contents->student_profile_personal_language }}</label>
                                        <select class="form-control" name="language" disabled readonly>
                                            <option value="{{ $student_dashboard_contents->student_profile_personal_first_language }}" {{ old('language', $student->language) == 'English' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_personal_first_language }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_personal_second_language }}" {{ old('language', $student->language) == 'Japanese' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_personal_second_language }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_personal_third_language }}" {{ old('language', $student->language) == 'Chinese' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_personal_third_language }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">{{ $student_dashboard_contents->student_profile_personal_phone }}</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') ?? $student->phone }}">
                                        <x-frontend.input-error field="phone"></x-frontend.input-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group d-flex">
                                        <input type="checkbox" id="newsletter" class="styled-checkbox" checked>
                                        <p for="newsletter" class="ms-2 mb-0 styled-label">{{ $student_dashboard_contents->student_profile_personal_subscribe }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="section">
                            <h5 class="profile-title mb-3">{{ $student_dashboard_contents->student_profile_primary_details }}</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_name">{{ $student_dashboard_contents->student_profile_primary_name }}</label>
                                        <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old('business_name') ?? $student->business_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_address">{{ $student_dashboard_contents->student_profile_primary_address }}</label>
                                        <input type="text" class="form-control" id="business_address" name="business_address" value="{{ old('business_address') ?? $student->business_address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unit_suite">{{ $student_dashboard_contents->student_profile_primary_unit_suite }}</label>
                                        <input type="text" class="form-control" id="unit_suite" name="unit_suite" value="{{ old('unit_suite') ?? $student->unit_suite }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">{{ $student_dashboard_contents->student_profile_primary_city }}</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') ?? $student->city }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">{{ $student_dashboard_contents->student_profile_primary_country }}</label>
                                        <select class="form-control" id="country" name="country" required>
                                            @foreach($countries as $country)
                                                <option value="{{ $country }}" {{ old('country', $student->country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state_province">{{ $student_dashboard_contents->student_profile_primary_state_province }}</label>
                                        <input type="text" class="form-control" id="state_province" name="state_province" value="{{ old('state_province') ?? $student->state_province }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zip_postal">{{ $student_dashboard_contents->student_profile_primary_zip_postal }}</label>
                                        <input type="text" class="form-control" id="zip_postal" name="zip_postal" value="{{ old('zip_postal') ?? $student->zip_postal }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_number">{{ $student_dashboard_contents->student_profile_primary_contact_number }}</label>
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number') ?? $student->contact_number }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fax">{{ $student_dashboard_contents->student_profile_primary_fax }}</label>
                                        <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax') ?? $student->fax }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_email">{{ $student_dashboard_contents->student_profile_primary_email }}</label>
                                        <input type="email" class="form-control" id="business_email" name="business_email" value="{{ old('business_email') ?? $student->business_email }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_secondary_email">{{ $student_dashboard_contents->student_profile_primary_secondary_email }}</label>
                                        <input type="email" class="form-control" id="business_secondary_email" name="business_secondary_email" value="{{ old('business_secondary_email') ?? $student->business_secondary_email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">{{ $student_dashboard_contents->student_profile_primary_website }}</label>
                                        <input type="url" class="form-control" id="website" name="website" value="{{ old('website') ??  $student->website }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="section">
                            <h5 class="profile-title mb-3">{{ $student_dashboard_contents->student_profile_member_stats }}</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="age">{{ $student_dashboard_contents->student_profile_member_age }}</label>
                                        <select class="form-control" id="age" name="age">
                                            <option value="">{{ $student_dashboard_contents->student_profile_member_select_age }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_first_age }}" {{ old('age', $student->age) == '29 or younger' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_first_age }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_second_age }}" {{ old('age', $student->age) == '30-39' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_second_age }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_third_age }}" {{ old('age', $student->age) == '40-49' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_third_age }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_fourth_age }}" {{ old('age', $student->age) == '50-59' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_fourth_age }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_fifth_age }}" {{ old('age', $student->age) == '60 plus' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_fifth_age }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="area_of_interest">{{ $student_dashboard_contents->student_profile_member_area }}</label>
                                        <select class="form-control" id="area_of_interest" name="area_of_interest">
                                            <option value="">{{ $student_dashboard_contents->student_profile_member_select_area }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_first_area }}" {{ old('area_of_interest', $student->area_of_interest) == 'Basic and Applied Sciences' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_first_area }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_second_area }}" {{ old('area_of_interest', $student->area_of_interest) == 'Medicine' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_second_area }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_third_area }}" {{ old('area_of_interest', $student->area_of_interest) == 'Dietetics' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_third_area }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_fourth_area }}" {{ old('area_of_interest', $student->area_of_interest) == 'Research and Development' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_fourth_area }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_fifth_area }}" {{ old('area_of_interest', $student->area_of_interest) == 'Health/ Fitness' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_fifth_area }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_sixth_area }}" {{ old('area_of_interest', $student->area_of_interest) == 'Other' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_sixth_area }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="occupation">{{ $student_dashboard_contents->student_profile_member_occupation }}</label>
                                        <select class="form-control" id="occupation" name="occupation">
                                            <option value="">{{ $student_dashboard_contents->student_profile_member_select_occupation }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_first_occupation }}" {{ old('occupation', $student->occupation) == 'Registered Dietitian/ Sport Dietitian' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_first_occupation }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_second_occupation }}" {{ old('occupation', $student->occupation) == 'Academic Professor/ Researcher' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_second_occupation }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_third_occupation }}" {{ old('occupation', $student->occupation) == 'Industry Product Development/ Sales' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_third_occupation }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_fourth_occupation }}" {{ old('occupation', $student->occupation) == 'Personal Trainer/ Nutritionist' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_fourth_occupation }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_fifth_occupation }}" {{ old('occupation', $student->occupation) == 'Private Researcher' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_fifth_occupation }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_sixth_occupation }}" {{ old('occupation', $student->occupation) == 'Other' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_sixth_occupation }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="messenger_app">{{ $student_dashboard_contents->student_profile_member_messenger }}</label>
                                        <select class="form-control" id="messenger_app" name="messenger_app">
                                            <option value="">{{ $student_dashboard_contents->student_profile_member_select_messenger }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_first_messenger }}" {{ old('messenger_app', $student->messenger_app) == 'Skype' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_first_messenger }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_second_messenger }}" {{ old('messenger_app', $student->messenger_app) == 'WeChat' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_second_messenger }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_third_messenger }}" {{ old('messenger_app', $student->messenger_app) == 'WhatsApp' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_third_messenger }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="messenger_app_id">{{ $student_dashboard_contents->student_profile_member_messenger_app }}</label>
                                    <input type="text" class="form-control" id="messenger_app_id" name="messenger_app_id" value="{{ old('messenger_app_id') ?? $student->messenger_app_id }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ad_platform">{{ $student_dashboard_contents->student_profile_member_hear }}</label>
                                        <select class="form-control" id="ad_platform" name="ad_platform">
                                            <option value="">{{ $student_dashboard_contents->student_profile_member_select_hear }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_first_hear }}" {{ old('ad_platform', $student->ad_platform) == 'Google' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_first_hear }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_second_hear }}" {{ old('ad_platform', $student->ad_platform) == 'Friend' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_second_hear }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_third_hear }}" {{ old('ad_platform', $student->ad_platform) == 'Social Media' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_third_hear }}</option>
                                            <option value="{{ $student_dashboard_contents->student_profile_member_fourth_hear }}" {{ old('ad_platform', $student->ad_platform) == 'Other' ? 'selected' : '' }}>{{ $student_dashboard_contents->student_profile_member_fourth_hear }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="section mb-4">
                            <div class="col-md-12 mb-4">
                                <h5 class="profile-title mb-3">{{ $student_dashboard_contents->student_profile_self }}</h5>

                                <textarea class="form-control" rows="5" name="self_introduction" placeholder="{{ $student_dashboard_contents->student_profile_self_placeholder }}" style="height: initial;"></textarea>
                            </div>
                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    @if($student->image)
                                        <img src="{{ asset('storage/backend/persons/students/' . $student->image) }}" alt="Profile image" style="width: 100%; height: 400px; object-fit: contain;">
                                    @else
                                        <img src="{{ asset('storage/frontend/sample-profile-image.svg') }}" alt="Profile image" style="width: 100%; height: 400px; object-fit: contain;">
                                    @endif

                                    <input type="hidden" name="old_image" value="{{ $student->image }}">

                                    <div class="mt-2">
                                        <label class="form-label">{{ $student_dashboard_contents->student_profile_image }}</label>
                                        <input type="file" class="form-control new-image" name="new_image" accept="image/*">
                                        <x-frontend.input-error field="new_image"></x-frontend.input-error>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="save-button">{{ $student_dashboard_contents->student_profile_button }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection