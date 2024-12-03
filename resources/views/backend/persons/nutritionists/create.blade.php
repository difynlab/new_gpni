@extends('backend.layouts.app')

@section('title', 'Create Nutritionist')

@section('content')

    <x-backend.breadcrumb page_name="Create Nutritionist"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.persons.nutritionists.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="section">
                <p class="inner-page-title">Nutritionist Details</p>

                <div class="row form-input">
                    <div class="col-6 mb-4">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="email" class="form-label">Email<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language') == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language') == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language') == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="age" class="form-label">Age<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="{{ old('age') }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label class="form-label">Country<span class="asterisk">*</span></label>
                        <select class="form-control form-select country" name="country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="is_certified" class="form-label">Certified Status</label>
                        <select class="form-control form-select" id="is_certified" name="is_certified">
                            <option value="">Select Certified Status</option>
                            <option value="1" {{ old('is_certified') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ old('is_certified') == '2' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="is_sns" class="form-label">SNS Status</label>
                        <select class="form-control form-select" id="is_sns" name="is_sns">
                            <option value="">Select SNS Status</option>
                            <option value="1" {{ old('is_sns') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ old('is_sns') == '2' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="is_snc" class="form-label">SNC Status</label>
                        <select class="form-control form-select" id="is_snc" name="is_snc">
                            <option value="">Select SNC Status</option>
                            <option value="1" {{ old('is_snc') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ old('is_snc') == '2' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="is_cissn" class="form-label">CISSN Status</label>
                        <select class="form-control form-select" id="is_cissn" name="is_cissn">
                            <option value="">Select CISSN Status</option>
                            <option value="1" {{ old('is_cissn') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ old('is_cissn') == '2' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="is_asnc" class="form-label">ASNC Status</label>
                        <select class="form-control form-select" id="is_asnc" name="is_asnc">
                            <option value="">Select ASNC Status</option>
                            <option value="1" {{ old('is_asnc') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ old('is_asnc') == '2' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="cec_status" class="form-label">CEC Status</label>
                        <select class="form-control form-select" id="cec_status" name="cec_status">
                            <option value="">Select CEC Status</option>
                            <option value="1" {{ old('cec_status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('cec_status') == '2' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-4 mb-4">
                        <label for="certificate_number" class="form-label">Certificate Number</label>
                        <input type="text" class="form-control" id="certificate_number" name="certificate_number" placeholder="Certificate Number" value="{{ old('certificate_number') }}">
                    </div>

                    <div class="col-4 mb-4">
                        <label for="membership_credential_status" class="form-label">Membership/ Credential Status</label>
                        <select class="form-control form-select" id="membership_credential_status" name="membership_credential_status">
                            <option value="">Select Membership/ Credential Status</option>
                            <option value="1" {{ old('membership_credential_status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('membership_credential_status') == '2' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="self_introduction" class="form-label">Self Introduction</label>
                        <textarea class="form-control" rows="5" id="self_introduction" name="self_introduction" placeholder="Self Introduction">{{ old('self_introduction') }}</textarea>
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_image" old_value="{{ old('image') }}" new_name="new_image" path="persons/nutritionists" label="Nutritionist"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">More Details</p>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="row align-items-center mb-2">
                            <div class="col-9">
                                <label class="form-label">Credentials</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button credentials">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row align-items-center mb-2">
                            <div class="col-9">
                                <label class="form-label">Area of Interests</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button area-of-interests">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-backend.create-status></x-backend.create-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>

    <script>
        
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-row-button.credentials').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-11">
                                <input type="text" class="form-control" name="credentials[]" placeholder="Credential">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });

        $('.add-row-button.area-of-interests').on('click', function() {
            let html = `<div class="row single-item mt-2">
                            <div class="col-11">
                                 <input type="text" class="form-control" name="area_of_interests[]" placeholder="Area of Interest">
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;

            $(this).closest('.row').parent().append(html);
        });
    </script>
@endpush