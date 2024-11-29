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
                    <div class="col-12 mb-4">
                        <label for="name" class="form-label">Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
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
                        <label for="cec_status" class="form-label">CEC Status<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="cec_status" name="cec_status" required>
                            <option value="">Select CEC Status</option>
                            <option value="1" {{ old('cec_status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('cec_status') == '2' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="certificate_number" class="form-label">Certificate Number<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="certificate_number" name="certificate_number" placeholder="Certificate Number" value="{{ old('certificate_number') }}" required>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="membership_credential_status" class="form-label">Membership/ Credential Status<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="membership_credential_status" name="membership_credential_status" required>
                            <option value="">Select Membership/ Credential Status</option>
                            <option value="1" {{ old('membership_credential_status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="2" {{ old('membership_credential_status') == '2' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="self_introduction" class="form-label">Self Introduction<span class="asterisk">*</span></label>
                        <textarea class="form-control" rows="5" id="self_introduction" name="self_introduction" placeholder="Self Introduction" required>{{ old('self_introduction') }}</textarea>
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
                                <button type="button" class="add-row-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                        
                        <div class="row single-item">
                            <div class="col-12">
                                <input type="text" class="form-control" name="credentials[]" placeholder="Credential" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row align-items-center mb-2">
                            <div class="col-9">
                                <label class="form-label">Area of Interests</label>
                            </div>
                            <div class="col-3 text-end">
                                <button type="button" class="add-row-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Add More
                                </button>
                            </div>
                        </div>
                        
                        <div class="row single-item">
                            <div class="col-12">
                                <input type="text" class="form-control" name="area_of_interests[]" placeholder="Area of Interest" required>
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

        $('.add-row-button').on('click', function() {
            let $row = $(this).closest('.row');
            let $singleItem = $row.next('.single-item');
            let singleItemHtml = $singleItem.html();
            
            let $temp = $('<div>').html(singleItemHtml);
            
            let $firstDiv = $temp.find('div:eq(0)');
            let $secondDiv = $temp.find('div:eq(1)');
            let currentClass;

            if($secondDiv.length > 0) {
                currentClass = $secondDiv.attr('class');
            }
            else {
                currentClass = $firstDiv.attr('class');
            }

            let newClass = currentClass.replace(/col-(\d+)/, function(match, p1) {
                return 'col-' + (parseInt(p1) - 1);
            });

            if($secondDiv.length > 0) {
                $secondDiv.attr('class', newClass);
            }
            else {
                $firstDiv.attr('class', newClass);
            }
            
            let updatedSingleItem = $temp.html();
            
            let html = `<div class="row single-item mt-2">
                            ${updatedSingleItem}
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>`;
            $row.parent().append(html);
        });
    </script>
@endpush