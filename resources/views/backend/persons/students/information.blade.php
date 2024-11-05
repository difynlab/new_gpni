@extends('backend.layouts.app')

@section('title', 'Student Information')

@section('content')

    <x-backend.breadcrumb page_name="Student Information"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.persons.students.information.update', $student) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Primary Practice Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="business_name" class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business Name" value="{{ old('business_name', $student->business_name) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="business_address" class="form-label">Business Address</label>
                        <input type="text" class="form-control" id="business_address" name="business_address" placeholder="Business Address" value="{{ old('business_address', $student->business_address) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="unit_suite" class="form-label">Unit/ Suite</label>
                        <input type="text" class="form-control" id="unit_suite" name="unit_suite" placeholder="Unit/ Suite" value="{{ old('unit_suite', $student->unit_suite) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ old('city', $student->city) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="state_province" class="form-label">State/ Province</label>
                        <input type="text" class="form-control" id="state_province" name="state_province" placeholder="State/ Province" value="{{ old('state_province', $student->state_province) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="zip_postal" class="form-label">Zip/ Postal</label>
                        <input type="text" class="form-control" id="zip_postal" name="zip_postal" placeholder="Zip/ Postal" value="{{ old('zip_postal', $student->zip_postal) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="{{ old('contact_number', $student->contact_number) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="fax" class="form-label">Fax</label>
                        <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax" value="{{ old('fax', $student->fax) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="business_email" class="form-label">Business Email</label>
                        <input type="email" class="form-control" id="business_email" name="business_email" placeholder="Business Email" value="{{ old('business_email', $student->business_email) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="business_secondary_email" class="form-label">Business Secondary Email</label>
                        <input type="email" class="form-control" id="business_secondary_email" name="business_secondary_email" placeholder="Business  Secondary Email" value="{{ old('business_secondary_email', $student->business_secondary_email) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" class="form-control" id="website" name="website" placeholder="Website" value="{{ old('website', $student->website) }}">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="age" class="form-label">Age</label>
                        <select class="form-control form-select" id="age" name="age">
                            <option value="">Select age</option>
                            <option value="29 or younger" {{ old('age', $student->age) == '29 or younger' ? 'selected' : '' }}>29 or younger</option>
                            <option value="30-39" {{ old('age', $student->age) == '30-39' ? 'selected' : '' }}>30-39</option>
                            <option value="40-49" {{ old('age', $student->age) == '40-49' ? 'selected' : '' }}>40-49</option>
                            <option value="50-59" {{ old('age', $student->age) == '50-59' ? 'selected' : '' }}>50-59</option>
                            <option value="60 plus" {{ old('age', $student->age) == '60 plus' ? 'selected' : '' }}>60 plus</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="area_of_interest" class="form-label">Area of interest</label>
                        <select class="form-control form-select" id="area_of_interest" name="area_of_interest">
                            <option value="">Select area of interest</option>
                            <option value="Basic and Applied Sciences" {{ old('area_of_interest', $student->area_of_interest) == 'Basic and Applied Sciences' ? 'selected' : '' }}>Basic and Applied Sciences</option>
                            <option value="Medicine" {{ old('area_of_interest', $student->area_of_interest) == 'Medicine' ? 'selected' : '' }}>Medicine</option>
                            <option value="Dietetics" {{ old('area_of_interest', $student->area_of_interest) == 'Dietetics' ? 'selected' : '' }}>Dietetics</option>
                            <option value="Research and Development" {{ old('area_of_interest', $student->area_of_interest) == 'Research and Development' ? 'selected' : '' }}>Research and Development</option>
                            <option value="Health/ Fitness" {{ old('area_of_interest', $student->area_of_interest) == 'Health/ Fitness' ? 'selected' : '' }}>Health/ Fitness</option>
                            <option value="Other" {{ old('area_of_interest', $student->area_of_interest) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="occupation" class="form-label">Occupation</label>
                        <select class="form-control form-select" id="occupation" name="occupation">
                            <option value="">Select occupation</option>
                            <option value="Registered Dietitian/ Sport Dietitian" {{ old('occupation', $student->occupation) == 'Registered Dietitian/ Sport Dietitian' ? 'selected' : '' }}>Registered Dietitian/ Sport Dietitian</option>
                            <option value="Academic Professor/ Researcher" {{ old('occupation', $student->occupation) == 'Academic Professor/ Researcher' ? 'selected' : '' }}>Academic Professor/ Researcher</option>
                            <option value="Industry Product Development/ Sales" {{ old('occupation', $student->occupation) == 'Industry Product Development/ Sales' ? 'selected' : '' }}>Industry Product Development/ Sales</option>
                            <option value="Personal Trainer/ Nutritionist" {{ old('occupation', $student->occupation) == 'Personal Trainer/ Nutritionist' ? 'selected' : '' }}>Personal Trainer/ Nutritionist</option>
                            <option value="Private Researcher" {{ old('occupation', $student->occupation) == 'Private Researcher' ? 'selected' : '' }}>Private Researcher</option>
                            <option value="Other" {{ old('occupation', $student->occupation) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="messenger_app" class="form-label">Messenger App</label>
                        <select class="form-control form-select" id="messenger_app" name="messenger_app">
                            <option value="">Select messenger app</option>
                            <option value="Skype" {{ old('messenger_app', $student->messenger_app) == 'Skype' ? 'selected' : '' }}>Skype</option>
                            <option value="WeChat" {{ old('messenger_app', $student->messenger_app) == 'WeChat' ? 'selected' : '' }}>WeChat</option>
                            <option value="WhatsApp" {{ old('messenger_app', $student->messenger_app) == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="messenger_app_id" class="form-label">Messenger App ID</label>
                        <input type="text" class="form-control" id="messenger_app_id" name="messenger_app_id" placeholder="Messenger App ID" value="{{ old('messenger_app_id', $student->messenger_app_id) }}">
                    </div>

                    <div class="col-6">
                        <label for="ad_platform" class="form-label">AD Platform</label>
                        <select class="form-control form-select" id="ad_platform" name="ad_platform">
                            <option value="">Select ad platform</option>
                            <option value="Google" {{ old('ad_platform', $student->ad_platform) == 'Google' ? 'selected' : '' }}>Google</option>
                            <option value="Friend" {{ old('ad_platform', $student->ad_platform) == 'Friend' ? 'selected' : '' }}>Friend</option>
                            <option value="Social Media" {{ old('ad_platform', $student->ad_platform) == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                            <option value="Other" {{ old('ad_platform', $student->ad_platform) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="self_introduction" class="form-label">Self Introduction</label>
                        <textarea class="form-control" rows="5" id="self_introduction" name="self_introduction" value="{{ old('self_introduction', $student->self_introduction) }}" placeholder="Self Introduction">{{ old('self_introduction', $student->self_introduction) }}</textarea>
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