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

                        <h1>Student Profile</h1>
                        <a class="profile-action edit-profile">
                            <img src="{{ asset('storage/frontend/profile-edit-icon.svg') }}" alt="Edit icon" width="20" height="20">
                            Edit profile details
                        </a>
                    </div>

                    <form action="{{ route('frontend.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <h5 class="profile-title mb-3">Personal Details</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') ?? $student->first_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') ?? $student->last_name }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ?? $student->email }}" required>
                                        <x-frontend.input-error field="email"></x-frontend.input-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="primaryLanguage">Primary Language</label>
                                        <select class="form-control" name="language" required>
                                            <option value="English" {{ old('language', $student->language) == 'English' ? 'selected' : '' }}>English</option>
                                            <option value="Japanese" {{ old('language', $student->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                                            <option value="Chinese" {{ old('language', $student->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') ?? $student->phone }}" placeholder="Phone">
                                        <x-frontend.input-error field="phone"></x-frontend.input-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group d-flex">
                                        <input type="checkbox" id="newsletter" class="styled-checkbox" checked>
                                        <p for="newsletter" class="ms-2 mb-0 styled-label">Subscribed to Member newsletter</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="section">
                            <h5 class="profile-title mb-3">Primary Practice</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_name">Business Name</label>
                                        <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old('business_name') ?? $student->business_name }}" placeholder="Business Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_address">Business Address</label>
                                        <input type="text" class="form-control" id="business_address" name="business_address" value="{{ old('business_address') ?? $student->business_address }}" placeholder="Business Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unit_suite">Unit/ Suite</label>
                                        <input type="text" class="form-control" id="unit_suite" name="unit_suite" value="{{ old('unit_suite') ?? $student->unit_suite }}" placeholder="Unit/ Suite">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') ?? $student->city }}" placeholder="City">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control" id="country" name="country" required>
                                            @foreach($countries as $country)
                                                <option value="{{ $country }}" {{ old('country', $student->country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state_province">State/ Province</label>
                                        <input type="text" class="form-control" id="state_province" name="state_province" value="{{ old('state_province') ?? $student->state_province }}" placeholder="State/ Province">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zip_postal">ZIP/ Postal Code</label>
                                        <input type="text" class="form-control" id="zip_postal" name="zip_postal" value="{{ old('zip_postal') ?? $student->zip_postal }}" placeholder="ZIP/ Postal Code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_number">Contact Number</label>
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number') ?? $student->contact_number }}" placeholder="Contact Number">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fax">Fax</label>
                                        <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax') ?? $student->fax }}" placeholder="Fax">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_email">Email</label>
                                        <input type="email" class="form-control" id="business_email" name="business_email" value="{{ old('business_email') ?? $student->business_email }}" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_secondary_email">Secondary Email</label>
                                        <input type="email" class="form-control" id="business_secondary_email" name="business_secondary_email" value="{{ old('business_secondary_email') ?? $student->business_secondary_email }}" placeholder="Secondary Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" id="website" name="website" value="{{ old('website') ??  $student->website }}" placeholder="Website">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="section">
                            <h5 class="profile-title mb-3">Member Stats</h5>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <select class="form-control" id="age" name="age">
                                            <option value="">Select age</option>
                                            <option value="29 or younger" {{ old('age', $student->age) == '29 or younger' ? 'selected' : '' }}>29 or younger</option>
                                            <option value="30-39" {{ old('age', $student->age) == '30-39' ? 'selected' : '' }}>30-39</option>
                                            <option value="40-49" {{ old('age', $student->age) == '40-49' ? 'selected' : '' }}>40-49</option>
                                            <option value="50-59" {{ old('age', $student->age) == '50-59' ? 'selected' : '' }}>50-59</option>
                                            <option value="60 plus" {{ old('age', $student->age) == '60 plus' ? 'selected' : '' }}>60 plus</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="area_of_interest">Area Of Interest</label>
                                        <select class="form-control" id="area_of_interest" name="area_of_interest">
                                            <option value="">Select area of interest</option>
                                            <option value="Basic and Applied Sciences" {{ old('area_of_interest', $student->area_of_interest) == 'Basic and Applied Sciences' ? 'selected' : '' }}>Basic and Applied Sciences</option>
                                            <option value="Medicine" {{ old('area_of_interest', $student->area_of_interest) == 'Medicine' ? 'selected' : '' }}>Medicine</option>
                                            <option value="Dietetics" {{ old('area_of_interest', $student->area_of_interest) == 'Dietetics' ? 'selected' : '' }}>Dietetics</option>
                                            <option value="Research and Development" {{ old('area_of_interest', $student->area_of_interest) == 'Research and Development' ? 'selected' : '' }}>Research and Development</option>
                                            <option value="Health/ Fitness" {{ old('area_of_interest', $student->area_of_interest) == 'Health/ Fitness' ? 'selected' : '' }}>Health/ Fitness</option>
                                            <option value="Other" {{ old('area_of_interest', $student->area_of_interest) == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="occupation">Occupation</label>
                                        <select class="form-control" id="occupation" name="occupation">
                                            <option value="">Select occupation</option>
                                            <option value="Registered Dietitian/ Sport Dietitian" {{ old('occupation', $student->occupation) == 'Registered Dietitian/ Sport Dietitian' ? 'selected' : '' }}>Registered Dietitian/ Sport Dietitian</option>
                                            <option value="Academic Professor/ Researcher" {{ old('occupation', $student->occupation) == 'Academic Professor/ Researcher' ? 'selected' : '' }}>Academic Professor/ Researcher</option>
                                            <option value="Industry Product Development/ Sales" {{ old('occupation', $student->occupation) == 'Industry Product Development/ Sales' ? 'selected' : '' }}>Industry Product Development/ Sales</option>
                                            <option value="Personal Trainer/ Nutritionist" {{ old('occupation', $student->occupation) == 'Personal Trainer/ Nutritionist' ? 'selected' : '' }}>Personal Trainer/ Nutritionist</option>
                                            <option value="Private Researcher" {{ old('occupation', $student->occupation) == 'Private Researcher' ? 'selected' : '' }}>Private Researcher</option>
                                            <option value="Other" {{ old('occupation', $student->occupation) == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="messenger_app">Messenger App</label>
                                        <select class="form-control" id="messenger_app" name="messenger_app">
                                            <option value="">Select messenger app</option>
                                            <option value="Skype" {{ old('messenger_app', $student->messenger_app) == 'Skype' ? 'selected' : '' }}>Skype</option>
                                            <option value="WeChat" {{ old('messenger_app', $student->messenger_app) == 'WeChat' ? 'selected' : '' }}>WeChat</option>
                                            <option value="WhatsApp" {{ old('messenger_app', $student->messenger_app) == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="messenger_app_id">Messenger App ID</label>
                                    <input type="text" class="form-control" id="messenger_app_id" name="messenger_app_id" placeholder="Messenger App ID" value="{{ old('messenger_app_id') ?? $student->messenger_app_id }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ad_platform">Where Did You Hear About Us</label>
                                        <select class="form-control" id="ad_platform" name="ad_platform">
                                            <option value="">Select</option>
                                            <option value="Google" {{ old('ad_platform', $student->ad_platform) == 'Google' ? 'selected' : '' }}>Google</option>
                                            <option value="Friend" {{ old('ad_platform', $student->ad_platform) == 'Friend' ? 'selected' : '' }}>Friend</option>
                                            <option value="Social Media" {{ old('ad_platform', $student->ad_platform) == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                            <option value="Other" {{ old('ad_platform', $student->ad_platform) == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="section mb-4">
                            <div class="col-md-12 mb-4">
                                <h5 class="profile-title mb-3">Self Introduction</h5>

                                <textarea class="form-control" rows="5" name="self_introduction" placeholder="Write here..." style="height: initial;"></textarea>
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
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control new-image" name="new_image" accept="image/*">
                                        <x-frontend.input-error field="new_image"></x-frontend.input-error>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="save-button">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection