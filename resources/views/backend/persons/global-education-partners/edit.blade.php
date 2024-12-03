@extends('backend.layouts.app')

@section('title', 'Edit Global Education Partner')

@section('content')

    <x-backend.breadcrumb page_name="Edit Global Education Partner"></x-backend.breadcrumb>

    <div class="static-pages">
        <form action="{{ route('backend.persons.global-education-partners.update', $global_education_partner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="section">
                <p class="inner-page-title">Global Education Partner Details</p>

                <div class="row form-input">
                    <div class="col-12 mb-4">
                        <label for="language" class="form-label">Language<span class="asterisk">*</span></label>
                        <select class="form-control form-select" id="language" name="language" required>
                            <option value="">Select language</option>
                            <option value="English" {{ old('language', $global_education_partner->language) == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Chinese" {{ old('language', $global_education_partner->language) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                            <option value="Japanese" {{ old('language', $global_education_partner->language) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_image" old_value="{{ $global_education_partner->image ?? old('image') }}" new_name="new_image" path="persons/global-education-partners"></x-backend.upload-image>
                        <x-backend.input-error field="new_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <x-backend.edit-status :data="$global_education_partner"></x-backend.edit-status>
        </form>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
@endpush